<html>
<head>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body topmargin=0 leftmargin=0>
<?php
switch($payment) {
	case "A" : $payment = "������"; break;
	case "A" : $payment = "������"; break;
	default : $payment = "��Ÿ"; break;
}
?>
<table border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td><img src="../image/ic_tit.gif"></td>
    <td valign="bottom" class="tit">��������</td>
  </tr>
</table>

<br>
<table width="100%" border=0 cellpadding=0 cellspacing=1 class="t_style">
  <tr align=center height=30>
    <td width="25%" class="t_name">�����</td>
    <td width="25%" class="t_name">�ܾ�</td>
    <td width="25%" class="t_name">�Ǵ���</td>
    <td width="25%" class="t_name">����SMS�Ǽ�</td>
  </tr>
  <tr align=center height=30>
    <td class="t_value"><?=$payment?></td>
    <td class="t_value"><?=number_format($coin)?>��</td>
    <td class="t_value"><?=number_format($gpay)?>��</td>
    <td class="t_value"><? if($gpay > 0) echo number_format($coin/$gpay); else echo "0"; ?>��</td>
  </tr>
</table>
</body>
</html>