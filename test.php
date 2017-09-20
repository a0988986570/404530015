<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>test</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div id="header">
		<h1>文字雲</a></h1>
		<p class="copy"></p>
		<ul id="navi">
		<li id="navi_01"><a href="wordcloud.php">網址</a></li>
		<li id="navi_02"><a href="temp.html">文字雲</a></li>
		<li id="navi_03"><a href="test.php">test</a></li>
		</ul>
	    </div>

 <div id="contents">
<center>
   
  <?php
  include '123.php'; 

  $sql="SELECT * FROM `test1` WHERE 1";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
    echo '<center>
    <tr>
    </tr>
      ';

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>".$row["content"]."</tr>";
    }
    echo "</center>";
    }
    else {echo "0 results";}

?>
        
       
  </center>
   </div>

</body>
</html>