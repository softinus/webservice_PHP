<?

include "../inc/common.inc"; 				// DB���ؼ�, ������ �ľ�
include "../inc/oper_info.inc";			// �����
include "../inc/util.inc";		      // ��ƿ���̺귯��

$type = "join";
$sql = "select * from wiz_page where type='$type'";
$result = mysql_query($sql) or error(mysql_error());
$page_info = mysql_fetch_object($result);

// �Է����� ��뿩��
$info_tmp = explode("/",$page_info->addinfo);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_use[$info_tmp[$ii]] = true;
}

// �Է����� �ʼ�����
$info_tmp = explode("/",$page_info->addinfo2);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_ess[$info_tmp[$ii]] = true;
}

// ���Ա� ����
$pos = strpos($HTTP_REFERER, $HTTP_HOST);
if($pos === false) error("�߸��� ��� �Դϴ�.");

if($info_use[spam] == true){
  // �ڵ���Ϲ��� �ڵ� �˻�
  if(empty($_POST[tmp_vcode]) || empty($_POST[vcode])) {
  	error("�ڵ���Ϲ��� �ڵ尡 �������� �ʽ��ϴ�.");
  } else if(strcmp($_POST[tmp_vcode], md5($_POST[vcode]))) {
  	error("�ڵ���Ϲ��� �ڵ尡 ��ġ���� �ʽ��ϴ�.");
  }
}

$resno 		= $resno."-".$resno2;
$post 		= $post."-".$post2;
$tphone 		= $tphone."-".$tphone2."-".$tphone3;
$hphone 		= $hphone."-".$hphone2."-".$hphone3;
$fax		 		= $fax."-".$fax2."-".$fax3;
$birthday 	= $birthday."-".$birthday2."-".$birthday3;
$memorial 	= $memorial."-".$memorial2."-".$memorial3;
$com_post 	= $com_post."-".$com_post2;

for($ii=0; $ii<count($consph); $ii++){ $tmpconsph .= $consph[$ii]."/"; }
for($ii=0; $ii<count($conprd); $ii++){ $tmpconprd .= $conprd[$ii]."/"; }

if($_POST[id] == "") error("�ʿ��� ������ ���޵��� �ʾҽ��ϴ�.");
if($_POST[passwd] == "") error("�ʿ��� ������ ���޵��� �ʾҽ��ϴ�.");
if($_POST[name] == "") error("�ʿ��� ������ ���޵��� �ʾҽ��ϴ�.");



// �ֹι�ȣ �ߺ�üũ
if($resno != "-"){
$sql = "select id from wiz_member where resno = '$resno' and resno != ''";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
if($total > 0) error("�̵̹�ϵ� �ֹι�ȣ �Դϴ�.\\n\\nȸ�������Ͻ����� ���ٸ� �����Ͻñ� �ٶ��ϴ�.");
}

// ���Է���(���峷�� ����)
$sql = "select idx from wiz_level order by level desc limit 1";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$level = $row->idx;

// �Է����� ����
$sql = "insert into wiz_member(id,passwd,name,resno,email,tphone,hphone,fax,post,address,address2,reemail,resms,birthday,bgubun,marriage,memorial,
									scholarship,job,income,car,consph,conprd,level,recom,visit,visit_time,comment,com_num,com_name,com_owner,com_post,com_address,com_kind,com_class,wdate)
									values('$id', '$passwd', '$name', '$resno', '$email', '$tphone', '$hphone', '$fax', '$post', '$address', '$address2', '$reemail', '$resms',
									'$birthday', '$bgubun', '$marriage', '$memorial', '$scholarship', '$job', '$income', '$car', '$tmpconsph', '$tmpconprd',
									'$level', '$recom', '$visit', '$visit_time', '$comment','$com_num','$com_name','$com_owner','$com_post','$com_address','$com_kind','$com_class', now())";

mysql_query($sql) or error(mysql_error());



// ������ ó��
if($oper_info->reserve_use == "Y"){

   // ȸ������ �������̺� ����
   if($oper_info->reserve_join > 0){

      $reserve_msg = "ȸ������ ������";

      $sql = "insert into wiz_reserve(idx,memid,reservemsg,reserve,orderid,wdate) values('', '$id', '$reserve_msg', '$oper_info->reserve_join', '$orderid', now())";
      mysql_query($sql) or error(mysql_error());

   }

   // ��õ�� ������ ����
   if($oper_info->reserve_recom > 0 && !empty($recom) && $id != $recom){

      $reserve_msg = "[$id] ���Խ� ��õ�� ������";

      $sql = "insert into wiz_reserve(idx,memid,reservemsg,reserve,orderid,wdate) values('', '$recom', '$reserve_msg', '$oper_info->reserve_recom', '$orderid', now())";
      mysql_query($sql) or error(mysql_error());

   }

}

// ȸ������ ���� ����/SMS �߼�
$re_info[id] = $id;
$re_info[pw] = $passwd;
$re_info[name] = $name;
$re_info[email] = $email;
$re_info[hphone] = $hphone;
send_mailsms("mem_apply", $re_info);

Header("Location: http://".$HTTP_HOST."/member/join_ok.php");

?>

