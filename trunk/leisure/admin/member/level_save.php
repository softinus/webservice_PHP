<? include "../../inc/common.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>

<?
if($mode == "insert"){

  $sql = "insert into wiz_level(idx,level,icon,name,distype,discount,exp) values('','$level','$icon','$name','$distype','$discount','$exp')";
	$result = mysql_query($sql) or error(mysql_error());

	complete("��ϵǾ����ϴ�.","member_level.php");
	
}else if($mode == "update"){
	
	for($ii=0; $ii<count($permi); $ii++){
      $tmp_permi .= $permi[$ii]."/";
   }
   
	$sql = "update wiz_level set level='$level', icon='$icon', name='$name', distype='$distype', discount='$discount', exp='$exp' where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("�����Ǿ����ϴ�","level_input.php?mode=update&idx=$idx");
	
}else if($mode == "delete"){
	
	$sql = "select idx from wiz_level where level > $level order by idx asc limit 1";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	$chg_level = $row->idx;
	
	$sql = "update wiz_member set level = '$chg_level' where level = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	$sql = "update wiz_bbsinfo set lpermi = '$chg_level' where lpermi = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	$sql = "update wiz_bbsinfo set rpermi = '$chg_level' where rpermi = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	$sql = "update wiz_bbsinfo set wpermi = '$chg_level' where wpermi = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	$sql = "update wiz_bbsinfo set apermi = '$chg_level' where apermi = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	$sql = "update wiz_bbsinfo set cpermi = '$chg_level' where cpermi = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	$sql = "delete from wiz_level where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	
	complete("�����Ǿ����ϴ�.","member_level.php");
	
}

?>