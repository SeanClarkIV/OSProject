<?php 
session_start();
if(!isset($_SESSION["sess_user"])){
	header("location:login.php");
} else {
?>

<!DOCTYPE html>
<html>
<head>
<title>User Page</title>

<style type="text/css" media="all">
@import "images/style.css";
</style>





</head>
<body>


<div class="content">





  <div id="submenu">
    
      
    <a href="http://tcnj.edu/"><br>TCNJ Homepage</a>
    </div>
    
    
  <div class="center12">
    <div class="title"><h2>Welcome, <?=$_SESSION['sess_user'];?>! 
    </h2><br></div>
    
  </div>
  <div class="nav">
    <ul>
      <li><a href="index.php">Home</a> | </li>
      <li><a href="logout.php">Logout</a> | </li>
    </ul>
  </div>
 
<div class="center12">
    <h1>Create Groups</h1>

<form action="" method="POST">
Department: <input type="text" name="dept"><br />
Subject: <input type="text" name="sub"><br />
Description:<br /> <textarea name="message" rows="10" cols="30">
About the group...
</textarea>
<br><br>

<input type="submit" value="Create Group" name="submit" />
</form>
</div>

<?php
if(isset($_POST["submit"])){

if(!empty($_POST['dept']) && !empty($_POST['sub']) && !empty($_POST['message'])) 
{
	$dept=$_POST['dept']; 
	$sub=$_POST['sub'];
	$message=$_POST['message'];

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('studybuddy_database') or die("cannot select DB");

	$query=mysql_query("SELECT * FROM groups WHERE department='".$dept."' AND subject='".$sub."' AND description='".$message."' " );
	$numrows=mysql_num_rows($query);
	if($numrows==0)
	{
	$sql="INSERT INTO groups(department,subject,description) VALUES('$dept','$sub','$message')";

	$result=mysql_query($sql);


	if($result){
	header("Location: SuccGroup.php");
    exit();
	} else {
	header("Location: UnsuccGroup.php");
    exit();
	}

	} else {
	header("Location: alreadyexist.php");
    exit();
	}

} else {
	echo "All fields are required!";
}
}

?>














</body>
</html>



<?php
}



