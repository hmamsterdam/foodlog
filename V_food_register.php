<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>栄養価登録</title>
		<link rel="stylesheet" href="reset.css">
		<style>
			body {
				margin: 20px;
			}
			a{
				text-decoration: none;
			}
			#right{
				text-align: right;
				font-size: 30px;
				margin: 10px;
			}
			section {
				border: solid 1px #0000FF;
				margin-bottom: 10px;
				padding: 20px;
				border-radius: 10px;
			}
			h1 {
				font-size: 30px;
				padding-bottom:10px;
				display:inline;
			}
			form {
				margin: 10px 60px;
			}
			.food_children {
				padding-left: 20px;
			}
			.inline1 {
				display: inline-block;
			}
			.inline2 {
				display: inline-block;
				width: 200px;
			}
			input.width {
				text-align: right;
				width: 50px;
			}
			select {
				width: 171px;
			}
			ul{
				margin-top: 20px;
			}
			li{
				display: inline-block;
				width: 270px;
				box-sizing: border-box;
			}
		</style>
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script>
			$(function(){

				// 食材群選択
				var $children_default = $('.children');
				var original = $children_default.html();

				$('.parentA').change(function() {
					var children_id = $(this).attr("id");
					children_id = children_id.replace("parent", "")
					var $children = $("#children" + children_id);
					var val1 = $(this).val();
					$children.html(original).find('option').each(function() {
						var val2 = $(this).data('val');
						if (val1 != val2) {
							$(this).remove();
						}
					});
					if ($(this).val() === '') {
		 				$children.attr('disabled', 'disabled');
					} else {
						$children.removeAttr('disabled');
					}
				});

				$('.parentB').change(function() {
					var $children = $("#childrenB");
					var val1 = $(this).val();
					$children.html(original).find('option').each(function() {
						var val2 = $(this).data('val');
						if (val1 != val2) {
							$(this).remove();
						}
					});
					if ($(this).val() === '') {
		 				$children.attr('disabled', 'disabled');
					} else {
						$children.removeAttr('disabled');
					}
					$("#childrenB").prepend('<option value="0" data-val="<?php print $foodstuff_category_index; ?>" selected disabled>食材を選択して下さい</option>');
				});

				
				// 行追加
				var i = 1;
				var foodstuff_list = new Array();
				foodstuff_list.push(i);
				
				$("#line_add").click(function(){
					i++;
					// id属性への通し番号
					$("#foodstuff_register" + (i-1)).clone(true).attr('id',"foodstuff_register" + i).appendTo(".foodstuff_register");
					$("#foodstuff_register" + i + " > #parent" + (i-1)).attr("id","parent" + i);
					$("#foodstuff_register" + i + " > #children" + (i-1)).attr("id","children" + i);
					$("#foodstuff_register" + i + " > #foodstuff_volume" + (i-1)).attr("id","foodstuff_volume" + i);
					$("#foodstuff_register" + i + " > #line_delete" + (i-1)).attr("id","line_delete" + i);
					// name属性への通し番号
					$("#foodstuff_register" + i + " > select[name='parent" + (i-1) + "']").attr("name","parent" + i);
					$("#foodstuff_register" + i + " > select[name='children" + (i-1) + "']").attr("name","children" + i);
					$("#foodstuff_register" + i + " > input[name='foodstuff_volume" + (i-1) + "']").attr("name","foodstuff_volume" + i);
					// foodstuffの数を記憶
					foodstuff_list.push(i);
					var number_of_foodstuff = document.getElementById("number_of_foodstuff");
					number_of_foodstuff.setAttribute("value",foodstuff_list.length);
				});
				
				// 行削除
				$(".line_delete").click(function(){
					var line_delete_id = $(this).attr("id");
					line_delete_id = line_delete_id.replace("line_delete", "");
					if(foodstuff_list.length >= 2) {
						$("#foodstuff_register" + line_delete_id).remove();
						for (var j = Number(line_delete_id); j <= foodstuff_list.length; j++){
							$("#foodstuff_register" + (j + 1)).attr("id","foodstuff_register" + j);
							$("#foodstuff_register" + j + " > #parent" + (j + 1)).attr("id","parent" + j);
							$("#foodstuff_register" + j + " > #children" + (j + 1)).attr("id","children" + j);
							$("#foodstuff_register" + j + " > #foodstuff_volume" + (j + 1)).attr("id","foodstuff_volume" + j);
							$("#foodstuff_register" + j + " > #line_delete" + (j + 1)).attr("id","line_delete" + j);
						}
						i--;
						foodstuff_list.pop();
						var number_of_foodstuff = document.getElementById("number_of_foodstuff");
						number_of_foodstuff.setAttribute("value",foodstuff_list.length);
					}
				});
			});
		</script>
	</head>
	<body>
		<div id="right"><a href="C_food_log.php">>> フードログ >></a></div>





<?php
if ($food_display === 0) {
?>
		<section>
			<h1>＋　食品</h1><form method="post" class="inline1"><input type="submit" name="food_display" value="編集画面へ"><input type="hidden" name="foodstuff_display" value="<?php print $foodstuff_display; ?>"></form>
<?php
if (isset($msg) === TRUE && $msg === 'NO') {
?>
			<p><?php print htmlspecial($food_name) . 'はすでに登録されています'; ?></p>
<?php
} elseif (isset($msg) === TRUE && $msg === '') { 
?>
			<p><?php print htmlspecial($food_name) . 'は登録されました'; ?></p>
<?php
}
?>
			<form method="post">
				食品：<input type="text" name="food" required><br>
				人数：<input type="text" name="people" required pattern="^[0-9]+$">
				<div class="foodstuff_register">
				   	<div id="foodstuff_register1">食材群：<select class="parentA" id="parent1" name="parent1" required>
				   		<option value="" selected="selected" disabled>食材群を選択して下さい</option>
<?php
foreach ($foodstuff_category_data as $value) {
?>
						<option value="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_category_name']); ?></option>
<?php
}
?>
					</select>
					食材：<select class="children" id="children1" name="children1" disabled>
						<option value="0" selected="selected" disabled>食材群を選択して下さい</option>
<?php
foreach ($foodstuff_data as $value) {
?>
						<option value="<?php print htmlspecial($value['foodstuff_index']); ?>" data-val="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_name']); ?></option>
<?php
}
?>
					</select>
					×
					量：<input type="text" id="foodstuff_volume1" name="foodstuff_volume1" required pattern="^[0-9]+$">g
					<button type="button" id="line_add">追加</button>
					<button type="button" class="line_delete" id="line_delete1">削除</button>
					</div>
				</div>
				<input type="hidden" id="number_of_foodstuff" name="number_of_foodstuff" value=1>
				<input type="submit" name="food_register" value="登録">
			</form>
		</section>






<?php
} elseif ($food_display === 1) {
?>
		<section>
			<h1>＋　食品</h1><form method="post" class="inline1"><input type="submit" name="food_display" value="登録画面へ"><input type="hidden" name="foodstuff_display" value="<?php print $foodstuff_display; ?>"></form>
			<form method="post">
				食品：<select class="food_parent" name="food_parent" onChange="this.form.submit()">
					<option value="0" selected="selected" disabled>食品を選択して下さい</option>
<?php
foreach ($food as $value) {
?>
					<option value="<?php print htmlspecial($value['food_index']); ?>" <?php if($value['food_index'] == $food_index) { print 'selected'; } ?>><?php print htmlspecial($value['food_name']); ?></option>
<?php
}
?>
				</select>
<?php
$i = 0;
foreach ($food_component as $value) {
$food_index = $value['food_index'];
$i++;
?>
				<div class="food_children <?php print htmlspecial($value['food_index']); ?>"><p class="inline2"><?php print htmlspecial($value['foodstuff_name']); ?></p><input type="hidden" name="foodstuff_index<?php print $i; ?>" value="<?php print htmlspecial($value['foodstuff_index']); ?>"><input type="text" class="width" name="foodstuff_volume<?php print $i; ?>" value="<?php print htmlspecial($value['foodstuff_volume']); ?>">g</div>
<?php
}
?>
				<input type="hidden" name="food_index" value="<?php print $food_index; ?>">
				<input type="hidden" name="foodstuff_length" value="<?php print $i; ?>">
				<div><input type="submit" name="food_update" value="変更">
				<input type="submit" name="food_update" value="追加">
				<input type="submit" name="food_update" value="削除"></div>
			</form>
		</section>
<?php
}
?>







<?php
if ($foodstuff_display === 0) {
?>
		<section>
			<h1>＋　食材</h1><form method="post" class="inline1"><input type="submit" name="foodstuff_display" value="編集画面へ"><input type="hidden" name="food_display" value="<?php print $food_display; ?>"></form>
<?php
if (isset($msg2) === TRUE && $msg2 === 'NO') {
?>
			<p><?php print htmlspecial($foodstuff_name) . 'はすでに登録されています'; ?></p>
<?php
} elseif (isset($msg2) === TRUE && $msg2 === '') { 
?>
			<p><?php print htmlspecial($foodstuff_name) . 'は登録されました'; ?></p>
<?php
}
?>
			<form method="post">
				<div>食材：<input type="text" name="foodstuff_register_foodstuff"></div>
				<div>食材群：<select name="foodstuff_register_foodstuff_category">
					<option value="" selected="selected" disabled>食材群を選択して下さい</option>
<?php
foreach ($foodstuff_category_data as $value) {
?>
					<option value="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_category_name']); ?></option>
<?php
}
?>
				</select></div>
				<ul><li>エネルギー：<input type="text" name="ENERC_KCAL" class="width">kcal</li>
				<li>たんぱく質：<input type="text" name="protein" class="width">g</li>
				<li>脂質：<input type="text" name="fat" class="width">g</li>
				<li>コレステロール：<input type="text" name="CHOLE" class="width">mg</li>
				<li>炭水化物：<input type="text" name="carbohydrate" class="width">g</li>
				<li>食物繊維：<input type="text" name=" FIBTG" class="width">g</li>
				<li>ナトリウム：<input type="text" name="NA" class="width">mg</li>
				<li>カリウム：<input type="text" name="K" class="width">mg</li>
				<li>カルシウム：<input type="text" name="CA" class="width">mg</li>
				<li>マグネシウム：<input type="text" name="MG" class="width">mg</li>
				<li>リン：<input type="text" name="P" class="width">mg</li>
				<li>鉄：<input type="text" name="FE" class="width">mg</li>
				<li>亜鉛：<input type="text" name="ZN" class="width">mg</li>
				<li>銅：<input type="text" name="CU" class="width">mg</li>
				<li>マンガン：<input type="text" name="MN" class="width">mg</li>
				<li>ヨウ素：<input type="text" name="ID" class="width">µg</li>
				<li>セレン：<input type="text" name="SE" class="width">µg</li>
				<li>クロム：<input type="text" name="CR" class="width">µg</li>
				<li>モリブデン：<input type="text" name="MO" class="width">µg</li>
				<li>レチノール：<input type="text" name="RETOL" class="width">µg</li>
				<li>α-カロテン：<input type="text" name="CARTA" class="width">µg</li>
				<li>β-カロテン：<input type="text" name="CARTB" class="width">µg</li>
				<li>β-クリプトキサンチン：<input type="text" name="CRYPXB" class="width">µg</li>
				<li>β-カロテン当量：<input type="text" name="CARTBEQ" class="width">µg</li>
				<li>レチノール活性当量：<input type="text" name="VITA_RAE" class="width">µg</li>
				<li>ビタミンD：<input type="text" name="VITD" class="width">µg</li>
				<li>α-トコフェロール：<input type="text" name="TOCPHA" class="width">mg</li>
				<li>β-トコフェロール：<input type="text" name="TOCPHB" class="width">mg</li>
				<li>γ-トコフェロール：<input type="text" name="TOCPHG" class="width">mg</li>
				<li>δ-トコフェロール：<input type="text" name="TOCPHD" class="width">mg</li>
				<li>ビタミンK：<input type="text" name="VITK" class="width">µg</li>
				<li>ビタミンB1：<input type="text" name="THIAHCL" class="width">mg</li>
				<li>ビタミンB2：<input type="text" name="RIBF" class="width">mg</li>
				<li>ナイアシン：<input type="text" name="NIA" class="width">mg</li>
				<li>ビタミンB6：<input type="text" name="VITB6A" class="width">mg</li>
				<li>ビタミンB12：<input type="text" name="VITB12" class="width">µg</li>
				<li>葉酸：<input type="text" name="FOL" class="width">µg</li>
				<li>パントテン酸：<input type="text" name="PANTAC" class="width">mg</li>
				<li>ビオチン：<input type="text" name="BIOT" class="width">µg</li>
				<li>ビタミンC：<input type="text" name="VITC" class="width">mg</li>
				<li>食塩相当量：<input type="text" name="NACL_EQ" class="width">g</li></ul>
				<input type="submit" name="foodstuff_register"  value="登録">
			</form>
		</section>







<?php
} elseif ($foodstuff_display === 1) {
?>
		<section>
			<h1>＋　食材</h1><form method="post" class="inline1"><input type="submit" name="foodstuff_display" value="登録画面へ"><input type="hidden" name="food_display" value="<?php print $food_display; ?>"></form>
<?php
if (isset($msg2) === TRUE) {
?>
			<p><?php print $msg2; ?></p>
<?php
}
?>
			<form method="post">
				食材群：<select class="parentB" id="parentB" name="parentB" required>
					<option value="0" selected disabled>食材群を選択して下さい</option>
<?php
foreach ($foodstuff_category_data as $value) {
?>
						<option value="<?php print htmlspecial($value['foodstuff_category_index']); ?>" <?php if($value['foodstuff_category_index'] == $foodstuff_category) { print 'selected'; } ?>><?php print htmlspecial($value['foodstuff_category_name']); ?></option>
<?php
}
?>
				</select>
				食材：<select class="childrenB" id="childrenB" name="childrenB" disabled onChange="this.form.submit()">
						<option value="0" data-val="0" selected disabled>食材群を選択して下さい</option>
<?php
foreach ($foodstuff_data as $value) {
?>
						<option value="<?php print htmlspecial($value['foodstuff_index']); ?>" data-val="<?php print htmlspecial($value['foodstuff_category_index']); ?>" <?php if($value['foodstuff_index'] == $foodstuff) { print 'selected'; } ?>><?php print htmlspecial($value['foodstuff_name']); ?></option>
<?php
}
?>
				</select>
<?php
foreach($foodstuff_component as $value) {
?>
				<ul><li>エネルギー：<input type="text" name="ENERC_KCAL" class="width" value="<?php print htmlspecial($value['ENERC_KCAL']); ?>">kcal</li>
				<li>たんぱく質：<input type="text" name="protein" class="width" value="<?php print htmlspecial($value['protein']); ?>">g</li>
				<li>脂質：<input type="text" name="fat" class="width" value="<?php print htmlspecial($value['fat']); ?>">g</li>
				<li>コレステロール：<input type="text" name="CHOLE" class="width" value="<?php print htmlspecial($value['CHOLE']); ?>">mg</li>
				<li>炭水化物：<input type="text" name="carbohydrate" class="width" value="<?php print htmlspecial($value['carbohydrate']); ?>">g</li>
				<li>食物繊維：<input type="text" name=" FIBTG" class="width" value="<?php print htmlspecial($value['FIBTG']); ?>">g</li>
				<li>ナトリウム：<input type="text" name="NA" class="width" value="<?php print htmlspecial($value['NA']); ?>">mg</li>
				<li>カリウム：<input type="text" name="K" class="width" value="<?php print htmlspecial($value['K']); ?>">mg</li>
				<li>カルシウム：<input type="text" name="CA" class="width" value="<?php print htmlspecial($value['CA']); ?>">mg</li>
				<li>マグネシウム：<input type="text" name="MG" class="width" value="<?php print htmlspecial($value['MG']); ?>">mg</li>
				<li>リン：<input type="text" name="P" class="width" value="<?php print htmlspecial($value['P']); ?>">mg</li>
				<li>鉄：<input type="text" name="FE" class="width" value="<?php print htmlspecial($value['FE']); ?>">mg</li>
				<li>亜鉛：<input type="text" name="ZN" class="width" value="<?php print htmlspecial($value['ZN']); ?>">mg</li>
				<li>銅：<input type="text" name="CU" class="width" value="<?php print htmlspecial($value['CU']); ?>">mg</li>
				<li>マンガン：<input type="text" name="MN" class="width" value="<?php print htmlspecial($value['MN']); ?>">mg</li>
				<li>ヨウ素：<input type="text" name="ID" class="width" value="<?php print htmlspecial($value['ID']); ?>">µg</li>
				<li>セレン：<input type="text" name="SE" class="width" value="<?php print htmlspecial($value['SE']); ?>">µg</li>
				<li>クロム：<input type="text" name="CR" class="width" value="<?php print htmlspecial($value['CR']); ?>">µg</li>
				<li>モリブデン：<input type="text" name="MO" class="width" value="<?php print htmlspecial($value['MO']); ?>">µg</li>
				<li>レチノール：<input type="text" name="RETOL" class="width" value="<?php print htmlspecial($value['RETOL']); ?>">µg</li>
				<li>α-カロテン：<input type="text" name="CARTA" class="width" value="<?php print htmlspecial($value['CARTA']); ?>">µg</li>
				<li>β-カロテン：<input type="text" name="CARTB" class="width" value="<?php print htmlspecial($value['CARTB']); ?>">µg</li>
				<li>β-クリプトキサンチン：<input type="text" name="CRYPXB" class="width" value="<?php print htmlspecial($value['CRYPXB']); ?>">µg</li>
				<li>β-カロテン当量：<input type="text" name="CARTBEQ" class="width" value="<?php print htmlspecial($value['CARTBEQ']); ?>">µg</li>
				<li>レチノール活性当量：<input type="text" name="VITA_RAE" class="width" value="<?php print htmlspecial($value['VITA_RAE']); ?>">µg</li>
				<li>ビタミンD：<input type="text" name="VITD" class="width" value="<?php print htmlspecial($value['VITD']); ?>">µg</li>
				<li>α-トコフェロール：<input type="text" name="TOCPHA" class="width" value="<?php print htmlspecial($value['TOCPHA']); ?>">mg</li>
				<li>β-トコフェロール：<input type="text" name="TOCPHB" class="width" value="<?php print htmlspecial($value['TOCPHB']); ?>">mg</li>
				<li>γ-トコフェロール：<input type="text" name="TOCPHG" class="width" value="<?php print htmlspecial($value['TOCPHG']); ?>">mg</li>
				<li>δ-トコフェロール：<input type="text" name="TOCPHD" class="width" value="<?php print htmlspecial($value['TOCPHD']); ?>">mg</li>
				<li>ビタミンK：<input type="text" name="VITK" class="width" value="<?php print htmlspecial($value['VITK']); ?>">µg</li>
				<li>ビタミンB1：<input type="text" name="THIAHCL" class="width" value="<?php print htmlspecial($value['THIAHCL']); ?>">mg</li>
				<li>ビタミンB2：<input type="text" name="RIBF" class="width" value="<?php print htmlspecial($value['RIBF']); ?>">mg</li>
				<li>ナイアシン：<input type="text" name="NIA" class="width" value="<?php print htmlspecial($value['NIA']); ?>">mg</li>
				<li>ビタミンB6：<input type="text" name="VITB6A" class="width" value="<?php print htmlspecial($value['VITB6A']); ?>">mg</li>
				<li>ビタミンB12：<input type="text" name="VITB12" class="width" value="<?php print htmlspecial($value['VITB12']); ?>">µg</li>
				<li>葉酸：<input type="text" name="FOL" class="width" value="<?php print htmlspecial($value['FOL']); ?>">µg</li>
				<li>パントテン酸：<input type="text" name="PANTAC" class="width" value="<?php print htmlspecial($value['PANTAC']); ?>">mg</li>
				<li>ビオチン：<input type="text" name="BIOT" class="width" value="<?php print htmlspecial($value['BIOT']); ?>">µg</li>
				<li>ビタミンC：<input type="text" name="VITC" class="width" value="<?php print htmlspecial($value['VITC']); ?>">mg</li>
				<li>食塩相当量：<input type="text" name="NACL_EQ" class="width" value="<?php print htmlspecial($value['NACL_EQ']); ?>">g</li></ul>
				<input type="hidden" name="foodstuff_category_index" value="<?php print $value['foodstuff_category_index']; ?>">
				<input type="hidden" name="foodstuff_index" value="<?php print $value['foodstuff_index']; ?>">
<?php
}
?>
				<div><input type="submit" name="foodstuff_update" value="変更">
				<input type="submit" name="foodstuff_update" value="削除"></div>
			</form>
		</section>
<?php
}
?>
	</body>
</html>
