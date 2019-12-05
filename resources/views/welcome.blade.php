<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        
    </head>
    <body>
        <div class="flex-center position-ref full-height" id="app">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                    <button type="button" @click="getPermission" class="btn btn-primary">Permitir notificaiones</button>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <script src="{{ asset('/js/app.js') }}"></script>
        
        <script type="text/javascript">
        
        if ('serviceWorker' in navigator && 'PushManager' in window) {
  			console.log('Service Worker and Push is supported');

  		navigator.serviceWorker.register('service-worker.js')
  			.then(function(swReg) {
    		console.log('Service Worker is registered', swReg);

   			swRegistration = swReg;
  		})
  		.catch(function(error) {
    		console.error('Service Worker Error', error);
  		});
		} else {
  			console.warn('Push messaging is not supported');
		}


            // if ('serviceWorker' in navigator) {
            //     window.addEventListener('load', function() {
            //         navigator.serviceWorker.register('service-worker.js').then(registration => {
            //             // el regístro se ha echo correctamente
            //             registration.pushManager.subscribe({userVisibleOnly: true}).then(subscription => {
            //                 registration.showNotification('Hola Mundo');
            //             });
            //             console.log('Service Worker regístrado correctamente', registration.scope);
            //         }, function (err) {
            //             // Si el regístro falla
            //             console.log('El regístro del services worker a fallado', err);
            //         });
            //     });
            // }

            // if ('serviceWorker' in navigator) {
            //     window.addEventListener('load', function() {
            //         navigator.serviceWorker.register('/sw.js').then(function(registration) {
            //         // Registration was successful
            //         console.log('ServiceWorker registration successful with scope: ', registration.scope);
            //         }, function(err) {
            //         // registration failed :(
            //         console.log('ServiceWorker registration failed: ', err);
            //         });
            //     });
            //     }
            // $(document).ready(function () {
            //     window.Echo.channel('nuevo-usuario')
            //         .listen('NewUser', (data) => {
            //             console.log(data.user);
            //         });
            // });

            $(document).ready(function () {
                window.Echo.channel('home')
                    .listen('\\AvengersMG\\MGCms2019\\App\\Events\\NewMessage', (data) => {
                       console.log(data.message);
                    });
            });

            $(document).ready(function () {
                window.Echo.channel('channel-special')
                    .listen('\\AvengersMG\\MGCms2019\\App\\Events\\SpecialEvent', (data) => {
                       //alert(data.page);
                       console.log(data.special.page);
                    });
            });

            // $(document).ready(function () {
            //     window.Echo.channel('channel-page')
            //         .listen('PageEvent', (data) => {
            //            alert(data);
            //            console.log(data);
            //         });
            // });

            var title = "Xitrus";

            var extra = {
                icon: "http://xitrus.es/imgs/logo_cla0ro.png",
                body: "Cierra o pulsa la notificación"
            };

            // var permission = Notification.permission;

            // console.log('estado del permiso: ' + permission);
            
            Notification.requestPermission()
                .then(function(result) {
                    console.log(result);
                }
                .then(() => navigator.serviceworker.register('service-worker'))
                .then(registration => registration.showNotification('Hola Mundo'))
            );

            // var noti = new Notification( title, extra)

            // noti.onclick = {

            //     // Al hacer click

            // }
            // noti.onclose = {

            //     // Al cerrar

            // }

            
            // window.Echo.private('home').listen('NewMessage', (e) => {
            //     console.log(e.messaje);
            // });
        </script>
    </body>
</html>
