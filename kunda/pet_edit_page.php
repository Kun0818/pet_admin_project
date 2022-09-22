<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/connect_db.php';
$pageName = 'pet_insert_page';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if (empty($sid)) {
  header('Location: pet_list_page.php');
  exit;
}


$sql = "SELECT pd.*,md.`name`
        FROM `pet_data` pd
        JOIN `members_data` md
        ON md.`sid`=pd.`member_sid`
        WHERE pd.`pet_number`=$sid";
$r = $pdo->query($sql)->fetch();

if (empty($r)) {
  header('Location: member_list_page.php');
  exit;
}

// echo json_encode($r);

?>
<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_header.php'; ?>
<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_navber.php'; ?>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="card-body">
        <h5 class="card-title">新增寵物資料</h5>
        <form name="form1" onsubmit="checkForm(); return false;">
          <div class="mb-3">
            <label for="name" class="form-label">寵物晶片號碼</label>
            <input type="text" class="form-control" id="pet_number" name="pet_number" value="<?=$r['pet_number']?>">
          </div>
          <div class="mb-3">
            <label for="account" class="form-label">主人會員編號</label>
            <input type="text" class="form-control" id="member_sid" name="member_sid" value="<?=$r['member_sid']?>">
          </div>
          <div class="mb-3">
            <label for="variety" class="form-label">寵物類型</label><br>
            <select name="variety" id="variety">
              <option value="狗" <?= $r['variety']==='狗' ? 'selected' : ''?>>狗</option>
              <option value="貓" <?= $r['variety']==='貓' ? 'selected' : ''?>>貓</option>
              <option value="非犬貓" <?= $r['variety']==='非犬貓' ? 'selected' : ''?>>非犬貓</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="pet_name" class="form-label">寵物名稱</label>
            <input type="text" class="form-control" id="pet_name" name="pet_name" value="<?=$r['pet_name']?>">
          </div>
          <div class="mb-3">
            <label for="gender" class="form-label">性別</label><br>
            <select name="gender" id="gender">
              <option value="公" <?= $r['pet_gender']==='公' ? 'selected' : ''?>>公</option>
              <option value="母" <?= $r['pet_gender']==='母' ? 'selected' : ''?>>母</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="birth_control" class="form-label">節育狀況</label><br>
            <select name="birth_control" id="birth_control">
              <option value="已節育" <?= $r['birth_control']==='已節育' ? 'selected' : ''?>>已節育</option>
              <option value="未節育" <?= $r['birth_control']==='未節育' ? 'selected' : ''?>>未節育</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_script.php'; ?>

<script>

  function checkForm() {
    const fd = new FormData(document.form1);
    fetch(`pet_edit_api.php`, {
        method: 'POST',
        body: fd
      })
      .then(r => r.json())
      .then(obj => {

        if (obj.success) {
          alert("修改成功");
          location.href = "pet_list_page.php"
        }else{
          console.log(obj);
          alert("修改失敗");
        }

      })
  }
</script>

<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_footer.php'; ?>