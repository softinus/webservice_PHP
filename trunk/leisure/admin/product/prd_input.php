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

   $sql = "select wp.*, wc.idx, wc.catcode from wiz_product wp, wiz_cprelation wc where wp.prdcode = '$prdcode' and wp.prdcode = wc.prdcode";
   $result = mysql_query($sql) or error(mysql_error());
   $prd_row = mysql_fetch_object($result);

   $relidx = $prd_row->idx;
   $catcode01 = substr($prd_row->catcode,0,2);
   $catcode02 = substr($prd_row->catcode,0,4);
   $catcode03 = substr($prd_row->catcode,0,6);

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
   $sql = "select catcode, catname, depthno from wiz_category order by priorno01, priorno02, priorno03 asc";
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

function setClass01(){

  var arrayClass = eval("document.frm.class01");
  var arrayClass1 = eval("document.frm.class02");
  var arrayClass2 = eval("document.frm.class03");

  arrayClass.options[0] = new Option(":: ��з� ::","");
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
	if(@file($imgpath."/".$prd_row->prdimg_S2)) echo "document.frm.prdlay_check2.checked = true; prdlay2.style.display='';";
	if(@file($imgpath."/".$prd_row->prdimg_S3)) echo "document.frm.prdlay_check3.checked = true; prdlay3.style.display='';";
	if(@file($imgpath."/".$prd_row->prdimg_S4)) echo "document.frm.prdlay_check4.checked = true; prdlay4.style.display='';";
	if(@file($imgpath."/".$prd_row->prdimg_S5)) echo "document.frm.prdlay_check5.checked = true; prdlay5.style.display='';";
	//if($prd_row->opttitle != "" || $prd_row->optcode != "") echo "document.frm.opt_use.checked = true; prdopt.style.display='';";
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
                <td class="t_name">��ǰ�з�</td>
                <td class="t_value" colspan="3">
                <select name="class01" onChange="changeClass01();">
                </select>
                <select name="class02" onChange="changeClass02();">
                </select>
                <select name="class03" onChange="changeClass03();">
                </select>&nbsp;
                <? if($mode == "update"){ ?>
                	<a href="javascript:prdCategory()"><img src="../image/btn_catadd.gif" align="absmiddle" border="0"></a>
                <? } ?>
                </td>
              </tr>
              <tr>
                <td class="t_name">��ǰ�׷�</td>
                <td class="t_value" colspan="3">
                  <input type="checkbox" name="new" value="Y" <? if($prd_row->new == "Y") echo "checked"; ?>><img src="/images/icon_new.gif" border="0"> &nbsp;
                  <input type="checkbox" name="best" value="Y" <? if($prd_row->best == "Y") echo "checked"; ?>><img src="/images/icon_best.gif" border="0"> &nbsp;
                  <input type="checkbox" name="popular" value="Y" <? if($prd_row->popular == "Y") echo "checked"; ?>><img src="/images/icon_hit.gif" border="0"> &nbsp;
                  <input type="checkbox" name="recom" value="Y" <? if($prd_row->recom == "Y") echo "checked"; ?>><img src="/images/icon_rec.gif" border="0"> &nbsp;
                  <input type="checkbox" name="sale" value="Y" <? if($prd_row->sale == "Y") echo "checked"; ?>><img src="/images/icon_sale.gif" border="0"> &nbsp;
                </td>
              </tr>
              <tr>
                <td class="t_name">��ǰ������</td>
                <td class="t_value" colspan="3">
                	<table cellspacing=0 cellpadding=0><tr><td>
                	<table cellspacing=0 cellpadding=0>
                	<?
                	$prdicon= explode("/",$prd_row->prdicon);
                  for($ii=0; $ii<count($prdicon); $ii++){
                     $prdicon_list[$prdicon[$ii]] = true;
                  }

									$no = 0;
									if($handle = opendir('../../data/prdicon')){
										while(false !== ($file_name = readdir($handle))){
											if($file_name != "." && $file_name != ".."){
												if($no%7 == 0) echo "<tr>";
									?>
                  <td><input type="checkbox" name="prdicon[]" value="<?=$file_name?>" <? if($prdicon_list["$file_name"]==true) echo "checked";?>></td>
                  <td><img src="/data/prdicon/<?=$file_name?>" border="0"></td>
                  <?
												$no++;
											}
										}
										closedir($handle);
									}
									?>
                  </table></td>
                  <td>&nbsp;<a href="javascript:prdIcon()"><img src="../image/btn_iconadd.gif" align="absmiddle" border="0"></a></td>
                  </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td class="t_name">��ǰ�� <font color="red">*</font></td>
                <td class="t_value" colspan="3">
                <input type="text" name="prdname" value="<?=$prd_row->prdname?>" size="60" class="input">
                </td>
              </tr>
              <tr>
                <td width="15%" class="t_name">������</td>
                <td width="35%" class="t_value">
                	<input name="prdcom" type="text" value="<?=$prd_row->prdcom?>" class="input">
                	<select onChange="this.form.prdcom.value = this.value">
                	<option value="">::����::</option>
                	<?
                	$sql = "select distinct prdcom from wiz_product where prdcom != '' order by prdcom asc";
                	$result = mysql_query($sql);
                	while($row = mysql_fetch_object($result)){
                	?>
                	<option value="<?=$row->prdcom?>"><?=$row->prdcom?></option>
                	<?
                	}
                	?>
                	<select>
                </td>
                <td width="15%" class="t_name">������</td>
                <td width="35%" class="t_value">
                	<input name="origin" type="text" value="<?=$prd_row->origin?>" class="input">
                	<select onChange="this.form.origin.value = this.value">
                	<option value="">::����::</option>
                	<?
                	$sql = "select distinct origin from wiz_product where origin != '' order by origin asc";
                	$result = mysql_query($sql);
                	while($row = mysql_fetch_object($result)){
                	?>
                	<option value="<?=$row->origin?>"><?=$row->origin?></option>
                	<?
                	}
                	?>
                	<select>
                </td>
              </tr>
              <tr>
                <td class="t_name">�귣��</td>
                <td class="t_value">
                	<select name="brand" style="width:130px">
                	<option value="">::����::</option>
                	<?
                	$sql = "select idx, brdname from wiz_brand where brduse != 'N' order by priorno asc";
                	$result = mysql_query($sql);
                	while($row = mysql_fetch_object($result)){
                	?>
                	<option value="<?=$row->idx?>" <? if(!strcmp($row->idx, $prd_row->brand)) echo "selected" ?>><?=$row->brdname?></option>
                	<?
                	}
                	?>
                	<select>
                </td>
                <td class="t_name">��ǰ����</td>
                <td class="t_value">
                <input type="radio" name="showset" value="Y" <? if($prd_row->showset == "Y" || empty($prd_row->showset)) echo "checked"; ?>>������&nbsp;
                <input type="radio" name="showset" value="N" <? if($prd_row->showset == "N") echo "checked"; ?>>��������
                </td>
              </tr>
              <tr>
                <td class="t_name">�켱����</td>
                <td class="t_value">
                <input type="text" name="prior" value="<? if(empty($prd_row->prior)) echo date(ymdHis); else echo $prd_row->prior; ?>" maxlength="12" class="input">
                </td>
                <td class="t_name"></td>
                <td class="t_value">

                </td>
                <!--td class="t_name">��ȣ��</td>
                <td class="t_value">
                <select name="prefer">
                <option value="1" <? if($prd_row->prefer == "1") echo "selected"; ?>>��1
                <option value="2" <? if($prd_row->prefer == "2") echo "selected"; ?>>��2
                <option value="3" <? if($prd_row->prefer == "3" || $prd_row->prefer == "") echo "selected"; ?>>��3
                <option value="4" <? if($prd_row->prefer == "4") echo "selected"; ?>>��4
                <option value="5" <? if($prd_row->prefer == "5") echo "selected"; ?>>��5
                </select>
                </td//-->
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr><td height="2"></td></tr>
        <tr>
          <td width="17%"></td>
          <td>(���ڰ� Ŭ���� ������ �տ� ���ɴϴ�. �ִ� 12�ڸ�) </td>
        </tr>
      </table>

      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> ��ǰ����</td>
			    <td>
          	<input type="radio" name="info_use" onClick="if(this.checked==true) addinfo.style.display='none';" value="N" <? if($prd_row->info_use == "" || $prd_row->info_use == "N") echo "checked"; ?>>������
          	<input type="radio" name="info_use" onClick="if(this.checked==true) addinfo.style.display='';" value="Y" <? if($prd_row->info_use == "Y") echo "checked"; ?>>�����
          </td>
			  </tr>
			</table>
      <div id="addinfo" style=display:<? if($prd_row->info_use == "" || $prd_row->info_use == "N") echo "none"; else echo "show"; ?>>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
              <tr>
                <td width="15%" class="t_name">��ǰ����</td>
                <td width="85%" class="t_value">

                	<table border="0" cellspacing="5" cellpadding="0">
                		<tr>
                			<td></td>
                			<td>��ǰ����</td>
                			<td>1,000�� (����)</td>
                		</tr>
                		<tr>
                			<td>1.</td>
                			<td><input name="info_name1" type="text" value="<?=$prd_row->info_name1?>" size="15" class="input"></td>
                			<td><input name="info_value1" type="text" value="<?=$prd_row->info_value1?>" size="20" class="input"></td>
                			<td width="60" align="right">4.</td>
                			<td><input name="info_name4" type="text" value="<?=$prd_row->info_name4?>" size="15" class="input"></td>
                			<td><input name="info_value4" type="text" value="<?=$prd_row->info_value4?>" size="20" class="input"></td>
                		</tr>
                		<tr>
                			<td>2.</td>
                			<td><input name="info_name2" type="text" value="<?=$prd_row->info_name2?>" size="15" class="input"></td>
                			<td><input name="info_value2" type="text" value="<?=$prd_row->info_value2?>" size="20" class="input"></td>
                			<td align="right">5.</td>
                			<td><input name="info_name5" type="text" value="<?=$prd_row->info_name5?>" size="15" class="input"></td>
                			<td><input name="info_value5" type="text" value="<?=$prd_row->info_value5?>" size="20" class="input"></td>
                		</tr>
                		<tr>
                			<td>3.</td>
                			<td><input name="info_name3" type="text" value="<?=$prd_row->info_name3?>" size="15" class="input"></td>
                			<td><input name="info_value3" type="text" value="<?=$prd_row->info_value3?>" size="20" class="input"></td>
                			<td align="right">6.</td>
                			<td><input name="info_name6" type="text" value="<?=$prd_row->info_name6?>" size="15" class="input"></td>
                			<td><input name="info_value6" type="text" value="<?=$prd_row->info_value6?>" size="20" class="input"></td>
                		</tr>
                	</table>

                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <br>
      </div>



			<? if($oper_info->coupon_use == "Y"){ ?>

			<br>
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td class="tit_sub" width="15%"><img src="../image/ics_tit.gif"> ��������</td>
			    <td>
          	<input type="radio" name="coupon_use" onClick="if(this.checked==true) coupon.style.display='none';" value="N" <? if($prd_row->coupon_use == "" || $prd_row->coupon_use == "N") echo "checked"; ?>>������
          	<input type="radio" name="coupon_use" onClick="if(this.checked==true) coupon.style.display='';" value="Y" <? if($prd_row->coupon_use == "Y") echo "checked"; ?>>�����
          </td>
			  </tr>
			</table>
      <div id="coupon" style=display:<? if($prd_row->coupon_use == "" || $prd_row->coupon_use == "N") echo "none"; else echo "show"; ?>>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
              <tr>
                <td class="t_name">�����ݾ�/������</td>
                <td colspan="3" class="t_value">
                	<input name="coupon_dis" type="text" value="<?=$prd_row->coupon_dis?>" class="input">
                	<input type="radio" name="coupon_type" value="%" <? if($prd_row->coupon_type == "" || $prd_row->coupon_type == "%") echo "checked"; ?>>% �ۼ�Ʈ
                	<input type="radio" name="coupon_type" value="��" <? if($prd_row->coupon_type == "��") echo "checked"; ?>>��
                </td>
              </tr>
              <tr>
                <td width="15%" class="t_name">��������</td>
                <td width="35%" class="t_value">
                	<input name="coupon_amount" type="text" value="<?=$prd_row->coupon_amount?>" class="input"  <? if($prd_row->coupon_limit == "N") echo "disabled"; ?>>
                	<input type="checkbox" name="coupon_limit" value="N" <? if($prd_row->coupon_limit == "N") echo "checked"; ?> onClick="if(this.checked==true) this.form.coupon_amount.disabled = true; else this.form.coupon_amount.disabled = false;">�������Ѿ���
                </td>
                <td width="15%" class="t_name">����������</td>
                <td width="35%" class="t_value">
                	<input name="coupon_sdate" size="12" type="text" value="<?=$prd_row->coupon_sdate?>" class="input" onClick="Calendar1('document.frm','coupon_sdate');"> ~
                	<input name="coupon_edate" size="12" type="text" value="<?=$prd_row->coupon_edate?>" class="input" onClick="Calendar1('document.frm','coupon_edate');">
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
        	<td align="right" height="30"><img src="../image/btn_couponmem.gif" style="cursor:hand" align="absmiddle" onclick="popMycoupon('<?=$prdcode?>')"></td>
        </tr>
      </table>
      <br>
      </div>

			<? } ?>

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
                <td class="t_name">������<br><a href="../shop/shop_oper.php#res"><? if($reserve_use == "Y") echo "(�ǸŰ� ".$reserve_buy." %)"; ?></a></td>
                <td class="t_value"><input name="reserve" type="text" value="<?=$prd_row->reserve?>" class="input"></td>
                <td class="t_name">���</td>
                <td class="t_value">
                	<input type="radio" name="shortage" value="Y" <? if($prd_row->shortage == "Y") echo "checked"; ?>><img src="/images/icon_not.gif" border="0"> &nbsp;
                	<input type="radio" name="shortage" value="N" <? if($prd_row->shortage == "N" || empty($prd_row->shortage)) echo "checked"; ?>>������
                	<input type="radio" name="shortage" value="S" <? if($prd_row->shortage == "S") echo "checked"; ?>>����
                	<input name="stock" type="text" size="5" value="<?=$prd_row->stock?>" class="input">��<br>
                	������ �����ϸ� ��� ������ �Ǹ�����
                </td>
              </tr>
              <tr>
              	<td class="t_name">���ݴ�ü����</td>
                <td class="t_value" colspan="3">
                	<input name="strprice" type="text" value="<?=$prd_row->strprice?>" class="input">
                	���ݴ�ü������ �Է��ϸ� ���ݴ�� �Է��� ������ ���̸� ���Ű� �Ұ����մϴ�.
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>


      <br>
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

            <table><tr><td></td></tr></table>
            <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
              <tr>
                <td width="15%" class="t_name">�����߰� �ɼ�1</td>
                <td width="85%" class="t_value" colspan="3">
	                �ɼǸ� : <input type="text" name="opttitle3" value="<?=$prd_row->opttitle3?>" size="12" class="input">
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
                <td class="t_value" colspan="3">
	                �ɼǸ� : <input type="text" name="opttitle4" value="<?=$prd_row->opttitle4?>" size="12" class="input">
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
	                		<td>
												&nbsp; &nbsp;�׸� : <input type="text" class="input" name="optcode4_opt[]" value="<?=$opt?>">
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

            <table><tr><td></td></tr></table>
            <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
              <tr>
                <td width="15%" class="t_name">����/��� �ɼ�</td>
                <td width="85%" class="t_value" colspan="3">
                �ϳ� �Ǵ� �ΰ��� �ɼ��� �����Ͽ� ����/�������߰�,�������� �����մϴ�.
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
	             	    	<td>�Է����� : <input type="text" size="9" class="input" value="�߰��ݾ�" readonly>:<input type="text" size="10" class="input" value="�߰�������" readonly>:<input type="text" size="8" class="input" value="���" readonly>
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
												<input type="text" name="tmp_opt[sellprice][0]" value="<?=$optvalue[$no][0]?>" size="7" class="input">:<input type="text" name="tmp_opt[reserve][0]" value="<?=$optvalue[$no][1]?>" size="7" class="input">:<input type="text" name="tmp_opt[stock][0]" value="<?=$optvalue[$no][2]?>" size="7" class="input">
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
												<input type="text" name="tmp_opt[sellprice][]" value="<?=$optvalue[$no][0]?>" size="7" class="input">:<input type="text" name="tmp_opt[reserve][]" value="<?=$optvalue[$no][1]?>" size="7" class="input">:<input type="text" name="tmp_opt[stock][]" value="<?=$optvalue[$no][2]?>" size="7" class="input">
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
			    <td>
            <input type="checkbox" name="prdlay_check2" onClick="if(this.checked==true) prdlay2.style.display=''; else prdlay2.style.display='none';"><font color="red">�̹����߰�2</font>
            <input type="checkbox" name="prdlay_check3" onClick="if(this.checked==true) prdlay3.style.display=''; else prdlay3.style.display='none';"><font color="red">�̹����߰�3</font>
            <input type="checkbox" name="prdlay_check4" onClick="if(this.checked==true) prdlay4.style.display=''; else prdlay4.style.display='none';"><font color="red">�̹����߰�4</font>
            <input type="checkbox" name="prdlay_check5" onClick="if(this.checked==true) prdlay5.style.display=''; else prdlay5.style.display='none';"><font color="red">�̹����߰�5</font> &nbsp; &nbsp;
            <a href="javascript:setImgsize();"><img src="../image/btn_imgsize.gif" align="absmiddle" border="0"></a>
          </td>
			  </tr>
			</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="75%">
            <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
              <tr>
                <td width="20%" class="t_name">���� �̹���</td>
                <td width="80%" class="t_value" colspan="3"><input type="file" name="realimg" class="input"> [GIF, JPG, PNG]<br>�����̹����� ����ϸ� ������ �̹����� �ڵ����� �˴ϴ�.</td>
              </tr>
              <tr>
                <td height="40" class="t_name">
                  ��ǰ��� �̹��� <font color="red">*</font><br>
                  &nbsp;&nbsp;�� ũ�� : <?=$oper_info->prdimg_R?> x <?=$oper_info->prdimg_R?></td>
                <td class="t_value" colspan="3">
                <input type="file" name="prdimg_R" class="input">

                <? if( @file($imgpath."/".$prd_row->prdimg_R) ){ ?>
                <input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_R?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_R?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_R?>';"><?=$prd_row->prdimg_R?></a>)
                <? } ?>

                </td>
              </tr>
              <tr>
                <td height="40" class="t_name">
                  ����̹��� �̹���1<br>
                  &nbsp;&nbsp;�� ũ�� : <?=$oper_info->prdimg_S?> x <?=$oper_info->prdimg_S?></td>
                <td class="t_value" colspan="3">
                <input type="file" name="prdimg_S1" class="input">

                <? if( @file($imgpath."/".$prd_row->prdimg_S1) ){ ?>
                <input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_S1?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_S1?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_S1?>';"><?=$prd_row->prdimg_S1?></a>)
                <? } ?>

                </td>
              </tr>
              <tr>
                <td height="40" class="t_name">
                  ��ǰ�� �̹���1 <font color="red">*</font><br>
                  &nbsp;&nbsp;�� ũ�� : <?=$oper_info->prdimg_M?> x <?=$oper_info->prdimg_M?></td>
                <td class="t_value" colspan="3">
                <input type="file" name="prdimg_M1" class="input">

                <? if( @file($imgpath."/".$prd_row->prdimg_M1) ){ ?>
                <input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_M1?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_M1?>" target="_blank" onMouseOver="document.prdimg1.src='../../data/prdimg/<?=$prd_row->prdimg_M1?>';"><?=$prd_row->prdimg_M1?></a>)
                <? } ?>

                </td>
              </tr>
              <tr>
                <td height="40" class="t_name">
                  Ȯ�� �̹���1 <font color="red">*</font><br>
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
                <td class="t_name">
                  ��� �̹���2</td>
                <td class="t_value" colspan="3">
                <input type="file" name="prdimg_S2" class="input">

                <? if( @file($imgpath."/".$prd_row->prdimg_S2) ){ ?>
                <input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_S2?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_S2?>" target="_blank" onMouseOver="document.prdimg2.src='../../data/prdimg/<?=$prd_row->prdimg_S2?>';"><?=$prd_row->prdimg_S2?></a>)
                <? } ?>

                </td>
              </tr>
              <tr>
                <td class="t_name">
                  �� �̹���2</td>
                <td class="t_value" colspan="3">
                <input type="file" name="prdimg_M2" class="input">

                <? if( @file($imgpath."/".$prd_row->prdimg_M2) ){ ?>
                <input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_M2?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_M2?>" target="_blank" onMouseOver="document.prdimg2.src='../../data/prdimg/<?=$prd_row->prdimg_M2?>';"><?=$prd_row->prdimg_M2?></a>)
                <? } ?>

                </td>
              </tr>
              <tr>
                <td class="t_name">
                  Ȯ�� �̹���2</td>
                <td class="t_value" colspan="3">
                <input type="file" name="prdimg_L2" class="input">

                <? if( @file($imgpath."/".$prd_row->prdimg_L2) ){ ?>
                <input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L2?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_L2?>" target="_blank" onMouseOver="document.prdimg2.src='../../data/prdimg/<?=$prd_row->prdimg_L2?>';"><?=$prd_row->prdimg_L2?></a>)
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
                if(@file($imgpath."/".$prd_row->prdimg_M2))
                	echo "<img src='../../data/prdimg/$prd_row->prdimg_M2' name='prdimg2' width='100'>";
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
                <td class="t_name">
                  ��� �̹���3</td>
                <td class="t_value" colspan="3">
                <input type="file" name="prdimg_S3" class="input">

                <? if( @file($imgpath."/".$prd_row->prdimg_S3) ){ ?>
                <input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_S3?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_S3?>" target="_blank" onMouseOver="document.prdimg3.src='../../data/prdimg/<?=$prd_row->prdimg_S3?>';"><?=$prd_row->prdimg_S3?></a>)
                <? } ?>

                </td>
              </tr>
              <tr>
                <td class="t_name">
                  �� �̹���3</td>
                <td class="t_value" colspan="3">
                <input type="file" name="prdimg_M3" class="input">

                <? if( @file($imgpath."/".$prd_row->prdimg_M3) ){ ?>
                <input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_M3?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_M3?>" target="_blank" onMouseOver="document.prdimg3.src='../../data/prdimg/<?=$prd_row->prdimg_M3?>';"><?=$prd_row->prdimg_M3?></a>)
                <? } ?>

                </td>
              </tr>
              <tr>
                <td class="t_name">
                  Ȯ�� �̹���3</td>
                <td class="t_value" colspan="3">
                <input type="file" name="prdimg_L3" class="input">

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
                <td class="t_name">
                  ��� �̹���4</td>
                <td class="t_value" colspan="3">
                <input type="file" name="prdimg_S4" class="input">

                <? if( @file($imgpath."/".$prd_row->prdimg_S4) ){ ?>
                <input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_S4?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_S4?>" target="_blank" onMouseOver="document.prdimg4.src='../../data/prdimg/<?=$prd_row->prdimg_S4?>';"><?=$prd_row->prdimg_S4?></a>)
                <? } ?>

                </td>
              </tr>
              <tr>
                <td class="t_name">
                  �� �̹���4</td>
                <td class="t_value" colspan="3">
                <input type="file" name="prdimg_M4" class="input">

                <? if( @file($imgpath."/".$prd_row->prdimg_M4) ){ ?>
                <input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_M4?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_M4?>" target="_blank" onMouseOver="document.prdimg4.src='../../data/prdimg/<?=$prd_row->prdimg_M4?>';"><?=$prd_row->prdimg_M4?></a>)
                <? } ?>

                </td>
              </tr>
              <tr>
                <td class="t_name">
                  Ȯ�� �̹���4</td>
                <td class="t_value" colspan="3">
                <input type="file" name="prdimg_L4" class="input">

                <? if( @file($imgpath."/".$prd_row->prdimg_L4) ){ ?>
                <input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L4?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_L4?>" target="_blank" onMouseOver="document.prdimg4.src='../../data/prdimg/<?=$prd_row->prdimg_L4?>';"><?=$prd_row->prdimg_L4?></a>)
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
                <td class="t_name">
                  ��� �̹���5</td>
                <td class="t_value" colspan="3">
                <input type="file" name="prdimg_S5" class="input">

                <? if( @file($imgpath."/".$prd_row->prdimg_S5) ){ ?>
                <input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_S5?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_S5?>" target="_blank" onMouseOver="document.prdimg5.src='../../data/prdimg/<?=$prd_row->prdimg_S5?>';"><?=$prd_row->prdimg_S5?></a>)
                <? } ?>

                </td>
              </tr>
              <tr>
                <td class="t_name">
                  �� �̹���5</td>
                <td class="t_value" colspan="3">
                <input type="file" name="prdimg_M5" class="input">

                <? if( @file($imgpath."/".$prd_row->prdimg_M5) ){ ?>
                <input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_M5?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_M5?>" target="_blank" onMouseOver="document.prdimg5.src='../../data/prdimg/<?=$prd_row->prdimg_M5?>';"><?=$prd_row->prdimg_M5?></a>)
                <? } ?>

                </td>
              </tr>
              <tr>
                <td class="t_name">
                  Ȯ�� �̹���5</td>
                <td class="t_value" colspan="3">
                <input type="file" name="prdimg_L5" class="input">

                <? if( @file($imgpath."/".$prd_row->prdimg_L5) ){ ?>
                <input type="checkbox" name="delimg[]" value="<?=$prd_row->prdimg_L5?>">���� (<a href="/data/prdimg/<?=$prd_row->prdimg_L5?>" target="_blank" onMouseOver="document.prdimg5.src='../../data/prdimg/<?=$prd_row->prdimg_L5?>';"><?=$prd_row->prdimg_L5?></a>)
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
                <td width="100%" class="t_value">
                <iframe width="100%" height="95" frameborder="0" src="prd_relation.php?mode=<?=$mode?>&prdcode=<?=$prdcode?>"></iframe>
                </td>
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
                <td width="15%" class="t_name">�������ּ�</td>
                <td width="85%" class="t_value">
                <textarea name="stortexp" rows="3" cols="90" class="textarea"><?=$prd_row->stortexp?></textarea>
                </td>
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
      <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td></td>
        </tr>
      </table>


      <div id='floater' style='Z-INDEX:1;POSITION:absolute;LEFT:expression(document.body.clientWidth-80);TOP:200'>
      <table>
      <tr><td><input type="image" src="../image/btn_prdsave.gif"></td></tr>
      <tr><td><a href='<?=$listpage_url?>?<?=$param?>''><img src="../image/btn_prdlist.gif" border="0"></a></td></tr>
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
				if(NS) { diffY = self.pageYOffset; diffX = self.pageXOffset; }
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
          	<img src="../image/btn_list_l.gif" style="cursor:hand" onclick="document.location='<?=$listpage_url?>?<?=$param?>';">
          </td>
        </tr>
      </form>
      </table>

<script>setClass01();setCategory();prdlayCheck();lodingComplete();</script>

<? include "../footer.php"; ?>