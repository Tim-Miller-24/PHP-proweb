<?
include_once("./db.php");
// var_dump($_POST);
$setName = setName($_POST["name"]);
if ($setName) {
    header("Location:/?route=edit");
} else {
    header("Location:/?route=404");
}