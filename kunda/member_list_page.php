<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/connect_db.php';
$pageName = 'listpage';

$perPage = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$t_sql = "SELECT COUNT(1) FROM members_data";
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
    "SELECT md.*,ld.`level_name`
    FROM `members_data` md
    JOIN `level_data` ld
    ON md.`level`=ld.`sid`
    ORDER BY sid DESC LIMIT %s,%s",
    ($page - 1) * $perPage,
    $perPage
  );
  $rows = $pdo->query($sql)->fetchAll();
};


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
          <th scope="col">會員編號</th>
          <th scope="col">姓名</th>
          <th scope="col">帳號</th>
          <th scope="col">密碼</th>
          <th scope="col">性別</th>
          <th scope="col">大頭照</th>
          <th scope="col">會員等級</th>
          <th scope="col">
            <i class="fa-regular fa-pen-to-square"></i>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $r) : ?>
          <tr>
            <td>
              <a href="javascript:delete_it(<?= $r['sid'] ?>)">
                <i class="fa-regular fa-trash-can"></i>
              </a>
            </td>
            <td><?= $r['sid'] ?></td>
            <td><?= $r['name'] ?></td>
            <td><?= $r['username'] ?></td>
            <td><?= $r['password'] ?></td>
            <td><?= $r['gender'] ?></td>
            <td><img src="./store/<?=$r['member_photo']?>" alt=""></td>
            <td><?= $r['level_name'] ?></td>
            <td>
              <a href="member_edit_page.php?sid=<?= $r['sid'] ?>">
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

  function delete_it(sid) {
    if (confirm(`確定要刪除編號為${sid}的資料嗎?`)) {
      location.href = `member_delete_api.php?sid=${sid}`
    }
  }
</script>
<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_footer.php'; ?>