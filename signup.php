<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Account Applicaion</title>
<style>
.error {color: #FF0000;}
</style>


</head>
<body background="/images/p3.jpg"
style=" background-repeat:no-repeat ;
background-size:100% 100%;
background-attachment: fixed;"
>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "姓名是必填的";
   } else {
     $name = test_input($_POST["name"]);
   }
   
   if (empty($_POST["class"])) {
     $classErr = "班级是必填的";
   } else {
     $class = test_input($_POST["class"]);
   }

   if (empty($_POST["id"])) {
     $idErr = "学号是必填的";
   } else {
     $id = test_input($_POST["id"]);
   }

   if (empty($_POST["phonenum"])) {
     $phonenumErr = "手机号是必填的";
   } else {
     $phonenum = test_input($_POST["phonenum"]);
   }

   if (empty($_POST["email"])) {
     $emailErr = "邮箱是必填的";
   } else {
     $email = test_input($_POST["email"]);
   }

   if (empty($_POST["wechat"])) {
     $wechatErr = "微信是必填的";
   } else {
     $wechat = test_input($_POST["wechat"]);
	   }
	
 if ($_POST["first"]==0 && $_POST["second"]==0 && $_POST["third"]==0) {
  $DepaErr="至少选择一项";
 } else
 if (($_POST["first"]==$_POST["second"]) && !($_POST["first"]==0) || ($_POST["second"]==$_POST["third"])&& !($_POST["second"]==0) || ($_POST["first"]==$_POST["third"]) && !($_POST["first"]==0) ){
  $DepaErr="不能选择两项相同的";
}
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>
<img src="/images/p1.jpg" width="1112" height="67" alt="">


<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 

<!-- <img src="/images/p2.jpg" alt="" width="800"style="position:absolute;right:290px;top:240px;">-->
<!-- <div style="left: 400px; position: absolute; top: 100px;">-->
<center>
<br><br><br><br>
<h1>清华大学机械工程系科协招新报名</h1>
<HR align=center width=1000 color=black SIZE=1>
<br><br>
<h3>姓名:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" value="" size="30" >
<span class="error">* <?php echo $nameErr;?></span>
   <br><br>
班级:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="class"size="30">
<span class="error">* <?php echo $classErr;?></span>
   <br><br>
学号:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="id"size="30">
<span class="error">* <?php echo $idErr;?></span>
   <br><br>
手机号:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="phonenum"size="30">
<span class="error">* <?php echo $phonenumErr;?></span>
   <br><br>
邮箱:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email"size="30">
<span class="error">* <?php echo $emailErr;?></span>
   <br><br>
微信:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="wechat"size="30">
<span class="error">* <?php echo $wechatErr;?></span>
   <br><br>
第一志愿&nbsp;&nbsp;&nbsp;&nbsp;
<select name="first"> ==
<option value="0" disabled selected>请选择你想加入的部门
 <option value="1">科协学习部
 <option value="2">科协项目部
 <option value="3">科协赛事部
 <option value="4">科协俱乐部
</select>
<br><br>
第二志愿&nbsp;&nbsp;&nbsp;&nbsp;
<select name="second"> ==
<option value="0" disabled selected>请选择你想加入的部门
 <option value="1">科协学习部
 <option value="2">科协项目部
 <option value="3">科协赛事部
 <option value="4">科协俱乐部
</select>
<br><br>
第三志愿&nbsp;&nbsp;&nbsp;&nbsp;
<select name="third"> ==
<option value="0" disabled selected>请选择你想加入的部门
 <option value="1">科协学习部
 <option value="2">科协项目部
 <option value="3">科协赛事部
 <option value="4">科协俱乐部
</select>
<br>
<br>
<span class="error"> <?php echo $DepaErr;?></span>

</h3>

<input type="submit">

</center>
</form>


<?php
    header("content-type:text/html;charset=utf-8");
  session_start();
    //接收表单传递的用户名和密码

        $name=$_POST['name'];
        $class=$_POST['class'];
        $id=$_POST['id'];
        $phonenum=$_POST['phonenum'];
        $email=$_POST['email'];
        $wechat=$_POST['wechat'];
        $first=$_POST['first'];
        $second=$_POST['second'];
        $third=$_POST['third'];
  # echo checkDepa();
  # echo $name,' ',$class,' ',$id,' ',$phonenum,' ',$email,' ',$wechat,'first ',$first,'second ',$second,'third ',$third;
 if (!(empty($_POST["name"])) && !(empty($_POST["class"])) && !(empty($_POST["id"]))&& !(empty($_POST["phonenum"]))&& !(empty($_POST["email"]))&& !(empty($_POST["wechat"])) && checkDepa($first, $second, $third)){

  #print("it is right");
        //通过php连接到mysql数据库
 
$dbhost = 'localhost';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = '';          // mysql用户名密码	
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('Could not connect: ' . mysqli_error());
}
echo '数据库连接成功！';

        mysqli_select_db($conn,"test3") or die("Unable to select database!");
      #  echo "我们会尽快处理您的请求并将反馈结果发送至您的邮箱，请耐心等待，谢谢！";


mysqli_query($conn , "set names utf8");

$sql = "INSERT INTO test3 ".
"(name,class,id,phonenum,email,wechat,first,second,third) ".
        "VALUES ".
        "('$name','$class','$id','$phonenum','$email','$wechat','$first','$second','$third')";
$result = mysqli_query( $conn, $sql );
    if (! $result){
   die("data insert error");}

echo "提交成功\n";
mysqli_close($conn);
}

function checkDepa($first, $second, $third) 
{
 if ($first==0 && $second==0 && $third==0) {
   return 0;
 }
   if ( (($first==$second) && !($first==0)) || (($second==$third) && !($second==0)) || (($first==$third) && !($first==0)) ){
  return 0;
} 
return 1; }

?>


</body>
</html>

                                                                          
