<?php
include("dbc.php");

	$game_name=$_POST['game_name'];
	$competition_name=$_POST['competition_name'];
	$state=$_POST['state'];
	$home_team_name=$_POST['home_team_name'];
	$guest_team_name=$_POST['guest_team_name'];
	$start_time=$_POST['start_time'];
	$end_time=$_POST['end_time'];
	$win_odds=$_POST['win_odds'];
	$lose_odds=$_POST['lose_odds'];
	$draw_odds=$_POST['draw_odds'];
	$create_time=date("Y-m-d h:i:s");
	$game_id = mysql_query("select game_id from game where game_name = '$game_name'");
	$row = mysql_fetch_row($game_id);
	$game_id = $row[0];

	$competition_id = mysql_query("select competition_id from competition where competition_name = '$competition_name' and game_name = '$game_name'");
	$row = mysql_fetch_row($game_id);
	$competition_id = $row[0];

	$home_team_id = mysql_query("select team_id from team where team_name = '$home_team_name' and game_id = '$game_name'");
	$row = mysql_fetch_row($game_id);
	$home_team_id = $row[0];

	$guest_team_id = mysql_query("select team_id from team where team_name = '$guest_team_name' and game_id = '$game_name'");
	$row = mysql_fetch_row($game_id);
	$guest_team_id = $row[0];

	if ($game_id && $competition_name && $information){
	
		$sql="SELECT * FROM competition WHERE game_id = '$game_id' and competition_name = '$competition_name'";
		$res = mysql_query($sql);
		$rows=mysql_num_rows($res);

			if($rows){
						echo "	<!DOCTYPE html>
							  	<html>
								<head>
								<meta charset='utf-8'>
								<title>英雄联盟竞猜信息添加</title>
								</head><script language='javascript'>alert('该竞猜已存在');history.back();</script>
								</html>";
						exit;
					 }
		$sql="insert into competition(game_id,competition_name,information) values('$game_id','$competition_name','$information')"; 
		$res = mysql_query($sql);
			if($res){


?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
	<link rel="shortcut icon" type="image/png" href="http://www.dianjoy.com/wp-content/themes/dian2013/img/logo.png">


    <title>英雄联盟竞猜信息添加</title>

    <link href="/jc-admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="/jc-admin/css/alert.css" rel="stylesheet">

  </head>

  <body>
	<div class="container" style="width:600px">
		<?php
				header("refresh:2;url=/jc-admin/competition_insert.html");
				echo "<div class='alert alert-success'>添加成功！2秒后自动返回</div>";

			}else{
				header("refresh:2;url=/jc-admin/competition_insert.html");
				echo "<div class='alert alert-danger'>添加失败...2秒后自动返回</div>";

			}
			}
			else 
			{
				echo "			<!DOCTYPE html>
							  	<html>
								<head>
								<meta charset='utf-8'>
								<title>竞猜信息添加</title>
								</head><script language='javascript'>alert('信息不完整');history.back();</script>
								</html>";
			}
		?>
    </div>
  </body>
</html>