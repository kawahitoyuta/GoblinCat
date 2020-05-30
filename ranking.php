<?php
  include('./sqlConn.php');
  $rows = "";
  $rankList = [];
  $stmt = $pdo->query('select score.id,score,playcount,wincount,floor(wincount/playcount*100)as winper,player.name from score left join player on score.id = player.id order by winper desc,wincount desc;');
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //$resultに格納した連想配列のplanを抽出し、$rowsに格納。planがある限り、$rowsに追加していく
    if($result['winper'] == null){
      $result['winper'] = '0';
    }
    $rows = [$result['score'],$result['playcount'],$result['wincount'],$result['winper'],$result['name']];
    array_push($rankList, $rows);
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ranking</title>
<link rel="stylesheet" href="css/rankingtable.css">
<link rel="stylesheet" href="css/style.css">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
</head>
<body class="body_ranking">
<!-- ヘッダー -->
	<div class="header_main">
		<img src="img/logo_header_tra.png" alt="titlelogo" height="40" >
	</div>
<!-- ヘッダーここまで -->
<!-- コンテンツ -->
	<div class="ranking_outside">
			<div class="rankingtitle">
				<img src="img/rankingtitle.png" alt="titlelogo" height="80">
				<div class="capybara">
				<img src="img/capybara.png" alt="capybara" height="80"></div>
			</div>

			<div class="box_ranking">

			<!-- 中西作成ランキングテーブルここから -->
	<table class="table_ranking">
			<tr>
				<th>順位</th>
				<th>キャラ名</th>
				<th>プレイ数</th>
				<th>勝利数</th>
				<th>スコア</th>
				<th>勝率</th>
			</tr>
  <tr bgcolor="#FFD700">
  	<td bgcolor="white"><img src="img/rank1.png" height="50"></td>
    <td class="rankribbon1"><?php echo $rankList[0][4]; ?></td>
    <td><?php echo $rankList[0][1]; ?></td>
    <td><?php echo $rankList[0][2]; ?></td>
    <td><?php echo $rankList[0][0]; ?></td>
    <td class="rankribbon2"><?php echo $rankList[0][3]; ?></td>
  </tr>
  <tr bgcolor="#C0C0C0">
   	<td bgcolor="white"><img src="img/rank2.png" height="50"></td>
    <td class="rankribbon1"><?php echo $rankList[1][4]; ?></td>
    <td><?php echo $rankList[1][1]; ?></td>
    <td><?php echo $rankList[1][2]; ?></td>
    <td><?php echo $rankList[1][0]; ?></td>
    <td class="rankribbon2"><?php echo $rankList[1][3]; ?></td>
  </tr>
  <tr bgcolor="#da744b">
   	<td bgcolor="white"><img src="img/rank3.png" height="50"></td>
    <td class="rankribbon1"><?php echo $rankList[2][4]; ?></td>
    <td><?php echo $rankList[2][1]; ?></td>
    <td><?php echo $rankList[2][2]; ?></td>
    <td><?php echo $rankList[2][0]; ?></td>
    <td class="rankribbon2"><?php echo $rankList[2][3]; ?></td>
  </tr>
  <tr bgcolor="white">
    <td bgcolor="white"><img src="img/rank4.png" height="40"></td>
    <td class="rankribbon1"><?php echo $rankList[3][4]; ?></td>
    <td><?php echo $rankList[3][1]; ?></td>
    <td><?php echo $rankList[3][2]; ?></td>
    <td><?php echo $rankList[3][0]; ?></td>
    <td class="rankribbon2"><?php echo $rankList[3][3]; ?></td>
  </tr>
  <tr bgcolor="white">
    <td bgcolor="white"><img src="img/rank5.png" height="40"></td>
    <td class="rankribbon1"><?php echo $rankList[4][4]; ?></td>
    <td><?php echo $rankList[4][1]; ?></td>
    <td><?php echo $rankList[4][2]; ?></td>
    <td><?php echo $rankList[4][0]; ?></td>
    <td class="rankribbon2"><?php echo $rankList[4][3]; ?></td>
  </tr>
  <tr bgcolor="white">
    <td bgcolor="white"><img src="img/rank6.png" height="40"></td>
      <td class="rankribbon1"><?php echo $rankList[5][4]; ?></td>
    <td><?php echo $rankList[5][1]; ?></td>
    <td><?php echo $rankList[5][2]; ?></td>
    <td><?php echo $rankList[5][0]; ?></td>
    <td class="rankribbon2"><?php echo $rankList[5][3]; ?></td>
  </tr>
  <tr bgcolor="white">
    <td bgcolor="white"><img src="img/rank7.png" height="30"></td>
         <td class="rankribbon1"><?php echo $rankList[6][4]; ?></td>
    <td><?php echo $rankList[6][1]; ?></td>
    <td><?php echo $rankList[6][2]; ?></td>
    <td><?php echo $rankList[6][0]; ?></td>
    <td class="rankribbon2"><?php echo $rankList[6][3]; ?></td>
  </tr>
  <tr bgcolor="white">
    <td bgcolor="white"><img src="img/rank8.png" height="30"></td>
    <td class="rankribbon1"><?php echo $rankList[7][4]; ?></td>
    <td><?php echo $rankList[7][1]; ?></td>
    <td><?php echo $rankList[7][2]; ?></td>
    <td><?php echo $rankList[7][0]; ?></td>
    <td class="rankribbon2"><?php echo $rankList[7][3]; ?></td>
  </tr>
  <tr bgcolor="white">
    <td bgcolor="white"><img src="img/rank9.png" height="30"></td>
    <td class="rankribbon1"><?php echo $rankList[8][4]; ?></td>
    <td><?php echo $rankList[8][1]; ?></td>
    <td><?php echo $rankList[8][2]; ?></td>
    <td><?php echo $rankList[8][0]; ?></td>
    <td class="rankribbon2"><?php echo $rankList[8][3]; ?></td>
  </tr>
  <tr bgcolor="white">
    <td bgcolor="white"><img src="img/rank10.png" height="35"></td>
    <td class="rankribbon1"><?php echo $rankList[9][4]; ?></td>
    <td><?php echo $rankList[9][1]; ?></td>
    <td><?php echo $rankList[9][2]; ?></td>
    <td><?php echo $rankList[9][0]; ?></td>
    <td class="rankribbon2"><?php echo $rankList[9][3]; ?></td>
  </tr>
  <tr bgcolor="white">
    <td bgcolor="white"><img src="img/rank11.png" height="35"></td>
    <td class="rankribbon1"><?php echo $rankList[10][4]; ?></td>
    <td><?php echo $rankList[10][1]; ?></td>
    <td><?php echo $rankList[10][2]; ?></td>
    <td><?php echo $rankList[10][0]; ?></td>
    <td class="rankribbon2"><?php echo $rankList[10][3]; ?></td>
  </tr>
  <tr bgcolor="white">
    <td bgcolor="white"><img src="img/rank12.png" height="20"></td>
   <td class="rankribbon1"><?php echo $rankList[11][4]; ?></td>
    <td><?php echo $rankList[11][1]; ?></td>
    <td><?php echo $rankList[11][2]; ?></td>
    <td><?php echo $rankList[11][0]; ?></td>
    <td class="rankribbon2"><?php echo $rankList[11][3]; ?></td>
  </tr>
</table>
			<!-- 中西作成ランキングテーブルここまで -->

		 		<div class="close">
					<a href="#" onClick="window.close();"><i class="fas fa-window-close fa-3x fontawesome2 faa-ring animated-hover"></i></a><p>閉じる</p><br/>
			  	</div>
	 </div>
</div>
</body>
</html>