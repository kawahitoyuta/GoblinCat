<?php
include('./sqlConn.php');
$rows = "";
$playerList = [];

if (isset($_POST['play']) && is_array($_POST['play'])) {
    $play = $_POST['play'];
}else{
	header('Location: http://kawahis-fun.net/htdocs/php/goblincat/stanby.php');
	exit;
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
$count -= 1; //参加人数
//猫ナンバーとワードナンバーを作成
$catNum = mt_rand(1, $count);
$wordNum = mt_rand(1, 440);
$stmt = $pdo->query("SELECT * FROM player $search");
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
//$resultに格納した連想配列のplanを抽出し、$rowsに格納。planがある限り、$rowsに追加していく
$rows = [$result['id'],$result['name'],$result['image']];
array_push($playerList, $rows);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>GoblinCat</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body class="body_standby">
	<!-- ヘッダー -->
	<div class="header-wrapper">
		<div class="header_main">
			<img src="img/logo_header_tra.png" alt="titlelogo" height="35" >
			<img src="img/arrow2.png" alt="arrow" height="35">
		</div>
	</div>
	<!-- ヘッダーここまで -->
	<!-- コンテンツ -->
	<div class="contents">
		<div class="torimidashi"><!-- マウス画像 -->
			<img src="img/tori2.png" alt="tori2" height="120" >
		</div>

		<!-- ボックス-->
		<div class="box_cheese">
			<div class="box_standby">
			<form action="nextUser.php" method="post" name="form1">
            <input type="hidden" name="playcount"  value="1"/>
            <input type="hidden" name="catNum"  value="<?php echo $catNum; ?>"/>
            <input type="hidden" name="wordNum"  value="<?php echo $wordNum; ?>"/>
 <?php
                foreach($playerList as $p){
                    echo '<tr><td>
					<input type="hidden" name="play[]"  value="'.$p[0].'"/>
					<img src ="'.$p[2].'" width="150" /><!-- ねずみ画像呼出 -->
					</td></tr>';
                }
 ?>               
					<div class="box3">
						<a href="javascript:form1.submit()" class="btn"><button type="button"><font size="5">OK!スタート！</font></button></a>
					</div>
			</form>
			<div class="box3">
						<a href="stanby.php" class="btn"><button type="button"><font size="5">戻る</font></button></a>
			</div>
		</div>
	</div>
			<!-- ボックスここまで -->
	</div>
	<!-- コンテンツここまで -->
		<script>
    window.onload = function(){
    	ring();
    }
	function ring() {
	document.getElementById("Sound").play();
	}
    function bye(){
		alert("人数が足りません");
        window.location.href = 'stanby.php';
    }
	</script>
	<audio id="Sound" preload="auto">
		<source src="bgm/mazuha.mp3" >
	</audio>

</body>
</html>