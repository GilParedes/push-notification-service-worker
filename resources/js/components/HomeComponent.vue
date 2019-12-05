<template>
    <div class="home">
        <img alt="Vue logo" src="https://vuejs.org/images/logo.png">
        <br>
        <button v-if="notificationsSupported" @click="toggleSubscription" :disabled="buttonDisabled">{{ (notificationsEnabled ? 'Disable' : 'Enable') }} notifications ></button>
        <div v-if="notificationsEnabled">
            <br>
            <textarea v-model="message" cols="30" rows="10" placeholder="Your message for push notification here"></textarea>
            <br>
            <button @click="createPushNotification">Notify with Push</button>
        </div>
    </div>
</template>

<script>
//import axios from axios;

export default {
    name: 'home',
    data() {
        return {
            notificationsSupported: false,
            notificationsEnabled: false,
            buttonDisabled: false,
            serviceWorkerRegistation: null,
            subscription: null,
            message: null,
        }
    }, 
    methods: {
        toggleSubscription() {
            if (this.notificationsSupported) {
                this.buttonDisabled = true
                // Busca y determina si necesiamos crear o eliminar una suscripción
                if (!this.notificationsEnabled) {
                    // solicita permiso y si se otorga crea un anueva suscripción
                    Notification.requestPermission()
                    .then(result => {
                        // si se otorga crea una nueva suscripción
                        if (result === 'granted') {
                        console.log('permiso otorgado');

                            this.createSubscription()
                            .then(sub => {
                                console.log('subscription created on the client', sub);
                                this.subscription = sub
                                // obtiene nuevo usuario oexistente desde el backend
                                return axios.post(`${process.env.VUE_APP_API_PATH}/user`, {username: localStorage.getItem('username')})
                            })
                            .then(({data}) => {
                                const { user } = data
                                console.log('user created on the server', user);
                                localStorage.setItem('username', user.name)
                                // Almacena nuevo suscriptor en el servidor
                                return axios.post(`${process.env.VUE_APP_API_PATH}/subscription`, {
                                    subscription: this.subscription,
                                    userId: user.id,
                                })
                            })
                            .then(() => {
                                this.showNotification()
                                this.buttonDisabled = false
                                this.notificationsEnabled = true
                            })
                        } else {
                            // el usuario no tiene permisos
                            console.log('User did not granted permission')
                        }
                    })
                } else {
                    // Destruir suscripción
                    console.log('Disable subscription');
                    // si la uscripción es diferente de nula destruir la suscripción del servidor
                    if (this.subscription !== null) {
                        // destruir en el servidor
                        return axios.post(`${process.env.VUE_APP_API_PATH}/subscription/delete`, {
                            endpoint: this.subscription.endpoint,
                        })
                        // quitar suscripción en el cliente
                        .then(() => this.subscription.unsubscribe())
                        .then(() => {
                            // actualizar la información
                            this.notificationsEnabled = false
                            this.buttonDisabled = false
                            this.subscription = null
                        })
                    }
                }
            }
        },
        createSubscription() {
            console.log('ask for active service worker registration');
            if (this.serviceWorkerRegistation === null) {
                return navigator.serviceWorker.ready // retorna una promesa activa en el service worker
                .then(swreg => {
                    this.serviceWorkerRegistation = swreg
                    return this.subscribe(this.serviceWorkerRegistation)
                })
            } else {
                return this.subscribe(this.serviceWorkerRegistation)
            }
        },
        getSubscription(swreg) {
            console.log('ask for available subscription');
            return swreg.pushManager.getSubscription()
        },
        subscribe(swreg) {
            console.log('create new subscription for this browser on this device');
            // crea nueva suscripción para el navegador del dispositivo
            const vapidPublicKey = process.env.VUE_APP_VAPID_PUBLIC_KEY
            const convertedVapidPublicKey = this.urlBase64ToUint8Array(vapidPublicKey)
            // retorna la suscripción de la promesa, lo encadenamos y podemos enviarlo al servidor 
            return swreg.pushManager.subscribe({
                userVisibleOnly: true,
                // Esto es por seguridad al backend, necesitamos hacerlo con las claves VAPID_PRIVATE_KEY creadas desde la librería
                // that you can find in .env to make this work in the end
                applicationServerKey: convertedVapidPublicKey
            })
        },
        showNotification() {
            this.serviceWorkerRegistation.showNotification('Notifications granted', {
                body: 'Here is a first notification',
                icon: '/img/icons/android-chrome-192x192.png',
                image: '/img/autumn-forest.png',
                vibrate: [300, 200, 300],
                badge: '/img/icons/plint-badge-96x96.png',
            })
        },
        findSubscription() {
            console.log('get active service worker registration');
            return navigator.serviceWorker.ready
            .then(swreg => {
                console.log('haal active subscription op');
                this.serviceWorkerRegistation = swreg
                return this.getSubscription(this.serviceWorkerRegistation)
            })
        },
        createPushNotification() {
            // obtener un service worker activo y regístrado
            // El servidor creará una notificacón que será empujada
            return axios.post(`${process.env.VUE_APP_API_PATH}/notify`, {
                username: localStorage.getItem('username'),
                message: this.message,
            })
            .then(response => {
                this.message = null
            })
        },
        urlBase64ToUint8Array(base64String) {
            const padding = '='.repeat((4 - base64String.length % 4) % 4);
            const base64 = (base64String + padding)
                .replace(/\-/g, '+')
                .replace(/_/g, '/');
            const rawData = window.atob(base64);
            let outputArray = new Uint8Array(rawData.length);
            for (let i = 0; i < rawData.length; ++i) {
                outputArray[i] = rawData.charCodeAt(i);
            }
            return outputArray;
        },
    },
    created() {
        if ('Notification' in window && 'serviceWorker' in navigator) {
            this.notificationsSupported = true
        }
    },
    mounted() {
        // Find out if the user has a subscription at the moment.
        // If so, update the enabled flag in data
        this.findSubscription()
        .then(sub => {
            if (sub === null) {
                console.log('no active subscription found on the client', sub);
                this.buttonDisabled = false
                this.notificationsEnabled = false
            } else {
                console.log('Active subscription found', sub);
                // retrieve user info from API
                this.buttonDisabled = false
                this.notificationsEnabled = true
                this.subscription = sub
            }
        })
    },
}
</script>

<style scoped lang="less">
    button {
        width: 240px;
        background: #1da025;
        color: #fff;
        padding: 10px 20px;
        font-size: 18px;
        margin-top: 20px;
        &:focus {
            outline: none;
        }
        &:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    }
    textarea {
        width: 240px;
        padding: 10px;
        border:1px solid #ccc;
        box-sizing: border-box;
    }
</style>