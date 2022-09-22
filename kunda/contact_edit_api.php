<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/connect_db.php';
header('Content-Type: application/json');


$output = [
  'success' => false,
  'error' => '',
  'code' => 0,
  'postData' => $_POST, //除錯用的
];


// if (empty($_POST['name'])) {
//   $output['error'] = '參數不足';
//   $output['code'] = 400;
//   echo json_encode($output, JSON_UNESCAPED_UNICODE);
//   exit;
// };

$sql1 =
  "UPDATE `contact_data` SET
  `birthday`=?, 
  `email`=?, 
  `mobile`=?
  WHERE `sid`=?";

$stmt1 = $pdo->prepare($sql1);

$sql2 =
  "UPDATE `address_data` SET
  `city_sid`=?, 
  `area_sid`=?, 
  `address_detail`=?
  WHERE `sid`=?";

$stmt2 = $pdo->prepare($sql2);


try {
  $stmt1->execute([
    $_POST['birthday'],
    $_POST['email'],
    $_POST['mobile'],
    $_POST['sid']
  ]);
} catch (PDOException $ex) {
  $output['error'] = $ex->getMessage();
}

try {
  $stmt2->execute([
    $_POST['city_name'],
    $_POST['area_name'],
    $_POST['address_detail'],
    $_POST['sid']
  ]);
} catch (PDOException $ex) {
  $output['error'] = $ex->getMessage();
}


if ($stmt1->rowCount() || $stmt2->rowCount()) {
  $output['success'] = true;
} else {
  if (empty($output['error']))
    $output['error'] = '資料沒有修改';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
