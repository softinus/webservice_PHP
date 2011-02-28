<?
include "../../inc/common.inc";
include "../../inc/util.inc";
include "../../inc/admin_check.inc";

// 기본정보설정
if($mode == "shop_info"){

	$upfile_path = "../../data/config";

	// 사업자도장
	if($com_seal[size] > 0){
		file_check($com_seal[name]);
		copy($com_seal[tmp_name], $upfile_path."/com_seal.gif");
		@chmod($upfile_path."/com_seal.gif", 0606);
	}

	$com_post = $com_post."-".$com_post2;

	if(!empty($estimate_bigo)) $estimate_sql = ", estimate_bigo='$estimate_bigo'";
	$sql = "update wiz_shopinfo set shop_name='$shop_name', shop_url='$shop_url', shop_email='$shop_email', shop_tel='$shop_tel', shop_hand='$shop_hand',
					com_num='$com_num', com_name='$com_name', com_owner='$com_owner', com_post='$com_post', com_address='$com_address', com_kind='$com_kind', com_class='$com_class', com_tel='$com_tel', com_fax='$com_fax' $estimate_sql";
	$result = mysql_query($sql) or error(mysql_error());

	$sql = "update wiz_design set site_title='$site_title', site_intro='$site_intro', site_keyword='$site_keyword'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("기본정보 설정이 저장되었습니다.","shop_info.php");




// 운영정보설정
}else if($mode == "oper_info"){

	for($ii=0; $ii<count($pay_method); $ii++){
      $pay_tmp .= $pay_method[$ii]."/";
   }

	for($ii=0; $ii<count($pay_method_day); $ii++){
      $pay_tmp_day .= $pay_method_day[$ii]."/";
   }
	$upfile_path = "../../data/oneday";	// 원데이몰에 쓰일 이미지 저장경로
	// 숫자 번호 이미지 업로드
	for($i=0; $i<10; $i++){
		if(${"number".$i}[size]>0){
			file_check(${"number".$i}[name]);
			copy(${"number".$i}[tmp_name], $upfile_path."/number_".$i.".gif");
			@chmod($upfile_path."/number_".$i.".gif", 0606);
			${"number".$i} = "number_".$i.".gif";
		}else{
			${"number".$i} = "number_".$i.".gif";
		}
	}
	// 주문버튼 이미지 업로드
	if($button_buy[size] > 0){
		file_check($button_buy[name]);
		copy($button_buy[tmp_name], $upfile_path."/button_buy.gif");
		@chmod($upfile_path."/button_buy.gif", 0606);
		$button_buy = "button_buy.gif";
	}else{
		$button_buy = "button_buy.gif";
	}
	// 품절버튼 이미지 업로드
	if($button_soldout[size] > 0){
		file_check($button_soldout[name]);
		copy($button_soldout[tmp_name], $upfile_path."/button_soldout.gif");
		@chmod($upfile_path."/button_soldout.gif", 0606);
		$button_soldout = "button_soldout.gif";
	}else{
		$button_soldout = "button_soldout.gif";
	}

	for($i=0; $i<count($sns); $i++){
		if($i==0){
			$sns_input .= $sns[$i];
		}else{
			$sns_input .= ",".$sns[$i];
		}
	}

	$sql = "update wiz_operinfo set pay_method ='$pay_tmp',  pay_id ='$pay_id', pay_key = '$pay_key', pay_agent ='$pay_agent', pay_escrow='$pay_escrow',  pay_test ='$pay_test',
						del_com='$del_com', del_trace='$del_trace', del_prd='$del_prd', del_prd2='$del_prd2', del_method ='$del_method', del_fixprice ='$del_fixprice', del_staprice ='$del_staprice', del_staprice2 ='$del_staprice2', del_staprice3 ='$del_staprice3',
						del_extrapost1 ='$del_extrapost1', del_extrapost12 ='$del_extrapost12', del_extraprice1 ='$del_extraprice1',
						del_extrapost2 ='$del_extrapost2', del_extrapost22 ='$del_extrapost22', del_extraprice2 ='$del_extraprice2',
						del_extrapost3 ='$del_extrapost3', del_extrapost32 ='$del_extrapost32', del_extraprice3 ='$del_extraprice3',
						reserve_use ='$reserve_use', reserve_join ='$reserve_join', reserve_recom ='$reserve_recom', reserve_min ='$reserve_min', reserve_max ='$reserve_max', reserve_buy ='$reserve_buy', reserve_per ='$reserve_per',
						timemsg='$timemsg',countmsg='$countmsg',
						review_use ='$review_use', review_level ='$review_level', tax_use='$tax_use', tax_status='$tax_status', prdrel_use='$prdrel_use'";

	$result = mysql_query($sql) or error(mysql_error());

	$code = "review";
	$sql = "update wiz_bbsinfo set usetype = '$review_usetype', wpermi = '$review_wpermi' where code = '$code'";
	mysql_query($sql) or error(mysql_error());

	$code = "qna";
	$sql = "update wiz_bbsinfo set usetype = '$qna_usetype', wpermi = '$qna_wpermi' where code = '$code'";
	mysql_query($sql) or error(mysql_error());

	complete("운영정보 설정이 저장되었습니다.","shop_oper.php");

// 거래처관리
}else if($mode == "shop_trade"){


	if($sub_mode == "insert"){

	   $com_post = $com_post."-".$com_post2;

	   $sql = "insert into wiz_tradecom(idx,com_type,com_num,com_name,com_owner,com_post,com_address,com_kind,com_class,
	   											com_tel,com_fax,com_bank,com_account,com_homepage,charge_name,charge_email,charge_hand,charge_tel,descript)
													values(
	                        '$idx', '$com_type', '$com_num', '$com_name', '$com_owner', '$com_post', '$com_address', '$com_kind', '$com_class',
	                        '$com_tel', '$com_fax', '$com_bank', '$com_account', '$com_homepage',
	                        '$charge_name', '$charge_email', '$charge_hand', '$charge_tel', '$descript')";

	   $result = mysql_query($sql) or error("거래처 정보를 저장하는중 에러가 발생하였습니다.");

	   complete("거래처 정보가 저장되었습니다.","shop_trade.php");



	}else if($sub_mode == "update"){


	   $com_post = $com_post."-".$com_post2;

	   $sql = "update wiz_tradecom set
	                        com_type = '$com_type', com_num = '$com_num', com_name = '$com_name', com_owner = '$com_owner', com_post = '$com_post', com_address = '$com_address', com_kind = '$com_kind', com_class = '$com_class',
	                        com_tel = '$com_tel', com_fax = '$com_fax', com_bank = '$com_bank', com_account = '$com_account', com_homepage = '$com_homepage',
	                        charge_name = '$charge_name', charge_email = '$charge_email', charge_hand = '$charge_hand', charge_tel = '$charge_tel', descript = '$descript'
	                        where idx = '$idx'";

	   $result = mysql_query($sql) or error("거래처 정보를 수정하는중 에러가 발생하였습니다.");

	   complete("거래처 정보가 저장되었습니다.","shop_trade_input.php?sub_mode=update&idx=$idx");



	}else if($sub_mode == "delete"){

	   $sql = "delete from wiz_tradecom where idx = '$idx'";
	   $result = mysql_query($sql) or error("거래처 삭제중 에러가 발생하였습니다.");

	   complete("거래처가 삭제되었습니다.","shop_trade.php");

	}


// 쿠폰관리
}else if($mode == "shop_coupon"){


	$couponimg_path = "../../images/coupon";
	if(!is_dir($couponimg_path)) mkdir($couponimg_path, 0707);	// 업로드 디렉토리 생성

	$sql = "select * from wiz_coupon where idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$coupon_info = mysql_fetch_array($result);

	if($sub_mode == "insert"){

		if($coupon_img[size] > 0){
			file_check($coupon_img[name]);
			copy($coupon_img[tmp_name], $couponimg_path."/".$coupon_img[name]);
			@chmod($couponimg_path."/".$coupon_img[name], 0606);
		}

		$sql = "insert into wiz_coupon(idx, coupon_name, coupon_img, coupon_sdate, coupon_edate, coupon_amount, coupon_limit, coupon_dis, coupon_type, wdate)
												values('', '$coupon_name', '$coupon_img_name', '$coupon_sdate', '$coupon_edate', '$coupon_amount', '$coupon_limit', '$coupon_dis', '$coupon_type',now())";

		mysql_query($sql) or error(mysql_error());

		complete("쿠폰이 생성되었습니다.","shop_coupon.php");



	}else if($sub_mode == "update"){

		if($coupon_img[size] > 0){
			file_check($coupon_img[name]);
			@unlink($couponimg_path."/".$coupon_info[coupon_img]);
			copy($coupon_img[tmp_name], $couponimg_path."/".$coupon_img[name]);
			chmod($couponimg_path."/".$coupon_img[name], 0606);
			$coupon_img_sql = " coupon_img = '$coupon_img[name]', ";
		}

		$sql = "update wiz_coupon set
		                coupon_name = '$coupon_name', $coupon_img_sql coupon_sdate = '$coupon_sdate', coupon_edate = '$coupon_edate', coupon_amount = '$coupon_amount', coupon_limit = '$coupon_limit', coupon_dis = '$coupon_dis', coupon_type = '$coupon_type'
		                where idx = '$idx'";

		mysql_query($sql) or error(mysql_error());

		complete("쿠폰이 수정되었습니다.","shop_coupon_input.php?sub_mode=update&idx=$idx");



	}else if($sub_mode == "delete"){

		@unlink($couponimg_path."/".$coupon_info[coupon_img]);
		$sql = "delete from wiz_coupon where idx = '$idx'";
		mysql_query($sql) or error(mysql_error());

		complete("쿠폰이 삭제되었습니다.","shop_coupon.php");

	}

// 회원발급쿠폰 삭제
}else if(!strcmp($mode, "delmycoupon")) {

	$sql = "delete from wiz_mycoupon where idx = '$idx'";
	mysql_query($sql) or error(mysql_error());

	complete("쿠폰이 삭제되었습니다.","shop_mycoupon.php?prdcode=$prdcode");

// 쿠폰사용여부 설정
}else if($mode == "coupon_use"){


	$sql = "update wiz_operinfo set coupon_use ='$coupon_use'";

	$result = mysql_query($sql) or error(mysql_error());

	complete("쿠폰사용여부 설정이 저장되었습니다.","shop_coupon.php");

// 이메일 sms 설정
}else if($mode == "mailsms"){


	if($sub_mode == "insert"){

	  $content = str_replace("http://".$HTTP_HOST, "{SHOP_URL}", $content);

	  $sql = "insert into wiz_mailsms(code,subject,sms_cust,sms_oper,sms_msg,email_subj,email_cust,email_oper,email_msg)
							values('$code','$subject','$sms_cust','$sms_oper','$sms_msg','$email_subj','$email_cust','$email_oper','$content')";
   	$result = mysql_query($sql) or error(mysql_error());

   	complete("추가하였습니다.","shop_mailsms_input.php?sub_mode=update&code=$code");

   }else if($sub_mode == "update"){

   	if(empty($sms_cust)) $sms_cust = "N";
   	if(empty($sms_oper)) $sms_oper = "N";
   	if(empty($email_cust)) $email_cust = "N";
   	if(empty($email_oper)) $email_oper = "N";

   	$content = str_replace("http://".$HTTP_HOST, "{SHOP_URL}", $content);

   	$sql = "update wiz_mailsms set subject = '$subject', sms_cust = '$sms_cust', sms_oper = '$sms_oper', sms_msg = '$sms_msg',
   	                     email_cust = '$email_cust', email_oper = '$email_oper', email_subj = '$email_subj', email_msg  = '$content' where code = '$code'";

   	$result = mysql_query($sql) or error(mysql_error());

   	complete("설정사항을 적용하였습니다.","shop_mailsms_input.php?sub_mode=update&code=$code");

	}else if($sub_mode == "delete"){

	   $sql = "delete from wiz_mailsms where code = '$code'";
	   $result = mysql_query($sql) or error(mysql_error());

   	complete("삭제 되었습니다.","shop_mailsms.php");

	}



// 관리자설정
}else if($mode == "shop_admin"){

   if($sub_mode == "insert"){

      $resno = $resno."-".$resno2;
      $post = $post."-".$post2;
      $tphone = $tphone."-".$tphone2."-".$tphone3;
      $hphone = $hphone."-".$hphone2."-".$hphone3;

      for($ii=0; $ii<count($permi); $ii++){
         $tmp_permi .= $permi[$ii]."/";
      }

      $sql = "insert into wiz_admin(id, passwd, name, resno, email, tphone, hphone, post, address, address2, part, permi, last, wdate, descript)
                           values('$id', '$passwd', '$name', '$resno', '$email', '$tphone', '$hphone', '$post', '$address', '$address2', '$part', '$tmp_permi', '$last', now(), '$descript')";
      $result = mysql_query($sql) or error("이미 등록된 아이디 입니다.");

      complete("관리자가 추가되었습니다.","shop_admin.php");


   }else if($sub_mode == "update"){

      $resno = $resno."-".$resno2;
      $post = $post."-".$post2;
      $tphone = $tphone."-".$tphone2."-".$tphone3;
      $hphone = $hphone."-".$hphone2."-".$hphone3;

      for($ii=0; $ii<count($permi); $ii++){
         $tmp_permi .= $permi[$ii]."/";
      }

      $sql = "update wiz_admin set
                     passwd = '$passwd', name = '$name', resno = '$resno', email = '$email', tphone = '$tphone', hphone = '$hphone', post = '$post', address = '$address', address2 = '$address2', part='$part', permi='$tmp_permi', descript = '$descript' where id = '$id'";
      $result = mysql_query($sql) or error(mysql_error());

      complete("관리자 정보가 수정되었습니다.","shop_admin_input.php?sub_mode=update&id=$id");


   }else if($sub_mode == "delete"){

      $sql = "select id from wiz_admin";
      $result = mysql_query($sql) or error(mysql_error());
      $total = mysql_num_rows($result);

      if($total <= 1) error("관리자계정이 하나밖에 없습니다. 삭제할 수 없습니다.");

      $sql = "delete from wiz_admin where id='$id'";
      $result = mysql_query($sql) or error(mysql_error());

      complete("관리자 삭제되었습니다.","shop_admin.php");


   }else if($sub_mode == "logdel"){

      $sql = "delete from wiz_adminlog where admin_id='$admin_id'";
      $result = mysql_query($sql) or error(mysql_error());

      complete("로그가 삭제되었습니다.","shop_admin_input.php?sub_mode=update&admin_id=$admin_id");

   }


// 적립금 일괄적용
}else if($mode == "setreserve"){

	$percent = $reserve_per/100;

   $sql = "update wiz_product set reserve = sellprice * $percent";
   $result = mysql_query($sql) or error(mysql_error());

   $sql = "update wiz_operinfo set reserve_per ='$reserve_per'";
	$result = mysql_query($sql) or error(mysql_error());

   complete("적립금 일괄적용 되었습니다.","shop_oper.php");



// sms충전
}else if($mode == "smsfill"){

	$sms_id = "Any_".$sms_id;
  $sql = "update wiz_operinfo set sms_type = '$sms_type', sms_id ='$sms_id', sms_pw ='$sms_pw'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("설정이 저장되었습니다.","shop_smsfill.php");

// 페이지 추가
}else if($mode == "insert"){

	$sdate = $sdate_year."-".$sdate_month."-".$sdate_day;
	$edate = $edate_year."-".$edate_month."-".$sdate_day;

	$sql = "insert into wiz_content(idx,type,isuse,scroll,posi_x,posi_y,size_x,size_y,sdate,edate,linkurl,popup_type,title,content,wdate)
									values('','$type', '$isuse', '$scroll', '$posi_x', '$posi_y', '$size_x', '$size_y', '$sdate', '$edate', '$linkurl', '$popup_type', '$title', '$content',now())";

	$result = mysql_query($sql) or error(mysql_error());

	if($type == "popup") complete("추가되었습니다.","shop_popup.php");
	else complete("추가되었습니다.","shop_content.php");

// 페이지 수정
}else if($mode == "update"){

	$sdate = $sdate_year."-".$sdate_month."-".$sdate_day;
	$edate = $edate_year."-".$edate_month."-".$edate_day;

	if(!empty($type)) $where_sql = " where type = '$type' and idx = '$idx'";
	else $where_sql = " where idx = '$idx'";

	$sql = "update wiz_content set isuse='$isuse', scroll='$scroll', posi_x='$posi_x', posi_y='$posi_y', size_x='$size_x', size_y='$size_y',
							sdate='$sdate', edate='$edate', linkurl='$linkurl', popup_type='$popup_type', title='$title', content='$content' $where_sql";
	$result = mysql_query($sql) or error(mysql_error());

	complete("수정되었습니다.","");

// 페이지 삭제
}else if($mode == "delete"){

	$sql = "delete from wiz_content where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("삭제되었습니다.","");

// 배너그룹수정
}else if($mode == "ban_group_update") {


	$sql = "update wiz_bannerinfo set title='$title', types='$types', types_num='$types_num', isuse='$isuse' where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("배너그룹이 수정되었습니다.","shop_banner_input".$popup.".php?mode=ban_group_update&idx=$idx&?place=$place");


// 배너추가
}else if($mode == "ban_insert"){

	$banner_path = "../../data/banner";

	if($de_img[size] > 0){
		file_check($de_img[name]);

    $de_img_ext = strtolower(substr($de_img[name],-3));
    $de_img_name = date('ymdhis').rand(10,99).".".$de_img_ext;
		copy($de_img[tmp_name], $banner_path."/".$de_img_name);
		chmod($banner_path."/".$de_img_name, 0606);
	}

	$content = str_replace("\\\"", "\'", $content);

	$sql = "insert into wiz_banner(idx,name,align,prior,isuse,link_url,link_target,de_type,de_img,de_html) values('', '$name','$align', '$prior', '$isuse', '$link_url', '$link_target', '$de_type', '$de_img_name', '$content')";
	$result = mysql_query($sql) or error(mysql_error());

	complete("배너가 추가되었습니다.","shop_banner".$popup.".php?code=$name&align=$align");


// 배너수정
}else if($mode == "ban_update"){

	$banner_path = "../../data/banner";

	if($de_img[size] > 0){

		file_check($de_img[name]);

		$sql = "select de_img from wiz_banner where idx = '$idx';";
		$result = mysql_query($sql) or error(mysql_error());
		$row = mysql_fetch_array($result);

		if($row[de_img] != "") @unlink($banner_path."/".$row[de_img]);

    $de_img_ext = strtolower(substr($de_img[name],-3));
    $de_img_name = date('ymdhis').rand(10,99).".".$de_img_ext;
		copy($de_img[tmp_name], $banner_path."/".$de_img_name);
		chmod($banner_path."/".$de_img_name, 0606);
		$de_img_sql = " de_img='$de_img_name', ";
	}

	$content = str_replace("\\\"", "\'", $content);

	$sql = "update wiz_banner set name='$name',align='$align', prior='$prior', isuse='$isuse', link_url='$link_url', link_target='$link_target',
							de_type='$de_type', $de_img_sql de_html='$content' where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("배너가 수정되었습니다.","shop_banner_input".$popup.".php?mode=ban_update&code=$name&idx=$idx&align=$align");


// 배너삭제
}else if($mode == "ban_delete"){

	$banner_path = "../../data/banner";

	if($ban_img != "") @unlink($banner_path."/".$ban_img);

	$sql = "DELETE FROM wiz_banner WHERE idx = '$idx'";
	mysql_query($sql) or error(mysql_error());

	complete("삭제되었습니다.","shop_banner".$popup.".php?code=$code");

}

?>