<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'akbar_cmp');

	// initialize variables
	$name = "";
	$user_id = "";
	$password = "";
	$email = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$user_id = $_POST['user_id'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		mysqli_query($db, "INSERT INTO admintb (name, user_id,password,email) VALUES ('$name', '$user_id', '$password', '$email')"); 
		$_SESSION['message'] = "user_id saved"; 
		header('location: admin.php');
	}
	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$user_id = $_POST['user_id'];
	$password = $_POST['password'];
		$email = $_POST['email'];

	mysqli_query($db, "UPDATE admintb SET name='$name', user_id='$user_id', password='$password', email='$email' WHERE id=$id");
	$_SESSION['message'] = "user_id updated!"; 
	header('location: admin.php');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM admintb WHERE id=$id");
	$_SESSION['message'] = "user_id deleted!"; 
	header('location: admin.php');
}
	
	?>