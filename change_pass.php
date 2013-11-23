<?php

include_once("header.php");
if(isset($_SESSION['hcl_user']))
{
if(isset($_POST["change"]))
{
$u=$_SESSION['hcl_user'];
$q=mysql_query("select pass from users where username='$u'");
if(md5($_POST["cur"])==mysql_result($q,0,"pass"))
{
if($_POST["new"]==$_POST["cnew"] && $_POST["new"]!="")
{
$p=$_POST["new"];
mysql_query("update users set pass= md5('$p') where username='$u'");
echo "Password has been succesfully changed";
}
else
echo "New Passwords dont match<br/>";
}
else
echo "Current Password is wrong<br/>";
}
echo "<h1>Change Password</h1>";
echo "<form action=change_pass.php method=post>
<br/><br/>
<table>
<tr><td>Current Password</td><td><input type=password name=cur /></td></tr>
<tr></tr>
<tr><td>New Password</td><td><input type=password name=new /></td></tr>
<tr><td>Confirm New Password</td><td><input type=password name=cnew /></td></tr>
</table>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit name=change value=Submit />
</form>";
}
else
{
echo "<br/><br/><br/><br/><br/><br/><h4>You have tried to access a page that is visible only to logged in users.<br/><b>Please login to continue!</b>
    <a href=login.php>Login</a></h4>";
}
include_once("footer.php");	
?>
