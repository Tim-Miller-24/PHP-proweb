<?
include_once("./db.php");

// var_dump(userGetCommentInfoById($_GET['edit']));

$editComment = editComment($_POST['descr'] ,$_POST['commentId']);
if ($editComment) {
    header("Location:/?route=guest");
} else {
    header("Location:/?route=guest&error=del");
}
