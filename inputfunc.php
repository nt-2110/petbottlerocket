<SCRIPT language="JavaScript"><!--
function ex(text){
	after = "0123456789.........";
	before = "０１２３４５６７８９、。ー：；,-:;";
	str = "";
	for(i=0;i<text.length;i++){
		c = text.charAt(i);
		n = before.indexOf(c,0);
		if(n>=0){
			c = after.charAt(n);
		}
		str += c;
	}
	return str;
}
function teamadd(){
	hiddenteam.style.display="";
	switchteam.style.display="none";
	document.form.addteam.focus();
	document.form.selectteam[0].selected = true;
}
function schooladd(){
	hiddenschool.style.display="";
	switchschool.style.display="none";
	document.form.addschool.focus();
	document.form.selectschool[0].selected = true;
}
--></SCRIPT>
<?php
function input_fly($loop){
	print "飛距離の入力\n";
	print "<br>\n";
	$i=1;
	while($i<=$loop){
		print "<input type=text size=6 name=fly".$i." onblur=\"document.form.fly".$i.".value=ex(document.form.fly".$i.".value)\">m\n";
		print "<br>\n";
		$i++;
	}
}

function select_team(){
require "./DBini.php";
	print "学校とチームを選択\n";
	print "<br>\n";
	print "<select name=selectteam>\n";
	print "<option value=0>未登録のチーム(下で追加する)</option>\n";
	$select_team_sql = "SELECT team.user_id AS id,school.schoolname AS s_name,team.teamname AS t_name FROM team,school WHERE team.school_id=school.school_id";
	//上のSQL文は下のコメントアウトのように簡略化できる
	//$select_team_sql = "SELECT user_id AS id,schoolname AS s_name,teamname AS t_name FROM team,school";
	$select_team_rst = mysql_query($select_team_sql,$con);
	while($stcol = mysql_fetch_array($select_team_rst)){
		print "<option value=".$stcol['id'].">".$stcol['s_name']." ".$stcol['t_name']."</option>\n";
	}
	print "</select>\n";
	print "<br>\n";

	print "<div id=switchteam onclick=teamadd()><u>チームがなかった時はこちら</u></div>\n";
	print "<div id=hiddenteam style=display:none>\n";
	print "チーム名";
	print "<input type=text name=addteam>\n";
	print "<br>\n";
	print "所属する学校名\n";
	print "<select name=selectschool>\n";
	print "<option value=0>未登録の学校（下で追加する）</option>\n";
	$select_school_sql = "SELECT * FROM school";
	$select_school_rst = mysql_query($select_school_sql,$con);
	while($sscol = mysql_fetch_array($select_school_rst)){
		print "<option value=".$sscol['school_id'].">".$sscol['schoolname']."</option>\n";
	}
	print "</select>\n";

	print "<div id=switchschool onclick=schooladd()><u>学校もなかった場合はこちら</u></div>\n";
	print "<div id=hiddenschool style=display:none>\n";
	print "学校名（できるだけ正式名称でお願いします）\n";
	print "<br>\n";
	print "<input type=text name=addschool>\n";
	print "<br>\n";
	print "</div>\n";
	print "<br>\n";
	print "</div>\n";
	mysql_close($con);
}
?>
