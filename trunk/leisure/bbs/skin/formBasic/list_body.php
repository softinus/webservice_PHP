<?
/*
$no					: 글 넘버
$catname		: 카테고리
$re_space		: 답글 깊이
$re_icon		: 답글 아이콘
$subject		: 제목
$lock_icon	: 비밀글 아이콘
$new_icon		: 새글 아이콘
$hot_icon		: 인기글 아이콘
$name				: 이름
$email			: 이메일
$wdate			: 작성일
$count			: 조회수
$comment		: 댓글수
$recom			: 추천
$content		: 글내용
*/
?>
<tr>
	<td align="center" height="28"><?=$no?></td>
	<td align="left" style="word-break:break-all;">
    <table border="0" cellpadding="0" cellspacing="0">
    <tr><td height="1"></td></tr>
    <tr>
      <td rowspan="2" align="center"><?=$prdimg?></td>
      <td style="padding-left:3px"><font class="prdqna"><?=$prdname?></font></td>
    </tr>
    <tr>
    	<td style="padding-left:3px"><?=$catname?> <?=$re_space?><?=$re_icon?><?=$subject?> <?=$comment?> <?=$lock_icon?> <?=$new_icon?> <?=$hot_icon?></td>
    </tr>
    <tr><td height="1"></td></tr>
    </table>
	</td>
	<td align="center"><?=$name?></td>
	<td align="center"><?=$wdate?></td>
	<td align="center"><?=$count?></td>
</tr>
<tr>
	<td height="1" colspan="11" bgcolor="e1e1e1"></td>
</tr>