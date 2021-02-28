<?
include_once("./db.php");
// var_dump($_POST);
$setLogin = setLogin($_POST["login"]);
if ($setLogin) {
    header("Location:/?route=edit");
} else {
    header("Location:/?route=404");
}