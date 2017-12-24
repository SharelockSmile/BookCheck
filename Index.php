<?php
$link=@mysqli_connect("localhost","root","root","bookshop") or die("找不到数据库");
mysqli_query($link,"set names utf8");
?>
<html>
<head>
    <style type="text/css">
        table
        {
            width: 900px;
            border-collapse:collapse;
        }
        table tr th,table tr td
        {
            border: solid 2px darkolivegreen;
            text-align: center;
        }
        #divPage
        {
            width: 400px;
            height: 50px;
            margin: 20px auto;
            text-align: center;
            line-height: 50px;
        }
    </style>
    <script type="text/javascript">
        function deleteFn() {
            return confirm("是否要删除该用户?");
        }
    </script>
</head>
<body>
    <h1 align="center">图书管理</h1>
    <table align="center">
        <tr>
            <th>图书编号</th>
            <th>丛书类别</th>
            <th>丛书名</th>
            <th>出版社名</th>
            <th>作者</th>
            <th>价格</th>
            <th>修改</th>
            <th>添加</th>
            <th>删除</th>
        </tr>
        <?php
            $totalRow="";    //总条数
            $totalPage="";    //总页数
            $currentPage=1;    //起始页
            $starIndex=0;    //每一页起始索引
            $pageRow=3;    //每一页显示条数
            $sql="SELECT COUNT(bookId)AS nums FROM books";
            $res=mysqli_query($link,$sql);
            $num=mysqli_num_rows($res);
            if($num==1)
            {
                $arr=mysqli_fetch_array($res);
                $totalRow=$arr['nums'];
                $totalPage=ceil($totalRow/$pageRow);
            }
            else
                {
                    echo "";
                }
                //求当前页
        if(isset($_GET['page']))
        {
            $currentPage=$_GET['page'];
            if($_GET['page']<1)
            {
                header("Location:Index.php?page=1");
            }
            elseif ($_GET['page']>$totalPage)
            {
                header("Location:Index.php?page={$totalPage}");
            }
        }
        //求当前页索引
        $starIndex=($currentPage-1)*$pageRow;
        $sql="SELECT bookId,categoryName,bookName,publisher,author,price FROM books,categories 
WHERE books.categoryId=categories.categoryId ORDER BY(bookid) ASC LIMIT {$starIndex},{$pageRow}";
        $res=mysqli_query($link,$sql) or die("数据有误");
        while (($arr=mysqli_fetch_assoc($res))!=false)
        {
            //var_dump($arr);
            echo "<tr>";
            foreach ($arr as $col)
            {
                echo "<td>$col</td>";
            }
            echo "<td><a href='Alert.php?bId={$arr['bookId']}'>修改</a></td>";
            echo "<td><a href='AddBook.php'>添加</a></td>";
            echo "<td><a href='DeleteBook.php?bId={$arr['bookId']}' onclick='return deleteFn()'>删除</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <div id="divPage">

        <a href="Index.php?page=1">首页</a>
        <a href="Index.php?page=<?php echo $currentPage-1;?>">上一页</a>

        <?php echo "当前是第【{$currentPage}】页,共【{$totalPage}】页"?>
        <a href="Index.php?page=<?php echo $currentPage+1;?>">下一页</a>
        <a href="Index.php?page=<?php echo $totalPage;?>">尾页</a>
    </div>
</body>
</html>
