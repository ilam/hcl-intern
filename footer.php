			</div>	
			<br/><br/>
		</div>
<div id=sidebar>
	<h1>Menu</h1>
	<ul class="sidemenu">
		<?php
		$tp=array("General","Security","Internal","Employee","FileTransfer","Updates");
		for($i=0;$i<6;$i++)
		${$tp[$i]}=mysql_num_rows(mysql_query("select nid from notices where datetime>timestamp(current_date()) and type='$tp[$i]'"));
		?>
		<li><a href="index.php">Home</a></li>
		<?php if(isset($_SESSION['hcl_user'])) echo "
		<li><a href=change_pass.php>Change Password</a></li>";?>
 		<li><a>Notices</a></li>
		<ul class='submenu'>
			<?php if($_SESSION['hcl_user']=='admin') echo "<li><a href='notice_add.php'>Add Notice</a></li>";?>
		    <li><a href='disp_notice.php?type=General'>General &nbsp;<span style='color:red'><?php echo $General;?> new</span></a></li>
		    <li><a href='disp_notice.php?type=Security'>Security&nbsp;<span style='color:red'><?php echo $Security;?> new</span></a></li>
		    <li><a href='disp_notice.php?type=Internal'>Internal&nbsp;<span style='color:red'><?php echo $Internal;?> new</span></a></li>
		    <li><a href='disp_notice.php?type=Employee'>Employee&nbsp; <span style='color:red'><?php echo $Employee;?> new</span></a></li>
			<li><a href='disp_notice.php?type=FileTransfer'>File Transfer&nbsp; <span style='color:red'><?php echo $FileTransfer;?> new</span></a></li>
			<li><a href='disp_notice.php?type=Updates'>Updates&nbsp; <span style='color:red'><?php echo $Updates;?> new</span></a></li>
			
		</ul>
		<?php if(isset($_SESSION['hcl_user'])) echo "
		<li><a>Forum</a></li>
		<ul class='submenu'>
		    <li><a href='forum_add.php'>Add a New Post</a></li>
		    <li><a href='disp_post.php?type=General'>General</a></li>
		    <li><a href='disp_post.php?type=Security'>Security</a></li>
		    <li><a href='disp_post.php?type=Internal'>Internal</a></li>
		    <li><a href='disp_post.php?type=Employee'>Employee</a></li>
			<li><a href='disp_post.php?type=FileTransfer'>File Transfer</a></li>
			<li><a href='disp_post.php?type=Updates'>Updates</a></li>
		</ul>";
		?>
		<?php if($_SESSION['hcl_user']=='admin') echo "
		<li><a href='users.php'>Users</a></li>";?>
	</ul>
	<br>
</div>
		<div id="footer">
		<p><span id="footer-left"> &copy; 2011 <strong><a href="<?php echo WWWROOT?>">Info Portal</a></strong></span></p>
		</div>	
</div>	
</body>
</html>
