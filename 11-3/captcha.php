<?php
session_start();

$im = imagecreatetruecolor(100, 30);
$bg = imagecolorallocate($im, 255, 255, 255); // 背景色
$fg = imagecolorallocate($im, 0, 0, 0); // 字体颜色

imagefill($im, 0, 0, $bg);
$captcha = $_SESSION['captcha'];

imagestring($im, 5, 5, 5, $captcha, $fg);
header("Content-type: image/png");
imagepng($im);
imagedestroy($im);