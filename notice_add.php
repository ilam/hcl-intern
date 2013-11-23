<?php
include_once("header.php");
if($_SESSION['hcl_user']=='admin')
{
if (isset($_POST["submit"]))
{ 
if($_POST["title"]==""||$_POST["body"]=="")
echo " Some Mandatory Field(s) have not been filled";
else
{
if($_FILES["uploadedfile"]["name"]!="")
{
$target_path = "uploads/";
$target_path = $target_path . time()."_" . str_replace(" ","_",basename( $_FILES[uploadedfile][name])); 
if(move_uploaded_file($_FILES[uploadedfile][tmp_name], $target_path)) {
    echo "The notice has been uploaded.";


$fn=time()."_" . str_replace(" ","_",basename( $_FILES[uploadedfile][name]));
}
else
echo "Notice Failed.";
}
else
$fn=NULL;
mysql_query("INSERT INTO notices(title,body,files,type) VALUES ('$_POST[title]', '$_POST[body]', '$fn','$_POST[type]' )");
} 
}
echo "<br/>
<h1>Add a Notice</h1>
<form enctype=\"multipart/form-data\" action=\"notice_add.php\" method=\"post\">
<table>
<tr><th>* Title :</th><td><input type=text name=title size=60/></td></tr>
<tr><th>* Body  :</th><td><textarea name=body rows=\"1\" cols=\"10\"></textarea></td><p>To include links in your text type , &lt;a href=\"http://www.hcl.in\"&gt;Text to appear as link&lt;/a&gt;  &nbsp;&nbsp;  Output : <a href=\"http://www.hcl.in\">Text to appear as link</a></p></tr>
<tr><th>Type  :</th><td><select name=type>
  <option value=General>General</option>
  <option value=Security>Security</option>
  <option value=Internal>Internal</option>
  <option value=Employee>Employee Related</option>
  <option value=FileTransfer>File Transfer</option>
  <option value=Updates>Updates</option>
</select>
</td></tr>
<input type=hidden name=\"MAX_FILE_SIZE\" value=\"100000000\" />
<tr><th>File upload: </th><td><input name=\"uploadedfile\" type=\"file\" /></td></tr>
</table>
<input type=\"submit\" name=\"submit\" value=\"Submit\" />
</form>
<br/>* - Mandatory Fields";
}
else
echo "<br/><br/><br/><br/><br/><br/><h4>You have tried to access a page that is visible only to the Administrator.<br/></h4>";
include_once("footer.php"); ?>
