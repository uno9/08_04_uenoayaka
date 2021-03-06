<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザーログイン画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <style>
        div{
            padding: 10px;
            font-size:20px;
            }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">ユーザーログイン画面</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <a class="nav-link" href="user_select.php">データ一覧</a>


            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="user_select.php">データ一覧</a>
                        <!-- <a class="nav-link" href="search_index.php">地域検索</a> -->
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <form action="user_insert.php" method="post">
        <div class="form-group">
            <label for="lid">User ID</label>
            <input type="text" class="form-control" id="lid" name="lid" placeholder="大文字または小文字の英数字">
        </div>
        <div class="form-group">
            <label for="name">User name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="lpw">Pass word</label>
            <input type="password" class="form-control" id="lpw" name="lpw" placeholder="大文字または小文字の英数字">
        </div>
        <div class="form-group">
            <label for="kanri_flg">Role</label>
            <input type="radio" class="form-kanri_flg" id="kanri_flg0" name="kanri_flg" value="0" checked=checked><label for="kanri_flg0">一般ユーザー</noframes></label>
            <input type="radio" class="form-kanri_flg" id="kanri_flg1" name="kanri_flg"  value="1"><label for="kanri_flg1">管理者ユーザー</label>

        </div>
        <!-- <div class="form-group">
            <label for="life_flg">Active</label>
            <input type="radio" class="form-life_flg" id="life_flg０" name="life_flg" value="0" checked=checked>0:アクティブ
            <input type="radio" class="form-life_flg" id="life_flg１" name="life_flg" value="1">1:非アクティブ

        </div> -->

        <!-- <div class="form-group">
            <label for="name">User name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="name">User name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div> -->

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    

</body>

</html>