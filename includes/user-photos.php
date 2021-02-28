<?
include_once("./db.php");
// var_dump($_FILES);
$login = userInfo();
$photos = $_FILES["photo"];

foreach ($photos["name"] as $key => $value) {
    $rand_name = md5(time())."-$key";
    $photoExt = pathinfo($value, PATHINFO_EXTENSION);
    $photoName = "{$login['user_login']}-$rand_name.$photoExt";
    $dirNamePhoto = "./img/users/$photoName";
    if (is_uploaded_file($photos["tmp_name"][$key])) {
        $result = addPhotos($dirNamePhoto);
        if ($result) {
            move_uploaded_file($photos["tmp_name"][$key], ".$dirNamePhoto");
        }
    }
}

header("Location:/?route=edit");