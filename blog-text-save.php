<?php
header("Content-Type: application/json; charset=UTF-8"); //ヘッダー情報の明記。必須。
session_start();
/*
if (isset($_SESSION['blog_text'])) {
    session_unregister('blog_text');
}
*/
$_SESSION['blog_text']=filter_input(INPUT_POST,"blog_text");
echo json_encode(""); //jsonオブジェクト化。必須。配列でない場合は、敢えてjson化する必要はない
?>
