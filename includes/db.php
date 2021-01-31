<?
// $password = password_hash("123", PASSWORD_BCRYPT);

// var_dump(password_verify("123",'$2y$10$WqiWfuPCwITjRyk5XOsnJuZtWHv8dYA9VPL0hN5epqIIi6dviwWpC'));

function userAuth($login, $pass) {
    $user = [
        "user_login" => "admin",
        "user_pass" => '$2y$10$WqiWfuPCwITjRyk5XOsnJuZtWHv8dYA9VPL0hN5epqIIi6dviwWpC'
    ];

    if ($login == $user["user_login"] && password_verify($pass, $user["user_pass"])) {
        session_start();
        $_SESSION["login"] = $user["user_login"];
        $_SESSION["pass"] = $user["user_pass"];
        return true;
    }
    return false;
}