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
if($_GET["action"]=='delete')
{
if(md5($_GET["id"])==$_GET["check"])
{
$nid=$_GET["id"];
mysql_query("delete from notices where nid=$nid");
echo "The Notice has been deleted.";
}
}
}
$t=$_GET["type"];
if(!isset($_GET["page"]) ||$_GET["page"]<1)
$page=1;
else
$page=$_GET["page"];
if($t=="General" || $t=="Security" || $t=="Internal" || $t=="Employee" || $t=="FileTransfer" ||$t=="Updates")
{
echo "<h1>$t Notices</h1>";
$index=($page-1)*10;
$n=mysql_num_rows($query=mysql_query("select * from notices where type ='$t' order by datetime desc limit $index,10"));
echo "<table width=720 cellpadding=0 cellspaceing=0 style='margin:0px;' border=\"1\"><tr class=h><th>S.No </th><th>Notice</th></tr>";
for($i=0;$i<$n;$i++)
{
if($n%2!=0)
$class=($i%2==0)?"a":"b";
else
$class=($i%2==0)?"b":"a";
$j=($page-1)*10+$i+1;
echo "<tr class=$class style='height:40px;'><td>".$j."</td><td><b>".mysql_result($query,$i,"title")." - ".date("j F, Y g:i a", strtotime(mysql_result($query,$i,"datetime")));
if($_SESSION['hcl_user']=='admin')
echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=disp_notice.php?type=$t&page=$page&action=delete&id=".mysql_result($query,$i,"nid")."&check=".md5(mysql_result($query,$i,"nid"))." onclick=\"return deleteconfirm()\">Delete</a>";
echo "</b><br/><br/>".mysql_result($query,$i,"body");
if(mysql_result($query,$i,"files")!=NULL)
echo "<br/><p class='downlink'><span><a href='".WWWROOT."/uploads/".mysql_result($query,$i,"files")."'>".mysql_result($query,$i,"files")."</a></span></p></td></tr>";
}
echo "</table><br/>";
$prev=$page-1;
$next=$page+1;
$q=mysql_num_rows(mysql_query("select nid from notices where type='$t'"));
if($prev>0)
echo "<center><a href=disp_notice.php?type=$t&page=$prev>&lt;-- Previous</a></center>&nbsp;&nbsp;&nbsp;";
if($page*10<$q)
echo "<center><a href=disp_notice.php?type=$t&page=$next>Next --&gt;</a>";
echo "</center>";
}
else
echo "Page not found.";
include_once("footer.php");
?>