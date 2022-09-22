<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/connect_db.php';
$pageName = 'insertpage';


$sqllv = "SELECT * FROM `level_data`";
$rowslv = $pdo->query($sqllv)->fetchAll();




?>
<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_header.php'; ?>
<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_navber.php'; ?>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="card-body">
        <h5 class="card-title">新增資料</h5>
        <form name="form1" onsubmit="checkForm(); return false;">
          <div class="mb-3">
            <label for="name" class="form-label">姓名</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="mb-3">
            <label for="account" class="form-label">帳號</label>
            <input type="text" class="form-control" id="account" name="account">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">密碼</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mb-3">
            <label for="gender" class="form-label">性別</label><br>
            <select name="gender" id="gender">
              <option value="男">男</option>
              <option value="女">女</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="level" class="form-label">會員等級</label><br>
            <select name="level" id="level">
              <?php foreach ($rowslv as $lv) : ?>
                <option value="<?= $lv['sid'] ?>"><?= $lv['level_name'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="mb-6">
            <label for="member_photo" class="form-label">上傳大頭照</label><br>
            <img id="myimg" src="" alt="" style="width:200px;"><br>
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
    fetch(`member_insert_api.php`, {
        method: 'POST',
        body: fd
      })
      .then(r => r.json())
      .then(obj => {

        if (obj.success) {
          alert("新增完成");
          location.href = "member_list_page.php"
        }else{
          console.log(obj);
          alert("新增失敗");
        }

      })
  }
</script>

<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_footer.php'; ?>