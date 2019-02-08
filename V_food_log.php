<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>フードログ</title>
		<link rel="stylesheet" href="reset.css">
		<style>
			body {
				margin: 20px;
			}
			#calender {
				width: 450px;
				display: inline-block;
			}
			#man {
				width: 420px;
				display: inline-block;
			}
			#woman {
				width: 420px;
				display: inline-block;
			}
			ul {
				padding: 10px 0px 0px 20px;
				list-style: none;
			}
			li {
				border-right: groove 1px;
			}
			.sp {
				display: inline-block;
				width: 100px;
			}
			.n {
				border: none;
			}
			.l {
				padding: 30px 0px 0px 0px;
			}
			#m1 {
				<?php if ($m1>299) { print 'width: 299px; background-color: #000080;'; } else { print 'width: ' . $m1 . 'px; background-color: #ADD8E6;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#m2 {
				<?php if ($m2>299) { print 'width: 299px; background-color: #000080;'; } else { print 'width: ' . $m2 . 'px; background-color: #ADD8E6;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#m3 {
				<?php if ($m3>299) { print 'width: 299px; background-color: #000080;'; } else { print 'width: ' . $m3 . 'px; background-color: #ADD8E6;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#m5 {
				<?php if ($m5>299) { print 'width: 299px; background-color: #000080;'; } else { print 'width: ' . $m5 . 'px; background-color: #ADD8E6;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#m6 {
				<?php if ($m6>299) { print 'width: 299px; background-color: #000080;'; } else { print 'width: ' . $m6 . 'px; background-color: #ADD8E6;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#m9 {
				<?php if ($m9>299) { print 'width: 299px; background-color: #000080;'; } else { print 'width: ' . $m9 . 'px; background-color: #ADD8E6;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#m12 {
				<?php if ($m12>299) { print 'width: 299px; background-color: #000080;'; } else { print 'width: ' . $m12 . 'px; background-color: #ADD8E6;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#m20 {
				<?php if ($m20>299) { print 'width: 299px; background-color: #000080;'; } else { print 'width: ' . $m20 . 'px; background-color: #ADD8E6;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#m32 {
				<?php if ($m32>299) { print 'width: 299px; background-color: #000080;'; } else { print 'width: ' . $m32 . 'px; background-color: #ADD8E6;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#m33 {
				<?php if ($m33>299) { print 'width: 299px; background-color: #000080;'; } else { print 'width: ' . $m33 . 'px; background-color: #ADD8E6;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#m40 {
				<?php if ($m40>299) { print 'width: 299px; background-color: #000080;'; } else { print 'width: ' . $m40 . 'px; background-color: #ADD8E6;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#m26 {
				<?php if ($m26>299) { print 'width: 299px; background-color: #000080;'; } else { print 'width: ' . $m26 . 'px; background-color: #ADD8E6;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#m27 {
				<?php if ($m27>299) { print 'width: 299px; background-color: #000080;'; } else { print 'width: ' . $m27 . 'px; background-color: #ADD8E6;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#m31 {
				<?php if ($m31>299) { print 'width: 299px; background-color: #000080;'; } else { print 'width: ' . $m31 . 'px; background-color: #ADD8E6;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#m42 {
				<?php if ($m42>299) { print 'width: 299px; background-color: #000080;'; } else { print 'width: ' . $m42 . 'px; background-color: #ADD8E6;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#w1 {
				<?php if ($w1>299) { print 'width: 299px; background-color: #FF0000;'; } else { print 'width: ' . $w1 . 'px; background-color: #FFDEAD;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#w2 {
				<?php if ($w2>299) { print 'width: 299px; background-color: #FF0000;'; } else { print 'width: ' . $w2 . 'px; background-color: #FFDEAD;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#w3 {
				<?php if ($w3>299) { print 'width: 299px; background-color: #FF0000;'; } else { print 'width: ' . $w3 . 'px; background-color: #FFDEAD;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#w5 {
				<?php if ($w5>299) { print 'width: 299px; background-color: #FF0000;'; } else { print 'width: ' . $w5 . 'px; background-color: #FFDEAD;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#w6 {
				<?php if ($w6>299) { print 'width: 299px; background-color: #FF0000;'; } else { print 'width: ' . $w6 . 'px; background-color: #FFDEAD;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#w9 {
				<?php if ($w9>299) { print 'width: 299px; background-color: #FF0000;'; } else { print 'width: ' . $w9 . 'px; background-color: #FFDEAD;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#w12 {
				<?php if ($w12>299) { print 'width: 299px; background-color: #FF0000;'; } else { print 'width: ' . $w12 . 'px; background-color: #FFDEAD;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#w20 {
				<?php if ($w20>299) { print 'width: 299px; background-color: #FF0000;'; } else { print 'width: ' . $w20 . 'px; background-color: #FFDEAD;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#w32 {
				<?php if ($w32>299) { print 'width: 299px; background-color: #FF0000;'; } else { print 'width: ' . $w32 . 'px; background-color: #FFDEAD;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#w33 {
				<?php if ($w33>299) { print 'width: 299px; background-color: #FF0000;'; } else { print 'width: ' . $w33 . 'px; background-color: #FFDEAD;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#w40 {
				<?php if ($w40>299) { print 'width: 299px; background-color: #FF0000;'; } else { print 'width: ' . $w40 . 'px; background-color: #FFDEAD;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#w26 {
				<?php if ($w26>299) { print 'width: 299px; background-color: #FF0000;'; } else { print 'width: ' . $w26 . 'px; background-color: #FFDEAD;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#w27 {
				<?php if ($w27>299) { print 'width: 299px; background-color: #FF0000;'; } else { print 'width: ' . $w27 . 'px; background-color: #FFDEAD;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#w31 {
				<?php if ($w31>299) { print 'width: 299px; background-color: #FF0000;'; } else { print 'width: ' . $w31 . 'px; background-color: #FFDEAD;'; } ?>
				display: inline-block;
				height: 12px;
			}
			#w42 {
				<?php if ($w42>299) { print 'width: 299px; background-color: #FF0000;'; } else { print 'width: ' . $w42 . 'px; background-color: #FFDEAD;'; } ?>
				display: inline-block;
				height: 12px;
			}
			.vertical {
				vertical-align: top;
			}
			a{
				text-decoration: none;
			}
			#left{
				text-align: left;
				font-size: 30px;
				margin: 10px;
			}
			section {
				border: solid 1px #0000FF;
				margin: 0px 10px 10px 0px;
				padding: 20px;
				border-radius: 10px;
			}
			.container {
				display: flex;
			}
			.right {
				text-align: right;
				padding-top: 5px;
				padding-right: 10px;
			}
			#scroll {
				width: 450px;
				height: 209px;
				overflow-y:auto;
				overflow-style: scrollbar;
			}
			tr, th, td {
				border: solid 1px;
				text-align: center;
				font-size: 13px;
				width: 50px;
				padding: 10px 1px;
			}
			.day {
				width: 195px;
				padding-left: 5px;
			}
			.title {
				font-size: 30px;
				text-align: center;
				padding: 10px;
			}
			.sub_title {
				font-size: 13px;
			}
			.even {
				background-color: #FFFF99;
			}
			input {
				width: 40px;
			}
			.volume {
				padding-right: 10px;
				text-align: right;
			}
			.result {
				width: 195px;
				padding-left: 5px;
			}
		</style>
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script>
			$(function(){
				var $children_default = $('.children');
				var original = $children_default.html();
				var i = new Array(0, 1, 1, 1, 1, 1, 1, 1);
				var j = new Array(0, 1, 1, 1, 1, 1, 1, 1);

				// CSS設定用
				var default_food_height = 57 + <?php print htmlspecial($food_count); ?>*19;
				var default_foodstuff_height = 57 + <?php print htmlspecial($foodstuff_count); ?>*19;
				
				var food_height = new Array();
				for (k=1; k<=7; k++) {
					food_height[k] = document.getElementById("food_height" + k);
					if(57 + Math.max.apply(null, i) * 19 > default_food_height){
						food_height[k].style.height = 57 + Math.max.apply(null, i) * 19 + "px";
					} else {
						food_height[k].style.height = default_food_height + "px";
					}
				}
				var foodstuff_height = new Array();
				for (l=1; l<=7; l++) {
					foodstuff_height[l] = document.getElementById("foodstuff_height" + l);
					if(57 + Math.max.apply(null, j) * 59 > default_foodstuff_height){
						foodstuff_height[l].style.height = 57 + Math.max.apply(null, j) * 59 + "px";
					} else {
						foodstuff_height[l].style.height = default_foodstuff_height + "px";
					}
				}

				// 食品追加
				$(".food_line_add").click(function(){
					var day_id = $(this).attr("id");
					day_id = day_id.replace("food_line_add", "");
					i[day_id]++;
					$("#day" + day_id + " > #food_height" + day_id + " > .food > select[name='food_select" + day_id + (i[day_id] -1) + "']").clone(true).attr({id: "food_select" + day_id + i[day_id], name: "food_select" + day_id + i[day_id]}).appendTo("#food" + day_id);
					var new_height = 57 + Math.max.apply(null, i) * 19; 
					for (var m=1; m<=7; m++) {
						food_height[m].style.height = new_height + "px";
					}
					var food_length = document.getElementById("food_length" + day_id);
					food_length.setAttribute("value",i[day_id]);
				});

				// 食品削除
				$(".food_line_delete").click(function(){
					var day_id = $(this).attr("id");
					day_id = day_id.replace("food_line_delete", "");
					if(i[day_id] >= 2) {
						i[day_id]--;
						$("#day" + day_id + " > #food_height" + day_id + " > .food > select[name='food_select" + day_id + (i[day_id] +1) + "']").remove();
						var new_height = 57 + Math.max.apply(null, i) * 19; 
						for (var m=1; m<=7; m++) {
							food_height[m].style.height = new_height + "px";
						}
						var food_length = document.getElementById("food_length" + day_id);
						food_length.setAttribute("value",i[day_id]);
					}
				});

				// 食材追加
				$(".foodstuff_line_add").click(function(){
					var day_id = $(this).attr("id");
					day_id = day_id.replace("foodstuff_line_add", "");
					j[day_id]++;
					$("#day" + day_id + " > #foodstuff_height" + day_id + " > .foodstuff > select[name='parent" + day_id + (j[day_id] -1) + "']").clone(true).attr({id: "parent" + day_id + j[day_id], name: "parent" + day_id + j[day_id]}).appendTo("#foodstuff" + day_id);
					$("#day" + day_id + " > #foodstuff_height" + day_id + " > .foodstuff > select[name='children" + day_id + (j[day_id] -1) + "']").clone(true).attr({id: "children" + day_id + j[day_id], name: "children" + day_id + j[day_id]}).appendTo("#foodstuff" + day_id);
					$("#day" + day_id + " > #foodstuff_height" + day_id + " > .foodstuff > #volume" + day_id + (j[day_id] -1)).clone(true).attr({id: "volume" + day_id + j[day_id], name: "volume" + day_id + j[day_id]}).appendTo("#foodstuff" + day_id);
					$("#day" + day_id + " > #foodstuff_height" + day_id + " > .foodstuff > #volume" + day_id + (j[day_id]) + " > #foodstuff_volume" +  day_id + (j[day_id] -1)).attr({id: "foodstuff_volume" + day_id + j[day_id], name: "foodstuff_volume" + day_id + j[day_id]});
					var new_height = 57 + Math.max.apply(null, j) * 59; 
					for (var n=1; n<=7; n++) {
						foodstuff_height[n].style.height = new_height + "px";
					}
					var foodstuff_length = document.getElementById("foodstuff_length" + day_id);
					foodstuff_length.setAttribute("value",j[day_id]);
				});
				
				// 食材削除
				$(".foodstuff_line_delete").click(function(){
					var day_id = $(this).attr("id");
					day_id = day_id.replace("foodstuff_line_delete", "");
					if(j[day_id] >= 2) {
						j[day_id]--;
						$("#day" + day_id + " > #foodstuff_height" + day_id + " > .foodstuff > select[name='parent" + day_id + (j[day_id] +1) + "']").remove();
						$("#day" + day_id + " > #foodstuff_height" + day_id + " > .foodstuff > select[name='children" + day_id + (j[day_id] +1) + "']").remove();
						$("#day" + day_id + " > #foodstuff_height" + day_id + " > .foodstuff > #volume" + day_id + (j[day_id] +1)).remove();
						var new_height = 57 + Math.max.apply(null, j) * 59; 
						for (var n=1; n<=7; n++) {
							foodstuff_height[n].style.height = new_height + "px";
						}
						var foodstuff_length = document.getElementById("foodstuff_length" + day_id);
						foodstuff_length.setAttribute("value",j[day_id]);
					}
				});

				// 食材選択
				$('.parent').change(function() {
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


			});
		</script>
	</head>
	<body>
		<div id="left"><a href="C_food_register.php"><< 栄養価登録 <<</a></div>
			<section class="vertical" id="calender">
				<p>カレンダー</p>
				<table>
					<tr>
						<th>週No</td>
						<th>月</td>
						<th>火</td>
						<th>水</td>
						<th>木</td>
						<th>金</td>
						<th>土</td>
						<th>日</td>
					</tr>
				</table>
				<div id="scroll">
					<table>
<?php
foreach ($calender as $value) {
?>
						<tr>
							<td><a href="C_food_log.php?week=<?php print htmlspecial($value['week_no']); ?>"><?php print htmlspecial($value['week_no']); ?></td>
							<td><?php if (substr($value['mon'],-2) !== '01'){ if (substr($value['mon'],5,1) === '0'){ print substr($value['mon'],-4); } else { print substr($value['mon'],-5); } } else { print $value['mon']; } ?></td>
							<td><?php if (substr($value['tue'],-2) !== '01'){ if (substr($value['tue'],5,1) === '0'){ print substr($value['tue'],-4); } else { print substr($value['tue'],-5); } } else { print $value['tue']; } ?></td>
							<td><?php if (substr($value['wed'],-2) !== '01'){ if (substr($value['wed'],5,1) === '0'){ print substr($value['wed'],-4); } else { print substr($value['wed'],-5); } } else { print $value['wed']; } ?></td>
							<td><?php if (substr($value['thu'],-2) !== '01'){ if (substr($value['thu'],5,1) === '0'){ print substr($value['thu'],-4); } else { print substr($value['thu'],-5); } } else { print $value['thu']; } ?></td>
							<td><?php if (substr($value['fri'],-2) !== '01'){ if (substr($value['fri'],5,1) === '0'){ print substr($value['fri'],-4); } else { print substr($value['fri'],-5); } } else { print $value['fri']; } ?></td>
							<td><?php if (substr($value['sat'],-2) !== '01'){ if (substr($value['sat'],5,1) === '0'){ print substr($value['sat'],-4); } else { print substr($value['sat'],-5); } } else { print $value['sat']; } ?></td>
							<td><?php if (substr($value['sun'],-2) !== '01'){ if (substr($value['sun'],5,1) === '0'){ print substr($value['sun'],-4); } else { print substr($value['sun'],-5); } } else { print $value['sun']; } ?></td>
						</tr>
<?php
}
?>
					</table>
				</div>
			</section>
			<section class="vertical" id="man">
				<p>成人男性</p>
				<ul><li class="g"><div class="sp">エネルギー</div><div class="m" id="m1"></div></li>
				<li><div class="sp">たんぱく質</div><div class="m" id="m2"></div></li>
				<li><div class="sp">脂質</div><div class="m" id="m3"></div></li>
				<li><div class="sp">炭水化物</div><div id="m5"></div></li>
				<li><div class="sp">食物繊維</div><div class="m" id="m6"></div></li>
				<li><div class="sp">カルシウム</div><div class="m" id="m9"></div></li>
				<li><div class="sp">鉄</div><div class="m" id="m12"></div></li>
				<li><div class="sp">ビタミンA</div><div class="m" id="m20"></div></li>
				<li><div class="sp">ビタミンB1</div><div class="m" id="m32"></div></li>
				<li><div class="sp">ビタミンB2</div><div class="m" id="m33"></div></li>
				<li><div class="sp">ビタミンC</div><div class="m" id="m40"></div></li>
				<li><div class="sp">ビタミンD</div><div class="m" id="m26"></div></li>
				<li><div class="sp">ビタミンE</div><div class="m" id="m27"></div></li>
				<li><div class="sp">ビタミンK</div><div class="m" id="m31"></div></li>
				<li><div class="sp">食塩相当量</div><div class="m" id="m42"></div></li>
			</section>
			<section class="vertical" id="woman">
				<p>成人女性</p>
				<ul><li><div class="sp">エネルギー</div><div class="w" id="w1"></div></li>
				<li><div class="sp">たんぱく質</div><div class="w" id="w2"></div></li>
				<li><div class="sp">脂質</div><div class="w" id="w3"></div></li>
				<li><div class="sp">炭水化物</div><div class="w" id="w5"></div></li>
				<li><div class="sp">食物繊維</div><div class="w" id="w6"></div></li>
				<li><div class="sp">カルシウム</div><div class="w" id="w9"></div></li>
				<li><div class="sp">鉄</div><div class="w" id="w12"></div></li>
				<li><div class="sp">ビタミンA</div><div class="w" id="w20"></div></li>
				<li><div class="sp">ビタミンB1</div><div class="w" id="w32"></div></li>
				<li><div class="sp">ビタミンB2</div><div class="w" id="w33"></div></li>
				<li><div class="sp">ビタミンC</div><div class="w" id="w40"></div></li>
				<li><div class="sp">ビタミンD</div><div class="w" id="w26"></div></li>
				<li><div class="sp">ビタミンE</div><div class="w" id="w27"></div></li>
				<li><div class="sp">ビタミンK</div><div class="w" id="w31"></div></li>
				<li><div class="sp">食塩相当量</div><div class="w" id="w42"></div></li>
			</section>
			<section>
				<p>一週間</p>
<?php
if (isset($week) === TRUE) {
?>
				<div class="container">
					<form method="post">
<?php
foreach ($week as $value) {
?>
						<div class="day even" id="day1"><div class="title">月 <?php print substr($value['mon'], -5); ?></div>
<?php
}
?>
							<div class="food_height" id="food_height1"><div class="food" id="food1" name="food"><div class="sub_title">食品</div><br>
<?php
if (count($foodlog_food[1]) !== 0 || count($foodlog_foodstuff[1]) !== 0) {
	foreach ($foodlog_food[1] as $value) {
?>
								<p>　<?php print htmlspecial($value['food_name']); ?></p>
<?php
	}
} else {
?>
								<select id="food_select11" name="food_select11">
									<option value="0" selected="selected" disabled>食品名を選択して下さい</option>
<?php
	foreach ($food_data as $value) {
?>
									<option value="<?php print htmlspecial($value['food_index']); ?>"><?php print htmlspecial($value['food_name']); ?></option>
<?php
	}
?>
								</select>
<?php
}
?>
							</div>
<?php
if (count($foodlog_food[1]) === 0 && count($foodlog_foodstuff[1]) === 0) {
?>
							<div class="right"><button type="button" class="food_line_add" id="food_line_add1">追加</button><button type="button" class="food_line_delete" id="food_line_delete1">削除</button></div>
<?php
}
?>
							</div>
							<div class="foodstuff_height" id="foodstuff_height1"><div class="foodstuff" id="foodstuff1"><div class="sub_title">食材</div><br>
<?php
if (count($foodlog_food[1]) !== 0 || count($foodlog_foodstuff[1]) !== 0) {
	foreach ($foodlog_foodstuff[1] as $value) {
?>
								<p>　<?php print htmlspecial($value['foodstuff_name']); ?></p>
								<p class="volume"><?php print htmlspecial($value['foodstuff_volume']); ?>g</p>
<?php
	}
} else {
?>
								<select class="parent" id="parent11" name="parent11">
				   					<option value="0" selected="selected" disabled>食材群を選択して下さい</option>
<?php
	foreach ($foodstuff_category_data as $value) {
?>
									<option value="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_category_name']); ?></option>
<?php
	}
?>
								</select>
								<select class="children" id="children11" name="children11" disabled>
									<option value="0" selected="selected" disabled>食材群を選択して下さい</option>						
<?php
	foreach ($foodstuff_data as $value) {
?>
									<option value="<?php print htmlspecial($value['foodstuff_index']); ?>" data-val="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_name']); ?></option>
<?php
	}
?>
								</select>
								<div class="volume" id="volume11"><input type="text" id="foodstuff_volume11" name="foodstuff_volume11" pattern="^[0-9]+$">g</div>
<?php
}
?>
							</div>
<?php
if (count($foodlog_food[1]) === 0 && count($foodlog_foodstuff[1]) === 0) {
?>
							<div class="right"><button type="button" class="foodstuff_line_add" id="foodstuff_line_add1">追加</button><button type="button" class="foodstuff_line_delete" id="foodstuff_line_delete1">削除</button></div>
<?php
}
?>
							</div>
						<input type="hidden" name="day" value=1>
						<input type="hidden" id="food_length1" name="food_length1" value=1>
						<input type="hidden" id="foodstuff_length1" name="foodstuff_length1" value=1>
						<div class="right"><input type="submit" name="register" value="登録" <?php if (count($foodlog_food[1]) !== 0 || count($foodlog_foodstuff[1]) !== 0) { print 'disabled'; } ?>><input type="submit" name="register" value="削除" <?php if (count($foodlog_food[1]) === 0 && count($foodlog_foodstuff[1]) === 0) { print 'disabled'; } ?>></div>
						</div>
					</form>
					<form method="post">
<?php
foreach ($week as $value) {
?>
						<div class="day" id="day2"><div class="title">火 <?php print substr($value['tue'], -5); ?></div>
<?php
}
?>
							<div class="food_height" id="food_height2"><div class="food" id="food2"><div class="sub_title">食品</div><br>
<?php
if (count($foodlog_food[2]) !== 0 || count($foodlog_foodstuff[2]) !== 0) {
	foreach ($foodlog_food[2] as $value) {
?>
								<p>　<?php print htmlspecial($value['food_name']); ?></p>
<?php
	}
} else {
?>
								<select id="food_select21" name="food_select21">
					   				<option value="0" selected="selected" disabled>食品名を選択して下さい</option>
<?php
	foreach ($food_data as $value) {
?>
									<option value="<?php print htmlspecial($value['food_index']); ?>"><?php print htmlspecial($value['food_name']); ?></option>
<?php
	}
?>
								</select>
<?php
}
?>
							</div>
<?php
if (count($foodlog_food[2]) === 0 && count($foodlog_foodstuff[2]) === 0) {
?>
							<div class="right"><button type="button" class="food_line_add" id="food_line_add2">追加</button><button type="button" class="food_line_delete" id="food_line_delete2">削除</button></div>
<?php
}
?>
							</div>
							<div class="foodstuff_height" id="foodstuff_height2"><div class="foodstuff" id="foodstuff2"><div class="sub_title">食材</div><br>
<?php
if (count($foodlog_food[2]) !== 0 || count($foodlog_foodstuff[2]) !== 0) {
	foreach ($foodlog_foodstuff[2] as $value) {
?>
								<p>　<?php print htmlspecial($value['foodstuff_name']); ?></p>
								<p class="volume"><?php print htmlspecial($value['foodstuff_volume']); ?>g</p>
<?php
	}
} else {
?>
								<select class="parent" id="parent21" name="parent21">
					   				<option value="0" selected="selected" disabled>食材群を選択して下さい</option>
<?php
	foreach ($foodstuff_category_data as $value) {
?>
									<option value="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_category_name']); ?></option>
<?php
	}
?>
								</select>
								<select class="children" id="children21" name="children21" disabled>
									<option value="0" selected="selected" disabled>食材群を選択して下さい</option>
<?php
	foreach ($foodstuff_data as $value) {
?>
									<option value="<?php print htmlspecial($value['foodstuff_index']); ?>" data-val="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_name']); ?></option>
<?php
	}
?>
								</select>
								<div class="volume" id="volume21"><input type="text" id="foodstuff_volume21" name="foodstuff_volume21" pattern="^[0-9]+$">g</div>
<?php
}
?>
							</div>
<?php
if (count($foodlog_food[2]) === 0 && count($foodlog_foodstuff[2]) === 0) {
?>
							<div class="right"><button type="button" class="foodstuff_line_add" id="foodstuff_line_add2">追加</button><button type="button" class="foodstuff_line_delete" id="foodstuff_line_delete2">削除</button></div>
<?php
}
?>
							</div>
						<input type="hidden" name="day" value=2>
						<input type="hidden" id="food_length2" name="food_length2" value=1>
						<input type="hidden" id="foodstuff_length2" name="foodstuff_length2" value=1>
						<div class="right"><input type="submit" name="register" value="登録" <?php if (count($foodlog_food[2]) !== 0 || count($foodlog_foodstuff[2]) !== 0) { print 'disabled'; } ?>><input type="submit" name="register" value="削除" <?php if (count($foodlog_food[2]) === 0 && count($foodlog_foodstuff[2]) === 0) { print 'disabled'; } ?>></div>
						</div>
					</form>
					<form method="post">
<?php
foreach ($week as $value) {
?>
						<div class="day even" id="day3"><div class="title">水 <?php print substr($value['wed'], -5); ?></div>
<?php
}
?>
							<div class="food_height" id="food_height3"><div class="food" id="food3"><div class="sub_title">食品</div><br>
<?php
if (count($foodlog_food[3]) !== 0 || count($foodlog_foodstuff[3]) !== 0) {
	foreach ($foodlog_food[3] as $value) {
?>
								<p>　<?php print htmlspecial($value['food_name']); ?></p>
<?php
	}
} else {
?>
								<select id="food_select31" name="food_select31">
					   				<option value="0" selected="selected" disabled>食品名を選択して下さい</option>
<?php
	foreach ($food_data as $value) {
?>
									<option value="<?php print htmlspecial($value['food_index']); ?>"><?php print htmlspecial($value['food_name']); ?></option>
<?php
	}
?>
								</select>
<?php
}
?>
							</div>
<?php
if (count($foodlog_food[3]) === 0 && count($foodlog_foodstuff[3]) === 0) {
?>
							<div class="right"><button type="button" class="food_line_add" id="food_line_add3">追加</button><button type="button" class="food_line_delete" id="food_line_delete3">削除</button></div>
<?php
}
?>
							</div>
							<div class="foodstuff_height" id="foodstuff_height3"><div class="foodstuff" id="foodstuff3"><div class="sub_title">食材</div><br>
<?php
if (count($foodlog_food[3]) !== 0 || count($foodlog_foodstuff[3]) !== 0) {
	foreach ($foodlog_foodstuff[3] as $value) {
?>
								<p>　<?php print htmlspecial($value['foodstuff_name']); ?></p>
								<p class="volume"><?php print htmlspecial($value['foodstuff_volume']); ?>g</p>
<?php
	}
} else {
?>
								<select class="parent" id="parent31" name="parent31">
				   					<option value="0" selected="selected" disabled>食材群を選択して下さい</option>
<?php
	foreach ($foodstuff_category_data as $value) {
?>
									<option value="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_category_name']); ?></option>
<?php
	}
?>
								</select>
								<select class="children" id="children31" name="children31" disabled>
									<option value="0" selected="selected" disabled>食材群を選択して下さい</option>
<?php
	foreach ($foodstuff_data as $value) {
?>
									<option value="<?php print htmlspecial($value['foodstuff_index']); ?>" data-val="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_name']); ?></option>
<?php
	}
?>
								</select>
								<div class="volume" id="volume31"><input type="text" id="foodstuff_volume31" name="foodstuff_volume31" pattern="^[0-9]+$">g</div>
<?php
}
?>
							</div>
<?php
if (count($foodlog_food[3]) === 0 && count($foodlog_foodstuff[3]) === 0) {
?>
							<div class="right"><button type="button" class="foodstuff_line_add" id="foodstuff_line_add3">追加</button><button type="button" class="foodstuff_line_delete" id="foodstuff_line_delete3">削除</button></div>
<?php
}
?>
							</div>
						<input type="hidden" name="day" value=3>
						<input type="hidden" id="food_length3" name="food_length3" value=1>
						<input type="hidden" id="foodstuff_length3" name="foodstuff_length3" value=1>
						<div class="right"><input type="submit" name="register" value="登録" <?php if (count($foodlog_food[3]) !== 0 || count($foodlog_foodstuff[3]) !== 0) { print 'disabled'; } ?>><input type="submit" name="register" value="削除" <?php if (count($foodlog_food[3]) === 0 && count($foodlog_foodstuff[3]) === 0) { print 'disabled'; } ?>></div>
						</div>
					</form>
					<form method="post">
<?php
foreach ($week as $value) {
?>
						<div class="day" id="day4"><div class="title">木 <?php print substr($value['thu'], -5); ?></div>
<?php
}
?>
							<div class="food_height" id="food_height4"><div class="food" id="food4"><div class="sub_title">食品</div><br>
<?php
if (count($foodlog_food[4]) !== 0 || count($foodlog_foodstuff[4]) !== 0) {
	foreach ($foodlog_food[4] as $value) {
?>
								<p>　<?php print htmlspecial($value['food_name']); ?></p>
<?php
	}
} else {
?>
								<select id="food_select41" name="food_select41">
						   			<option value="0" selected="selected" disabled>食品名を選択して下さい</option>
<?php
	foreach ($food_data as $value) {
?>
									<option value="<?php print htmlspecial($value['food_index']); ?>"><?php print htmlspecial($value['food_name']); ?></option>
<?php
	}
?>
								</select>
<?php
}
?>
							</div>
<?php
if (count($foodlog_food[4]) === 0 && count($foodlog_foodstuff[4]) === 0) {
?>
							<div class="right"><button type="button" class="food_line_add" id="food_line_add4">追加</button><button type="button" class="food_line_delete" id="food_line_delete4">削除</button></div>
<?php
}
?>
							</div>
							<div class="foodstuff_height" id="foodstuff_height4"><div class="foodstuff" id="foodstuff4"><div class="sub_title">食材</div><br>
<?php
if (count($foodlog_food[4]) !== 0 || count($foodlog_foodstuff[4]) !== 0) {
	foreach ($foodlog_foodstuff[4] as $value) {
?>
								<p>　<?php print htmlspecial($value['foodstuff_name']); ?></p>
								<p class="volume"><?php print htmlspecial($value['foodstuff_volume']); ?>g</p>
<?php
	}
} else {
?>
								<select class="parent" id="parent41" name="parent41">
						   			<option value="0" selected="selected" disabled>食材群を選択して下さい</option>
<?php
	foreach ($foodstuff_category_data as $value) {
?>
									<option value="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_category_name']); ?></option>
<?php
	}
?>
								</select>
								<select class="children" id="children41" name="children41" disabled>
									<option value="0" selected="selected" disabled>食材群を選択して下さい</option>						
<?php
	foreach ($foodstuff_data as $value) {
?>
									<option value="<?php print htmlspecial($value['foodstuff_index']); ?>" data-val="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_name']); ?></option>
<?php
	}
?>
								</select>
								<div class="volume" id="volume41"><input type="text" id="foodstuff_volume41" name="foodstuff_volume41" pattern="^[0-9]+$">g</div>
<?php
}
?>
							</div>
<?php
if (count($foodlog_food[4]) === 0 && count($foodlog_foodstuff[4]) === 0) {
?>
							<div class="right"><button type="button" class="foodstuff_line_add" id="foodstuff_line_add4">追加</button><button type="button" class="foodstuff_line_delete" id="foodstuff_line_delete4">削除</button></div>
<?php
}
?>
							</div>
						<input type="hidden" name="day" value=4>
						<input type="hidden" id="food_length4" name="food_length4" value=1>
						<input type="hidden" id="foodstuff_length4" name="foodstuff_length4" value=1>
						<div class="right"><input type="submit" name="register" value="登録" <?php if (count($foodlog_food[4]) !== 0 || count($foodlog_foodstuff[4]) !== 0) { print 'disabled'; } ?>><input type="submit" name="register" value="削除" <?php if (count($foodlog_food[4]) === 0 && count($foodlog_foodstuff[4]) === 0) { print 'disabled'; } ?>></div>
						</div>
					</form>
					<form method="post">
<?php
foreach ($week as $value) {
?>
						<div class="day even" id="day5"><div class="title">金 <?php print substr($value['fri'], -5); ?></div>
<?php
}
?>
							<div class="food_height" id="food_height5"><div class="food" id="food5"><div class="sub_title">食品</div><br>
<?php
if (count($foodlog_food[5]) !== 0 || count($foodlog_foodstuff[5]) !== 0) {
	foreach ($foodlog_food[5] as $value) {
?>
								<p>　<?php print htmlspecial($value['food_name']); ?></p>
<?php
	}
} else {
?>
								<select id="food_select51" name="food_select51">
					   				<option value="0" selected="selected" disabled>食品名を選択して下さい</option>
<?php
	foreach ($food_data as $value) {
?>
									<option value="<?php print htmlspecial($value['food_index']); ?>"><?php print htmlspecial($value['food_name']); ?></option>
<?php
	}
?>
								</select>
<?php
}
?>
							</div>
<?php
if (count($foodlog_food[5]) === 0 && count($foodlog_foodstuff[5]) === 0) {
?>
							<div class="right"><button type="button" class="food_line_add" id="food_line_add5">追加</button><button type="button" class="food_line_delete" id="food_line_delete5">削除</button></div>
<?php
}
?>
							</div>
							<div class="foodstuff_height" id="foodstuff_height5"><div class="foodstuff" id="foodstuff5"><div class="sub_title">食材</div><br>
<?php
if (count($foodlog_food[5]) !== 0 || count($foodlog_foodstuff[5]) !== 0) {
	foreach ($foodlog_foodstuff[5] as $value) {
?>
								<p>　<?php print htmlspecial($value['foodstuff_name']); ?></p>
								<p class="volume"><?php print htmlspecial($value['foodstuff_volume']); ?>g</p>
<?php
	}
} else {
?>
								<select class="parent" id="parent51" name="parent51">
				   					<option value="0" selected="selected" disabled>食材群を選択して下さい</option>
<?php
	foreach ($foodstuff_category_data as $value) {
?>
									<option value="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_category_name']); ?></option>
<?php
	}
?>
								</select>
								<select class="children" id="children51" name="children51" disabled>
									<option value="0" selected="selected" disabled>食材群を選択して下さい</option>						
<?php
	foreach ($foodstuff_data as $value) {
?>
									<option value="<?php print htmlspecial($value['foodstuff_index']); ?>" data-val="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_name']); ?></option>
<?php
	}
?>
								</select>
								<div class="volume" id="volume51"><input type="text" id="foodstuff_volume51" name="foodstuff_volume51" pattern="^[0-9]+$">g</div>
<?php
}
?>
							</div>
<?php
if (count($foodlog_food[5]) === 0 && count($foodlog_foodstuff[5]) === 0) {
?>
							<div class="right"><button type="button" class="foodstuff_line_add" id="foodstuff_line_add5">追加</button><button type="button" class="foodstuff_line_delete" id="foodstuff_line_delete5">削除</button></div>
<?php
}
?>
							</div>
						<input type="hidden" name="day" value=5>
						<input type="hidden" id="food_length5" name="food_length5" value=1>
						<input type="hidden" id="foodstuff_length5" name="foodstuff_length5" value=1>
						<div class="right"><input type="submit" name="register" value="登録" <?php if (count($foodlog_food[5]) !== 0 || count($foodlog_foodstuff[5]) !== 0) { print 'disabled'; } ?>><input type="submit" name="register" value="削除" <?php if (count($foodlog_food[5]) === 0 && count($foodlog_foodstuff[5]) === 0) { print 'disabled'; } ?>></div>
						</div>
					</form>
					<form method="post">
<?php
foreach ($week as $value) {
?>
						<div class="day" id="day6"><div class="title">土 <?php print substr($value['sat'], -5); ?></div>
<?php
}
?>
							<div class="food_height" id="food_height6"><div class="food" id="food6"><div class="sub_title">食品</div><br>
<?php
if (count($foodlog_food[6]) !== 0 || count($foodlog_foodstuff[6]) !== 0) {
	foreach ($foodlog_food[6] as $value) {
?>
								<p>　<?php print htmlspecial($value['food_name']); ?></p>
<?php
	}
} else {
?>
								<select id="food_select61" name="food_select61">
					   				<option value="0" selected="selected" disabled>食品名を選択して下さい</option>
<?php
	foreach ($food_data as $value) {
?>
									<option value="<?php print htmlspecial($value['food_index']); ?>"><?php print htmlspecial($value['food_name']); ?></option>
<?php
	}
?>
								</select>
<?php
}
?>
							</div>
<?php
if (count($foodlog_food[6]) === 0 && count($foodlog_foodstuff[6]) === 0) {
?>
							<div class="right"><button type="button" class="food_line_add" id="food_line_add6">追加</button><button type="button" class="food_line_delete" id="food_line_delete6">削除</button></div>
<?php
}
?>
							</div>
							<div class="foodstuff_height" id="foodstuff_height6"><div class="foodstuff" id="foodstuff6"><div class="sub_title">食材</div><br>
<?php
if (count($foodlog_food[6]) !== 0 || count($foodlog_foodstuff[6]) !== 0) {
	foreach ($foodlog_foodstuff[6] as $value) {
?>
								<p>　<?php print htmlspecial($value['foodstuff_name']); ?></p>
								<p class="volume"><?php print htmlspecial($value['foodstuff_volume']); ?>g</p>
<?php
	}
} else {
?>
								<select class="parent" id="parent61" name="parent61">
					   				<option value="0" selected="selected" disabled>食材群を選択して下さい</option>
<?php
	foreach ($foodstuff_category_data as $value) {
?>
									<option value="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_category_name']); ?></option>
<?php
	}
?>
								</select>
								<select class="children" id="children61" name="children61" disabled>
									<option value="0" selected="selected" disabled>食材群を選択して下さい</option>
<?php
	foreach ($foodstuff_data as $value) {
?>
									<option value="<?php print htmlspecial($value['foodstuff_index']); ?>" data-val="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_name']); ?></option>
<?php
	}
?>
								</select>
								<div class="volume" id="volume61"><input type="text" id="foodstuff_volume61" name="foodstuff_volume61" pattern="^[0-9]+$">g</div>
<?php
}
?>
							</div>
<?php
if (count($foodlog_food[6]) === 0 && count($foodlog_foodstuff[6]) === 0) {
?>
							<div class="right"><button type="button" class="foodstuff_line_add" id="foodstuff_line_add6">追加</button><button type="button" class="foodstuff_line_delete" id="foodstuff_line_delete6">削除</button></div>
<?php
}
?>
							</div>
						<input type="hidden" name="day" value=6>
						<input type="hidden" id="food_length6" name="food_length6" value=1>
						<input type="hidden" id="foodstuff_length6" name="foodstuff_length6" value=1>
						<div class="right"><input type="submit" name="register" value="登録" <?php if (count($foodlog_food[6]) !== 0 || count($foodlog_foodstuff[6]) !== 0) { print 'disabled'; } ?>><input type="submit" name="register" value="削除" <?php if (count($foodlog_food[6]) === 0 && count($foodlog_foodstuff[6]) === 0) { print 'disabled'; } ?>></div>
						</div>
					</form>
					<form method="post">
<?php
foreach ($week as $value) {
?>
						<div class="day even" id="day7"><div class="title">日 <?php print substr($value['sun'], -5); ?></div>
<?php
}
?>
							<div class="food_height" id="food_height7"><div class="food" id="food7"><div class="sub_title">食品</div><br>
<?php
if (count($foodlog_food[7]) !== 0 || count($foodlog_foodstuff[7]) !== 0) {
	foreach ($foodlog_food[7] as $value) {
?>
								<p>　<?php print htmlspecial($value['food_name']); ?></p>
<?php
	}
} else {
?>
								<select id="food_select71" name="food_select71">
					   				<option value="0" selected="selected" disabled>食品名を選択して下さい</option>
<?php
	foreach ($food_data as $value) {
?>
									<option value="<?php print htmlspecial($value['food_index']); ?>"><?php print htmlspecial($value['food_name']); ?></option>
<?php
	}
?>
								</select>
<?php
}
?>
							</div>
<?php
if  (count($foodlog_food[7]) === 0 && count($foodlog_foodstuff[7]) === 0) {
?>
							<div class="right"><button type="button" class="food_line_add" id="food_line_add7">追加</button><button type="button" class="food_line_delete" id="food_line_delete7">削除</button></div>
<?php
}
?>
							</div>
							<div class="foodstuff_height" id="foodstuff_height7"><div class="foodstuff" id="foodstuff7"><div class="sub_title">食材</div><br>
<?php
if (count($foodlog_food[7]) !== 0 || count($foodlog_foodstuff[7]) !== 0) {
	foreach ($foodlog_foodstuff[7] as $value) {
?>
								<p>　<?php print htmlspecial($value['foodstuff_name']); ?></p>
								<p class="volume"><?php print htmlspecial($value['foodstuff_volume']); ?>g</p>
<?php
	}
} else {
?>
								<select class="parent" id="parent71" name="parent71">
									<option value="0" selected="selected" disabled>食材群を選択して下さい</option>
<?php
	foreach ($foodstuff_category_data as $value) {
?>
									<option value="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_category_name']); ?></option>
<?php
	}
?>
								</select>
								<select class="children" id="children71" name="children71" disabled>
									<option value="0" selected="selected" disabled>食材群を選択して下さい</option>
<?php
	foreach ($foodstuff_data as $value) {
?>
									<option value="<?php print htmlspecial($value['foodstuff_index']); ?>" data-val="<?php print htmlspecial($value['foodstuff_category_index']); ?>"><?php print htmlspecial($value['foodstuff_name']); ?></option>
<?php
	}
?>
								</select>
								<div class="volume" id="volume71"><input type="text" id="foodstuff_volume71" name="foodstuff_volume71" pattern="^[0-9]+$">g</div>
<?php
}
?>
							</div>
<?php
if  (count($foodlog_food[7]) === 0 && count($foodlog_foodstuff[7]) === 0) {
?>
							<div class="right"><button type="button" class="foodstuff_line_add" id="foodstuff_line_add7">追加</button><button type="button" class="foodstuff_line_delete" id="foodstuff_line_delete7">削除</button></div>
<?php
}
?>
							</div>
						<input type="hidden" name="day" value=7>
						<input type="hidden" id="food_length7" name="food_length7" value=1>
						<input type="hidden" id="foodstuff_length7" name="foodstuff_length7" value=1>
						<div class="right"><input type="submit" name="register" value="登録" <?php if (count($foodlog_food[7]) !== 0 || count($foodlog_foodstuff[7]) !== 0) { print 'disabled'; } ?>><input type="submit" name="register" value="削除" <?php if (count($foodlog_food[7]) === 0 && count($foodlog_foodstuff[7]) === 0) { print 'disabled'; } ?>></div>
						</div>
					</form>
<?php
}
?>
				</div>
				<div class="container">
					<div class="result even">
						<ul class="l">
							<li class="n">エネルギー</li>
							<li class="n">たんぱく質</li>
							<li class="n">脂質</li>
							<li class="n">炭水化物</li>
							<li class="n">食物繊維</li>
							<li class="n">ナトリウム</li>
							<li class="n">カルシウム</li>
							<li class="n">鉄</li>
							<li class="n">ビタミンA</li>
							<li class="n">ビタミンB1</li>
							<li class="n">ビタミンB2</li>
							<li class="n">ビタミンC</li>
							<li class="n">ビタミンD</li>
							<li class="n">ビタミンE</li>
							<li class="n">ビタミンK</li>
						</ul>
					</div>
					<div class="result">
						<ul class="l">
							<li class="n">エネルギー</li>
							<li class="n">たんぱく質</li>
							<li class="n">脂質</li>
							<li class="n">炭水化物</li>
							<li class="n">食物繊維</li>
							<li class="n">ナトリウム</li>
							<li class="n">カルシウム</li>
							<li class="n">鉄</li>
							<li class="n">ビタミンA</li>
							<li class="n">ビタミンB1</li>
							<li class="n">ビタミンB2</li>
							<li class="n">ビタミンC</li>
							<li class="n">ビタミンD</li>
							<li class="n">ビタミンE</li>
							<li class="n">ビタミンK</li>
						</ul>
					</div>
					<div class="result even">
						<ul class="l">
							<li class="n">エネルギー</li>
							<li class="n">たんぱく質</li>
							<li class="n">脂質</li>
							<li class="n">炭水化物</li>
							<li class="n">食物繊維</li>
							<li class="n">ナトリウム</li>
							<li class="n">カルシウム</li>
							<li class="n">鉄</li>
							<li class="n">ビタミンA</li>
							<li class="n">ビタミンB1</li>
							<li class="n">ビタミンB2</li>
							<li class="n">ビタミンC</li>
							<li class="n">ビタミンD</li>
							<li class="n">ビタミンE</li>
							<li class="n">ビタミンK</li>
						</ul>
					</div>
					<div class="result">
						<ul class="l">
							<li class="n">エネルギー</li>
							<li class="n">たんぱく質</li>
							<li class="n">脂質</li>
							<li class="n">炭水化物</li>
							<li class="n">食物繊維</li>
							<li class="n">ナトリウム</li>
							<li class="n">カルシウム</li>
							<li class="n">鉄</li>
							<li class="n">ビタミンA</li>
							<li class="n">ビタミンB1</li>
							<li class="n">ビタミンB2</li>
							<li class="n">ビタミンC</li>
							<li class="n">ビタミンD</li>
							<li class="n">ビタミンE</li>
							<li class="n">ビタミンK</li>
						</ul>
					</div>
					<div class="result even">
						<ul class="l">
							<li class="n">エネルギー</li>
							<li class="n">たんぱく質</li>
							<li class="n">脂質</li>
							<li class="n">炭水化物</li>
							<li class="n">食物繊維</li>
							<li class="n">ナトリウム</li>
							<li class="n">カルシウム</li>
							<li class="n">鉄</li>
							<li class="n">ビタミンA</li>
							<li class="n">ビタミンB1</li>
							<li class="n">ビタミンB2</li>
							<li class="n">ビタミンC</li>
							<li class="n">ビタミンD</li>
							<li class="n">ビタミンE</li>
							<li class="n">ビタミンK</li>
						</ul>
					</div>
					<div class="result">
						<ul class="l">
							<li class="n">エネルギー</li>
							<li class="n">たんぱく質</li>
							<li class="n">脂質</li>
							<li class="n">炭水化物</li>
							<li class="n">食物繊維</li>
							<li class="n">ナトリウム</li>
							<li class="n">カルシウム</li>
							<li class="n">鉄</li>
							<li class="n">ビタミンA</li>
							<li class="n">ビタミンB1</li>
							<li class="n">ビタミンB2</li>
							<li class="n">ビタミンC</li>
							<li class="n">ビタミンD</li>
							<li class="n">ビタミンE</li>
							<li class="n">ビタミンK</li>
						</ul>
					</div>
					<div class="result even">
						<ul class="l">
							<li class="n">エネルギー</li>
							<li class="n">たんぱく質</li>
							<li class="n">脂質</li>
							<li class="n">炭水化物</li>
							<li class="n">食物繊維</li>
							<li class="n">ナトリウム</li>
							<li class="n">カルシウム</li>
							<li class="n">鉄</li>
							<li class="n">ビタミンA</li>
							<li class="n">ビタミンB1</li>
							<li class="n">ビタミンB2</li>
							<li class="n">ビタミンC</li>
							<li class="n">ビタミンD</li>
							<li class="n">ビタミンE</li>
							<li class="n">ビタミンK</li>
						</ul>
					</div>
				</div>
			</section>
	</body>
</html>

