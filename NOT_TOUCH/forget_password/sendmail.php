<?php include __DIR__ . '/connect_db.php';
header('Content-Type: application/json');
$output = [
  'success' => false,
  'error' => '',
  'code' => 0,
  'postData' => $_POST, //除錯用的
  'data' => [],
  'passtime' => '',
  'sid' => '',
  'token' => ''
];

$email = @$_POST['mail'];

$sql =
  "SELECT cd.*,md.*
    FROM `contact_data` cd
    JOIN `members_data` md
    ON `cd`.`sid`=`md`.`sid`
    WHERE cd.`email`=?";

$stmt = $pdo->prepare($sql);

try {
  $stmt->execute([
    $_POST['email']
  ]);
  $output['success'] = true;
  $row = $stmt->fetch();
  $output['data'] = $row;
} catch (PDOException $ex) {
  $output['error'] = $ex->getMessage();
};

$getpasstime = time();
$output['passtime'] = $getpasstime;

$uid = $row['sid'];
$output['sid'] = $uid;

$username = $row['username'];

$email = $row['email'];

$token = md5($uid . $row['username'] . $row['password']); //組合驗證碼 
$output['token'] = $token;

$url = "reset.php?email=" . $email . "&token=" . $token; //構造URL 

$time = date('Y-m-d H:i');

$mailcontent = "您好,<br/>您的帳號為:{$username}<br/>新密碼連結:{$url}<br/>";
$mailSubject ="=?UTF-8?B?" . base64_encode("補寄密碼信"). "?=";

$mailto = $email;

$mailSubject ="=?UTF-8?B?" . base64_encode("補寄密碼信"). "?=";




echo json_encode($output, JSON_UNESCAPED_UNICODE);








