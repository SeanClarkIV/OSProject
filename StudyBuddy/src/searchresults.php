<!DOCTYPE html>
<html>
<head>
<title>login</title>

<style type="text/css" media="all">
@import "images/style.css";
</style>



</head>
<body>


<div class="content">



   <div id="submenu">
    
      
   
    <a href="http://tcnj.edu/"><br>TCNJ Homepage</a>
    </div>
    
    
    <div class="bridge">
    <h1>Study Buddy</h1><br> 
  	</div>
  
  
  <div class="nav">
    <ul>
       <li><a href="index.php">Home</a> | </li>
      <li><a href="login.php">Login</a> | </li>
      <li><a href="register.php">Register</a> | </li>
      
    </ul>
  </div>
    

    
 <div class="center12">
<?php
include("dbconnect.php");

if(!isset($_POST['search']))
{
	header("Location: index.php");
}

$search_sql="SELECT * FROM groups WHERE department
LIKE '%".$_POST['search']."%' OR subject 
LIKE '%".$_POST['search']."%' OR description 
LIKE '%".$_POST['search']."%'";
$search_query = mysql_query($search_sql) or die('Invalid query: ' .mysql_error());
if(mysql_num_rows($search_query)!=0)
{
$search_rs=mysql_fetch_assoc($search_query);
}

?>

<h1> Search Results <h1>
<?php
	if(mysql_num_rows($search_query)!=0)
{
	do
	{
?>		<p><?php echo "Department: "; echo $search_rs['department']?><br>
			<?php echo "Subject: ";echo $search_rs['subject']?><br>
			<?php echo "Description: ";echo $search_rs['description']?><br><br><br></p>

<?php 
  }
	while ($search_rs=mysql_fetch_assoc($search_query));
	
} 
else 
{
	echo "No results found";
}

?>
 
</div>


</div>
 <div class="footer">
  <div class="padding"> </div>
  </div>






</body>
</html>



