<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'akbar_cmp');

	// initialize variables
	$name = "";
		$it_dep = "";
		$status = "";
		$building = "";
		$floor ="";
		$sys_prob = "";
		$network = "";
		$crs = "";
		$datee = "";
		$solved_date = "";
		$other = "";
         $id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		
		$name = $_POST['name'];
		$department =  $_POST['department'];
		$status = "new";
		
		$building = $_POST['building'];
		$floor = $_POST['floor'];
		$sys_prob = $_POST['sys_prob'];
		
		$network = $_POST['network'];
		$crs = $_POST['software'];
		$datee = $_POST['datee'];
		
		
		
		//mysqli_query($db, "INSERT INTO comp_tb (name, department,date,status) VALUES ('$name', '$it_dep', '$status', '$building')");

		mysqli_query($db, "INSERT INTO comp_tb (name, department,status,building,floor,sys_prob,network,crs,date) VALUES ('$name', '$department', '$status', '$building', '$floor', '$sys_prob', '$network', '$crs', '$datee')"); 
		$_SESSION['message'] = "complaint registered"; 
		header('location: computer.php');
	}
	if (isset($_POST['update'])) {
		
	$id = $_POST['id'];
	$status = $_POST['status'];
	$it_dep = $_POST['it_dep'];
	$solved_date = $_POST['solved_date'];
		$other = $_POST['other'];

	mysqli_query($db, "UPDATE comp_tb SET status='$status', it_dep='$it_dep', solved_date='$solved_date', other='$other' WHERE id=$id");
	$_SESSION['message'] = "it_dep updated!"; 
	header('location: computer.php');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM comp_tb WHERE id=$id");
	$_SESSION['message'] = "it_dep deleted!"; 
	header('location: computer.php');
}
	
	?>