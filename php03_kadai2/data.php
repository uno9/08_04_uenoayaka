<?php
function getUserData($params){
//1. DB接続
$dbn = 'mysql:dbname=gs_f02_db04;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    exit('dbError:'.$e->getMessage());
}

	//入力された検索条件からSQl文を生成
	$where = [];
	if(!empty($params['id'])){
		$where[] = "name'%{$params['name']}%'";
	}
	if(!empty($params['url'])){
		$where[] = "url '%{$params['url']}%'";
	}
	if(!empty($params['comment'])){
		$where[] = " comment '%{$params['comment']}%'";
	}
	if($where){
		$whereSql = implode(' AND ', $where);
		$sql = 'select * from users where ' . $whereSql ;
	}else{
		$sql = 'select * from users';
    }
    // error($where);
	
	//SQL文を実行する
	$UserDataSet = $Mysqli->query($sql);
	//扱いやすい形に変える
	$result = [];
	while($row = $UserDataSet->fetch_assoc()){
		$result[] = $row;
	}
	return $result;
}