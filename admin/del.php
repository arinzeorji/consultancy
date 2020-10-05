<?php

include ('db.php');

$id=$_GET['id'];
if($id=="")
{
echo '<script>alert("Sorry ! Wrong Entry") </script>' ;
		


}

else{
$view="DELETE FROM `clients` WHERE id ='$id' ";

	if($re = mysqli_query($con,$view))
	{
		echo '<script>alert("client deleted successfully") </script>' ;
		echo "<script>window.open('home.php','_self')</script>";	
	}
}







?>