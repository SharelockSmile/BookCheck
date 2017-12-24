<?php
    //var_dump($_POST);
    $bname=$_POST['bookName'];
    $cateId=$_POST['selCategory'];
    $publisher=$_POST['publisher'];
    $author=$_POST['author'];
    $price=$_POST['price'];
    $detail=$_POST['jianjie'];

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
        if ($res) {
            //echo "注册成功，是否立即登录";
            //浏览器跳转
            echo "<div>添加成功,立即查看,如果你的浏览器没有自动跳转,<a href='Login.php'>请点击这里</a></div>";
            echo "<script>
setTimeout(function() {window.location.href='Index.php';
},3000)
</script>";
        }
        else
            {
                echo "fault";
            }
?>