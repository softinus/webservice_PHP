<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//------------------------------------------------------------------------------------------------------------------------------------
$param = "searchopt=$searchopt&searchkey=$searchkey&s_birthday=$s_birthday&s_memorial=$s_memorial&s_age=$s_age";
$param .= "&s_address=$s_address&s_job=$s_job&s_marriage=$s_marriage&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day";
$param .= "&next_year=$next_year&next_month=$next_month&next_day=$next_day&page=$page";
//------------------------------------------------------------------------------------------------------------------------------------

// ȸ�����
if($mode == "insert"){

   $resno 		= $resno."-".$resno2;
   $post 		= $post."-".$post2;
   $tphone 		= $tphone."-".$tphone2."-".$tphone3;
   $hphone 		= $hphone."-".$hphone2."-".$hphone3;
   $fax				= $fax."-".$fax2."-".$fax3;
   $birthday 	= $birthday."-".$birthday2."-".$birthday3;
   $memorial 	= $memorial."-".$memorial2."-".$memorial3;
   $com_post	= $com_post."-".$com_post2;

   for($ii=0; $ii<count($consph); $ii++){ $tmpconsph .= $consph[$ii]."/"; }
   for($ii=0; $ii<count($conprd); $ii++){ $tmpconprd .= $conprd[$ii]."/"; }

   $sql = "insert into wiz_member(id,passwd,name,resno,email,tphone,hphone,fax,post,address,address2,reemail,resms,birthday,bgubun,
   								marriage,memorial,scholarship,job,income,car,consph,conprd,level,recom,visit,visit_time,comment,com_num,com_name,com_owner,com_post,com_address,com_kind,com_class,wdate)
									values('$id', '$passwd', '$name', '$resno', '$email', '$tphone', '$hphone', '$fax', '$post', '$address', '$address2', '$reemail', '$resms',
									'$birthday', '$bgubun', '$marriage', '$memorial', '$scholarship', '$job', '$income', '$car', '$tmpconsph', '$tmpconprd',
									'$level', '$recom', '$visit', '$visit_time', '$comment','$com_num','$com_name','$com_owner','$com_post','$com_address','$com_kind','$com_class', now())";

   $result = mysql_query($sql) or error(mysql_error());

   complete("ȸ���� ����Ͽ����ϴ�.","member_list.php?$param");



// ȸ������ ����
}else if($mode == "update"){

   $resno = $resno."-".$resno2;
   $post = $post."-".$post2;
   $tphone = $tphone."-".$tphone2."-".$tphone3;
   $hphone = $hphone."-".$hphone2."-".$hphone3;
   $fax				= $fax."-".$fax2."-".$fax3;

   $birthday2 = substr("0".$birthday2,-2);
   $birthday3 = substr("0".$birthday3,-2);
   $memorial2 = substr("0".$memorial2,-2);
   $memorial3 = substr("0".$memorial3,-2);

   $birthday = $birthday."-".$birthday2."-".$birthday3;
   $memorial = $memorial."-".$memorial2."-".$memorial3;


   for($ii=0; $ii<count($consph); $ii++){
      $tmpconsph .= $consph[$ii]."/";
   }
   for($ii=0; $ii<count($conprd); $ii++){
      $tmpconprd .= $conprd[$ii]."/";
   }

   $com_post	= $com_post."-".$com_post2;

   $sql = "update wiz_member set
                     passwd = '$passwd', name = '$name', resno = '$resno', email = '$email', tphone = '$tphone', hphone = '$hphone', fax = '$fax', post = '$post', address = '$address', address2 = '$address2', reemail = '$reemail', resms = '$resms',
                     birthday = '$birthday', bgubun = '$bgubun', marriage = '$marriage', memorial = '$memorial', scholarship = '$scholarship', job = '$job', income = '$income', car = '$car', consph = '$tmpconsph', conprd = '$tmpconprd',
                     recom = '$recom', visit = '$visit', level = '$level', comment = '$comment', com_num = '$com_num', com_name = '$com_name', com_owner = '$com_owner', com_post = '$com_post', com_address = '$com_address', com_kind = '$com_kind', com_class = '$com_class' where id = '$id'";

   $result = mysql_query($sql) or error(mysql_error());

   complete("ȸ�������� �����Ͽ����ϴ�.","member_info.php?mode=$mode&id=$id&$param");



// ȸ�� ����
}else if($mode == "deluser"){

	$array_seluser = explode("|",$seluser);
	$i=0;
	while($array_seluser[$i]){

		$mem_id = $array_seluser[$i];

		// ȸ�����̺��� ����
	   $sql = "delete from wiz_member where id = '$mem_id'";
	   $result = mysql_query($sql) or error(mysql_error());

	   // �򸮽�Ʈ ����
	   $sql = "delete from wiz_wishlist where memid = '$mem_id'";
	   $result = mysql_query($sql) or error(mysql_error());

	   // ������ ����
	   $sql = "delete from wiz_reserve where memid = '$mem_id'";
	   $result = mysql_query($sql) or error(mysql_error());

		// �ֹ����� ����(�ֹ��� ���̵� [out] ���� ó��)
		$sql = "update wiz_order set send_id = '".$mem_id."[out]' where  send_id = '$mem_id'";
		$result = mysql_query($sql) or error(mysql_error());


		$i++;
	}

	complete("ȸ���� �����Ͽ����ϴ�.","member_list.php?$param");



}else if($mode == "sendsms"){

	include_once "$DOCUMENT_ROOT/inc/oper_info.inc";

	$user_list = explode(",",$seluser);

  for($ii=0; $ii < count($user_list); $ii++){
	   if($user_list[$ii] != "") send_sms($se_tel, $user_list[$ii], $content, $se_name);
	}

	comalert("�߼۵Ǿ����ϴ�.","");

// ����ȸ�� �̸��� �߼�
}else if($mode == "sendemail"){

	include "$DOCUMENT_ROOT/inc/shop_info.inc";
   $se_name = $shop_info->shop_name;
   $se_email = $shop_info->shop_email;

   $content = str_replace("\\","",$content);

   $user_list = explode(",",$seluser);
   for($ii=0; $ii < count($user_list); $ii++){

      list($re_name, $re_email) = explode(":", $user_list[$ii]);
      if($re_name != "") send_mail($se_name, $se_email, $re_name, $re_email, $subject, $content);

   }

	complete("�̸��� �߼��� �Ϸ��Ͽ����ϴ�.","send_email.php?seluser=$seluser");



// ȸ���̸��� �߼�
}else if($mode == "mememail"){

	global $DOCUMENT_ROOT;

	// ������ ���� ��������
	include "$DOCUMENT_ROOT/inc/shop_info.inc";
	$se_name = $shop_info->shop_name;
	$se_email = $shop_info->shop_email;
	$re_name = $shop_info->shop_name;
	$re_email = $shop_info->shop_email;

	$content = str_replace("\\","",$content);


	$no = 0;
	$sql = str_replace("\\", "", $mailsql);
	$snum--;
	$amount = $enum - $snum;
	$sql = $sql." limit $snum, $amount";

	$result = mysql_query($sql) or error(mysql_error());

	while($row = mysql_fetch_object($result)){

		send_mail($se_name, $se_email, $row->name, $row->email, $subject, $content);
		echo "<font size=2><b>$row->name : </b> $row->email</font> <br>";

	$no++;

	}

	echo "<br><font color='red' size=2><b>�߼��� �Ϸ��Ͽ����ϴ�.</b></font>";
	echo "<a href=javascript:window.close()><font size=2 color=black><b>[ �ݱ� ]</b></font></a>";

// ȸ��SMS �߼�
}else if($mode == "memsms"){


	include_once "$DOCUMENT_ROOT/inc/oper_info.inc";

	$today = date('n-d');
	$toyear = date('Y');

	$age_syear = substr($toyear-($age+9),-2)+1;
	$age_eyear = substr($toyear-$age,-2)+2;

	$join_sdate = $prev_year."-".$prev_month."-".$prev_day;
	$join_edate = $next_year."-".$next_month."-".$next_day;

	$sql = "select id,hphone from wiz_member where id != '' ";
	if($level != "") 		$sql .= " and level = '$level'";
	if($prev_year != "") $sql .= " and wdate > '$join_sdate' and wdate <= '$join_edate 23:59:59'";
	if($searchopt != "") $sql .= " and $searchopt like '%$keyword%'";
	if($birthday == "Y") $sql .= " and birthday like '%$today'";
	if($memorial == "Y") $sql .= " and memorial like '%$today'";
	if($age != "")       $sql .= " and resno > '$age_syear' and resno < '$age_eyear'";
	if($address != "")   $sql .= " and address like '%$address%'";
	if($job != "")       $sql .= " and job = '$job'";
	if($marriage != "")  $sql .= " and marriage = '$marriage'";
	if($resms == "RJ" || $resms == "")	$sql .= " and resms != 'N'";
	$sql .=" order by wdate desc";
	$result = mysql_query($sql) or error(mysql_error());
	
	while($row = mysql_fetch_object($result)){
		if($row->hphone != "") send_sms($se_num, $row->hphone, $sms_msg);
	}

	comalert("SMS �߼��� �Ϸ��Ͽ����ϴ�.","");


//����ۼ�
}else if($mode == "consult"){

   $sql = "update wiz_consult set question = '$question', answer = '$answer', status = 'Y' where idx = '$idx'";

   $result = mysql_query($sql) or error(mysql_error());

   complete("����ۼ��� �Ϸ��Ͽ����ϴ�.","member_qna.php");



// ������
}else if($mode == "condelete"){

	$array_selconsult = explode("|",$selconsult);

	$i=0;
	while($array_selconsult[$i]){
		$idx = $array_selconsult[$i];
		$sql = "delete from wiz_consult where idx = '$idx'";
		$result = mysql_query($sql) or error(mysql_error());
		$i++;
	}

	complete("������ ����� ���� �Ͽ����ϴ�.","member_qna.php");




// �� ȸ���� ������ ����
}else if($mode == "reserve"){

	$memid = $_POST[memid];
	$reservemsg = $_POST[reservemsg];
	$reserve = $_POST[reserve_gubun].$_POST[reserve];

	$sql = "insert into wiz_reserve(idx,memid,reservemsg,reserve,orderid,wdate) values('', '$memid', '$reservemsg', '$reserve', '$orderid', now())";
	$result = mysql_query($sql) or error(mysql_error());

	complete("�������� �����Ͽ����ϴ�.","");

// �� ȸ���� ������ ����
}else if($mode == "delreserve"){

	$sql = "delete from wiz_reserve where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("�ش� ���������� �����Ͽ����ϴ�.","");

// ȸ��Ż�� ����
}else if($mode == "memoutdel"){

	$sql = "delete from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("Ż�𳻿��� �����Ͽ����ϴ�.","");



}

?>