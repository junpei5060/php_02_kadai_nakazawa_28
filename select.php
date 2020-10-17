<?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=book_like;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM books");
$status = $stmt->execute();

//３．データ表示
// $view="";

// if ($status==false) {
//     //execute（SQL実行時にエラーがある場合）
//   $error = $stmt->errorInfo();
//   exit("ErrorQuery:".$error[2]);

// }else{
//   //Selectデータの数だけ自動でループしてくれる
//   //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
//   while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
//       $row[] = $result;
//     // $view = $result['name'];
//     // $viewtext =$result['text'];
//     // $viewurl =$result['url'];
//   }

// }
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ブックマークした書籍一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">新規登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
<?php
    $link=mysqli_connect("localhost","root","root","book_like");
    $query="SELECT * FROM books";
    $result=mysqli_query($link,$query);
    // <!-- <div class="container jumbotron"></div> -->
    echo "<table>";
        echo "<tr>
                  <th>書籍名</th>
                  <th>感想</th>
                  <th>URL</th>
              </tr>";
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['text']}</td>
                        <td>{$row['url']}</td>
                    </tr>";
        }
        echo "</table>";
    ?>
</table>
</div>
<!-- Main[End] -->

</body>
</html>

<style>
table {
                border-collapse:collapse;
                border:1px solid black;
                line-height:1.5;
            }
th{
    border-collapse:collapse;
                border:1px solid black;
                line-height:1.5;
}

tr{
    border-collapse:collapse;
                border:1px solid black;
                line-height:1.5;
}
td{
    border-collapse:collapse;
                border:1px solid black;
                line-height:1.5;
}

</style>