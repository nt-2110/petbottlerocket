<HTML>
<!DOCTYPE HTML>
<HEAD>
<title>動作テストページ</title>
</HEAD>
<BODY>
以下でphpの動作をテストします。
<br>
<?php
ini_set( 'display_errors', 1 ); 
$flag=0;
if(!empty($_GET[form])){
	$url=$_GET[url];
	if(strstr($url,".php")){
		if(file_exists("./".$url)){
			$flag=1;
		}
	}else if(strstr($url,".")){
		print "phpのページではないので終了しました。<br>\n";
	}else{
		if(file_exists("./".$url.".php")){
			$flag=1;
		}
	}
}
if($flag==1){
	require $url;
}
?>
<form method=GET action=./test.php name=form>
<input type=text name=url>
<br>
<input type=submit value=入力したURLのPHPの動作を確認する
</form>
</BODY>
</HTML>
