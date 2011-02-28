<?
include_once "$_SERVER[DOCUMENT_ROOT]/inc/common.inc";
if($upload == ""){
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>동영상삽입　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　.</title>
<style type="text/css">
	body	{font-size: 9pt; font-family: 굴림, 돋음; font-style:  normal; font-weight: normal;}
	td		{font-size: 9pt; font-family: 굴림, 돋음; font-style:  normal; font-weight: normal;}
	pre		{font-size: 9pt; font-family: 굴림, 돋음; font-style:  normal; font-weight: normal;}
	input, select, textarea, button	{font-size: 9pt; font-family: 굴림, 돋음; font-style:  normal; font-weight: normal;}
	
	input, select	{width:90%;}
	textarea		{width:100%; height:50;}
	button			{width:75; cursor:hand;}
	
	image			{cursor:hand;}
	
	.threedface	{background-color: threedface;}
	.align_select	{border: 2px solid #000080;}
</style>
<script language="javascript">
<!--

	//**	취소
		function FUN_Cancle(){
			window.close();
			return;
		}
		
	//**	파일 선택시 파일 경로를 부모창의 Src로 전송
		function FUN_FileSelect()
		{
			
			var Obj		= document.all['upfile'];
			var P_Obj	= parent.document.all['tmpImage'];
			//P_Obj.src	= Obj.value;
			//P_Obj.style.display = "";
			return;
		}
		
   //** 파일을 선택했는지 체크
   function inputCheck(frm){
   	
      if(frm.upfile.value == ""){
         alert("파일을 선택하세요");
         return false;
      }
      if(frm.f_Width.value == ""){
         alert("가로를 입력하세요");
         frm.f_Width.focus();
         return false;
      }
      if(frm.f_Height.value == ""){
         alert("세로를 입력하세요");
         frm.f_Height.focus();
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
		<td width="20%">파일선택:</td>
		<td width="80%">
		<input type="file" name="upfile" size="20" style="width:100%;" onPropertyChange="javascript:FUN_FileSelect();"></td>
	</tr>
	<tr>
	  <td></td>
	</tr>
	<tr>
		<td width="20%">크기:</td>
		<td width="80%">
			가로 <input type="text" name="f_Width" style="width:70px"> px
			세로 <input type="text" name="f_Height" style="width:70px"> px
		</td>
	</tr>
	<tr>
	  <td></td>
	</tr>
	<tr>
		<td colspan="2" width="100%" align="right" valign="bottom">
		<button name="InsertTable_Ok" OnCLick="inputCheck(document.frm);" unselectable="on">확인</button>
		&nbsp;
		<button name="InsertTable_Calcle" OnClick="javascript:FUN_Cancle();" unselectable="on">취소</button>
		</td>
	</tr>
</form>
</table>
</body>
</html>
<?
}else{

   $upfile_dir = "$_SERVER[DOCUMENT_ROOT]/data/webedit";
   
   if($upfile[size] > 0) {
   	
   	if(empty($f_Width) || empty($f_Height)) {
      error("플래쉬크기를 입력하세요.",$PHP_SELF);
   	} else {
   		
   		// 파일 확장자 체크
   		$file_str = "php|htm|html";
   		$filename = $upfile[name];
			$file_arr = explode("|", $file_str);

			$name_arr = explode(".", $filename);
			$name_cnt = count($name_arr) - 1;

			for($ii = 0; $ii < count($file_arr); $ii++) {
				if(!strcmp(strtolower($name_arr[$name_cnt]), strtolower($file_arr[$ii]))) {
      		error("해당 파일은 업로드할 수 없는 형식입니다.",$PHP_SELF);
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
      parent.Insert_Movie.f_Src.value = '/data/webedit/$upfile_name';
      parent.Insert_Movie.f_Width.value = '".$f_Width."';
      parent.Insert_Movie.f_Height.value = '".$f_Height."';
      parent.FUN_Ok();
      -->
      </script>
      ";
      
   	}   	
   	
   } else{
      error("파일이 없습니다.",$PHP_SELF);
   }
   
}
?>