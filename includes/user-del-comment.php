<?
include_once("./db.php");

// var_dump($_GET);

$deleteComment = deleteComment($_GET['trash']);
if ($deleteComment) {
    header("Location:/?route=guest");
} else {
    header("Location:/?route=guest&error=del");
}