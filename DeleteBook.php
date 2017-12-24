<?php
$bookId=$_GET["bId"];
//var_dump($bookId);
$link=@mysqli_connect("localhost","root","root","bookshop") or die("找不到数据库");
mysqli_query($link,"set names utf8");
$sql="DELETE FROM books WHERE bookId={$bookId}";
$res=mysqli_query($link,$sql);
$row=mysqli_affected_rows($link);
if($row==1)
{
    //echo "success";
    header("Location:Index.php?success=3");
}

else
{
    echo "fault";
    //header("Location:Index.php?fault=2");
}