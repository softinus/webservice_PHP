<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/oper_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
$param .= "&special=$special&display=$display&searchopt=$searchopt&searchkey=$searchkey&page=$page&shortpage=$shortpage";
//--------------------------------------------------------------------------------------------------

if($shortpage == "Y") $listpage_url = "prd_shortage.php";
else $listpage_url = "prd_list.php";

$imgpath = $DOCUMENT_ROOT."/data/prdimg";

if(empty($mode)) $mode = "insert";




if($mode == "insert"){

	$catcode01 = $dep_code;
   $catcode02 = $dep_code.$dep2_code;
   $catcode03 = $dep_code.$dep2_code.$dep3_code;
   $prd_row->stock = "100";


// ��ǰ������ �����´�.
}else if($mode == "update"){

   $sql = "select wp.*, wc.idx, wc.catcode from wiz_dayproduct wp, wiz_daycprelation wc where wp.prdcode = '$prdcode' and wp.prdcode = wc.prdcode";
   $result = mysql_query($sql) or error(mysql_error());
   $prd_row = mysql_fetch_object($result);

   $relidx = $prd_row->idx;
   $catcode01 = substr($prd_row->catcode,0,2);
   $catcode02 = substr($prd_row->catcode,0,4);
   $catcode03 = substr($prd_row->catcode,0,6);

}

/*
�⺻���� �Ŀ� ������������� �����û���.
*/
if($mode=="update"){
	$selldate = substr($prd_row->selldate,0,10);
	$selllastdate = substr($prd_row->selllastdate,0,10);
	$starttime = $prd_row->starttime;
	$endtime = $prd_row->endtime;
}else{
	$selldate = $currentdate;
	$selllastdate = $currentdate;
	$starttime = "09:00:00";
	$endtime = "20:00:00";
}
// ������ ��뿩�ο� ������� �����´�.
$sql = "select reserve_use, reserve_buy from wiz_operinfo";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$reserve_use = $row->reserve_use;
$reserve_buy = $row->reserve_buy;

?>
<script language="JavaScript" type="text/javascript">
<!--
  var loding = false;
  var prd_class = new Array();
<?
   $no = 0;
   $sql = "select catcode, catname, depthno from wiz_daycategory order by priorno01, priorno02, priorno03 asc";
   $result = mysql_query($sql) or error(mysql_error());
   $total = mysql_num_rows($result);
   while($row = mysql_fetch_object($result)){

      $code01 = substr($row->catcode,0,2);
      $code02 = substr($row->catcode,0,4);
      $code03 = substr($row->catcode,0,6);

      if($row->depthno == 1){ $catcode = $code01; $parent = 0; }
      if($row->depthno == 2){ $catcode = $code02; $parent = $code01; }
      if($row->depthno == 3){ $catcode = $code03; $parent = $code02; }
?>

  prd_class[<?=$no?>] = new Array();
  prd_class[<?=$no?>][0] = "<?=$catcode?>";
  prd_class[<?=$no?>][1] = "<?=$row->catname?>";
  prd_class[<?=$no?>][2] = "<?=$parent?>";
  prd_class[<?=$no?>][3] = "<?=$row->depthno?>";

<?
   	$no++;
   }
?>
var tno = <?=$total?>;
/*
function setClass01(){

  var arrayClass = eval("document.frm.class01");
  var arrayClass1 = eval("document.frm.class02");
  var arrayClass2 = eval("document.frm.class03");
  arrayClass.options[0] = new Option(":: ���� ::","");
  arrayClass1.options[0] = new Option(":: �ߺз� ::","");
  arrayClass2.options[0] = new Option(":: �Һз� ::","");
  for(no=0,sno=1 ; no < tno ; no++){
	  if(prd_class[no][3]=='1'){
		 arrayClass.options[sno] = new Option(prd_class[no][1],prd_class[no][0]);
		 sno++;
	  }
  }
}

function changeClass01(){

  var arrayClass = eval("document.frm.class01");
  var arrayClass1 = eval("document.frm.class02");
  var arrayClass2 = eval("document.frm.class03");

  var selidx = arrayClass.selectedIndex;
  var selvalue = arrayClass.options[selidx].value;

  arrayClass1.options.length=0;
  arrayClass2.options.length=0;
  arrayClass1.options[0] = new Option(":: �ߺз� ::","");
  arrayClass2.options[0] = new Option(":: �Һз� ::","");

  for(no=0,sno=1 ; no < tno ; no++){
	  if(prd_class[no][3]=='2' && prd_class[no][2]==selvalue){
		 arrayClass1.options[sno] = new Option(prd_class[no][1],prd_class[no][0]);
		 sno++;
	  }
  }

}

function changeClass02(){

  var arrayClass1 = eval("document.frm.class02");
  var arrayClass2 = eval("document.frm.class03");

  var selidx = arrayClass1.selectedIndex;
  var selvalue = arrayClass1.options[selidx].value;

  arrayClass2.options.length=0;
  arrayClass2.options[0] = new Option(":: �Һз� ::","");

  for(no=0,sno=1 ; no < tno ; no++){
	  if(prd_class[no][3]=='3' && prd_class[no][2]==selvalue){
		 arrayClass2.options[sno] = new Option(prd_class[no][1],prd_class[no][0]);
		 sno++;
	  }
  }

}
function changeClass03(){
}

// ��ǰī�װ� ����
function setCategory(){

  var arrayClass01 = eval("document.frm.class01");
  var arrayClass02 = eval("document.frm.class02");
  var arrayClass03 = eval("document.frm.class03");
  for(no=1; no < arrayClass01.length; no++){
    if(arrayClass01.options[no].value == '<?=$catcode01?>'){
      arrayClass01.options[no].selected = true;
      changeClass01();
    }
  }
  for(no=1; no < arrayClass02.length; no++){
    if(arrayClass02.options[no].value == '<?=$catcode02?>'){
      arrayClass02.options[no].selected = true;
      changeClass02();
    }
  }

  for(no=1; no < arrayClass03.length; no++){
    if(arrayClass03.options[no].value == '<?=$catcode03?>')
      arrayClass03.options[no].selected = true;
  }
}

*/
function inputCheck(frm){

   if(loding == false){
   	alert("��ǰ������ �������� �ֽ��ϴ�. ����� ��õ� �ϼ���");
   	return false;
   }
	if(frm.prdname.value == ""){
		alert("��ǰ���� �Է��ϼ���");
		frm.prdname.focus();
		return false;
	}
	if(frm.sellprice.value == ""){
		alert("�ǸŰ��� �Է��ϼ���");
		frm.sellprice.focus();
		return false;
	}
/*
	var optvalue = "";
	var length = frm.optcode_tmp.length;
	for(ii = 0; ii < length; ii++){ optvalue += frm.optcode_tmp.options[ii].value+"^^"; }
	frm.optcode.value = optvalue;
*/
}

//�ش� �̹����� �����Ѵ�.
function deleteImage(prdcode, prdimg, imgpath){
	if(imgpath == ""){
		alert("������ �̹����� �����ϴ�.");
		return;
	}else{
	if(confirm("�̹����� �����Ͻðڽ��ϱ�?"))
		document.location = "prd_save.php?mode=delete_image&prdcode="+prdcode+"&prdimg="+prdimg+"&imgpath="+imgpath;
	}
	return;
}

function appendOption(){

	var frm = document.frm;
	var length = frm.optcode_tmp.length;

	var optcode_01 = frm.optcode_01.value;
	var optcode_02 = frm.optcode_02.value;
	var optcode_03 = frm.optcode_03.value;

	if(optcode_01 == ""){
		alert("�ɼ��� �Է��ϼ���.");
		frm.optcode_01.focus();
		return;
	}
	if(optcode_02 == "") optcode_02 = "0";
	if(optcode_03 == "") optcode_03 = "0";

	if(!Check_Num(optcode_02)){
		alert("������ ���ڸ� �����մϴ�.");
		frm.optcode_02.focus();
		return;
	}
	if(!Check_Num(optcode_03)){
		alert("���� ���ڸ� �����մϴ�.");
		frm.optcode_03.focus();
		return;
	}

	var opttxt = optcode_01+" - "+optcode_02+"�� : "+optcode_03+"��";
	var optvalue = optcode_01+"^"+optcode_02+"^"+optcode_03;

	var option1 = new Option(opttxt, optvalue, true);
	frm.optcode_tmp.options[length] = option1;

	frm.optcode_01.value = "";
	frm.optcode_02.value = "";
	frm.optcode_03.value = "";

}

function deleteOption(){

	var frm = document.frm;
	var index = frm.optcode_tmp.selectedIndex;

	if(index >= 0){
		frm.optcode_tmp.options[index] = null;
	}
	frm.optcode_01.value = "";
	frm.optcode_02.value = "";
	frm.optcode_03.value = "";
}

function editOption(){


	var frm = document.frm;
	var length = frm.optcode_tmp.length;
	var idx = document.frm.optcode_tmp.selectedIndex;

	if(idx < 0) return;

	var optcode_01 = frm.optcode_01.value;
	var optcode_02 = frm.optcode_02.value;
	var optcode_03 = frm.optcode_03.value;

	if(optcode_01 == ""){
		alert("�ɼ��� �Է��ϼ���.");
		frm.optcode_01.focus();
		return;
	}
	if(optcode_02 == "") optcode_02 = "0";
	if(optcode_03 == "") optcode_03 = "0";

	if(!Check_Num(optcode_02)){
		alert("������ ���ڸ� �����մϴ�.");
		frm.optcode_02.focus();
		return;
	}
	if(!Check_Num(optcode_03)){
		alert("���� ���ڸ� �����մϴ�.");
		frm.optcode_03.focus();
		return;
	}

	var opttxt = optcode_01+" - "+optcode_02+"�� : "+optcode_03+"��";
	var optvalue = optcode_01+"^"+optcode_02+"^"+optcode_03;

	document.frm.optcode_tmp.options[idx].text = opttxt;
	document.frm.optcode_tmp.options[idx].value = optvalue;

}

function openOption(optno){
	var url = "option_list.php?optno=" + optno;
	window.open(url,"","height=270, width=350, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no");
}

function openPreview(prdcode){
	var url = "preview.php?prdidx="+prdcode;
	window.open(url,"","height=768, width=1124, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no");

	/*
	var url = "option_list.php?optno=" + optno;
	*/
}

function chgOption(){

	var tmp_optcode = document.frm.optlist.value.split("^^");
	var tmp_opttext = document.frm.opttext.value.split("^^");
   var length = document.frm.optcode_tmp.length;
	for(ii=0; ii < (tmp_optcode.length-1); ii++){
		var option1 = new Option(tmp_opttext[ii], tmp_optcode[ii], true);
		document.frm.optcode_tmp.options[length] = option1;

		length++;
	}

	return false;
}

function setOption(){
	var idx = document.frm.optcode_tmp.selectedIndex;
	if(idx >= 0){
		var tmp_optcode = document.frm.optcode_tmp.options[idx].value.split("^");
		frm.optcode_01.value = tmp_optcode[0];
		frm.optcode_02.value = tmp_optcode[1];
		frm.optcode_03.value = tmp_optcode[2];
	}

}


function optUp(){

	var frm = document.frm;
	var sel_idx = frm.optcode_tmp.selectedIndex;

	if(sel_idx > 0){

		chg_idx = sel_idx - 1;

		var sel_txt = frm.optcode_tmp.options[sel_idx].text;
		var sel_val = frm.optcode_tmp.options[sel_idx].value;
		var chg_txt = frm.optcode_tmp.options[chg_idx].text;
		var chg_val = frm.optcode_tmp.options[chg_idx].value;


		frm.optcode_tmp.options[chg_idx].text = sel_txt;
		frm.optcode_tmp.options[chg_idx].value = sel_val;
		frm.optcode_tmp.options[sel_idx].text = chg_txt;
		frm.optcode_tmp.options[sel_idx].value = chg_val;

		frm.optcode_tmp.options[chg_idx].selected = true;

	}



}

function optDown(){

	var frm = document.frm;
	var sel_idx = frm.optcode_tmp.selectedIndex;
	var opt_len = document.frm.optcode_tmp.length;

	if(-1 < sel_idx && sel_idx < (opt_len-1)){

		var chg_idx = sel_idx + 1;

		var sel_txt = frm.optcode_tmp.options[sel_idx].text;
		var sel_val = frm.optcode_tmp.options[sel_idx].value;
		var chg_txt = frm.optcode_tmp.options[chg_idx].text;
		var chg_val = frm.optcode_tmp.options[chg_idx].value;


		frm.optcode_tmp.options[chg_idx].text = sel_txt;
		frm.optcode_tmp.options[chg_idx].value = sel_val;
		frm.optcode_tmp.options[sel_idx].text = chg_txt;
		frm.optcode_tmp.options[sel_idx].value = chg_val;

		frm.optcode_tmp.options[chg_idx].selected = true;

	}

}

function prdlayCheck(){
	<?
/*	if(@file($imgpath."/".$prd_row->prdimg_S2)) echo "document.frm.prdlay_check2.checked = true; prdlay2.style.display='';";
	if(@file($imgpath."/".$prd_row->prdimg_S3)) echo "document.frm.prdlay_check3.checked = true; prdlay3.style.display='';";
	if(@file($imgpath."/".$prd_row->prdimg_S4)) echo "document.frm.prdlay_check4.checked = true; prdlay4.style.display='';";
	if(@file($imgpath."/".$prd_row->prdimg_S5)) echo "document.frm.prdlay_check5.checked = true; prdlay5.style.display='';";*/
	if($prd_row->opttitle != "" || $prd_row->optcode != "") echo "document.frm.opt_use.checked = true; prdopt.style.display='';";
	if($prd_row->opt_use == "Y") echo "document.frm.opt_use.checked = true; prdopt.style.display='';";
	?>
}

// ��ǰ���ݿ� ���� ������ ���� �ۼ�Ʈ������ ������ ����
function setReserve(frm){

   if(frm.reserve != null){
   	var sellprice = frm.sellprice.value;
   	if(!Check_Num(sellprice)){
			alert("�ǸŰ��� �����̾�� �մϴ�.");
			frm.sellprice.value = "";
			frm.sellprice.focus();
		}else{
	      var reserve = "" + sellprice*(<?=$reserve_buy?>/100)
	      reserve = reserve.split('.');
	      frm.reserve.value = reserve[0];
	   }
   }
}

function lodingComplete(){
	loding = true;
}

function prdCategory(){
  var url = "prd_catlist.php?prdcode=<?=$prdcode?>";
  window.open(url, "prdCategory", "height=330, width=600, menubar=no, scrollbars=yes, resizable=yes, toolbar=no, status=no, left=150, top=100");
}

function prdIcon(){
	var url = "prd_icon.php";
	window.open(url, "prdIcon", "height=250, width=450, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=150, top=100");
}

function setImgsize(){
	var url = "prd_imgsize.php";
   window.open(url, "setImgsize", "height=220, width=300, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=150, top=100");
}


function addopt(optid) {

	var frm = document.frm;
	var tbl = document.getElementById('opt');

	if(optid == 'opt1') {

		var row = tbl.insertRow();

		var idx = tbl.rows.length - 2;

		for (i=0;i<tbl.rows[0].cells.length;i++){
			cell = row.insertCell();
			switch (i){
				case 0: cell.innerHTML = "<input type=\"text\" class=\"input\" size=\"10\" name=\"tmp_optcode[]\" required>";break;
				default:
					cell.innerHTML = "<input type=\"text\" name=\"tmp_opt[sellprice][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[reserve][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[stock][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[minno][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[maxno][]\" class=\"input\" size=\"7\">";
					break;
			}
		}

	} else if(optid == 'opt2') {

		for (i=0;i<tbl.rows.length;i++){

			cell = tbl.rows[i].insertCell();
			switch (i){
				case 0: cell.innerHTML = "<input type=\"text\" class=\"input\" style=\"width:100%\" name=\"tmp_optcode2[]\" required>";break;
				default:
					cell.innerHTML = "<input type=\"text\" name=\"tmp_opt[sellprice][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[reserve][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[stock][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[minno][]\" class=\"input\" size=\"7\">";
					cell.innerHTML += ":<input type=\"text\" name=\"tmp_opt[maxno][]\" class=\"input\" size=\"7\">";
					break;
			}
		}

	} else if(optid == 'opt3') {

		var tbl = document.getElementById('opt3');
		var row = tbl.insertRow();

		for (i=0;i<tbl.rows[0].cells.length;i++){
			cell = row.insertCell();
			cell.innerHTML = "&nbsp; &nbsp;�׸� : <input type=\"text\" class=\"input\" name=\"optcode3_opt[]\">";
			cell.innerHTML += " �߰����� : <input type=\"text\" size=\"10\" class=\"input\" name=\"optcode3_pri[]\">";
			cell.innerHTML += " �߰������� : <input type=\"text\" size=\"10\" class=\"input\" name=\"optcode3_res[]\">";
		}

	} else if(optid == 'opt4') {

		var tbl = document.getElementById('opt4');
		var row = tbl.insertRow();

		for (i=0;i<tbl.rows[0].cells.length;i++){
			cell = row.insertCell();
			cell.innerHTML = "&nbsp; &nbsp;�׸� : <input type=\"text\" class=\"input\" name=\"optcode4_opt[]\">";
			cell.innerHTML += " �߰����� : <input type=\"text\" size=\"10\" class=\"input\" name=\"optcode4_pri[]\">";
			cell.innerHTML += " �߰������� : <input type=\"text\" size=\"10\" class=\"input\" name=\"optcode4_res[]\">";
		}

	}
}

function delopt(optid) {
	var tbl = document.getElementById('opt');

	if(optid == 'opt1') {

		if (tbl.rows.length > 2) opt.deleteRow(-1);

	} else if(optid == 'opt2') {

		if (tbl.rows[0].cells.length < 3) return;
		for (i=0;i<tbl.rows.length;i++){
			tbl.rows[i].deleteCell();
		}

	} else if(optid == 'opt3') {
		var tbl = document.getElementById('opt3');
		if (tbl.rows.length > 1) opt3.deleteRow(-1);
	} else if(optid == 'opt4') {
		var tbl = document.getElementById('opt4');
		if (tbl.rows.length > 1) opt4.deleteRow(-1);
	}
}

// ��ǰ������ �߱�ȸ��
function popMycoupon(prdcode){
	var url = "../shop/shop_mycoupon.php?prdcode=" + prdcode;
	window.open(url,"MyCouponList","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

function showLimit(idvle){
	if(idvle == "personallimit"){
		document.getElementById("personallimit").style.display = "inline";
		document.getElementById("stocklimit").style.display = "none";
	}else{
		document.getElementById("personallimit").style.display = "none";
		document.getElementById("stocklimit").style.display = "inline";
	}
}

function onSelectComPany(obj){
	var selno = obj.selectedIndex;
	document.frm.company.value = obj.options[selno].text;
}
function onSelectMD(obj){
	var selno = obj.selectedIndex;
	document.frm.md_name.value = obj.options[selno].text;
}
function onAccount(obj){
	var moneyField = document.getElementById("moneyField");
	var commissionField = document.getElementById("commissionField");

	if(obj.value=="money"){
		moneyField.style.display = "inline";
		commissionField.style.display = "none";
	}else{
		moneyField.style.display = "none";
		commissionField.style.display = "inline";
	}

}
//-->
</script>

<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">��ǰ���</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">��ǰ �������� �����մϴ�.</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub"><img src="../image/ics_tit.gif"> �⺻����</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="prd_save.php?<?=$param?>" method="post" onSubmit="return inputCheck(this)" enctype="multipart/form-data">
	<input type="hidden" name="tmp">
	<input type="hidden" name="mode" value="<?=$mode?>">
	<input type="hidden" name="optlist" value="">
	<input type="hidden" name="opttext" value="">
	<input type="hidden" name="prdcode" value="<?=$prdcode?>">
	<input type="hidden" name="relidx" value="<?=$relidx?>">
	<input type="hidden" name="optcode" value="<?=$optcode?>">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">�����з�</td>
					<td width="85%" class="t_value" colspan="3">

					<?
					$sql = "select * from wiz_daycategory  where depthno='1' order by priorno01 asc, priorno02 asc, priorno03 asc";
					$result = mysql_query($sql)or die($sql);
					while($row = mysql_fetch_array($result)){
					?>
						<input type="radio" name="catcode" value="<?=$row["catcode"]?>" <?if($prd_row->catcode == $row["catcode"]){?>checked<?}?>/> <?=$row["catname"]?>
					<?
					}
					?>

					</td>
				</tr>

				<tr>
					<td class="t_name">��ǰ�� <font color="red">*</font></td>
					<td class="t_value" colspan="3"><input type="text" name="prdname" value="<?=$prd_row->prdname?>" size="60" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">��ǰ����</td>
					<td class="t_value" colspan="3"><input type="radio" name="showset" value="Y" <? if($prd_row->showset == "Y" || empty($prd_row->showset)) echo "checked"; ?>>������&nbsp;<input type="radio" name="showset" value="N" <? if($prd_row->showset == "N") echo "checked"; ?>>��������</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> ���޾�ü MD����</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">���޾�ü <font color="red">*</font></td>
					<td width="35%" class="t_value">
						<select name="company_idx" onchange="onSelectComPany(this)">
							<option value="">:: �����ϼ��� ::</option>
						<?
						$csql = "select * from wiz_company order by wdate desc";
						$cresult = mysql_query($csql)or die($csql);
						while($rs = mysql_fetch_array($cresult)){
						?>
							<option <?if($rs[idx] == $prd_row->company_idx){?>selected<?}?> value="<?=$rs[idx]?>"><?=$rs[company]?></option>
						<?
						}	
						?>
						</select>
						<input type="hidden" name="company" value="<?=$prd_row->company?>" /> <!--�� SELECT�� ���޾�ü ���̺��� ��������, �ϴ��� hidden�� ��ü���� �Է��Ѵ�. onchange����-->
					</td>
					<td width="15%" class="t_name">���MD</td>
					<td width="35%" class="t_value">
						<select name="md_idx" onchange="onSelectMD(this)">
							<option value="">:: �����ϼ��� ::</option>
						<?
						$csql = "select * from wiz_md order by wdate desc";
						$cresult = mysql_query($csql)or die($csql);
						while($rs = mysql_fetch_array($cresult)){
						?>
							<option <?if($rs[idx] == $prd_row->md_idx){?>selected<?}?> value="<?=$rs[idx]?>"><?=$rs[md_name]?></option>
						<?
						}	
						?>
						</select>
						<input type="hidden" name="md_name" value="<?=$prd_row->md_name?>" /> <!--�� SELECT�� ���޾�ü ���̺��� ��������, �ϴ��� hidden�� ��ü���� �Է��Ѵ�. onchange����--></td>
				</tr>
				<tr>
					<td class="t_name">��ü�������� <font color="red">*</font></td>
					<td class="t_value" colspan="3">
						<input type="radio" name="accounts" value="money" <?if($prd_row->accounts=="money" || $prd_row->accounts==""){?>checked<?}?> onclick="onAccount(this)" />���ް�
						<input type="radio" name="accounts" value="commission" <?if($prd_row->accounts=="commission"){?>checked<?}?> onclick="onAccount(this)" /> ������
					</td>
				</tr>
				<tr id="moneyField" style="display:inline;">
					<td class="t_name">���ް���(���԰�) <font color="red">*</font></td>
					<td class="t_value" colspan="3">
						<input name="money" type="text" value="<?=$prd_row->money?>" class="input" style="width:80px;">��
					</td>
				</tr>
				<tr id="commissionField" style="display:none">
					<td class="t_name">������ <font color="red">*</font></td>
					<td class="t_value" colspan="3">
						<input name="commission" type="text" value="<?=$prd_row->commission?>" class="input" style="width:80px;">%
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> ���ݹ����</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">�ǸŰ� <font color="red">*</font></td>
					<td width="35%" class="t_value"><input name="sellprice" type="text" value="<?=$prd_row->sellprice?>" class="input" onchange="setReserve(this.form);"></td>
					<td width="15%" class="t_name">����</td>
					<td width="35%" class="t_value"><input name="conprice" type="text" value="<?=$prd_row->conprice?>" class="input"><br>* <s>5,000</s>�� ǥ���, 0 �Է½� ǥ��ȵ� </td>
				</tr>
				<tr>
					<td class="t_name">������</td>
					<td class="t_value"><input name="discount_per" type="text" value="<?=$prd_row->discount_per?>" class="input"></td>
					<td class="t_name">������<br><a href="../shop/shop_oper.php#res"><? if($reserve_use == "Y") echo "(�ǸŰ� ".$reserve_buy." %)"; ?></a></td>
					<td class="t_value"><input name="reserve" type="text" value="<?=$prd_row->reserve?>" class="input"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>


<br>

<?
if($prd_row->selllimit == "personal"){
	$personal_check = "checked";
	$personal_display = "inline";
	$stock_check = "";
	$stock_display = "none";
}else{
	$personal_check = "";
	$personal_display = "none";
	$stock_check = "checked";
	$stock_display = "inline";
}

?>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> �Ǹ�����</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">�ǸŽ�����<font color="red">*</font></td>
					<td width="35%" class="t_value"><input name="selldate" type="text" value="<?=$selldate?>" class="input" onchange="setReserve(this.form);" maxlength="10">
                	<img src="../image/ic_cal.gif" style="cursor:hand" align="center" onClick="Calendar1('document.frm','selldate');"></td>
					<td width="15%" class="t_name">�Ǹ�������<font color="red">*</font></td>
					<td width="35%" class="t_value"><input name="selllastdate" type="text" value="<?=$selllastdate?>" class="input" onchange="setReserve(this.form);" maxlength="10">
                	<img src="../image/ic_cal.gif" style="cursor:hand" align="center" onClick="Calendar1('document.frm','selllastdate');"></td>
				</tr>
				<tr>
					<td class="t_name" width="15%">�ǸŽ��۽ð�</td>
					<td class="t_value" width="35%"><input name="starttime" type="text" value="<?=$starttime?>" class="input" maxlength="8"></td>
					<td class="t_name" width="15%">�Ǹ�����ð�</td>
					<td class="t_value" width="35%"><input name="endtime" type="text" value="<?=$endtime?>" class="input" maxlength="8"></td>
				</tr>
				<tr>
					<td class="t_name" width="15%">��������</td>
					<td class="t_value" width="35%">
						<input type="radio" name="selllimit" value="personal" <?=$personal_check?> onclick="showLimit('personallimit')" /> �ο�����
						<input type="radio" name="selllimit" value="stock" <?=$stock_check?> onclick="showLimit('stocklimit')" /> ��������
					</td>
					<td class="t_name" width="15%">+ �Ǹŷ�</td>
					<td class="t_value" width="35%"><input name="addstock" type="text" value="<?=$prd_row->addstock?>" class="input" maxlength="8"></td>
				</tr>
				<tr id="personallimit" style="display:<?=$personal_display?>;">
					<td class="t_name">�ּұ��ż����ο�</td>
					<td class="t_value"><input name="personal_mininum" type="text" value="<?=$prd_row->personal_mininum?>" class="input"></td>
					<td class="t_name">�ִ뱸���ο�</td>
					<td class="t_value"><input name="personal_maxnum" type="text" value="<?=$prd_row->personal_maxnum?>" class="input"></td>
				</tr>
				<tr id="stocklimit" style="display:<?=$stock_display?>;">
					<td class="t_name">�ּұ��ż������</td>
					<td class="t_value"><input name="stock_mininum" type="text" value="<?=$prd_row->stock_mininum?>" class="input"></td>
					<td class="t_name">�ִ�������</td>
					<td class="t_value"><input name="stock_maxnum" type="text" value="<?=$prd_row->stock_maxnum?>" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">1���ּұ��ż���</td>
					<td class="t_value"><input name="buy_mininum" type="text" value="<?=$prd_row->buy_mininum?>" class="input"></td>
					<td class="t_name">1���ִ뱸�ż���</td>
					<td class="t_value"><input name="buy_maxnum" type="text" value="<?=$prd_row->buy_maxnum?>" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">��ۿ���</td>
					<td class="t_value" colspan="3"><input type="radio" name="isdeliver" value="Y" <?=($prd_row->isdeliver=="Y")?"checked='checked'":""?> /> Y <input type="radio" name="isdeliver"  value="N"<?=($prd_row->isdeliver=="N" || $prd_row->isdeliver=="")?"checked='checked'":""?> /> N 
					( �ù質 �������� ����ϴ� ��ǰ�ϰ�� Y , �ܼ� �����߱޸��� �������� �ϴ� ��ǰ�� ��� N)
					</td>
					<!--
					<td class="t_name">��۱ݾ�</td>
					<td class="t_value"><input name="deliver_fee" type="text" class="input" value="<?=$prd_row->deliver_fee?>" /> &nbsp; &nbsp; <input type="text" name="deliver_standard" class="input" value="<?=$prd_row->deliver_standard?>" size="10" /> �� �̻� ������</td>
					-->
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>
<!--
<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> ��ۺ�</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">��ۺ�</td>
					<td width="85%" class="t_value">
						<input type="radio" name="del_type" value="DA" <? if(!strcmp($prd_row->del_type, "DA") || empty($prd_row->del_type)) echo "checked" ?>> �⺻ �����å
						<input type="radio" name="del_type" value="DB" <? if(!strcmp($prd_row->del_type, "DB")) echo "checked" ?>> ������
						<input type="radio" name="del_type" value="DC" <? if(!strcmp($prd_row->del_type, "DC")) echo "checked" ?>> ��ǰ�� ��ۺ�
						<input name="del_price" type="text" value="<?=$prd_row->del_price?>" class="input" size="10">��
						<input type="radio" name="del_type" value="DD" <? if(!strcmp($prd_row->del_type, "DD")) echo "checked" ?>> �����ںδ�(����)
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>
-->
<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> ��ǰ�ɼ�</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">�Ϲ� �ɼ�1</td>
					<td width="85%" class="t_value" colspan="3">
					�ɼǸ� : <input type="text" name="opttitle5" value="<?=$prd_row->opttitle5?>" size="12" class="input">
					&nbsp; �ɼ� : <input type="text" name="optcode5" value="<?=$prd_row->optcode5?>" size="40" class="input">
					<img src="../image/btn_valuecall.gif" style="cursor:hand"  align="absmiddle" onClick="openOption('opt5');"> �ɼ��� �ĸ�(,)�� ����
					</td>
				</tr>
				<tr>
					<td class="t_name">�Ϲ� �ɼ�2</td>
					<td class="t_value" colspan="3">
					�ɼǸ� : <input type="text" name="opttitle6" value="<?=$prd_row->opttitle6?>" size="12" class="input">
					&nbsp; �ɼ� : <input type="text" name="optcode6" value="<?=$prd_row->optcode6?>" size="40" class="input">
					<img src="../image/btn_valuecall.gif" style="cursor:hand"  align="absmiddle" onClick="openOption('opt6');"> ex(95,100,105...)
					</td>
				</tr>
				<tr>
					<td class="t_name">�Ϲ� �ɼ�3</td>
					<td class="t_value" colspan="3">
					�ɼǸ� : <input type="text" name="opttitle7" value="<?=$prd_row->opttitle7?>" size="12" class="input">
					&nbsp; �ɼ� : <input type="text" name="optcode7" value="<?=$prd_row->optcode7?>" size="40" class="input">
					<img src="../image/btn_valuecall.gif" style="cursor:hand"  align="absmiddle" onClick="openOption('opt7');">
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">�����߰� �ɼ�1</td>
					<td width="85%" class="t_value" colspan="3">�ɼǸ� : 
						<input type="text" name="opttitle3" value="<?=$prd_row->opttitle3?>" size="12" class="input">
						<img src="../image/btn_valuecall.gif" style="cursor:hand"  align="absmiddle" onClick="openOption('opt3');">
						<a href="javascript:addopt('opt3')">[�׸��߰�]</a>
						<a href="javascript:delopt('opt3')">[�׸����]</a>
						<br>
						<table width="100%" border="0" cellspacing="0" cellpadding="0" id="opt3">
							<tr>
								<td></td>
							</tr>
<?
$optcode3_arr = explode("^^", $prd_row->optcode3);
for($ii = 0; $ii < count($optcode3_arr) - 1; $ii++) {
	list($opt, $price, $reserve) = explode("^", $optcode3_arr[$ii]);
?>
							<tr>
								<td>
									&nbsp; &nbsp;�׸� : <input type="text" class="input" name="optcode3_opt[]" value="<?=$opt?>">
									�߰����� : <input type="text" class="input" name="optcode3_pri[]" value="<?=$price?>">
									�߰������� : <input type="text" class="input" name="optcode3_res[]" value="<?=$reserve?>">
								</td>
							</tr>
<?
}
?>
						</table>
					</td>
				</tr>
				<tr>
					<td class="t_name">�����߰� �ɼ�2</td>
					<td class="t_value" colspan="3">�ɼǸ� : 
						<input type="text" name="opttitle4" value="<?=$prd_row->opttitle4?>" size="12" class="input">
						<img src="../image/btn_valuecall.gif" style="cursor:hand"  align="absmiddle" onClick="openOption('opt4');">
						<a href="javascript:addopt('opt4')">[�׸��߰�]</a>
						<a href="javascript:delopt('opt4')">[�׸����]</a>
						<br>
						<table width="100%" border="0" cellspacing="0" cellpadding="0" id="opt4">
							<tr>
								<td></td>
							</tr>
<?
$optcode4_arr = explode("^^", $prd_row->optcode4);
for($ii = 0; $ii < count($optcode4_arr) - 1; $ii++) {
	list($opt, $price, $reserve) = explode("^", $optcode4_arr[$ii]);
?>
							<tr>
								<td>&nbsp; &nbsp;�׸� : <input type="text" class="input" name="optcode4_opt[]" value="<?=$opt?>">
								�߰����� : <input type="text" class="input" name="optcode4_pri[]" value="<?=$price?>">
								�߰������� : <input type="text" class="input" name="optcode4_res[]" value="<?=$reserve?>">
								</td>
							</tr>
<?
}
?>
						</table>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">����/��� �ɼ�</td>
					<td width="85%" class="t_value" colspan="3">�ϳ� �Ǵ� �ΰ��� �ɼ��� �����Ͽ� ����/�������߰�,�������� �����մϴ�.
						<input type="checkbox" name="opt_use" value="Y" onClick="if(this.checked==true) prdopt.style.display=''; else prdopt.style.display='none';"><font color="red">�����ϱ�</font><br>
						<div id="prdopt" style="display:none">
							<table border="0" cellpadding="0" cellspacing="0">
								<tr height="30">
									<td>
										�ɼ� 1 : <input type="text" name="opttitle" value="<?=$prd_row->opttitle?>" size="12" class="input">
										<a href="javascript:addopt('opt1')">[�׸��߰�]</a>
										<a href="javascript:delopt('opt1')">[�׸����]</a>
									</td>
									<td width="5"></td>
									<td>
										�ɼ� 2 : <input type="text" name="opttitle2" value="<?=$prd_row->opttitle2?>" size="12" class="input">
										<a href="javascript:addopt('opt2')">[�׸��߰�]</a>
										<a href="javascript:delopt('opt2')">[�׸����]</a>
									</td>
								</tr>
							</table>
							<table border="0" cellpadding="0" cellspacing="0">
								<tr height="30">
									<td>�Է����� : 
										<input type="text" size="9" class="input" value="�߰��ݾ�" readonly>:
										<input type="text" size="10" class="input" value="�߰�������" readonly>:
										<input type="text" size="8" class="input" value="���" readonly>:
										<input type="text" size="11" class="input" value="�ּұ��ż���" readonly>:
										<input type="text" size="11" class="input" value="�ִ뱸�ż���" readonly>
									</td>
								</tr>
							</table>
<?
$optcode_list = explode("^",$prd_row->optcode);
$optcode2_list = explode("^",$prd_row->optcode2);

$opt_list = explode("^^",$prd_row->optvalue);
for($ii=0; $ii < count($opt_list)-1; $ii++){
	$optvalue[$ii] = explode("^",$opt_list[$ii]);
}

$no = 0;
?>
							<table id="opt" border="1" bordercolor="#cccccc" style="border-collapse:.">
								<tr align="center">
									<td></td>
									<td id="opt2_1"><input type="text" name="tmp_optcode2[]" class="input" value="<?=$optcode2_list[0]?>" style="width:100%"></td>
<?
for($ii = 1; $ii < count($optcode2_list) - 1; $ii++) {
?>
									<td id="opt2_<? echo $ii + 1 ?>"><input type="text" name="tmp_optcode2[]" class="input" value="<?=$optcode2_list[$ii]?>" style="width:100%"></td>
<?
}
?>
								</tr>
								<tr id="opt1">
									<td nowrap><input type="text" name="tmp_optcode[]" value="<?=$optcode_list[0]?>" size="10" class="input" ></td>
									<td>
										<input type="text" name="tmp_opt[sellprice][0]" value="<?=$optvalue[$no][0]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[reserve][0]" value="<?=$optvalue[$no][1]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[stock][0]" value="<?=$optvalue[$no][2]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[minno][0]" value="<?=$optvalue[$no][3]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[maxno][0]" value="<?=$optvalue[$no][4]?>" size="7" class="input">
									</td>
<?
for($ii = 1; $ii < count($optcode2_list) - 1; $ii++) {
	$no++;
?>
									<td id="opt2_<? echo $ii + 1 ?>"><input type="text" name="tmp_opt[sellprice][]" value="<?=$optvalue[$no][0]?>" size="7" class="input">:<input type="text" name="tmp_opt[reserve][]" value="<?=$optvalue[$no][1]?>" size="7" class="input">:<input type="text" name="tmp_opt[stock][]" value="<?=$optvalue[$no][2]?>" size="7" class="input"></td>
<?
}
?>
								</tr>
<?
for($ii = 1; $ii < count($optcode_list) - 1; $ii++) {
	$no++;
?>
								<tr id="opt1_<? echo $ii+1 ?>">
									<td nowrap><input type="text" name="tmp_optcode[]" value="<?=$optcode_list[$ii]?>" size="10" class="input" ></td>
									<td>
										<input type="text" name="tmp_opt[sellprice][]" value="<?=$optvalue[$no][0]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[reserve][]" value="<?=$optvalue[$no][1]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[stock][]" value="<?=$optvalue[$no][2]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[minno][]" value="<?=$optvalue[$no][3]?>" size="7" class="input">:
										<input type="text" name="tmp_opt[maxno][]" value="<?=$optvalue[$no][4]?>" size="7" class="input">
									</td>
<?
	for($jj = 1; $jj < count($optcode2_list) - 1; $jj++) {
		$no++;
?>
									<td id="opt2_<? echo $jj + 1 ?>"><input type="text" name="tmp_opt[sellprice][]" value="<?=$optvalue[$no][0]?>" size="7" class="input">:<input type="text" name="tmp_opt[reserve][]" value="<?=$optvalue[$no][1]?>" size="7" class="input">:<input type="text" name="tmp_opt[stock][]" value="<?=$optvalue[$no][2]?>" size="7" class="input"></td>
<?
	}
?>
								</tr>
<?
}
?>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> ��ǰ����</td>
		<!--
		<td>
			<input type="checkbox" name="prdlay_check2" onClick="if(this.checked==true) prdlay2.style.display=''; else prdlay2.style.display='none';"><font color="red">�̹����߰�2</font>
			<input type="checkbox" name="prdlay_check3" onClick="if(this.checked==true) prdlay3.style.display=''; else prdlay3.style.display='none';"><font color="red">�̹����߰�3</font>
			<input type="checkbox" name="prdlay_check4" onClick="if(this.checked==true) prdlay4.style.display=''; else prdlay4.style.display='none';"><font color="red">�̹����߰�4</font>
			<input type="checkbox" name="prdlay_check5" onClick="if(this.checked==true) prdlay5.style.display=''; else prdlay5.style.display='none';"><font color="red">�̹����߰�5</font> &nbsp; &nbsp;
			<a href="javascript:setImgsize();"><img src="../image/btn_imgsize.gif" align="absmiddle" border="0"></a>
		</td>
		-->
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="75%">
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="20%" class="t_name">��ǰ �̹��� 1 </td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg" class="input"> [GIF, JPG, PNG] 
						<? if( @file($imgpath."/".$prd_row->prdimg_L1) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L1?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_L1?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_L1?>';"><?=$prd_row->prdimg_L1?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="t_name">��ǰ �̹��� 2</td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg2" class="input"> [GIF, JPG, PNG] 
						<? if( @file($imgpath."/".$prd_row->prdimg_L2) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L2?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_L2?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_L2?>';"><?=$prd_row->prdimg_L2?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="t_name">��ǰ �̹��� 3</td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg3" class="input"> [GIF, JPG, PNG] 
						<? if( @file($imgpath."/".$prd_row->prdimg_L3) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L3?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_L3?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_L3?>';"><?=$prd_row->prdimg_L3?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="t_name">��ǰ �̹��� 4</td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg4" class="input"> [GIF, JPG, PNG] 
						<? if( @file($imgpath."/".$prd_row->prdimg_L4) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L4?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_L4?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_L4?>';"><?=$prd_row->prdimg_L4?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="t_name">��ǰ �̹��� 5</td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg5" class="input"> [GIF, JPG, PNG] 
						<? if( @file($imgpath."/".$prd_row->prdimg_L5) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L5?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_L5?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_L5?>';"><?=$prd_row->prdimg_L5?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="t_name">���� �̹���</td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="img_coupon" class="input"> [GIF, JPG, PNG]  ( 222px x 134px )
						<? if( @file($imgpath."/".$prd_row->img_coupon) ){ ?>
						(<a href="/data/prdimg/<?=$prd_row->img_coupon?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->img_coupon?>';"><?=$prd_row->img_coupon?></a>)
						<!--input type="checkbox" name="delimg[]" value="<?=$prd_row->img_coupon?>">���� (<a href="/data/prdimg/<?=$prd_row->img_coupon?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->img_coupon?>';"><?=$prd_row->img_coupon?></a>)-->
						<? } ?>
					</td>
				</tr>
				<tr>
					<td width="20%" class="t_name">���ϸ� �̹���</td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="img_mail" class="input"> [GIF, JPG, PNG] ( 298px x 155px )
						<? if( @file($imgpath."/".$prd_row->img_mail) ){ ?>
						(<a href="/data/prdimg/<?=$prd_row->img_mail?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->img_mail?>';"><?=$prd_row->img_mail?></a>)
						<!--input type="checkbox" name="delimg[]" value="<?=$prd_row->img_mail?>">���� (<a href="/data/prdimg/<?=$prd_row->img_mail?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->img_mail?>';"><?=$prd_row->img_mail?></a>)-->
						<? } ?>
					</td>
				</tr>
			</table>
		</td>
		<td width="25%" height="100%">
			<table width="100%" height="100%" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td align="center" bgcolor="#ffffff">
					<?
					if(@file($imgpath."/".$prd_row->prdimg_R))
					echo "<img src='../../data/prdimg/$prd_row->prdimg_R' name='prdimg1' width='100'>";
					else
					echo "No<br>Image";
					?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<!--
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="75%">
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="20%" class="t_name">���� �̹���</td>
					<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg" class="input"> [GIF, JPG, PNG]<br>�����̹����� ����ϸ� ������ �̹����� �ڵ����� �˴ϴ�.</td>
				</tr>
				<tr>
					<td height="40" class="t_name">��ǰ��� �̹��� <font color="red">*</font><br>
					&nbsp;&nbsp;�� ũ�� : <?=$oper_info->prdimg_R?> x <?=$oper_info->prdimg_R?></td>
					<td class="t_value" colspan="3">
						<input type="file" name="prdimg_R" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_R) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_R?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_R?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_R?>';"><?=$prd_row->prdimg_R?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td height="40" class="t_name">����̹��� �̹���1<br>
					&nbsp;&nbsp;�� ũ�� : <?=$oper_info->prdimg_S?> x <?=$oper_info->prdimg_S?></td>
					<td class="t_value" colspan="3">
						<input type="file" name="prdimg_S1" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_S1) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_S1?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_S1?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_S1?>';"><?=$prd_row->prdimg_S1?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td height="40" class="t_name">��ǰ�� �̹���1 <font color="red">*</font><br>
					&nbsp;&nbsp;�� ũ�� : <?=$oper_info->prdimg_M?> x <?=$oper_info->prdimg_M?></td>
					<td class="t_value" colspan="3">
						<input type="file" name="prdimg_M1" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_M1) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_M1?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_M1?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_M1?>';"><?=$prd_row->prdimg_M1?></a>)
						<? } ?>
					</td>
				</tr>
				<tr>
					<td height="40" class="t_name">Ȯ�� �̹���1 <font color="red">*</font><br>
					&nbsp;&nbsp;�� ũ�� : <?=$oper_info->prdimg_L?> x <?=$oper_info->prdimg_L?></td>
					<td class="t_value" colspan="3">
						<input type="file" name="prdimg_L1" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_L1) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L1?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_L1?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_L1?>';"><?=$prd_row->prdimg_L1?></a>)
						<? } ?>
					</td>
				</tr>
			</table>
		</td>
		<td width="25%" height="100%">
			<table width="100%" height="100%" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td align="center" bgcolor="#ffffff">
					<?
					if(@file($imgpath."/".$prd_row->prdimg_R))
					echo "<img src='../../data/prdimg/$prd_row->prdimg_R' name='prdimg1' width='100'>";
					else
					echo "No<br>Image";
					?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<div id="prdlay2" style="display:none">
	<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td></td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="75%">
				<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td width="20%" class="t_name">���� �̹���</td>
						<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg2" class="input"></td>
					</tr>
					<tr>
						<td class="t_name">��� �̹���2</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_S2" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_S2) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_S2?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_S2?>" target="_blank" onMouseOver="document.prdimg2.src='../../data/prdimg/<?=$prd_row->prdimg_S2?>';"><?=$prd_row->prdimg_S2?></a>)
						<? } ?></td>
					</tr>
					<tr>
						<td class="t_name">�� �̹���2</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_M2" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_M2) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_M2?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_M2?>" target="_blank" onMouseOver="document.prdimg2.src='../../data/prdimg/<?=$prd_row->prdimg_M2?>';"><?=$prd_row->prdimg_M2?></a>)
						<? } ?>
						</td>
					</tr>
					<tr>
						<td class="t_name">Ȯ�� �̹���2</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_L2" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_L2) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L2?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_L2?>" target="_blank" onMouseOver="document.prdimg2.src='../../data/prdimg/<?=$prd_row->prdimg_L2?>';"><?=$prd_row->prdimg_L2?></a>)
						<? } ?></td>
					</tr>
				</table>
			</td>
			<td width="25%" height="100%">
				<table width="100%" height="100%" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td align="center" bgcolor="#ffffff">
						<?
						if(@file($imgpath."/".$prd_row->prdimg_M2))
						echo "<img src='../../data/prdimg/$prd_row->prdimg_M2' name='prdimg2' width='100'>";
						else
						echo "No<br>Image";
						?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>

<div id="prdlay3" style=display:none>
	<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td></td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="75%">
				<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td width="20%" class="t_name">���� �̹���</td>
						<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg3" class="input"></td>
					</tr>
					<tr>
						<td class="t_name">��� �̹���3</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_S3" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_S3) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_S3?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_S3?>" target="_blank" onMouseOver="document.prdimg3.src='../../data/prdimg/<?=$prd_row->prdimg_S3?>';"><?=$prd_row->prdimg_S3?></a>)
						<? } ?></td>
					</tr>
					<tr>
						<td class="t_name">�� �̹���3</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_M3" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_M3) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_M3?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_M3?>" target="_blank" onMouseOver="document.prdimg3.src='../../data/prdimg/<?=$prd_row->prdimg_M3?>';"><?=$prd_row->prdimg_M3?></a>)
						<? } ?>
						</td>
					</tr>
					<tr>
						<td class="t_name">Ȯ�� �̹���3</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_L3" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_L3) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L3?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_L3?>" target="_blank" onMouseOver="document.prdimg3.src='../../data/prdimg/<?=$prd_row->prdimg_L3?>';"><?=$prd_row->prdimg_L3?></a>)
						<? } ?>
						</td>
					</tr>
				</table>
			</td>
			<td width="25%" height="100%">
				<table width="100%" height="100%" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td align="center" bgcolor="#ffffff">
							<?
							if(@file($imgpath."/".$prd_row->prdimg_M3))
							echo "<img src='../../data/prdimg/$prd_row->prdimg_M3' name='prdimg3' width='100'>";
							else
							echo "No<br>Image";
							?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>

<div id="prdlay4" style=display:none>
	<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td></td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="75%">
				<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td width="20%" class="t_name">���� �̹���</td>
						<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg4" class="input"></td>
					</tr>
					<tr>
						<td class="t_name">��� �̹���4</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_S4" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_S4) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_S4?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_S4?>" target="_blank" onMouseOver="document.prdimg4.src='../../data/prdimg/<?=$prd_row->prdimg_S4?>';"><?=$prd_row->prdimg_S4?></a>)
						<? } ?></td>
					</tr>
					<tr>
						<td class="t_name">�� �̹���4</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_M4" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_M4) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_M4?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_M4?>" target="_blank" onMouseOver="document.prdimg4.src='../../data/prdimg/<?=$prd_row->prdimg_M4?>';"><?=$prd_row->prdimg_M4?></a>)
						<? } ?></td>
					</tr>
					<tr>
						<td class="t_name">Ȯ�� �̹���4</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_L4" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_L4) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L4?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_L4?>" target="_blank" onMouseOver="document.prdimg4.src='../../data/prdimg/<?=$prd_row->prdimg_L4?>';"><?=$prd_row->prdimg_L4?></a>)
						<? } ?></td>
					</tr>
				</table>
			</td>
			<td width="25%" height="100%">
				<table width="100%" height="100%" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td align="center" bgcolor="#ffffff">
						<?
						if(@file($imgpath."/".$prd_row->prdimg_M4))
						echo "<img src='../../data/prdimg/$prd_row->prdimg_M4' name='prdimg4' width='100'>";
						else
						echo "No<br>Image";
						?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>

<div id="prdlay5" style=display:none>
	<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td></td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="75%">
				<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td width="20%" class="t_name">���� �̹���</td>
						<td width="80%" class="t_value" colspan="3"><input type="file" name="realimg5" class="input"></td>
					</tr>
					<tr>
						<td class="t_name">��� �̹���5</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_S5" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_S5) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_S5?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_S5?>" target="_blank" onMouseOver="document.prdimg5.src='../../data/prdimg/<?=$prd_row->prdimg_S5?>';"><?=$prd_row->prdimg_S5?></a>)
						<? } ?></td>
					</tr>
					<tr>
						<td class="t_name">�� �̹���5</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_M5" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_M5) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_M5?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_M5?>" target="_blank" onMouseOver="document.prdimg5.src='../../data/prdimg/<?=$prd_row->prdimg_M5?>';"><?=$prd_row->prdimg_M5?></a>)
						<? } ?></td>
					</tr>
					<tr>
						<td class="t_name">Ȯ�� �̹���5</td>
						<td class="t_value" colspan="3"><input type="file" name="prdimg_L5" class="input">
						<? if( @file($imgpath."/".$prd_row->prdimg_L5) ){ ?>
						<input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L5?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_L5?>" target="_blank" onMouseOver="document.prdimg5.src='../../data/prdimg/<?=$prd_row->prdimg_L5?>';"><?=$prd_row->prdimg_L5?></a>)
						<? } ?></td>
					</tr>
				</table>
			</td>
			<td width="25%" height="100%">
				<table width="100%" height="100%" cellspacing="1" cellpadding="2" class="t_style">
					<tr>
						<td align="center" bgcolor="#ffffff">
							<?
							if(@file($imgpath."/".$prd_row->prdimg_M5))
							echo "<img src='../../data/prdimg/$prd_row->prdimg_M5' name='prdimg5' width='100'>";
							else
							echo "No<br>Image";
							?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
-->
<? if(!strcmp($oper_info->prdrel_use, "Y")) { ?>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> ���û�ǰ</td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="100%" class="t_value"><iframe width="100%" height="95" frameborder="0" src="prd_relation.php?mode=<?=$mode?>&prdcode=<?=$prdcode?>"></iframe></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<? } ?>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> ��ǰ����</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td width="15%" class="t_name">���ܼ���</td>
					<td width="85%" class="t_value"><textarea name="stortexp" rows="3" cols="90" class="textarea"><?=$prd_row->stortexp?></textarea></td>
				</tr>
				<tr>
					<td width="15%" class="t_name">SMS ����</td>
					<td width="85%" class="t_value"><textarea name="sms" rows="3" cols="90" class="textarea"><?=$prd_row->sms?></textarea></td>
				</tr>
				<tr>
					<td width="15%" class="t_name">���� �� ����ȳ�</td>
					<td width="85%" class="t_value"><textarea name="shopinfo" rows="3" cols="90" class="textarea"><?=$prd_row->shopinfo?></textarea></td>
				</tr>
				<tr>
					<td width="15%" class="t_name">���� �� ���ǻ���</td>
					<td width="85%" class="t_value"><textarea name="attention" rows="3" cols="90" class="textarea"><?=$prd_row->attention?></textarea></td>
				</tr>
				<tr>
					<td colspan="3" align="center" class="t_name">�󼼼���</td>
				</tr>
				<tr>
					<td colspan="3" class="t_value">
<?
$edit_content = $prd_row->content;
include "../webedit/WIZEditor.html";
?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> �������ȳ�</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td colspan="3" class="t_value">
<?
$edit_content = $prd_row->coupon_con;
include "../webedit2/WIZEditor.html";
?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> ����ȳ�</td>
</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
				<tr>
					<td colspan="3" class="t_value">
<?
$edit_content = $prd_row->shopguide;
include "../webedit3/WIZEditor.html";
?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br>


<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td></td>
	</tr>
</table>


<div id='floater' style='Z-INDEX:1;POSITION:absolute;LEFT:expression(document.body.clientWidth-80);TOP:200'>
	<table>
		<tr>
			<td><input type="image" src="../image/btn_prdsave.gif"></td>
		</tr>
		<tr>
			<td><a href='<?=$listpage_url?>?<?=$param?>''><img src="../image/btn_prdlist.gif" border="0"></a></td>
		</tr>
	</table>
</div>
<script language="JavaScript" type="text/javascript">
<!--
self.onError=null;
currentX = currentY = 0;
whichIt = null;
lastScrollX = 0; lastScrollY = 0;
NS = (document.layers) ? 1 : 0;
IE = (document.all) ? 1: 0;

function heartBeat() {
	if(IE) {
		diffY = document.body.scrollTop;
		diffX = 0;
	}

	if(NS) {
		diffY = self.pageYOffset; diffX = self.pageXOffset;
	}

	if(diffY != lastScrollY) {
		percent = .05 * (diffY - lastScrollY);
		if(percent > 0) percent = Math.ceil(percent);
		else percent = Math.floor(percent);
		if(IE) document.all.floater.style.pixelTop += percent;
		if(NS) document.floater.top += percent;
		lastScrollY = lastScrollY + percent;
	}

	if(diffX != lastScrollX) {
		percent = .05 * (diffX - lastScrollX);
		if(percent > 0) percent = Math.ceil(percent);
		else percent = Math.floor(percent);
		if(IE) document.all.floater.style.pixelLeft += percent;
		if(NS) document.floater.top += percent;
		lastScrollY = lastScrollY + percent;
	}
}
if(NS || IE) action = window.setInterval("heartBeat()",1);
//-->
</script>

<br>
<table align="center" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<input type="image" src="../image/btn_confirm_l.gif"> &nbsp;
			<img src="../image/btn_list_l.gif" style="cursor:hand" onclick="document.location='<?=$listpage_url?>?<?=$param?>';"> &nbsp;
			<? if($mode == "update"){ ?>
			<img src="../image/btn_delete_l.gif" style="cursor:hand" onclick="document.location='prd_save.php?mode=delete&prdcode=<?=$prdcode?>&<?=$param?>';"> &nbsp;
			<? } ?>
			<img src="../image/btn_overview_l.gif" style="cursor:hand" onclick="openPreview('<?=$prdcode?>')" />
		</td>
	</tr>
</form>
</table>
<script>prdlayCheck();lodingComplete();</script>

<? include "../footer.php"; ?>