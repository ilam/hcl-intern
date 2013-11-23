<?php
ob_start();
session_start();
?>
<?php
if(isset($_SESSION['hcl_user']))
{
$url="disp_notice.php?type=General"; 
header("Location: $url");
die();
}
$con = mysql_connect("localhost","root","sstars");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("portal", $con);
?>
<?php
if(isset($_POST["submit_login"]))
{

if($_POST["username"]!="" && $_POST["pass"]!="")
{
$username=mysql_escape_string($_POST["username"]);
$pass=mysql_escape_string($_POST["pass"]);
$que=mysql_query("select * from users where username='$username' and pass=md5('$pass')");
if(mysql_num_rows($que)>0)
{
$_SESSION['hcl_user']=$username;
$url="disp_notice.php?type=General"; 
header("Location: $url");
die();
}
else
$error="The username or password you entered is incorrect.<br/><br/>";
}
else
$error="Enter correct username and password.<br/><br/>";
}
include_once("header.php");
?>
<br/><br/><?php echo $error;?><br/><br/>
<h1>Login </h1>
<form action="login.php" method="post">
<table>
<tr><th>Username:</th><td><input type=text name=username size=20 /></td></tr>
<tr><th>Password:</th><td><input type=password name=pass size=20 /></td></tr>
</table>
<pre>   		 <input type=submit name=submit_login value=Submit /></pre>
</form>

<?php
include_once("footer.php");
?>