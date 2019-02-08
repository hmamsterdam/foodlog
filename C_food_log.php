<?php
session_start();

require_once 'constant.php';
require_once 'M_function.php';

// 変数用意
$week_no = 0;
$target_day = 0;
$foodlog_food = array();
$foodlog_foodstuff = array();
$food_count = 0;
$foodstuff_count = 0;
$foodstuff_index = array();
$foodstuff_volume2 = array();
$food_nutrition = array();
$foodstuff_nutrition = array();
$foodstuff_volume = array();

$ENERC_KCAL = 0;
$protein = 0;
$fat = 0;
$carbohydrate = 0;
$FIBTG = 0;
$CA = 0;
$FE = 0;
$VITA = 0;
$VITB1 = 0;
$VITB2 = 0;
$VITC = 0;
$VITD = 0;
$VITE = 0;
$VITK = 0;
$NACL_EQ = 0;

// DB接続開始
$link = get_db_connect();

// POST処理取得
$request_method = get_request_method();

// 食品表示
$food_data = food_display($link);

// 食材群表示
$foodstuff_category_data = foodstuff_category_display($link);

// 食材表示
$foodstuff_data = foodstuff_display($link);

// カレンダー表示
$date = date('Y-m-d');
$day = date('w');

// 今日の日付が登録済みかを確認し、未登録の場合は新たに追加する
// ①今日の日付が登録済みかを確認
$calender_exist = date_register_check($link, $date, $day);
if (count($calender_exist) === 0) {

	// ②最後に登録された日曜日を取得
	$latest_sun = calender_select($link, $date);
	
	// ③今週の月曜日を取得
	// ④取得した日付の最後の日付の翌日から順に、今日の日付までをwhileでデータベースに新規登録する
	calender_add($link, $date, $day, $latest_sun[0][0]);
}

// カレンダー表示
$calender = calender_download($link);

// 週取得
if (isset($_GET['week']) === TRUE) {
	$week_no = $_GET['week'];
	$week = week_display($link, $week_no);
}

// フードログ登録
if ($request_method === 'POST'){

$food_list = array();
$foodstuff_parent_list = array();
$foodstuff_children_list = array();

	// 日付の取得
	$target_day = get_post_data('day');

	// 食品の数を取得
	$food_length = get_post_data('food_length' . $target_day);
	$food_length = htmlspecial($food_length);

	// 食材の数を取得
	$foodstuff_length = get_post_data('foodstuff_length' . $target_day);
	$foodstuff_length = htmlspecial($foodstuff_length);

	// 食品を取得
	for ($i = 1; $i <= $food_length; $i++) {
		$food_list[] = get_post_data('food_select' . $target_day . $i);
	}

	// 食材を取得
	for ($j = 1; $j <= $foodstuff_length; $j++) {
		$foodstuff_parent_list[] = get_post_data('parent' . $target_day . $j);
		$foodstuff_children_list[] = get_post_data('children' . $target_day . $j);
	}

	// 食材量を取得
	for ($j = 1; $j <= $foodstuff_length; $j++) {
		$foodstuff_volume_list[] = get_post_data('foodstuff_volume' . $target_day . $j);
	}

	// リロードによる二重送信禁止対応
	if (isset($_SESSION['\'' . $week_no . '-' . $target_day . '\'']) !== TRUE) {
		$_SESSION['\'' . $week_no . '-' . $target_day . '\''] = 0;
	}

	if (get_post_data('register') === '登録' && $_SESSION['\'' . $week_no . '-' . $target_day . '\''] === 0){
		// ログ登録
		foodlog_register($link, $week_no, $target_day, $food_length, $foodstuff_length, $food_list, $foodstuff_children_list, $foodstuff_volume_list);
		$_SESSION['\'' . $week_no . '-' . $target_day . '\''] = 1;

	} elseif (get_post_data('register') === '削除'){

		// ログ削除
		foodlog_delete($link, $week_no, $target_day);
		$_SESSION['\'' . $week_no . '-' . $target_day . '\''] = 0;
	}
}

// フードログ食品表示
$test2 = array();
for ($k = 1; $k <= 7; $k++) {
	$foodlog_food[$k] = foodlog_food_display($link, $week_no, $k);
	
		// 食品構成食材を取得
		for ($test2=0; $test2<count($foodlog_food[$k]); $test2++) {
			$foodstuff_index[$test2] = get_foodstuff_index($link, $foodlog_food[$k][$test2]['food_index']);

			for ($test3=0; $test3<count($foodstuff_index[$test2]); $test3++) {
				// 栄養価を取得
				$food_nutrition[] = get_food_nutrition($link, intval($foodstuff_index[$test2][$test3]['foodstuff_index']));
				
				// 食材のボリュームを取得
				$foodstuff_volume2[] = get_foodstuff_volume($link, intval($foodlog_food[$k][$test2]['food_index']), intval($foodstuff_index[$test2][$test3]['foodstuff_index']));
			}
		}
	
	// V_food_log.phpのCSSの高さを最大値にそろえるため
	if(count($foodlog_food[$k]) > $food_count) {
		$food_count = count($foodlog_food[$k]);
	}
}

// 食品栄養価を加算
for ($test=0; $test<count($food_nutrition); $test++) {
	$ENERC_KCAL = $ENERC_KCAL + $food_nutrition[$test][0][0]['ENERC_KCAL']/100*intval($foodstuff_volume2[$test][0][0]);
	$protein = $protein + $food_nutrition[$test][0][0]['protein']/100*intval($foodstuff_volume2[$test][0][0]);
	$fat = $fat + $food_nutrition[$test][0][0]['fat']/100*intval($foodstuff_volume2[$test][0][0]);
	$carbohydrate = $carbohydrate + $food_nutrition[$test][0][0]['carbohydrate']/100*intval($foodstuff_volume2[$test][0][0]);
	$FIBTG = $FIBTG + $food_nutrition[$test][0][0]['FIBTG']/100*intval($foodstuff_volume2[$test][0][0]);
	$CA = $CA + $food_nutrition[$test][0][0]['CA']/100*intval($foodstuff_volume2[$test][0][0]);
	$FE = $FE + $food_nutrition[$test][0][0]['FE']/100*intval($foodstuff_volume2[$test][0][0]);
	$VITA = $VITA + ($food_nutrition[$test][0][0]['RETOL'] + $food_nutrition[$test][0][0]['CARTA'] + $food_nutrition[$test][0][0]['CARTB'] + $food_nutrition[$test][0][0]['CRYPXB'] + $food_nutrition[$test][0][0]['CARTBEQ'] + $food_nutrition[$test][0][0]['VITA_RAE'])/100*intval($foodstuff_volume2[$test][0][0]);
	$VITB1 = $VITB1 + $food_nutrition[$test][0][0]['THIAHCL']/100*intval($foodstuff_volume2[$test][0][0]);
	$VITB2 = $VITB2 + $food_nutrition[$test][0][0]['RIBF']/100*intval($foodstuff_volume2[$test][0][0]);
	$VITC = $VITC + $food_nutrition[$test][0][0]['VITC']/100*intval($foodstuff_volume2[$test][0][0]);
	$VITD = $VITD + $food_nutrition[$test][0][0]['VITD']/100*intval($foodstuff_volume2[$test][0][0]);
	$VITE = $VITE + ($food_nutrition[$test][0][0]['TOCPHA'] + $food_nutrition[$test][0][0]['TOCPHB'] + $food_nutrition[$test][0][0]['TOCPHG'] + $food_nutrition[$test][0][0]['TOCPHD'])/100*intval($foodstuff_volume2[$test][0][0]);
	$VITK = $VITK + $food_nutrition[$test][0][0]['VITK']/100*intval($foodstuff_volume2[$test][0][0]);
	$NACL_EQ = $NACL_EQ + $food_nutrition[$test][0][0]['NACL_EQ']/100*intval($foodstuff_volume2[$test][0][0]);
}

// フードログ食材表示
for ($m = 1; $m <= 7; $m++) {
	$foodlog_foodstuff[$m] = foodlog_foodstuff_display($link, $week_no, $m);

	// 栄養価を取得
	foreach ($foodlog_foodstuff[$m] as $value) {
		$foodstuff_nutrition[] = get_foodstuff_nutrition($link, $value['foodstuff_name']);
		$foodstuff_volume[] = $value['foodstuff_volume'];
	}

	// V_food_log.phpのCSSの高さを最大値にそろえるため
	if(count($foodlog_foodstuff[$m]) > $foodstuff_count) {
		$foodstuff_count = count($foodlog_foodstuff[$m]);
	}
}

// 食材栄養価を加算
for ($test=0; $test<count($foodstuff_nutrition); $test++) {
	$ENERC_KCAL = $ENERC_KCAL + $foodstuff_nutrition[$test][0]['ENERC_KCAL']/100*$foodstuff_volume[$test];
	$protein = $protein + $foodstuff_nutrition[$test][0]['protein']/100*$foodstuff_volume[$test];
	$fat = $fat + $foodstuff_nutrition[$test][0]['fat']/100*$foodstuff_volume[$test];
	$carbohydrate = $carbohydrate + $foodstuff_nutrition[$test][0]['carbohydrate']/100*$foodstuff_volume[$test];
	$FIBTG = $FIBTG + $foodstuff_nutrition[$test][0]['FIBTG']/100*$foodstuff_volume[$test];
	$CA = $CA + $foodstuff_nutrition[$test][0]['CA']/100*$foodstuff_volume[$test];
	$FE = $FE + $foodstuff_nutrition[$test][0]['FE']/100*$foodstuff_volume[$test];
	$VITA = $VITA + ($foodstuff_nutrition[$test][0]['RETOL'] + $foodstuff_nutrition[$test][0]['CARTA'] + $foodstuff_nutrition[$test][0]['CARTB'] + $foodstuff_nutrition[$test][0]['CRYPXB'] + $foodstuff_nutrition[$test][0]['CARTBEQ'] + $foodstuff_nutrition[$test][0]['VITA_RAE'])/100*$foodstuff_volume[$test];
	$VITB1 = $VITB1 + $foodstuff_nutrition[$test][0]['THIAHCL']/100*$foodstuff_volume[$test];
	$VITB2 = $VITB2 + $foodstuff_nutrition[$test][0]['RIBF']/100*$foodstuff_volume[$test];
	$VITC = $VITC + $foodstuff_nutrition[$test][0]['VITC']/100*$foodstuff_volume[$test];
	$VITD = $VITD + $foodstuff_nutrition[$test][0]['VITD']/100*$foodstuff_volume[$test];
	$VITE = $VITE + ($foodstuff_nutrition[$test][0]['TOCPHA'] + $foodstuff_nutrition[$test][0]['TOCPHB'] + $foodstuff_nutrition[$test][0]['TOCPHG'] + $foodstuff_nutrition[$test][0]['TOCPHD'])/100*$foodstuff_volume[$test];
	$VITK = $VITK + $foodstuff_nutrition[$test][0]['VITK']/100*$foodstuff_volume[$test];
	$NACL_EQ = $NACL_EQ + $foodstuff_nutrition[$test][0]['NACL_EQ']/100*$foodstuff_volume[$test];
}

$m1 = $ENERC_KCAL/(2650*7)*300;
$m2 = $protein/(60*7)*300;
$m3 = $fat/(73.6*7)*300;
$m5 = $carbohydrate/(380*7)*300;
$m6 = $FIBTG/(20*7)*300;
$m9 = $CA/(650*7)*300;
$m12 = $FE/(7.5*7)*300;
$m20 = $VITA/(900*7)*300;
$m32 = $VITB1/(1.4*7)*300;
$m33 = $VITB2/(1.6*7)*300;
$m40 = $VITC/(100*7)*300;
$m26 = $VITD/(5.5*7)*300;
$m27 = $VITE/(6.5*7)*300;
$m31 = $VITK/(150*7)*300;
$m42 = $NACL_EQ/(8*7)*300;

$w1 = $ENERC_KCAL/(2000*7)*300;
$w2 = $protein/(50*7)*300;
$w3 = $fat/(55.5*7)*300;
$w5 = $carbohydrate/(285*7)*300;
$w6 = $FIBTG/(18*7)*300;
$w9 = $CA/(650*7)*300;
$w12 = $FE/(10.5*7)*300;
$w20 = $VITA/(700*7)*300;
$w32 = $VITB1/(1.1*7)*300;
$w33 = $VITB2/(1.2*7)*300;
$w40 = $VITC/(100*7)*300;
$w26 = $VITD/(5.5*7)*300;
$w27 = $VITE/(6*7)*300;
$w31 = $VITK/(150*7)*300;
$w42 = $NACL_EQ/(7*7)*300;

include_once 'V_food_log.php';

