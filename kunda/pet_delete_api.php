<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/connect_db.php';

$sid = isset($_GET['pet_number']) ? intval($_GET['pet_number']) : 0;

$sql = "DELETE FROM pet_data WHERE pet_number={$sid}";

$pdo->query($sql);

$come_from = 'pet_list_page.php';

if (!empty($_SERVER['HTTP_REFERER'])) {
  $come_from = $_SERVER['HTTP_REFERER'];
}

header("Location:{$come_from}");