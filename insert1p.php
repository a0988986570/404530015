<?php

include '123.php'; 

    $content = $_POST["content"];

    if($content != null){
	$sql="INSERT INTO `test1`(`content`) VALUES ('$content')";
	 if(mysqli_query($conn,$sql)){
	 	echo '新增成功! 請稍後...';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=test.php>';
	 }else{
	 	echo '新增失敗!';
        
	 }
}else{
	echo "請輸入完整";
	echo '<meta http-equiv=REFRESH CONTENT=2;url=文字雲.php>';
}

	mysqli_close($conn);

?>


