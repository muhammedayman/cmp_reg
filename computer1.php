<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akbar_cmp";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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

/**********************************/
 </script>
</head>
<body>
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

<?php	
        $sql ="SELECT * FROM system_tb";
$output="";
//$sql = "SELECT id, name, password FROM system_tb";
 global $conn;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      // echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
 
				
				
				 $output.='<a href="#" class="list-group-item" >
                  <div class="checkbox">
                       <label>
                        <input type="checkbox">
                       </label>
                    </div>
               <span class="glyphicon glyphicon-star-empty"></span>'; 
				
				 $output.= '<span class="" style="min-width: 120px; display: inline-block;">'. $row["id"]. '</span>';

	
   $output.= '<span class="prbl_name" style="padding-right:180px;">&nbsp;'. $row["system_prblm"].'<br></span> ';
				
             
        //  $output.= '<span class="text-muted" style="font-size: 11px;">'. $row["email"].'</span> ';
				
				
				
			  
             //   $output.= '<span class="badge"> on '. $row["email"].'</span>';
          
                
              
				
				
        }        
        echo $output;
		?>
				
					<span class="pull-right">
					<span class="glyphicon glyphicon-paperclip">
                    </span></span>
					</a>
				<?php
}
$conn->close();

?>
					
					


					
					
					
					
					
					
					
					
					
					
					
</div>
                </div>
                
            </div>
           
        </div>
    </div>
</div>

</body>
</html>
<?php
?>