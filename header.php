<?php
$con = mysql_connect("localhost","root","sstars");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("portal", $con);
ob_start();
session_start();
?>

<?php
define('WWWROOT',"http://localhost");  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta name="Description" content="HCL Infosystems" />
<meta name="Keywords" content="HCL,Project,Portal" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="author" content="HCL Interns" />
<meta name="Robots" content="all" />

<title>Information Portal - HCL Infosystems</title>
<link rel="icon" type="image/ico" href="hcl-favicon.ico">
<link rel="stylesheet" href="<?php echo WWWROOT."/includes/styles"?>/main.css" type="text/css" />
</head>
<body>
<div id="wrap">
		<div id="header">
			<h1 id="logo-text"><span class="gray">HCL Infosystems</span></h1>			
			<h2 id="slogan"><span class="gray">Info Portal</span></h2>
			<div id="header-tabs" style="border:1px solid white;">
				<ul id="topmenu"> 
					<li><a href="<?php echo WWWROOT?>/design_team.php" onmouseover="mopen('m5')" onmouseout="mclosetime()"><span>Design Team</span></a>
					<div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()"></div>
					</li>
					<?php if(!isset($_SESSION['hcl_user'])) echo "<li><a href=\"".WWWROOT."/login.php\" onmouseover=\"mopen('m1')\" onmouseout=\"mclosetime()\"><span>Login</span></a></li>"; 
						else echo"<li><a href=\"".WWWROOT."/logout.php\" onmouseover=\"mopen('m1')\" onmouseout=\"mclosetime()\"><span>Logout</span></a></li>";?>
					<li><a href="<?php echo WWWROOT?>" onmouseover="mopen('m1')" onmouseout="mclosetime()"><span>Home</span></a></li>
				</ul>
				<br/><br/><div style='float:right; margin-right:20px'><?php if(isset($_SESSION['hcl_user'])) echo "You are logged in as ".$_SESSION['hcl_user']; ?></div>
				<div style="clear:both;"></div>
			</div>	
		</div>
	  
	  <div id="content-wrap">			
		<br/>
	  		<div id="main">
