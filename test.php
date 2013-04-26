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
	$url=$_GET['url'];
	if(!strstr($url,".php")){
		print "phpのページではないので終了しました。<br>\n";
	}else{
		$str = file("./".$url);
		print "<br><br>\n";
		require $url;
		print "<br><br>\n";
		foreach($str as $i => $line){
			$line = str_replace("<","&lt;",$line);
			print $line."<br>\n";
		}
	}
	print "<br><br>\n";
}
?>
下のファイル名を選択することで、PHPのバグチェックをします。<br>
※同じディレクトリにファイルが存在しない場合は、チェックができません。
<form method=GET action=<?php print $_SERVER['PHP_SELF']?>>
<select name=url>
<?php
if ($handle = opendir("./")) {
	while (false !== ($file = readdir($handle))) {
		if(substr($file,0,1) == "."){
		}else if($file !== basename($_SERVER['PHP_SELF'])){
		print "<option value=".$file.">".$file."</option>\n";
		}
	}
	closedir($handle);
}
?>
</select>
<br>
<input type=submit value=入力したURLのPHPの動作を確認する>
</form>
</BODY>
</HTML>
