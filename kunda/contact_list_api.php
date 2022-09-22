<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/connect_db.php';

$perPage = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$t_sql = "SELECT COUNT(1) FROM contact_data";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

$totalPages = ceil($totalRows / $perPage);
$rows = [];

if ($totalRows) {
  if ($page < 1) {
    header('Location: ?page=1');
    exit;
  };
  if ($page > $totalPages) {
    header('Location: ?page' . $totalPages);
    exit;
  };

  $sql = sprintf(
    "SELECT cad.*,md.`sid`,md.`name`,ad.`address_detail`,cd.`city_name`,ard.`area_name`
    FROM `contact_data` cad
    JOIN `members_data` md
    ON cad.`sid`= md.`sid`
    JOIN `address_data` ad
    ON cad.`sid`= ad.`sid`
    JOIN `city_data` cd
    ON cd.`sid`=ad.`city_sid`
    JOIN `area_data` ard
    ON ard.`sid`=ad.`area_sid`
    ORDER BY cad.`sid` DESC LIMIT %s,%s",
    ($page - 1) * $perPage,
    $perPage
  );
  $rows = $pdo->query($sql)->fetchAll();
};


$output = [
  'totalRows' => $totalRows,
  'totalPages' => $totalPages,
  'page' => $page,
  'rows' => $rows,
  'perPage' => $perPage
];

header('Content-Type:application/json');
echo json_encode($output);
