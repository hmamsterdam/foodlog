<?php

require_once 'constant.php';
require_once 'M_function.php';

// 変数登録
$food_display = 0;
$foodstuff_display = 0;
$food = array();
$food_index = 0;
$food_component = array();
$foodstuff_index = array();
$foodstuff_volume = array();
$foodstuff_component = array();

$foodstuff_category = 0;
$foodstuff_category_index = 0;
$foodstuff = '';

// DB接続開始
$link = get_db_connect();




// POST処理取得
$request_method = get_request_method();

// 登録処理
if ($request_method === 'POST'){

	// 食品取得
	if (get_post_data('food_update') !== '変更' && get_post_data('food_update') !== '削除' && get_post_data('food_parent') !== null && get_post_data('food_parent') !== '') {

		$food_display = 1;
		$food_index = get_post_data('food_parent');
		$food_component = food_component_display($link, $food_index);

	// 食品登録
	} elseif (get_post_data('food_register') === '登録') {
	
		// 食品名を取得
		$food_name = get_post_data('food');
    
		// 人数を取得
		$people = get_post_data('people');
    
		// 食材の数を取得
		$number_of_foodstuff = get_post_data('number_of_foodstuff');
		$number_of_foodstuff = htmlspecial($number_of_foodstuff);

		// 食材群・食材・ボリュームを取得
		for ($i = 1; $i <= $number_of_foodstuff; $i++) {
			$foodstuff_parent_list[] = get_post_data('parent' . $i);
			$foodstuff_children_list[] = get_post_data('children' . $i);
			$foodstuff_volume_list[] = get_post_data('foodstuff_volume' . $i);
		}
		
		$msg = food_register($link, $food_name, $people, $number_of_foodstuff, $foodstuff_parent_list, $foodstuff_children_list, $foodstuff_volume_list);

	// 食品成分変更
	} elseif (get_post_data('food_update') === '変更') {

		$food_display = 1;
		$food_index = get_post_data('food_index');
		$foodstuff_length = get_post_data('foodstuff_length');
		for ($i = 1; $i <= $foodstuff_length; $i++) {
			$foodstuff_index[] = get_post_data('foodstuff_index' . $i);
			$foodstuff_volume[] = get_post_data('foodstuff_volume' . $i);
		}
		food_change($link, $food_index, $foodstuff_length, $foodstuff_index, $foodstuff_volume);
		$food_component = food_component_display($link, $food_index);

	// 食品削除
	} elseif (get_post_data('food_update') === '削除') {

		$food_display = 1;
		$food_index = intval(get_post_data('food_index'));
		food_delete($link, $food_index);
	
	// 食品成分表示
	} elseif (get_post_data('food_display') === '編集画面へ') {
		$food_display = 1;
		$foodstuff_display = intval(get_post_data('foodstuff_display'));
	} elseif (get_post_data('food_display') === '登録画面へ') {
		$food_display = 0;
		$foodstuff_display = intval(get_post_data('foodstuff_display'));

	// 食材取得
	} elseif (get_post_data('foodstuff_update') !== '変更' && get_post_data('foodstuff_update') !== '削除' && get_post_data('childrenB') !== null && get_post_data('childrenB') !== '') {

		$foodstuff_display = 1;
		$foodstuff_category = get_post_data('parentB');
		$foodstuff = get_post_data('childrenB');
		$foodstuff_component = foodstuff_component_display($link, $foodstuff);

	// 食材登録
	} elseif (get_post_data('foodstuff_register') === '登録') {
		
		// 食材を取得
		$foodstuff_name = get_post_data('foodstuff_register_foodstuff');
		
		// 食材群を取得
		$foodstuff_category_index = get_post_data('foodstuff_register_foodstuff_category');
		
		// 栄養価を取得
		$nutrition_list[1] = get_post_data('ENERC_KCAL');
		$nutrition_list[2] = get_post_data('protein');
		$nutrition_list[3] = get_post_data('fat');
		$nutrition_list[4] = get_post_data('CHOLE');
		$nutrition_list[5] = get_post_data('carbohydrate');
		$nutrition_list[6] = get_post_data('FIBTG');
		$nutrition_list[7] = get_post_data('NA');
		$nutrition_list[8] = get_post_data('K');
		$nutrition_list[9] = get_post_data('CA');
		$nutrition_list[10] = get_post_data('MG');
		$nutrition_list[11] = get_post_data('P');
		$nutrition_list[12] = get_post_data('FE');
		$nutrition_list[13] = get_post_data('ZN');
		$nutrition_list[14] = get_post_data('CU');
		$nutrition_list[15] = get_post_data('MN');
		$nutrition_list[16] = get_post_data('ID');
		$nutrition_list[17] = get_post_data('SE');
		$nutrition_list[18] = get_post_data('CR');
		$nutrition_list[19] = get_post_data('MO');
		$nutrition_list[20] = get_post_data('RETOL');
		$nutrition_list[21] = get_post_data('CARTA');
		$nutrition_list[22] = get_post_data('CARTB');
		$nutrition_list[23] = get_post_data('CRYPXB');
		$nutrition_list[24] = get_post_data('CARTBEQ');
		$nutrition_list[25] = get_post_data('VITA_RAE');
		$nutrition_list[26] = get_post_data('VITD');
		$nutrition_list[27] = get_post_data('TOCPHA');
		$nutrition_list[28] = get_post_data('TOCPHB');
		$nutrition_list[29] = get_post_data('TOCPHG');
		$nutrition_list[30] = get_post_data('TOCPHD');
		$nutrition_list[31] = get_post_data('VITK');
		$nutrition_list[32] = get_post_data('THIAHCL');
		$nutrition_list[33] = get_post_data('RIBF');
		$nutrition_list[34] = get_post_data('NIA');
		$nutrition_list[35] = get_post_data('VITB6A');
		$nutrition_list[36] = get_post_data('VITB12');
		$nutrition_list[37] = get_post_data('FOL');
		$nutrition_list[38] = get_post_data('PANTAC');
		$nutrition_list[39] = get_post_data('BIOT');
		$nutrition_list[40] = get_post_data('VITC');
		$nutrition_list[41] = get_post_data('NACL_EQ');
		
		$msg2 = foodstuff_register($link, $foodstuff_category_index, $foodstuff_name, $nutrition_list);

	// 食材成分変更
	} elseif (get_post_data('foodstuff_update') === '変更') {

		$foodstuff_display = 1;
		$foodstuff_category_index = 1;

		// 食材を取得
		$foodstuff_index = get_post_data('foodstuff_index');
		
		// 食材群を取得
		$foodstuff_category_index = get_post_data('foodstuff_category_index');
		
		// 栄養価を取得
		$nutrition_list[1] = get_post_data('ENERC_KCAL');
		$nutrition_list[2] = get_post_data('protein');
		$nutrition_list[3] = get_post_data('fat');
		$nutrition_list[4] = get_post_data('CHOLE');
		$nutrition_list[5] = get_post_data('carbohydrate');
		$nutrition_list[6] = get_post_data('FIBTG');
		$nutrition_list[7] = get_post_data('NA');
		$nutrition_list[8] = get_post_data('K');
		$nutrition_list[9] = get_post_data('CA');
		$nutrition_list[10] = get_post_data('MG');
		$nutrition_list[11] = get_post_data('P');
		$nutrition_list[12] = get_post_data('FE');
		$nutrition_list[13] = get_post_data('ZN');
		$nutrition_list[14] = get_post_data('CU');
		$nutrition_list[15] = get_post_data('MN');
		$nutrition_list[16] = get_post_data('ID');
		$nutrition_list[17] = get_post_data('SE');
		$nutrition_list[18] = get_post_data('CR');
		$nutrition_list[19] = get_post_data('MO');
		$nutrition_list[20] = get_post_data('RETOL');
		$nutrition_list[21] = get_post_data('CARTA');
		$nutrition_list[22] = get_post_data('CARTB');
		$nutrition_list[23] = get_post_data('CRYPXB');
		$nutrition_list[24] = get_post_data('CARTBEQ');
		$nutrition_list[25] = get_post_data('VITA_RAE');
		$nutrition_list[26] = get_post_data('VITD');
		$nutrition_list[27] = get_post_data('TOCPHA');
		$nutrition_list[28] = get_post_data('TOCPHB');
		$nutrition_list[29] = get_post_data('TOCPHG');
		$nutrition_list[30] = get_post_data('TOCPHD');
		$nutrition_list[31] = get_post_data('VITK');
		$nutrition_list[32] = get_post_data('THIAHCL');
		$nutrition_list[33] = get_post_data('RIBF');
		$nutrition_list[34] = get_post_data('NIA');
		$nutrition_list[35] = get_post_data('VITB6A');
		$nutrition_list[36] = get_post_data('VITB12');
		$nutrition_list[37] = get_post_data('FOL');
		$nutrition_list[38] = get_post_data('PANTAC');
		$nutrition_list[39] = get_post_data('BIOT');
		$nutrition_list[40] = get_post_data('VITC');
		$nutrition_list[41] = get_post_data('NACL_EQ');
		
		$msg2 = foodstuff_change($link, $foodstuff_category_index, $foodstuff_index, $nutrition_list);
	
		$foodstuff_component = foodstuff_component_display($link, $foodstuff_index);
		
	// 食材削除
	} elseif (get_post_data('foodstuff_update') === '削除') {
		
		$foodstuff_display = 1;
		$foodstuff_index = get_post_data('foodstuff_index');
		$msg2 = foodstuff_delete($link, $foodstuff_index);
	
	// 食材成分表示	
	} elseif (get_post_data('foodstuff_display') === '編集画面へ') {
		$foodstuff_display = 1;
		$food_display = intval(get_post_data('food_display'));
	} elseif (get_post_data('foodstuff_display') === '登録画面へ') {
		$foodstuff_display = 0;
		$food_display = intval(get_post_data('food_display'));
	}
}

// 食品表示
$food = food_display($link);

// 食材群表示
$foodstuff_category_data = foodstuff_category_display($link);

// 食材表示
$foodstuff_data = foodstuff_display($link);



// DB接続終了
db_close($link);

include_once 'V_food_register.php';



