<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
// ������ �Ķ���� (�˻������� ������ �ʵ���)
//------------------------------------------------------------------------------------------------------------------------------------
$param = "searchopt=$searchopt&searchkey=$searchkey&s_birthday=$s_birthday&s_memorial=$s_memorial&s_age=$s_age";
$param .= "&s_address=$s_address&s_job=$s_job&s_marriage=$s_marriage&prev_year=$prev_year&prev_month=$prev_month&prev_day=$prev_day";
$param .= "&next_year=$next_year&next_month=$next_month&next_day=$next_day&page=$page";
//------------------------------------------------------------------------------------------------------------------------------------

$sql = "select * from wiz_page where type='join'";
$result = mysql_query($sql) or die($sql);
$page_info = mysql_fetch_array($result);
$arr_pageinfo = explode("/",$page_info[addinfo]);



// ȸ������
$sql = "select * from wiz_member where id = '$id'";
$result = mysql_query($sql) or error(mysql_error());
$meminfo = mysql_fetch_object($result);

// ���ֹ���(�ֹ� ���̺�)
$sql = "select sum(total_price) as total_price from wiz_order where send_id = '$id' and status = 'SY'";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$total_price = $row->total_price;

// ������
$sql = "select sum(reserve) as reserve from wiz_reserve where memid = '$id'";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$reserve = $row->reserve;
?>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="javascript">
<!--
function inputCheck(frm){
   
   if(frm.id.value == ""){
      alert("���̵� �Է��ϼ���");
      frm.id.focus();
      return false;
   }
   if(frm.passwd.value == ""){
      alert("��й�ȣ�� �Է��ϼ���");
      frm.passwd.focus();
      return false;
   }
   
}

// �� ���Ϲ߼�
function sendEmail(seluser){
	var url = "send_email.php?seluser=" + seluser;
	window.open(url,"sendEmail","height=620, width=700, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// �� sms�߼�
function sendSms(seluser){
	var url = "send_sms.php?seluser=" + seluser;
	window.open(url,"sendSms","height=350, width=350, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// ȸ���� ���ų���
function orderList(id,name){
	var url = "member_order.php?id=" + id + "&name=" + name;
	window.open(url,"orderList","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}


// ȸ���� �����ݳ���
function reserveList(id,name){
	var url = "member_reserve.php?id=" + id + "&name=" + name;
	window.open(url,"reserveList","height=400, width=600, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// �ּ�ã��
function searchZip(kind){
	var url = "../member/search_zip.php?kind=" + kind;
	window.open(url,"searchZip","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// ���̵� �ߺ�Ȯ��
function idCheck(){
   var id = document.frm.id.value;
   var url = "../member/id_check.php?name=id&id=" + id;
   window.open(url, "idCheck", "width=350, height=150, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, left=150, top=150");
}
-->
</script>

	  <table border="0" cellspacing="0" cellpadding="2">
	    <tr>
	      <td><img src="../image/ic_tit.gif"></td>
	      <td valign="bottom" class="tit">ȸ�����</td>
	      <td width="2"></td>
	      <td valign="bottom" class="tit_alt">ȸ�������� �����մϴ�.</td>
	    </tr>
	  </table>
	  
	  <br>	 
		<table width="100%" border="0" cellspacing="0" cellpadding="2">
		  <tr>
		    <td class="tit_sub"><img src="../image/ics_tit.gif"> �⺻����</td>
		  </tr>
		</table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <form name="frm" action="member_save.php?<?=$param?>" method="post" onSubmit="return inputCheck(this);">
    <input type="hidden" name="tmp">
    <input type="hidden" name="mode" value="<?=$mode?>">
      <tr>
        <td>
          <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
            <tr> 
              <td width="15%" class="t_name">���̵�</td>
              <td width="35%" class="t_value">
              	<input name="id" type="text" value="<?=$meminfo->id?>" class="input" readonly>
              	<? if(strcmp($mode, "update")) { ?>
              	<img src="../image/btn_idcheck.gif" style="cursor:hand" align="absmiddle" onCLick="idCheck()">
								<? } ?>
             	</td>
              <td width="15%" class="t_name">��й�ȣ</td>
              <td width="35%" class="t_value"><input name="passwd" type="text" value="<?=$meminfo->passwd?>" class="input"></td>
            </tr>
            <tr> 
              <td class="t_name">�̸�</td>
              <td class="t_value"><input name="name" type="text" value="<?=$meminfo->name?>" class="input"></td>


<?if(in_array("resno",$arr_pageinfo)){?>
              <td class="t_name">�ֹι�ȣ</td>
              <td class="t_value">
                <? list($resno, $resno2) = explode("-",$meminfo->resno); ?>
                <input type="text" name="resno" value="<?=$resno?>" size="9" class="input"> - 
                <input type="text" name="resno2" value="<?=$resno2?>" size="9" class="input">
              </td>
<?}else{?>
			<td></td>
			<td></td>
<?}?>
            </tr>
            <tr> 
<?if(in_array("email",$arr_pageinfo)){?>
              <td class="t_name">�̸���</td>
              <td class="t_value"><input name="email" type="text" value="<?=$meminfo->email?>" class="input"> <a href="javascript:sendEmail('<?=$meminfo->name?>:<?=$meminfo->email?>')";><img src="../image/btn_send_s.gif" border="0" align="absmiddle"></a></td>
<?}else{?>
			<td></td>
			<td></td>
<?}?>
<?if(in_array("tphone",$arr_pageinfo)){?>
              <td class="t_name">��ȭ��ȣ</td>
              <td class="t_value">
                <? list($tphone, $tphone2, $tphone3) = explode("-",$meminfo->tphone); ?>
                <input type="text" name="tphone" value="<?=$tphone?>" size="5" class="input"> - 
                <input type="text" name="tphone2" value="<?=$tphone2?>" size="5" class="input"> - 
                <input type="text" name="tphone3" value="<?=$tphone3?>" size="5" class="input">
              </td>
<?}else{?>
			<td></td>
			<td></td>
<?}?>
            </tr>
            <tr> 
<?if(in_array("hphone",$arr_pageinfo)){?>
              <td class="t_name">�޴���</td>
              <td class="t_value">
                <? list($hphone, $hphone2, $hphone3) = explode("-",$meminfo->hphone); ?>
                <input type="text" name="hphone" value="<?=$hphone?>"  size="5" class="input"> - 
                <input type="text" name="hphone2" value="<?=$hphone2?>"  size="5" class="input"> - 
                <input type="text" name="hphone3" value="<?=$hphone3?>"  size="5" class="input"> 
                <? if(!strcmp($shop_info->sms_use, "Y")) { ?>
                <a href="javascript:sendSms('<?=$meminfo->hphone?>')";><img src="../image/btn_send_s.gif" border="0" align="absmiddle"></a>
              	<? } ?>
              </td>
<?}else{?>
			<td></td>
			<td></td>
<?}?>
<?if(in_array("fax",$arr_pageinfo)){?>
              <td class="t_name">FAX</td>
              <td class="t_value">
                <? list($fax, $fax2, $fax3) = explode("-",$meminfo->fax); ?>
                <input type="text" name="fax" value="<?=$fax?>"  size="5" class="input"> - 
                <input type="text" name="fax2" value="<?=$fax2?>"  size="5" class="input"> - 
                <input type="text" name="fax3" value="<?=$fax3?>"  size="5" class="input"> 
              </td>
<?}else{?>
			<td></td>
			<td></td>
<?}?>
            </tr>
            <tr>
              <td class="t_name">ȸ�����</td>
              <td class="t_value" colspan="3">
                <select name="level">
                <option value="">::����::
                <?=level_list();?>
                </select>
                <script language="javascript">
                <!--
                 level = document.frm.level;
                 for(ii=0; ii<level.length; ii++){
                    if(level.options[ii].value == "<?=$meminfo->level?>")
                       level.options[ii].selected = true;
                 }
                -->
                </script>
              </td>
            </tr>
<?if(in_array("address",$arr_pageinfo)){?>
            <tr> 
              <td class="t_name">�����ȣ</td>
              <td class="t_value" colspan="3">
                <? list($post, $post2) = explode("-",$meminfo->post); ?>
                <input name="post" type="text" value="<?=$post?>" size="5" class="input"> - 
                <input name="post2" type="text" value="<?=$post2?>" size="5" class="input"> 
                <img src="../image/btn_post.gif" style="cursor:hand" align="absmiddle" onClick="searchZip('');">
              </td>
            </tr>
            <tr> 
              <td class="t_name">�ּ�</td>
              <td class="t_value" colspan="3">
              <input name="address" type="text" value="<?=$meminfo->address?>" size="60" class="input"><br>
              <input name="address2" type="text" value="<?=$meminfo->address2?>" size="60" class="input">
              </td>
            </tr>
<?}?>
            <tr> 
              <td class="t_name">��õ��</td>
              <td class="t_value"><input name="recom" type="text" value="<?=$meminfo->recom?>" class="input"></td>
              <td class="t_name">�����湮��</td>
              <td class="t_value"><?=$meminfo->visit_time?></td>
            </tr>
            <tr> 
              <td class="t_name">�̸��� ����</td>
              <td class="t_value">
                <input type="radio" name="reemail" value="Y" <? if($meminfo->reemail == "Y") echo "checked"; ?>>��
                <input type="radio" name="reemail" value="N" <? if($meminfo->reemail == "N") echo "checked"; ?>>�ƴϿ�
              </td>
              <td class="t_name">SMS ����</td>
              <td class="t_value">
                <input type="radio" name="resms" value="Y" <? if($meminfo->resms == "Y") echo "checked"; ?>>��
                <input type="radio" name="resms" value="N" <? if($meminfo->resms == "N") echo "checked"; ?>>�ƴϿ�
              </td>
            </tr>
            <tr> 
              <td class="t_name">���ֹ���</td>
              <td class="t_value"><a href=javascript:orderList('<?=$id?>','<?=$row->name?>')><?=number_format($total_price)?>�� <img src="../image/btn_dview_s.gif" border="0" align="absmiddle"></a></td>
              <td class="t_name">������</td>
              <td class="t_value"><a href=javascript:reserveList('<?=$id?>','<?=$row->name?>')><?=number_format($reserve)?>�� <img src="../image/btn_dview_s.gif" border="0" align="absmiddle"></a></td>
            </tr>
            <tr> 
              <td height="25" class="t_name">�������ּ�</td>
              <td class="t_value" colspan="3">
              <textarea name="comment" rows="5" cols="90" class="textarea"><?=$meminfo->comment?></textarea>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    
<?if( in_array("marriage",$arr_pageinfo) || in_array("memorial",$arr_pageinfo) || in_array("job",$arr_pageinfo)  || in_array("job",$arr_pageinfo) || in_array("scholarship",$arr_pageinfo) || in_array("birthday",$arr_pageinfo) || in_array("consph",$arr_pageinfo)){?>
    <br>
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
		  <tr>
		    <td class="tit_sub"><img src="../image/ics_tit.gif"> �ΰ�����</td>
		  </tr>
		</table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
          <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
            <tr>
<?if(in_array("marriage",$arr_pageinfo)){?>
              <td width="15%" class="t_name"> ��ȥ ����</td>
              <td width="35%" class="t_value">
                <input type="radio" name="marriage" value="N" <? if($meminfo->marriage == "N") echo "checked"; ?>>��ȥ 
                <input type="radio" name="marriage" value="Y" <? if($meminfo->marriage == "Y") echo "checked"; ?>>��ȥ
              </td>
<?}else{?>
				<td></td>
				<td></td>
<?}?>
<?if(in_array("memorial",$arr_pageinfo)){?>
              <td width="15%" class="t_name">��ȥ�����</td>
              <td width="35%" class="t_value">
                <? list($memorial, $memorial2, $memorial3) = explode("-", $meminfo->memorial); ?>
                <input name="memorial" value="<?=$memorial?>" type="text" size="4" maxlength="4" class="input">�� 
                <input name="memorial2" value="<?=$memorial2?>"  type="text" size="2" maxlength="2" class="input">�� 
                <input name="memorial3" value="<?=$memorial3?>"  type="text" size="2" maxlength="2" class="input">��
              </td>
<?}else{?>
				<td></td>
				<td></td>
<?}?>
            </tr>
            <tr> 
<?if(in_array("job",$arr_pageinfo)){?>
              <td class="t_name">����</td>
              <td class="t_value">
								<select name="job" class="optionjoin">
								<option value="" selected>�׸��� ���� �� �ּ���</option>
								<option value="00">����</option>
								<option value="10">�л�</option>
								<option value="30">��ǻ��/���ͳ�</option>
								<option value="50">���</option>
								<option value="70">������</option>
								<option value="90">����</option>
								<option value="A0">���񽺾�</option>
								<option value="C0">����</option>
								<option value="E0">����/����/�����</option>
								<option value="G0">�����</option>
								<option value="I0">����</option>
								<option value="K0">�Ƿ�</option>
								<option value="M0">����</option>
								<option value="O0">�Ǽ���</option>
								<option value="Q0">������</option>
								<option value="S0">�ε����</option>
								<option value="U0">��۾�</option>
								<option value="W0">��/��/��/�����</option>
								<option value="Y0">����</option>
								<option value="z0">��Ÿ</option>
								</select>
              </td>

<?}else{?>
				<td></td>
				<td></td>
<?}?>
<?if(in_array("scholarship",$arr_pageinfo)){?>
              <td class="t_name">�з�</td>
              <td class="t_value">
								<select name="scholarship" class="optionjoin">
								<option value="" selected>�׸��� ���� �� �ּ���</option>
								<option value="0">����</option>
								<option value="1">�ʵ��б�����</option>
								<option value="2">�ʵ��б�����</option>
								<option value="4">���б�����</option>
								<option value="6">���б�����</option>
								<option value="7">����б�����</option>
								<option value="9">����б�����</option>
								<option value="H">���б�����</option>
								<option value="J">���б�����</option>
								<option value="O">���п�����</option>
								<option value="Z">���п������̻�</option>
								</select> 
              </td>
            <script language="javascript">
              <!--
                job = document.frm.job;
                for(ii=0; ii<job.length; ii++){
                   if(job.options[ii].value == "<?=$meminfo->job?>")
                      job.options[ii].selected = true;
                }
                
                scholarship = document.frm.scholarship;
                for(ii=0; ii<scholarship.length; ii++){
                   if(scholarship.options[ii].value == "<?=$meminfo->scholarship?>")
                      scholarship.options[ii].selected = true;
                }
              -->
            </script>
<?}else{?>
				<td></td>
				<td></td>
<?}?>
            </tr>
            <tr> 
<?if(in_array("birthday",$arr_pageinfo)){?>
              <td class="t_name">�������</td>
              <td class="t_value" colspan="3">
              <? list($birthday, $birthday2, $birthday3) = explode("-", $meminfo->birthday); ?>
               <input name="birthday" value="<?=$birthday?>" type="text" class="input" id="26" size="4" maxlength="4">�� 
               <input name="birthday2" value="<?=$birthday2?>" type="text" class="input" id="27" size="2" maxlength="2">�� 
               <input name="birthday3" value="<?=$birthday3?>" type="text" class="input" id="28" size="2" maxlength="2">�� ( 
               <input type="radio" name="bgubun" value="S" <? if($meminfo->bgubun == "S") echo "checked"; ?>>��� 
               <input type="radio" name="bgubun" value="M" <? if($meminfo->bgubun == "M") echo "checked"; ?>>���� )
              </td>
<?}else{?>
				<td></td>
				<td></td>
<?}?>
            </tr>
            <tr> 
<?if(in_array("consph",$arr_pageinfo)){?>
              <td class="t_name">���ɺо�</td>
              <td class="t_value" colspan="3">
               <?
                   $arrconsph = explode("/",$meminfo->consph);
                   for($ii=0; $ii<count($arrconsph); $ii++){
                      $tmpconsph[$arrconsph[$ii]] = true;
                   }
               ?>
               <input type="checkbox" name="consph[]" value="01" <? if($tmpconsph["01"]==true) echo "checked";?>> �ǰ� 
                <input type="checkbox" name="consph[]" value="02" <? if($tmpconsph["02"]==true) echo "checked";?>> ��ȭ/���� 
                <input type="checkbox" name="consph[]" value="03" <? if($tmpconsph["03"]==true) echo "checked";?>> ���� 
                <input type="checkbox" name="consph[]" value="04" <? if($tmpconsph["04"]==true) echo "checked";?>> ����/���� 
                <input type="checkbox" name="consph[]" value="05" <? if($tmpconsph["05"]==true) echo "checked";?>> ���� 
                <input type="checkbox" name="consph[]" value="06" <? if($tmpconsph["06"]==true) echo "checked";?>> ����/����<br>&nbsp;
                <input type="checkbox" name="consph[]" value="07" <? if($tmpconsph["07"]==true) echo "checked";?>> ��Ȱ 
                <input type="checkbox" name="consph[]" value="08" <? if($tmpconsph["08"]==true) echo "checked";?>> ������ 
                <input type="checkbox" name="consph[]" value="09" <? if($tmpconsph["09"]==true) echo "checked";?>> ���� 
                <input type="checkbox" name="consph[]" value="10" <? if($tmpconsph["10"]==true) echo "checked";?>> ��ǻ�� 
                <input type="checkbox" name="consph[]" value="11" <? if($tmpconsph["11"]==true) echo "checked";?>> �й�
              </td>
<?}else{?>
				<td></td>
				<td></td>
<?}?>
            </tr>
          </table></td>
      </tr>
    </table>
<?}?>    
<?if(in_array("company",$arr_pageinfo)){?>
    <br>
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
		  <tr>
		    <td class="tit_sub"><img src="../image/ics_tit.gif"> �������</td>
		  </tr>
		</table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
          <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
            <tr>
              <td width="15%" class="t_name"> ����ڵ�Ϲ�ȣ</td>
              <td width="35%" class="t_value">
              	<input type="text" name="com_num" value="<?=$meminfo->com_num?>" class="input">
              </td>
              <td width="15%" class="t_name">��ȣ</td>
              <td width="35%" class="t_value">
              	<input type="text" name="com_name" value="<?=$meminfo->com_name?>" class="input">
              </td>
            </tr>
            <tr>
              <td class="t_name"> ��ǥ�ڸ�</td>
              <td class="t_value" colspan="3">
              	<input type="text" name="com_owner" value="<?=$meminfo->com_owner?>" class="input">
              </td>
            </tr>
            <tr> 
              <td class="t_name">�����ȣ</td>
              <td class="t_value" colspan="3">
                <? list($post, $post2) = explode("-",$meminfo->com_post); ?>
                <input name="com_post" type="text" value="<?=$post?>" size="5" class="input"> - 
                <input name="com_post2" type="text" value="<?=$post2?>" size="5" class="input"> 
                <img src="../image/btn_post.gif" style="cursor:hand" align="absmiddle" onClick="searchZip('com_');">
              </td>
            </tr>
            <tr> 
              <td class="t_name">�ּ�</td>
              <td class="t_value" colspan="3">
              <input name="com_address" type="text" value="<?=$meminfo->com_address?>" size="60" class="input">
              </td>
            </tr>
            <tr>
              <td class="t_name"> ����</td>
              <td class="t_value">
              	<input type="text" name="com_kind" value="<?=$meminfo->com_kind?>" class="input">
              </td>
              <td class="t_name">����</td>
              <td class="t_value">
              	<input type="text" name="com_class" value="<?=$meminfo->com_class?>" class="input">
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <?}?>
    <br>
    <table align="center" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
        	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
        	<img src="../image/btn_list_l.gif" style="cursor:hand" onClick="document.location='member_list.php?<?=$param?>';">
        </td>
      </tr>
    </form>
    </table>

<? include "../footer.php"; ?>