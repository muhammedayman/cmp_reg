<?php  include('cs_connect.php');
$id="1";
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
 ?>
<?php 
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
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

<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
	<link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<script type="text/javascript" language="javascript">

$('#theDate').attr('value', today);
});
</script>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<?php  
	
$results = mysqli_query($db, "SELECT * FROM comp_tb");
while ($row = mysqli_fetch_array($results)) {
	$id=$row['id']; 
}
	?>


	<form method="post" action="cs_connect.php" >
		<div class="input-group">
		

			<label>Complaint Number	<?php echo $id+1; ?></label>
			<input type="hidden" id="theDate" name="datee" value="<?php $datee=date("d-m-Y"); echo $datee;?>">
			<span  id="theDate" name="date_in" > Date <?php echo date("d-m-Y");?></span> 
		</div>
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Department</label>
			<select name="department" style="width: 174px;">
  <option value="tdesk">T Desk</option>
  <option value="headoffice">Head Office</option>
    <option value="delta">T Desk</option>
  <option value="dcb">D C B</option>
    <option value="online">Online</option>
  <option value="airport">Airport</option>
  <option value="online">Online</option>
  <option value="airport">Airport</option>
 
</select>
		</div>
		<div class="input-group">
			<label>Building</label>
			<select name="building" style="width: 174px;">
  <option value="dcb">DCB</option>
  <option value="deltar">User</option>
 
</select>
</div>
		<div class="input-group">
<select name="floor" style="width: 174px;">
  <option value="first">First</option>
  <option value="second">Second</option>
   <option value="Third">Third</option>
  <option value="Fourth">Fourth</option>
   <option value="Fifth">Fifth</option>
  <option value="Sixth">Sixth</option>
 
</select>


		</div>
		<div class="input-group">
		

			<label>System problem</label>
			<input type="text" name="sys_prob" value="<?php echo $sys_prob; ?>">
		</div>
		<div class="input-group">
		

			<label>Network</label>
			<input type="text" name="network" value="<?php echo $network; ?>">
		</div>
		<div class="input-group">
		

			<label>Software</label>
			<input type="text" name="software" value="<?php echo $crs; ?>">
		</div>
		<div class="input-group">
		
	
	<button class="btn" type="submit" name="save" value="Save" >Save</button>
	

		</div>
	</form>
</body>
</html>