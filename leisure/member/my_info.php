<?
include "../inc/oneday_header.inc"; 			// ��ܵ�����
include "../inc/mem_info.inc"; 						// ȸ�� ����
$page_type = "join";
include "../inc/page_info.inc"; 					// ������ ����
$now_position = "<a href=/>Home</a> &gt; ���������� &gt; ȸ������";
include "../inc/now_position.inc"; 				// ������ġ

// �Է����� ��뿩��
$info_tmp = explode("/",$page_info->addinfo);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_use[$info_tmp[$ii]] = true;
}

// �Է����� �ʼ�����
$info_tmp = explode("/",$page_info->addinfo2);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_ess[$info_tmp[$ii]] = true;
}

?>
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="JavaScript">
<!--
// �Է°� üũ
function inputCheck(frm){
	
	if(frm.passwd.value != ""){
		if(frm.passwd.value.length < 4 || frm.passwd.value.length > 12){ alert("��й�ȣ�� 4 ~ 12�ڸ��Դϴ�"); frm.passwd.focus(); return false; }
		if(frm.passwd2.value.length < 4 || frm.passwd2.value.length > 12){ alert("��й�ȣ�� 4 ~ 12�ڸ��Դϴ�"); frm.passwd2.focus(); return false; }
	}
	if(frm.passwd.value != frm.passwd2.value){ alert("��й�ȣ�� ��ġ���� �ʽ��ϴ�."); return false;}


<? if($info_ess[address] == "true"){ ?>

	if(frm.post.value == ""){alert("�����ȣ�� �Է��ϼ���");frm.post.focus();return false;}
	if(frm.post2.value == ""){alert("�����ȣ�� �Է��ϼ���");frm.post2.focus();return false;}
	if(frm.post.value.length != 3 || frm.post2.value.length != 3){alert("�����ȣ�� �ùٸ��� �ʽ��ϴ�");frm.post.focus();return false;}
	if(frm.address.value == ""){alert("�ּҸ� �Է��ϼ���");frm.address.focus();return false;}
	if(frm.address2.value == ""){alert("���ּҸ� �Է��ϼ���");frm.address2.focus();return false;}

<? } ?>

<? if($info_ess[tphone] == "true"){ ?>

	if(frm.tphone.value == ""){alert("��ȭ��ȣ�� �Է��ϼ���");frm.tphone.focus();return false;
	}else if(!Check_Num(frm.tphone.value)){alert("������ȣ�� ���ڸ� �����մϴ�.");frm.tphone.focus();return false;}

	if(frm.tphone2.value == ""){alert("��ȭ��ȣ�� �Է��ϼ���");frm.tphone2.focus();return false;
	}else if(!Check_Num(frm.tphone2.value)){alert("������ ���ڸ� �����մϴ�.");frm.tphone2.focus();return false;}

	if(frm.tphone3.value == ""){alert("��ȭ��ȣ�� �Է��ϼ���");frm.tphone3.focus();return false;
	}else if(!Check_Num(frm.tphone3.value)){alert("��ȭ��ȣ�� ���ڸ� �����մϴ�");frm.tphone3.focus();return false;}

<? } ?>

<? if($info_ess[hphone] == "true"){ ?>

	if(frm.hphone.value == ""){alert("��ȭ��ȣ�� �Է��ϼ���");frm.hphone.focus();return false;
	}else if(!Check_Num(frm.hphone.value)){alert("��ȭ��ȣ�� ���ڸ� �����մϴ�.");frm.hphone.focus();return false;}

	if(frm.hphone2.value == ""){alert("��ȭ��ȣ�� �Է��ϼ���");frm.hphone2.focus();return false;
	}else if(!Check_Num(frm.hphone2.value)){alert("��ȭ��ȣ�� ���ڸ� �����մϴ�.");frm.hphone2.focus();return false;}

	if(frm.hphone3.value == ""){alert("��ȭ��ȣ�� �Է��ϼ���");frm.hphone3.focus();return false;
	}else if(!Check_Num(frm.hphone3.value)){alert("��ȭ��ȣ�� ���ڸ� �����մϴ�");frm.hphone3.focus();return false;}

<? } ?>

<? if($info_ess[fax] == "true"){ ?>

   if(frm.fax.value == ""){alert("FAX��ȣ�� �Է��ϼ���");frm.fax.focus();return false;
   }else if(!Check_Num(frm.fax.value)){alert("FAX��ȣ�� ���ڸ� �����մϴ�.");frm.fax.focus();return false;}

   if(frm.fax2.value == ""){alert("FAX��ȣ�� �Է��ϼ���");frm.fax2.focus();return false;
   }else if(!Check_Num(frm.fax2.value)){alert("FAX��ȣ�� ���ڸ� �����մϴ�.");frm.fax2.focus();return false;}

   if(frm.fax3.value == ""){alert("FAX��ȣ�� �Է��ϼ���");frm.fax3.focus();return false;
   }else if(!Check_Num(frm.fax3.value)){alert("FAX��ȣ�� ���ڸ� �����մϴ�");frm.fax3.focus();return false;}

<? } ?>

<? if($info_ess[email] == "true"){ ?>

	if(frm.email.value == ""){alert("�̸����� �Է��ϼ���.");frm.email.focus();return false;
	}else if(!check_Email(frm.email.value)){frm.email.focus();return false;}

<? } ?>

<? if($info_ess[birthday] == "true"){ ?>

	if(frm.birthday.value == ""){alert("��������� �Է��ϼ���.");frm.birthday.focus();return false;}
	if(frm.birthday2.value == ""){alert("��������� �Է��ϼ���.");frm.birthday2.focus();return false;}
	if(frm.birthday3.value == ""){alert("��������� �Է��ϼ���.");frm.birthday3.focus();return false;}
	if(frm.bgubun[0].checked == false && frm.bgubun[1].checked == false){alert("��� ������ �����ϼ���.");return false;}

<? } ?>

<? if($info_ess[marriage] == "true"){ ?>

	if(frm.marriage[0].checked == false && frm.marriage[1].checked == false){alert("��ȥ���θ� �����ϼ���.");return false;}

<? } ?>

<? if($info_ess[marriage] == "true"){ ?>

	if(frm.memorial.value == ""){ alert("��ȥ������� �Է��ϼ���.");frm.memorial.focus();return false;}
	if(frm.memorial2.value == ""){alert("��ȥ������� �Է��ϼ���.");frm.memorial2.focus();return false;}
	if(frm.memorial3.value == ""){alert("��ȥ������� �Է��ϼ���.");frm.memorial3.focus();return false;}

<? } ?>

<? if($info_ess[job] == "true"){ ?>

	if(frm.job.value == ""){alert("������ �����ϼ���.");frm.job.focus();return false;}

<? } ?>

<? if($info_ess[scholarship] == "true"){ ?>

	if(frm.scholarship.value == ""){alert("�з��� �����ϼ���.");frm.scholarship.focus();return false;}

<? } ?>

<? if($info_ess[consph] == "true"){ ?>

	var consphLen=frm['consph[]'].length;

	if(consphLen == undefined){
		if( frm['consph[]'].checked == false ){alert("���ɺо߰� ���õ��� �ʾҽ��ϴ�.");frm['consph[]'].focus();return false;  }
	}else {
		var ChkLike=0;
		for(i=0;i<consphLen;i++){if( frm['consph[]'][i].checked == true ){ ChkLike=1; break;}}
		if( ChkLike==0 ){alert("���ɺоߴ� �Ѱ� �̻� �����ϼž� �մϴ�.");frm['consph[]'][0].focus();return false; }
	}

<? } ?>

<? if($info_ess[company] == "true"){ ?>

   if(frm.com_num.value == ""){ alert("����ڵ�Ϲ�ȣ�� �Է��ϼ���.");frm.com_num.focus();return false;}
   if(frm.com_name.value == ""){ alert("��ȣ�� �Է��ϼ���.");frm.com_name.focus();return false;}
   if(frm.com_owner.value == ""){ alert("��ǥ�ڸ��� �Է��ϼ���.");frm.com_owner.focus();return false;}

   if(frm.com_post.value == ""){alert("�����ȣ�� �Է��ϼ���");frm.com_post.focus();return false;}
   if(frm.com_post2.value == ""){alert("�����ȣ�� �Է��ϼ���");frm.com_post2.focus();return false;}
   if(frm.com_post.value.length != 3 || frm.com_post2.value.length != 3){alert("�����ȣ�� �ùٸ��� �ʽ��ϴ�");frm.post.focus();return false;}
   if(frm.com_address.value == ""){alert("�ּҸ� �Է��ϼ���");frm.com_address.focus();return false;}

   if(frm.com_kind.value == ""){ alert("���¸� �Է��ϼ���.");frm.com_kind.focus();return false;}
   if(frm.com_class.value == ""){ alert("������ �Է��ϼ���.");frm.com_class.focus();return false;}

<? } ?>

}

// �����ȣ ã��
function zipSearch(kind){
	var address = eval("document.frm."+kind+"address");
	address.focus();
	var url = "zip_search.php?kind="+kind;
	window.open(url, "zipSearch", "height=300, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");
}
//-->
</script>

<table border=0 cellpadding=0 cellspacing=0 width="1012" align=center>
  <tr>
  	<td align=center>

    <? include "my_menu.php"; ?>

		</td>
	</tr>

	<!-- �⺻���� -->
	<tr><td height="15"></td></tr>
	<tr>
		<td align=center>

				<table border=0 cellpadding=0 cellspacing=0 width=100%>
				<form name="frm" action="<?=$ssl?>/member/my_save.php" method="post" onSubmit="return inputCheck(this)">
				<input type="hidden" name="mode" value="my_info">
				<input type="hidden" name="prev" value="<?=$PHP_SELF?>">
				<tr><td><img src="/images/myshop_m06_01.gif"></td></tr>
				<tr><td height=3 bgcolor=#999999></td></tr>
				<tr>
					<td bgcolor=#F9F9F9 style="padding:10">

						<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
					  	<tr>
					    	<td style="padding:5">

									<table border=0 cellpadding=0 cellspacing=0 width=100%>
									<tr height=28>
										<td><img src="/images/blue_icon.gif"></td>
										<td width=100><img src="/images/form_01_01.gif"></td>
										<td><?=$mem_info->id?></td></tr>
									<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
									<tr height=28>
										<td><img src="/images/blue_icon.gif"></td>
										<td width=100><img src="/images/form_02_01.gif"></td>
										<td><?=$mem_info->name?></td></tr>
									<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
									<tr height=28>
										<td><img src="/images/blue_icon.gif"></td>
										<td><img src="/images/form_02_02.gif"></td>
										<td><?=$mem_info->resno?></td></tr>
									<tr><td colspan=3 bgcolor=#eeeeee></td></tr>

									<tr height=28>
										<td><img src="/images/blue_icon.gif"></td>
										<td><img src="/images/form_01_02.gif"></td>
										<td><input type=password name="passwd" size=20 class="input"><span class="s11"> (4�� �̻��� ����, ����)</span></td></tr>
									<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
									<tr height=28>
										<td><img src="/images/blue_icon.gif"></td>
										<td><img src="/images/form_01_03.gif"></td>
										<td><input type=password name="passwd2" size=20 class="input"></td></tr>
									<tr><td colspan=3 bgcolor=#eeeeee></td></tr>

									<? if($info_use[address] == true){ ?>
									<tr height=28>
										<td><img src="/images/blue_icon.gif"></td>
										<td><img src="/images/form_02_03.gif"></td>
										<td>
										  <input type=text name="post" value="<?=$mem_post[0]?>" size=5 class="input"> -
										  <input type=text name="post2" value="<?=$mem_post[1]?>" size=5 class="input">&nbsp;
										  <a href="javascript:zipSearch('');"><img src="/images/but_find_zip.gif" border=0 align=absmiddle></a>
										</td>
								   </tr>
									<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
									<tr height=28>
										<td><img src="/images/blue_icon.gif"></td>
										<td><img src="/images/form_02_04.gif"></td>
										<td><input type=text name="address" value="<?=$mem_info->address?>" size=80 class="input"></td></tr>
									<tr height=28>
									    <td></td>
										<td></td>
										<td><input type=text name="address2" value="<?=$mem_info->address2?>" size=80 class="input"></td></tr>
									<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
									<? } ?>

									<? if($info_use[tphone] == true){?>
									<tr height=28>
										<td><img src="/images/blue_icon.gif"></td>
										<td><img src="/images/form_02_05.gif"></td>
										<td>
										<input type=text name="tphone" value="<?=$mem_tphone[0]?>" size=3 class="input"> - 
										<input type=text name="tphone2" value="<?=$mem_tphone[1]?>" size=4 class="input"> -
										<input type=text name="tphone3" value="<?=$mem_tphone[2]?>" size=4 class="input">
										</td></tr>
									<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
									<? } ?>

									<? if($info_use[hphone] == true){?>
									<tr height=70>
										<td><img src="/images/blue_icon.gif"></td>
										<td><img src="/images/form_02_06.gif"></td>
										<td>
										<input type=text name="hphone" value="<?=$mem_hphone[0]?>" size=3 class="input"> -
										<input type=text name="hphone2" value="<?=$mem_hphone[1]?>" size=4 class="input"> -
										<input type=text name="hphone3" value="<?=$mem_hphone[2]?>" size=4 class="input"><br>
										���� ���� ���񽺸� �����ðڽ��ϱ�?&nbsp;
										<input name="resms" type="radio" value="Y" <? if($mem_info->resms == "Y" || $mem_info->resms == "") echo "checked"; ?>>��&nbsp;
										<input name="resms" type="radio" value="N" <? if($mem_info->resms == "N") echo "checked"; ?>>�ƴϿ�
										<br><font color="#317FB1">* �ֹ�Ȯ��,��� �����Ȳ,�˸��� ���,�̺�Ʈ ���� ���� ���� �� �帳�ϴ�.</font>
										</td></tr>
									<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
								  <? } ?>

									<? if($info_use[fax] == true){ ?>
									<tr height=28>
										<td><img src="/images/blue_icon.gif"></td>
										<td><img src="/images/com_txt_06.gif"></td>
										<td>
											<input type=text name="fax" size=3 class="input" value="<?=$mem_fax[0]?>"> -
											<input type=text name="fax2" size=4 class="input" value="<?=$mem_fax[1]?>"> -
											<input type=text name="fax3" size=4 class="input" value="<?=$mem_fax[2]?>">
										</td>
									</tr>
									<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
									<? } ?>

									<? if($info_use[email] == true){ ?>
									<tr height=70>
										<td><img src="/images/blue_icon.gif"></td>
										<td><img src="/images/form_02_07.gif"></td>
										<td><input type=text name="email" value="<?=$mem_info->email?>" size=30 class="input">
										<br>�̸��� ���񽺸� �����ðڽ��ϱ�?&nbsp;
										<input name="reemail" type="radio" value="Y" <? if($mem_info->reemail == "Y" || $mem_info->reemail == "") echo "checked"; ?>>��&nbsp;
										<input name="reemail" type="radio" value="N" <? if($mem_info->reemail == "N") echo "checked"; ?>>�ƴϿ�
										<br><font color="#317FB1">* �ֹ�,����,�̺�Ʈ ��������, �� ��ȿ���� ���� �̸����� ���� �Ұ�</font>
										</td></tr>
									<? } ?>

									</table>

								</td>
							</tr>
						</table>

					</td>
				</tr>
			  </table>

		</td>
	</tr>

<?
if($info_use[birthday] != false ||
$info_use[marriage] != false ||
$info_use[memorial] != false ||
$info_use[job] != false ||
$info_use[scholarship] != false ||
$info_use[consph] != false
){
?>
  <!-- �ΰ����� -->
  <tr><td height="15"></td></tr>
	<tr>
		<td align=center>
			<table border=0 cellpadding=0 cellspacing=0 width="100%">
				<tr><td><img src="/images/myshop_m06_02.gif"></td></tr>
				<tr><td bgcolor=#999999 height=3></td></tr>
				<tr>
					<td bgcolor=#F9F9F9 style="padding:10">

						<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
					  	<tr>
					    	<td style="padding:5">

									<table border=0 cellpadding=0 cellspacing=0 width=100%>

									<? if($info_use[birthday] == true){ ?>
									<tr height=28>
										<td><img src="/images/blue_icon.gif"></td>
										<td width=100><img src="/images/form_03_01.gif"></td>
										<td>
										<input type=text name="birthday" value="<?=$mem_birthday[0]?>" size=8 class="input">��
										<input type=text name="birthday2" value="<?=$mem_birthday[1]?>" size=5 class="input">��
										<input type=text name="birthday3" value="<?=$mem_birthday[2]?>" size=5 class="input">��&nbsp;&nbsp;
										(<input name="bgubun" type="radio" value="S" <? if($mem_info->bgubun == "S") echo "checked"; ?>>���
										<input name="bgubun" type="radio" value="M" <? if($mem_info->bgubun == "M") echo "checked"; ?>>����)</td></tr>
									<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
									<? } ?>

									<? if($info_use[marriage] == true){ ?>
									<tr height=28>
										<td><img src="/images/blue_icon.gif"></td>
										<td><img src="/images/form_03_02.gif"></td>
										<td><input name="marriage" type="radio" value="N" <? if($mem_info->marriage == "N") echo "checked"; ?>>��ȥ
										<input name="marriage" type="radio" value="Y" <? if($mem_info->marriage == "Y") echo "checked"; ?>>��ȥ</td></tr>
									<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
									<? } ?>

									<? if($info_use[memorial] == true){ ?>
									<tr height=28>
										<td><img src="/images/blue_icon.gif"></td>
										<td><img src="/images/form_03_03.gif"></td>
										<td>
										<input type=text name="memorial" value="<?=$mem_memorial[0]?>" size=8 class="input">��
										<input type=text name="memorial2" value="<?=$mem_memorial[1]?>" size=5 class="input">��
										<input type=text name="memorial3" value="<?=$mem_memorial[2]?>" size=5 class="input">��
										&nbsp;&nbsp;</td></tr>
									<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
									<? } ?>

									<? if($info_use[job] == true){ ?>
									<tr height=28>
										<td><img src="/images/blue_icon.gif"></td>
										<td><img src="/images/form_03_04.gif"></td>
										<td>
										<select name="job">
			              <option selected>�׸��� ���� �� �ּ���</option>
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
									</tr>
									<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
									<script language="javascript">
									<!--
									job = document.frm.job;
									for(ii=0; ii<job.length; ii++){
										if(job.options[ii].value == "<?=$mem_info->job?>")
										job.options[ii].selected = true;
									}
									-->
									</script>
									<? } ?>

									<? if($info_use[scholarship] == true){ ?>
									<tr height=28>
										<td><img src="/images/blue_icon.gif"></td>
										<td><img src="/images/form_03_05.gif"></td>
										<td>
										<select name="scholarship">
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
						      </tr>
									<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
									<script language="javascript">
			            <!--
			            scholarship = document.frm.scholarship;
			            for(ii=0; ii<scholarship.length; ii++){
			              if(scholarship.options[ii].value == "<?=$mem_info->scholarship?>")
			              scholarship.options[ii].selected = true;
			            }
			            -->
			            </script>
									<? } ?>

									<? if($info_use[consph] == true){ ?>
									<tr height=28>
										<td><img src="/images/blue_icon.gif"></td>
										<td><img src="/images/form_03_06.gif"></td>
										<td>
										<?
										$arrconsph = explode("/",$mem_info->consph);
										for($ii=0; $ii<count($arrconsph); $ii++){
											$tmpconsph[$arrconsph[$ii]] = true;
										}
										?>
				            <input type="checkbox" name="consph[]" value="01" <? if($tmpconsph["01"]==true) echo "checked";?>> �ǰ�
			              <input type="checkbox" name="consph[]" value="02" <? if($tmpconsph["02"]==true) echo "checked";?>> ��ȭ/����
			              <input type="checkbox" name="consph[]" value="03" <? if($tmpconsph["03"]==true) echo "checked";?>> ����
			              <input type="checkbox" name="consph[]" value="04" <? if($tmpconsph["04"]==true) echo "checked";?>> ����/����
			              <input type="checkbox" name="consph[]" value="05" <? if($tmpconsph["05"]==true) echo "checked";?>> ����
			              <input type="checkbox" name="consph[]" value="06" <? if($tmpconsph["06"]==true) echo "checked";?>> ����/����<br>
			              <input type="checkbox" name="consph[]" value="07" <? if($tmpconsph["07"]==true) echo "checked";?>> ��Ȱ
			              <input type="checkbox" name="consph[]" value="08" <? if($tmpconsph["08"]==true) echo "checked";?>> ������
			              <input type="checkbox" name="consph[]" value="09" <? if($tmpconsph["09"]==true) echo "checked";?>> ����
			              <input type="checkbox" name="consph[]" value="10" <? if($tmpconsph["10"]==true) echo "checked";?>> ��ǻ��
			              <input type="checkbox" name="consph[]" value="11" <? if($tmpconsph["11"]==true) echo "checked";?>> �й�
			              </td>
			            </tr>
									<? } ?>
									</table>

								</td>
							</tr>
						</table>

					</td>
				</tr>
			</table>

		</td>
	</tr>
<? } ?>

<!--�������-->
<? if($info_use[company] != false) { ?>
<tr><td style="padding:10 0 5 0" valign=bottom><img src="/images/com_tit.gif"></td></tr>
<tr><td height=3 bgcolor=#999999></td></tr>
<tr>
	<td bgcolor=#F9F9F9 style="padding:10">

			<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
			  <tr>
			    <td style="padding:5">
						<table border=0 cellpadding=0 cellspacing=0 width=100%>

						  <tr height=28>
								<td><img src="/images/blue_icon.gif"></td>
								<td width=100 align="left"><img src="/images/com_txt_01.gif"></td>
								<td>
									<input name="com_num" value="<?=$mem_info->com_num?>" type="text" class="input">
								</td>
							</tr>
						  <tr><td colspan=3 bgcolor=#eeeeee></td></tr>

						  <tr height=28>
								<td><img src="/images/blue_icon.gif"></td>
								<td width=100 align="left"><img src="/images/com_txt_02.gif"></td>
								<td>
									<input name="com_name" value="<?=$mem_info->com_name?>" type="text" class="input">
								</td>
							</tr>
						  <tr><td colspan=3 bgcolor=#eeeeee></td></tr>

						  <tr height=28>
								<td><img src="/images/blue_icon.gif"></td>
								<td width=100 align="left"><img src="/images/com_txt_07.gif"></td>
								<td>
									<input name="com_owner" value="<?=$mem_info->com_owner?>" type="text" class="input">
								</td>
							</tr>
						  <tr><td colspan=3 bgcolor=#eeeeee></td></tr>

							<tr height=28>
								<td><img src="/images/blue_icon.gif"></td>
								<td><img src="/images/form_02_03.gif"></td>
								<td>
									<input type=text name="com_post" value="<?=$mem_com_post[0]?>" size=5 class="input"> -
									<input type=text name="com_post2" value="<?=$mem_com_post[1]?>" size=5 class="input">&nbsp;
									<a href="javascript:zipSearch('com_');"><img src="/images/but_find_zip.gif" border=0 align=absmiddle></a>
								</td>
							</tr>
							<tr height=28>
								<td></td>
								<td></td>
								<td><input type=text name="com_address" value="<?=$mem_info->com_address?>" size=80 class="input"></td>
							</tr>
						  <tr><td colspan=3 bgcolor=#eeeeee></td></tr>

						  <tr height=28>
								<td><img src="/images/blue_icon.gif"></td>
								<td width=100 align="left"><img src="/images/com_txt_05.gif"></td>
								<td>
									<input name="com_kind" value="<?=$mem_info->com_kind?>" type="text" class="input">
								</td>
							</tr>
						  <tr><td colspan=3 bgcolor=#eeeeee></td></tr>

						  <tr height=28>
								<td><img src="/images/blue_icon.gif"></td>
								<td width=100 align="left"><img src="/images/com_txt_08.gif"></td>
								<td>
									<input name="com_class" value="<?=$mem_info->com_class?>" type="text" class="input">
								</td>
							</tr>
						  <tr><td colspan=3 bgcolor=#eeeeee></td></tr>

						</table>
					</td>
				</tr>
			</table>

		</td>
	</tr>
	<? } ?>

  <tr><td height="10"></td></tr>
	<tr>
		<td colspan="5" align="center">
			<input type="image" src="/images/btn_confirm.gif" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="/images/btn_cancel.gif" border="0" onClick="history.go(-1);" style="cursor:hand">
		</td>
	</tr>
</form>
</table>

<?

include "../inc/oneday_footer.inc"; 		// �ϴܵ�����

?>