<?

if(!empty($wiz_admin[id])){
	
	setcookie("wiz_admin[id]", "", time()-3600, "/");
   setcookie("wiz_admin[name]", "", time()-3600, "/");
   setcookie("wiz_admin[email]", "", time()-3600, "/");
   setcookie("wiz_admin[level]", "", time()-3600, "/");
   setcookie("wiz_admin[level_value]", "", time()-3600, "/");
   setcookie("wiz_admin[permi]", "", time()-3600, "/");
	setcookie("wiz_admin[designer]", "", time()-3600, "/");
	setcookie("wiz_admin[company]", "", time()-3600, "/");

}

echo "<script>parent.document.location='./admin_login.php';</script>";

?>