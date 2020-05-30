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
if (isset($_POST['vote'])) {
	$vote = $_POST['vote'];
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
if($catNum == $vote){
	$res ='	<img src="img/mousewin.png" class="winpic" width="350px"><br>
	<p class="text">ゴブリンキャットは逃げていきました。。。<br>
	ネズミ側プレイヤーに1ポイント！<br></p>
	<br>';
	include('./catLose.php');
}else{
	$res ='	<img src="img/catwin.png" class="winpic" width="350px"><br>
	<p class="text">ネズミたちの家は滅んでしまいました…。<br>
	猫側プレイヤーに2ポイント！<br></p>
	<br>';
	include('./catWin.php');
}

$play = implode(",", $play);
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<title>Goblin Cat</title>
<link rel="stylesheet" href="css/style.css">
<script>

</script>
</head>
<body class="body_result">
	<!-- ヘッダー -->
	<div class="header-wrapper">
		<div class="header_main">
		<img src="img/logo_header_tra.png" alt="titlelogo" height="35" >
		<img src="img/arrow5.png" alt="arrow" height="35">
		</div>
	</div>
	<!-- ヘッダーここまで -->

	<!-- コンテンツ -->
	<div class="contents_result">
				<div class="torimidashi">
					<img src="img/tori5.png" alt="tori5" height="120">
		</div>
	</div>
		<!-- ボックス-->
		<div class="box_wood">
		<div class="box_result">

<?php 
echo $res;
$i = 1;
foreach($playerList as $p){
	if($i == $catNum){$word = $words[1];}else{$word = $words[2];}
	echo '<img src ="'.$p[2].'" width="100" />
	ワード:'.$word.'<br>';
	$i++;
}
?>
	</c:forEach>
		<div class="box3">
			<form action="nextUser.php" method="post" name="form1">
				<a href="javascript:form1.submit()" class="btn"><button type="button"><font size="5">もう一度プレー</font></button></a>
<?php 
$count -= 1;
$catNum = mt_rand(1, $count);
$wordNum = mt_rand(1, 440);
				foreach($playerList as $p){
                    echo '
					<input type="hidden" name="play[]"  value="'.$p[0].'"/>';
				}
?>
				<input type="hidden" name="playcount"  value="1"/>
				<input type="hidden" name="catNum"  value="<?php echo $catNum; ?>"/>
				<input type="hidden" name="wordNum"  value="<?php echo $wordNum; ?>"/>
				</form>
			</div>
			<div class="box3">
				<a href="main.php">
					<button type="button"><font size="5">戻る</font></button>
				</a>
					</div>
			</div>
	</div>
	<!-- コンテンツここまで -->
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