<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?
if($mode != "copy"){
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>��ǰ����</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="javascript">
<!--
function inputCheck(frm){

	if(!confirm("��ǰ�� �����Ͻðڽ��ϱ�?")){
		return false;
	} else {
		frm.mode.value = "copy";
	}
}

function catChange(form, idx){
   if(idx == "1"){
      form.dep2_code.options[0].selected = true;
      form.dep3_code.options[0].selected = true;
   }else if(idx == "2"){
      form.dep3_code.options[0].selected = true;
   }
   	form.mode.value = "";
   	form.submit();
}

-->
</script>
<body>
<table align="center" width="100%" border="0" cellspacing="10" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="tit_sub"><img src="../image/ics_tit.gif"> ��ǰ����</td>
        </tr>
      </table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<form name="frm" action="<?=$PHP_SELF?>" method="post" onSubmit="return inputCheck(this)">
			<input type="hidden" name="mode" value="">
			<input type="hidden" name="selvalue" value="<?=$selvalue?>">
			  <tr>
			    <td>
			      <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
			        <tr>
			          <td width="40%" align="center" class="t_name">������ ��ǰ�з�</td>
			          <td width="60%" class="t_value">

			          	<select name="dep_code" onChange="catChange(this.form,'1');">
			            <option value=''>:: ��з� ::
			            <?
			            $sql = "select substring(catcode,1,2) as catcode, catname from wiz_category where depthno = 1 order by priorno01 asc";
			            $result = mysql_query($sql) or error(mysql_error());
			            while($row = mysql_fetch_object($result)){
			               if($row->catcode == $dep_code)
			                  echo "<option value='$row->catcode' selected>$row->catname";
			               else
			                  echo "<option value='$row->catcode'>$row->catname";
			            }
			            ?>
			            </select>
			          	<select name="dep2_code" onChange="catChange(this.form,'2');" class="select">
			            <option value=''> :: �ߺз� ::
			            <?
			            if($dep_code != ''){
			               $sql = "select substring(catcode,3,2) as catcode, catname from wiz_category where depthno = 2 and catcode like '$dep_code%' order by priorno02 asc";
			               $result = mysql_query($sql) or error(mysql_error());
			               while($row = mysql_fetch_object($result)){
			                  if($row->catcode == $dep2_code)
			                     echo "<option value='$row->catcode' selected>$row->catname";
			                  else
			                     echo "<option value='$row->catcode'>$row->catname";
			               }
			            }
			            ?>
			            </select>
			            <select name="dep3_code" onChange="catChange(this.form,'3');" class="select">
			            <option value=''> :: �Һз� ::
			            <?
			            if($dep_code != '' && $dep2_code != ''){
			               $sql = "select substring(catcode,5,2) as catcode, catname from wiz_category where depthno = 3 and catcode like '$dep_code$dep2_code%' order by  priorno03 asc";
			               $result = mysql_query($sql) or error(mysql_error());
			               while($row = mysql_fetch_object($result)){
			                  if($row->catcode == $dep3_code)
			                     echo "<option value='$row->catcode' selected>$row->catname";
			                  else
			                     echo "<option value='$row->catcode'>$row->catname";
			               }
			            }
			            ?>
			            </select>&nbsp;

			          </td>
			        </tr>
			      </table>
			    </td>
			  </tr>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td align="center" style="padding:7px">
						<input type="submit" value=" ��ǰ���� " class="btn_m">
						<input type="button" value=" �ݱ� " class="btn_m" onClick="self.close();">
					</td>
				</tr>
			</form>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
<?
}else{

	$upfile_path = "../../data/prdimg";

	$selarr = explode("|",$selvalue);

	for($ii=count($selarr); $ii>=0; $ii--){

		if($selarr[$ii]!=""){

			$prdcode = $selarr[$ii];

			// ������ǰ ����
			$sql = "select * from wiz_product where prdcode='$prdcode'";
			$result = mysql_query($sql) or error(mysql_error());
			$prd_info = mysql_fetch_object($result);


			// ��ǰ�ѹ� �����
			$sql = "select max(prdcode) as prdcode from wiz_product";
			$result = mysql_query($sql) or error(mysql_error());
			if($row = mysql_fetch_object($result)){

				$datenum = substr($row->prdcode,0,6);
				$prdnum = substr($row->prdcode,6,4);
				$prdnum = substr("000".(++$prdnum),-4);

				if($datenum == date('ymd')) $prdcode = $datenum.$prdnum;
				else $prdcode = date('ymd')."0001";

			}else{
				$prdcode = date('ymd')."0001";
			}

			// ��ǰ�̹���
			$prdimg_path = "../../data/prdimg";
			$prdimg_R_name = $prdcode."_R.".substr($prd_info->prdimg_R,-3);
			$prdimg_L1_name = $prdcode."_L1.".substr($prd_info->prdimg_L1,-3);
			$prdimg_M1_name = $prdcode."_M1.".substr($prd_info->prdimg_M1,-3);
			$prdimg_S1_name = $prdcode."_S1.".substr($prd_info->prdimg_S1,-3);

			if(@file($prdimg_path."/".$prd_info->prdimg_R)) copy($prdimg_path."/".$prd_info->prdimg_R, $prdimg_path."/".$prdimg_R_name);
		  if(@file($prdimg_path."/".$prd_info->prdimg_L1)) copy($prdimg_path."/".$prd_info->prdimg_L1, $prdimg_path."/".$prdimg_L1_name);
		  if(@file($prdimg_path."/".$prd_info->prdimg_M1)) copy($prdimg_path."/".$prd_info->prdimg_M1, $prdimg_path."/".$prdimg_M1_name);
		  if(@file($prdimg_path."/".$prd_info->prdimg_S1)) copy($prdimg_path."/".$prd_info->prdimg_S1, $prdimg_path."/".$prdimg_S1_name);

			$prdimg_L2_name = $prdcode."_L2.".substr($prd_info->prdimg_L2,-3);
			$prdimg_M2_name = $prdcode."_M2.".substr($prd_info->prdimg_M2,-3);
			$prdimg_S2_name = $prdcode."_S2.".substr($prd_info->prdimg_S2,-3);

		  if(@file($prdimg_path."/".$prd_info->prdimg_L2)) copy($prdimg_path."/".$prd_info->prdimg_L2, $prdimg_path."/".$prdimg_L2_name);
		  if(@file($prdimg_path."/".$prd_info->prdimg_M2)) copy($prdimg_path."/".$prd_info->prdimg_M2, $prdimg_path."/".$prdimg_M2_name);
		  if(@file($prdimg_path."/".$prd_info->prdimg_S2)) copy($prdimg_path."/".$prd_info->prdimg_S2, $prdimg_path."/".$prdimg_S2_name);


		  $prdimg_L3_name = $prdcode."_L3.".substr($prd_info->prdimg_L3,-3);
			$prdimg_M3_name = $prdcode."_M3.".substr($prd_info->prdimg_M3,-3);
			$prdimg_S3_name = $prdcode."_S3.".substr($prd_info->prdimg_S3,-3);

		  if(@file($prdimg_path."/".$prd_info->prdimg_L3)) copy($prdimg_path."/".$prd_info->prdimg_L3, $prdimg_path."/".$prdimg_L3_name);
		  if(@file($prdimg_path."/".$prd_info->prdimg_M3)) copy($prdimg_path."/".$prd_info->prdimg_M3, $prdimg_path."/".$prdimg_M3_name);
		  if(@file($prdimg_path."/".$prd_info->prdimg_S3)) copy($prdimg_path."/".$prd_info->prdimg_S3, $prdimg_path."/".$prdimg_S3_name);

		  $prdimg_L4_name = $prdcode."_L4.".substr($prd_info->prdimg_L4,-3);
			$prdimg_M4_name = $prdcode."_M4.".substr($prd_info->prdimg_M4,-3);
			$prdimg_S4_name = $prdcode."_S4.".substr($prd_info->prdimg_S4,-3);

		  if(@file($prdimg_path."/".$prd_info->prdimg_L4)) copy($prdimg_path."/".$prd_info->prdimg_L4, $prdimg_path."/".$prdimg_L4_name);
		  if(@file($prdimg_path."/".$prd_info->prdimg_M4)) copy($prdimg_path."/".$prd_info->prdimg_M4, $prdimg_path."/".$prdimg_M4_name);
		  if(@file($prdimg_path."/".$prd_info->prdimg_S4)) copy($prdimg_path."/".$prd_info->prdimg_S4, $prdimg_path."/".$prdimg_S4_name);

		  $prdimg_L5_name = $prdcode."_L5.".substr($prd_info->prdimg_L5,-3);
			$prdimg_M5_name = $prdcode."_M5.".substr($prd_info->prdimg_M5,-3);
			$prdimg_S5_name = $prdcode."_S5.".substr($prd_info->prdimg_S5,-3);

		  if(@file($prdimg_path."/".$prd_info->prdimg_L5)) copy($prdimg_path."/".$prd_info->prdimg_L5, $prdimg_path."/".$prdimg_L5_name);
		  if(@file($prdimg_path."/".$prd_info->prdimg_M5)) copy($prdimg_path."/".$prd_info->prdimg_M5, $prdimg_path."/".$prdimg_M5_name);
		  if(@file($prdimg_path."/".$prd_info->prdimg_S5)) copy($prdimg_path."/".$prd_info->prdimg_S5, $prdimg_path."/".$prdimg_S5_name);

		  $prd_info->content = addslashes($prd_info->content);

			// ��ǰ���� ����
			$sql = "insert into wiz_product(
							prdcode,prdname,prdcom,origin,showset,stock,savestock,prior,viewcnt,deimgcnt,basketcnt,ordercnt,cancelcnt,comcnt,
							sellprice,conprice,reserve,strprice,new,best,popular,recom,sale,shortage,del_type,del_price,prdicon,prefer,brand,
							info_use,info_name1,info_value1,info_name2,info_value2,info_name3,info_value3,info_name4,info_value4,info_name5,info_value5,info_name6,info_value6,
							opt_use,opttitle,optcode,opttitle2,optcode2,opttitle3,optcode3,opttitle4,optcode4,opttitle5,optcode5,opttitle6,optcode6,opttitle7,optcode7,optvalue,
							prdimg_R,prdimg_L1,prdimg_M1,prdimg_S1,prdimg_L2,prdimg_M2,prdimg_S2,prdimg_L3,prdimg_M3,prdimg_S3,
							prdimg_L4,prdimg_M4,prdimg_S4,prdimg_L5,prdimg_M5,prdimg_S5,searchkey,stortexp,content,wdate,mdate
							)
							values(
							'$prdcode','$prd_info->prdname','$prd_info->prdcom','$prd_info->origin','$prd_info->showset','$prd_info->stock','$prd_info->savestock','$prd_info->prior','0','0', '0', '0', '0', '0',
							'$prd_info->sellprice','$prd_info->conprice','$prd_info->reserve','$prd_info->strprice','$prd_info->new','$prd_info->best','$prd_info->popular','$prd_info->recom','$prd_info->sale','$prd_info->shortage',
							'$prd_info->del_type','$prd_info->del_price','$prd_info->prdicon_list','$prd_info->prefer','$prd_info->brand',
							'$prd_info->info_use','$prd_info->info_name1','$prd_info->info_value1','$prd_info->info_name2','$prd_info->info_value2','$prd_info->info_name3','$prd_info->info_value3','$prd_info->info_name4','$prd_info->info_value4','$prd_info->info_name5','$prd_info->info_value5','$prd_info->info_name6','$prd_info->info_value6',
							'$prd_info->opt_use','$prd_info->opttitle','$prd_info->optcode','$prd_info->opttitle2','$prd_info->optcode2','$prd_info->opttitle3','$prd_info->optcode3','$prd_info->opttitle4','$prd_info->optcode4','$prd_info->opttitle5','$prd_info->optcode5','$prd_info->opttitle6','$prd_info->optcode6','$prd_info->opttitle7','$prd_info->optcode7','$prd_info->optvalue',
							'$prdimg_R_name', '$prdimg_L1_name','$prdimg_M1_name','$prdimg_S1_name','$prdimg_L2_name','$prdimg_M2_name','$prdimg_S2_name',
							'$prdimg_L3_name','$prdimg_M3_name','$prdimg_S3_name','$prdimg_L4_name','$prdimg_M4_name','$prdimg_S4_name','$prdimg_L5_name','$prdimg_M5_name','$prdimg_S5_name',
							'$prd_info->searchkey','$prd_info->stortexp','$prd_info->content',now(),now())";

			mysql_query($sql) or error(mysql_error());

		  // ī�װ� ���� ����
			if(empty($dep2_code)) $dep2_code = "00";
			if(empty($dep3_code)) $dep3_code = "00";

			$catcode = $dep_code.$dep2_code.$dep3_code;

			$sql = "insert into wiz_cprelation(idx,prdcode,catcode) values('', '$prdcode', '$catcode')";
			$result = mysql_query($sql) or error(mysql_error());

		}
	}

	echo "<script>alert('���� �Ǿ����ϴ�.');opener.document.location='prd_list.php?dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code';self.close();</script>";

}
?>