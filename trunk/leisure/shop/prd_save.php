<?

include "../inc/common.inc";		// DB���ؼ�, ������ �ľ�
include "../inc/shop_info.inc";	// �����
include "../inc/oper_info.inc";	// �����


// ��� üũ
function checkAmount($prdcode, $amount, $optcode){

	global $prd_info;

	global $optcode3;
	global $optcode4;

	$sql = "select prdname, prdimg_R as prdimg, opttitle, optcode, opttitle2, optcode2, opttitle3, optcode3, opttitle4, optcode4, optvalue, stock, sellprice, reserve, shortage, opt_use from wiz_product where prdcode = '$prdcode'";
	$result = mysql_query($sql) or error(mysql_error());
	$prd_info = mysql_fetch_object($result);
   
	if(!empty($prd_info->optcode3)) {

		$opt3_arr = explode("^^", $prd_info->optcode3);

		for($ii = 0; $ii < count($opt3_arr); $ii++) {

			list($opt, $price, $reserve) = explode("^", $opt3_arr[$ii]);

			if(!strcmp($opt, $optcode3)) {

				$prd_info->sellprice = $prd_info->sellprice + $price;
				$prd_info->reserve = $prd_info->reserve + $reserve;

			}
		}
	}
	if(!empty($prd_info->optcode4)) {

		$opt4_arr = explode("^^", $prd_info->optcode4);

		for($ii = 0; $ii < count($opt4_arr); $ii++) {

			list($opt, $price, $reserve) = explode("^", $opt4_arr[$ii]);

			if(!strcmp($opt, $optcode4)) {

				$prd_info->sellprice = $prd_info->sellprice + $price;
				$prd_info->reserve = $prd_info->reserve + $reserve;

			}
		}

	}
	
	if(!strcmp($prd_info->opt_use, "Y")){

		$opt1_arr = explode("^", $prd_info->optcode);
		$opt2_arr = explode("^", $prd_info->optcode2);
		$opt_tmp = explode("^^", $prd_info->optvalue);

		list($optcode1, $optcode2) = explode("/", $optcode);

		$no = 0;
		for($ii = 0; $ii < count($opt1_arr) - 1; $ii++) {
			for($jj = 0; $jj < count($opt2_arr) - 1; $jj++) {
				list($price, $reserve, $stock) = explode("^", $opt_tmp[$no]);

				if(!strcmp($optcode1, $opt1_arr[$ii]) && !strcmp($optcode2, $opt2_arr[$jj])) {
					$prd_info->sellprice = $prd_info->sellprice + $price;
					$prd_info->reserve = $prd_info->reserve + $reserve;
					if($stock < $amount){
						error("�ֹ������� ���(".$stock."��)���� �����ϴ�.");
					}
				}

				$no++;
			}
		}

		/*
		$tmp_short = 0;
		$opt_tmp = explode("^^",$prd_info->optcode);
		for($ii=0; $ii<count($opt_tmp)-1; $ii++){
			$opt_sub_tmp = explode("^",$opt_tmp[$ii]);
			if($opt_sub_tmp[0] == $optcode){
				$prd_info->sellprice = $opt_sub_tmp[1];
				if($opt_sub_tmp[2] < $amount){
					error("�ֹ������� ���(".$opt_sub_tmp[2]."��)���� �����ϴ�.");
				}
			}
		}
		*/

	}else{
		
		if(!strcmp($prd_info->shortage, "S")) {

	   	if($amount > $prd_info->stock){
	   		error("�ֹ������� ���(".$prd_info->stock."��)���� �����ϴ�.");
	   	}
	   	
	  } else if(!strcmp($prd_info->shortage, "Y")) {
	  	
	  	error("ǰ���� ��ǰ�Դϴ�.");
	  	
	  }

	}

}



// ��ǰ��ٱ��Ͽ� ����
if($mode == "insert"){

	if(empty($idx) && empty($selprd)) {

		$optlist = explode("^",$optcode);
		$optcode = $optlist[0];

		$optlist = explode("^",$optcode2);
		$optcode2 = $optlist[0];

		$optlist = explode("^",$optcode3);
		$optcode3 = $optlist[0];

		$optlist = explode("^",$optcode4);
		$optcode4 = $optlist[0];

		$optlist = explode("^",$optcode5);
		$optcode5 = $optlist[0];

		$optlist = explode("^",$optcode6);
		$optcode6 = $optlist[0];

		$optlist = explode("^",$optcode7);
		$optcode7 = $optlist[0];

		// ������ǰ�� ���� �ɼ��� �����ߴ���
		$bsql = "SELECT * FROM wiz_basket_tmp WHERE uniq_id='".$_COOKIE["uniq_id"]."'";
		$bresult = mysql_query($bsql) or error(mysql_error());
		while($result = mysql_fetch_array($bresult)){
			if($result[prdcode] == $prdcode &&
				$result[optcode] == $optcode &&
				$result[optcode2] == $optcode2 &&
				$result[optcode3] == $optcode3 &&
				$result[optcode4] == $optcode4 &&
				$result[optcode5] == $optcode5 &&
				$result[optcode6] == $optcode6 &&
				$result[optcode7] == $optcode7){
				$result[amount] = $amount;
				$basket_exist = true;
				break;
			}
		}
		
		// ��� üũ
	  checkAmount($prdcode, $amount, $optcode);

	  // ������ ��뿩��
	  if($oper_info->reserve_use != "Y") $prd_info->reserve = 0;

		// �ߺ��� ��ǰ�� �ɼ��� ���ٸ� �űԻ���
		if(!$basket_exist){
			
			$sellprice = $tmp_sellprice + $opt_price1 + $opt_price2 + $opt_price3;
			$reserve = $tmp_reserve + $opt_reserve1 + $opt_reserve2 + $opt_reserve3;
			
			$insert_sql = "INSERT INTO wiz_basket_tmp (
			idx,uniq_id,prdcode,prdname,prdimg,prdprice,prdreserve,opttitle,optcode,opttitle2,optcode2,
			opttitle3,optcode3,opttitle4,optcode4,opttitle5,optcode5,opttitle6,optcode6,opttitle7,optcode7,amount,wdate
			)VALUES(
			'','".$_COOKIE["uniq_id"]."','$prdcode','$prd_info->prdname','$prd_info->prdimg','$sellprice','$reserve','$opttitle','$optcode','$opttitle2','$optcode2',
			'$opttitle3','$optcode3','$opttitle4','$optcode4','$opttitle5','$optcode5','$opttitle6','$optcode6','$opttitle7','$optcode7','$amount',now())";
		
			mysql_query($insert_sql) or error(mysql_error());

			// ��ٱ��ϼ� ����
			$sql = "update wiz_product set basketcnt = basketcnt + 1 where prdcode='$prdcode'";
			@mysql_query($sql);

		}

	} else {
		//���ø���Ʈ���� ������ ��ٱ��� ��涧
		if(!empty($idx)) {
			$selprd = $idx;
		}

		$tmp_prd = explode("|", $selprd);
		foreach($tmp_prd as $pkey => $pvalue){
			if(!empty($pvalue)) $tmpq .= " OR idx='$pvalue'";
		}
		$tmpq = substr($tmpq,3);

		$sql = "SELECT * FROM wiz_wishlist WHERE memid = '$wiz_session[id]' AND ".$tmpq;
		$results = mysql_query($sql);
		while($row = mysql_fetch_array($results)){


				$prdcode = $row[prdcode];
				$opttitle = $row[opttitle];
				$optcode = $row[optcode];
				$opttitle2 = $row[opttitle2];
				$optcode2 = $row[optcode2];
				$opttitle3 = $row[opttitle3];
				$optcode3 = $row[optcode3];

				$opttitle4 = $row[opttitle4];
				$optcode4 = $row[optcode4];
				$opttitle5 = $row[opttitle5];
				$optcode5 = $row[optcode5];
				$opttitle6 = $row[opttitle6];
				$optcode6 = $row[optcode6];
				$opttitle7 = $row[opttitle7];
				$optcode7 = $row[optcode7];

				$amount = $row[amount];

				$optlist = explode("^",$optcode);
				$optcode = $optlist[0];
				$optlist = explode("^",$optcode2);
				$optcode2 = $optlist[0];
				$optlist = explode("^",$optcode3);
				$optcode3 = $optlist[0];
				$optlist = explode("^",$optcode4);
				$optcode4 = $optlist[0];
				$optlist = explode("^",$optcode5);
				$optcode5 = $optlist[0];
				$optlist = explode("^",$optcode6);
				$optcode6 = $optlist[0];
				$optlist = explode("^",$optcode7);
				$optcode7 = $optlist[0];


				// ������ǰ�� ���� �ɼ��� �����ߴ���
    		$bsql = "SELECT * FROM wiz_basket_tmp WHERE uniq_id='".$_COOKIE["uniq_id"]."'";
    		$bresult = mysql_query($bsql) or error(mysql_error());
    		while($result = mysql_fetch_array($bresult)){
    			if($result[prdcode] == $prdcode &&
    				$result[optcode] == $optcode &&
    				$result[optcode2] == $optcode2 &&
    				$result[optcode3] == $optcode3 &&
    				$result[optcode4] == $optcode4 &&
    				$result[optcode5] == $optcode5 &&
    				$result[optcode6] == $optcode6 &&
    				$result[optcode7] == $optcode7){
    				$result[amount] = $amount;
    				$basket_exist = true;
    				break;

    			}
    		}
				// ��� üũ
			  checkAmount($prdcode, $amount, $optcode);

			  // ������ ��뿩��
			  if($oper_info->reserve_use != "Y") $prd_info->reserve = 0;
			  
    		// �ߺ��� ��ǰ�� �ɼ��� ���ٸ� �űԻ���
    		if(!$basket_exist){
       		$insert_sql = "INSERT INTO wiz_basket_tmp (
       		idx,uniq_id,prdcode,prdname,prdimg,prdprice,prdreserve,opttitle,optcode,opttitle2,optcode2,
       		opttitle3,optcode3,opttitle4,optcode4,opttitle5,optcode5,opttitle6,optcode6,opttitle7,optcode7,amount,wdate
       		)VALUES(
       		'','".$_COOKIE["uniq_id"]."','$prdcode','$prd_info->prdname','$prd_info->prdimg','$prd_info->sellprice','$prd_info->reserve','$opttitle','$optcode','$opttitle2','$optcode2',
       		'$opttitle3','$optcode3','$opttitle4','$optcode4','$opttitle5','$optcode5','$opttitle6','$optcode6','$opttitle7','$optcode7','$amount',now())";
       		mysql_query($insert_sql) or error(mysql_error());

 				// ��ٱ��ϼ� ����
 				$sql = "UPDATE wiz_product SET basketcnt = basketcnt + 1 WHERE prdcode='$prdcode'";
 				@mysql_query($sql);
			}
		}
	}

   if($direct == "basket" || empty($direct)) header("Location: prd_basket.php");
   else if($direct == "buy") header("Location: order_form.php");

// ��ٱ��� ����
}else if($mode == "update"){

	$idx = $_POST[idx];
	$amount = $_POST[amount];
	$bkinfo= mysql_fetch_array(mysql_query("SELECT * FROM wiz_basket_tmp WHERE uniq_id='".$_COOKIE["uniq_id"]."' AND idx='".$idx."'"));
	
	// ��� üũ
	checkAmount($bkinfo[prdcode], $amount, $bkinfo[optcode]);
	
	@mysql_query("UPDATE wiz_basket_tmp SET amount = '$amount' WHERE uniq_id='".$_COOKIE["uniq_id"]."' AND idx='".$idx."'");

	header("Location: prd_basket.php");


// ��ٱ��� ����
}else if($mode == "delete"){

	$idx = $_GET[idx];
	@mysql_query("DELETE FROM wiz_basket_tmp WHERE uniq_id='".$_COOKIE["uniq_id"]."' AND idx='".$idx."'");
	header("Location: prd_basket.php");


// ��ٱ��� ��ü����
}else if($mode == "delall"){
	@mysql_query("DELETE FROM wiz_basket_tmp WHERE uniq_id='".$_COOKIE["uniq_id"]."'");
	header("Location: prd_basket.php");


// ��ǰ�� �ۼ�
}else if($mode == "review"){

	if($oper_info->review_level == "M" && empty($wiz_session[id])){

		error("��ǰ�� �ۼ��� ȸ���� �����մϴ�.");

	}else{

		$ctype = "PRD";

		$sql = "insert into wiz_comment(idx,ctype,cidx,prdcode,star,id,name,content,passwd,wdate,wip)
								values('', '$ctype', '', '$prdcode', '$star', '$wiz_session[id]', '$name', '$content', '$passwd', now(), '$_SERVER[REMOTE_ADDR]')";
		$result = mysql_query($sql) or error(mysql_error());

		comalert("��ǰ���� �ۼ��Ͽ����ϴ�.", "/shop/prd_view.php?prdcode=$prdcode");

	}

// ��ǰ�� ����
}else if($mode == "del_review"){

	$sql = "select idx from wiz_comment where idx='$idx' and passwd = '$passwd'";
	$result = mysql_query($sql) or error(mysql_error());

	if(mysql_num_rows($result) > 0){

		$sql = "delete from wiz_comment where idx='$idx' and passwd = '$passwd'";
	   $result = mysql_query($sql) or error(mysql_error());

	   comalert("��ǰ���� �����Ͽ����ϴ�.", "/shop/prd_view.php?prdcode=$prdcode");

	}else{

		error("��й�ȣ�� ���� �ʽ��ϴ�.");

	}

// ��ǰQ&A ��й�ȣ üũ
} else if(!strcmp($mode, "prdqna")) {

	$sql = "select passwd from wiz_bbs where code = 'prdqna' and idx = '$idx' and prdcode = '$prdcode' and passwd = '$passwd'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_array($result);

	if(!empty($row[passwd])) {
		echo "<script>document.location='prd_view.php?prdcode=".$prdcode."';</script>";
	} else {
		error("��й�ȣ�� ��ġ���� �ʽ��ϴ�.", "");
	}

}


?>