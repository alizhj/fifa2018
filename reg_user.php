
<?php
include 'includes/db_connect.php';

//Saves the values from the registration form into the database.
$username = mysqli_real_escape_string($db_connect,$_POST['username']);
$password = md5(mysqli_real_escape_string($db_connect,$_POST['password']));
$email = mysqli_real_escape_string($db_connect,$_POST['email']);
$group = mysqli_real_escape_string($db_connect,$_POST['selected_tournament']);
$premisson = 'false';

$sql = "INSERT INTO users (user_name, user_password, user_email, admin)
VALUES ('$username', '$password', '$email', '$premisson')";

if(mysqli_query($db_connect, $sql)){
	//success
	$user_id = mysqli_insert_id($db_connect);
	

	$tour = "INSERT INTO user_tournaments (tournament_id, user_name, user_id)
		VALUES ('$group', '$username', '$user_id')";

	mysqli_query($db_connect, $tour);
	header("location: slutspel.php");
	echo "<h2><a href='index.php'>Thank you for creating a user. Now you can go back and login.</a></h2>";


}else{
	// echo a error message if the query dident work.
	echo "Error: ". $sql . "<br>" . mysqli_error($db_connect);
}

?>
