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
  'token' => '',
  'email'=>''
];



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

$email = $row['email'];
$output['email']=$email;

// $getpasstime = time();
// $output['passtime'] = $getpasstime;

// $uid = $row['sid'];
// $output['sid'] = $uid;

$username = $row['username'];
$userpass = $row['password'];

// $email = $row['email'];

// $token = md5($uid . $row['username'] . $row['password']); //組合驗證碼 
// $output['token'] = $token;

// $url = "reset.php?email=" . $email . "&token=" . $token; //構造URL 

// $time = date('Y-m-d H:i');

$mailcontent = "您好,<br/>您的帳號為:{$username}<br/>新密碼連結:{$userpass}<br/>";

$mailFrom ="=?UTF-8?B?" . base64_encode("會員管理系統"). "?=<petproject1214@gmail.com>";

$mailto = $email;

$mailSubject ="=?UTF-8?B?" . base64_encode("補寄密碼信"). "?=";

$mailHeader="From:".$mailFrom."\r\n";

$mailHeader.="Content-type:text/html;charset=UTF-8";

mail($mailto,$mailSubject,$mailcontent,$mailHeader);

// if(!@mail($mailto,$mailSubject,$mailcontent,$mailHeader)){
//   die('郵寄失敗');
//   header("Location:sendmail.php?mailStats=1");

// }




echo json_encode($output, JSON_UNESCAPED_UNICODE);








