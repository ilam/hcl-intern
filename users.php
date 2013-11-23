<?php
include_once("header.php");
echo "
<script type=\"text/javascript\" language=\"javascript\">
function deleteconfirm()
{
 return confirm(\"Are you sure you want to delete ?\");
}
</script>
";
if($_SESSION['hcl_user']=='admin')
{
if(isset($_POST["add"]))
{
$auser=trim($_POST["username"]);
$aname=$_POST["namec"];
$adepartment=$_POST["department"];
$apass=$_POST["pass"];
$acpass=$_POST["cpass"];
if($auser!="" && $aname!="" && ($apass==$acpass) && $apass!="")
{
$mapass=md5($apass);
mysql_query("insert into users (username,name,department,pass) values ('$auser','$aname','$adepartment','$mapass')");
echo "The User has been added.";
}
else
echo "Error in the data";
}
else if($_GET["action"]=='edit' && (md5($_GET["id"])==$_GET["check"]))
{
$eid=$_GET["id"];
$qu=mysql_query("select * from users where username='$eid'");
$euser="value=\"".mysql_result($qu,0,"username")."\"";
$ename="value=\"".mysql_result($qu,0,"name")."\"";
$edept="value=\"".mysql_result($qu,0,"department")."\"";
}
else if($_GET["action"]=='delete')
{
if(md5($_GET["id"])==$_GET["check"])
{
$user=$_GET["id"];
mysql_query("delete from users where username='$user'");
echo $user." has been deleted.";
}
}
else if(isset($_POST["edit"]))
{
$auser=trim($_POST["username"]);
$aname=$_POST["namec"];
$adepartment=$_POST["department"];
$apass=$_POST["pass"];
$acpass=$_POST["cpass"];
$ide=$_POST["eid"];
if($auser!="" && $aname!="")
{
mysql_query("update users set username='$auser',name='$aname',department='$adepartment' where username='$ide'");
echo "The User has been Edited.";
}
if($apass!="" && ($apass==$acpass))
{
$mapass=md5($apass);
mysql_query("update users set pass='$mapass' where username='$ide'");
echo "<br/>The Password has been changed.";
}
}
if($_SESSION['hcl_user']=='admin')
{
echo "<h1>Users</h1>";
echo "<form action=users.php method=post>
<table>
<tr><th>* Username :</th><td><input type=text name=username size=60 $euser /></td></tr>
<tr><th>* Name :</th><td><input type=text name=namec size=60 $ename /></td></tr>
<tr><th>&nbsp; Department :</th><td><input type=text name=department size=60 $edept /></td></tr>";
if($_GET[action]=='edit')
echo "<tr><th>* Password :</th><td><input type=password name=pass size=30 /> (leave empty to retain existing password)</td></tr>
<tr><th>* Confirm Password :</th><td><input type=password name=cpass size=30 /> (leave empty to retain existing password)</td></tr>";
else
echo "<tr><th>* Password :</th><td><input type=password name=pass size=30 /></td></tr>
<tr><th>* Confirm Password :</th><td><input type=password name=cpass size=30 /> </td></tr>";
echo "</table>
<input type=hidden name=eid value=$eid />
<center>";
if(!isset($eid)){ echo "<input type=submit name=add value=Add /></center></form><br/><br/>&nbsp;&nbsp;* - Mandatory Fields";}
else {echo "<input type=submit name=edit value=Submit />&nbsp;<input type=submit value=Cancel /> </center></form><br/><br/>&nbsp;&nbsp;* - Mandatory Fields";}
echo "<table width=720 cellpadding=0 cellspaceing=0 style='margin:0px;' border=\"1\"><tr class=h><th>Username </th><th>Name</th><th>Department</th><th>Operation</th></tr>";
$quc=mysql_num_rows($qu=mysql_query("select * from users where username not in ('admin')"));
for($i=0;$i<$quc;$i++)
{
if($i%2==0)
echo "<tr class=a>";
else
echo "<tr class=b>";
echo "<td>".mysql_result($qu,$i,"username")."</td><td>".mysql_result($qu,$i,"name")."</td><td>".mysql_result($qu,$i,"department")."</td><td>
<a href=users.php?action=delete&id=".mysql_result($qu,$i,"username")."&check=".md5(mysql_result($qu,$i,"username"))." onclick=\"return deleteconfirm()\">Delete"."</a>&nbsp;&nbsp;/&nbsp;&nbsp;
<a href=users.php?action=edit&id=".mysql_result($qu,$i,"username")."&check=".md5(mysql_result($qu,$i,"username")).">Edit"."</a></td>";
}
echo "</table><br/><br/>";
}
}
else
echo "<br/><br/><br/><br/><br/><br/><h4>You have tried to access a page that is visible only to the Administrator.<br/></h4>";
include_once("footer.php");
?>

