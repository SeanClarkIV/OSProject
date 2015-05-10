<?php 
  if(isset($_POST['submit'])){ 
  if(isset($_GET['go'])){ 
  if(preg_match("^/[A-Za-z]+/", $_POST['name'])){ 
   $name=$_POST['name']; 
  } 
  } 
	  else{ 
	  echo  "<p>Please enter a search query</p>"; 
	  } 
	}
?> 