<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?
// ������ ��������
if(empty($file_path) || substr($file_path, 0,1) == "/" || strpos($file_path, "../", 6) > 0){
   echo "<script>alert('������ �� �����ϴ�.');self.close();</script>";
   exit;
}

if($mode == "insert"){
   
   // ���Ͼ��ε�
   if($submode == "createfile"){

		$check_ext = substr($create_file[name],-3);
		$check2_ext = substr($create_file2[name],-3);
		$check3_ext = substr($create_file3[name],-3);
		$check4_ext = substr($create_file4[name],-3);
		$check5_ext = substr($create_file5[name],-3);
		
		if($create_file[size] > 0 && $check_ext){
			file_check($create_file[name]);
			@unlink($file_path."/".$create_file[name]);
			copy($create_file[tmp_name], $file_path."/".$create_file[name]);
			chmod($file_path."/".$create_file[name], 0606);
		}
		if($create_file2[size] > 0 && $check2_ext){
			file_check($create_file2[name]);
			@unlink($file_path."/".$create_file2[name]);
			copy($create_file2[tmp_name], $file_path."/".$create_file2[name]);
			chmod($file_path."/".$create_file2[name], 0606);
		}
		if($create_file3[size] > 0 && $check3_ext){
			file_check($create_file3[name]);
			@unlink($file_path."/".$create_file3_name);
			copy($create_file3[tmp_name], $file_path."/".$create_file3[name]);
			chmod($file_path."/".$create_file3[name], 0606);
		}
		if($create_file4[size] > 0 && $check4_ext){
			file_check($create_file4[name]);
			@unlink($file_path."/".$create_file4[name]);
			copy($create_file4[tmp_name], $file_path."/".$create_file4[name]);
			chmod($file_path."/".$create_file4[name], 0606);
		}
		if($create_file5[size] > 0 && $check5_ext){
			file_check($create_file5[name]);
			@unlink($file_path."/".$create_file5[name]);
			copy($create_file5[tmp_name], $file_path."/".$create_file5[name]);
			chmod($file_path."/".$create_file5[name], 0606);
		}
   	
   	echo "<script>alert('�̹����� �߰��Ǿ����ϴ�.');self.close();opener.document.location='dsn_webftp.php?file_path=$file_path&page=$page';</script>";
   
   
   // ��������
	}else if($submode == "createdir"){
		
		if(!empty($create_dir)){
			mkdir($file_path."/".$create_dir,0707);
			echo "<script>alert('���丮�� �����Ǿ����ϴ�.');self.close();opener.document.location='dsn_webftp.php?file_path=$file_path&page=$page';</script>";
		}else{
			echo "<script>alert('���丮���� �Է��ϼ���');history.go(-1);</script>";
		}
		
	}



// �̹���,��������
}else if($mode == "update"){
   
	for($ii=0; $ii < count($selname); $ii++){
		
		if($_FILES[upfile][size][$ii] > 0 ){

		   move_uploaded_file($_FILES['upfile']['tmp_name'][$ii], "$file_path/$selname[$ii]");
		   
		}
	
	}
	for($ii=0; $ii < count($seldir); $ii++){
		if($upname[$ii] != ""){
			copy($file_path."/".$seldir[$ii], $file_path."/".$upname[$ii]);
			chmod($file_path."/".$upname[$ii], 0606);
			@unlink($file_path."/".$seldir[$ii]);
		}
		
	}
	
	echo "<script>alert('�����Ǿ����ϴ�.');document.location='dsn_webftp_input.php?mode=update&page=&file_path=$file_path&selfile=$selfile';</script>";


// ���ϻ���
}else if($mode == "delete"){
   
   $i=0;
	$array_selfile = explode("|",$selfile);
	while($array_selfile[$i]){
		@unlink($file_path."/".$array_selfile[$i]);
		$i++;
	}

   echo "<script>alert('������ ������ �����Ͽ����ϴ�.');document.location='dsn_webftp.php?page=$page&file_path=$file_path';</script>";
   
}

?>