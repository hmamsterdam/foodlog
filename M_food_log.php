<?php

// �J�����_�[�o�^�m�F
function date_register_check($link, $date, $day){
	$target_day = '';
	if ($day === '0'){ $target_day = 'sun'; } elseif ($day === '1'){ $target_day = 'mon'; } elseif ($day === '2'){ $target_day = 'tue'; } elseif ($day === '3'){ $target_day = 'wed'; } elseif ($day === '4'){ $target_day = 'thu'; } elseif ($day === '5'){ $target_day = 'fri'; } elseif ($day === '6'){ $target_day = 'sat'; }
    $sql = 'SELECT week_no FROM calender WHERE ' . $target_day . ' = \'' . $date . '\'';
    $calender_exist = sql_select($link, $sql);
    return $calender_exist;
}


// �o�^�ς݃J�����_�[�擾
function calender_select($link, $date){
	$sql = 'SELECT week_no FROM calender';
    $registered_week = sql_select($link, $sql);
	$sql = 'SELECT sun FROM calender WHERE week_no = \'' . count($registered_week) . '\'';		// $registered_week��0�i�J�����_�[�o�^�Ȃ��j���ƃG���[���\�������
    $latest_sun = sql_select($link, $sql);
	return $latest_sun;
}


// �J�����_�[�ǉ��쐬
function calender_add($link, $date, $day, $latest_sun){
	if ($day === '0'){ $minus = -6; } elseif ($day === '1'){ $minus = 0; } elseif ($day === '2'){ $minus = -1; } elseif ($day === '3'){ $minus = -2; } elseif ($day === '4'){ $minus = -3; } elseif ($day === '5'){ $minus = -4; } elseif ($day === '6'){ $minus = -5; }

	// ���T�̌��j���̓��t���擾
	$this_mon = date('Y-m-d', strtotime($minus . ' day', time()));

	// $latest_sun�̗�������$this_mon�̏T�܂ł�o�^
	while(strtotime($latest_sun) < strtotime($this_mon)){
		$mon = date('Y-m-d', strtotime($latest_sun . ' +1 day'));
		$tue = date('Y-m-d', strtotime($latest_sun . ' +2 day'));
		$wed = date('Y-m-d', strtotime($latest_sun . ' +3 day'));
		$thu = date('Y-m-d', strtotime($latest_sun . ' +4 day'));
		$fri = date('Y-m-d', strtotime($latest_sun . ' +5 day'));
		$sat = date('Y-m-d', strtotime($latest_sun . ' +6 day'));
		$sun = date('Y-m-d', strtotime($latest_sun . ' +7 day'));

		$sql = 'INSERT INTO calender(mon, tue, wed, thu, fri, sat, sun) VALUES(\'' . $mon . '\', \'' . $tue . '\', \'' . $wed . '\', \'' . $thu . '\', \'' . $fri . '\', \'' . $sat . '\', \'' . $sun . '\')';
		sql_update($link, $sql);
		
		$latest_sun = date('Y-m-d', strtotime($latest_sun . ' +7 day'));
	}
}


// �J�����_�[�\��
function calender_download($link){
	$sql = 'SELECT * FROM calender';
	$calender = sql_select($link, $sql);
	return $calender;
}


// �T�擾
function week_display($link, $week_no){
	$sql = 'SELECT * FROM calender WHERE week_no = ' . $week_no;
	$week = sql_select($link, $sql);
	return $week;
}


// �t�[�h���O�o�^
function foodlog_register($link, $week_no, $target_day, $food_length, $foodstuff_length, $food_list, $foodstuff_children_list, $foodstuff_volume_list){

	// �H�i���O�o�^
	if ($food_list[0] != 0) {
		for ($i = 0; $i < intval($food_length); $i++) {
			$sql = 'INSERT INTO foodlog(week_no, date, food_or_foodstuff_index, food_index_or_foodstuff_index) VALUES(\'' . $week_no . '\', \'' . $target_day . '\', 1, \'' . $food_list[$i] . '\')';
			sql_update($link, $sql);
		}
	}
	// �H�ރ��O�o�^
	if ($foodstuff_children_list[0] != 0) {
		for ($j = 0; $j < intval($foodstuff_length); $j++) {
			$sql = 'INSERT INTO foodlog(week_no, date, food_or_foodstuff_index, food_index_or_foodstuff_index, foodstuff_volume) VALUES(\'' . $week_no . '\', \'' . $target_day . '\', 2, \'' . $foodstuff_children_list[$j] . '\', \'' . $foodstuff_volume_list[$j] . '\')';
			sql_update($link, $sql);
		}
	}

}


// �t�[�h���O�폜
function foodlog_delete($link, $week_no, $target_day) {
	$sql = 'DELETE FROM foodlog WHERE week_no = ' . $week_no . ' AND date = ' . $target_day;
	sql_update($link, $sql);
}


// �t�[�h���O�H�i�\��
function foodlog_food_display($link, $week_no, $k){
	$foodlog_food = array();
	$sql = "SELECT food_index, food_name FROM food JOIN foodlog ON foodlog.food_index_or_foodstuff_index = food.food_index WHERE foodlog.food_or_foodstuff_index = 1 AND foodlog.week_no = " . $week_no . " AND foodlog.date = " . $k;
	$foodlog_food = sql_select($link, $sql);
	return $foodlog_food;
}


// �t�[�h���O�H�ޕ\��
function foodlog_foodstuff_display($link, $week_no, $m){
	$foodlog_foodstuff = array();
	$sql = "SELECT foodstuff_name, foodstuff_volume FROM foodstuff_nutrition JOIN foodlog ON foodlog.food_index_or_foodstuff_index = foodstuff_nutrition.foodstuff_index WHERE foodlog.food_or_foodstuff_index = 2 AND foodlog.week_no = " . $week_no . " AND foodlog.date = " . $m;
	$foodlog_foodstuff = sql_select($link, $sql);
	return $foodlog_foodstuff;
}


// �H�i�\���H�ގ擾
function get_foodstuff_index ($link, $index) {
	$sql = 'SELECT foodstuff_index FROM food_foodstuff WHERE food_index = \'' . $index . '\'';
	$foodstuff = sql_select($link, $sql);
	return $foodstuff;
}


// �H�i�\���{�����[���擾
function get_foodstuff_volume ($link, $food_index, $foodstuff_index) {
	$sql = 'SELECT foodstuff_volume FROM food_foodstuff WHERE food_index = \'' . $food_index . '\' AND foodstuff_index = \'' . $foodstuff_index . '\'';
	$foodstuff = sql_select($link, $sql);
	return $foodstuff;
}


// �H�i�h�{�����擾
function get_food_nutrition($link, $foodstuff_index) {
	$nutrition = array();
	$sql = 'SELECT * FROM foodstuff_nutrition WHERE foodstuff_index = \'' . $foodstuff_index . '\'';
	$nutrition[] = sql_select($link, $sql);
	return $nutrition;
}

// �H�މh�{�����擾
function get_foodstuff_nutrition ($link, $name) {
$nutrition = array();
	$sql = 'SELECT * FROM foodstuff_nutrition WHERE foodstuff_name = \'' . $name . '\'';
	$nutrition = sql_select($link, $sql);
	return $nutrition;
}


