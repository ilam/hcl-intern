<?php
include_once("header.php");
if(isset($_SESSION['hcl_user']))
{
if($_SESSION['hcl_user']=='admin')
{
if($_GET["action"]=='delete')
{
if(md5($_GET["id"])==$_GET["check"])
{
$cid=$_GET["id"];
mysql_query("update forum_comments set deleted=1 where cid=$cid");
echo "The comment has been deleted.";
}
}
else if($_GET["action"]=='show')
{
if(md5($_GET["id"])==$_GET["check"])
{
$cid=$_GET["id"];
mysql_query("update forum_comments set deleted=0 where cid=$cid");
echo "The comment has been restored.";
}
}
}
if(!isset($_GET["page"]) ||$_GET["page"]<1)
$page=1;
else
$page=$_GET["page"];
if(isset($_GET["pid"]))
{
$pid=$_GET["pid"];
$pc=mysql_num_rows($qu=mysql_query("select * from forum_posts where pid=$pid"));
if($pc!=0)
{
if(isset($_POST["add"]))
{
	$comment=mysql_real_escape_string($_POST["commenttext"]);
	mysql_query("insert into forum_comments (pid,comment,username) values ($pid,'$comment','$_SESSION[hcl_user]')");
}
$username=mysql_result($qu,$i,"username");
$name=mysql_result(mysql_query("select name from users where username='$username'"),0,"name");
echo "<h1>".mysql_result($qu,0,"title")."</h1><h3>".mysql_result($qu,0,"username")." (".$name.")&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".date("j F, Y g:i a", strtotime(mysql_result($qu,0,"datetime")))."</h3>";
echo "<br/><div style='font-size:14px'>".nl2br(mysql_result($qu,0,"body"))."</div><br/><br/>";
$index=($page-1)*10;
$qcn=mysql_num_rows($qc=mysql_query("select * from forum_comments where pid=$pid order by datetime asc limit $index,10"));
if($qcn>0)
echo "<h1>Comments</h1>";
	echo "<table>";
	for($i=0;$i<$qcn;$i++)
	{
	$class=($i%2==0)?"b":"a";
	$username=mysql_result($qc,$i,"username");
	$name=mysql_result(mysql_query("select name from users where username='$username'"),0,"name");
	echo "<tr class=$class><td>By: <b>".mysql_result($qc,$i,"username")." (".$name.")</b>&nbsp;&nbsp;&nbsp;".date("F j, Y g:i a", strtotime(mysql_result($qc,$i,"datetime")));
	if($_SESSION['hcl_user']=='admin')
	{
	if(mysql_result($qc,$i,"deleted")==0)
	echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=disp_details.php?pid=$pid&page=$page&action=delete&id=".mysql_result($qc,$i,"cid")."&check=".md5(mysql_result($qc,$i,"cid")).">Delete</a>";
	else
	echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=disp_details.php?pid=$pid&page=$page&action=show&id=".mysql_result($qc,$i,"cid")."&check=".md5(mysql_result($qc,$i,"cid")).">Show</a>";
	}
	if(mysql_result($qc,$i,"deleted")==1)
	echo "<br/><br/><i>The Administrator has deleted the comment.</i></td></tr>";
	else
	echo "<br/><br/>".mysql_result($qc,$i,"comment")."</td></tr>";
	}
echo "</table><br/>";
$prev=$page-1;
$next=$page+1;
$q=mysql_num_rows(mysql_query("select cid from forum_comments where pid='$pid'"));
if($prev>0)
echo "<center><a href=disp_details.php?pid=$pid&page=$prev>&lt;-- Previous</a></center>&nbsp;&nbsp;&nbsp;";
if($page*10<$q)
echo "<center><a href=disp_details.php?pid=$pid&page=$next>Next --&gt;</a></center>";
echo "</center>";
echo "<h1>Add your comment</h1><form action=disp_details.php?pid=$pid&page=$page method=post>Comment : <input type=text name=commenttext size=90 />
<input type=submit name=add value=Comment /></form>";

}

else
{
echo "Page not Found.";
}
}
else
echo "Page Not Found.";
}
else
echo "<br/><br/><br/><br/><br/><br/><h4>You have tried to access a page that is visible only to logged in users.<br/><b>Please login to continue!</b>
    <a href=login.php>Login</a></h4>";
include_once("footer.php");
?> 