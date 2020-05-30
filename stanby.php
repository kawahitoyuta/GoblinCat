<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Goblin Cat</title>
	<link rel="stylesheet" href="css/standby_checkedbox.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body class="body_standby">
<!-- ヘッダー -->
	<div class="header-wrapper">
		<div class="header_main">
			<img src="img/logo_header_tra.png" alt="titlelogo" height="35" >
			<img src="img/arrow1.png" alt="arrow" height="35">
		</div>
	</div>
<!-- ヘッダーここまで -->
		<!-- コンテンツ -->
		<div class="contents_standby">
				<div class="torimidashi">
					<img src="img/tori1.png" alt="tori1" height="120" >
				</div>
		</div>
		<!-- ボックス-->
		<div class="box_cheese">
			<div class="box_standby">
				<div align="center">
				<div class="button-wrapper">
			<form action="stanbyok.php" method="post"  name="form1">

				<table align="center" class="table_standby">
					<p class="text">３人以上選んでね</p>
					<tr>
						<td><div class="tablepic"><input type="checkbox" name="play[]" value="1" id="1">
								<label for ="1" class="label"><img src="img/1_nara.png" width="150"></label></div></td>
						<td><input type="checkbox" name="play[]" value="5" id="5">
								<label for ="5" class="label"><img src="img/5_chibinao.png" width="150"></label></td>
						<td><input type="checkbox" name="play[]" value="9" id="9">
								<label for ="9" class="label"><img src="img/9_hippo.png" width="150"></label></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="play[]" value="2" id="2">
								<label for ="2" class="label"><img src="img/2_suro.png" width="150"></label></td>
						<td><input type="checkbox" name="play[]" value="6" id="6">
								<label for ="6" class="label"><img src="img/6_hosi.png" width="150"></label></td>
						<td><input type="checkbox" name="play[]" value="10" id="10">
								<label for ="10" class="label"><img src="img/10_miki.png" width="150"></label></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="play[]" value="3" id="3">
								<label for ="3" class="label"><img src="img/3_mikeko.png" width="150"></label></td>
						<td><input type="checkbox" name="play[]" value="7" id="7">
								<label for ="7" class="label"><img src="img/7_nakaji.png" width="150"></label></td>
						<td><input type="checkbox" name="play[]" value="11" id="11">
								<label for ="11" class="label"><img src="img/11_black.png" width="150"></label></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="play[]" value="4" id="4">
								<label for ="4" class="label"><img src="img/4_mikejero.png" width="150"></label></td>
						<td><input type="checkbox" name="play[]" value="8" id="8">
								<label for ="8" class="label"><img src="img/8_syacho.png" width="150"></label></td>
						<td><input type="checkbox" name="play[]" value="12" id="12">
								<label for ="12" class="label"><img src="img/12_takashi.png" width="150"></label></td>
					</tr>
				</table>

					<a href="javascript:form1.submit()"><button type="button"  onclick="clickBtn1()"><font size="4">決定！</font></button></a>
			</form>
					</div>
			</div>
		</div>
	</div>


<script>
function clickBtn1(){
	let count = 0;
    const  play = document.getElementsByName("play");
	for (i=0; i<12; i++) if (document.form1.elements[i].checked) {
        count++;
        }
	if(count < 3){
		alert("人数が足りません");
		window.location.href = 'stanby.php';
	}
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