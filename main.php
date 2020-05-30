<?php

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
 <title>Goblin Cat</title>
<link rel="stylesheet" href="css/style.css">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
</head>
<body class="body_main">
	<!-- ヘッダー -->
	<div class="header-wrapper">
		<div class="header_main">
		<a href=""><index class="php"></index>
			<img src="img/logo_header_tra.png" alt="titlelogo" height="40" >
		</a>
		</div>
	</div>
	<!-- ヘッダーここまで -->
	<!-- コンテンツ -->
	<div class="contents-wrapper">
	<div class="contents">

		<!-- 見出し -->
		<div class="menu_title">
			<div class="menu_cat"><img src="img/goblincat.png" height="180"></div>
				<div class="menu"><img src="img/menu.png" height="125"></div>
			<div class="menu_mouse"><img src="img/mikejero.png" height="110"></div>
		</div>

		<!-- 見出しここまで -->
		<!-- ボックス -->
		<div class="box_menu_outside">
			<div class="box_menu">

					<table align="center">
						<col width="250">
						<col width="250">
						<tr>
							<td><a href="stanby.php">
									<i class="fas fa-gamepad fa-6x fontawesome faa-ring animated-hover"></i><!-- ゲームパッド--></a>
										<p class="menu_p">ゲーム</p></td>
							<td><form method="post"  action="ranking.php"  name="form1" target="_blank" >
								<a href="javascript:form1.submit()"><i class="fas fa-crown fa-6x fontawesome faa-ring animated-hover"></i></a>
                                </form><p class="menu_p">ランキング</p></td>
						</tr>
						<tr>
							<td><a href="HowToPlay.php" target="_blank" class="btn"><i class="fas fa-book-open fa-6x fontawesome faa-ring animated-hover"></i><!-- ブック --></a><p class="menu_p">遊び方</p></td>
							<td><a href="charcter.php" target="_blank" class="btn"><i class="fas fa-paw fa-6x fontawesome  faa-ring animated-hover"></i><!-- パウ --></a><p class="menu_p">キャラクター説明</p></td>
						</tr>
					</table>

			</div>
		</div>
		<!-- ボックスここまで -->
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
		<audio loop id="Sound" preload="auto">
		<source src="bgm/mazuha.mp3" >
	</audio>
</body>
</html>