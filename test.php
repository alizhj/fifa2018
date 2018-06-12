<?php include 'includes/header.php'; ?>	
<h1>hej</h1>


			<?php 
			
				
$sql = "INSERT INTO users (user_name, user_password, user_email, admin)
VALUES ('test', 'test', 'test@hej.se', 'false')";

if(mysqli_query($db_connect, $sql)){
	//success
	//echo "hej";
	$user = mysqli_insert_id($db_connect);
	echo $user;
	//header("Location: index.php");

}else{
	// echo a error message if the query dident work.
	echo "Error: ". $sql . "<br>" . mysqli_error($db_connect);
}
				?>


<?php include 'includes/footer.php'; ?>
