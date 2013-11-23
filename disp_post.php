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
if(isset($_SESSION['hcl_user']))
{
if($_SESSION['hcl_user']=='admin')
{
if($_GET["action"]=='delete')
{
if(md5($_GET["id"])==$_GET["check"])
{
$pid=$_GET["id"];
mysql_query("delete from forum_posts where pid=$pid");
mysql_query("delete from forum_comments where pid=$pid");
echo "The post has been deleted.";
}
}
}
$t=$_GET["type"];
if(!isset($_GET["page"]) ||$_GET["page"]<1)
$page=1;
else
$page=$_GET["page"];
if($t=="General" || $t=="Internal" || $t=="Security" || $t=="Employee" || $t=="FileTransfer" || $t=="Updates")
{
echo "<h1>$t Posts</h1>";
$index=($page-1)*10;
$n=mysql_num_rows($query=mysql_query("select * from forum_posts where type like '%$t%' order by datetime desc limit $index,10"));
echo "<table width=720 cellpadding=0 cellspaceing=0 style='margin:0px;' border=\"1\"><tr class=h><th>S.No </th><th>Post</th></tr>";
for($i=0;$i<$n;$i++)
{
$pid=mysql_result($query,$i,"pid");
$cc=mysql_num_rows(mysql_query("select cid from forum_comments where pid=$pid"));
if($n%2!=0)
$class=($i%2==0)?"a":"b";
else
$class=($i%2==0)?"b":"a";
$j=($page-1)*10+$i+1;
echo "<tr class=$class style='height:40px;'><td>".$j."</td><td><b><a href=disp_details.php?pid=".mysql_result($query,$i,"pid").
">".mysql_result($query,$i,"title")."</a> - ".date("j F, Y g:i a", strtotime(mysql_result($query,$i,"datetime")));

if($_SESSION['hcl_user']=='admin')
echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=disp_post.php?type=$t&page=$page&action=delete&id=".mysql_result($query,$i,"pid")."&check=".md5(mysql_result($query,$i,"pid"))." onclick=\"return deleteconfirm()\">Delete</a>";
$username=mysql_result($query,$i,"username");
$name=mysql_result(mysql_query("select name from users where username='$username'"),0,"name");
echo "</b><br/>Posted by :&nbsp;".mysql_result($query,$i,"username")." (".$name.")".
"<div style='float:right'>".$cc." Comment(s)</div><br/><br/>".substr(mysql_result($query,$i,"body"),0,50); 
echo "</td></tr>";
}
echo "</table><br/>";
$prev=$page-1;
$next=$page+1;
$q=mysql_num_rows(mysql_query("select pid from forum_posts where type like '%$t%'"));
echo "<center><a href=disp_post.php?type=$t&page=$prev>Previous</a>&nbsp;&nbsp;&nbsp;";
if($page*10<$q)
echo "<a href=disp_post.php?type=$t&page=$next>Next</a>";
echo "</center>";
}
else
echo "Page not found.";
}
else
echo "<br/><br/><br/><br/><br/><br/><h4>You have tried to access a page that is visible only to logged in users.<br/><b>Please login to continue!</b>
    <a href=login.php>Login</a></h4>";
include_once("footer.php");
?>