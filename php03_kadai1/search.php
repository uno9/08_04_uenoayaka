<?php

	require('functions.php');//DB接続

//データベース検索
$str_sql = 'SELECT * FROM `gs_bm_table` WHERE `name,url`=""';
$res = $mysqli->query($str_sql);
if (!$res) {error_log($mysqli->error);exit;}
while($dat = $res->fetch_assoc()){
}


?>

<!DOCTYPE html>
    <html lang="ja">
<head>
    <meta charset="utf-8">
    <title>検索結果</title>
</head>
<body>
<?php
while ($table = mysqli_fetch_assoc($recordSet)) {
?>

<p><?php print(htmlspecialchars($table['message'])); ?></p>

<?php
}
?>
</body>
</html>