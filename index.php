<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Goblin Cat</title>
<link rel="stylesheet" href="css/style.css">
</head>
<!-- ボディー -->
<body class="body_main">
	<!-- ヘッダー -->
	<div class="header-wrapper">
		<div class="header_main">
		<a href="index.jsp">
		<img src="img/logo_header_tra.png" alt="titlelogo" height="40" >
		</a>
		</div>
	</div>
	<!-- ヘッダーここまで -->
		<div class="titlelogo">
			<img src="img/goblincatlogo.png" alt="goblincat" class="titlelogo"><br>
		</div>

		<div class="button-wrapper">
					<p><a href="main.php" onClick="sound()" class="btn_circle">
						<font size = "6" face="Berlin Sans FB">GAME</font>
					</a></p>
		</div>

 		<!-- BGM -->

<audio id="sound" preload="auto">
    <source src="bgm/index.mp3" type="audio/mp3">
</audio>

<script>
aScriptJavaScript
(function (window, $) {
  'use strict';

  $.fn.useSound = function (_event, _id) {
    var se = $(_id);
    this.on(_event, function(){
      se[0].currentTime = 0;
      se[0].play();
    });
    return this;
  };

})(this, this.jQuery);

$('.btn a').useSound('mousedown touchstart', '#sound');
1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
(function (window, $) {
  'use strict';

  $.fn.useSound = function (_event, _id) {
    var se = $(_id);
    this.on(_event, function(){
      se[0].currentTime = 0;
      se[0].play();
    });
    return this;
  };

})(this, this.jQuery);

$('.btn a').useSound('mousedown touchstart', '#sound');
</script>
		<!-- BGMここまで -->
</body><!-- ボディーここまで -->
</html>
</body>
</html>