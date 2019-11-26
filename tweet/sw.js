//キャッシュ名
var CACHE_NAME  = "TKKPWATEST2019";

//キャッシュするファイル名　キャッシュする順番も重要
var urlsToCache = [
    "h.php",
    "index.html",
    "input.php",
    "login.php",
    "logout.php",
    "css/tkk.css",
    "images/icon-152x152.png",
    "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css",
    "https://code.jquery.com/jquery-3.3.1.slim.min.js",
    "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js",
    "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js",
    "tkkpwa.js"

];


//インストール時処理
self.addEventListener('install', function(event) {
    event.waitUntil(
        caches
        .open(CACHE_NAME)
        .then(function(cache){
            return cache.addAll(urlsToCache);
        })



        ,self.skipWaiting()//意味あるか不明



    );
});

// フェッチ時のキャッシュロード処理
self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches
            .match(event.request)
            .then(function(response) {
                if(response){
                    return response;
                }
                return fetch(event.request);
            })

            ,self.clients.claim()//意味あるか不明



    );
});

//メッセージを受け取ったとき
self.addEventListener('message', function(event) {
    switch (event.data) {
        case 'updateCache':
            event.waitUntil(
                caches
                .open(CACHE_NAME)
                .then(function(cache){
                    return cache.addAll(urlsToCache);
                })
            );
        break;
    }
});