<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>文字雲</title>
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
        <?php 
        echo '<div class="detail_box clearfix">
		<div class="link_box">
		<form action="insert1.php" method="POST">
			<h3>輸入網址</h3>
			<ul></br>
		    網址：<input type="text" name="content" />
			<input type="submit" value="送出">
            </form>

            </br></ul>
			</div>
			</div>';
			?>
        </div>
			
	</body>

</html>