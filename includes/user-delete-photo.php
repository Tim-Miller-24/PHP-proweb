<?
include_once("./db.php");
// var_dump($_GET);
$delPhoto = delPhoto($_GET["trash"]);
if ($delPhoto) {
    header("Location:/?route=edit");
} else {
    header("Location:/?route=edit&error=del");
}