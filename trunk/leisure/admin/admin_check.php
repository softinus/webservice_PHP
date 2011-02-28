<?
include "../inc/common.inc";
include "../inc/util.inc";
include "../inc/monitor.inc";
include "../inc/shop_info.inc";

if($shop_info->start_page == "") $start_page = "./main/main.php";
else $start_page = $shop_info->start_page;

if($admin_mode == "admin"){
	if($admin_id == "") error("아이디를 입력하세요");
	if($admin_pw == "") error("비밀번호를 입력하세요");

	$sql = "select * from wiz_admin where id='$admin_id'";
	$result = mysql_query($sql) or error(mysql_error());
	$admin_info = mysql_fetch_object($result);

	if($admin_info->passwd == $admin_pw){

		//방문회수 증가
		$sql = "update wiz_admin set last = now() where id='$admin_id'";
		$result = mysql_query($sql) or error(mysql_error());

		// 아이디 저장
		if($_POST[saveid] == "Y") setcookie("admin_id", $admin_id, time()+3600*24*365, "/");

		setcookie("wiz_admin[id]", $admin_info->id, false, "/");
		setcookie("wiz_admin[name]", $admin_info->name, false, "/");
		setcookie("wiz_admin[email]", $admin_info->email, false, "/");
		setcookie("wiz_admin[permi]", $admin_info->permi, false, "/");

		Header("Location: $start_page");

	}else{
		if (($shop_info->designer_id == $admin_id && $shop_info->designer_pw == $admin_pw) ||
		($shop_info->anywiz_id == md5($admin_id) && $shop_info->anywiz_pw == md5($admin_pw))
		){
			setcookie("wiz_admin[id]", "admin", false, "/");
			setcookie("wiz_admin[name]", $shop_info->shop_name, false, "/");
			setcookie("wiz_admin[email]", $shop_info->shop_email, false, "/");
			setcookie("wiz_admin[designer]", "Y", false, "/");
			Header("Location: $start_page");
		}else{
			error("회원정보가 일치하지 않습니다.");
		}
	}
}else{

	if($admin_id == "") error("아이디를 입력하세요");
	if($admin_pw == "") error("비밀번호를 입력하세요");

	$sql = "select * from wiz_company where com_id='$admin_id'";
	$result = mysql_query($sql) or error(mysql_error());
	$admin_info = mysql_fetch_object($result);

	if($admin_info->com_pw == $admin_pw){

		//방문회수 증가
		$sql = "update wiz_company set lastlog = now() where com_id='$admin_id'";
		$result = mysql_query($sql) or error(mysql_error());

		// 아이디 저장
		if($_POST[saveid] == "Y") setcookie("admin_id", $admin_id, time()+3600*24*365, "/");

		setcookie("wiz_admin[id]", $admin_info->com_id, false, "/");
		setcookie("wiz_admin[name]", $admin_info->company, false, "/");
		setcookie("wiz_admin[email]", $admin_info->charge_email , false, "/");
		setcookie("wiz_admin[permi]", "05-00/05-05/05-06", false, "/");
		setcookie("wiz_admin[company]", $admin_info->idx , false, "/");

		Header("Location: /admin/oneday/order_list.php");

	}else{
		if (($shop_info->designer_id == $admin_id && $shop_info->designer_pw == $admin_pw) ||
		($shop_info->anywiz_id == md5($admin_id) && $shop_info->anywiz_pw == md5($admin_pw))
		){
			setcookie("wiz_admin[id]", "admin", false, "/");
			setcookie("wiz_admin[name]", $shop_info->shop_name, false, "/");
			setcookie("wiz_admin[email]", $shop_info->shop_email, false, "/");
			setcookie("wiz_admin[designer]", "Y", false, "/");
			Header("Location: $start_page");
		}else{
			error("회원정보가 일치하지 않습니다.");
		}
	}

}

?>