<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/connect_db.php';
$pageName = 'editpage';


$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if (empty($sid)) {
  header('Location: member_list_page.php');
  exit;
}

$sqllv = "SELECT * FROM `level_data`";
$rowslv = $pdo->query($sqllv)->fetchAll();

$sql = "SELECT md.*,ld.`level_name`
        FROM `members_data` md
        JOIN `level_data` ld
        ON md.`level`=ld.`sid` 
        WHERE md.`sid`=$sid";
$r = $pdo->query($sql)->fetch();

if (empty($r)) {
  header('Location: member_list_page.php');
  exit;
}


?>
<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_header.php'; ?>
<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_navber.php'; ?>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="card-body">
        <h5 class="card-title">編輯資料</h5>
        <form name="form1" onsubmit="checkForm(); return false;">
          <input type="hidden" name="sid" value="<?= $r['sid'] ?>">
          <div class="mb-3">
            <label for="name" class="form-label">姓名</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $r['name'] ?>">
          </div>
          <div class="mb-3">
            <label for="account" class="form-label">帳號</label>
            <input type="text" class="form-control" id="account" name="account" value="<?= $r['username'] ?>">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">密碼</label>
            <input type="text" class="form-control" id="password" name="password" value="<?= $r['password'] ?>">
          </div>
          <div class="mb-3">
            <label for="gender" class="form-label">性別</label><br>
            <select name="gender" id="gender">
              <option value="男" <?= $r['gender']==='男' ? 'selected' : ''?>>男</option>
              <option value="女" <?= $r['gender']==='女' ? 'selected' : ''?>>女</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="level" class="form-label">會員等級</label><br>
            <select name="level" id="level">
              <?php foreach ($rowslv as $lv) : ?>
                <option value="<?= $r['level'] ?>" <?= $r['level']===$lv['sid'] ? 'selected' : ''?>><?= $lv['level_name'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="mb-6">
            <label for="member_photo" class="form-label">上傳大頭照</label><br>
            <img id="myimg" src="./store/<?=$r['member_photo']?>" alt="" style="width:200px;"><br>
            <input type="hidden" name="photo" value="<?= $r['member_photo'] ?>">
            <input type="file" id="imgg" name="single" accept="image/png,image/jpeg">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_script.php'; ?>

<script>
  let imgg = document.querySelector('#imgg');
  let myimg = document.querySelector('#myimg');
  imgg.addEventListener('change', (e) => {
    const file = e.target.files[0];
    myimg.src = URL.createObjectURL(file);
  })

  function checkForm() {
    const fd = new FormData(document.form1);
    fetch(`member_edit_api.php`, {
        method: 'POST',
        body: fd
      })
      .then(r => r.json())
      .then(obj => {

        if (obj.success) {
          alert("修改完成");
          location.href = "member_list_page.php"
        } else {
          console.log(obj);
          alert("修改失敗");
        }

      })
  }
</script>

<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_footer.php'; ?>