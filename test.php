<?php
function msgBuilder($msg, $user){
    $ua = $user;
    $tokens = ['fname', 'lname', 'email'];

    $message = $msg;
    foreach($tokens as $token){
        $message = str_ireplace('['.$token.']', $ua[$token], $message);
    }

    return $message;
}

$user['lname'] = 'Debnath';
$user['fname'] = 'Shibaji';

$user['email'] = 'imshibaji@gmail.com';

$message = 'Hello [fname], I hope you will be okey with our classes. your surname [lname]. get so many prices using this [email]. hope it will be very helpfull';

echo msgBuilder($message, $user);


?>