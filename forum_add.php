<?php
include_once("header.php");
if(isset($_SESSION['hcl_user']))
{
if (isset($_POST["submit"]))
{ 
if($_POST["title"]==""||$_POST["body"]=="")
echo " Some Mandatory Field(s) have not been filled";
else
{
$typea=$_POST['type'];
if(empty($typea))
$type="General";
else
{
$n=count($typea);
for($i=0;$i<$n-1;$i++)
$type=$type.$typea[$i].",";
$type=$type.$typea[$n-1];
}
$title=mysql_real_escape_string($_POST[title]);
$body=mysql_real_escape_string($_POST[body]);
mysql_query("INSERT INTO forum_posts(title,body,type,username) VALUES ('$title', '$body','$type','$_SESSION[hcl_user]' )");
echo "Post Added Successfully !<br/>";
}
}
echo "
<script type=\"text/javascript\" language=\"javascript\">
function disable()
{
var general=false;
for(var j=1;j<6;j++)
{
box=eval(document.addpost[\"type[]\"][j]);
if(box.checked==true)
general=true;
}
if(general==true)
{
box=eval(document.addpost[\"type[]\"][0]);
box.checked=false;
}
}
function enable()
{
for(var j=1;j<6;j++)
{
box=eval(document.addpost[\"type[]\"][j]);
box.checked=false;
}
}
    </script><br/>
<h1>Add a Post</h1>
<form enctype=\"multipart/form-data\" action=\"forum_add.php\" method=\"post\" name=addpost>
<table>
<tr><th>* Title :</th><td><input type=text name=title size=60/></td></tr>
<tr><th>* Body  :</th><td><textarea name=body rows=\"1\" cols=\"10\"></textarea></td><p>To include links in your text type , &lt;a href=\"http://www.hcl.in\"&gt;Text to appear as link&lt;/a&gt;  &nbsp;&nbsp;  Output : <a href=\"http://www.hcl.in\">Text to appear as link</a></p></tr>
<tr><th>Type  :</th>
<td>
<input type=checkbox name=type[] checked=true value=General  onclick=\"enable()\"/>&nbsp;General&nbsp;&nbsp;&nbsp;
<input type=checkbox name=type[] value=Security  onclick=\"disable()\"/>&nbsp;Security&nbsp;&nbsp;&nbsp;
<input type=checkbox name=type[] value=internal onclick=\"disable()\"/>&nbsp;Internal&nbsp;&nbsp;&nbsp;
<input type=checkbox name=type[] value=Employee onclick=\"disable()\"/>&nbsp;Employee Related&nbsp;&nbsp;&nbsp;
<input type=checkbox name=type[] value=FileTransfer onclick=\"disable()\"/>&nbsp;File Transfer&nbsp;&nbsp;&nbsp;
<input type=checkbox name=type[] value=Updates onclick=\"disable()\"/>&nbsp;Updates&nbsp;&nbsp;&nbsp;
</td></tr>
</table>
<input type=submit name=submit value=Submit />
</form>
<br/>* - Mandatory Fields";
}
else
echo "<br/><br/><br/><br/><br/><br/><h4>You have tried to access a page that is visible only to logged in users.<br/><b>Please login to continue!</b>
    <a href=login.php>Login</a></h4>";
?>
<?php include("footer.php"); ?>
