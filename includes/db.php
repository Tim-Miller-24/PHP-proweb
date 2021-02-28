<?
function db() {
    $dbhost = "127.0.0.1";
    $dbname = "tue1745";
    $dblogin = "root";
    $dbpass = "root";
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dblogin, $dbpass);
    return $dbh;
}

function userReg($login, $pass, $name, $dir){
    $login = strip_tags($login);
    $pass = password_hash($pass, PASSWORD_BCRYPT);
    $name = strip_tags($name);
    $db = db();
    $query = "INSERT INTO `users`(`user_login`, `user_pass`, `user_name`) VALUES (?,?,?)";
    $pdoStat = $db->prepare($query);
    $result = $pdoStat->execute([$login, $pass, $name]);
    if ($result) {
        $userId = $db->lastInsertId();
        $query = "INSERT INTO `images`(`user_id`, `img_path`, `img_select`) VALUES (?,?,?)";
        $imgStat = $db->prepare($query);
        $result = $imgStat->execute([$userId, $dir, 1]);
    }
    return $result;
}

// $password = password_hash("123", PASSWORD_BCRYPT);
// var_dump(password_verify("123", '$2y$10$44t5vVnr3.WPNqbDKiO6j.1FMCBHV6ZmW9C//JLUWSP4CJhZn8Ihm'));
function userAuth($login, $pass) {
    $login = strip_tags($login);
    $db = db();
    $query = "SELECT * FROM `users` INNER JOIN images USING(user_id) WHERE `user_login`=?";
    $pdoStat = $db->prepare($query);
    $pdoStat->execute([$login]);
    $user = $pdoStat->fetch(PDO::FETCH_ASSOC);
    
    if ($login == $user["user_login"] && password_verify($pass, $user["user_pass"])) {
        session_start();
        $_SESSION["id"] = $user["user_id"];       
        return true;
    }
    return false;
}

function userInfo() {
    session_start();
    $db = db();
    $query = "SELECT `user_login`, `user_name`, images.img_path FROM `users` INNER JOIN images ON users.user_id=images.user_id WHERE images.user_id=? AND images.img_select=1";
    $pdoStat = $db->prepare($query);
    $pdoStat->execute([$_SESSION["id"]]);
    $result = $pdoStat->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function addPhotos($path) {
    session_start();
    $userId = $_SESSION["id"];
    $db = db();
    $query = "INSERT INTO `images`(`user_id`, `img_path`, `img_select`) VALUES (?,?,0)";
    $pdoStat = $db->prepare($query);
    $result = $pdoStat->execute([$userId, $path]);
    return $result;
}

function getPhotos() {
    session_start();
    $userId = $_SESSION["id"];
    $db = db();
    $query = "SELECT * FROM `images` WHERE `user_id`=?";
    $pdoStat = $db->prepare($query);
    $pdoStat->execute([$userId]);
    $result = $pdoStat->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function setPhoto($imgId){
    session_start();
    $userId = $_SESSION["id"];
    $db = db();
    $query = "UPDATE images SET img_select=0 WHERE img_select=1 AND user_id=?";
    $pdoStat = $db->prepare($query);
    $result = $pdoStat->execute([$userId]);
    if ($result) {
        $query = "UPDATE images SET img_select=1 WHERE img_id=? AND user_id=?";
        $pdoStat = $db->prepare($query);
        $result = $pdoStat->execute([$imgId, $userId]);
        return $result;
    } else {
        return $result;
    }    
}

function setName($name) {
    session_start();
    $userId = $_SESSION["id"];
    $db = db();
    $query = "UPDATE `users` SET `user_name`=? WHERE `user_id`=?";
    $pdoStat = $db->prepare($query);
    $result = $pdoStat->execute([$name, $userId]);
    return $result;
}

function setLogin($login) {
    session_start();
    $userId = $_SESSION["id"];
    $db = db();
    $query = "UPDATE `users` SET `user_login`=? WHERE `user_id`=?";
    $pdoStat = $db->prepare($query);
    $result = $pdoStat->execute([$login, $userId]);
    return $result;
}

function delPhoto($imgId) {
    session_start();
    $userId = $_SESSION["id"];
    $db = db();
    $query = "SELECT * FROM `images` WHERE `img_id`=? AND `user_id`=?";
    $pdoStat = $db->prepare($query);
    $pdoStat->execute([$imgId, $userId]);
    $result = $pdoStat->fetch(PDO::FETCH_ASSOC);
    if ($result["img_select"] != 1 && $result) {
        unlink(".".$result["img_path"]);
        $query = "DELETE FROM `images` WHERE `img_id`=? AND `user_id`=? AND `img_select`=0";
        $pdoStat = $db->prepare($query);
        $result = $pdoStat->execute([$imgId, $userId]);
        return $result;
    } else {
        return false;
    }
}

function addComment($userComment) {
    session_start();
    $userId = $_SESSION["id"];
    date_default_timezone_set('Asia/Tashkent');
    $time = date("Y-m-d H:i:s");
    $db = db();
    $query = "INSERT INTO `usercomment`(`user_id`, `user_comment`, `time`) VALUES (?,?,?)";
    $pdoStat = $db->prepare($query);
    $result = $pdoStat->execute([$userId, $userComment, $time]);
    return $result;  
}

function userCommentInfo() {
    session_start();
    $userId = $_SESSION["id"];
    $db = db();
    $query = "SELECT comment_id, usercomment.user_id, user_comment, DATE_FORMAT(time, '%d.%m.%Y %H:%i')as time, users.user_name, images.img_path FROM usercomment INNER JOIN users ON users.user_id=usercomment.user_id INNER JOIN images ON images.user_id=usercomment.user_id";
    $pdoStat = $db->prepare($query);
    $pdoStat->execute([]);
    $result = $pdoStat->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function deleteComment($commentId) {
    session_start();
    $userId = $_SESSION["id"];
    $db = db();
    $query = "DELETE FROM usercomment WHERE usercomment.comment_id=?";
    $pdoStat = $db->prepare($query);
    $result = $pdoStat->execute([$commentId]);
    return $result;
}

function editComment($commentId) {
    session_start();
    $userId = $_SESSION["id"];
    $db = db();
    $query = "UPDATE usercomment SET user_comment=?";
    $pdoStat = $db->prepare($query);
    $result = $pdoStat->execute([$commentId]);
    return $result;
}