<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/connect_db.php';
header('Content-Type: application/json');

$folder = __DIR__ . '/store/';

$extMap = [
  'image/jpeg' => '.jpg',
  'image/png' => '.png'
];

$output = [
  'success' => false,
  'error' => '',
  'code' => 0,
  'postData' => $_POST, //除錯用的
  'files' => $_FILES
];

if (empty($_FILES['single']['name'])) {
  $output['error'] = '沒有上傳檔案';
  echo json_encode($output, JSON_UNESCAPED_UNICODE);
  exit;
}

// 副檔名對應
$ext = $extMap[$_FILES['single']['type']];
if (empty($ext)) {
  $output['error'] = '檔案格式錯誤: 要 jpeg, png';
  echo json_encode($output, JSON_UNESCAPED_UNICODE);
  exit;
}

// 隨機檔名
$filename = md5($_FILES['single']['name'] . uniqid()) . $ext;
$output['filename'] = $filename;


if (!move_uploaded_file(
  $_FILES['single']['tmp_name'],
  $folder . $filename
)) {
  $output['error'] = '無法移動上傳檔案, 注意資料夾權限問題';
  echo json_encode($output, JSON_UNESCAPED_UNICODE);
  exit;
}

if (empty($_POST['name'])) {
  $output['error'] = '參數不足';
  $output['code'] = 400;
  echo json_encode($output, JSON_UNESCAPED_UNICODE);
  exit;
};

$sql =
  "INSERT INTO `members_data`(
   `name`, `username`, `gender`, 
   `password`, `member_photo`,`level`, `create_at`) VALUES (
      ?, ?, ?, 
      ?, ?, ?,NOW()
   )";

$stmt = $pdo->prepare($sql);


try {
  $stmt->execute([
    $_POST['name'],
    $_POST['account'],
    $_POST['gender'],
    $_POST['password'],
    $filename,
    $_POST['level']
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
