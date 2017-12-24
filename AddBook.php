<?php
?>
<html>
<head></head>
<body>
<form name="AddForm" action="ProcessAdd.php" method="post">
    <table align="center">
        <tr>
            <td>图书名称*</td>
            <td><input type="text" name="bookName"></td>
        </tr>
        <tr>
            <td>图书类别*</td>
            <td>
                <select name="selCategory">
                    <?php
                    $link=@mysqli_connect("localhost","root","root","bookshop") or die("找不到数据库");
                    $sql="SELECT categoryId,categoryName FROM categories";
                    mysqli_query($link,"set names utf8");
                    $res=mysqli_query($link,$sql);
                    while (($arr=mysqli_fetch_array($res))!=false)
                    {
                        echo "<option value='{$arr['categoryId']}'>";
                        echo "{$arr['categoryName']}";
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>出版社名*</td>
            <td><input type="text" name="publisher"></td>
        </tr>
        <tr>
            <td>图书作者*</td>
            <td><input type="text" name="author"></td>
        </tr>
        <tr>
            <td>图书价格*</td>
            <td><input type="text" name="price"></td>
        </tr>
        <tr>
            <td>图书简介</td>
            <td><textarea name="jianjie"></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="确认添加"></in></td>
        </tr>
    </table>
</form>
</body>
</html>
