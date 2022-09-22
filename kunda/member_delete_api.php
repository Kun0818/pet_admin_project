<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/connect_db.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

$sql = "DELETE md.*,cd.*,ad.* FROM `members_data` md
  JOIN `contact_data` cd
  ON md.`sid`=cd.`sid`
  JOIN `address_data` ad 
  ON md.`sid`=ad.`sid`
  WHERE md.`sid`={$sid}";

$pdo->query($sql);

$come_from = 'member_list_page.php';

if (!empty($_SERVER['HTTP_REFERER'])) {
  $come_from = $_SERVER['HTTP_REFERER'];
}

header("Location:{$come_from}");
