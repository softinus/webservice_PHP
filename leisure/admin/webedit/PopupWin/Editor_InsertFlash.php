<?
include_once "$_SERVER[DOCUMENT_ROOT]/inc/common.inc";
if($upload == ""){
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>�÷������ԡ���������������������������������������������������������������������������������������������������������������������������������������������������������������������.</title>
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

	//**	���
		function FUN_Cancle(){
			window.close();
			return;
		}
		
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
   	
      if(frm.f_upfile.value == ""){
         alert("�÷����� �����ϼ���");
         return false;
      }
      if(frm.f_width.value == ""){
         alert("���θ� �Է��ϼ���");
         frm.f_width.focus();
         return false;
      }
      if(frm.f_height.value == ""){
         alert("���θ� �Է��ϼ���");
         frm.f_height.focus();
         return false;
      }
      
      frm.submit();
   }
-->
</script>
</head>
<body style="background: threedface; color: windowtext; margin: 0px; border-style: none;">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="90%" style="border-collapse: collapse" bordercolor="#111111; display: none">
<form name="frm" action="<?=$PHP_SELF?>?upload=ok" onSubmit="return inputCheck(this);" method="post" enctype="multipart/form-data">
	<tr>
		<td width="20%">�÷�������:</td>
		<td width="80%">
		<input type="file" name="f_upfile" size="20" style="width:100%;" onPropertyChange="javascript:FUN_FileSelect();"></td>
	</tr>
	<tr>
	  <td></td>
	</tr>
	<tr>
		<td width="20%">�÷���ũ��:</td>
		<td width="80%">
			���� <input type="text" name="f_width" style="width:70px"> px
			���� <input type="text" name="f_height" style="width:70px"> px
		</td>
	</tr>
	<tr>
	  <td></td>
	</tr>
	<tr>
		<td colspan="2" width="100%" align="right" valign="bottom">
		<button name="InsertTable_Ok" OnCLick="inputCheck(document.frm);" unselectable="on">Ȯ��</button>
		&nbsp;
		<button name="InsertTable_Calcle" OnClick="javascript:FUN_Cancle();" unselectable="on">���</button>
		</td>
	</tr>
</form>
</table>
</body>
</html>
<?
}else{

   $upfile_dir = "$_SERVER[DOCUMENT_ROOT]/data/webedit";
   
   if($f_upfile[size] > 0) {
   	
   	if(empty($f_width) || empty($f_height)) {
      error("�÷���ũ�⸦ �Է��ϼ���.",$PHP_SELF);
   	} else {
   		
   		// ���� Ȯ���� üũ
   		$file_str = "php|htm|html";
   		$filename = $f_upfile[name];
			$file_arr = explode("|", $file_str);

			$name_arr = explode(".", $filename);
			$name_cnt = count($name_arr) - 1;

			for($ii = 0; $ii < count($file_arr); $ii++) {
				if(!strcmp(strtolower($name_arr[$name_cnt]), strtolower($file_arr[$ii]))) {
      		error("�ش� ������ ���ε��� �� ���� �����Դϴ�.",$PHP_SELF);
					exit;
				}
			}

      if(!is_dir($upfile_dir)){
         mkdir($upfile_dir);
         chmod($upfile_dir, 0707);
      }
      
      $f_upfile_ext = strtolower(substr($f_upfile[name],-3));
      $f_upfile_name = date('ymdhis').rand(10,99).".".$f_upfile_ext;
      copy($f_upfile[tmp_name], $upfile_dir."/".$f_upfile_name);
      chmod($upfile_dir."/".$f_upfile_name, 0606);
      
      echo "
      <script language='javascript'>
      <!--
      parent.Insert_Flash.f_Src.value = '/data/webedit/$f_upfile_name';
      parent.Insert_Flash.f_Width.value = '".$f_width."';
      parent.Insert_Flash.f_Height.value = '".$f_height."';
      parent.FUN_Ok();
      -->
      </script>
      ";
      
   	}   	
   	
   } else{
      error("�÷����� �����ϴ�.",$PHP_SELF);
   }
   
}
?>