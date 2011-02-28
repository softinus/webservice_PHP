<?

include "../inc/common.inc";		// DB컨넥션, 접속자 파악
include "../inc/shop_info.inc";	// 운영정보
include "../inc/oper_info.inc";	// 운영정보


// 재고량 체크
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
						error("주문수량이 재고량(".$stock."개)보다 많습니다.");
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
					error("주문수량이 재고량(".$opt_sub_tmp[2]."개)보다 많습니다.");
				}
			}
		}
		*/

	}else{
		
		if(!strcmp($prd_info->shortage, "S")) {

	   	if($amount > $prd_info->stock){
	   		error("주문수량이 재고량(".$prd_info->stock."개)보다 많습니다.");
	   	}
	   	
	  } else if(!strcmp($prd_info->shortage, "Y")) {
	  	
	  	error("품절된 상품입니다.");
	  	
	  }

	}

}



// 상품장바구니에 저장
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

		// 같은상품에 같은 옵션을 선택했는지
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
		
		// 재고 체크
	  checkAmount($prdcode, $amount, $optcode);

	  // 적립금 사용여부
	  if($oper_info->reserve_use != "Y") $prd_info->reserve = 0;

		// 중복된 상품에 옵션이 없다면 신규생성
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

			// 장바구니수 증가
			$sql = "update wiz_product set basketcnt = basketcnt + 1 where prdcode='$prdcode'";
			@mysql_query($sql);

		}

	} else {
		//위시리스트에서 선택후 장바구니 담길때
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


				// 같은상품에 같은 옵션을 선택했는지
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
				// 재고 체크
			  checkAmount($prdcode, $amount, $optcode);

			  // 적립금 사용여부
			  if($oper_info->reserve_use != "Y") $prd_info->reserve = 0;
			  
    		// 중복된 상품에 옵션이 없다면 신규생성
    		if(!$basket_exist){
       		$insert_sql = "INSERT INTO wiz_basket_tmp (
       		idx,uniq_id,prdcode,prdname,prdimg,prdprice,prdreserve,opttitle,optcode,opttitle2,optcode2,
       		opttitle3,optcode3,opttitle4,optcode4,opttitle5,optcode5,opttitle6,optcode6,opttitle7,optcode7,amount,wdate
       		)VALUES(
       		'','".$_COOKIE["uniq_id"]."','$prdcode','$prd_info->prdname','$prd_info->prdimg','$prd_info->sellprice','$prd_info->reserve','$opttitle','$optcode','$opttitle2','$optcode2',
       		'$opttitle3','$optcode3','$opttitle4','$optcode4','$opttitle5','$optcode5','$opttitle6','$optcode6','$opttitle7','$optcode7','$amount',now())";
       		mysql_query($insert_sql) or error(mysql_error());

 				// 장바구니수 증가
 				$sql = "UPDATE wiz_product SET basketcnt = basketcnt + 1 WHERE prdcode='$prdcode'";
 				@mysql_query($sql);
			}
		}
	}

   if($direct == "basket" || empty($direct)) header("Location: prd_basket.php");
   else if($direct == "buy") header("Location: order_form.php");

// 장바구니 수정
}else if($mode == "update"){

	$idx = $_POST[idx];
	$amount = $_POST[amount];
	$bkinfo= mysql_fetch_array(mysql_query("SELECT * FROM wiz_basket_tmp WHERE uniq_id='".$_COOKIE["uniq_id"]."' AND idx='".$idx."'"));
	
	// 재고 체크
	checkAmount($bkinfo[prdcode], $amount, $bkinfo[optcode]);
	
	@mysql_query("UPDATE wiz_basket_tmp SET amount = '$amount' WHERE uniq_id='".$_COOKIE["uniq_id"]."' AND idx='".$idx."'");

	header("Location: prd_basket.php");


// 장바구니 삭제
}else if($mode == "delete"){

	$idx = $_GET[idx];
	@mysql_query("DELETE FROM wiz_basket_tmp WHERE uniq_id='".$_COOKIE["uniq_id"]."' AND idx='".$idx."'");
	header("Location: prd_basket.php");


// 장바구니 전체삭제
}else if($mode == "delall"){
	@mysql_query("DELETE FROM wiz_basket_tmp WHERE uniq_id='".$_COOKIE["uniq_id"]."'");
	header("Location: prd_basket.php");


// 상품평 작성
}else if($mode == "review"){

	if($oper_info->review_level == "M" && empty($wiz_session[id])){

		error("상품평 작성은 회원만 가능합니다.");

	}else{

		$ctype = "PRD";

		$sql = "insert into wiz_comment(idx,ctype,cidx,prdcode,star,id,name,content,passwd,wdate,wip)
								values('', '$ctype', '', '$prdcode', '$star', '$wiz_session[id]', '$name', '$content', '$passwd', now(), '$_SERVER[REMOTE_ADDR]')";
		$result = mysql_query($sql) or error(mysql_error());

		comalert("상품평을 작성하였습니다.", "/shop/prd_view.php?prdcode=$prdcode");

	}

// 상품평 삭제
}else if($mode == "del_review"){

	$sql = "select idx from wiz_comment where idx='$idx' and passwd = '$passwd'";
	$result = mysql_query($sql) or error(mysql_error());

	if(mysql_num_rows($result) > 0){

		$sql = "delete from wiz_comment where idx='$idx' and passwd = '$passwd'";
	   $result = mysql_query($sql) or error(mysql_error());

	   comalert("상품평을 삭제하였습니다.", "/shop/prd_view.php?prdcode=$prdcode");

	}else{

		error("비밀번호가 맞지 않습니다.");

	}

// 상품Q&A 비밀번호 체크
} else if(!strcmp($mode, "prdqna")) {

	$sql = "select passwd from wiz_bbs where code = 'prdqna' and idx = '$idx' and prdcode = '$prdcode' and passwd = '$passwd'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_array($result);

	if(!empty($row[passwd])) {
		echo "<script>document.location='prd_view.php?prdcode=".$prdcode."';</script>";
	} else {
		error("비밀번호가 일치하지 않습니다.", "");
	}

}


?>