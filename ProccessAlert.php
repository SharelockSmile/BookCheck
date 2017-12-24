<?php
$bname=$_POST['bookName'];
$cateId=$_POST['selCategory'];
$publisher=$_POST['publisher'];
$author=$_POST['author'];
$price=$_POST['price'];
$detail=$_POST['detail'];
$link=@mysqli_connect("localhost","root","root","bookshop") or die("找不到数据库");
mysqli_query($link,"set names utf8");
if($detail=="")
{
    $sql="INSERT INTO books VALUES (NULL,'{$cateId}','{$bname}','{$publisher}','{$author}',{$price},null)";
}
else
{
    $sql="INSERT INTO books VALUES (NULL,'{$cateId}','{$bname}','{$publisher}','{$author}',{$price},'{$detail}')";
}
$res = mysqli_query($link, $sql);
$row=mysqli_affected_rows($link);
if($row)
{
    echo "<div>添加成功,立即查看,如果你的浏览器没有自动跳转,<a href='Index.php'>请点击这里</a></div>";
    echo "<script>
setTimeout(function() {window.location.href='Index.php';
},3000)
</script>";
}
else
    {
        header("Loaction:Alert?a=1");
    }



/**
 * Created by PhpStorm.
 * User: MM
 * Date: 2017/5/20
 * Time: 11:38
 */