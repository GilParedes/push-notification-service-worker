self.addEventListener('push', function(event) {
  if (event.data) {
    var data = event.data.json();
    self.registration.showNotification(data.title,{
      body: data.body,
      icon: data.icon
    });
    console.log('This push event has data: ', event.data.text());
  } else {
    console.log('This push event has no data.');
  }
});



// self.addEventListener('install', function(event){
//     // aquí añadiremos cosas
//     console.log('Installed', event);

// });

// self.addEventListener('push', event => {
//     event.waitUntil(
//       self.registration.showNotification('Hola Mundo Push')
//     );
//   });


// self.addEventListener('activate', function(event) {

//     console.log('Activated', event);

//     // aquí no vamos a añadir nada

// });

// self.addEventListener('fetch', function(event) {

//     console.log('fetch', event);

//     // aquí añadiremos cosas

// });



// navigator.serviceWorker.register('service-worker.js').then(registration => {
//     registration.pushManager.subscribe({userVisibleOnly: true}).then(subscription => {
//       registration.showNotification('Hola Mundo');
//     })
// })


// var CACHE_NAME = 'dev.marival.group';
//     var urlsToCache = [
//         '/',
//         '/js/app.js',
//         '/css/app.css'
//     ];
// self.addEventListener('install', function(event){
//     // pasos para la instalación de un service worker
//     event.waitUntil(
//         caches.open(CACHE_NAME)
//          .then(function (cache){
//              console.log('cache abierta');
//              return cache.addAll(urlsToCache);
//          })
//     )
// });
// if ('serviceWorker' in navigator) {
//     window.addEventListener('load', function() {
//         navigator.serviceWorker.register('service-worker.js').then(registration => {
//             registration.pushManager.subscribe({userVisibleOnly: true}).then(subscription => {
//             registration.showNotification('Hola Mundo');
//             })
//         })
//     })
// }