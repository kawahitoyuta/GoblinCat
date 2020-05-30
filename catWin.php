<?php 
include('./sqlConn.php');
$ct = 1;
$search = '';
foreach($play as $p){
    if($ct == 1){
        $search .= 'where ';
    }else{
        $search .= ' or ';
    }
    $search .= "id = $p";
    $ct++;
}
$catNum--;
$stmt = $pdo->query("UPDATE score set playcount = playcount + 1 $search");
$stmt = $pdo->query("UPDATE score set wincount = wincount + 1 where id = $play[$catNum]");
$stmt = $pdo->query("UPDATE score set score = score + 2 where id = $play[$catNum]");
$catNum++;
?>