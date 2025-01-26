var cacheVersion = 'v1.0.0';
var cacheName = 'COEO App' + cacheVersion;
var filesToCache = [
    ''
];

self.addEventListener('install', function(e) {
    e.waitUntil(
        caches.open(cacheName).then(function(cache) {
            return cache.addAll(filesToCache);
        }).catch(function(err) {
            console.error('Error caching files:', err);
        })
    );
});

self.addEventListener('fetch', function(e) {
    e.respondWith(
        caches.match(e.request).then(function(response) {
            return response || fetch(e.request);
        }).catch(function(err) {
            console.error('Error fetching from cache:', err);
        })
    );
});
