<html>
<head>
<title>サンプル</title>
<script type="text/javascript">
<!--
function fnc(){
  document.form.obj[1].selected = true;
}
 
// -->
</script>
</head>
<body>
<form action=sampletest.php method=get name=form>
  <select name="obj">
    <option value="1">東京</option>
    <option value="2">名古屋</option>
    <option value="3">大阪</option>
  </select>
  <input type="button" value="名古屋に位置づける" onclick="fnc()">
  <br><br><br>
  下のボタンで消される文
  <input type="text" name="text">
  <br>
  <input type="button" value="フォームをリセット" onclick="document.form.text.value.reset()">
</form>
<br>
<br>
</body>
</html>
