<?php
// 認証を要求したいページの先頭に以下を記述する
require_once './login.php';
 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--PWA動作用マニフェスト-->
        <link rel="manifest" href="manifest.json">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="css/tkk.css">

	<!--icon-->
	<link rel="apple-touch-icon" sizes="180x180" href="images/icon-152x152.png">
    <title>保険日記システム</title>

</head>

        <body>

<div class="container">

    <div class="card">

        <h5 class="card-header bg-info text-white text-center py-4"><strong>保険日記(<?php echo h($_SESSION['username']); ?>)</strong></h5>

        <div class="grid-container" style=" margin: 10px ;">

        <form id="tkk-form" method="get" action="debug.php">
            <div class="tkk-input-radio">
                <div class="u-mb-20">
                    <ul class="selectradio">
                        <li class="selectradio-item">
                            <input type="radio" name="radiogroup1" id="select-1" value="1">
                            <label for="select-1" class="selectradio-label btn-lg font-weight-bold rounded-pill">火災案件</label>
                        </li>
                        <li class="selectradio-item">
                            <input type="radio" name="radiogroup1" id="select-2" value="2">
                            <label for="select-2" class="selectradio-label btn-lg font-weight-bold rounded-pill">事故案件</label>
                        </li>
                        <li class="selectradio-item">
                            <input type="radio" name="radiogroup1" id="select-3" value="3">
                            <label for="select-3" class="selectradio-label btn-lg font-weight-bold rounded-pill">傷害案件</label>
                        </li>
                        <li class="selectradio-item">
                            <input type="radio" name="radiogroup1" id="select-4" value="4">
                            <label for="select-4" class="selectradio-label btn-lg font-weight-bold rounded-pill">その他</label>
                        </li>
                        <li class="selectradio-item">
                            <input type="radio" name="radiogroup1" id="select-5" value="5">
                            <label for="select-5" class="selectradio-label btn-lg font-weight-bold rounded-pill">不明</label>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="tkk-input-txt">

                <div class="input-group input-group-lg  ">
                    <div class="input-group-prepend ">
                        <div class="input-group-text border border-info text-info font-weight-bold">顧客名</div>
                    </div>
                    <input type="text"  name="text1" class="form-control border border-info">
                </div>
            </div>
            <div class="tkk-input-btn">

              <button class="btn btn-info btn-block font-weight-bold btn-lg" id="tkk-form-btn" type="submit" style="margin-top:10px;">登録</button>

            </div>
</form>
            <div class="tkk-return-btn">

                <button class="btn btn-info btn-block font-weight-bold btn-lg" onclick="location.href='logout.php'" >ログアウト</button>
            </div>
        </div>

    </div>








	<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--PWA動作用スクリプト　＊一番最後-->
    <script src="tkkpwa.js"></script>

</body>
</html>