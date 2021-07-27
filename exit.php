<?php
setcookie('abc', $user['login'], time() - 3600, "/");
setcookie('user1', $user['login'], time() - 3600, "/");
setcookie('user2', $user['role_id'], time() - 3600, "/");
setcookie('user3', $user['user_id'], time() - 3600, "/");
setcookie('pocket', $user['user_id'], time() - 3600, "/");
session_start();
session_destroy();
header('Location: /');
