<?php
session_start();

function generateRandomCode($length = 4) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}

$captcha_code = generateRandomCode();

$_SESSION['captcha_code'] = $captcha_code;

$image = imagecreatetruecolor(100, 50);
$background_color = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0); 
imagestring($image, 5, 20, 15, $captcha_code, $text_color); 
header('Content-type: image/png');

imagepng($image);

imagedestroy($image);
?>
