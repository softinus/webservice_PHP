<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<?

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "searchopt=$searchopt&keyword=$keyword&birthday=$birthday&memorial=$memorial&age=$age";
$param .= "&address=$address&job=$job&marriage=$marriage&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day";
$param .= "&next_year=$next_year&next_month=$next_month&next_day=$next_day";
//--------------------------------------------------------------------------------------------------

?>
<script language="JavaScript" src="../webedit/WIZEditor.js"></script>
<script language="JavaScript" type="text/javascript">
<!--
function smsCheck(frm){

	if(frm.se_num.value == ""){
		alert("�����º� ��ȣ�� �Է��ϼ���");
		frm.se_num.focus();
		return false;
	}
	if(frm.sms_msg.value == ""){
		alert("������ �Է��ϼ���");
		frm.sms_msg.focus();
		return false;
	}
	frm.action = "member_save.php?<?=$param?>";
	frm.method = "post";
	frm.submit();

}

function calByte(aquery){

	var tmpStr;
	var temp = 0;
	var onechar;
	var tcount = 0;;
	
	tmpStr = new String(aquery);
	temp = tmpStr.length;
	for(k=0; k<temp; k++) {
		onechar = tmpStr.charAt(k);
		if(escape(onechar).length > 4) {
			tcount += 2;
		} else if(onechar != '\n' || onechar != '\r') {
			tcount++;
		}
	
		smsForm.sms_byte.value = tcount+"/80 bytes";
	
		if(tcount > 80) {
			alert("�޽��������� 80 ����Ʈ �̻� ������ �� �����ϴ�.");
	
			cutText(smsForm.sms_msg.value);
	
			return;
		}
	}
	if ( temp == 0 ) {
	
		smsForm.sms_byte.value = "0/80 bytes";
	
	}
}

function cutText(aquery) {

	var tmpStr;
	var temp=0;
	var onechar;
	var tcount = 0;
	
	tmpStr = new String(aquery);
	temp = tmpStr.length;
	for(t=0; t<temp; t++){
		onechar = tmpStr.charAt(t);
		if(escape(onechar).length > 4) {
			tcount += 2;
		} else if(onechar != '\n' || onechar != '\r') {
			tcount++;
		}
		if(tcount > 80) {
			tmpStr = tmpStr.substring(0, t);
			break;
		}
	}
	
	document.smsForm.sms_msg.value = tmpStr;
	
	calByte(tmpStr);
}

function checkSmsmsg(){

	var tmpStr = document.smsForm.sms_msg.value;

	calByte(tmpStr);

}

//-->
</script>

	  <table border="0" cellspacing="0" cellpadding="2">
	    <tr>
	      <td><img src="../image/ic_tit.gif"></td>
	      <td valign="bottom" class="tit">SMS�߼�</td>
	      <td width="2"></td>
	      <td valign="bottom" class="tit_alt">�˻��� ȸ������ SMS�� �߼��մϴ�.</td>
	    </tr>
	  </table>
	  
	  <br>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <form name="searchForm" action="<?=$PHP_SELF?>" method="get">
    <input type="hidden" name="tmp">
    <input type="hidden" name="page" value="<?=$page?>">
    <input type="hidden" name="detailsearch" value="<?=$detailsearch?>">
      <tr>
        <td bgcolor="ffffff">

        <table width="100%" cellpadding="3" cellspacing="1" class="t_style" border="0">
          <tr>
            <td width="15%" class="t_name">���� ����</td>
            <td width="35%" class="t_value"><input type="checkbox" name="birthday" value="Y" <? if($birthday == "Y") echo "checked"; ?>>��</td>
            <td width="15%" class="t_name">���� ��ȥ�����</td>
            <td width="35%" class="t_value"><input type="checkbox" name="memorial" value="Y" <? if($memorial == "Y") echo "checked"; ?>>��</td>
          </tr>
          <tr>
            <td class="t_name">����</td>
            <td class="t_value">
	            <select name="age">
	            <option value="">���ɴ븦 �����ϼ���
	            <option value="10" <? if($age == "10") echo "selected"; ?>>10�� ~ 19��
	            <option value="20" <? if($age == "20") echo "selected"; ?>>20�� ~ 29��
	            <option value="30" <? if($age == "30") echo "selected"; ?>>30�� ~ 39��
	            <option value="40" <? if($age == "40") echo "selected"; ?>>40�� ~ 49��
	            <option value="50" <? if($age == "50") echo "selected"; ?>>50�� ~ 59��
	            <option value="60" <? if($age == "60") echo "selected"; ?>>60�� ~ 69��
	            </select>
            </td>
            <td class="t_name">����</td>
            <td class="t_value">
	            <select name="address">
		         	<option value="">�� �ô����� �����ϼ���.</option>
							<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
							<option value="�λ�" <? if($address == "�λ�") echo "selected"; ?>>�λ�</option>
							<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
							<option value="�뱸" <? if($address == "�뱸") echo "selected"; ?>>�뱸</option>
							<option value="��õ" <? if($address == "��õ") echo "selected"; ?>>��õ</option>
							<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
							<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
							<option value="���" <? if($address == "���") echo "selected"; ?>>���</option>
							<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
							<option value="���" <? if($address == "���") echo "selected"; ?>>���</option>
							<option value="�泲" <? if($address == "�泲") echo "selected"; ?>>�泲</option>
							<option value="���" <? if($address == "���") echo "selected"; ?>>���</option>
							<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
							<option value="����" <? if($address == "����") echo "selected"; ?>>����</option>
							<option value="�泲" <? if($address == "�泲") echo "selected"; ?>>�泲</option>
							<option value="���" <? if($address == "���") echo "selected"; ?>>���</option>
						  </select>
            </td>
          </tr>

          <tr>
            <td class="t_name">����</td>
            <td class="t_value">
	            <select name="job" class="optionjoin">
	            <option value="">������ �����ϼ���.</option>
	            <option value="00" <? if($job == "00") echo "selected"; ?>>����</option>
	            <option value="10" <? if($job == "10") echo "selected"; ?>>�л�</option>
	            <option value="30" <? if($job == "30") echo "selected"; ?>>��ǻ��/���ͳ�</option>
	            <option value="50" <? if($job == "50") echo "selected"; ?>>���</option>
	            <option value="70" <? if($job == "70") echo "selected"; ?>>������</option>
	            <option value="90" <? if($job == "90") echo "selected"; ?>>����</option>
	            <option value="A0" <? if($job == "A0") echo "selected"; ?>>���񽺾�</option>
	            <option value="C0" <? if($job == "C0") echo "selected"; ?>>����</option>
	            <option value="E0" <? if($job == "E0") echo "selected"; ?>>����/����/�����</option>
	            <option value="G0" <? if($job == "G0") echo "selected"; ?>>�����</option>
	            <option value="I0" <? if($job == "I0") echo "selected"; ?>>����</option>
	            <option value="K0" <? if($job == "K0") echo "selected"; ?>>�Ƿ�</option>
	            <option value="M0" <? if($job == "M0") echo "selected"; ?>>����</option>
	            <option value="O0" <? if($job == "O0") echo "selected"; ?>>�Ǽ���</option>
	            <option value="Q0" <? if($job == "Q0") echo "selected"; ?>>������</option>
	            <option value="S0" <? if($job == "S0") echo "selected"; ?>>�ε����</option>
	            <option value="U0" <? if($job == "U0") echo "selected"; ?>>��۾�</option>
	            <option value="W0" <? if($job == "W0") echo "selected"; ?>>��/��/��/�����</option>
	            <option value="Y0" <? if($job == "Y0") echo "selected"; ?>>����</option>
	            <option value="z0" <? if($job == "z0") echo "selected"; ?>>��Ÿ</option>
	            </select>
            </td>
            <td class="t_name">��ȥ����</td>
            <td class="t_value">
	            <input type="radio" name="marriage" value="N" <? if($marriage == "N") echo "checked"; ?>>��ȥ
	            <input type="radio" name="marriage" value="Y" <? if($marriage == "Y") echo "checked"; ?>>��ȥ
            </td>
          </tr>

          <tr>
            <td class="t_name">������</td>
            <td colspan="3" class="t_value">
            <select name="prev_year">
             <?
                if(empty($next_year)) $next_year = date("Y");
                if(empty($next_month)) $next_month = date("n");
                if(empty($next_day)) $next_day = date("d");

                for($ii=2000; $ii <= 2010; $ii++){
                  if($ii == $prev_year) echo "<option value=$ii selected>$ii";
                  else echo "<option value=$ii>$ii";
                }
             ?>
               </select>
               ��
               <select name="prev_month">
                 <?
                for($ii=1; $ii <= 12; $ii++){
                  if($ii<10) $ii = "0".$ii;
                  if($ii == $prev_month) echo "<option value=$ii selected>$ii";
                  else echo "<option value=$ii>$ii";
                }
             ?>
               </select>
               ��
               <select name="prev_day">
                 <?
                for($ii=1; $ii <= 31; $ii++){
                  if($ii<10) $ii = "0".$ii;
                  if($ii == $prev_day) echo "<option value=$ii selected>$ii";
                  else echo "<option value=$ii>$ii";
                }
             ?>
               </select>
               �� ~
               <select name="next_year">
                 <?
                for($ii=2000; $ii <= 2010; $ii++){
                  if($ii == $next_year) echo "<option value=$ii selected>$ii";
                  else echo "<option value=$ii>$ii";
                }
             ?>
               </select>
               ��
               <select name="next_month">
                 <?
                for($ii=1; $ii <= 12; $ii++){
                  if($ii<10) $ii = "0".$ii;
                  if($ii == $next_month) echo "<option value=$ii selected>$ii";
                  else echo "<option value=$ii>$ii";
                }
             ?>
               </select>
               ��
               <select name="next_day">
                 <?
                for($ii=1; $ii <= 31; $ii++){
                  if($ii<10) $ii = "0".$ii;
                  if($ii == $next_day) echo "<option value=$ii selected>$ii";
                  else echo "<option value=$ii>$ii";
                }
             ?>
               </select>
               ��
            </td>
          </tr>
          <tr>
            <td class="t_name">���ǰ˻�</td>
            <td colspan="3" class="t_value">
            <select name="level">
            <option value=""> ��޼���
            <?=level_list();?>
            </select>
            <script language="javascript">
            <!--
            level = document.searchForm.level;
            for(ii=0; ii<level.length; ii++){
             if(level.options[ii].value == "<?=$level?>")
               level.options[ii].selected = true;
             }
            -->
            </script>

            <select name="searchopt" class="select">
            <option value="name" <? if($searchopt == "name") echo "selected"; ?>>����
            <option value="id" <? if($searchopt == "id") echo "selected"; ?>>���̵�
            <option value="resno" <? if($searchopt == "resno") echo "selected"; ?>>�ֹι�ȣ
            <option value="email" <? if($searchopt == "email") echo "selected"; ?>>�̸���
            <option value="tphone" <? if($searchopt == "tphone") echo "selected"; ?>>��ȭ��ȣ
            <option value="hphone" <? if($searchopt == "hphone") echo "selected"; ?>>�޴���
            </select>
	          <input type="text" name="keyword" value="<?=$keyword?>" class="input">
	          <input type="image" src="../image/btn_search.gif" align="absmiddle">
            </td>
          </tr>
          <tr>
            <td class="t_name"><font color=red><b>SMS ����</b></font></td>
            <td colspan="3" class="t_value">
            	<input type="radio" name="resms" value="RJ" <? if($resms == "RJ" || $resms == "") echo "checked"; ?>>���Űź�ȸ�� ����
            	<input type="radio" name="resms" value="RA" <? if($resms == "RA") echo "checked"; ?>>ȸ����ü
            </td>
        	</tr>
        </table>

      </tr>
    </form>
    </table>
    
    <br>
    <?
    	$sql = "select id from wiz_member";
    	$result = mysql_query($sql) or error(mysql_error());
    	$all_total = mysql_num_rows($result);

			$today = date('n-d');
			$toyear = date('Y');

			$age_syear = substr($toyear-($age+9),-2)+1;
			$age_eyear = substr($toyear-$age,-2)+2;

			$join_sdate = $prev_year."-".$prev_month."-".$prev_day;
			$join_edate = $next_year."-".$next_month."-".$next_day;

			$sql = "select id from wiz_member where id != '' ";
			if($level != "") 		$sql .= " and level = '$level'";
			if($prev_year != "") $sql .= " and wdate > '$join_sdate' and wdate <= '$join_edate 23:59:59'";
			if($searchopt != "") $sql .= " and $searchopt like '%$keyword%'";
			if($birthday == "Y") $sql .= " and birthday like '%$today'";
			if($memorial == "Y") $sql .= " and memorial like '%$today'";
			if($age != "")       $sql .= " and resno > '$age_syear' and resno < '$age_eyear'";
			if($address != "")   $sql .= " and address like '%$address%'";
			if($job != "")       $sql .= " and job = '$job'";
			if($marriage != "")  $sql .= " and marriage = '$marriage'";
			if($resms == "RJ" || $resms == "")	$sql .= " and resms != 'N'";
			$sql .=" order by wdate desc";

			$result = mysql_query($sql) or error(mysql_error());
			$total = mysql_num_rows($result);

			$rows = 6;
			$lists = 5;
     	$page_count = ceil($total/$rows);
     	if(!$page || $page > $page_count) $page = 1;
     	$start = ($page-1)*$rows;
     	$no = $total-$start;
    ?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>�� ȸ���� : <b><?=$all_total?></b> , �˻� ȸ���� : <b><?=$total?></b></td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    	<tr><td class="t_rd" colspan="20"></td></tr>
      <tr class="t_th">
        <th align="center">��ȣ</th>
        <th align="center">�̸�</th>
        <th align="center">���̵�/���</th>
        <th align="center">�޴���</th>
        <th align="center">�̸���</th>
        <th align="center">�湮��</th>
        <th align="center">SMS����</th>
        <th align="center">������</th>
      </tr>
      <tr><td class="t_rd" colspan="20"></td></tr>
	   	<?
			$sql = "select id,passwd,name,hphone,email,visit,reemail,resms,wdate from wiz_member where id != '' ";
			if($level != "") 		$sql .= " and level = '$level'";
			if($prev_year != "") $sql .= " and wdate > '$join_sdate' and wdate <= '$join_edate 23:59:59'";
			if($searchopt != "") $sql .= " and $searchopt like '%$keyword%'";
			if($birthday == "Y") $sql .= " and birthday like '%$today'";
			if($memorial == "Y") $sql .= " and memorial like '%$today'";
			if($age != "")       $sql .= " and resno > '$age_syear' and resno < '$age_eyear'";
			if($address != "")   $sql .= " and address like '%$address%'";
			if($job != "")       $sql .= " and job = '$job'";
			if($marriage != "")  $sql .= " and marriage = '$marriage'";
			if($resms == "RJ" || $resms == "")		$sql .= " and resms != 'N'";
			$sql .=" order by wdate desc limit $start, $rows";
	
			$result = mysql_query($sql) or error(mysql_error());
	
	   	while(($row = mysql_fetch_object($result)) && $rows){
	   		if($row->resms == "Y") $row->resms = "��";
	   		else $row->resms = "�ƴϿ�";
	   	?>
      <tr>
        <td align="center" height="30"><?=$no?></td>
        <td align="center"><?=$row->name?></td>
        <td align="center"><?=$row->id?>/<?=$row->passwd?></td>
        <td align="center"><?=$row->hphone?></td>
        <td align="center"><?=$row->email?></td>
        <td align="center"><?=$row->visit?></td>
        <td align="center"><?=$row->resms?></td>
        <td align="center"><?=substr($row->wdate,0,10)?> &nbsp;</td>
      </tr>
      <tr><td colspan="20" class="t_line"></td></tr>
   <?
   		$no--;
       $rows--;
    }

  	if($total <= 0){
  		echo "<tr><td height=30 colspan=10 align=center>��ϵ� ȸ���� �����ϴ�.</td></tr>";
  		echo "<tr><td colspan='20' class='t_line'></td></tr>";
  	}
    ?>
    </table>

  	<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
  		<tr><td height="5"></td></tr>
    	<tr> 
    	  <td width="33%"></td>
        <td width="33%"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
        <td width="33%"></td>
      </tr>
    </table>      

    <br>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <form name="smsForm" onSubmit="return smsCheck(this)">
    <input type="hidden" name="mode" value="memsms">
      <tr>
        <td>
          <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
            <tr>
              <td width="20%" class="t_name">�����º� ��ȣ</td>
              <td width="80%" class="t_value" colspan="3">
              <input type="text" name="se_num" value="<?=$shop_info->shop_tel?>" size="60" class="input">
              </td>
            </tr>
            <tr>
              <td class="t_name">����</td>
              <td class="t_value" colspan="3">
                <textarea name="sms_msg" rows="12" cols="60" class="textarea" onKeyDown="checkSmsmsg();"></textarea>
                <input type="text" name="sms_byte" size="11" style="height:14px; border: 1px solid #91FBFF; ; font-size:8pt; font-family:����; background-color:#91FBFF" value="0/80 bytes" onfocus="this.blur()">
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
      
    <br>
    <table border="0" align="center" cellspacing="0" cellpadding="0">
      <tr>
        <td><input type="image" src="../image/btn_send_l.gif"></td>
      </tr>
    </form>
    </table>

<? include "../footer.php"; ?>