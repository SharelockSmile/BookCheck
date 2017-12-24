<?php
if(isset($_GET['a'])&&$_GET['a']==1)
{
    echo "<script>alert('没做任何修改')</script>";
}
$bId=$_GET['bId'];
$link=@mysqli_connect("localhost","root","root","bookshop") or die("找不到数据库");
mysqli_query($link,"set names utf8");
$sql="select bookName,categoryId,publisher,author,price,detail from books WHERE bookId={$bId}";
$res=mysqli_query($link,$sql);
$arr=mysqli_fetch_array($res);
//var_dump($arr);
$bName=$arr['bookName'];
$cateId=$arr['categoryId'];
$publisher=$arr['publisher'];
$author=$arr['author'];
$price=$arr['price'];
$detail=$arr['detail'];
?>
<form name="AddForm" action="ProccessAlert.php" method="post">
    <table align="center">
        <tr>
            <td>图书名称*</td>
            <td><input type="text" name="bookName" value="<?php echo $bName;?>"></td>
        </tr>
        <tr>
            <td>图书类别*</td>
            <td>
                <select name="selCategory">
                    <?php
                    $sql="SELECT categoryId,categoryName FROM categories";
                    mysqli_query($link,"set names utf8");
                    $res=mysqli_query($link,$sql);
                    while (($array=mysqli_fetch_array($res))!=false)
                    {
                        echo "<option value='{$array['categoryId']}' ";
                        echo $array['categoryId']==$cateId?'selected':'' ;
                        echo ">";

                        echo "{$array['categoryName']}";
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>出版社名*</td>
            <td><input type="text" name="publisher" value="<?php echo $publisher;?>"></td>
        </tr>
        <tr>
            <td>图书作者*</td>
            <td><input type="text" name="author" value="<?php echo $author;?>"></td>
        </tr>
        <tr>
            <td>图书价格*</td>
            <td><input type="text" name="price" value="<?php echo $price;?>"></td>
        </tr>
        <tr>
            <td>图书简介</td>
            <td><textarea name="detail"><?php echo $detail;?></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="确认修改"></in></td>
        </tr>
    </table>
</form>

