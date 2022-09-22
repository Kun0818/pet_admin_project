<?php include __DIR__ . '/connect_db.php';
header('Content-Type: application/json');
$output = [
  'success' => false,
  'error' => '',
  'code' => 0,
  'postData' => $_POST, //除錯用的
];

if(empty($_POST['username']) or empty($_POST['password'])){
  $output['error'] = '參數不足';
  echo json_encode($output, JSON_UNESCAPED_UNICODE);
  exit; 
}


$sql = "SELECT * FROM `members_data` WHERE username=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['username']]);
$row = $stmt->fetch();

if(empty($row)){
  $output['error'] = '帳號或密碼錯誤'; 
  $output['code'] = 401;
  echo json_encode($output, JSON_UNESCAPED_UNICODE);
  exit; 
}

// 驗證密碼
if( $_POST['password'] === $row['password']) {
  $output['success'] = true;
  $_SESSION['user1'] = [
      'sid' => $row['sid'],
      'username' => $row['username'],
  ];
} else {
  $output['error'] = '帳號或密碼錯誤'; 
  $output['code'] = 421;
}




echo json_encode($output, JSON_UNESCAPED_UNICODE);