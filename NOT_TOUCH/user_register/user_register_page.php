<?php include __DIR__ . '../../admin_index/parts/connect_db.php';
$pageName = 'user_register_page';
?>
<?php include __DIR__ . './parts/user_register_header.php'; ?>

<body>
  <div class="container">
    <div class="header">
      <h2>PET伴會員註冊</h2>
    </div>
    <form name="form1" class="form" onsubmit="checkForm(); return false;">
      <div class="form-control">
        <label for="username">帳號</label>
        <input type="text" placeholder="ex:pet" id="username" name="username" />
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
      </div>
      <div class="form-control">
        <label for="username">Email</label>
        <input type="email" placeholder="ex:petproject1214@gmail.com" id="email" name="email" />
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
      </div>
      <div class="form-control">
        <label for="username">密碼</label>
        <input type="password" placeholder="Password" id="password" name="password" />
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
      </div>
      <div class="form-control">
        <label for="username">確認密碼</label>
        <input type="password" placeholder="Check Password" id="password2" />
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>Error message</small>
      </div>
      <input type="hidden" name="level" value="1">
      <button>Submit</button>
    </form>
  </div>
<?php include __DIR__ . './parts/user_register_script.php'; ?>

<script>
  function checkForm() {
    const fd = new FormData(document.form1);
    fetch(`user_register_api.php`, {
        method: 'POST',
        body: fd
      })
      .then(r => r.json())
      .then(obj => {
        if (obj.success) {
          alert("成功註冊");
          location.href = "../user_login/user_login_page.php"
        } else {
          console.log(obj);
          alert("註冊失敗");
        }
      })
  }
</script>
<?php include __DIR__ . './parts/user_register_footer.php'; ?>