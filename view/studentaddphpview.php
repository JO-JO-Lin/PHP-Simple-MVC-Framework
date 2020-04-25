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
		span {
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
			<td><input type="text" name="stu_number" id="stu_number" value="<?=$number?>">
			<span><?=$number_error?></span>
			</td>

		</tr>
		<tr>
			<td width="80" align="right">姓名: </td>
			<td>
				<input type="text" name="stu_name" id="stu_name" value="<?=$name?>">
				<span><?=$name_error?></span>
			</td>
		</tr>
		<tr>
			<td width="80" align="right">性別: </td>
			<td>
				<input type="radio" name="stu_gender" id="stu_gender" value="1" <?=($gender==1||$gender=="")?'checked':''?>>男
				<input type="radio" name="stu_gender" id="stu_gender" value="2" <?=($gender==2)?'checked':''?>>女
			</td>
		</tr>
		<tr>
			<td width="80" align="right">年齡: </td>
			<td><input type="number" name="stu_age" id="stu_age" value="<?=$age?>">
				<span><?=$age_error?></span>
			</td>
		</tr>
		<tr>
			<td width="80" align="right">班級: </td>
			<td>
				<select name="stu_class" id="stu_class">
					<option value="" selected></option>
					<option value="L0732" <?=($class=='L0732')?'selected':''?>>L0732</option>
					<option value="L0730" <?=($class=='L0730')?'selected':''?>>L0730</option>
					<option value="L0735" <?=($class=='L0735')?'selected':''?>>L0735</option>
				</select>
				<span><?=$class_error?></span>
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

			// $('#form1').validate({
			// 	debug:true,
			// 	errorElement:"span",
			// 	rules: {
			// 		stu_number: {
			// 			required:true,
			// 			maxlength:8,
			// 			minlength:8
			// 		},
			// 		stu_name  : "required",
			// 		stu_age   : {
			// 			required:true,
			// 			number:true,
			// 			max:100,
			// 			min:1
			// 		},
			// 		stu_class : "required"
			// 	},
			// 	messages: {
			// 		stu_number: {
			// 			required:"請輸入學號",
			// 			maxlength:"學號有誤",
			// 			minlength:"學號有誤"
			// 		},
			// 		stu_name  : "請輸入姓名",
			// 		stu_age   : {
			// 			required:"請輸入年齡",
			// 			number:"必須為數字",
			// 			max:"年齡上限為100",
			// 			min:"你也太年輕了吧0.0!!"
			// 		},
			// 		stu_class : "請選擇班級"
			// 	},
			// 	submitHandler: function(form){
			// 		form.submit();
			// 	}
			// });
		});
	</script>
</body>
</html>