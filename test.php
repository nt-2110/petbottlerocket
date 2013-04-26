<!DOCTYPE HTML>
<HTML>
<HEAD>
<title>動作テストページ</title>
</HEAD>
<BODY>
<?php
if(!empty($_GET['url'])){
	print "以下でphpの動作をテストします。\n<br>\n";
	ini_set( 'display_errors',1 );
	$flag = 0;
	$url=$_GET['url'];
	if(strstr($url,".php")){
		if(file_exists("./".$url)){
			$flag=1;
		}
	}else if(strstr($url,".")){
		print "phpのページではないので終了しました。<br>\n";
	}else{
		if(file_exists("./".$url.".php")){
			$url=$url.".php";
			$flag=1;
		}
	}
	if($flag==1){
		$str=file("./".$url);
		echo "<br><br>\n";
		require $url;
		echo "<br><br>\n";
		foreach($str as $i => $line){
			$line=str_replace("<","&lt;",$line);
			echo $line."<br>\n";
		}
	}
	print "<br><br>\n";
}
?>
ファイル名を入力することで、PHPのバグチェックをします。<br>
<form method=GET action=./test.php>
<input type=text name=url>
<br>
<input type=submit value=入力したURLのPHPの動作を確認する>
</form>
</BODY>
</HTML>
