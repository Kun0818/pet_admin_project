<?php
$p1='0000';
$p2='1111';
$p3='2222';
$p4='3333';
$p5='8888';
echo password_hash($p1,PASSWORD_DEFAULT)."<br>";
echo password_hash($p2,PASSWORD_DEFAULT)."<br>";
echo password_hash($p3,PASSWORD_DEFAULT)."<br>";
echo password_hash($p4,PASSWORD_DEFAULT)."<br>";
echo password_hash($p5,PASSWORD_DEFAULT)."<br>";



// echo password_verify($p,'$2y$10$ozP2XLLAziIl97j6DtUJ..WDMoYjfzDxW8jFdth86AyNEIHRhL8Su') ? 'yes' : 'no';