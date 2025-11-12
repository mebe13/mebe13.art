<<<<<<< HEAD
const CACHE_NAME = "beme-cache-v1"; const urlsToCache = [ "./", "./index.html", "./css/bootstrap.min.css", "./css/style.css", "./js/main.js", "./images/hero.webp", "./images/about.webp", "./images/negro.webp", "./icons/icon-192.png", "./icons/icon-512.png" ]; self.addEventListener("install", event => { event.waitUntil( caches.open(CACHE_NAME).then(cache => { console.log("Cache abierta"); return cache.addAll(urlsToCache); }) ); }); self.addEventListener("activate", event => { event.waitUntil( caches.keys().then(cacheNames => Promise.all( cacheNames .filter(name => name !== CACHE_NAME) .map(name => caches.delete(name)) ) ) ); }); self.addEventListener("fetch", event => { event.respondWith( caches.match(event.request).then(response => { return response || fetch(event.request); }) ); });
=======
// sw.js - Service Worker de Robert Mebe (BeMe Portafolio)
const CACHE_NAME = "beme-cache-v1";
const urlsToCache = [
  "./",
  "./index.html",
  "./css/bootstrap.min.css",
  "./css/style.css",
  "./js/main.js",
  "./images/hero.webp",
  "./images/about.webp",
  "./images/negro.webp",
  "./icons/icon-192.png",
  "./icons/icon-512.png"
];

// Instala el SW y guarda los archivos en caché
self.addEventListener("install", event => {
  event.waitUntil(
    caches.open(CACHE_NAME).then(cache => {
      console.log("Cache abierta");
      return cache.addAll(urlsToCache);
    })
  );
});

// Activa el SW y limpia versiones antiguas
self.addEventListener("activate", event => {
  event.waitUntil(
    caches.keys().then(cacheNames =>
      Promise.all(
        cacheNames
          .filter(name => name !== CACHE_NAME)
          .map(name => caches.delete(name))
      )
    )
  );
});

// Intercepta peticiones para servir desde cache u online
self.addEventListener("fetch", event => {
  event.respondWith(
    caches.match(event.request).then(response => {
      return response || fetch(event.request);
    })
  );
});
>>>>>>> 24710092f98a26ad09287a9e68ff82c142d55939
