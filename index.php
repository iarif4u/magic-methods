<?php
include 'Classes/User.php';

//User::staticName();
$var = 'name';
$user = new User();
echo "<pre>";
$user("a","b");
//var_dump(serialize($user));
//unset($user->$var);
//echo isset($user->$var);