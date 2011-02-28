<?
include "../../inc/common.inc";
include "../../inc/admin_check.inc";
include "../../inc/oper_info.inc";
include "../../inc/util.inc";

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------

$param = "page=$page&dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
$param .= "&special=$special&display=$display&searchopt=$searchopt&searchkey=$searchkey&stock_opt=$stock_opt&page=$page&shortpage=$shortpage";
if(!empty($prdcode)) $param .= "&prdcode=$prdcode";
//--------------------------------------------------------------------------------------------------

$prdimg_path = "../../data/prdimg";
$prdicon_path = "../../data/prdicon";

//////////////////////////////////////////////////////////////////////////////////////////
// ��ǰ���
//////////////////////////////////////////////////////////////////////////////////////////
if($mode == "insert"){

	// ��ǰ�ѹ� �����
	$sql = "select max(prdcode) as prdcode from wiz_product";
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

	// ��ǰ������
	for($ii=0; $ii<count($prdicon); $ii++){
		$prdicon_list .= $prdicon[$ii]."/";
	}

	// ��ǰ�̹��� ����
	include "./prd_imgin.inc";

	$prdname = str_replace("'","��",$prdname);

	// ��ǰ �ɼ� 1
	for($ii = 0; $ii < count($tmp_optcode); $ii++) {
		if(!empty($tmp_optcode[$ii])) $optcode .= $tmp_optcode[$ii]."^";
	}
	
	// ��ǰ �ɼ� 2
	for($ii = 0; $ii < count($tmp_optcode2); $ii++) {
		if($ii == 0) $optcode2 = "";
		if(!empty($tmp_optcode2[$ii])) $optcode2 .= $tmp_optcode2[$ii]."^";
	}

	// ��ǰ �ɼ� - ����/������/���
	for($ii = 0; $ii < count($tmp_opt[sellprice]); $ii++) {
		
		if(empty($tmp_opt[sellprice][$ii])) $tmp_opt[sellprice][$ii] = 0;
		if(empty($tmp_opt[reserve][$ii])) $tmp_opt[reserve][$ii] = 0;
		if(empty($tmp_opt[stock][$ii])) $tmp_opt[stock][$ii] = 0;
		
		$optvalue .= $tmp_opt[sellprice][$ii]."^".$tmp_opt[reserve][$ii]."^".$tmp_opt[stock][$ii]."^^";
	}
	
	// �߰� �ɼ� 1 
	for($ii = 0; $ii < count($optcode3_opt); $ii++) {
		if(strcmp($optcode3_opt[$ii]."^".$optcode3_pri[$ii]."^".$optcode3_res[$ii]."^^", "^^^^")) {
			
			if(empty($optcode3_pri[$ii])) $optcode3_pri[$ii] = 0;
			if(empty($optcode3_res[$ii])) $optcode3_res[$ii] = 0;
			
			$optcode3 .= $optcode3_opt[$ii]."^".$optcode3_pri[$ii]."^".$optcode3_res[$ii]."^^";
		}
	}
	
	// �߰� �ɼ� 2 
	for($ii = 0; $ii < count($optcode4_opt); $ii++) {
		if(strcmp($optcode4_opt[$ii]."^".$optcode4_pri[$ii]."^".$optcode4_res[$ii]."^^", "^^^^")) {
			
			if(empty($optcode4_pri[$ii])) $optcode4_pri[$ii] = 0;
			if(empty($optcode4_res[$ii])) $optcode4_res[$ii] = 0;
			
			$optcode4 .= $optcode4_opt[$ii]."^".$optcode4_pri[$ii]."^".$optcode4_res[$ii]."^^";
		}
	}
	
	// ��ǰ���� ����
	$sql = "insert into wiz_product 
					(prdcode,prdname,prdcom,origin,showset,stock,savestock,prior,viewcnt,deimgcnt,basketcnt,ordercnt,cancelcnt,
					comcnt,sellprice,conprice,reserve,strprice,new,best,popular,recom,sale,shortage,coupon_use,coupon_dis,coupon_type,
					coupon_amount,coupon_limit,coupon_sdate,coupon_edate,del_type,del_price,prdicon,prefer,brand,info_use,info_name1,info_value1,
					info_name2,info_value2,info_name3,info_value3,info_name4,info_value4,info_name5,info_value5,
					info_name6,info_value6,opt_use,opttitle,optcode,opttitle2,optcode2,opttitle3,optcode3,
					opttitle4,optcode4,opttitle5,optcode5,opttitle6,optcode6,opttitle7,optcode7,optvalue,
					prdimg_R,prdimg_L1,prdimg_M1,prdimg_S1,prdimg_L2,prdimg_M2,prdimg_S2,prdimg_L3,prdimg_M3,prdimg_S3,
					prdimg_L4,prdimg_M4,prdimg_S4,prdimg_L5,prdimg_M5,prdimg_S5,searchkey,stortexp,content,wdate,mdate) 
					values('$prdcode','$prdname','$prdcom','$origin','$showset','$stock','$savestock','$prior','$viewcnt',
					'$deimgcnt','$basketcnt','$ordercnt','$cancelcnt','$comcnt','$sellprice','$conprice','$reserve','$strprice','$new',
					'$best','$popular','$recom','$sale','$shortage','$coupon_use','$coupon_dis','$coupon_type','$coupon_amount',
					'$coupon_limit','$coupon_sdate','$coupon_edate','$del_type','$del_price','$prdicon_list','$prefer','$brand','$info_use',
					'$info_name1','$info_value1','$info_name2','$info_value2','$info_name3','$info_value3',
					'$info_name4','$info_value4','$info_name5','$info_value5','$info_name6','$info_value6',
					'$opt_use','$opttitle','$optcode','$opttitle2','$optcode2','$opttitle3','$optcode3','$opttitle4','$optcode4',
					'$opttitle5','$optcode5','$opttitle6','$optcode6','$opttitle7','$optcode7','$optvalue',
					'$prdimg_R_name','$prdimg_L1_name','$prdimg_M1_name','$prdimg_S1_name',
					'$prdimg_L2_name','$prdimg_M2_name','$prdimg_S2_name','$prdimg_L3_name','$prdimg_M3_name','$prdimg_S3_name',
					'$prdimg_L4_name','$prdimg_M4_name','$prdimg_S4_name','$prdimg_L5_name','$prdimg_M5_name','$prdimg_S5_name',
					'$searchkey','$stortexp','$content',now(),now())"; 

	mysql_query($sql) or die(mysql_error());


	// ī�װ����� ����
	if(!empty($class03)){
	  $catcode = $class03;
	}else{
	  if(!empty($class02)) $catcode = $class02."00";
	  else {
   			if(empty($class01)) $class01 = "00";
      		$catcode = $class01."0000";
      	}
	}
	$sql = "insert into wiz_cprelation(idx,prdcode,catcode) values('', '$prdcode', '$catcode')";
	$result = mysql_query($sql) or error(mysql_error());

	complete("��ǰ�� �ԷµǾ����ϴ�.","prd_input.php?mode=update&prdcode=$prdcode&$param");





//////////////////////////////////////////////////////////////////////////////////////////
// ��ǰ����
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "update"){

	// ��ǰ�̹��� ����
	include "./prd_imgup.inc";

	$prdname = str_replace("'","��",$prdname);

	// ��ǰ������
	for($ii=0; $ii<count($prdicon); $ii++){
		$prdicon_list .= $prdicon[$ii]."/";
	}

	// ��ǰ�̹��� ����
	for($ii=0; $ii<count($delimg); $ii++){
		if($delimg[$ii] != "") @unlink($prdimg_path."/".$delimg[$ii]);
	}

	// ��ǰ �ɼ� 1
	for($ii = 0; $ii < count($tmp_optcode); $ii++) {
		if(!empty($tmp_optcode[$ii])) $optcode .= $tmp_optcode[$ii]."^";
	}

	// ��ǰ �ɼ� 2
	for($ii = 0; $ii < count($tmp_optcode2); $ii++) {
		if($ii == 0) $optcode2 = "";
		if(!empty($tmp_optcode2[$ii])) $optcode2 .= $tmp_optcode2[$ii]."^";
	}

	// ��ǰ �ɼ� - ����/������/���
	for($ii = 0; $ii < count($tmp_opt[sellprice]); $ii++) {
		
		if(empty($tmp_opt[sellprice][$ii])) $tmp_opt[sellprice][$ii] = 0;
		if(empty($tmp_opt[reserve][$ii])) $tmp_opt[reserve][$ii] = 0;
		if(empty($tmp_opt[stock][$ii])) $tmp_opt[stock][$ii] = 0;
		
		$optvalue .= $tmp_opt[sellprice][$ii]."^".$tmp_opt[reserve][$ii]."^".$tmp_opt[stock][$ii]."^^";
	}
	
	// �߰� �ɼ� 1 
	for($ii = 0; $ii < count($optcode3_opt); $ii++) {
		if(strcmp($optcode3_opt[$ii]."^".$optcode3_pri[$ii]."^".$optcode3_res[$ii]."^^", "^^^^")) {
			
			if(empty($optcode3_pri[$ii])) $optcode3_pri[$ii] = 0;
			if(empty($optcode3_res[$ii])) $optcode3_res[$ii] = 0;
			
			$optcode3 .= $optcode3_opt[$ii]."^".$optcode3_pri[$ii]."^".$optcode3_res[$ii]."^^";
		}
	}
	
	// �߰� �ɼ� 2 
	for($ii = 0; $ii < count($optcode4_opt); $ii++) {
		if(strcmp($optcode4_opt[$ii]."^".$optcode4_pri[$ii]."^".$optcode4_res[$ii]."^^", "^^^^")) {
			
			if(empty($optcode4_pri[$ii])) $optcode4_pri[$ii] = 0;
			if(empty($optcode4_res[$ii])) $optcode4_res[$ii] = 0;
			
			$optcode4 .= $optcode4_opt[$ii]."^".$optcode4_pri[$ii]."^".$optcode4_res[$ii]."^^";
		}
	}
	
	//echo $optcode3;
	//exit;
	
	// ��ǰ���� ����
	$sql = "update wiz_product set
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
							searchkey='$searchkey',stortexp='$stortexp',content='$content',mdate=now() where prdcode = '$prdcode'";

	$result = mysql_query($sql) or error(mysql_error());

	// ī�װ� ���� ����
	if(!empty($class03)){
	  $catcode = $class03;
	}else{
	  if(!empty($class02)) $catcode = $class02."00";
	  else {
   			if(empty($class01)) $class01 = "00";
      		$catcode = $class01."0000";
      	}
	}

	$sql = "update wiz_cprelation set catcode = '$catcode' where prdcode = '$prdcode' and idx = '$relidx'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("��ǰ������ �����Ǿ����ϴ�.","prd_input.php?mode=update&prdcode=$prdcode&$param");




//////////////////////////////////////////////////////////////////////////////////////////
// ��ǰ����
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "delete"){


	if($prdcode){

		// ī�װ� ���� ����
		$sql = "delete from wiz_cprelation where prdcode = '$prdcode'";
		$result = mysql_query($sql) or error(mysql_error());

		// ���÷û�ǰ ���� ����
		$sql = "delete from wiz_prdrelation where prdcode = '$prdcode' || relcode = '$prdcode'";
		$result = mysql_query($sql) or error(mysql_error());

		// ��ǰ����Ÿ ����
		foreach (glob($prdimg_path."/".$prdcode."*") as $filename) {
   		@unlink($filename);
		}

		// ��ǰ�� ����
		$sql = "delete from wiz_comment where prdcode = '$prdcode'";
		mysql_query($sql) or error(mysql_error());

		$sql = "delete from wiz_product where prdcode = '$prdcode'";
		$result = mysql_query($sql) or error(mysql_error());

	}else{

		$array_selected = explode("|",$selected);
		$i=0;
		while($array_selected[$i]){

			$tmp_prdcode = $array_selected[$i];

			// ī�װ� ���� ����
			$sql = "delete from wiz_cprelation where prdcode = '$tmp_prdcode'";
			mysql_query($sql) or error(mysql_error());

			// ���÷û�ǰ ���� ����
			$sql = "delete from wiz_prdrelation where prdcode = '$tmp_prdcode' || relcode = '$tmp_prdcode'";
			mysql_query($sql) or error(mysql_error());

			//��ǰ����Ÿ ����
			foreach (glob($prdimg_path."/".$tmp_prdcode."*") as $filename) {
	   		@unlink($filename);

			}

			// ��ǰ�� ����
			$sql = "delete from wiz_comment where prdcode = '$tmp_prdcode'";
			mysql_query($sql) or error(mysql_error());

			$sql = "delete from wiz_product where prdcode = '$tmp_prdcode'";
			$result = mysql_query($sql) or error(mysql_error());

			$i++;
		}

	}

	complete("������ ��ǰ�� �����Ͽ����ϴ�.","prd_list.php?page=$page&$param");



//////////////////////////////////////////////////////////////////////////////////////////
// ��ǰ����
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "prdcopy"){


	// ������ǰ ����
	$sql = "select * from wiz_product where prdcode='$prdcode'";
	$result = mysql_query($sql) or error(mysql_error());
	$prd_info = mysql_fetch_object($result);


	// ��ǰ�ѹ� �����
	$sql = "select max(prdcode) as prdcode from wiz_product";
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

	// ��ǰ�̹���
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
  
	// ��ǰ���� ����
	$sql = "insert into wiz_product(
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


	// ī�װ����� ����
	$sql = "select * from wiz_cprelation where prdcode='$prd_info->prdcode'";
	$result = mysql_query($sql) or error(mysql_error());
	while($row = mysql_fetch_object($result)){

		$sql = "insert into wiz_cprelation(idx,prdcode,catcode) values('', '$prdcode', '$row->catcode')";
		mysql_query($sql) or error(mysql_error());

	}

	complete("����Ǿ����ϴ�.","prd_list.php?$param");

//////////////////////////////////////////////////////////////////////////////////////////
// ��������
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "prior"){

   if(!empty($dep_code)) $catcode_sql = "wc.catcode like '$dep_code$dep2_code$dep3_code%' and ";
   if(!empty($special)) $special_sql = "wp.$special = 'Y' and ";
   if(!empty($display)) $display_sql = "wp.showset = '$display' and ";
   if(!empty($searchopt)) $search_sql = "wp.$searchopt like '%$searchkey%' and ";

   $sql = "select wp.prdcode, wp.prdname, wp.prior from wiz_product wp, wiz_cprelation wc
                  where $catcode_sql $special_sql $display_sql $search_sql wc.prdcode = wp.prdcode";

   // 1�ܰ�����
   if($posi == "up"){

   	$sql .= " and wp.prior >= '$prior' and wp.prdcode != '$prdcode' order by wp.prior asc  limit 10";

		$result = mysql_query($sql) or error(mysql_error());

	   if($row = mysql_fetch_object($result)){
	   	//$prior = $row->prior+1;

		   $sql = "update wiz_product set prior = '$row->prior' where prdcode = '$prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());

		   $sql = "update wiz_product set prior = '$prior' where prdcode = '$row->prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());
		}

	// 1�ܰ�Ʒ���
	}else if($posi == "down"){

		$sql .= " and wp.prior <= '$prior' and wp.prdcode != '$prdcode' order by wp.prior desc  limit 10";

		$result = mysql_query($sql) or error(mysql_error());

	   if($row = mysql_fetch_object($result)){

	   	//$prior = $row->prior-1;

		   $sql = "update wiz_product set prior = '$row->prior' where prdcode = '$prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());

		   $sql = "update wiz_product set prior = '$prior' where prdcode = '$row->prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());

		}

	// 10�ܰ�����
	}else if($posi == "upup"){

   	$sql .= " and wp.prior >= '$prior'  and wp.prdcode != '$prdcode' order by wp.prior asc  limit 10";

   	$result = mysql_query($sql) or error(mysql_error());
   	$total = mysql_num_rows($result);

	   while($row = mysql_fetch_object($result)){
	   	$prior = $row->prior+1;
		}

		if($total > 0){
		   $sql = "update wiz_product set prior = '$prior' where prdcode = '$prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());
		}

	// 10�ܰ�Ʒ���
	}else if($posi == "downdown"){

	   $sql .= " and wp.prior <= '$prior' and wp.prdcode != '$prdcode' order by wp.prior desc  limit 10";
	   $result = mysql_query($sql) or error(mysql_error());
	   $total = mysql_num_rows($result);

	   while($row = mysql_fetch_object($result)){
	   	$prior = $row->prior-1;
	   }

		if($total > 0){
		   $sql = "update wiz_product set prior = '$prior' where prdcode = '$prdcode'";
		   $result = mysql_query($sql) or error(mysql_error());
		}
	}

   complete("���������� �����Ͽ����ϴ�.","prd_list.php?$param");




//////////////////////////////////////////////////////////////////////////////////////////
// ��ǰ�� ����
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "delesti"){

	// 1�� ��ǰ�� ����
	if($estiidx){

		$sql = "delete from wiz_bbs where idx = '$estiidx'";
		$result = mysql_query($sql) or error(mysql_error());

	// ���� ��ǰ�� ����
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

	complete("������ ��ǰ���� �����Ͽ����ϴ�.","prd_estimate.php?page=$page");



//////////////////////////////////////////////////////////////////////////////////////////
// ������
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "stock"){

	$sql = "update wiz_product set stock='$stock', savestock='$savestock' where prdcode='$prdcode'";
	$result = mysql_query($sql) or error(mysql_error());

	complete("������ ��ǰ��� �����Ͽ����ϴ�.","prd_shortage.php?$param");



//////////////////////////////////////////////////////////////////////////////////////////
// �ɼǼ���
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "optedit"){

	if(!empty($prdcode)){

		$sql = "update wiz_product set optvalue = '$optvalue' where prdcode = '$prdcode'";
		$result = mysql_query($sql) or error(mysql_error());
		echo "<script>alert('�ɼ��׸��� ����Ǿ����ϴ�.');opener.document.location.reload();self.close();</script>";

	}else{
		echo "<script>alert('��ǰ�ڵ尡 �����ϴ�.');self.close();</script>";
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

		$sql = "select * from wiz_cprelation where prdcode = '$prdcode' and catcode = '$catcode'";
		$result = mysql_query($sql) or error(mysql_error());

		if($row = mysql_fetch_object($result)){

			error('�̵̹�ϵ� �з��Դϴ�.');

		}else{

		   $sql = "insert into wiz_cprelation(idx,prdcode,catcode) values('', '$prdcode', '$catcode')";
		   $result = mysql_query($sql) or error(mysql_error());

			complete('�з��� �߰��Ͽ����ϴ�.','');
		}

	}else if($submode == "delete"){

		$sql = "delete from wiz_cprelation where prdcode = '$prdcode' and catcode = '$catcode'";
		$result = mysql_query($sql) or error(mysql_error());

		complete('������ �з��� �����Ͽ����ϴ�.','');

	}



//////////////////////////////////////////////////////////////////////////////////////////
// ��ǰ������ ���
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "prdicon"){


	if($upfile[size] > 0){
		file_check($upfile[name]);
    copy($upfile[tmp_name], $prdicon_path."/".$upfile[name]);
    chmod($prdicon_path."/".$upfile[name], 0606);
	}

	complete('��ϵǾ����ϴ�.','prd_icon.php');



//////////////////////////////////////////////////////////////////////////////////////////
// ��ǰ������ ����
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "icondel"){

	@unlink($prdicon_path."/".$prdicon);
	complete('�����Ǿ����ϴ�.','prd_icon.php');



//////////////////////////////////////////////////////////////////////////////////////////
// ���û�ǰ ����
//////////////////////////////////////////////////////////////////////////////////////////
}else if($mode == "reldel"){

	for($ii=0;$ii<count($idx);$ii++){
		$sql = "delete from wiz_prdrelation where idx = '".$idx[$ii]."'";
		//echo $sql."<br>";
		mysql_query($sql);
	}

	complete("�����Ǿ����ϴ�.","prd_relation.php?prdcode=".$prdcode);

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
	complete("��ϵǾ����ϴ�.","prd_rellist.php?$param");

}

?>
