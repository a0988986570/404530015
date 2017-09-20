<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pages</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        table {
            margin-left:auto; 
            margin-right:auto;
        }
    </style>
</head>
<body>
    <?php
        $servername="127.0.0.1";
$username="root";
$password="2576";
$dbname="Healthcare";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("connection Failed.");}
echo "connection Success <br>";

        $sql = "SELECT * FROM News ORDER BY 'ID'"; //SQL 語法
        $result = mysqli_query($conn, $sql) or die("Error");

        $data_nums = mysqli_num_rows($result); //統計總比數
        $per = 5; //每頁顯示項目數量
        $pages = ceil($data_nums/$per); //取得不小於值的下一個整數
        if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
            $page=1; //則在此設定起始頁數
        } else {
            $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
        }
        $start = ($page-1)*$per; //每一頁開始的資料序號
        $result = mysqli_query($conn, $sql.' LIMIT '.$start.', '.$per) or die("Error");
    ?>

    <table>
        <tr>
            <th colspan="3" style="font-size:25px;">最新消息</th>
        </tr>
        <tr>
            <th>日期</th>
            <th>標題</th>
            <th>內容</th>
        </tr>

    <?php
        //輸出資料內容
        while ($row = mysqli_fetch_array ($result))
        {
            $DATE = $row['Date'];
            $TITLE = $row['Title'];
            $CONTENT = $row['Content'];
        
            echo '
            <tr>
                <td>'. $DATE .'</td>
                <td>'. $TITLE .'</td>
                <td>'. $CONTENT .'</td>
            </tr>';
        }
    ?>
    
    </table>

    <br/>
    
    <center>
    <?php
        //分頁頁碼
        echo "<br /><a href=?page=1>首頁</a> ";
        
        for( $i=1 ; $i<=$pages ; $i++ ) {
            if ( $page-5 < $i && $i < $page+5 ) {
                echo "<a href=?page=".$i.">".$i."</a> ";
            }
        } 
        echo "<a href=?page=".$pages.">末頁</a>，第". $page ."頁/共". $pages ."頁<br/>";

        echo '共 '.$data_nums.' 筆';
    ?>
    </center>
</body>
</html>