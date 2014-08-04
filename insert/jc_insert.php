<?php
ob_start();
session_start();
$mysql_servername = "localhost"; //主机地址
$mysql_username = "root"; //数据库用户名
$mysql_password =""; //数据库密码
$mysql_database ="jc-admin"; //数据库
mysql_connect($mysql_servername , $mysql_username , $mysql_password);
mysql_select_db($mysql_database); 
mysql_query("set character set 'utf8'");//读库
mysql_query("set names 'utf8'");//写库

if(mysqli_connect_errno())
{
echo "连接数据库失败";
exit;
}
?>
<!DOCTYPE html>
<html  lang="zh-cn">
<head>
<meta charset="utf-8">
<link rel="shortcut icon" type="image/png" href="http://www.dianjoy.com/wp-content/themes/dian2013/img/logo.png">

    <title>竞猜信息添加</title>

    <!-- Bootstrap core CSS -->
    <link href="/jc-admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/jc-admin/css/bootstrap-select.css" rel="stylesheet">
    <link href="/jc-admin/css/insert.css" rel="stylesheet">
    <link href="/jc-admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

  </head>

  <body>
<div class="container">

      <form class="form-signin" action="/jc-admin/inc/jc_insert_submit.php" method="post" role="form">
        <div class="well" style="text-align:center">
        <h3 class="form-signin-heading">竞猜信息添加</h3>
        </div>
            <div style="text-align:center">
              <select class="selectpicker"  data-style="btn-primary"  name='game_name'>
              <optgroup label="游戏名称">
                <?php
                $game_id=$_GET['game_id'];
                if ($game_id) {
                  $sql="select * from game where game_id = '$game_id'";
                  $result=mysql_query($sql);
                  $row=mysql_fetch_row($result);

                  echo  "<option value='$row[1]'>$row[1]</option>";
                } else {
                  $sql="select * from game"; 
                  $result=mysql_query($sql);  
                  $row=mysql_fetch_row($result); 
          
                  while($row){  
                    echo 
                        "<option value='$row[1]'>$row[1]</option>"; 
                  $row=mysql_fetch_row($result); 
                  }
                }
                ?>
              </optgroup>
              </select>
            </div>
            <div style="text-align:center">
              <select class="selectpicker"  data-style="btn-primary"  name='competition_name'>
              <optgroup label="赛事名称">
                <?php
                  $sql="select * from competition where game_id = '1'"; 
                  $result=mysql_query($sql);  
                  $row=mysql_fetch_row($result); 
          
                  while($row){  
                    echo 
                        "<option value='$row[2]'>$row[2]</option>"; 
                  $row=mysql_fetch_row($result); 
                  }  
                ?>
              </optgroup>
              </select>
            </div>
            <div style="text-align:center">
              <select class="selectpicker"  data-style="btn-primary"  name='state'>
              <optgroup label="状态">
              <option value='未赛'>未赛</option>
              <option value='已赛'>已赛</option>
              </optgroup>
              </select>
            </div>
            <div style="text-align:center">
              <select class="selectpicker"  data-style="btn-primary"  name='home_team_name'>
              <optgroup label="主队">
                <?php
                  $sql="select * from team where game_id = '1'"; 
                  $result=mysql_query($sql);  
                  $row=mysql_fetch_row($result); 
          
                  while($row){  
                    echo 
                        "<option value='$row[2]'>$row[2]</option>"; 
                  $row=mysql_fetch_row($result); 
                  }  
                ?>
              </optgroup>
              </select>
            </div>
            <div style="text-align:center">
              <select class="selectpicker"  data-style="btn-primary"  name='guest_team_name'>
              <optgroup label="客队">
                <?php
                  $sql="select * from team where game_id = '1'"; 
                  $result=mysql_query($sql);  
                  $row=mysql_fetch_row($result); 
          
                  while($row){  
                    echo 
                        "<option value='$row[2]'>$row[2]</option>"; 
                  $row=mysql_fetch_row($result); 
                  }  
                ?>
              </optgroup>
              </select>
            </div>
        <input type="text" class="form-control" placeholder="开始下注时间:" name="start_time" id="time1"><br>      
        <input type="text" class="form-control" placeholder="截止下注时间:" name="end_time" id="time2"><br>      
        <input type="text" class="form-control" placeholder="胜赔率:" name="win_odds" required autofocus>
        <br />
        <input type="text" class="form-control" placeholder="负赔率:" name="lose_odds" required>
        <br />
        <input type="text" class="form-control" placeholder="平赔率:" name="draw_odds" required>
        <br />
      <div style="text-align:center">
        <button class="btn btn-primary" type="submit">&nbsp&nbsp提交&nbsp&nbsp</button>
        <button class="btn btn-default" type="reset">&nbsp&nbsp清空&nbsp&nbsp</button>
      </div>
      <br />
      <button type="button" class="btn btn-block btn-primary" onclick="location.href='/jc-admin/index.php'">返回主页</button>
      </form>
        


  </div>
  <script src="/jc-admin/js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="/jc-admin/js/bootstrap.js" type="text/javascript"></script>
  <script src="/jc-admin/js/bootstrap-select.js" type="text/javascript"></script>
  <script src="/jc-admin/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    $("#time1").datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'});
    $("#time2").datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'});

  </script> 

  <script type="text/javascript">  
      window.onload=function(){  
          $('.selectpicker').selectpicker();  
      };  
  </script>
</body>
</html>