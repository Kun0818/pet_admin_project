<?php include __DIR__ . './NOT_TOUCH/admin_login/parts/login_header.php'; ?>

<div class="container">
  <h1>Sign In</span></h1>
  <form name="login_form" onsubmit="checkForm();return false;">
    <div class="form-control">
      <input type="text" name="account" id="account" required>
      <label>Your Account</label>
    </div>
    <div class="form-control">
      <input type="password" name="password" id="password" required>
      <label>Your Password</label>
      <i id="checkEye" class="fa-regular fa-eye"></i>
    </div>
    <button type="submit" class="btn">Submit</button>
    <p class="text">你忘記密碼了嗎?
      <a href="#">創立帳號</a>
    </p>
  </form>
</div>
<?php include __DIR__ . './NOT_TOUCH/admin_login/parts/login_script.php'; ?>
<script>
  //ckeckEye  script
  const ckeckEye = document.querySelector('#checkEye');
  const showPass = document.querySelector('#password');
  ckeckEye.addEventListener('click', event => {
    if (event.target.classList.contains('fa-eye')) {
      event.target.classList.remove('fa-eye');
      event.target.classList.add('fa-eye-slash');
      showPass.setAttribute('type','text')
    }else{
      showPass.setAttribute('type','password');
      event.target.classList.remove('fa-eye-slash');
      event.target.classList.add('fa-eye');
    }
  })

  //link login API
  async function checkForm() {
    const fd = new FormData(document.login_form);
    const r = await fetch('NOT_TOUCH/admin_login/login_api.php', {
      method: 'POST',
      body: fd,
    });
    const obj = await r.json();
    console.log(obj);
    if (obj.success) {
      location.href = 'index_page.php'
    } else {
      alert(obj.error)
    }
  };
</script>
<?php include __DIR__ . './NOT_TOUCH/admin_login/parts/login_footer.php'; ?>