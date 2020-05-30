<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=goblincat;charset=utf8','root','root',
    array(PDO::ATTR_EMULATE_PREPARES => false));
  }
  catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
  }
?>