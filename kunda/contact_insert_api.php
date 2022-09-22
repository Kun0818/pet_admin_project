<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/connect_db.php';
header('Content-Type: application/json');
$output = [
  'success' => false,
  'error' => '',
  'code' => 0,
  'postData' => $_POST, //除錯用的
];


$sqlone =
  "INSERT INTO `contact_data`(
   `birthday`, `email`, `mobile`,`create_at`) VALUES (
      ?, ?, ?, NOW()
   )";

$stmtone = $pdo->prepare($sqlone);

$sqltwo =
  "INSERT INTO `address_data`(
   `city_sid`, `area_sid`, `address_detail`,`create_at`) VALUES (
      ?, ?, ?, NOW()
   )";

$stmttwo = $pdo->prepare($sqltwo);




$birthday = null;
if (strtotime($_POST['birthday']) !== false) {
  $birthday = $_POST['birthday'];
};


try {
  $stmtone->execute([
    $birthday,
    $_POST['email'],
    $_POST['mobile']
  ]);
  
} catch (PDOException $ex) {
  $output['error'] = $ex->getMessage();
}

try {
  $stmttwo->execute([
    $_POST['city_name'],
    $_POST['area_name'],
    $_POST['address_detail']
  ]);
  
} catch (PDOException $ex) {
  $output['error'] = $ex->getMessage();
}




if ($stmtone->rowCount() && $stmttwo->rowCount()) {
  $output['success'] = true;
} else {
  if (empty($output['error']))
    $output['error'] = '資料沒有新增';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
