<?
include "../inc/common.inc";
include "../inc/util.inc";

$sql = "select id,passwd,name,email,tphone,hphone,level from wiz_member where id='$id' and passwd='$passwd'";
$result = mysql_query($sql) or error(mysql_error());


// �Ϲ�ȸ�� �α���
if($row = mysql_fetch_object($result)){

   //�湮ȸ�� ����
   $sql = "update wiz_member set visit = visit+1 , visit_time = now() where id='$id'";
   $result = mysql_query($sql) or error(mysql_error());

   $level_info = level_info();
   $level_value = $level_info[$row->level][level];

	setcookie("wiz_session[id]", $row->id, false, "/");
	setcookie("wiz_session[passwd]", $row->passwd, false, "/");
	setcookie("wiz_session[name]", $row->name, false, "/");
	setcookie("wiz_session[tphone]", $row->tphone, false, "/");
	setcookie("wiz_session[hphone]", $row->hphone, false, "/");
	setcookie("wiz_session[email]", $row->email, false, "/");
	setcookie("wiz_session[level]", $row->level, false, "/");
	setcookie("wiz_session[level_value]", $level_value, false, "/");

	if(empty($prev)) $prev = "http://".$HTTP_HOST;
  Header("Location: $prev");

// ������ �α���
}else{

   $sql = "select * from wiz_admin where id = '$id' and passwd = '$passwd'";
   $result = mysql_query($sql) or error(mysql_error());

   if($row = mysql_fetch_object($result)){

      $sql = "update wiz_admin set last = now() where id = '$id'";
      mysql_query($sql) or error(mysql_error());

	   	setcookie("wiz_session[id]", $row->id, false, "/");
	   	setcookie("wiz_session[passwd]", $row->passwd, false, "/");
	   	setcookie("wiz_session[name]", $row->name, false, "/");
	   	setcookie("wiz_session[tphone]", $row->tphone, false, "/");
	   	setcookie("wiz_session[email]", $row->email, false, "/");
	   	setcookie("wiz_session[level]", "0", false, "/");
	   	setcookie("wiz_session[level_value]", "0", false, "/");
	   	setcookie("wiz_session[permi]", $row->permi, false, "/");

			if(empty($prev)) $prev = "http://".$HTTP_HOST;
      Header("Location: $prev");

   }else{

      error("ȸ�������� ��ġ���� �ʽ��ϴ�.","");

   }


}
?>