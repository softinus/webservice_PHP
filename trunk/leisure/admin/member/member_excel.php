<?
if($exceldown != "ok"){
?>
<html>
<head>
<title>:: ȸ������ �ٿ�ε� ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function selBasic(frm){

	frm.c_id.checked = true;
	frm.c_passwd.checked = true;
	frm.c_name.checked = true;
	frm.c_resno.checked = true;
	frm.c_email.checked = true;
	frm.c_tphone.checked = true;
	frm.c_hphone.checked = true;
	frm.c_level.checked = false;
	frm.c_post.checked = true;
	frm.c_address.checked = true;
	frm.c_recom.checked = false;
	frm.c_reserve.checked = true;
	frm.c_reemail.checked = false;
	frm.c_resms.checked = false;

	frm.c_marriage.checked = false;
	frm.c_memorial.checked = false;
	frm.c_job.checked = false;
	frm.c_scholarship.checked = false;
	frm.c_birthday.checked = false;
	frm.c_consph.checked = false;

}

function selAll(frm){

	frm.c_id.checked = true;
	frm.c_passwd.checked = true;
	frm.c_name.checked = true;
	frm.c_resno.checked = true;
	frm.c_email.checked = true;
	frm.c_tphone.checked = true;
	frm.c_hphone.checked = true;
	frm.c_level.checked = true;
	frm.c_post.checked = true;
	frm.c_address.checked = true;
	frm.c_recom.checked = true;
	frm.c_reserve.checked = true;
	frm.c_reemail.checked = true;
	frm.c_resms.checked = true;

	frm.c_marriage.checked = true;
	frm.c_memorial.checked = true;
	frm.c_job.checked = true;
	frm.c_scholarship.checked = true;
	frm.c_birthday.checked = true;
	frm.c_consph.checked = true;

}
//-->
</script>
</head>

<body leftmargin="5" topmargin="5">

<table><tr><td height="5"></td></tr></table>

<table width="98%" border="0" cellpadding="3" cellspacing="6" class="t_style" align="center">
<form name="frm" action="" method="post">
<input type="hidden" name="exceldown" value="ok">

<input type="hidden" name="searchopt" value="<?=$searchopt?>">
<input type="hidden" name="keyword" value="<?=$keyword?>">
<input type="hidden" name="birthday" value="<?=$birthday?>">
<input type="hidden" name="memorial" value="<?=$memorial?>">
<input type="hidden" name="age" value="<?=$age?>">
<input type="hidden" name="address" value="<?=$address?>">
<input type="hidden" name="job" value="<?=$job?>">
<input type="hidden" name="marriage" value="<?=$marriage?>">

<input type="hidden" name="prev_year" value="<?=$prev_year?>">
<input type="hidden" name="prev_month" value="<?=$prev_month?>">
<input type="hidden" name="prev_day" value="<?=$prev_day?>">

<input type="hidden" name="next_year" value="<?=$next_year?>">
<input type="hidden" name="next_month" value="<?=$next_month?>">
<input type="hidden" name="next_day" value="<?=$next_day?>">

  <tr>
    <td bgcolor="ffffff">
    <table><tr><td></td></tr></table>
     <table cellspacing="2" cellpadding="0" border="0">
       <tr>
        <td><font color="2369C9"><b>���ñ���</b></font></td>
        <td><input type="radio" name="sel_gubun" onClick="selBasic(this.form);" checked><font color="red"><b>�⺻����</b></font></td>
		  <td><input type="radio" name="sel_gubun" onClick="selAll(this.form);"><font color="red"><b>��ü����</b></font></td>
		  <td></td>
		  <td></td>
		</tr>
		<tr><td height="6"></td></tr>
      <tr>
        <td width="80"><font color="2369C9"><b>�⺻����</b></font></td>
        <td width="100"><input type="checkbox" name="c_id" value="Y" checked>���̵�</td>
		  <td width="100"><input type="checkbox" name="c_passwd" value="Y" checked>��й�ȣ</td>
		  <td width="100"><input type="checkbox" name="c_name" value="Y" checked>�̸�</td>
		  <td width="100"><input type="checkbox" name="c_resno" value="Y" checked>�ֹι�ȣ</td>
		</tr>
		<tr>
		  <td></td>
		  <td><input type="checkbox" name="c_email" value="Y" checked>�̸���</td>
		  <td><input type="checkbox" name="c_tphone" value="Y" checked>��ȭ��ȣ</td>
		  <td><input type="checkbox" name="c_hphone" value="Y" checked>�޴���</td>
		  <td><input type="checkbox" name="c_level" value="Y">ȸ�����</td>
		</tr>
       <tr>
		  <td></td>
		  <td><input type="checkbox" name="c_post" value="Y" checked>�����ȣ</td>
		  <td><input type="checkbox" name="c_address" value="Y" checked>�ּ�</td>
		  <td><input type="checkbox" name="c_recom" value="Y">��õ��</td>
		  <td><input type="checkbox" name="c_reserve" value="Y" checked>������</td>
		</tr>
		<tr>
		  <td></td>
		  <td><input type="checkbox" name="c_reemail" value="Y">�̸��� ����</td>
		  <td><input type="checkbox" name="c_resms" value="Y">SMS ����</td>
		  <td></td>
		  <td></td>
		</tr>
	   <tr><td height="6"></td></tr>
		<tr>
		   <td><font color="2369C9"><b>��Ÿ����</b></font></td>
			<td><input type="checkbox" name="c_marriage" value="Y">��ȥ ����</td>
			<td><input type="checkbox" name="c_memorial" value="Y">��ȥ�����</td>
			<td><input type="checkbox" name="c_job" value="Y">����</td>
			<td><input type="checkbox" name="c_scholarship" value="Y">�з�</td>
		</tr>
		<tr>
		  <td></td>
			<td><input type="checkbox" name="c_birthday" value="Y">�������</td>
			<td><input type="checkbox" name="c_consph" value="Y">���ɺо�</td>
			<td></td>
			<td></td>
		</tr>
    </table>
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

</td></tr></table>
</body>
</html>
<?
}else{

	include "../../inc/common.inc";
	include "../../inc/util.inc";

	$level_info = level_info();

	$filename = "ȸ������[".date('Ymd')."].xls";

	header( "Content-type: application/vnd.ms-excel" );
	header( "Content-Disposition: attachment; filename=$filename" );
	header( "Content-Description: PHP4 Generated Data" );

	$sql = "select id from wiz_member";
	$result = mysql_query($sql) or error(mysql_error());
	$all_total = mysql_num_rows($result);


	$today = date('n-d');
	$toyear = date('Y');

	$age_syear = substr($toyear-($s_age+9),-2)+1;
	$age_eyear = substr($toyear-$s_age,-2)+2;

	$join_sdate = $prev_year."-".$prev_month."-".$prev_day;
	$join_edate = $next_year."-".$next_month."-".$next_day;


	$sql = "select * from wiz_member where id != ''";
	if($level != "") $sql .= " and level = '$level'";
	if($prev_year != "") $sql .= " and wdate > '$join_sdate' and wdate <= '$join_edate 23:59:59'";
	if($searchopt != "")   $sql .= " and $searchopt like '%$searchkey%'";
	if($s_birthday == "Y") $sql .= " and birthday like '%$today'";
	if($s_memorial == "Y") $sql .= " and memorial like '%$today'";
	if($s_age != "")       $sql .= " and resno > '$age_syear' and resno < '$age_eyear'";
	if($s_address != "")   $sql .= " and address like '%$s_address%'";
	if($s_job != "")       $sql .= " and job = '$s_job'";
	if($s_marriage != "")  $sql .= " and marriage = '$s_marriage'";
	$sql .=" order by wdate desc";

	$result = mysql_query($sql) or error(mysql_error());
	$total = mysql_num_rows($result);


	if($c_id == "Y") $excel_title .= "���̵�	";
	if($c_passwd == "Y") $excel_title .= "��й�ȣ	";
	if($c_name == "Y") $excel_title .= "�̸�	";
	if($c_resno == "Y") $excel_title .= "�ֹι�ȣ	";
	if($c_email == "Y") $excel_title .= "�̸���	";
	if($c_tphone == "Y") $excel_title .= "��ȭ��ȣ	";
	if($c_hphone == "Y") $excel_title .= "�޴���	";
	if($c_level == "Y") $excel_title .= "ȸ�����	";
	if($c_post == "Y") $excel_title .= "�����ȣ	";
	if($c_address == "Y") $excel_title .= "�ּ�	";
	if($c_recom == "Y") $excel_title .= "��õ��	";
	if($c_reserve == "Y") $excel_title .= "������	";
	if($c_reemail == "Y") $excel_title .= "�̸��� ����	";
	if($c_resms == "Y") $excel_title .= "SMS����	";
	
	if($c_marriage == "Y") $excel_title .=  "��ȥ����	";
	if($c_memorial == "Y") $excel_title .=  "��ȥ�����	";
	if($c_job == "Y") $excel_title .=  "����	";
	if($c_scholarship == "Y") $excel_title .=  "�з�	";
	if($c_birthday == "Y") $excel_title .=  "�������	";
	if($c_consph == "Y") $excel_title .=  "���ɺо�	";

	echo $excel_title."\n";


	while($row = mysql_fetch_object($result)){

		$re_sql = "select sum(reserve) as reserve from wiz_reserve where memid='$row->id'";
		$re_result = mysql_query($re_sql);
		$re_row = mysql_fetch_object($re_result);
		$reserve = $re_row->reserve;

		$level = $level_info[$row->level][name];
		$excel_data = "";

		$consph = "";
		$job = "";
		$scholarship = "";
		
    $arrconsph = explode("/",$row->consph);

     for($ii=0; $ii<count($arrconsph); $ii++){

     		$tmpconsph = "";

	     	switch($arrconsph[$ii]) {
	     		case "01" : $tmpconsph = "�ǰ�"; break;
	     		case "02" : $tmpconsph = "��ȭ/����"; break;
	     		case "03" : $tmpconsph = "����"; break;
	     		case "04" : $tmpconsph = "����/����"; break;
	     		case "05" : $tmpconsph = "����"; break;
	     		case "06" : $tmpconsph = "����/����"; break;
	     		case "07" : $tmpconsph = "��Ȱ"; break;
	     		case "08" : $tmpconsph = "������"; break;
	     		case "09" : $tmpconsph = "����"; break;
	     		case "10" : $tmpconsph = "��ǻ��"; break;
	     		case "11" : $tmpconsph = "�й�"; break;
	     	}

	     	if(!empty($tmpconsph)) $consph .= $tmpconsph.",";

     }

    switch($row->job) {
    	case "00" : $job = "����"; break;
    	case "10" : $job = "�л�"; break;
    	case "30" : $job = "��ǻ��/���ͳ�"; break;
    	case "50" : $job = "���"; break;
    	case "70" : $job = "������"; break;
    	case "90" : $job = "����"; break;
    	case "A0" : $job = "���񽺾�"; break;
    	case "C0" : $job = "����"; break;
    	case "E0" : $job = "����/����/�����"; break;
    	case "G0" : $job = "�����"; break;
    	case "I0" : $job = "����"; break;
    	case "K0" : $job = "�Ƿ�"; break;
    	case "M0" : $job = "����"; break;
    	case "O0" : $job = "�Ǽ���"; break;
    	case "Q0" : $job = "������"; break;
    	case "S0" : $job = "�ε����"; break;
    	case "U0" : $job = "��۾�"; break;
    	case "W0" : $job = "��/��/��/�����"; break;
    	case "Y0" : $job = "����"; break;
    	case "z0" : $job = "��Ÿ"; break;
    }

    switch($row->scholarship) {
    	case "0" : $scholarship = "����"; break;
    	case "1" : $scholarship = "�ʵ��б�����"; break;
    	case "2" : $scholarship = "�ʵ��б�����"; break;
    	case "4" : $scholarship = "���б�����"; break;
    	case "6" : $scholarship = "���б�����"; break;
    	case "7" : $scholarship = "����б�����"; break;
    	case "9" : $scholarship = "����б�����"; break;
    	case "H" : $scholarship = "���б�����"; break;
    	case "J" : $scholarship = "���б�����"; break;
    	case "O" : $scholarship = "���п�����"; break;
    	case "Z" : $scholarship = "���п������̻�"; break;
    }

		if($c_id == "Y") $excel_data .= $row->id."	";
		if($c_passwd == "Y") $excel_data .= $row->passwd."	";
		if($c_name == "Y") $excel_data .= $row->name."	";
		if($c_resno == "Y") $excel_data .= $row->resno."	";
		if($c_email == "Y") $excel_data .= $row->email."	";
		if($c_tphone == "Y") $excel_data .= $row->tphone."	";
		if($c_hphone == "Y") $excel_data .= $row->hphone."	";
		if($c_level == "Y") $excel_data .= $level."	";
		if($c_post == "Y") $excel_data .= $row->post."	";
		if($c_address == "Y") $excel_data .= $row->address." ".$row->address2."	";
		if($c_recom == "Y") $excel_data .= $row->recom."	";
		if($c_reserve == "Y") $excel_data .= $reserve."	";
		if($c_reemail == "Y") $excel_data .= $row->reemail."	";
		if($c_resms == "Y") $excel_data .= $row->resms."	";

		if($c_marriage == "Y") $excel_data .= $row->marriage."	";
		if($c_memorial == "Y") $excel_data .= $row->memorial."	";
		if($c_job == "Y") $excel_data .= $job."	";
		if($c_scholarship == "Y") $excel_data .= $scholarship."	";
		if($c_birthday == "Y") $excel_data .= $row->birthday."	";
		if($c_consph == "Y") $excel_data .= $consph."	";

		echo $excel_data."\n";

	}

}
?>