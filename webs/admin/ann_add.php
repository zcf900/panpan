<?php
include 'conn.php';
session_start();
if (isset($_SESSION['adminname']) and $_SESSION['adminname']==$adminname and $_SESSION['adminpwd']==$adminpwd){
    
}else{
    echo "<script>location.href='login.php';</script>";
    exit();
}

if (isset($_POST["save"])){
    unset($_POST["save"]);
    $str="<?php\n";
    foreach ($_POST as $key=>$value){
        $str.="\$$key=<<<ptann\n$value\nptann;\n";
    }
    $str.="?>";
    $result=$pt->writeto('../data/ann/'.$_SERVER['REQUEST_TIME'].'.php',$str);
    if ($result){
        $msg="1|恭喜您，添加链接成功";
    }else{
        $msg="0|打开失败，文件不存在或不可用";
    }    
    include '../inc/ann.reset.php';
	$url='ann_add.php';    
	echo "<script>location.href='go.php?msg=$msg&url=$url';</script>";
    exit();
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>控制台 - PT小偷</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/form.css" rel="stylesheet" type="text/css" />
<link href="css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<style type="text/css">
td.hover, tr.hover
{
	background-color: #F2F9FD;
}
th.hover, thead td.hover, tfoot td.hover
{
	background-color: ivory;
}
</style>
<script type="text/javascript">
function loginok(form){
	if (form.annname.value==""){
		alert("公告名称不能为空！");
		form.annname.focus();
		return (false);
	}
	if (form.anncontent.value==""){
		alert("公告内容不能为空！");
		form.anncontent.focus();
		return (false);
	}	
	return (true);
}


</script>
</head>
<body>
<div id="currentPosition">
	<p>您当前位置： 系统工具 &raquo; 公告管理</p>
</div>

<div id="rightTop">
	<ul class="subnav">
		<li><span>添加公告</span></li>
        <li><a href="ann_list.php">公告列表</a></li>        
    </ul>
</div>
<div class="tipsblock">
	<ul id="tipslis">
		<li>公告名称和链接地址为必填项</li>
	</ul>
</div>
<div class="info" >
    <form method="post">
        <table class="infoTable">
          <tr>
            <th class="paddingT15"> 公告名称：</th>
            <td class="paddingT15 wordSpacing5">          
    		    <input class="infoTableInput" name="annname" value="" />
                <label class="field_notice">在网站中显示的公告的名称，<b>必填</b></label>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> 公告内容：</th>
            <td class="paddingT15 wordSpacing5">
                <textarea name="anncontent" style="width: 400px;height:200px;"></textarea>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> 添加人：</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" name="annwriter" value="<?php echo $_SESSION['adminname']?>" />
                <span class="gray"><b>强烈建议请修改此项，同时后台登录名不要和你昵称相同。</b></span>
            </td>
          </tr>
          <tr>
            <th class="paddingT15"> 添加时间：</th>
            <td class="paddingT15 wordSpacing5">
                <input class="infoTableInput" name="anndate" value="<?php echo date('Y-m-d H:i:s');?>" />
            </td>
          </tr>         
          <tr>
            <th></th>
            <td class="ptb20">
    			<input class="formbtn" type="submit" name="save" value="添加公告" />
            </td>
          </tr>
        </table>
        
        
  </form>
  </div>
<div id="page_footer">Copyright &copy; 2009 - 2011 <a href="http://www.ptcms.com" target="_blank"> PT小偷 (PTcms.COM) </a> . All Rights Reserved . 豫ICP备10008179号 . <script language="javascript" type="text/javascript" src="http://js.users.51.la/5527487.js"></script></div>
</body>
</html>