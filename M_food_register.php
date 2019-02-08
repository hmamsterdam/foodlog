<?php

// 食材カテゴリー表示
function foodstuff_category_display($link) {
    $sql = 'SELECT foodstuff_category_index, foodstuff_category_name FROM foodstuff_category';
    $data = sql_select($link, $sql);
    return $data;
}


// 食材表示
function foodstuff_display($link) {
    $sql = 'SELECT foodstuff_category_index, foodstuff_index, foodstuff_name FROM foodstuff_nutrition';
    $foodstuff_data = sql_select($link, $sql);
    return $foodstuff_data;
}


// 食品成分表示
function food_component_display($link, $food) {
    $sql = 'SELECT food.food_index, food_name, foodstuff_nutrition.foodstuff_index, foodstuff_name, foodstuff_volume FROM food_foodstuff JOIN food ON food_foodstuff.food_index = food.food_index JOIN foodstuff_nutrition ON food_foodstuff.foodstuff_index = foodstuff_nutrition.foodstuff_index WHERE food.food_index = ' . $food;
    $food_component = sql_select($link, $sql);
    return $food_component;
}


// 食品登録
function food_register($link, $food_name, $people, $number_of_foodstuff, $foodstuff_parent_list, $foodstuff_children_list, $foodstuff_volume_list) {
	$msg = '';

	// 食品登録有無の確認
	$sql = 'SELECT food_name FROM food WHERE food_name = \'' . $food_name . '\'';
	$food = sql_select($link, $sql);
	if (count($food) === 0) {

		mysqli_autocommit($link, false);

		// 食品名の登録
		$sql = 'INSERT INTO food(food_name) VALUES(\'' . $food_name . '\')';
		sql_update($link, $sql);

		// 食品番号の取得【$food_index[0][0]に格納される】
		$sql = 'SELECT food_index FROM food WHERE food_name = \'' . $food_name . '\'';
		$food_index = sql_select($link, $sql);
	
		// ボリュームの計算
		for ($i = 0; $i < count($foodstuff_volume_list); $i++) {
			$volume[] = intval($foodstuff_volume_list[$i]) / intval($people);
		}

		//食材群・食材・ボリュームの登録
		for ($j = 0; $j < intval($number_of_foodstuff); $j++) {
			$sql = 'INSERT INTO food_foodstuff(food_index, foodstuff_index, foodstuff_volume) VALUES(' . $food_index[0][0] . ', ' . $foodstuff_children_list[$j] . ', ' . $volume[$j] . ')';
			sql_update($link, $sql);
		}

	} else {
		$msg = 'NO';
	}
	
	if ($msg === '') {
        mysqli_commit($link);
        return $msg;
    } else {
        mysqli_rollback($link);
		return $msg;
    }
}


// 食品成分変更
function food_change($link, $food_index, $foodstuff_length, $foodstuff_index, $foodstuff_volume) {
	for($i = 0; $i < $foodstuff_length; $i++) {
		if( $foodstuff_volume[$i] == 0) {
			$sql = 'DELETE from food_foodstuff WHERE food_index = ' . $food_index . ' AND foodstuff_index = ' . $foodstuff_index[$i];
    		sql_update($link, $sql);
		} else {
			$sql = 'UPDATE food_foodstuff SET foodstuff_volume = ' . $foodstuff_volume[$i] . ' WHERE food_index = ' . $food_index . ' AND foodstuff_index = ' . $foodstuff_index[$i];
    		sql_update($link, $sql);
		}
    }
}


// 食品削除
function food_delete($link, $food) {
	$sql = 'DELETE FROM food WHERE food_index = ' . $food;
	sql_update($link, $sql);
	$sql = 'DELETE FROM food_foodstuff WHERE food_index = ' . $food;
	sql_update($link, $sql);
}


// 食材成分表示
function foodstuff_component_display($link, $foodstuff) {
    $sql = 'SELECT * FROM foodstuff_nutrition WHERE foodstuff_index = ' . $foodstuff;
    $foodstuff_component = sql_select($link, $sql);
    return $foodstuff_component;
}


// 食材登録
function foodstuff_register($link, $foodstuff_category_index, $foodstuff_name, $nutrition) {
	$msg = '';

	// 食材登録有無の確認
	$sql = 'SELECT foodstuff_name FROM foodstuff_nutrition WHERE foodstuff_name = \'' . $foodstuff_name . '\'';
	$foodstuff = sql_select($link, $sql);
	if (count($foodstuff) === 0) {

		// 栄養価が空白なら0を代入
		for ($i = 1; $i <= 41; $i++){
			if ($nutrition[$i] === '') {
				$nutrition[$i] = 0;
			}
		}

		mysqli_autocommit($link, false);

		// 食材の登録
		$sql = 'INSERT INTO foodstuff_nutrition(foodstuff_category_index, foodstuff_name, ENERC_KCAL, protein, fat, CHOLE, carbohydrate, FIBTG, NA, K ,CA, MG, P, FE, ZN, CU, MN, ID, SE, CR, MO, RETOL, CARTA, CARTB, CRYPXB, CARTBEQ, VITA_RAE, VITD, TOCPHA, TOCPHB, TOCPHG, TOCPHD, VITK, THIAHCL, RIBF, NIA, VITB6A, VITB12, FOL, PANTAC, BIOT, VITC, NACL_EQ) VALUES(' . $foodstuff_category_index . ', \'' . $foodstuff_name . '\', ' . $nutrition[1] . ', ' . $nutrition[2] . ', ' . $nutrition[3] . ', ' . $nutrition[4] . ', ' . $nutrition[5] . ', ' . $nutrition[6] . ', ' . $nutrition[7] . ', ' . $nutrition[8] . ', ' . $nutrition[9] . ', ' . $nutrition[10] . ', ' . $nutrition[11] . ', ' . $nutrition[12] . ', ' . $nutrition[13] . ', ' . $nutrition[14] . ', ' . $nutrition[15] . ', ' . $nutrition[16] . ', ' . $nutrition[17] . ', ' . $nutrition[18] . ', ' . $nutrition[19] . ', ' . $nutrition[20] . ', ' . $nutrition[21] . ', ' . $nutrition[22] . ', ' . $nutrition[23] . ', ' . $nutrition[24] . ', ' . $nutrition[25] . ', ' . $nutrition[26] . ', ' . $nutrition[27] . ', ' . $nutrition[28] . ', ' . $nutrition[29] . ', ' . $nutrition[30] . ', ' . $nutrition[31] . ', ' . $nutrition[32] . ', ' . $nutrition[33] . ', ' . $nutrition[34] . ', ' . $nutrition[35] . ', ' . $nutrition[36] . ', ' . $nutrition[37] . ', ' . $nutrition[38] . ', ' . $nutrition[39] . ', ' . $nutrition[40] . ', ' . $nutrition[41] . ')';
		sql_update($link, $sql);

	} else {
		$msg = 'NO';
	}
	
	if ($msg === '') {
        mysqli_commit($link);
        return $msg;
    } else {
        mysqli_rollback($link);
		return $msg;
    }
}


// 食材成分変更
function foodstuff_change($link, $foodstuff_category_index, $foodstuff_index, $nutrition) {
	$sql = 'UPDATE foodstuff_nutrition SET ENERC_KCAL = '. $nutrition[1] . ', protein = '. $nutrition[2] . ', fat = '. $nutrition[3] . ', CHOLE = '. $nutrition[4] . ', carbohydrate = '. $nutrition[5] . ', FIBTG = '. $nutrition[6] . ', NA = '. $nutrition[7] . ', K = '. $nutrition[8] . ', CA = '. $nutrition[9] . ', MG = '. $nutrition[10] . ', P = '. $nutrition[11] . ', FE = '. $nutrition[12] . ', ZN = '. $nutrition[13] . ', CU = '. $nutrition[14] . ', MN = '. $nutrition[15] . ', ID = '. $nutrition[16] . ', SE = '. $nutrition[17] . ', CR = '. $nutrition[18] . ', MO = '. $nutrition[19] . ', RETOL = '. $nutrition[20] . ', CARTA = '. $nutrition[21] . ', CARTB = '. $nutrition[22] . ', CRYPXB = '. $nutrition[23] . ', CARTBEQ = '. $nutrition[24] . ', VITA_RAE = '. $nutrition[25] . ', VITD = '. $nutrition[26] . ', TOCPHA = '. $nutrition[27] . ', TOCPHB = '. $nutrition[28] . ', TOCPHG = '. $nutrition[29] . ', TOCPHD = '. $nutrition[30] . ', VITK = '. $nutrition[31] . ', THIAHCL = '. $nutrition[32] . ', RIBF = '. $nutrition[33] . ', NIA = '. $nutrition[34] . ', VITB6A = '. $nutrition[35] . ', VITB12 = '. $nutrition[36] . ', FOL = '. $nutrition[37] . ', PANTAC = '. $nutrition[38] . ', BIOT = '. $nutrition[39] . ', VITC = '. $nutrition[40] . ', NACL_EQ = '. $nutrition[41] . ' WHERE foodstuff_index = ' . $foodstuff_index;
	sql_update($link, $sql);
}


// 食品削除
function foodstuff_delete($link, $foodstuff_index) {
	$sql = 'DELETE FROM foodstuff_nutrition WHERE foodstuff_index = ' . $foodstuff_index;
	sql_update($link, $sql);
	$sql = 'DELETE FROM food_foodstuff WHERE foodstuff_index = ' . $foodstuff_index;
	sql_update($link, $sql);
	$msg = '削除されました';
	return($msg);
}
