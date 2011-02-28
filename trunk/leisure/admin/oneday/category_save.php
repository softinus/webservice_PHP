<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?

$subimg_path = "../../data/subimg";
$catimg_path = "../../data/catimg";

if($mode == "insert"){
	
	// ī�װ��� ����ǥ ���� ��ǰ��Ͻ� ��ũ��Ʈ ����
	$catname = trim($catname);
	$catname = str_replace("\"","��",$catname);
	$catname = str_replace("'","��",$catname);
	if($catname == "") error("�з����� �Է��ϼ���.");
	
	// ī�װ��ѹ�,����
	$parent_catcode = $catcode;
	
	$catnum1 = substr($catcode,0,2);
	$catnum2 = substr($catcode,2,2);
	$catnum3 = substr($catcode,4,2);
	
	if(empty($depthno)) $depthno = 0;
	
	if($depthno == 0){ $sposi = 1; $tmpcode = ""; }
	else if($depthno == 1){  $sposi = 3;  $tmpcode = $catnum1; }
	else if($depthno == 2){  $sposi = 5;  $tmpcode = $catnum1.$catnum2; }
	
	$sql = "select max(substring(catcode,$sposi,2)) as catnum from wiz_daycategory where catcode like '$tmpcode%'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	$row->catnum = substr(++$row->catnum."0",0,2);
	
	if($depthno == 0){ $catcode = $row->catnum."0000";}
	else if($depthno == 1){  $catcode = $catnum1.$row->catnum."00";}
	else if($depthno == 2){  $catcode = $catnum1.$catnum2.$row->catnum;}
   
   
	// �켱���� ����
	$sql = "select * from wiz_daycategory where catcode like '$tmpcode%' order by priorno01 desc, priorno02 desc, priorno03 desc";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	$priorno01 = $row->priorno01;
	$priorno02 = $row->priorno02;
	$priorno03 = $row->priorno03;
	
	if($depthno == 0){ ++$priorno01; }
	else if($depthno == 1){  ++$priorno02;}
	else if($depthno == 2){  ++$priorno03;}

	$depthno++;
   
   
	// ī�װ� Ÿ��Ʋ ����
	if($subimg_type == "FIL"){
		if($subimg[size] > 0){
			file_check($subimg[name]);
			$subimg_ext = strtolower(substr($subimg[name],-3));
			$subimg_name = $catcode."_sub.".$subimg_ext;
			copy($subimg[tmp_name], $subimg_path."/".$subimg_name);
			chmod($subimg_path."/".$subimg_name, 0606);
		}
	}else{
		$subimg_name = $subimg02;
	}
   
	// �޴��̹��� ����
	if($catimg[size] > 0){
		file_check($catimg[name]);
		$catimg_ext = strtolower(substr($catimg[name],-3));
		$catimg_name = $catcode."_cat.".$catimg_ext;
		copy($catimg[tmp_name], $catimg_path."/".$catimg_name);
		chmod($catimg_path."/".$catimg_name, 0606);
	}
	if($catimg_over[size] > 0){
		file_check($catimg_over[name]);
		$catimg_over_ext = strtolower(substr($catimg_over[name],-3));
		$catimg_over_name = $catcode."_cat_over.".$catimg_over_ext;
		copy($catimg_over[tmp_name], $catimg_path."/".$catimg_over_name);
		chmod($catimg_path."/".$catimg_over_name, 0606);
	}

	//  ī�װ� ����
	$sql = "insert into wiz_daycategory(catcode,depthno,priorno01,priorno02,priorno03,catname,catuse,catimg,catimg_over,subimg,subimg_type,
								prd_tema,prd_num,prd_width,prd_height,recom_use,recom_tema,recom_num) 
								values('$catcode','$depthno','$priorno01','$priorno02','$priorno03',
								'$catname','$catuse','$catimg_name','$catimg_over_name','$subimg_name','$subimg_type','$prd_tema','$prd_num','$prd_width','$prd_height','$recom_use','$recom_tema','$recom_num')";

	$result = mysql_query($sql) or error(mysql_error());
	
	$depthno--;

	complete("��ǰ�з��� �߰��Ͽ����ϴ�.","prd_category.php?mode=$mode&catcode=$parent_catcode&depthno=$depthno");


}else if($mode == "update"){
	
	$catname = trim($catname);
	$catname = str_replace("\"","��",$catname);
	$catname = str_replace("'","��",$catname);
	if($catname == "") error("�з����� �Է��ϼ���.");
	
	// ī�װ� Ÿ��Ʋ ����
	if($subimg_type == "FIL"){
		if($subimg[size] > 0){
			file_check($subimg[name]);
			$subimg_ext = strtolower(substr($subimg[name],-3));
			$subimg_name = $catcode."_sub.".$subimg_ext;
			copy($subimg[tmp_name], $subimg_path."/".$subimg_name);
			chmod($subimg_path."/".$subimg_name, 0606);
			
			$subimg_sql = " subimg='$subimg_name', ";
		}
	}else if($subimg_type == "HTM"){
		$subimg_sql = " subimg='$subimg02', ";
	}else{
		$subimg_sql = " subimg='', ";
	}
	
	// �޴��̹��� ����
	if($catimg[size] > 0){
		file_check($catimg[name]);
		$catimg_ext = strtolower(substr($catimg[name],-3));
		$catimg_name = $catcode."_cat.".$catimg_ext;
		copy($catimg[tmp_name], $catimg_path."/".$catimg_name);
		chmod($catimg_path."/".$catimg_name, 0606);
		$catimg_sql = " catimg='$catimg_name', ";
	}
	if($catimg_over[size] > 0){
		file_check($catimg_over[name]);
		$catimg_over_ext = strtolower(substr($catimg_over[name],-3));
		$catimg_over_name = $catcode."_cat_over.".$catimg_over_ext;
		copy($catimg_over[tmp_name], $catimg_path."/".$catimg_over_name);
		chmod($catimg_path."/".$catimg_over_name, 0606);
		$catimg_over_sql = " catimg_over='$catimg_over_name', ";
	}

	$sql = "update wiz_daycategory set catname='$catname', catuse='$catuse', $catimg_sql $catimg_over_sql $subimg_sql  subimg_type='$subimg_type', 
						prd_tema='$prd_tema', prd_num='$prd_num', prd_width='$prd_width', prd_height='$prd_height', recom_use='$recom_use', recom_tema='$recom_tema', recom_num='$recom_num' 
						where catcode = '$catcode'";
						
	mysql_query($sql) or error(mysql_error());							

	// �з������ �����з��� ��� ����
	if($catuse == "N"){
		if($depthno == "1") $tmp_catcode = substr($catcode,0,2);
		else if($depthno == "2") $tmp_catcode = substr($catcode,0,4);
		if($tmp_catcode != ""){
			$sql = "update wiz_daycategory set catuse='$catuse' where catcode like '$tmp_catcode%'";
			//echo $sql;
			mysql_query($sql) or error(mysql_error());
		}
	}
	
	complete("�з������� �����Ͽ����ϴ�.","prd_category.php?mode=$mode&catcode=$catcode&depthno=$depthno");
	
	
	
	
}else if($mode == "delete"){
	
	
	
	if($depthno == 1){ $tmpcode = substr($catcode,0,2); }
   else if($depthno == 2){ $tmpcode = substr($catcode,0,4); }
   else if($depthno == 3){ $tmpcode = $catcode; }
   
   //$depthno = $depthno-1;
   // �����з��� �����ϸ� �������� ����
   $sql = "select catcode from wiz_daycategory where catcode != '$catcode' and catcode like '$tmpcode%'";
   $result = mysql_query($sql) or error(mysql_error());
   if($row = mysql_fetch_object($result)){
      echo "<script>alert('�����з��� �����մϴ�. �����Ͻ� �� �����ϴ�.');document.location='prd_category.php?mode=update&catcode=$catcode&depthno=$depthno';</script>";
      exit;
   }
   
   
   // ���� �Ǵ� �����з��� ��ǰ�� �����ϸ� �������� ����
   $sql = "select wp.prdcode from wiz_daycprelation wc, wiz_product wp where wc.catcode = '$catcode' and wc.prdcode = wp.prdcode";
   $result = mysql_query($sql) or error(mysql_error());
   if($row = mysql_fetch_object($result)){
      echo "<script>alert('����з��� ��ǰ�� �����մϴ�. �����Ͻ� �� �����ϴ�.');document.location='prd_category.php?mode=update&catcode=$catcode&depthno=$depthno';</script>";
      exit;
   }
   
   
   // ���úз� ����
   $sql = "delete from wiz_daycategory where catcode = '$catcode'";
   $result = mysql_query($sql) or error(mysql_error());
   
   complete("�����Ͻ� �з��� �����Ͽ����ϴ�.","prd_category.php?mode=$mode&catcode=$catcode&depthno=$depthno");


// ī�װ� �켱����
}else if($mode == "updateprior"){
   
   if($catcode != ""){
   	
   $break = false;
   $sel_row = ""; $chg_row = ""; $tmp_row = "";
   $sql = "select * from wiz_daycategory where depthno = '$depthno' order by priorno01, priorno02, priorno03 asc";
	$result = mysql_query($sql) or error(mysql_error());
	while($row = mysql_fetch_object($result)){
		
		if($break == true) { $chg_row = $row; break;}
		
		if($row->catcode == $catcode){
			$sel_row = $row;
			if($posi == "up"){
				$chg_row = $tmp_row;
			}else if($posi == "down"){
				$break = true;
			}
		}
		
		$tmp_row = $row;
	}
	
	if($depthno == 1){
		$sel_catcode = substr($sel_row->catcode,0,2);
		$chg_catcode = substr($chg_row->catcode,0,2);
		
		$sel_sql = " priorno01='$chg_row->priorno01' ";
		$chg_sql = " priorno01='$sel_row->priorno01' ";
		
	}else if($depthno == 2){
		$sel_catcode = substr($sel_row->catcode,0,4);
		$chg_catcode = substr($chg_row->catcode,0,4);
		
		$sel_sql = " priorno02='$chg_row->priorno02' ";
		$chg_sql = " priorno02='$sel_row->priorno02' ";
		
	}else if($depthno == 3){
		$sel_catcode = $sel_row->catcode;
		$chg_catcode = $chg_row->catcode;
		
		$sel_sql = " priorno03='$chg_row->priorno03' ";
		$chg_sql = " priorno03='$sel_row->priorno03' ";
	}
	
	
	if($chg_row->catcode != ""){
		
		$sql = "update wiz_daycategory set $sel_sql where catcode like '$sel_catcode%'";
		$result = mysql_query($sql) or error(mysql_error());
		
		$sql = "update wiz_daycategory set $chg_sql where catcode like '$chg_catcode%'";
		$result = mysql_query($sql) or error(mysql_error());

	}
	
	}
	
   Header("Location: prd_category.php?mode=update&catcode=$catcode&depthno=$depthno");

}else if($mode == "delsubimg"){

	foreach (glob($subimg_path."/".$catcode."_sub.*") as $filename) {
		@unlink($filename);
	}
	$sql = "update wiz_daycategory set subimg = '' where catcode = '$catcode'";
	$result = mysql_query($sql) or error(mysql_error());
  Header("Location: prd_category.php?mode=update&catcode=$catcode&depthno=$depthno");
   
}else if($mode == "delcatimg"){

	foreach (glob($catimg_path."/".$catcode."_cat.*") as $filename) {
		@unlink($filename);
	}
	$sql = "update wiz_daycategory set catimg = '' where catcode = '$catcode'";
	$result = mysql_query($sql) or error(mysql_error());
   Header("Location: prd_category.php?mode=update&catcode=$catcode&depthno=$depthno");
   
}else if($mode == "delcatimg_over"){

	foreach (glob($catimg_path."/".$catcode."_cat_over.*") as $filename) {
		@unlink($filename);
	}
	$sql = "update wiz_daycategory set catimg_over = '' where catcode = '$catcode'";
	$result = mysql_query($sql) or error(mysql_error());
  Header("Location: prd_category.php?mode=update&catcode=$catcode&depthno=$depthno");
   
}



?>