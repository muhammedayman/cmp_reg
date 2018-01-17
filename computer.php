<?php  include('cs_connect.php'); 
$status="it_dep"; 
$it_dep = "";
$solved_date = "";
$other = "";
?>
<?php 
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM comp_tb WHERE id=$id");
echo "head";
		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$department = $n['department'];
			$sys_prob = $n['sys_prob'];
			$status = $n['status'];
			$it_dep = $n['it_dep'];
			$solved_date = $n['solved_date'];
			$other = $n['other'];
			//$sys_prob ="aa";
			//$status = "bb";
		}
	}
?>
<html lang="en">
<head>

 <title>Computer Issues</title>
 <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <link href="css/tab.css" rel="stylesheet" id="bootstrap-css">

 <script src="js/jquery-1.10.2.min.js">

</script>
 <script src="js/bootstrap.min.js"></script>
 <script type="text/javascript">
 window.alert = function(){};
 var defaultCSS = document.getElementById('bootstrap-css');
 function changeCSS(css){
 if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />');
 else $('head > link').filter(':first').replaceWith(defaultCSS);
 }
 $( document ).ready(function() {
 var iframe_height = parseInt($('html').height());
 window.parent.postMessage( iframe_height, 'https://coderglass.com');
 });
 //$(".name").click(function () {
  //  alert($(this).find('span').html());
//});
/************************/
$(document).ready(function(){
    $(".prbl_name").click(function(){
      alert("");
	    window.location = '/player_detail?username=' + $(".prbl_name").text();
    });
})
$('#theDate').attr('value', today);
});
/**********************************/
 </script>
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
<?php $results = mysqli_query($db, "SELECT * FROM comp_tb"); ?>
<div class="container">
 <div class="row">
 <div class="col-sm-3 col-md-2">
 <a href="ithome.php" class="btn btn-danger btn-sm btn-block" role="button">IT HOME</a>
 </div>
 <div class="col-sm-9 col-md-10">
 <!-- Split button -->


 <!-- Single button -->
 <div class="btn-group">

 <ul class="dropdown-menu" role="menu">
 <li><a href="#">Mark all as read</a></li>
 <li class="divider"></li>
 <li class="text-center">
<small class="text-muted">Select messages to see more actions</small>
</li>
 </ul>
 </div>
 <div class="pull-right">
Problems
 <span class="text-muted"><b>1</b>â€“<b>50</b> of <b>277</b></span>
 <div class="btn-group btn-group-sm">
 <button type="button" class="btn btn-default">
 <span class="glyphicon glyphicon-chevron-left"></span>
 </button>
 <button type="button" class="btn btn-default">
 <span class="glyphicon glyphicon-chevron-right"></span>
 </button>
 </div>
 </div>
 </div>
 </div>
 <hr />
 <div class="row">
 <div class="col-sm-3 col-md-2">


 <ul class="nav nav-pills nav-stacked">
 
 <li class="active"><a href="crs.php"><span class="badge pull-right"></span>CRS </a>
 </li>
 <li class="active"><a href="network.php"><span class="badge pull-right"></span> Network </a>
 </li>
 
 </div>
 <div class="col-sm-9 col-md-10">
 <!-- Nav tabs -->

 <!-- Tab panes -->
 <div class="tab-content">
 <div class="tab-pane fade in active" id="home">
 <div class="list-group">
<?php while ($row = mysqli_fetch_array($results)) { ?>

                  
               <span class="glyphicon glyphicon-star-empty"></span>; 
<form method="POST" action="cs_connect.php">				
				<span class="" style="min-width: 120px; display: inline-block;"><?php echo $row['name']; ?></span>;

	
  <span class="prbl_name" style="padding-right:180px;">&nbsp;<?php echo $row['department']; ?><br></span> ;
				
             
        <span class="text-muted" style="font-size: 11px;"><?php echo $row['sys_prob']; ?></span> ;
				
	<!--	
	
-->
<input type="hidden" name="id" value="<?php echo  $row['id']; ?>">
<input type="hidden" id="theDate" name="solved_date" value="<?php $solved_date=date("d-m-Y"); echo $solved_date;?>">
	<select name="status">
 
<option  value="<?php  $status=$row['status']; echo $status;  ?>"><?php echo $row['status']; ?></option>
  <option value="<?php  $status="solved"; echo $status; ?>">Solved</option>
  <option value="<?php  $status="progress";echo $status ?>">Progress</option>
  <option value="<?php  $status="queud";echo $status ?>">Queued</option>

</select>	
	<select name="it_dep">
 
<option  value="<?php  $status=$row['it_dep']; echo $status;  ?>"><?php echo $row['it_dep']; ?></option>
  <option value="<?php  $status="sachin"; echo $status; ?>">Sachin</option>
  <option value="<?php  $status="sudheesh";echo $status ?>">Sudheesh</option>
  <option value="<?php  $status="hashim";echo $status ?>">Hashim</option>
 <option value="<?php  $status="aymen"; echo $status; ?>">Aymen</option>
  <option value="<?php  $status="arun";echo $status ?>">Arun</option>
  <option value="<?php  $status="rashid";echo $status ?>">Rashid</option>
</select>

<div class="input-group">
			<label>Other</label>
			<input type="text" name="other" value="<?php echo $other; ?>">
		</div>
		
   <span class="text-muted" style="font-size: 11px;">Solved day <?php echo $row['solved_date']; ?></span> ;  
      <input type="submit" name="update" value="Save"/>
</form>    
                
              
		<?php } ?>		
				
        
				
					<span class="pull-right">
					<span class="glyphicon glyphicon-paperclip">
                    </span></span>
					</a>

					
					


					
					
					
					
					
					
					
					
					
					
					
</div>
                </div>
                
            </div>
           
        </div>
    </div>
</div>

</body>
</html>
