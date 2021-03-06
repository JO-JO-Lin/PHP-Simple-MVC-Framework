<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0">
	<meta charset="utf-8">
	<title>新增學生訊息</title>
	<script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/localization/messages_zh_TW.js"></script>
	<style>
		.error {
			color: #ff0000;
		}
	</style>
</head>
<body>
	<div style="text-align: center;padding-bottom: 10px;">
		<h2>新增學生信息</h2>
		<a href="javascript:history.go(-1)">返回列表頁</a>
	</div>

	<form id="form1" name="form1" method="POST" action="">
		<table width="400" border="3" bordercolor="#ccc" align="center" rules="all" cellpadding="5">
		<tr>
			<td width="80" align="right">學號: </td>
			<td><input type="text" name="stu_number" id="stu_number" value=""></td>
		</tr>
		<tr>
			<td width="80" align="right">姓名: </td>
			<td><input type="text" name="stu_name" id="stu_name" value=""></td>
		</tr>
		<tr>
			<td width="80" align="right">性別: </td>
			<td>
				<input type="radio" name="stu_gender" id="stu_gender" value="1" checked>男
				<input type="radio" name="stu_gender" id="stu_gender" value="2" >女
			</td>
		</tr>
		<tr>
			<td width="80" align="right">年齡: </td>
			<td><input type="number" name="stu_age" id="stu_age" value=""></td>
		</tr>
		<tr>
			<td width="80" align="right">班級: </td>
			<td>
				<select name="stu_class" id="stu_class">
					<option value="" ></option>
					<option value="L0732" >L0732</option>
					<option value="L0730" >L0730</option>
					<option value="L0735" >L0735</option>
				</select>
			</td>
		</tr>
		<tr>
			<td width="80" align="right">&nbsp;</td>
			<td>
				<input type="submit" id="submit" value="提交">
			</td>
		</tr>
	</table>
	</form>

	<script>
		$(function(){
			// $.validate.setDefault({
			// 	submitHandler
			// });

			$('#form1').validate({
				debug:false,
				errorElement:"span",
				rules: {
					stu_number: {
						required:true,
						maxlength:8,
						minlength:8
					},
					stu_name  : "required",
					stu_age   : {
						required:true,
						number:true,
						max:100,
						min:1
					},
					stu_class : "required"
				},
				messages: {
					stu_number: {
						required:"請輸入學號",
						maxlength:"學號有誤",
						minlength:"學號有誤"
					},
					stu_name  : "請輸入姓名",
					stu_age   : {
						required:"請輸入年齡",
						number:"必須為數字",
						max:"年齡上限為100",
						min:"你也太年輕了吧0.0!!"
					},
					stu_class : "請選擇班級"
				},
				submitHandler: function(form){
					form.submit();
					let stu_number = $("#stu_number").val();
					let stu_name   = $("#stu_name").val();
					let stu_gender = $("input[name='stu_gender']:checked").val();
					let stu_age    = $("#stu_age").val();
					let stu_class  = $("#stu_class").val();

					console.log(stu_number + " " + stu_name + " " + stu_gender + " " + stu_age + " " + stu_class);

					$.ajax({
						url: 'studentcreate.php',
						type: 'POST',
						dataType: 'json',
						data: {
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
							alert("新增學生訊息成功!");
							location.href = "student.php";
						}
					})
					.fail(function(data) {
						console.log("error");
						alert("修改失敗!");
					});
				}
			});

			// $(document).on('click', '#submit', function(e) {
			// 	e.preventDefault();

			// 	let stu_number = $("#stu_number").val();
			// 	let stu_name   = $("#stu_name").val();
			// 	let stu_gender = $("input[name='stu_gender']:checked").val();
			// 	let stu_age    = $("#stu_age").val();
			// 	let stu_class  = $("#stu_class").val();

			// 	console.log(stu_number + " " + stu_name + " " + stu_gender + " " + stu_age + " " + stu_class);

			// 	$.ajax({
			// 		url: 'studentcreate.php',
			// 		type: 'POST',
			// 		dataType: 'json',
			// 		data: {
			// 			stu_number: stu_number,
			// 			stu_name: stu_name,
			// 			stu_gender: stu_gender,
			// 			stu_age: stu_age,
			// 			stu_class: stu_class
			// 		},
			// 	})
			// 	.done(function(data) {
			// 		console.log("success");
			// 		if (data.Status) 
			// 		{
			// 			alert("新增學生訊息成功!");
			// 			location.href = "student.php";
			// 		}
			// 	})
			// 	.fail(function(data) {
			// 		console.log("error");
			// 		alert("修改失敗!");
			// 	});
				
			// });
		});
	</script>
</body>
</html>