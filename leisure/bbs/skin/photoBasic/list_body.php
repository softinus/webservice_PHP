<?
/*
$no					: �� �ѹ�
$catname		: ī�װ�
$re_space		: ��� ����
$re_icon		: ��� ������
$subject		: ����
$lock_icon	: ��б� ������
$new_icon		: ���� ������
$hot_icon		: �α�� ������
$name				: �̸�
$email			: �̸���
$wdate			: �ۼ���
$count			: ��ȸ��
$comment		: ��ۼ�
$recom			: ��õ
$content		: �۳���
$upimg_s		: ���̹���

$viewImg		: ��â���� ū �̹��� ����
$viewBbs		: �Խñ� ����

$idx				: �Խù� ������
$line				: ������ > �Խ��ǰ��� > �ش� �Խ��� > �ٹٲ� �Խù� ���� �Է��� ��
						  �ش� ����ŭ �Խù��� ������ �ٹٲ��ϰԵ˴ϴ�.
*/
?>

<? if($idx%$line == 0) echo "<tr>"; ?>

  <td width=168 align=center>
    <table border=0 width="135"  height="166" background="<?=$skin_dir?>/image/picture_bg.gif">
      <tr><td align="center" height="25"><a href="<?=$viewBbs?>"><img src="<?=$upimg_s?>" border="0" width="120" height="120"></a></td></tr>
   </table>
   <table style="layout:fixed;">
		<tr><td style="word-break:break-all;"><b><?=$subject?> <?=$comment?></b></td></tr>
   </table>
   <?=$hide_recom_start?>
   <table>
		<tr><td style="word-break:break-all;" align="center">��õ : <?=$recom?></td></tr>
   </table>
    <?=$hide_recom_end?>
  </td>