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

<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
	<link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<?php $results = mysqli_query($db, "SELECT * FROM admintb"); ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>User ID</th>
			<th>Email</th>
			<th>Password</th>
			<th colspan="4">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['user_id']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td>
				<a href="admin.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="connect.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	<form method="post" action="connect.php" >
		<div class="input-group">
		
<input type="hidden" name="id" value="<?php echo $id; ?>">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>user_id</label>
			<input type="text" name="user_id" value="<?php echo $user_id; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="text" name="password" value="<?php echo $password; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
		
	<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
    <?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
	<?php endif ?>

		</div>
	</form>
</body>
</html>