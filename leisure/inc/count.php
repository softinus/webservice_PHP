<?if($prdcode){	// 상품코드가 있다면 상품판매현황 카운터 횟수 스크립트를 실행한다.?>
<script type="text/javascript">
// 카운터정보 업데이트
var recounter;
recounter = setInterval("reCountForm('<?=$prdcode?>')",2000);
	// 매개변수1 - 상품코드, 매개변수2, 시간 1초-1000
</script>
<?}?>