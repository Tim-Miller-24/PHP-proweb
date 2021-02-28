<?
include_once("./db.php");

$addComment = addComment($_POST['descr']);


if ($addComment) {
    header("Location:/?route=guest");
} else {
    header("Location:/?route=404");
}