<?php 
function addItem($item, $date) {
    end($_SESSION['todoItem']);
    end($_SESSION["date"]);
    $key = key($_SESSION['todoItem']) + 1;
    $keys = key($_SESSION['date']) + 1;
    $_SESSION['todoItem'][$key]['item'] = $item;
    $_SESSION['todoItem'][$key]['completed'] = '';
    $_SESSION["date"][$keys] = $date;
}
function toggleComplete($item) {
    if($_SESSION['todoItem'][$item]['completed'] == '') {
        $_SESSION['todoItem'][$item]['completed'] = 'done';
        return;
    } 
    $_SESSION['todoItem'][$item]['completed'] = '';
}
function deleteItem($item) {
    unset($_SESSION['todoItem'][$item]);
}

?>