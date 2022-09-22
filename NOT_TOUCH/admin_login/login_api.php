<?php
session_start();

header('Content-Type:application/json');

$admins = [
  'andy' => [
    'pw' => '0000',
    'nickname' => '組長'
  ],
  'kunda' => [
    'pw' => '1111',
    'nickname' => '技術長'
  ],
  'artleader' => [
    'pw' => '2222',
    'nickname' => '甜甜圈'
  ],
  'bigmuscle' => [
    'pw' => '3333',
    'nickname' => '大肌肌'
  ],
  'pinwei' => [
    'pw' => '8888',
    'nickname' => '組裡一枝花'
  ],
];

$output = [
  'success' => false,
  'error' => '',
  'code' => 0,
];

if (empty($_POST['account']) or empty($_POST['password'])) {
  $output['error'] = '參數不足';
  $output['code'] = 400;
  echo json_encode($output, JSON_UNESCAPED_UNICODE);
  exit;
};

if (empty($_POST['account'])) {
  $output['error'] = '帳號密碼錯誤';
  $output['code'] = 401;
  echo json_encode($output, JSON_UNESCAPED_UNICODE);
  exit;
};

$admin = $admins[$_POST['account']];

if ($admin['pw'] === $_POST['password']){
  $output['success'] = true;
  $_SESSION['admin'] = [
    'account' => $_POST['account'],
    'nickname' => $admin['nickname']
  ];
} else {
  $output['error'] = '帳號或密碼錯誤';
  $output['code'] = 403;
}



echo json_encode($output, JSON_UNESCAPED_UNICODE);
