<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>學生管理系統</title>
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
</head>
<body>
    <div style="text-align: center;padding-bottom: 10px;">
        <h2>學生信息管理中心</h2>
        <a href="studentadd.php">添加學生</a> |
        共有<font color="red"><?=$count?></font>個學生
    </div>

    <table width="800" border="1" bordercolor="#ccc" align="center" rules="all" cellpadding="5">
        <thead>
            <tr>
                <td>姓名</td>
                <td>學號</td>
                <td>年齡</td>
                <td>性別</td>
                <td>班級</td>
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach($result as $value):?>
            <tr>
                <td><?=$value['name']?></td>
                <td><?=$value['number']?></td>
                <td><?=$value['age']?></td>
                <?php if($value['gender'] == 1):?>
                    <td>男</td>
                <?php else:?>
                    <td>女</td>
                <?php endif;?>
                <td><?=$value['class']?></td>
                <td width="100">
                    <input id="student" class=".sutdent<?=$value['id']?>" type="button" value="修改" onclick="edit('<?=base64_encode("student{$value['id']}");?>');"> | 
                    <input id="del" type="button" value="刪除" onclick="del('del<?=$value['id']?>');">
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

    <script>
        function edit(id)
        {
            alert(id);
            location.href = './studentedit.php?edit=' + String(id);
        }

        function del(id)
        {
            if (confirm("是否確定要刪除此筆資料")) 
            {
                $.ajax({
                    url: 'studentdel.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {id: id},
                })
                .done(function(data) {
                    // console.log("success");
                    if (data.Status) 
                    {
                        alert("刪除成功");
                        location.reload();
                    }
                })
                .fail(function(data) {
                    // console.log("error");
                    console.log(data.Msg);
                    alert("刪除失敗");
                });
            }
        }
    </script>
</body>
</html>