<? include "../../inc/common.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?

// 상위로 접근차단
if(empty($file_path) || substr($file_path, 0,1) == "/" || strpos($file_path, "../", 6) > 0){
   echo "<script>alert('접근할 수 없습니다.');self.close();</script>";
   exit;
}

$web_path = $HTTP_HOST."/".str_replace("../../", "", $file_path);

?>
<html>
<head>
<title>:: WEB-FTP ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="/js/valueCheck.js"></script>
<script language="JavaScript">
<!--
//-->
</script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
<tr>
<td>
	
<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
	  <td width="80" class="tit_sub"><img src="../image/ics_tit.gif"> 현재위치 :</td>
	  <td>http://<?=$web_path?></td>
	</tr>
</table>
<?
if($mode == "" || $mode == "insert"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<form name="inputForm" action="dsn_webftp_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="<?=$mode?>">
<input type="hidden" name="submode" value="createfile">
<input type="hidden" name="file_path" value="<?=$file_path?>">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
        <tr> 
          <td width="25%" class="t_name">이미지업로드</td>
          <td width="75%" class="t_value">
          <input type="file" name="create_file" class="input"><br>
          <input type="file" name="create_file2" class="input"><br>
          <input type="file" name="create_file3" class="input"><br>
          <input type="file" name="create_file4" class="input"><br>
          <input type="file" name="create_file5" class="input">
          <input type="image" src="../image/btn_confirm_s.gif" align="absmiddle">
          </td>
        </tr>
      </table>
    </td>
  </tr>
</form>
</table>

<table width="100%" height="10" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr><td></td></tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<form name="inputForm" action="dsn_webftp_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="<?=$mode?>">
<input type="hidden" name="submode" value="createdir">
<input type="hidden" name="file_path" value="<?=$file_path?>">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
        <tr> 
          <td width="25%" class="t_name">디렉토리생성</td>
          <td width="75%" class="t_value" colspan="3">
          <input type="text" name="create_dir" value="<?=$file_name?>" class="input">
          <input type="image" src="../image/btn_confirm_s.gif" align="absmiddle">
          </td>
        </tr>
      </table>
    </td>
  </tr>
</form>
</table>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td align="center"><img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();"></td>
  </tr>
</table>

<?
}else if($mode == "update"){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<form action="dsn_webftp_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="<?=$mode?>">
<input type="hidden" name="file_path" value="<?=$file_path?>">
<input type="hidden" name="selfile" value="<?=$selfile?>">
<input type="hidden" name="page" value="<?=$page?>">
  <tr>
    <td>
			<?
			$i=0;
			$array_selfile = explode("|",$selfile);
			while($array_selfile[$i]){
				if(is_file("$file_path/$array_selfile[$i]")){
			?>
      <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
        <tr> 
          <td width="25%" class="t_name">파일변경</td>
          <td width="75%" class="t_value" colspan="3">
          <img src="<?=$file_path?>/<?=$array_selfile[$i]?>"><br>
          <input type="hidden" name="selname[]" value="<?=$array_selfile[$i]?>">
          <input type="file" name="upfile[]" class="input">
          </td>
        </tr>
      </table>
      <table bgcolor="#ffffff" width="100%" height="5" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr><td></td></tr>
      </table>
		<?
		}else{
		?>
		<table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
        <tr> 
          <td width="25%" class="t_name">폴더명변경</td>
          <td width="75%" class="t_value" colspan="3">
          <input type="hidden" name="seldir[]" value="<?=$array_selfile[$i]?>">
          <input type="text" name="upname[]" value="<?=$array_selfile[$i]?>" class="input">
          </td>
        </tr>
      </table>
      <table bgcolor="#ffffff" width="100%" height="5" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr><td></td></tr>
      </table>
		<?
			}
			$i++;
		}
		?>
    </td>
  </tr>
</table>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="35">
  <tr> 
    <td align="center">
      <input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
      <img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();">
    </td>
  </tr>
</form>
</table>
<?
}
?>

</td>
</tr>
</table>

</body>
</html>