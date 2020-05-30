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
if($playcount != 1){
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
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Goblin Cat</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body class="body_standby">
	<!-- ヘッダー -->
	<div class="header-wrapper">
			<div class="header_main">
				<img src="img/logo_header_tra.png" alt="titlelogo" height="35" >
				<img src="img/arrow3.png" alt="arrow" height="35">
		</div>
	</div>
	<!-- ヘッダーここまで -->
		<!-- コンテンツ -->
	<div class="contents">
		<div class="torimidashi">
			<img src="img/tori3.png" alt="tori3" height="120">
		</div>
	</div>
		<!-- ボックス-->
		<div class="box_pop4">
			<div class="box_standby">
				<p class="text"><?php echo $playerList[$playcount-1][1]; ?>
				だけワードを確認してね<br><br></p>
				<img src ="<?php echo $playerList[$playcount-1][2]; ?>" width="150" alt="キャラ画像"/>
				<br>
				<button onclick="clickEvent()">ワードを確認する</button><br />
					<div class="box3">
						<form action="<?php if($playcount != $count - 1){echo 'nextUser.php';}else{echo 'game.php';} ?>" method="post"  name="form1">
                            <input type="hidden" name="catNum"  value="<?php echo $catNum; ?>"/>
                            <input type="hidden" name="wordNum"  value="<?php echo $wordNum; ?>"/>
                            <input type="hidden" name="playcount"  value="<?php echo $playcount + 1; ?>"/>
                            <input type="hidden" name="play"  value="<?php echo $play; ?>"/>
						    <a href="javascript:form1.submit()" class="btn"><button type="button"><font size="5">次へ</font></button></a>
						</form>
					</div>
			</div>
		</div>
<script>
	function clickEvent() {
		var word = "<?php echo $word; ?>";
		alert(word);
	}
</script>
	<script>
    window.onload = function(){
    	ring();
    }
	function ring() {
	document.getElementById("Sound").play();
	}
	</script>
		<audio id="Sound" preload="auto">
		<source src="bgm/mazuha.mp3" >
	</audio>

</body>
</html>