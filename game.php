
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Goblin Cat</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/timer.css">

</head>
<body class="body_game">
	<!-- ヘッダー -->
	<div class="header-wrapper">
		<div class="header_main">
			<img src="img/logo_header_tra.png" alt="titlelogo" height="35" >
			<img src="img/arrow4.png" alt="arrow" height="35">
		</div>
	</div>
	<!-- ヘッダーここまで -->
	<!-- コンテンツ -->
		<div class="mousetitle">
			<img src="img/tori4.png" alt="tori4" height="120">
		</div>

	<!-- タイマー -->
	<div class="box_timer">
		<div class="timerbox">
		    <h3>Timer</h3>
		    <div class="content">
		        <p id="timer">03:00:00</p>
		    </div>
		    <div class="button" id="buttonBox">
		        <button id="start">
		            START
		        </button>
		    </div>
		</div>

    <script>
        window.onload = function(){
            document.getElementById("start").click();
            ring1();
        }
        var point;
        var sec;
        var seconds;
        var min;
        var hour;
        var start;
        var now;
        var time;
        var id;

        document.getElementById('start').addEventListener('click', function () {
            if (document.getElementById('start').innerHTML === 'START') {
                start = new Date();
                id = setInterval(goTimer, 10);
                document.getElementById('start').innerHTML = 'RESET';

                document.getElementById('buttonBox').classList.remove('button');
                document.getElementById('buttonBox').classList.add('buttonbutton');
            } else {
                clearInterval(id);
                document.getElementById('start').innerHTML = 'START';
                document.getElementById('timer').innerHTML = '03:00:00';

                document.getElementById('buttonBox').classList.remove('buttonbutton');
                document.getElementById('buttonBox').classList.add('button');
            }
        });

        var goTimer = function () {
            now = new Date();
            time = now.getTime() - start.getTime();

            point = Math.floor(time / 100);
            sec = Math.floor(time / 1000);
            min = Math.floor(sec / 60);
            hour = Math.floor(min / 60);
            seconds = Math.floor(time / 1000);

            if (seconds < 180) {
                point = 9 - (point - sec * 10);
                sec = 59 - (sec - min * 60);
                min = 2 - (min - hour * 60);

                point = addZero(point);
                sec = addZero(sec);
                min = addZero(min);

                document.getElementById('timer').innerHTML = min + ':' + sec + ':' + point;
            } else if (seconds >= 180 && seconds < 240) {
                point = point - sec * 10;
                sec = sec - min * 60;
                min = min - 3;

                point = addZero(point);
                sec = addZero(sec);
                min = addZero(min);

            } else {
                clearInterval(id);
                document.getElementById('timer').innerHTML = '03:00:00';
                document.getElementById('start').innerHTML = 'START';
                document.getElementById('buttonBox').classList.remove('buttonbutton');
                document.getElementById('buttonBox').classList.add('button');
            }
            if(document.getElementById('timer').innerHTML === '00:00:00'){
            	ringStop1();
            	ring();
            	alert("０秒になったよ");
            	document.getElementById('start').click();
            	ringStop();
            	ring1()
            }
        }
        var addZero = function (value) {
            if (value < 10) {
                value = '0' + value;
            }
            return value;
        }
        function ring() {
			document.getElementById("Sound").play();
		}
        function ring1() {
			document.getElementById("Sound1").play();
		}
        function ringStop() {
			document.getElementById("Sound").pause();
			document.getElementById("Sound").currentTime = 0;
		}
        function ringStop1() {
			document.getElementById("Sound1").pause();
			document.getElementById("Sound1").currentTime = 0;
		}



      //投票時確認JS
        function check(){
        	if(window.confirm('本当に投票しますか')){ // 確認ダイアログを表示
        		return true; // 「OK」時は送信を実行
        	}
        	else{ // 「キャンセル」時の処理

        		return false; // 送信を中止
        	}
        }


    </script>
    <!-- タイマー終わり -->
	</div>
		<!-- タイマーボックスここまで -->

				<!-- ボックス-->
		<div class="box_wood">
			<div class="box_game">



<?php 
include('./sqlConn.php');
$rows = "";
$playerList = [];
$words = '';
$word = '';
//POST受け取り
$playcount = $_POST['playcount'];
$catNum = $_POST['catNum'];
$wordNum = $_POST['wordNum'];
if (isset($_POST['play'])) {
    $play = $_POST['play'];
}
if($playcount != 0){
    $play = explode(",", $play);
}
$search = '';
$count = 1;
foreach($play as $p){
    if($count == 1){
        $search .= 'where ';
    }else{
        $search .= ' or ';
    }
    $search .= "id = $p";
    $count++;
}
$stmt = $pdo->query("SELECT * FROM player $search");
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
//$resultに格納した連想配列のplanを抽出し、$rowsに格納。planがある限り、$rowsに追加していく
$rows = [$result['id'],$result['name'],$result['image']];
array_push($playerList, $rows);
}
$stmt = $pdo->query("SELECT * FROM word where id = $wordNum");
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //$resultに格納した連想配列のplanを抽出し、$rowsに格納。planがある限り、$rowsに追加していく
    $words = [$result['id'],$result['wordA'],$result['wordB']];
}
$play = implode(",", $play);

//wordを判断して挿入
if($playcount == $catNum){$word = $words[1];}else{$word = $words[2];}
$randNum = mt_rand(0, $count - 2);
?>



    <p class="text">ランダムで選ばれた <?php echo $playerList[$randNum][1]; ?> から時計回り(右隣に)第一印象を発表してください。
    <p class="text">ゴブリンキャットは誰でしょう。話し合って追放しましょう。</p>
			<div class="box3">
				<form method="post"  action="result.php"  name="form1"  >
<?php
$i = 1;
$checked = '';
                foreach($playerList as $p){
                    if($i == 1){
                        $checked = 'checked'; 
                    }else{
                        $checked = '';
                    }
                    echo '
					<input type="radio" '.$checked.' name="vote"  value="'.$i.'" id="'.$i.'"/>
                    <label for="'.$i.'">
                    <img src ="'.$p[2].'" width="100" />
                    </label><br>
                    ';
                    $i++;
                }
?>
				<input type="hidden" name="hidden" value="vote">
                <input type="hidden" name="catNum"  value="<?php echo $catNum; ?>"/>
                <input type="hidden" name="wordNum"  value="<?php echo $wordNum; ?>"/>
                <input type="hidden" name="playcount"  value="<?php echo $playcount; ?>"/>
                <input type="hidden" name="play"  value="<?php echo $play; ?>"/>
				<a href="javascript:form1.submit()" class="btn" onclick="return check()"><button type="button" ><font size="5">投票</font></button></a>
				</form>
			</div>
		</div>
	</div>
	<audio loop id="Sound1" preload="auto">
		<source src="bgm/mazuha.mp3" >
	</audio>
	<audio id="Sound" preload="auto">
		<source src="bgm/Mac.mp3" >
	</audio>
</body>
</html>
