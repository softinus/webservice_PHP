<?
include "../inc/common.inc"; 				// DB���ؼ�, ������ �ľ�
include "../inc/util.inc";		      // ��ƿ ���̺귯��
include "../inc/oper_info.inc";			// �����
include "../inc/login_check.inc";		// �α��� üũ

// ȸ������ ����
if($mode == "my_info"){

	$e_post 		= $post."-".$post2;
	$e_tphone 		= $tphone."-".$tphone2."-".$tphone3;
	$e_hphone 		= $hphone."-".$hphone2."-".$hphone3;
	$e_birthday 	= $birthday."-".$birthday2."-".$birthday3;
	$e_memorial 	= $memorial."-".$memorial2."-".$memorial3;

	$e_fax				= $fax."-".$fax2."-".$fax3;
	$e_com_post 	= $com_post."-".$com_post2;

	for($ii=0; $ii<count($consph); $ii++){ $tmpconsph .= $consph[$ii]."/"; }
	for($ii=0; $ii<count($conprd); $ii++){ $tmpconprd .= $conprd[$ii]."/"; }


	$sql = "update wiz_member set ";

	if($passwd != "") $sql .= "passwd = '$passwd', ";
	if($post != "") $sql .= "post = '$e_post', ";
	if($address != "") $sql .= "address = '$address', ";
	if($address2 != "") $sql .= "address2 = '$address2', ";
	if($tphone != "") $sql .= "tphone = '$e_tphone', ";
	if($hphone != "") $sql .= "hphone = '$e_hphone', ";
	if($fax != "") $sql .= "fax = '$e_fax', ";
	if($resms != "") $sql .= "resms = '$resms', ";
	if($email != "") $sql .= "email = '$email', ";
	if($reemail != "") $sql .= "reemail = '$reemail', ";
	if($birthday != "") $sql .= "birthday = '$e_birthday', ";
	if($bgubun != "") $sql .= "bgubun = '$bgubun', ";
	if($marriage != "") $sql .= "marriage = '$marriage', ";
	if($memorial != "") $sql .= "memorial = '$e_memorial', ";
	if($scholarship != "") $sql .= "scholarship = '$scholarship', ";
	if($job != "") $sql .= "job = '$job', ";
	if($income != "") $sql .= "income = '$income', ";
	if($car != "") $sql .= "car = '$car', ";
	if($consph != "") $sql .= "consph = '$tmpconsph', ";
	if($conprd != "") $sql .= "conprd = '$tmpconprd', ";

	if($com_num != "") $sql .= "com_num = '$com_num', ";
	if($com_name != "") $sql .= "com_name = '$com_name', ";
	if($com_owner != "") $sql .= "com_owner = '$com_owner', ";
	if($com_post != "") $sql .= "com_post = '$e_com_post', ";
	if($com_address != "") $sql .= "com_address = '$com_address', ";
	if($com_kind != "") $sql .= "com_kind = '$com_kind', ";
	if($com_class != "") $sql .= "com_class = '$com_class', ";

	$sql .= " visit_time = now() where id = '$wiz_session[id]'";

	$result = mysql_query($sql) or error(mysql_error());

	$prev = "http://".$HTTP_HOST.$prev;

	comalert("�����Ǿ����ϴ�.", "");


// ��й�ȣ ����
}else if($mode == "my_passwd"){

	$sql = "select id from wiz_member where passwd = '$pre_passwd'";
	$result = mysql_query($sql) or error(mysql_error());
	$total = mysql_num_rows($result);

	if($total > 0){

		$sql = "update wiz_member set passwd = '$passwd' where id = '$wiz_session[id]' and passwd = '$pre_passwd'";
		$result = mysql_query($sql) or error(mysql_error());
		comalert("��й�ȣ�� ����Ǿ����ϴ�.");

	}else{

		error("������й�ȣ�� ��ġ���� �ʽ��ϴ�.");

	}



// ȸ��Ż��
}else if($mode == "my_out"){

	// ȸ�����̺��� ����
	$sql = "delete from wiz_member where id = '$wiz_session[id]'";
	$result = mysql_query($sql) or error(mysql_error());

	// �򸮽�Ʈ ����
	$sql = "delete from wiz_wishlist where memid = '$wiz_session[id]'";
	$result = mysql_query($sql) or error(mysql_error());

	// ������ ����
	$sql = "delete from wiz_reserve where memid = '$wiz_session[id]'";
	$result = mysql_query($sql) or error(mysql_error());

	// �ֹ����� ����(�ֹ��� ���̵� [out] ���� ó��)
	$sql = "update wiz_order set send_id = '".$wiz_session[id]."[out]' where  send_id = '$wiz_session[id]'";
	$result = mysql_query($sql) or error(mysql_error());

	// ���� ���� ����
	$sql = "delete from wiz_consult where memid = '$wiz_session[id]'";
	$result = mysql_query($sql) or error(mysql_error());

	// �����ڿ��� �̸��Ϲ߼�
	if($out_reason != "") $reason .= $out_reason." , ";
	if($out_reason2 != "") $reason .= $out_reason2." , ";
	if($out_reason3 != "") $reason .= $out_reason3." , ";
	if($out_reason4 != "") $reason .= $out_reason4." , ";
	if($out_reason5 != "") $reason .= $out_reason5." , ";
	if($out_reason6 != "") $reason .= $out_reason6." , ";
	if($out_reason7 != "") $reason .= $out_reason7." , ";
	if($out_reason8 != "") $reason .= $out_reason8." , ";

	// Ż�𳻿� �ۼ�
	$sql = "insert into wiz_bbs(idx,code,memid,name,subject,content,ip,wdate) values('','memout','$wiz_session[id]','$wiz_session[name]','$reason','$message','$REMOTE_ADDR',unix_timestamp('".date('Y-m-d H:i:s')."'))";
	$result = mysql_query($sql) or error(mysql_error());

	// ȸ��Ż�� ����/SMS �߼�
	$re_info[id] = $wiz_session[id];
	$re_info[pw] = $wiz_session[passwd];
	$re_info[name] = $wiz_session[name];
	$re_info[email] = $wiz_session[email];
	$re_info[hphone] = $wiz_session[hphone];
	send_mailsms("mem_out", $re_info);

	if(!empty($wiz_session[id])){
	  //session_unregister("wiz_session");
		setcookie("wiz_session[id]", "", time()-3600, "/");
		setcookie("wiz_session[name]", "", time()-3600, "/");
		setcookie("wiz_session[email]", "", time()-3600, "/");
		setcookie("wiz_session[level]", "", time()-3600, "/");
		setcookie("wiz_session[permi]", "", time()-3600, "/");
	}

	comalert("ȸ��Ż�� �Ϸ�Ǿ����ϴ�.", "/");


// ���ɻ�ǰ �߰�
}else if($mode == "my_wish"){

	if(empty($wiz_session[id])) {
		error("�α��� �� �̿����ּ���.");
		exit;
	}
	
	if(!empty($idx)) {
		$sql = "select * from wiz_basket_tmp where idx = '$idx'";
		$result = mysql_query($sql) or error(mysql_error());
		$row = mysql_fetch_array($result);

		$prdcode = $row[prdcode];

		$optcode = $row[optcode];
		$opttitle = $row[opttitle];
		$optcode2 = $row[optcode2];
		$opttitle2 = $row[opttitle2];
		$optcode3 = $row[optcode3];
		$opttitle3 = $row[opttitle3];
		$optcode4 = $row[optcode4];
		$opttitle4 = $row[opttitle4];
		$optcode5 = $row[optcode5];
		$opttitle5 = $row[opttitle5];
		$optcode6 = $row[optcode6];
		$opttitle6 = $row[opttitle6];
		$optcode7 = $row[optcode7];
		$opttitle7 = $row[opttitle7];
	}

	$sql = "select * from wiz_wishlist where memid = '$wiz_session[id]' and prdcode = '$prdcode'";
	$result = mysql_query($sql) or error(mysql_error());
	$total = mysql_num_rows($result);

	if($total > 0 ) error("�̹� ����� ���ɻ�ǰ �Դϴ�.");

	$sql = "insert into wiz_wishlist(idx,memid,prdcode,opttitle,optcode,opttitle2,optcode2,opttitle3,optcode3
					,opttitle4,optcode4,opttitle5,optcode5,opttitle6,optcode6,opttitle7,optcode7,amount,wdate)
					values('', '$wiz_session[id]', '$prdcode', '$opttitle','$optcode','$opttitle2','$optcode2'
					,'$opttitle3','$optcode3','$opttitle4','$optcode4','$opttitle5','$optcode5'
					,'$opttitle6','$optcode6','$opttitle7','$optcode7','$amount', now())";
	$result = mysql_query($sql) or error(mysql_error());

	comalert("���ɻ�ǰ�� �߰��Ͽ����ϴ�.", "");

// ���ɻ�ǰ ����
}else if($mode == "my_wishdel"){

	if(!empty($selprd)) {

		$tmp_prd = explode("|", $selprd);

		for($ii = 0; $ii < count($tmp_prd); $ii++) {

			$idx = $tmp_prd[$ii];

			$sql = "delete from wiz_wishlist where memid = '$wiz_session[id]' and idx = '$idx'";
			$result = mysql_query($sql) or error(mysql_error());

		}

	} else {

		$sql = "delete from wiz_wishlist where memid = '$wiz_session[id]' and idx = '$idx'";
		$result = mysql_query($sql) or error(mysql_error());

	}

	comalert("���ɻ�ǰ���� �����Ǿ����ϴ�.", "");


// 1:1 qna
}else if($mode == "my_qna"){


	if($sub_mode == "insert"){

		$sql = "insert into wiz_consult(idx,memid,name,subject,question,answer,wdate,status) values('', '$wiz_session[id]', '$wiz_session[name]', '$subject', '$question', '$answer', now(), 'N')";
		$result = mysql_query($sql) or error(mysql_error());
		Header("Location: my_qna.php");

	}else if($sub_mode == "modify"){

		$sql = "update wiz_consult set subject = '$subject', question = '$question' where memid = '$wiz_session[id]' and idx = '$idx'";
		$result = mysql_query($sql) or error(mysql_error());
		comalert("���� �Ǿ����ϴ�.", "my_qnaview.php?idx=$idx");

	}else if($sub_mode == "delete"){

		$sql = "delete from wiz_consult where memid = '$wiz_session[id]' and idx = '$idx'";
		$result = mysql_query($sql) or error(mysql_error());
		comalert("���� �Ǿ����ϴ�.", "my_qna.php");

	}

}
?>