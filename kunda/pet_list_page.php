<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/connect_db.php';
$pageName = 'listpage';

$perPage = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$t_sql = "SELECT COUNT(1) FROM pet_data";
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
    "SELECT pd.*,md.`name`
    FROM `pet_data` pd
    JOIN `members_data` md
    ON md.`sid`=pd.`member_sid`
    ORDER BY `pet_number` DESC LIMIT %s,%s",
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
  'perPage' => $perPage,
];

// echo json_encode($output); exit;


?>
<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_header.php'; ?>
<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_navber.php'; ?>
<div class="container">
  <div class="row">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">
            <i class="fa-regular fa-trash-can"></i>
          </th>
          <th scope="col">寵物晶片編號</th>
          <th scope="col">主人姓名</th>
          <th scope="col">寵物類型</th>
          <th scope="col">寵物名稱</th>
          <th scope="col">性別</th>
          <th scope="col">節育狀況</th>
          <th scope="col">
            <i class="fa-regular fa-pen-to-square"></i>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $r) : ?>
          <tr>
            <td>
              <a href="javascript:delete_it(<?= $r['pet_number'] ?>)">
                <i class="fa-regular fa-trash-can"></i>
              </a>
            </td>
            <td><?= $r['pet_number'] ?></td>
            <td><?= $r['name'] ?></td>
            <td><?= $r['variety'] ?></td>
            <td><?= $r['pet_name'] ?></td>
            <td><?= $r['pet_gender'] ?></td>
            <td><?= $r['birth_control'] ?></td>
            <td>
              <a href="pet_edit_page.php?sid=<?= $r['pet_number'] ?>">
                <i class="fa-regular fa-pen-to-square"></i>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item <?= 1 == $page ? 'disabled' : '' ?>">
          <a class="page-link" href="?page=<?= $page - 1 ?>">
            <i class="fa-solid fa-arrow-left"></i>
          </a>
        </li>
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
          <li class="page-item <?= $i == $page ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
          </li>
        <?php endfor ?>
        <li class="page-item <?= $totalPages == $page ? 'disabled' : '' ?>">
          <a class="page-link" href="?page=<?= $page + 1 ?>">
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>
<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_script.php'; ?>
<script>
  const table = document.querySelector('table');

  function delete_it(pet_number) {
    if (confirm(`確定要刪除編號為${pet_number}的資料嗎?`)) {
      location.href = `pet_delete_api.php?pet_number=${pet_number}`
    }
  }
</script>
<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_footer.php'; ?>