<?php
///////////////////////////////
// あくまでも共有関数だけを書く
///////////////////////////////

require_once 'M_food_register.php';
require_once 'M_food_log.php';

// htmlspecialchars
function htmlspecial($str) {
    $chars = '';
    $chars = htmlspecialchars($str, ENT_QUOTES, HTML_CHARACTER_SET);
    return $chars;
}


// リクエストメソッドを取得
function get_request_method(){
    return $_SERVER['REQUEST_METHOD'];
}


// POSTデータ取得
function get_post_data($key) {
    $str = '';
    if (isset($_POST[$key]) === TRUE) {
        $str = $_POST[$key];
    }
    return $str;
}


// DB接続
function get_db_connect() {
    $link = mysqli_connect("127.0.0.1", "hiro", "hiro", "foodlog");
    if ($link) {
        mysqli_set_charset($link, DB_CHARACTER_SET);
        return $link;
    }
}


// DB切断
function db_close($link) {
    mysqli_close($link);
}


// SQL_SELECT
function sql_select($link, $sql) {
    $data = array();
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $data[] = $row;
    }
    return $data;
    mysqli_free_result($result);
}


// SQL_UPDATE
function sql_update($link, $sql) {
    if (mysqli_query($link, $sql) !== TRUE) {
        return 'error';
    }
}


// 食品表示
function food_display($link) {
    $sql = 'SELECT food_index, food_name FROM food';
    $food_data = sql_select($link, $sql);
    return $food_data;
}
