<?
include "../inc/common.inc"; 				// DB���ؼ�, ������ �ľ�
include "../inc/util.inc"; 		   		// ��ƿ ���̺귯��
include "../inc/shop_info.inc"; 		// ���� ����
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>������ ���</title>
<style>
<!--
body {
SCROLLBAR-FACE-COLOR: #eeeeee; SCROLLBAR-HIGHLIGHT-COLOR: #ffffff; SCROLLBAR-SHADOW-COLOR: #b4b4b4; SCROLLBAR-3DLIGHT-COLOR: #b4b4b4; SCROLLBAR-ARROW-COLOR: #333333; SCROLLBAR-DARKSHADOW-COLOR: #ffffff; SCROLLBAR-BASE-COLOR: #eeeeee;
margin-left: 0px;
margin-top: 0px;
margin-right: 0px;
margin-bottom: 0px;
}
td {
	font-family: "����", "����ü";
	font-size: 9pt;
	color: #000000;
	line-height: 17px;
	word-break:break-all;
}
input
{
	color:black;
	font-size:15px;
	font-weight:bold;
}
-->
</style>
<SCRIPT LANGUAGE="JavaScript">
<!--
	function Go_Print(obj)
	{
		if(document.myform.name.value == "")
		{
			alert("��ȣ�� �Է��ϼ���");
			document.myform.name.focus();
			return;
		}
		obj.style.display='none';
		window.print();
	}
//-->
</SCRIPT>
</head>
 <div id="Layer1" style="position:absolute; left:589px; top:74px; width:57px; height:57px; z-index:1">

 </div>
<body leftmargin="0" topmargin="0">
<TABLE width="650" cellpadding=0 cellspacing=0 border=0>
<form name='myform'>
	<TR>
		<TD>
			<TABLE width="100%" cellpadding=0 cellspacing=0 style="border:1px solid black">
			<TR>
				<TD>
					<TABLE width="100%" cellpadding=0 cellspacing=0>
					<TR height="50">
						<TD align=center><font size="5" color=black style="text-decoration:underline;line-height:300%"><b>�� �� ��</b></font></TD>
					</TR>
					<TR>
						<TD>
							<TABLE width="100%" cellpadding=0 cellspacing=0 >
							<TR align="center">
								<TD align="left" style="padding:5;line-height:200%"><input type='text' name='pDate' style='font-size:9pt;border:0' value="<?=date('Y')?>�� <?=date('m')?>�� <?=date('d')?>��" maxlength=15><br>
								<input type="text" name='name' style="border:0;border-bottom:1px solid black" value="">����<br>
								�Ʒ��� ���� ���� �մϴ�.
								</TD>
								<TD width="360">
									<TABLE width="350" border=0 cellpadding=0 cellspacing=0  >
									<TR align="center" bgcolor="#FFFFFF">
										<TD >
											<table width="100%" height="124" border="1" bordercolor="black" cellspacing="0" cellpadding="0">
												<tr>
													<td rowspan="5" width="20" align="center" bgcolor="#EEEEEE"> �� �� �� </td>
													<td align="center" width="70">��Ϲ�ȣ</td>
													<td colspan="3" align="center"><?=$shop_info->com_num?></td>
												</tr>
												<tr>
													<td align="center">��ȣ</td>
													<td align="center"><?=$shop_info->com_name?></td>
													<td align="center">����</td>
													<td align="center">
														<?=$shop_info->com_owner?>
														<? if(is_file("../data/config/com_seal.gif")){ ?> 
														<img src='/data/config/com_seal.gif' align="absmiddle"> 
														<? } ?>
													</td>
												</tr>
												<tr>
													<td align="center">������ּ�</td>
													<td colspan="3" align="center"><?=$shop_info->com_address?></td>
												</tr>
												<tr>
													<td align="center">����</td>
													<td align="center"><?=$shop_info->com_kind?></td>
													<td align="center">����</td>
													<td align="center"><?=$shop_info->com_class?></td>
												</tr>
												<tr>
													<td align="center">��ȭ��ȣ</td>
													<td align="center"><?=$shop_info->com_tel?></td>
													<td align="center">FAX</td>
													<td align="center"><?=$shop_info->com_fax?></td>
												</tr>
											</table>
										</TD>
									</TR>
									</TABLE>
								</TD>
							</TR>
							</TABLE>
						</TD>
					</TR>
					<TR height=10>
						<TD></TD>
					</TR>
					</TABLE>
				</TD>
			</TR>
			<TR height=1 bgcolor=black><TD></TD></TR>
			<TR height=30>
				<TD>&nbsp;��<input type="text" Id="Sum" style="border:0;border-bottom:1px solid black;text-align:right" readonly> (VAT ����)</TD>
			</TR>
			<TR>
				<TD>
					<TABLE width="100%" cellpadding=0  cellspacing=0 border=1 bordercolor="black">
					<TR align=center bgcolor="#EEEEEE" height=30>
						<TD width=5%>ǰ ��</TD>
						<TD width=55%>ǰ ��</TD>
						<TD width=10%>�� ��</TD>
						<TD width=15%>�� �� (VAT ����)</TD>
						<TD width=15%>�� ��</TD>
					</TR>
<?php
$basket_exist = false;
$no = 0;
$sql = "SELECT * FROM wiz_basket_tmp WHERE uniq_id='".$_COOKIE["uniq_id"]."'";
$btresult = mysql_query($sql) or error(mysql_error());
while($brow = mysql_fetch_array($btresult)){
	$basket_exist = true;
	$optcode = "";
	$prdimg = "";
	$prd_price += ($brow[prdprice] * $brow[amount]);

	if($brow[opttitle5] != '') $optcode = $brow[opttitle5]." : ".$brow[optcode5].", ";
	if($brow[opttitle6] != '') $optcode .= $brow[opttitle6]." : ".$brow[optcode6].", ";
	if($brow[opttitle7] != '') $optcode .= $brow[opttitle7]." : ".$brow[optcode7].", ";
	
	if($brow[opttitle3] != '') $optcode .= $brow[opttitle3]." : ".$brow[optcode3].", ";
	if($brow[opttitle4] != '') $optcode .= $brow[opttitle4]." : ".$brow[optcode4].", ";
	
	if($brow[opttitle] != '') $optcode .= $brow[opttitle];
	if($brow[opttitle2] != '') $optcode .= "/".$brow[opttitle2];
	if($brow[opttitle] != '') $optcode .= " : ".$brow[optcode];
?>
					<TR align=center bgcolor=white height="25">
							<TD><?=$no+1?></TD>
							<TD align=left style="padding:2px"><?=$brow[prdname]?> <?=$optcode?></TD>
							<TD><?=number_format($brow[amount])?></TD>
							<TD align=right><?=number_format($brow[prdprice])?>��</TD>
							<TD align=right><?=number_format($brow[prdprice]*$brow[amount])?>��</TD>
				  </TR>
<?php	
	$no++;
}

for($ii = $no; $ii < 20; $ii++) {
?>
				  <TR align=center bgcolor=white height='25'><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>					
<?php
}
?>
					<TR align=center bgcolor=white height=30>
						<TD bgcolor="#EEEEEE">��</TD>
						<TD colspan=3>&nbsp;</TD>
						<TD align=right><?=number_format($prd_price)?>��</TD>
					</TR>
					</TABLE>
				</TD>
			</TR>
			</TABLE>
		</TD>
	</TR>
	<TR height="10">
		<TD></TD>
	</TR>
	<TR>
		<TD>
		<TABLE width="100%" cellpadding=0 cellspacing=0  border=1 bordercolor=black>
		<TR align="center">
			<TD width="100" bgcolor="#EEEEEE">��<p>��</TD>
			<TD align="left" style="padding:5px"><?=str_replace("\n", "<br>", $shop_info->estimate_bigo)?></TD>
		</TR>
		</TABLE>
		</TD>
	</TR>
	<TR height="30">
		<TD align=center><Input type="button" value="������ �μ�" onclick="Go_Print(this);"></TD>
	</TR>
	</TABLE>
	</form>
</body>
</html>
<SCRIPT LANGUAGE="JavaScript">
<!--
	document.all.Sum.value = "<?=number_format($prd_price)?>";
//-->
</SCRIPT>
