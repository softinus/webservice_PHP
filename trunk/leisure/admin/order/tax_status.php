<html>
<head>
<title>:: ���ݰ�꼭 �ϰ�ó�� ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
<tr>
<td>
	
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> ���ݰ�꼭 �ϰ�ó��</td>
  </tr>
</table>
<table width="100%" cellpadding=2 cellspacing=1 class="t_style">
<form action="order_save.php">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="batchStatusTax">
<input type="hidden" name="selvalue" value="<?=$selvalue?>">
  <tr align=center>
    <td height="23" class="t_name">���¼���</td>
    <td class="t_value">
    <select name="tax_pub" style="width:90">
	    <option value="N">�̽���</option>
	    <option value="Y">����</option>
    </select>
    </td>
  </tr>
</table>
<br>
<table align="center">
  <tr>
    <td>
    <input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
    <img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();">
    </td>
  </tr>
</form>
</table>

</td>
</tr>
</table>
</body>
</html>