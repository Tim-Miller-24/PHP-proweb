<?
include_once("./db.php");

$addComment = addComment($_POST['descr']);


if ($addComment) {
    header("Location:/?route=guest");
} else if(isset($_GET)) {
    header("Location:/?route=guest");
} else {
    header("Location:/?route=404");
} 


/* 
Ну при нажатии на ссылку "редактировать", ты перекидываешь пользователя на страницу guest-book
 и методом get передаешь еще какой-нибудь ключ со значением. А на странице guest-book делаешь условие,
  если тебе пришел методом get ключ со значением, то показываешь форму с текстом комментария для правки, а если нет, то обычную форму без коментария.

*/