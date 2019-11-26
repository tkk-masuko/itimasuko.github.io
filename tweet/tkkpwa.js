$(function () {
    //Service Workerの登録
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('sw.js')
            .then(
                function (registration) {
                    if (typeof registration.update == 'function') {
                        registration.update();
                    }
                })
            .catch(function (error) {
                console.log("Error Log: " + error);
            });
    }




});

$('#btn_update').click(function () {
    
    navigator.serviceWorker.controller.postMessage('updateCache');
    setTimeout(function () {
        location.reload();
    });
});


$('#tkk-form').submit(function(){

    if(!confirm('登録しますか？')){
        /* キャンセルの時の処理 */
        return false;//return falseすることでsubmitを中止。
    }else{
        /*　OKの時の処理 */
        //location.href = 'index.html';
    }
})

