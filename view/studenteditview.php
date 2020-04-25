<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0">
	<meta charset="utf-8">
	<title>修改學生訊息</title>
	<script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
</head>
<body>
	<div style="text-align: center;padding-bottom: 10px;">
		<h2>修改學生信息</h2>
		<a href="javascript:history.go(-1)">返回列表頁</a>
	</div>

	<form name="form1" method="POST" action="">
		<table width="400" border="3" bordercolor="#ccc" align="center" rules="all" cellpadding="5">
		<tr>
			<td width="80" align="right">學號: </td>
			<td><input type="text" name="stu_number" id="stu_number" value="<?=$arr['number']?>"></td>
		</tr>
		<tr>
			<td width="80" align="right">姓名: </td>
			<td><input type="text" name="stu_name" id="stu_name" value="<?=$arr['name']?>"></td>
		</tr>
		<tr>
			<td width="80" align="right">性別: </td>
			<td>
				<input type="radio" name="stu_gender" id="stu_gender" value="1" <?=($arr['gender']==1)?"checked":""?>>男
				<input type="radio" name="stu_gender" id="stu_gender" value="2" <?=($arr['gender']==2)?"checked":""?>>女
			</td>
		</tr>
		<tr>
			<td width="80" align="right">年齡: </td>
			<td><input type="number" name="stu_age" id="stu_age" value="<?=$arr['age']?>"></td>
		</tr>
		<tr>
			<td width="80" align="right">班級: </td>
			<td>
				<select name="stu_class" id="stu_class">
					<option value="L0732" <?=$arr['class']=="L0732"?"selected":""?>>L0732</option>
					<option value="L0730" <?=$arr['class']=="L0730"?"selected":""?>>L0730</option>
					<option value="L0735" <?=$arr['class']=="L0735"?"selected":""?>>L0735</option>
				</select>
			</td>
		</tr>
		<tr>
			<td width="80" align="right">&nbsp;</td>
			<td>
				<input type="hidden" name="id" id="id" value="<?=base64_encode("student{$arr['id']}")?>">
				<input type="submit" id="submit" value="提交">
			</td>
		</tr>
	</table>
	</form>

	<script>
		$(function(){
			$(document).on('click', '#submit', function(e) {
				e.preventDefault();

				let stu_id     = $("#id").val();
				let stu_number = $("#stu_number").val();
				let stu_name   = $("#stu_name").val();
				let stu_gender = $("input[name='stu_gender']:checked").val();
				let stu_age    = $("#stu_age").val();
				let stu_class  = $("#stu_class").val();

				console.log(stu_id + " " + stu_number + " " + stu_name + " " + stu_gender + " " + stu_age + " " + stu_class);

				$.ajax({
					url: 'studentupdate.php',
					type: 'POST',
					dataType: 'json',
					data: {
						stu_id: stu_id,
						stu_number: stu_number,
						stu_name: stu_name,
						stu_gender: stu_gender,
						stu_age: stu_age,
						stu_class: stu_class
					},
				})
				.done(function(data) {
					console.log("success");
					if (data.Status) 
					{
						alert(data.id + "修改成功");
						location.href = "student.php";
					}
				})
				.fail(function(data) {
					console.log("error");
					alert("修改失敗!");
				});
				
			});
		});
		
	</script>
</body>
</html>