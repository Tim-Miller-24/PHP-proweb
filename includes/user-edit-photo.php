<?
include_once("./db.php");
// var_dump($_POST);
$setPhoto = setPhoto($_POST["ava"]);
if ($setPhoto) {
    header("Location:/?route=edit");
} else {
    header("Location:/?route=404");
}