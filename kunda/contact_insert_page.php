<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/connect_db.php';
$pageName = 'insertpage';


$rows = [];

$sqlci = "SELECT * FROM `city_data`";
$cities = $pdo->query($sqlci)->fetchAll();


$sqlar = "SELECT * FROM `area_data`";
$areas = $pdo->query($sqlar)->fetchAll();


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
            <label for="birthday" class="form-label">生日</label>
            <input type="date" class="form-control" id="birthday" name="birthday">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="mb-3">
            <label for="mobile" class="form-label">手機</label>
            <input type="text" class="form-control" id="mobile" name="mobile">
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">地址</label><br>
            <select name="city_name" id="city_name" onchange="changeArea(event)">
              <?php foreach ($cities as $r) : ?>
                <option value="<?= $r['sid'] ?>"><?= $r['city_name'] ?></option>
              <?php endforeach ?>
            </select>
            <select name="area_name" id="area_name">
              <option></option>
            </select><br>
            <label for="address_detail" class="form-label">詳細地址</label><br>
            <input type="text" class="form-control" id="address_detail" name="address_detail"></input>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_script.php'; ?>

<script>
  const areas = <?= json_encode($areas, JSON_UNESCAPED_UNICODE) ?>;

  let city_sel = document.querySelector('#city_name');

  let area_sel = document.querySelector('#area_name');


  function changeArea(event) {
    const city_sid = +event.target.value;

    const myAreas = areas.filter(el => +el.city_sid === city_sid);

    // console.log(myAreas)
    // area_sel.innerHTML = '<option>選擇區域</option>';


    area_sel.innerHTML = myAreas.map(el => {
      return `<option value="${el.sid}">${el.area_name}</option>`;

    }).join('');
  }


  function checkForm() {
    const fd = new FormData(document.form1);
    fetch(`contact_insert_api.php`, {
        method: 'POST',
        body: fd
      })
      .then(r => r.json())
      .then(obj => {
        if (obj.success) {
          alert("新增完成");
          location.href = "contact_list_page.php"
        } else {
          console.log(obj);
          alert("新增失敗");
        }

      })
  }
</script>

<?php include __DIR__ . '../../NOT_TOUCH/admin_index/parts/index_footer.php'; ?>