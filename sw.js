const CACHE_ELEMENTS = [
  "./",
  "assets/js/common_scripts.min.js",
  "assets/js/common_func.js",
  "assets/js/validate.js",
//  "https://code.jquery.com/ui/1.13.0/jquery-ui.js",
  "assets/js/sticky_sidebar.min.js",
  "assets/js/details.js",
  "assets/js/sticky_sidebar.min.js",
  "assets/js/specific_listing.js",
  "assets/js/main_map_scripts.js",
  "https://maps.googleapis.com/maps/api/js?key=AIzaSyDoAvNW8S5jjbTnjQ50M2ItHqVm-123b0A&callback=initMap",
  "./register.js"
];

const CACHE_NAME = "v3_cache_contador_react";

self.addEventListener("install", (e) => {
  e.waitUntil(
    caches.open(CACHE_NAME).then((cache) => {
      cache
        .addAll(CACHE_ELEMENTS)
        .then(() => {
          self.skipWaiting();
        })
        .catch(console.log);
    })
  );
});

self.addEventListener("activate", (e) => {
  const cacheWhitelist = [CACHE_NAME];
  e.waitUntil(
    caches
      .keys()
      .then((cacheNames) => {
        return Promise.all(
          cacheNames.map((cacheName) => {
            return (
              cacheWhitelist.indexOf(cacheName) === -1 &&
              caches.delete(cacheName)
            );
          })
        );
      })
      .then(() => self.clients.claim())
  );
});

self.addEventListener("fetch", (e) => {
  e.respondWith(
    caches.match(e.request).then((res) => {
      if (res) {
        return res;
      }
      return fetch(e.request);
    })
  );
});
