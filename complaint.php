<?php  include('connect.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM admintb WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$user_id = $n['user_id'];
			$password = $n['password'];
			$email = $n['email'];
			//$password ="aa";
			//$email = "bb";
		}
	}
?>