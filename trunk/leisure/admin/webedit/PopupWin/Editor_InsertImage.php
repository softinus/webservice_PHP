<?
include_once "$_SERVER[DOCUMENT_ROOT]/inc/common.inc";
if($upload == ""){
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>�׸����ԡ���������������������������������������������������������������������������������������������������������������������������������������������������������������������.</title>
<style type="text/css">
	body	{font-size: 9pt; font-family: ����, ����; font-style:  normal; font-weight: normal;}
	td		{font-size: 9pt; font-family: ����, ����; font-style:  normal; font-weight: normal;}
	pre		{font-size: 9pt; font-family: ����, ����; font-style:  normal; font-weight: normal;}
	input, select, textarea, button	{font-size: 9pt; font-family: ����, ����; font-style:  normal; font-weight: normal;}
	
	input, select	{width:90%;}
	textarea		{width:100%; height:50;}
	button			{width:75; cursor:hand;}
	
	image			{cursor:hand;}
	
	.threedface	{background-color: threedface;}
	.align_select	{border: 2px solid #000080;}
</style>
<script language="javascript">
<!--
	//**	���� ���ý� ���� ��θ� �θ�â�� Src�� ����
		function FUN_FileSelect()
		{
			
			var Obj		= document.all['upfile'];
			var P_Obj	= parent.document.all['tmpImage'];
			//P_Obj.src	= Obj.value;
			//P_Obj.style.display = "";
			return;
		}
		
   //** ������ �����ߴ��� üũ
   function inputCheck(frm){
      if(frm.upfile.value == ""){
         alert("�̹����� �����ϼ���");
         return false;
      }
   }
-->
</script>
</head>
<body style="background: threedface; color: windowtext; margin: 0px; border-style: none;">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%" style="border-collapse: collapse" bordercolor="#111111; display: none">
<form name="frm" action="<?=$PHP_SELF?>?upload=ok" onSubmit="return inputCheck(this);" method="post" enctype="multipart/form-data">
	<tr>
		<td width="20%">�̹�������:</td>
		<td width="80%">
		<input type="file" name="upfile" size="20" style="width:100%;" onPropertyChange="javascript:FUN_FileSelect();"></td>
	</tr>
	<tr>
	  <td></td>
	</tr>
</form>
</table>
</body>
</html>
<?
}else{

   $upfile_dir = "$_SERVER[DOCUMENT_ROOT]/data/webedit";
   
   if($upfile[size] > 0){
   	
   		// ���� Ȯ���� üũ
   		$file_str = "php|htm|html";
   		$filename = $upfile[name];
			$file_arr = explode("|", $file_str);
		
			$name_arr = explode(".", $filename);
			$name_cnt = count($name_arr) - 1;
		
			for($ii = 0; $ii < count($file_arr); $ii++) {
				if(!strcmp(strtolower($name_arr[$name_cnt]), strtolower($file_arr[$ii]))) {
					echo "<script>alert('�ش� ������ ���ε��� �� ���� �����Դϴ�.'); document.location='$PHP_SELF';</script>";
					exit;
				}
			}
   	

      if(!is_dir($upfile_dir)){
         mkdir($upfile_dir);
         chmod($upfile_dir, 0707);
      }
      
      $upfile_ext = strtolower(substr($upfile[name],-3));
      $upfile_name = date('ymdhis').rand(10,99).".".$upfile_ext;
      copy($upfile[tmp_name], $upfile_dir."/".$upfile_name);
      chmod($upfile_dir."/".$upfile_name, 0606);
      
      echo "
      <script language='javascript'>
      <!--
      parent.Insert_Image.Src.value = '/data/webedit/$upfile_name';
      parent.FUN_Ok();
      -->
      </script>
      ";
      
   }else{
      error("�̹����� �����ϴ�.","");
   }
   
}
?>