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
    <form action="http://google.com/">
      <div class="searchb"><br/>
        Search the Web:
        <input type="text" name="search" class="text" />
        <input type="submit" value="Go" class="submit" />
      </div>
    </form>
    <a href="http://tcnj.edu/">TCNJ Homepage</a>
    </div>
    
    <div class="bridge">
    <div class="title"><h1>Study Buddy</h1><br></div>
    
  </div>
  <div class="nav">
    <ul>
       <li><a href="index.html">Home</a> | </li>
      <li><a href="login.php">Login</a> | </li>
      <li><a href="register.php">Register</a> | </li>
      
    </ul>
  </div>
    

    
  <div class="center">
    <h1>Login Form </h1>

<form action="" method="POST">
Username: <input type="text" name="user"><br />
Password: <input type="password" name="pass"><br />	
<input type="submit" value="Login" name="submit" />
</form>
</div>

<?php
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	$user=$_POST['user'];
	$pass=$_POST['pass'];

	$con=mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('studybuddy_database') or die("cannot select DB");

	$query=mysql_query("SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");
	$numrows=mysql_num_rows($query);
	if($numrows!=0)
	{
	while($row=mysql_fetch_assoc($query))
	{
	$dbusername=$row['username'];
	$dbpassword=$row['password'];
	}

	if($user == $dbusername && $pass == $dbpassword)
	{
	session_start();
	$_SESSION['sess_user']=$user;

	/* Redirect browser */
	header("Location: member.php");
	}
	} else {
	echo "Invalid username or password!";
	}

} else {
	echo "All fields are required!";
}
}
?>

</body>
</html>