<?

if(!empty($wiz_session[id])){
	
	setcookie("wiz_session[id]", "", time()-3600, "/");
	setcookie("wiz_session[name]", "", time()-3600, "/");
	setcookie("wiz_session[email]", "", time()-3600, "/");
	setcookie("wiz_session[level]", "", time()-3600, "/");
	setcookie("wiz_session[permi]", "", time()-3600, "/");

}

Header("Location: /");

?>