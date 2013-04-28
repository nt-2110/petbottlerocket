<?php
	require "./header.php";
	require "./DBini.php";
?>
<SCRIPT language="JavaScript"><!--
function inputcheck(){
	if(document.form.team.vlaue == "0"){
		if(document.form.select.value == ""){
			window.alert('学校が選択されていません');
			return false;
		}else if(document.form.add.value == ""){
			window.alert('チーム名を入力してください');
			return false;
		}
	}
	if(document.form.fly.value == ""){
		window.alert('飛行距離を入力してください');
		return false;
	}
}
function onKeyDown(){
	if(event.keyCode == 13){
		event.keyCode = 9;
	}
}
--></SCRIPT>
<?php
	require "./inputfunc.php";
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<form method=GET name=form action=./register.php>
<?php
	select_team();
?>
<?php
	input_fly(4);
?>


</form>
<?php
	require "./footer.php";
?>
