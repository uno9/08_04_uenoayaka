<?php
// var_dump($_GET);


// 関数ファイルの読み込み
include('user_functions.php');

//GETデータ取得
$id=$_GET['id'];

//POSTデータ取得

// $comment=$_POST['comment'];
    // exit($name);

$pdo=db_conn();


//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT * FROM user_table WHERE id=:id';//WHERで一行上書き
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status==false) {
    // エラーのとき
    errorMsg($stmt);
} else {
    // エラーでないとき
    $rs = $stmt->fetch();
    $check_kanri = '';
    $check_life = '';

    if($rs['kanri_flg']==0){
        $check_kanri .= '<input type="radio" class="form-kanri_flg" id="kanri_flg0" name="kanri_flg" value="0" checked="checked"><label for="kanri_flg0">一般ユーザー</noframes></label>';
        $check_kanri .= '<input type="radio" class="form-kanri_flg" id="kanri_flg1" name="kanri_flg" value="1"><label for="kanri_flg1">管理者</noframes></label>';
    }else{
        $check_kanri .= '<input type="radio" class="form-kanri_flg" id="kanri_flg0" name="kanri_flg" value="0"><label for="kanri_flg0">一般ユーザー</noframes></label>';
        $check_kanri .= '<input type="radio" class="form-kanri_flg" id="kanri_flg1" name="kanri_flg" value="1" checked="checked"><label for="kanri_flg1">管理者</noframes></label>';
    }
    
    if($rs['life_flg']==0){
        $check_life .= '<input type="radio" class="form-life_flg" id="life_flg0" name="life_flg" value="0" checked="checked"><label for="life_flg0">参加中</noframes></label>';
        $check_life .= '<input type="radio" class="form-life_flg" id="life_flg1" name="life_flg" value="1"><label for="life_flg1">非参加中</noframes></label>';
    }else{
        $check_life .= '<input type="radio" class="form-life_flg" id="life_flg0" name="life_flg" value="0" ><label for="life_flg0">参加中</noframes></label>';
        $check_life .= '<input type="radio" class="form-life_flg" id="life_flg1" name="life_flg" value="1" checked="checked" ><label for="life_flg1">非参加中</noframes></label>';
    }

    // var_dump($rs);
    // fetch()で1レコードを取得して$rsに入れる
    // $rsは配列で返ってくる．$rs["id"], $rs["task"]などで値をとれる
    // var_dump()で見てみよう
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザー更新ページ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div{
            padding: 10px;
            font-size:16px;
            }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">ユーザー更新</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <a class="nav-link" href="user_select.php">データ一覧</a>

            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="user_index.php">ユーザー登録</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_select.php">ユーザー一覧</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <form method="post" action="user_update.php">
        <div class="form-group">
            <label for="id">User ID</label>
            <input type="text" class="form-control" id="lid" name="lid" placeholder="大文字または小文字の英数字" value="<?=$rs['lid']?>">
        </div>
        <div class="form-group">
            <label for="name">User name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$rs['name']?>">
        </div>
        <div class="form-group">
            <label for="pass">Pass word</label>
            <input type="password" class="form-control" id="lpw" name="lpw" placeholder="大文字または小文字の英数字" value="<?=$rs['lpw']?>">
        </div>
        <div class="form-group">
            <label for="kanri_flg">Role</label>
            <?=$check_kanri?>
            <!-- <input type="radio" class="form-kanri_flg" id="kanri_flg0" name="kanri_flg" value="0"><label for="kanri_flg0">一般ユーザー</noframes></label> checked=checked -->
            <!-- <input type="radio" class="form-kanri_flg" id="kanri_flg1" name="kanri_flg" value="1"><label for="kanri_flg1">管理者ユーザー</label> -->

        </div>
        <div class="form-group">
            <label for="life_flg">Active</label>
            <?=$check_life?>

            <!-- <input type="radio" class="form-life_flg" id="life_flg０" name="life_flg" value="0" >参加中 checked=checked-->
            <!-- <input type="radio" class="form-life_flg" id="life_flg１" name="life_flg" value="1">非参加中 --> 

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- idは変えたくない = ユーザーから見えないようにする-->
        <input type="hidden" name="id" value="<?=$rs['id']?>">
    </form>

</body>

</html>