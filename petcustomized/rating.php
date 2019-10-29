<?php 
if(isset($_POST)){
	$conn = mysqli_connect('54.193.22.204','tester','password','project_281');
	if(mysqli_query($conn,"INSERT INTO petcustomizedstar VALUES('','".$_POST['v1']."','".$_POST['v2']."','".$_POST['v3']."')")){
		echo "1";		
	}else{
		echo "2";
	}
}
?>