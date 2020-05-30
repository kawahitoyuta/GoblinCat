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
$ct = 0;
foreach($play as $p){
    if($ct != $catNum){
        $stmt = $pdo->query("UPDATE score set wincount = wincount + 1 where id = $p");
        $stmt = $pdo->query("UPDATE score set score = score + 1 where id = $p");
    }
    $ct++;
}
$catNum++;
?>