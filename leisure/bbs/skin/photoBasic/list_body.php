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
$upimg_s		: 소이미지

$viewImg		: 새창으로 큰 이미지 보기
$viewBbs		: 게시글 보기

$idx				: 게시물 증가값
$line				: 관리자 > 게시판관리 > 해당 게시판 > 줄바꿈 게시물 수에 입력한 값
						  해당 값만큼 게시물이 나오고 줄바꿈하게됩니다.
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
		<tr><td style="word-break:break-all;" align="center">추천 : <?=$recom?></td></tr>
   </table>
    <?=$hide_recom_end?>
  </td>