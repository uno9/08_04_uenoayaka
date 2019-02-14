<?php
//1. DB接続
include('user_functions.php');

//POSTデータ取得

// $comment=$_POST['comment'];
    // exit($name);

$pdo=db_conn();


//2. データ表示SQL作成
$sql = 'SELECT * FROM user_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//3. データ表示
$view='';
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<li class="list-group-item">';
        $view .= '<p>'.$result['indate'].'_'.$result['lid'].'_'.$result['name'].'_'.$result['kanri_flg'].'_'.$result['life_flg'].'</p>'; //'.$result['comment'].'
        $view .= '<a href="user_detail.php?id='.$result['id'].'" class="badge badge-primary">Edit</a>';
        $view .= '<a href="user_delete.php?id='.$result['id'].'" class="badge badge-danger">Delete</a>';

        $view .= '</li>';
    }
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ユーザー保存リスト表示</title>
    <style>
        .map {
            height:500px;
            width:100%;
        }


div {
            padding: 10px;
            font-size: 16px;
        }


     </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">保存一覧</a>
            <a class="nav-link" href="user_index.php">データ登録</a>
            <!-- <a class="nav-link" href="search.php">地域検索</a> -->
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <!-- <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">データ登録</a>
                        <a class="nav-link_search" href="input.html">地域検索</a>
                    </li>
                </ul>
            </div> -->
        </nav>
    </header>

    <div>
        <ul class='list-group'>
            <!-- ここにDBから取得したデータを表示しよう -->
            <?=$view?>
        </ul>
    </div>






</body>

</html>