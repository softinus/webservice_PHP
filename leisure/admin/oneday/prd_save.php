<?
include "../../inc/common.inc";
include "../../inc/admin_check.inc";
include "../../inc/oper_info.inc";
include "../../inc/util.inc";

// 페이지 파라메터 (검색조건이 변하지 않도록)
//--------------------------------------------------------------------------------------------------

$param = "page=$page&dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
$param .= "&special=$special&display=$display&searchopt=$searchopt&searchkey=$searchkey&stock_opt=$stock_opt&page=$page&shortpage=$shortpage";
if(!empty($prdcode)) $param .= "&prdcode=$prdcode";
//--------------------------------------------------------------------------------------------------

$prdimg_path = "../../data/prdimg";
$prdicon_path = "../../data/prdicon";

//////////////////////////////////////////////////////////////////////////////////////////
// 상품등록
//////////////////////////////////////////////////////////////////////////////////////////


if(empty($buy_mininum) || $buy_mininum==0 || $buy_mininum=="0"){
	$buy_mininum=1;
}

if(empty($buy_maxnum) || $buy_maxnum==0 || $buy_maxnum=="0"){
	$buy_maxnum=1;
}


if($mode == "insert"){

	// 상품넘버 만들기
	$sql = "select max(prdcode) as prdcode from wiz_dayproduct";
	$result = mysql_query($sql) or error(mysql_error());
	if($row = mysql_fetch_object($result)){

		$datenum = substr($row->prdcode,0,6);
		$prdnum = substr($row->prdcode,6,4);
		$prdnum = substr("000".(++$prdnum),-4);

		if($datenum == date('ymd')) $prdcode = $datenum.$prdnum;
		else $prdcode = date('ymd')."0001";

	}else{
		$prdcode = date('ymd')."0001";
	}

	// 상품아이콘
	for($ii=0; $ii<count($prdicon); $ii++){
		$prdicon_list .= $prdicon[$ii]."/";
	}

	// 상품이미지 저장
	include "./prd_imgin.inc";

	$prdname = str_replace("'","′",$prdname);

	// 상품 옵션 1
	for($ii = 0; $ii < count($tmp_optcode); $ii++) {
		if(!empty($tmp_optcode[$ii])) $optcode .= $tmp_optcode[$ii]."^";
	}
	
	// 상품 옵션 2
	for($ii = 0; $ii < count($tmp_optcode2); $ii++) {
		if($ii == 0) $optcode2 = "";
		if(!empty($tmp_optcode2[$ii])) $optcode2 .= $tmp_optcode2[$ii]."^";
	}

	// 상품 옵션 - 가격/적립금/재고
	for($ii = 0; $ii < count($tmp_opt[sellprice]); $ii++) {
		
		if(empty($tmp_opt[sellprice][$ii])) $tmp_opt[sellprice][$ii] = 0;
		if(empty($tmp_opt[reserve][$ii])) $tmp_opt[reserve][$ii] = 0;
		if(empty($tmp_opt[stock][$ii])) $tmp_opt[stock][$ii] = 0;
		if(empty($tmp_opt[minno][$ii])) $tmp_opt[minno][$ii] = 0;
		if(empty($tmp_opt[maxno][$ii])) $tmp_opt[maxno][$ii] = 0;
		
		$optvalue .= $tmp_opt[sellprice][$ii]."^".$tmp_opt[reserve][$ii]."^".$tmp_opt[stock][$ii]."^".$tmp_opt[minno][$ii]."^".$tmp_opt[maxno][$ii]."^^";
	}
	
	// 추가 옵션 1 
	for($ii = 0; $ii < count($optcode3_opt); $ii++) {
		if(strcmp($optcode3_opt[$ii]."^".$optcode3_pri[$ii]."^".$optcode3_res[$ii]."^^", "^^^^")) {
			
			if(empty($optcode3_pri[$ii])) $optcode3_pri[$ii] = 0;
			if(empty($optcode3_res[$ii])) $optcode3_res[$ii] = 0;
			
			$optcode3 .= $optcode3_opt[$ii]."^".$optcode3_pri[$ii]."^".$optcode3_res[$ii]."^^";
		}
	}
	
	// 추가 옵션 2 
	for($ii = 0; $ii < count($optcode4_opt); $ii++) {
		if(strcmp($optcode4_opt[$ii]."^".$optcode4_pri[$ii]."^".$optcode4_res[$ii]."^^", "^^^^")) {
			
			if(empty($optcode4_pri[$ii])) $optcode4_pri[$ii] = 0;
			if(empty($optcode4_res[$ii])) $optcode4_res[$ii] = 0;
			
			$optcode4 .= $optcode4_opt[$ii]."^".$optcode4_pri[$ii]."^".$optcode4_res[$ii]."^^";
		}
	}


	$selldate = $selldate." 00:00:01";
	$selllastdate = $selllastdate." 23:59:59";
	
	// 상품정보 저장
	$sql = "insert into wiz_dayproduct (prdcode,prdname,accounts,money,commission,company_idx,company,md_idx,md_name,prdcom,origin,showset,stock,savestock,prior,viewcnt,deimgcnt,basketcnt,ordercnt,cancelcnt,comcnt,sellprice,conprice,discount_per,reserve,strprice,
	
	selldate,selllastdate,starttime,endtime,selllimit,personal_mininum,personal_maxnum,stock_mininum,stock_maxnum,buy_mininum,buy_maxnum,
	
	del_type,del_price,prdicon,prefer,opt_use,opttitle,optcode,opttitle2,optcode2,opttitle3,optcode3,opttitle4,optcode4,opttitle5,optcode5,opttitle6,optcode6,opttitle7,optcode7,optvalue,prdimg_R,prdimg_L1,prdimg_M1,prdimg_S1,prdimg_L2,prdimg_M2,prdimg_S2,prdimg_L3,prdimg_M3,prdimg_S3,prdimg_L4,prdimg_M4,prdimg_S4,prdimg_L5,prdimg_M5,prdimg_S5,searchkey,stortexp,content,coupon_con,shopguide,attention,wdate,isdeliver,shopinfo,sms,deliver_fee,img_main,img_coupon,img_mail,img_title,deliver_standard, addstock) values('$prdcode','$prdname','$accounts','$money','$commission','$company_idx','$company','$md_idx','$md_name','$prdcom','$origin','$showset','$stock','$savestock','$prior','$viewcnt','$deimgcnt','$basketcnt','$ordercnt','$cancelcnt','$comcnt','$sellprice','$conprice','$discount_per','$reserve','$strprice',
	
	'$selldate','$selllastdate','$starttime','$endtime','$selllimit','$personal_mininum','$personal_maxnum','$stock_mininum','$stock_maxnum','$buy_mininum','$buy_maxnum',	
	
	
	'$del_type','$del_price','$prdicon','$prefer','$opt_use','$opttitle','$optcode','$opttitle2','$optcode2','$opttitle3','$optcode3','$opttitle4','$optcode4','$opttitle5','$optcode5','$opttitle6','$optcode6','$opttitle7','$optcode7','$optvalue','$prdimg_R_name','$prdimg_L1_name','$prdimg_M1_name','$prdimg_S1_name','$prdimg_L2_name','$prdimg_M2_name','$prdimg_S2_name','$prdimg_L3_name','$prdimg_M3_name','$prdimg_S3_name','$prdimg_L4_name','$prdimg_M4_name','$prdimg_S4_name','$prdimg_L5_name','$prdimg_M5_name','$prdimg_S5_name','$searchkey','$stortexp','$content','$coupon_con','$shopguide','$attention',now(),'$isdeliver','$shopinfo','$sms','$deliver_fee','$img_main','$img_coupon','$img_mail','$img_title','$deliver_standard', '$addstock')";
    mysql_query($sql) or die($sql); 




	// 카테고리정보 저장
	/*
	if(!empty($class03)){
	  $catcode = $class03;
	}else{
	  if(!empty($class02)) $catcode = $class02."00";
	  else {
   			if(empty($class01)) $class01 = "00";
      		$catcode = $class01."0000";
      	}
	}
	*/
	$sql = "insert into wiz_daycprelation(idx,prdcode,catcode) values('', '$prdcode', '$catcode')";
	$result = mysql_query($sql) or error(mysql_error());

	complete("상품이 입력되었습니다.","prd_input.php?mode=update&prdcode=$prdcode&$param");





//////////////////////////////////////////////////////////////////////////////////////////
// 상품수정
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "update"){

	// 상품이미지 저장
	include "./prd_imgup.inc";

	$prdname = str_replace("'","′",$prdname);

	// 상품아이콘
	for($ii=0; $ii<count($prdicon); $ii++){
		$prdicon_list .= $prdicon[$ii]."/";
	}

	// 상품이미지 삭제
	for($ii=0; $ii<count($delimg); $ii++){
		if($delimg[$ii] != "") @unlink($prdimg_path."/".$delimg[$ii]);
	}

	// 상품 옵션 1
	for($ii = 0; $ii < count($tmp_optcode); $ii++) {
		if(!empty($tmp_optcode[$ii])) $optcode .= $tmp_optcode[$ii]."^";
	}

	// 상품 옵션 2
	for($ii = 0; $ii < count($tmp_optcode2); $ii++) {
		if($ii == 0) $optcode2 = "";
		if(!empty($tmp_optcode2[$ii])) $optcode2 .= $tmp_optcode2[$ii]."^";
	}

	// 상품 옵션 - 가격/적립금/재고
	for($ii = 0; $ii < count($tmp_opt[sellprice]); $ii++) {
		
		if(empty($tmp_opt[sellprice][$ii])) $tmp_opt[sellprice][$ii] = 0;
		if(empty($tmp_opt[reserve][$ii])) $tmp_opt[reserve][$ii] = 0;
		if(empty($tmp_opt[stock][$ii])) $tmp_opt[stock][$ii] = 0;
		if(empty($tmp_opt[minno][$ii])) $tmp_opt[minno][$ii] = 0;
		if(empty($tmp_opt[maxno][$ii])) $tmp_opt[maxno][$ii] = 0;
		
		$optvalue .= $tmp_opt[sellprice][$ii]."^".$tmp_opt[reserve][$ii]."^".$tmp_opt[stock][$ii]."^".$tmp_opt[minno][$ii]."^".$tmp_opt[maxno][$ii]."^^";
	}
	
	// 추가 옵션 1 
	for($ii = 0; $ii < count($optcode3_opt); $ii++) {
		if(strcmp($optcode3_opt[$ii]."^".$optcode3_pri[$ii]."^".$optcode3_res[$ii]."^^", "^^^^")) {
			
			if(empty($optcode3_pri[$ii])) $optcode3_pri[$ii] = 0;
			if(empty($optcode3_res[$ii])) $optcode3_res[$ii] = 0;
			
			$optcode3 .= $optcode3_opt[$ii]."^".$optcode3_pri[$ii]."^".$optcode3_res[$ii]."^^";
		}
	}
	
	// 추가 옵션 2 
	for($ii = 0; $ii < count($optcode4_opt); $ii++) {
		if(strcmp($optcode4_opt[$ii]."^".$optcode4_pri[$ii]."^".$optcode4_res[$ii]."^^", "^^^^")) {
			
			if(empty($optcode4_pri[$ii])) $optcode4_pri[$ii] = 0;
			if(empty($optcode4_res[$ii])) $optcode4_res[$ii] = 0;
			
			$optcode4 .= $optcode4_opt[$ii]."^".$optcode4_pri[$ii]."^".$optcode4_res[$ii]."^^";
		}
	}
	
	$selldate = $selldate." 00:00:01";
	$selllastdate = $selllastdate." 23:59:59";

	//echo $optcode3;
	//exit;
	
	// 상품정보 저장
/*	$sql = "update wiz_dayproduct set
	            prdcode='$prdcode',prdname='$prdname',prdcom='$prdcom',origin='$origin',showset='$showset',shortage='$shortage',
	            coupon_use='$coupon_use',coupon_dis='$coupon_dis',coupon_type='$coupon_type',coupon_amount='$coupon_amount',coupon_limit='$coupon_limit',coupon_sdate='$coupon_sdate',coupon_edate='$coupon_edate',
	            del_type='$del_type',del_price='$del_price',prdicon='$prdicon_list', prefer='$prefer',brand='$brand',stock='$stock',prior='$prior',
	            sellprice='$sellprice', conprice='$conprice', reserve='$reserve', strprice='$strprice', new='$new', best='$best', popular='$popular', recom='$recom', sale='$sale',
	            info_use='$info_use',info_name1='$info_name1',info_value1='$info_value1',info_name2='$info_name2',info_value2='$info_value2',
	            info_name3='$info_name3',info_value3='$info_value3',info_name4='$info_name4',info_value4='$info_value4',
	            info_name5='$info_name5',info_value5='$info_value5',info_name6='$info_name6',info_value6='$info_value6',
							opt_use='$opt_use', opttitle='$opttitle', optcode='$optcode', opttitle2='$opttitle2', optcode2='$optcode2', opttitle3='$opttitle3', optcode3='$optcode3',
							opttitle4='$opttitle4', optcode4='$optcode4',opttitle5='$opttitle5', optcode5='$optcode5',
							opttitle6='$opttitle6',optcode6='$optcode6',opttitle7='$opttitle7',optcode7='$optcode7',optvalue='$optvalue',
							prdimg_R='$prdimg_R_name',prdimg_L1='$prdimg_L1_name', prdimg_M1='$prdimg_M1_name', prdimg_S1='$prdimg_S1_name', prdimg_L2='$prdimg_L2_name', prdimg_M2='$prdimg_M2_name', prdimg_S2='$prdimg_S2_name',
							prdimg_L3='$prdimg_L3_name', prdimg_M3='$prdimg_M3_name', prdimg_S3='$prdimg_S3_name', prdimg_L4='$prdimg_L4_name', prdimg_M4='$prdimg_M4_name', prdimg_S4='$prdimg_S4_name', prdimg_L5='$prdimg_L5_name', prdimg_M5='$prdimg_M5_name', prdimg_S5='$prdimg_S5_name',
							searchkey='$searchkey',stortexp='$stortexp',content='$content',mdate=now() where prdcode = '$prdcode'";*/
	$sql = "update wiz_dayproduct set 
							prdname='$prdname',prdcom='$prdcom',origin='$origin',showset='$showset',stock='$stock',savestock='$savestock',prior='$prior',
							viewcnt='$viewcnt',deimgcnt='$deimgcnt',basketcnt='$basketcnt',ordercnt='$ordercnt',cancelcnt='$cancelcnt',comcnt='$comcnt',sellprice='$sellprice',conprice='$conprice',discount_per='$discount_per',reserve='$reserve',strprice='$strprice',
							selldate='$selldate',selllastdate='$selllastdate',starttime='$starttime',endtime='$endtime',selllimit='$selllimit',
							personal_mininum='$personal_mininum',personal_maxnum='$personal_maxnum',
							stock_mininum='$stock_mininum',stock_maxnum='$stock_maxnum',
							buy_mininum='$buy_mininum',buy_maxnum='$buy_maxnum',del_type='$del_type',del_price='$del_price',prdicon='$prdicon',prefer='$prefer',
							opt_use='$opt_use',opttitle='$opttitle',optcode='$optcode',opttitle2='$opttitle2',optcode2='$optcode2',opttitle3='$opttitle3',optcode3='$optcode3',opttitle4='$opttitle4',optcode4='$optcode4',opttitle5='$opttitle5',optcode5='$optcode5',opttitle6='$opttitle6',optcode6='$optcode6',opttitle7='$opttitle7',optcode7='$optcode7',optvalue='$optvalue',	
							prdimg_R='$prdimg_R_name',prdimg_L1='$prdimg_L1_name', prdimg_M1='$prdimg_M1_name', prdimg_S1='$prdimg_S1_name', prdimg_L2='$prdimg_L2_name', prdimg_M2='$prdimg_M2_name', prdimg_S2='$prdimg_S2_name',
							prdimg_L3='$prdimg_L3_name', prdimg_M3='$prdimg_M3_name', prdimg_S3='$prdimg_S3_name', prdimg_L4='$prdimg_L4_name', prdimg_M4='$prdimg_M4_name', prdimg_S4='$prdimg_S4_name', prdimg_L5='$prdimg_L5_name', prdimg_M5='$prdimg_M5_name', prdimg_S5='$prdimg_S5_name',
							searchkey='$searchkey',stortexp='$stortexp',content='$content', attention='$attention',
							coupon_con='$coupon_con', shopguide='$shopguide',
							mdate='now()',company_idx='".$company_idx."',company='".$company."',md_idx='".$md_idx."',md_name='".$md_name."',isdeliver='".$isdeliver."',shopinfo='".$shopinfo."',sms='".$sms."',deliver_fee='".$deliver_fee."',img_main='".$img_main."',img_coupon='".$img_coupon."',img_mail='".$img_mail."',img_title='".$img_title."',deliver_standard='".$deliver_standard."',addstock='".$addstock."' where prdcode = '$prdcode'";


	$result = mysql_query($sql) or error(mysql_error());
	
	/*
	// 카테고리 정보 저장
	if(!empty($class03)){
	  $catcode = $class03;
	}else{
	  if(!empty($class02)) $catcode = $class02."00";
	  else {
   			if(empty($class01)) $class01 = "00";
      		$catcode = $class01."0000";
      	}
	}
	*/

	$sql = "update wiz_daycprelation set catcode = '$catcode' where prdcode = '$prdcode' and idx = '$relidx'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("상품정보가 수정되었습니다.","prd_input.php?mode=update&prdcode=$prdcode&$param");




//////////////////////////////////////////////////////////////////////////////////////////
// 상품삭제
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "delete"){


	if($prdcode){

		// 카테고리 연관 삭제
		$sql = "delete from wiz_daycprelation where prdcode = '$prdcode'";
		echo $sql."<br />";
		$result = mysql_query($sql) or error(mysql_error());
/*
		// 관련련상품 연관 삭제
		$sql = "delete from wiz_prdrelation where prdcode = '$prdcode' || relcode = '$prdcode'";
		$result = mysql_query($sql) or error(mysql_error());
*/
		// 상품데이타 삭제
		foreach (glob($prdimg_path."/".$prdcode."*") as $filename) {
   		@unlink($filename);
		}
/*
		// 상품평 삭제
		$sql = "delete from wiz_comment where prdcode = '$prdcode'";
		mysql_query($sql) or error(mysql_error());
*/
		$sql = "delete from wiz_dayproduct where prdcode = '$prdcode'";
		echo $sql."<br />";
		$result = mysql_query($sql) or error(mysql_error());

	}else{

		$array_selected = explode("|",$selected);
		$i=0;
		while($array_selected[$i]){

			$tmp_prdcode = $array_selected[$i];

			// 카테고리 연관 삭제
			$sql = "delete from wiz_daycprelation where prdcode = '$tmp_prdcode'";
			mysql_query($sql) or error(mysql_error());

			// 관련련상품 연관 삭제
			$sql = "delete from wiz_prdrelation where prdcode = '$tmp_prdcode' || relcode = '$tmp_prdcode'";
			mysql_query($sql) or error(mysql_error());

			//상품데이타 삭제
			foreach (glob($prdimg_path."/".$tmp_prdcode."*") as $filename) {
	   		@unlink($filename);

			}

			// 상품평 삭제
			$sql = "delete from wiz_comment where prdcode = '$tmp_prdcode'";
			mysql_query($sql) or error(mysql_error());

			$sql = "delete from wiz_dayproduct where prdcode = '$tmp_prdcode'";
			$result = mysql_query($sql) or error(mysql_error());

			$i++;
		}

	}

	complete("선택한 상품을 삭제하였습니다.","prd_list.php?page=$page&$param");



//////////////////////////////////////////////////////////////////////////////////////////
// 상품복사
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "prdcopy"){


	// 기존상품 정보
	$sql = "select * from wiz_dayproduct where prdcode='$prdcode'";
	$result = mysql_query($sql) or error(mysql_error());
	$prd_info = mysql_fetch_object($result);


	// 상품넘버 만들기
	$sql = "select max(prdcode) as prdcode from wiz_dayproduct";
	$result = mysql_query($sql) or error(mysql_error());
	if($row = mysql_fetch_object($result)){

		$datenum = substr($row->prdcode,0,6);
		$prdnum = substr($row->prdcode,6,4);
		$prdnum = substr("000".(++$prdnum),-4);

		if($datenum == date('ymd')) $prdcode = $datenum.$prdnum;
		else $prdcode = date('ymd')."0001";

	}else{
		$prdcode = date('ymd')."0001";
	}

	// 상품이미지
	$prdimg_path = "../../data/prdimg";
	$prdimg_R_name = $prdcode."_R.".substr($prd_info->prdimg_R,-3);
	$prdimg_L1_name = $prdcode."_L1.".substr($prd_info->prdimg_L1,-3);
	$prdimg_M1_name = $prdcode."_M1.".substr($prd_info->prdimg_M1,-3);
	$prdimg_S1_name = $prdcode."_S1.".substr($prd_info->prdimg_S1,-3);

	if(@file($prdimg_path."/".$prd_info->prdimg_R)) copy($prdimg_path."/".$prd_info->prdimg_R, $prdimg_path."/".$prdimg_R_name);
  if(@file($prdimg_path."/".$prd_info->prdimg_L1)) copy($prdimg_path."/".$prd_info->prdimg_L1, $prdimg_path."/".$prdimg_L1_name);
  if(@file($prdimg_path."/".$prd_info->prdimg_M1)) copy($prdimg_path."/".$prd_info->prdimg_M1, $prdimg_path."/".$prdimg_M1_name);
  if(@file($prdimg_path."/".$prd_info->prdimg_S1)) copy($prdimg_path."/".$prd_info->prdimg_S1, $prdimg_path."/".$prdimg_S1_name);

	$prdimg_L2_name = $prdcode."_L2.".substr($prd_info->prdimg_L2,-3);
	$prdimg_M2_name = $prdcode."_M2.".substr($prd_info->prdimg_M2,-3);
	$prdimg_S2_name = $prdcode."_S2.".substr($prd_info->prdimg_S2,-3);

  if(@file($prdimg_path."/".$prd_info->prdimg_L2)) copy($prdimg_path."/".$prd_info->prdimg_L2, $prdimg_path."/".$prdimg_L2_name);
  if(@file($prdimg_path."/".$prd_info->prdimg_M2)) copy($prdimg_path."/".$prd_info->prdimg_M2, $prdimg_path."/".$prdimg_M2_name);
  if(@file($prdimg_path."/".$prd_info->prdimg_S2)) copy($prdimg_path."/".$prd_info->prdimg_S2, $prdimg_path."/".$prdimg_S2_name);


  $prdimg_L3_name = $prdcode."_L3.".substr($prd_info->prdimg_L3,-3);
	$prdimg_M3_name = $prdcode."_M3.".substr($prd_info->prdimg_M3,-3);
	$prdimg_S3_name = $prdcode."_S3.".substr($prd_info->prdimg_S3,-3);

  if(@file($prdimg_path."/".$prd_info->prdimg_L3)) copy($prdimg_path."/".$prd_info->prdimg_L3, $prdimg_path."/".$prdimg_L3_name);
  if(@file($prdimg_path."/".$prd_info->prdimg_M3)) copy($prdimg_path."/".$prd_info->prdimg_M3, $prdimg_path."/".$prdimg_M3_name);
  if(@file($prdimg_path."/".$prd_info->prdimg_S3)) copy($prdimg_path."/".$prd_info->prdimg_S3, $prdimg_path."/".$prdimg_S3_name);

  $prdimg_L4_name = $prdcode."_L4.".substr($prd_info->prdimg_L4,-3);
	$prdimg_M4_name = $prdcode."_M4.".substr($prd_info->prdimg_M4,-3);
	$prdimg_S4_name = $prdcode."_S4.".substr($prd_info->prdimg_S4,-3);

  if(@file($prdimg_path."/".$prd_info->prdimg_L4)) copy($prdimg_path."/".$prd_info->prdimg_L4, $prdimg_path."/".$prdimg_L4_name);
  if(@file($prdimg_path."/".$prd_info->prdimg_M4)) copy($prdimg_path."/".$prd_info->prdimg_M4, $prdimg_path."/".$prdimg_M4_name);
  if(@file($prdimg_path."/".$prd_info->prdimg_S4)) copy($prdimg_path."/".$prd_info->prdimg_S4, $prdimg_path."/".$prdimg_S4_name);

  $prdimg_L5_name = $prdcode."_L5.".substr($prd_info->prdimg_L5,-3);
	$prdimg_M5_name = $prdcode."_M5.".substr($prd_info->prdimg_M5,-3);
	$prdimg_S5_name = $prdcode."_S5.".substr($prd_info->prdimg_S5,-3);

  if(@file($prdimg_path."/".$prd_info->prdimg_L5)) copy($prdimg_path."/".$prd_info->prdimg_L5, $prdimg_path."/".$prdimg_L5_name);
  if(@file($prdimg_path."/".$prd_info->prdimg_M5)) copy($prdimg_path."/".$prd_info->prdimg_M5, $prdimg_path."/".$prdimg_M5_name);
  if(@file($prdimg_path."/".$prd_info->prdimg_S5)) copy($prdimg_path."/".$prd_info->prdimg_S5, $prdimg_path."/".$prdimg_S5_name);
  
  $prd_info->content = addslashes($prd_info->content);
  
	// 상품정보 저장
	$sql = "insert into wiz_dayproduct(
					prdcode,prdname,prdcom,origin,showset,stock,savestock,prior,viewcnt,deimgcnt,basketcnt,ordercnt,cancelcnt,comcnt,
					sellprice,conprice,reserve,strprice,new,best,popular,recom,sale,shortage,del_type,del_price,prdicon,prefer,brand,
					info_use,info_name1,info_value1,info_name2,info_value2,info_name3,info_value3,info_name4,info_value4,info_name5,info_value5,info_name6,info_value6,
					opt_use,opttitle,optcode,opttitle2,optcode2,opttitle3,optcode3,opttitle4,optcode4,opttitle5,optcode5,opttitle6,optcode6,opttitle7,optcode7,optvalue,
					prdimg_R,prdimg_L1,prdimg_M1,prdimg_S1,prdimg_L2,prdimg_M2,prdimg_S2,prdimg_L3,prdimg_M3,prdimg_S3,
					prdimg_L4,prdimg_M4,prdimg_S4,prdimg_L5,prdimg_M5,prdimg_S5,searchkey,stortexp,content,wdate,mdate
					)
					values(
					'$prdcode','$prd_info->prdname','$prd_info->prdcom','$prd_info->origin','$prd_info->showset','$prd_info->stock','$prd_info->savestock','$prd_info->prior','0','0', '0', '0', '0', '0',
					'$prd_info->sellprice','$prd_info->conprice','$prd_info->reserve','$prd_info->strprice','$prd_info->new','$prd_info->best','$prd_info->popular','$prd_info->recom','$prd_info->sale','$prd_info->shortage',
					'$prd_info->del_type','$prd_info->del_price','$prd_info->prdicon_list','$prd_info->prefer','$prd_info->brand',
					'$prd_info->info_use','$prd_info->info_name1','$prd_info->info_value1','$prd_info->info_name2','$prd_info->info_value2','$prd_info->info_name3','$prd_info->info_value3','$prd_info->info_name4','$prd_info->info_value4','$prd_info->info_name5','$prd_info->info_value5','$prd_info->info_name6','$prd_info->info_value6',
					'$prd_info->opt_use','$prd_info->opttitle','$prd_info->optcode','$prd_info->opttitle2','$prd_info->optcode2','$prd_info->opttitle3','$prd_info->optcode3','$prd_info->opttitle4','$prd_info->optcode4','$prd_info->opttitle5','$prd_info->optcode5','$prd_info->opttitle6','$prd_info->optcode6','$prd_info->opttitle7','$prd_info->optcode7','$prd_info->optvalue',
					'$prdimg_R_name', '$prdimg_L1_name','$prdimg_M1_name','$prdimg_S1_name','$prdimg_L2_name','$prdimg_M2_name','$prdimg_S2_name',
					'$prdimg_L3_name','$prdimg_M3_name','$prdimg_S3_name','$prdimg_L4_name','$prdimg_M4_name','$prdimg_S4_name','$prdimg_L5_name','$prdimg_M5_name','$prdimg_S5_name',
					'$prd_info->searchkey','$prd_info->stortexp','$prd_info->content',now(),now())";

	mysql_query($sql) or error(mysql_error());


	// 카테고리정보 저장
	$sql = "select * from wiz_daycprelation where prdcode='$prd_info->prdcode'";
	$result = mysql_query($sql) or error(mysql_error());
	while($row = mysql_fetch_object($result)){

		$sql = "insert into wiz_daycprelation(idx,prdcode,catcode) values('', '$prdcode', '$row->catcode')";
		mysql_query($sql) or error(mysql_error());

	}

	complete("복사되었습니다.","prd_list.php?$param");

//////////////////////////////////////////////////////////////////////////////////////////
// 진열순서
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "prior"){

   if(!empty($dep_code)) $catcode_sql = "wc.catcode like '$dep_code$dep2_code$dep3_code%' and ";
   if(!empty($special)) $special_sql = "wp.$special = 'Y' and ";
   if(!empty($display)) $display_sql = "wp.showset = '$display' and ";
   if(!empty($searchopt)) $search_sql = "wp.$searchopt like '%$searchkey%' and ";

   $sql = "select wp.prdcode, wp.prdname, wp.prior from wiz_dayproduct wp, wiz_daycprelation wc
                  where $catcode_sql $special_sql $display_sql $search_sql wc.prdcode = wp.prdcode";

   // 1단계위로
   if($posi == "up"){

   	$sql .= " and wp.prior >= '$prior' and wp.prdcode != '$prdcode' order by wp.prior asc  limit 10";

		$result = mysql_query($sql) or error(mysql_error());

	   if($row = mysql_fetch_object($result)){
	   	//$prior = $row->prior+1;

		   $sql = "update wiz_dayproduct set prior = '$row->prior' where prdcode = '$prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());

		   $sql = "update wiz_dayproduct set prior = '$prior' where prdcode = '$row->prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());
		}

	// 1단계아래로
	}else if($posi == "down"){

		$sql .= " and wp.prior <= '$prior' and wp.prdcode != '$prdcode' order by wp.prior desc  limit 10";

		$result = mysql_query($sql) or error(mysql_error());

	   if($row = mysql_fetch_object($result)){

	   	//$prior = $row->prior-1;

		   $sql = "update wiz_dayproduct set prior = '$row->prior' where prdcode = '$prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());

		   $sql = "update wiz_dayproduct set prior = '$prior' where prdcode = '$row->prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());

		}

	// 10단계위로
	}else if($posi == "upup"){

   	$sql .= " and wp.prior >= '$prior'  and wp.prdcode != '$prdcode' order by wp.prior asc  limit 10";

   	$result = mysql_query($sql) or error(mysql_error());
   	$total = mysql_num_rows($result);

	   while($row = mysql_fetch_object($result)){
	   	$prior = $row->prior+1;
		}

		if($total > 0){
		   $sql = "update wiz_dayproduct set prior = '$prior' where prdcode = '$prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());
		}

	// 10단계아래로
	}else if($posi == "downdown"){

	   $sql .= " and wp.prior <= '$prior' and wp.prdcode != '$prdcode' order by wp.prior desc  limit 10";
	   $result = mysql_query($sql) or error(mysql_error());
	   $total = mysql_num_rows($result);

	   while($row = mysql_fetch_object($result)){
	   	$prior = $row->prior-1;
	   }

		if($total > 0){
		   $sql = "update wiz_dayproduct set prior = '$prior' where prdcode = '$prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());
		}
	}

   complete("진열순서를 변경하였습니다.","prd_list.php?$param");




//////////////////////////////////////////////////////////////////////////////////////////
// 상품평 삭제
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "delesti"){

	// 1개 상품평 삭제
	if($estiidx){

		$sql = "delete from wiz_bbs where idx = '$estiidx'";
		$result = mysql_query($sql) or error(mysql_error());

	// 선택 상품평 삭제
	}else{

		$array_selected = explode("|",$selected);
		$i=0;
		while($array_selected[$i]){

			$tmp_estiidx = $array_selected[$i];

			$sql = "delete from wiz_bbs where idx = '$tmp_estiidx'";
			$result = mysql_query($sql) or error(mysql_error());

			$i++;
		}

	}

	complete("선택한 상품평을 삭제하였습니다.","prd_estimate.php?page=$page");



//////////////////////////////////////////////////////////////////////////////////////////
// 재고관리
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "stock"){

	$sql = "update wiz_dayproduct set stock='$stock', savestock='$savestock' where prdcode='$prdcode'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("선택한 상품재고를 수정하였습니다.","prd_shortage.php?$param");



//////////////////////////////////////////////////////////////////////////////////////////
// 옵션수정
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "optedit"){

	if(!empty($prdcode)){

		$sql = "update wiz_dayproduct set optvalue = '$optvalue' where prdcode = '$prdcode'";
		$result = mysql_query($sql) or error(mysql_error());
		echo "<script>alert('옵션항목이 적용되었습니다.');opener.document.location.reload();self.close();</script>";

	}else{
		echo "<script>alert('상품코드가 없습니다.');self.close();</script>";
	}

}else if($mode == "catlist"){

	if($submode == "insert"){

		if(!empty($class03)){
	      $catcode = $class03;
	   }else{
	      if(!empty($class02)) $catcode = $class02."00";
	      else {
	   			if(empty($class01)) $class01 = "00";
	      		$catcode = $class01."0000";
	      	}
	   }

		$sql = "select * from wiz_daycprelation where prdcode = '$prdcode' and catcode = '$catcode'";
		$result = mysql_query($sql) or error(mysql_error());

		if($row = mysql_fetch_object($result)){

			error('이미등록된 분류입니다.');

		}else{

		   $sql = "insert into wiz_daycprelation(idx,prdcode,catcode) values('', '$prdcode', '$catcode')";
		   $result = mysql_query($sql) or error(mysql_error());

			complete('분류를 추가하였습니다.','');
		}

	}else if($submode == "delete"){

		$sql = "delete from wiz_daycprelation where prdcode = '$prdcode' and catcode = '$catcode'";
		$result = mysql_query($sql) or error(mysql_error());

		complete('선택한 분류를 삭제하였습니다.','');

	}



//////////////////////////////////////////////////////////////////////////////////////////
// 상품아이콘 등록
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "prdicon"){


	if($upfile[size] > 0){
		file_check($upfile[name]);
    copy($upfile[tmp_name], $prdicon_path."/".$upfile[name]);
    chmod($prdicon_path."/".$upfile[name], 0606);
	}

	complete('등록되었습니다.','prd_icon.php');



//////////////////////////////////////////////////////////////////////////////////////////
// 상품아이콘 삭제
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "icondel"){

	@unlink($prdicon_path."/".$prdicon);
	complete('삭제되었습니다.','prd_icon.php');



//////////////////////////////////////////////////////////////////////////////////////////
// 관련상품 삭제
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "reldel"){

	for($ii=0;$ii<count($idx);$ii++){
		$sql = "delete from wiz_prdrelation where idx = '".$idx[$ii]."'";
		//echo $sql."<br>";
		mysql_query($sql);
	}

	complete("삭제되었습니다.","prd_relation.php?prdcode=".$prdcode);

}else if($mode == "reladd"){


	$array_selected = explode("|",$selected);
	$i=0;
	while($array_selected[$i]){

		$tmp_prdcode = $array_selected[$i];

		$sql = "insert into wiz_prdrelation(idx,prdcode,relcode) values('','$prdcode','$tmp_prdcode')";
		mysql_query($sql) or error(mysql_error());

		$i++;
	}

	echo "<script>opener.document.location.reload();</script>";
	complete("등록되었습니다.","prd_rellist.php?$param");

}

?>
