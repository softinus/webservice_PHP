<?
include "../inc/common.inc"; 			// DB���ؼ�, ������ �ľ�

$zipfile = file("$DOCUMENT_ROOT/wiz_zipcode.db");
$search_count = 0;

if($address) {
	while($zipcode = each($zipfile)) {
		if(strstr(substr($zipcode[1], 9, 512), $address)) {
			$list[$search_count][zip1] = substr($zipcode[1],0,3);
			$list[$search_count][zip2] = substr($zipcode[1],4,3);
			$addr = explode(" ", substr($zipcode[1],8));

			if($addr[sizeof($addr)-1]) {
				$list[$search_count][addr] = str_replace($addr[sizeof($addr)-1], "", substr($zipcode[1], 8));
				$list[$search_count][bunji] = trim($addr[sizeof($addr)-1]);
			} else {
				$list[$search_count][addr] = substr($zipcode[1], 8);
			}

			$list[$search_count][encode_addr] = urlencode($list[$search_count][addr]);
			$search_count++;
		}
	}
}
?>

<html>
<head>
<title>�����ȣ �˻�</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link rel="stylesheet" type="text/css" href="/wiz_style.css">
<script language="JavaScript">
<!--
function setAddr(zipcode1, zipcode2 , addr){
	opener.frm.<?=$kind?>post.value = zipcode1;
	opener.frm.<?=$kind?>post2.value = zipcode2;
	opener.frm.<?=$kind?>address.value = addr;
	if(opener.frm.<?=$kind?>address2 != null){
		opener.frm.<?=$kind?>address2.focus();
	}
	self.close();
}
//-->
</script>
</head>

<body onLoad="document.frm.address.focus();" style="background-color:#F6F6F6">

<table border=0 cellpadding=0 cellspacing=0 width=350 height=300>
	<tr><td height=55><img src="/images/zip_01.gif"></td></tr>
	<tr>
		<td bgcolor=#ffffff valign=top align=center style="padding:0 0 20 0">

		<table border=0 cellpadding=0 cellspacing=0  width=90%>
		<form name="frm" method="post" action="<?=$PHP_SELF?>">
		<input type="hidden" name="kind" value="<?=$kind?>">
			<tr><td colspan=3 align=center style="padding:15 5 5 5"> ã���� �ϴ� �ּ��� ��(��/��/��)�� �Է��ϼ���<br>��) ���ﵿ, ����3��, ���̸�</td></tr>
			<tr><td colspan=3 height=3 bgcolor=#f0f0f0></td></tr>
			<tr><td colspan=3 height=1 bgcolor=#dadada></td></tr>
			<tr height=50>
				<td><img src="/images/zip_02.gif"></td>
				<td><input type="text" name="address" class="input"></td>
				<td><input type="image" src="/images/but_find_zip.gif" border=0></a></td>
			</tr>
			<tr><td colspan=3 height=1 bgcolor=#dadada></td></tr>
			<tr><td colspan=3 height=3 bgcolor=#f0f0f0></td></tr>
			<tr><td colspan=3 height=10 bgcolor=#ffffff></td></tr>
		</form>
		</table>

		<?
		if( $address != ""){
		?>
		<table border=0 cellpadding=0 cellspacing=0  width=90%>
		  <tr>
		    <td colspan=3 style="padding:5" bgcolor=#F5F5F5 align=center>
		    	
			   <table border=0 cellpadding=2 cellspacing=0 width=100% bgcolor=#ffffff>
					<?
					for ($i=0; $i<count($list); $i++) {
					
						$post1 		= $list[$i][zip1];
						$post2 		= $list[$i][zip2];
						$set_addr = $list[$i][addr];
						$addr	= $list[$i][addr]." ".$list[$i][bunji];

						if($i%2 == 0) $bgcolor="#ffffff";
						else $bgcolor = "#ECFFFB";
					?>
					<tr><td colspan=2 height=1 bgcolor=#f0f0f0></td></tr>
					<tr>
					  <td width=70><font color=#2088CD><?=$post1?>-<?=$post2?></font></td>
					  <td><a href="" onClick="setAddr( '<? echo $post1 ?>' , '<? echo $post2 ?>' , '<? echo $set_addr ?>' )"><? echo $addr; ?></a></td>
					</tr>
					<?
					}
					?>
					<? if($address != "" && $search_count <= 0){ ?>
					<tr><td colspan=2 height=1 bgcolor=#f0f0f0></td></tr>
					<tr>
					  <td colspan="2" align="center">- ã���ô� �ּҰ� �����ϴ�. �ٽ� �Է��ϼ���.</td>
					</tr>
					<? } ?>

			   </table>
		    </td>
		  </tr>
		</table>
		<?
		}
		?>

		</td>
	</tr>
	<tr><td bgcolor=#E0E0E0 height=1></td></tr>
	<tr><td height=30 align=right style="padding:0 30 0 0"><a href="javascript:self.close();"><img src="/images/id_check_close.gif" border=0></a></td></tr>
</table>

</body>
</html>