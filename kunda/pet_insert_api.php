<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/connect_db.php';
header('Content-Type: application/json');
$output = [
  'success' => false,
  'error' => '',
  'code' => 0,
  'postData' => $_POST, //除錯用的
];

$sql =
  "INSERT INTO `pet_data`(
    `pet_number`, 
    `variety`, 
    `pet_name`,
    `pet_gender`,
    `birth_control`,
    `member_sid`,
    `create_at`
    ) 
  VALUES (
    ?, ?, ?, ? , ?, ?,NOW()
  )";

$stmt = $pdo->prepare($sql);

try {
  $stmt->execute([
    $_POST['pet_number'],
    $_POST['variety'],
    $_POST['pet_name'],
    $_POST['gender'],
    $_POST['birth_control'],
    $_POST['member_sid'],
  ]);
} catch (PDOException $ex) {
  $output['error'] = $ex->getMessage();
}

if ($stmt->rowCount()) {
  $output['success'] = true;
} else {
  if (empty($output['error']))
    $output['error'] = '資料沒有新增';
}





echo json_encode($output, JSON_UNESCAPED_UNICODE);
