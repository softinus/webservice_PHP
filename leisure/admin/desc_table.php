<? include_once "$_SERVER[DOCUMENT_ROOT]/inc/common.inc"; ?>
<? include_once "$_SERVER[DOCUMENT_ROOT]/inc/admin_check.inc"; ?>
<html> 
<head>
<title>����Ÿ���̽� ��Ű��</title> 
<meta http-equiv="Content-Type" content="text/html;" charset="euc-kr">
<style>
td {font-size:13px;font-family:"����","����";color:#000000;} 
</style>
</head>
<body>
<?
// ���̺� ���� ����
if($mode == "edit"){
	
	
	$sql = "select idx from wiz_tabledesc where idx='$tidx'";
	$result = mysql_query($sql);
	$exist = mysql_num_rows($result);
	if($exist <= 0 || $tidx == ""){
		$sql = "insert into wiz_tabledesc(idx,tname,tdesc,field) values('','$tname','$tdesc','anywiz')";
	}else{
		$sql = "update wiz_tabledesc set tdesc='$tdesc',field='anywiz' where idx='$tidx'";
	}
	mysql_query($sql);


	for($ii=0; $ii<count($ftmp); $ii++){
		
		$sql = "select idx from wiz_tabledesc where idx='".$ftmp[$ii][0]."'";
		$result = mysql_query($sql);
		$exist = mysql_num_rows($result);
		if($exist <= 0){
			$sql = "insert into wiz_tabledesc(idx,tname,field,fdesc) values('','$tname','".$ftmp[$ii][1]."','".$ftmp[$ii][2]."')";
		}else{
			$sql = "update wiz_tabledesc set fdesc='".$ftmp[$ii][2]."' where idx='".$ftmp[$ii][0]."'";
		}
		mysql_query($sql);
		
	}
	
}


// ���̺� ���
$sql = "show tables";
$result = mysql_query($sql);
$total = mysql_num_rows($result);

?>
<table width=700>
	<tr><td height="20"></td></tr>
	<tr>
		<td><h1>����Ÿ���̽� ��Ű��</h1></td>
	</tr>
	<tr><td>��ü���̺� : <?=$total?>��</td></tr>
</table>

<?
while($row = mysql_fetch_array($result)){
	
	$tname = $row[0];
	
	if($tname == "wiz_tabledesc") continue;
	if($mode == "print" && ($ptname != "" && $tname != $ptname))  continue;
	
	// ���̺� ��
	$t_sql = "desc ".$tname;
	$t_result = mysql_query($t_sql);
	
	// �ּ�����Ÿ
	$d_sql = "select * from wiz_tabledesc where tname='$tname'";
	$d_result = mysql_query($d_sql);
	$arr_desc = "";
	while($d_row = mysql_fetch_array($d_result)){
		$field = $d_row[field];
		$arr_desc[$field][idx] = $d_row[idx];
		$arr_desc[$field][tdesc] = $d_row[tdesc];
		$arr_desc[$field][fdesc] = $d_row[fdesc];
	}
	
?>
<table width=700 cellspacing=1 cellpadding=3>
<form action="<?=$_SERVER[PHP_SELF]?>" method="post">
<input type="hidden" name="mode" value="edit">
<input type="hidden" name="tname" value="<?=$tname?>">
	<tr><td height="20"></td></tr>
	<tr>
		<td width=20% valign=top><b><?=$tname?></b></td>
		<? if($mode == "print"){?>
		<td><?=nl2br($arr_desc[anywiz][tdesc])?></td>
		<? }else{ ?>
		<td>
			<input type="hidden" name="tidx" value="<?=$arr_desc[anywiz][idx]?>" style="width:100%">
			<textarea rows="2" cols="60" name="tdesc"><?=$arr_desc[anywiz][tdesc]?></textarea>
		</td>
		<td align="right"><input type="button" value="���" onClick="window.open('<?=$_SERVER[PHP_SELF]?>?ptname=<?=$tname?>&mode=print','','');"><input type="submit" value="����"></td>
		<? } ?>
	</tr>
</table>
<table width=700 border=0 cellspacing=1 cellpadding=3 bgcolor=#000000>
	<tr>
		<td bgcolor=#efefef width=10%>Field</td>
		<td bgcolor=#efefef width=20%>Type</td>
		<td bgcolor=#efefef width=10%>Null</td>
		<td bgcolor=#efefef width=10%>Key</td>
		<td bgcolor=#efefef width=10%>Default</td>
		<td bgcolor=#efefef>Desc</td>
	</tr>
<?
	$t_no = 0;
	while($t_row = mysql_fetch_array($t_result)){
		$field = $t_row[0];
?>
	<tr>
		<td bgcolor=#ffffff><?=$t_row[0]?></td>
		<td bgcolor=#ffffff><?=$t_row[1]?></td>
		<td bgcolor=#ffffff><?=$t_row[2]?></td>
		<td bgcolor=#ffffff><?=$t_row[3]?></td>
		<td bgcolor=#ffffff><?=$t_row[4]?></td>
		<td bgcolor=#ffffff>
			<? if($mode == "print"){ echo $arr_desc[$field][fdesc]; ?>
			<? }else{ ?>
			<input type="hidden" name="ftmp[<?=$t_no?>][0]" value="<?=$arr_desc[$field][idx]?>">
			<input type="hidden" name="ftmp[<?=$t_no?>][1]" value="<?=$field?>">
			<input type="text" name="ftmp[<?=$t_no?>][2]" value="<?=$arr_desc[$field][fdesc]?>" style="width:100%">
			<? } ?>
		</td>
	</tr>
<?	
		$t_no++;
	}
?>
</form>
</table>
<?
}
?>