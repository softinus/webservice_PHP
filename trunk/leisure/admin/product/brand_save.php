<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?

$subimg_path = "../../data/subimg";
$brdimg_path = "../../data/brdimg";
$upfile_idx = date('ymdhis').rand(1,9);						// ���ε����ϸ�

if($mode == "insert"){
	
	// �귣��� ����ǥ ���� ��ǰ��Ͻ� ��ũ��Ʈ ����
	$brdname = trim($brdname);
	$brdname = str_replace("\"","��",$brdname);
	$brdname = str_replace("'","��",$brdname);
	if($brdname == "") error("�귣����� �Է��ϼ���.");
	
	// �켱���� ����
	$sql = "select max(priorno) as priorno from wiz_brand order by priorno desc";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	
	$priorno = $row->priorno + 1;
	
	// ī�װ� Ÿ��Ʋ ����
	if($subimg_type == "FIL"){
		if($subimg[size] > 0){
			file_check($subimg[name]);
			$subimg_ext = strtolower(substr($subimg[name],-3));
			$subimg_name = $upfile_idx."_sub.".$subimg_ext;
			copy($subimg[tmp_name], $subimg_path."/".$subimg_name);
			chmod($subimg_path."/".$subimg_name, 0606);
		}
	}else{
		$subimg_name = $subimg02;
	}
   
	// �޴��̹��� ����
	if($brdimg[size] > 0){
		file_check($brdimg[name]);
		$brdimg_ext = strtolower(substr($brdimg[name],-3));
		$brdimg_name = $upfile_idx."_brd.".$brdimg_ext;
		copy($brdimg[tmp_name], $brdimg_path."/".$brdimg_name);
		chmod($brdimg_path."/".$brdimg_name, 0606);
	}
	if($brdimg_over[size] > 0){
		file_check($brdimg_over[name]);
		$brdimg_over_ext = strtolower(substr($brdimg_over[name],-3));
		$brdimg_over_name = $upfile_idx."_brd_over.".$brdimg_over_ext;
		copy($brdimg_over[tmp_name], $brdimg_path."/".$brdimg_over_name);
		chmod($brdimg_path."/".$brdimg_over_name, 0606);
	}

	//  �귣�� ����
	$sql = "insert into wiz_brand (idx,priorno,brdname,brduse,brdimg,brdimg_over,subimg,subimg_type,prd_num,prd_width,prd_height,recom_use) 
					values('','$priorno','$brdname','$brduse','$brdimg_name','$brdimg_over_name','$subimg_name','$subimg_type','$prd_num','$prd_width','$prd_height','$recom_use')";
	mysql_query($sql) or error(mysql_error()); 	
	
	$idx = mysql_insert_id();
	
	complete("�귣�带 �߰��Ͽ����ϴ�.","prd_brand.php?mode=update&idx=$idx");

}else if($mode == "update"){
	
	$brdname = trim($brdname);
	$brdname = str_replace("\"","��",$brdname);
	$brdname = str_replace("'","��",$brdname);
	if($brdname == "") error("�귣����� �Է��ϼ���.");
	
	$sql = "select brdimg, brdimg_over, subimg from wiz_brand where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_array($result);
	
	// ī�װ� Ÿ��Ʋ ����
	if($subimg_type == "FIL"){
		if($subimg[size] > 0){
			file_check($subimg[name]);
			@unlink($subimg_path."/".$row[subimg]);
			$subimg_ext = strtolower(substr($subimg[name],-3));
			$subimg_name = $upfile_idx."_sub.".$subimg_ext;
			copy($subimg[tmp_name], $subimg_path."/".$subimg_name);
			chmod($subimg_path."/".$subimg_name, 0606);
			$subimg_sql = " subimg='$subimg_name', ";
		}
	}else if($subimg_type == "HTM"){
		$subimg_sql = " subimg='$subimg02', ";
		@unlink($subimg_path."/".$row[subimg]);
	}else{
		$subimg_sql = " subimg='', ";
		@unlink($subimg_path."/".$row[subimg]);
	}
	
	// �޴��̹��� ����
	if($brdimg[size] > 0){
		file_check($brdimg[name]);
		@unlink($brdimg_path."/".$row[brdimg]);
		$brdimg_ext = strtolower(substr($brdimg[name],-3));
		$brdimg_name = $upfile_idx."_brd.".$brdimg_ext;
		copy($brdimg[tmp_name], $brdimg_path."/".$brdimg_name);
		chmod($brdimg_path."/".$brdimg_name, 0606);
		$brdimg_sql = " brdimg='$brdimg_name', ";
	}
	if($brdimg_over[size] > 0){
		file_check($brdimg_over[name]);
		@unlink($brdimg_path."/".$row[brdimg_over]);
		$brdimg_over_ext = strtolower(substr($brdimg_over[name],-3));
		$brdimg_over_name = $upfile_idx."_brd_over.".$brdimg_over_ext;
		copy($brdimg_over[tmp_name], $brdimg_path."/".$brdimg_over_name);
		chmod($brdimg_path."/".$brdimg_over_name, 0606);
		$brdimg_over_sql = " brdimg_over='$brdimg_over_name', ";
	}

	$sql = "update wiz_brand set brdname='$brdname',brduse='$brduse', $brdimg_sql $brdimg_over_sql $subimg_sql
					subimg_type='$subimg_type',prd_num='$prd_num',prd_width='$prd_width',prd_height='$prd_height',
					recom_use='$recom_use' where idx = '$idx'";
						
	mysql_query($sql) or error(mysql_error());							

	complete("�귣�������� �����Ͽ����ϴ�.","prd_brand.php?mode=update&idx=$idx");
	
}else if($mode == "delete"){
	
	// �귣�忡 ��ǰ�� �����ϸ� �������� ����
	$sql = "select prdcode from wiz_product where brand = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	if($row = mysql_fetch_object($result)){
	  echo "<script>alert('���� �귣�忡 ��ǰ�� �����մϴ�. �����Ͻ� �� �����ϴ�.');document.location='prd_brand.php?mode=update&idx=$idx';</script>";
	  exit;
	}
	
	$sql = "select brdimg, brdimg_over, subimg from wiz_brand where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_array($result);
	
	if(!empty($row[brdimg])) @unlink($brdimg_path."/".$row[brdimg]);
	if(!empty($row[brdimg_over])) @unlink($brdimg_path."/".$row[brdimg_over]);
	if(!empty($row[subimg])) @unlink($subimg_path."/".$row[subimg]);
	
	// ���� �귣�� ����
	$sql = "delete from wiz_brand where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("�����Ͻ� �귣�带 �����Ͽ����ϴ�.","prd_brand.php");

// �귣�� �켱����
}else if($mode == "updateprior"){
   
	if($idx != ""){
   	
		$break = false;
		$sel_row = ""; $chg_row = ""; $tmp_row = "";
		$sql = "select * from wiz_brand order by priorno asc";
		$result = mysql_query($sql) or error(mysql_error());
		while($row = mysql_fetch_object($result)){
			
		if($break == true) { $chg_row = $row; break;}
		
			if($row->idx == $idx){
				$sel_row = $row;
				if($posi == "up"){
					$chg_row = $tmp_row;
				}else if($posi == "down"){
					$break = true;
				}
			}
			
			$tmp_row = $row;
		}
		
		$sel_idx = $sel_row->idx;
		$chg_idx = $chg_row->idx;
		
		$sel_sql = " priorno='$chg_row->priorno' ";
		$chg_sql = " priorno='$sel_row->priorno' ";
	
		if($chg_row->idx != ""){
		
			$sql = "update wiz_brand set $sel_sql where idx = '$sel_idx'";
			$result = mysql_query($sql) or error(mysql_error());
			
			$sql = "update wiz_brand set $chg_sql where idx = '$chg_idx'";
			$result = mysql_query($sql) or error(mysql_error());
			
		}
	
	}
	
	Header("Location: prd_brand.php?mode=update&idx=$idx");

}else if($mode == "delsubimg"){

	$sql = "select brdimg, brdimg_over, subimg from wiz_brand where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_array($result);
	
	if(!empty($row[subimg])) @unlink($subimg_path."/".$row[subimg]);
	
	$sql = "update wiz_brand set subimg = '' where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
  Header("Location: prd_brand.php?mode=update&idx=$idx");
   
}else if($mode == "delbrdimg"){

	$sql = "select brdimg, brdimg_over, subimg from wiz_brand where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_array($result);
	
	if(!empty($row[brdimg])) @unlink($brdimg_path."/".$row[brdimg]);
	
	$sql = "update wiz_brand set brdimg = '' where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
   Header("Location: prd_brand.php?mode=update&idx=$idx");
   
}else if($mode == "delbrdimg_over"){

	$sql = "select brdimg, brdimg_over, subimg from wiz_brand where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_array($result);
	
	if(!empty($row[brdimg_over])) @unlink($brdimg_path."/".$row[brdimg_over]);
	
	$sql = "update wiz_brand set brdimg_over = '' where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
  Header("Location: prd_brand.php?mode=update&idx=$idx");
   
}



?>