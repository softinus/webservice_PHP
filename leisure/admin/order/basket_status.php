<html>
<head>
<title>:: �ֹ����� �ϰ�ó�� ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" cellpadding=0 cellspacing=10><tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> ��һ��� �ϰ�ó��</td>
  </tr>
</table>
<table width="100%" cellpadding=2 cellspacing=1 class="t_style">
<form action="order_save.php">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="batchStatusBasket">
<input type="hidden" name="selbasket" value="<?=$selbasket?>">
  <tr align=center>
    <td height="23" class="t_name"><b>���¼���</b></td>
    <td class="t_value">
    <select name="chg_status" style="width:90">
	    <option value="CA">��ҽ�û</option>
	    <option value="CI">ó����</option>
	    <option value="CC">��ҿϷ�</option>
    </select>
    </td>
  </tr>
</table>
<br>
<table align="center">
  <tr>
    <td>
    <input type="image" src="../image/btn_confirm_l.gif">
    <img src="../image/btn_close_l.gif" onClick="self.close();" style="cursor:pointer">
    </td>
  </tr>
</form>
</table>
</td></tr></table>
</body>