<?
include "../../inc/common.inc";
include "../../inc/util.inc";

if($excelup != "ok"){
?>
<html>
<head>
<title>:: ��ǰ���� ���ε� ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script Language="Javascript">
<!--

function inputCheck(frm) {
	if(frm.upfile.value == "") {
		alert("������ ÷�����ּ���.");
		frm.upfile.focus();
		return false;
	}
}

//-->
</script>
</head>

<body leftmargin="5" topmargin="5">
<table><tr><td height="4"></td></table>
<table width="98%" align="center" border="0" cellpadding="3" cellspacing="6" class="t_style">
<form name="frm" action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this)">
<input type="hidden" name="excelup" value="ok">

  <tr>
    <td bgcolor="ffffff">
    <table><tr><td></td></tr></table>
     <table cellspacing="2" cellpadding="0" border="0">
       <tr>
        <td width="80"><font color="2369C9"><b>����÷��</b></font></td>
        <td>
        	<input type="file" name="upfile" class="input"> <a href="prd_sample.xls"><b><font color="black">[���ôٿ�ε�]</font></b></a>
        </td>
		</tr>
       <tr>
        <td valign="top"><font color="2369C9"><b></b></font></td>
        <td>
        	<font color="red">�ٿ�ε� ���� ���� ���Ŀ� ���缭 �Է��Ͻñ� �ٶ��ϴ�.</font>
        </td>
		</tr>
		<tr><td height="6"></td></tr>
      <tr>
        <td><font color="2369C9"><b>�̹������</b></font></td>
        <td>
        		http://<?=$_SERVER['HTTP_HOST']?>/<input type="text" name="img_path" class="input">/��ǰ�̹���.gif <br>
        	</td>
		</tr>
      <tr>
        <td><font color="2369C9"><b></b></font></td>
        <td>
        		<font color="red">��ǰ�̹����� �ִ� ��� ������ ������ ���ε� �� �� �ش� ��θ� �Է����ּ���.</font>
        	</td>
		</tr>
    </table>
   </td>
 </tr>
</table>
<table align="center">
  <tr><td height="5"></td></tr>
  <tr>
    <td>
    	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp;
    	<img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();">
    </td>
  </tr>
</form>
</table>

<br>
<table width="98%" border="0" cellspacing="0" cellpadding="0" bgcolor="9d9d9d" align="center">
<tr>
  <td width="5" height="5"><img src="../image/check_left_top.gif"></td>
  <td width="100%"></td>
  <td width="5" height="5"><img src="../image/check_right_top.gif"></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td><img src="../image/check_tit.gif" width="75" height="19" /></td>
    </tr>
    <tr>
      <td class="chk_alt">
    	1. <a href="prd_sample.xls"><b><font color="black">[���ôٿ�ε�]</font></b></a>�� Ŭ���Ͽ� ���������� �ٿ�ε��մϴ�.<br>
    	2. �� �׸� ���� �Է��մϴ�.<br>
    	&nbsp;&nbsp;- ��ǰ�׷� : �ش��ϴ� ��ǰ�׷��� "/"�� �����Ͽ� �Է��մϴ�. <br>&nbsp;&nbsp;&nbsp;&nbsp;��) /�Ż�ǰ/�α��ǰ/��õ��ǰ/���ϻ�ǰ<br>
    	&nbsp;&nbsp;- ��ǰ���� : ������ = Y, �������� = N<br>
    	&nbsp;&nbsp;- ǰ������ : ǰ����ǰ = Y, ������ = N, ���� = S<br>
    	&nbsp;&nbsp;- ��ǰ����1~5 : ���, ��ǰ��, Ȯ���̹����� "/"�� �����Ͽ� �Է��մϴ�.<br>&nbsp;&nbsp;&nbsp;&nbsp;��) /test1.jpg/test2.jpg/test3.jpg<br>
    	3. ���� > �ٸ��̸��������� > ���������� <b><font color="black">"�ؽ�Ʈ (������ �и�) (*.txt)"</font></b>�� �����մϴ�.<br>
    	4. FTP�� �����Ͽ� ��ǰ�̹����� ���ε��մϴ�.<br>
    	<u>5. �귣�带 �Է��� ��� �귣��������� ������ �귣������� �귣�带 ������ �� ���ε��ϼ���.<br></u>
    	<u>6. ��ǰī�װ��� �Է��� ��� ��ǰ�з��������� ������ �з������� ��ǰ�з��� ������ �� ���ε��ϼ���.<br></u>
    	7. ����÷�θ� �Ͻð� FTP�� ���ε��� �̹�����θ� �Է��ϰ� Ȯ�ι�ư�� �����ϴ�.<br>
      </td>
    </tr>
  </table></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td width="5" height="5"><img src="../image/check_left_bottom.gif" width="5" height="5" /></td>
  <td></td>
  <td width="5" height="5"><img src="../image/check_right_bottom.gif" width="5" height="5" /></td>
</tr>
</table>

</body>
</html>
<?
}else{

	$upfile_path = $_SERVER['DOCUMENT_ROOT']."/data/prdimg";		// �����̹��� ���ε� ���
	$img_path = $_SERVER['DOCUMENT_ROOT']."/".$img_path;			// ���ε�� �����̹��� ���

	//��ǰ��	��ǰī�װ�	��ǰ�׷�	�귣��	������	������	��ǰ����	ǰ������	���	�ǸŰ�	����	������	��ǰ��ǥ����	��ǰ����1	��ǰ����2	��ǰ����3	��ǰ����4	��ǰ����5	�������ּ�	�󼼼���

	if($upfile[size] > 0){
		copy($upfile[tmp_name], $upfile_path."/tmp_prd.xls");
		chmod($upfile_path."/tmp_prd.xls", 0606);

		$prdinfo = file($upfile_path."/tmp_prd.xls");

		for($ii = 1; $ii < count($prdinfo); $ii++) {

			$product = explode("\t", $prdinfo[$ii]);

			// ��ǰ�ѹ� �����, �켱����
			$sql = "select max(prdcode) as prdcode, max(prior) as prior from wiz_product";
			$result = mysql_query($sql) or error(mysql_error());
			if($row = mysql_fetch_object($result)){

				$datenum = substr($row->prdcode,0,6);
				$prdnum = substr($row->prdcode,6,4);
				$prdnum = substr("000".(++$prdnum),-4);

				if($datenum == date('ymd')) $prdcode = $datenum.$prdnum;
				else $prdcode = date('ymd')."0001";
				
				$prior = $row->prior;

			}else{
				$prdcode = date('ymd')."0001";
				$prior = date(ymdHis);
			}
			
			// $prior
			
			$prdname = trim(str_replace("\"", "", $product[0]));	// ��ǰ��
			
			// ��ǰ�׷�
			$new = ""; $popular = ""; $recom = ""; $sale = "";
			$prd_grp = explode("/", $product[2]);
			for($jj = 0; $jj < count($prd_grp); $jj++) {
				if(!strcmp($prd_grp[$jj], "�Ż�ǰ")) $new = "Y";
				if(!strcmp($prd_grp[$jj], "�α��ǰ")) $popular = "Y";
				if(!strcmp($prd_grp[$jj], "��õ��ǰ")) $recom = "Y";
				if(!strcmp($prd_grp[$jj], "���ϻ�ǰ")) $sale = "Y";
			}

			// �귣��
			$sql = "select idx from wiz_brand where brdname = '".$product[3]."'";
			$result = mysql_query($sql) or error(mysql_error());
			$row = mysql_fetch_array($result);
			$brand = $row[idx];

			$prdcom = $product[4];		// ������
			$origin = $product[5];			// ������
			$showset = $product[6];		// ��ǰ����
			$shortage = $product[7];		// ǰ������
			$stock = $product[8];			// ���
			$sellprice = $product[9];		// �ǸŰ�
			$conprice = $product[10];	// ����
			$reserve = $product[11];		// ������

			// ��ǰ�̹���
			$prdimg_path = "../../data/prdimg";
			
			$prdimg_R = $product[12];
			$prdimg_R_name = $prdcode."_R.".substr($product[12],-3);
			
			if(!strcmp(substr($product[13], 0, 1), "/")) $product[13] = substr($product[13], 1, strlen($product[13]));
			if(!strcmp(substr($product[14], 0, 1), "/")) $product[14] = substr($product[14], 1, strlen($product[14]));
			if(!strcmp(substr($product[15], 0, 1), "/")) $product[15] = substr($product[15], 1, strlen($product[15]));
			if(!strcmp(substr($product[16], 0, 1), "/")) $product[16] = substr($product[16], 1, strlen($product[16]));
			if(!strcmp(substr($product[17], 0, 1), "/")) $product[17] = substr($product[17], 1, strlen($product[17]));

			list($prdimg_L1, $prdimg_M1, $prdimg_S1) = explode("/", $product[13]);
			list($prdimg_L2, $prdimg_M2, $prdimg_S2) = explode("/", $product[14]);
			list($prdimg_L3, $prdimg_M3, $prdimg_S3) = explode("/", $product[15]);
			list($prdimg_L4, $prdimg_M4, $prdimg_S4) = explode("/", $product[16]);
			list($prdimg_L5, $prdimg_M5, $prdimg_S5) = explode("/", $product[17]);

			$prdimg_L1_name = $prdcode."_L1.".substr($prdimg_L1,-3);
			$prdimg_M1_name = $prdcode."_M1.".substr($prdimg_M1,-3);
			$prdimg_S1_name = $prdcode."_S1.".substr($prdimg_S1,-3);

			if(@file($img_path."/".$prdimg_R)) copy($img_path."/".$prdimg_R, $upfile_path."/".$prdimg_R_name);
			if(@file($img_path."/".$prdimg_L1)) copy($img_path."/".$prdimg_L1, $upfile_path."/".$prdimg_L1_name);
			if(@file($img_path."/".$prdimg_M1)) copy($img_path."/".$prdimg_M1, $upfile_path."/".$prdimg_M1_name);
			if(@file($img_path."/".$prdimg_S1)) copy($img_path."/".$prdimg_S1, $upfile_path."/".$prdimg_S1_name);

			$prdimg_L2_name = $prdcode."_L2.".substr($prdimg_L2,-3);
			$prdimg_M2_name = $prdcode."_M2.".substr($prdimg_M2,-3);
			$prdimg_S2_name = $prdcode."_S2.".substr($prdimg_S2,-3);

			if(@file($img_path."/".$prdimg_L2)) copy($img_path."/".$prdimg_L2, $upfile_path."/".$prdimg_L2_name);
			if(@file($img_path."/".$prdimg_M2)) copy($img_path."/".$prdimg_M2, $upfile_path."/".$prdimg_M2_name);
			if(@file($img_path."/".$prdimg_S2)) copy($img_path."/".$prdimg_S2, $upfile_path."/".$prdimg_S2_name);

			$prdimg_L3_name = $prdcode."_L3.".substr($prdimg_L3,-3);
			$prdimg_M3_name = $prdcode."_M3.".substr($prdimg_M3,-3);
			$prdimg_S3_name = $prdcode."_S3.".substr($prdimg_S3,-3);

			if(@file($img_path."/".$prdimg_L3)) copy($img_path."/".$prdimg_L3, $upfile_path."/".$prdimg_L3_name);
			if(@file($img_path."/".$prdimg_M3)) copy($img_path."/".$prdimg_M3, $upfile_path."/".$prdimg_M3_name);
			if(@file($img_path."/".$prdimg_S3)) copy($img_path."/".$prdimg_S3, $upfile_path."/".$prdimg_S3_name);

			$prdimg_L4_name = $prdcode."_L4.".substr($prdimg_L4,-3);
			$prdimg_M4_name = $prdcode."_M4.".substr($prdimg_M4,-3);
			$prdimg_S4_name = $prdcode."_S4.".substr($prdimg_S4,-3);

			if(@file($img_path."/".$prdimg_L4)) copy($img_path."/".$prdimg_L4, $upfile_path."/".$prdimg_L4_name);
			if(@file($img_path."/".$prdimg_M4)) copy($img_path."/".$prdimg_M4, $upfile_path."/".$prdimg_M4_name);
			if(@file($img_path."/".$prdimg_S4)) copy($img_path."/".$prdimg_S4, $upfile_path."/".$prdimg_S4_name);

			$prdimg_L5_name = $prdcode."_L5.".substr($prdimg_L5,-3);
			$prdimg_M5_name = $prdcode."_M5.".substr($prdimg_M5,-3);
			$prdimg_S5_name = $prdcode."_S5.".substr($prdimg_S5,-3);

			if(@file($img_path."/".$prdimg_L5)) copy($img_path."/".$prdimg_L5, $upfile_path."/".$prdimg_L5_name);
			if(@file($img_path."/".$prdimg_M5)) copy($img_path."/".$prdimg_M5, $upfile_path."/".$prdimg_M5_name);
			if(@file($img_path."/".$prdimg_S5)) copy($img_path."/".$prdimg_S5, $upfile_path."/".$prdimg_S5_name);

			$stortexp = addslashes($product[18]);		// �������ּ�
			$content = addslashes($product[19]);		// �󼼼���

			$sql = "insert into wiz_product(prdcode, prdname, new, best, popular, recom, sale, brand, prdcom, origin, showset,
						shortage, stock, prior, sellprice, conprice, reserve,prdimg_R,prdimg_L1,prdimg_M1,prdimg_S1,prdimg_L2,prdimg_M2,prdimg_S2,
						prdimg_L3,prdimg_M3,prdimg_S3,prdimg_L4,prdimg_M4,prdimg_S4,prdimg_L5,prdimg_M5,prdimg_S5,stortexp,content,wdate)
						values('".$prdcode."','".$prdname."','".$new."','".$best."','".$popular."','".$recom."','".$sale."','".$brand."','".$prdcom."','".$origin."','".$showset."',
						'".$shortage."','".$stock."','".$prior."','".$sellprice."','".$conprice."','".$reserve."','".$prdimg_R_name."',
						'".$prdimg_L1_name."','".$prdimg_M1_name."','".$prdimg_S1_name."','".$prdimg_L2_name."','".$prdimg_M2_name."','".$prdimg_S2_name."',
						'".$prdimg_L3_name."','".$prdimg_M3_name."','".$prdimg_S3_name."','".$prdimg_L4_name."','".$prdimg_M4_name."','".$prdimg_S4_name."',
						'".$prdimg_L5_name."','".$prdimg_M5_name."','".$prdimg_S5_name."','".$stortexp."','".$content."',now())";
			mysql_query($sql) or error("��ǰ���� �Է� �� ������ �߻��Ͽ����ϴ�.");
			
			// ī�װ�
			$sql = "select catcode from wiz_category where catname = '".$product[1]."'";
			$result = mysql_query($sql) or error(mysql_error());
			$row = mysql_fetch_array($result);
			$catcode = $row[catcode];

			$sql = "insert into wiz_cprelation(prdcode, catcode) values('".$prdcode."', '".$catcode."')";
			mysql_query($sql) or error("��ǰ�з� �Է� �� ������ �߻��Ͽ����ϴ�.");

		}

		unlink($upfile_path."/tmp_prd.xls");

	}
	
	echo "<script>alert('�ԷµǾ����ϴ�.');window.opener.document.location.href = window.opener.document.URL;self.close();</script>";

}
?>