<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="説明やで">
    <meta name="author" content="DAFU">
    <link rel="icon" href="../../favicon.ico">
    <link rel="stylesheet" href="/css/style.css">
    <title>応募フォーム|自作パソコン部</title>
    <script src="/js/temp.js">
  </head>

  <body>
   <div id="head"></div>
      <div class="title">
        <h1>自作パソコン部</h1>
      </div>
        <div class="form" align="center">
            <h3>応募フォーム</h3>
            <form method="POST" action="/form.php">
                <p>名前 <br><input type="text" name="personal_name" required></p>
                <p>Twitter ID <br><input type="text" name="twitter" required></p>
                <p>Skypeアカウントを持っていますか?</p>
                <p>
                <input type="radio" name="skype" value="はい">はい
                <input type="radio" name="skype" value="いいえ">いいえ
                </p>
                <input type="submit" name="btn1" value="投稿する">
                <a href="/form.php"><button>リロード</button></a>
            </form>
        </div>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    writeData();
}


function writeData(){
    $name = $_POST['personal_name'];
    $user = $_POST['twitter'];
    $skype = $_POST['skype'];

    $data = $data."$name,$user,$skype"."\n";
    $open_file = 'oubo.csv';
    $fp = fopen($open_file, 'ab');

    if ($fp){
        if (flock($fp, LOCK_EX)){
            if (fwrite($fp,  $data) === FALSE){
                print('ファイル書き込みに失敗しました');
            }

            flock($fp, LOCK_UN);
        }else{
            print('ファイルロックに失敗しました');
        }
    }

    fclose($fp);
}

?>

 </body>
</html>