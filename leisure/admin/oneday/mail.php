<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?

$sql = "select * from wiz_dayproduct wp, wiz_daycprelation wd, wiz_daycategory wc where wp.prdcode = wd.prdcode and wc.catcode=wd.catcode and wp.prdcode='$prdcode'";
$result = mysql_query($sql) or die($sql);
$row = mysql_fetch_array($result);

$prdname = $row[prdname];
$catname = $row[catname];
$prddate = substr($row[selldate],0,10) . " ~ " . substr($row[selllastdate],0,10) ;
$conprice = $row[conprice];
$sellprice = $row[sellprice];
$discount_per = $row[discount_per];
$stortexp = $row[stortexp];
?>
<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
	<title>�ڵ��ۼ� ����Ȯ��</title>
	<meta name="generator" content="editplus">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<meta name="description" content="">

<script type="text/javascript">
window.onload=function(){
	var doc = document.getElementById("mainContent").innerHTML;
	var copy = window.clipboardData.setData('Text',doc)
	if(copy){
		alert("���� �ۼ��� ������ HTML�ڵ尡 ����Ǿ����ϴ�.\n\n Ctrl + V �� �ٿ��ֱ� �ϼ���!")
	}
}
</script>
<style>
html,body{margin:0px; padding:0px;}
td {font-size:12px;font-family:"����","����";color:#4a4a4a;line-height:160%} 
table {border-collapse:collapse;}
</style>
</head>
<body>
<!--div id �ȿ� ���ϳ����� ������. div�����Ͻø� �����.-->



<div id="mainContent">
<table width="699" border="0" cellpadding="5" cellspacing="2" bgcolor="3C3C3C">
	<tr>
		<td width="685" align="center" valign="top" bgcolor="#FFFFFF">
			<table  width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td><img src="http://<?=$_SERVER[HTTP_HOST]?>/oneday/image/main_title.gif" width="685" height="73"></td>
				</tr>
			</table> 
			<table width="685" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td><img src="http://<?=$_SERVER[HTTP_HOST]?>/oneday/image/main_title2.gif" width="685" height="41"></td>
				</tr>
			</table>
			<table width="90" height="26" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td></td>
				</tr>
			</table>
			<table width="643" height="205" border="0" cellpadding="0" cellspacing="0" bgcolor="EFEFEF">
				<tr>
					<td align="center">
						<table  width="633" height="195" border="0" cellpadding="0" cellspacing="1" bgcolor="D5D5D5">
							<tr>
								<td align="center" bgcolor="#FFFFFF">
									<table  width="586" height="155" border="0" cellpadding="0" cellspacing="0">
										<tr> 
											<td width="322"><img src="http://<?=$_SERVER[HTTP_HOST]?>/data/prdimg/<?=$row[prdimg_L1]?>" width="298" height="155"></td>
											<td valign="top">
												<table  width="100%" height="70" border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td align="center">
															<?=$row[prdname]?> <br>
															<strong><font color="13A89E">[<?=$catname?>]</font> <?=nl2br($stortexp)?></strong>
														</td>
													</tr>
												</table>
												<table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="EBEBEB">
													<tr>
														<td></td>
													</tr>
												</table>
												<table width="100%" height="33" border="0" cellpadding="0" cellspacing="0">
													<tr> 
														<td width="50%" align="center"><strong>������</strong></td>
														<td width="50%" align="center"><strong><font color="#FF6600">���ΰ�</font></strong></td>
													</tr>
												</table>
												<table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="EBEBEB">
													<tr> 
														<td></td>
													</tr>
												</table>
												<table width="100%" height="33" border="0" cellpadding="0" cellspacing="0">
													<tr> 
														<td width="48%" align="center"><strong><?=number_format($conprice)?>��</strong></td>
														<td width="4%" align="center"><img src="http://<?=$_SERVER[HTTP_HOST]?>/oneday/image/mail_icon.gif" width="9" height="10"></td>
														<td width="48%" align="center"><strong><font color="#FF6600"><?=number_format($sellprice)?>��</font></strong></td>
													</tr>
												</table>
												<table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="EBEBEB">
													<tr> 
														<td></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table width="90" height="12" border="0" cellpadding="0" cellspacing="0">
				<tr> 
					<td></td>
				</tr>
			</table>
			<table width="527" height="112" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center"><a href="http://wizsns.anyhosting.kr/" target="_blank"><img src="http://<?=$_SERVER[HTTP_HOST]?>/oneday/image/mail_button_01.gif" width="146" height="37" border="0"></a></td>
				</tr>
			</table>
			<table width="642" height="56" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td><img src="http://<?=$_SERVER[HTTP_HOST]?>/oneday/image/mail_text_01.gif" width="642" height="56"></td>
				</tr>
			</table>
			<table width="90" height="10" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td></td>
				</tr>
			</table> 
			<table width="643" height="92" border="0" cellpadding="0" cellspacing="0">
				<tr> 
					<td width="104"><img src="http://<?=$_SERVER[HTTP_HOST]?>/oneday/image/mail_logo.gif" width="99" height="53"></td>
					<td width="539">
						<font color="6D6D6D">����ڵ�Ϲ�ȣ : 214-11-31302 ����Ǹž� �Ű��ȣ : ���� 0725ȣ <br>
						����� ��õ�� ���굿 426-5 ����޸����2�� 1105ȣ ������ : 02-2057-3827 FAX : 02-2025-8228 <br>
						�̸��� : help@anywiz.co.kr �����ð� : ���� 09:30-19:00 ����Ϥ������� �޹� <br>
						Copyright 2003-2009 ANYWIZ All right reserved. help@anywiz.co.kr</font>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</div>




<?/*?>







<table height="100%" cellspacing=0 cellpadding=0 width=642 align=center border=0>
	<tbody>
		<tr>
			<td valign=top>
				<table cellspacing=0 cellpadding=0 border=0>
					<tbody>
						<tr>
							<td><img src="http://u50i50.com/images/mailimg/top_06.gif"></td>
						</tr>
						<tr>
							<td background=http://u50i50.com/images/mailimg/bg_line.gif>
								<table cellspacing=0 cellpadding=0 width=642 border=0>
									<tbody>
										<tr>
											<td style="padding-right: 0px; padding-left: 30px; padding-bottom: 10px; padding-top: 10px; line-height:24px;">
												��ǰ�� : <span id="prdname"><?=$prdname?></span><br />
												�ǸűⰣ : <span id="prddate"><?=$prddate?></span><br />
												���� : <span id="conprice"><?=number_format($conprice)?>��</span><br />
												������ : <span id="discount_per"><?=$discount_per?>%</span><br />
												�ǸŰ� : <span id="sellprice"><?=number_format($sellprice)?>��</span>
											</td>
											<td valign=bottom align=right width=190><img src="http://u50i50.com/images/mailimg/img_06.gif"></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td><img src="http://u50i50.com/images/mailimg/bottom.gif"></td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
</div>
<?*/?>
</body>
</html>
