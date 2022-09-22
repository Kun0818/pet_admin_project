<?php include __DIR__ . '../../admin_index/parts/connect_db.php'; ?>
<?php include __DIR__ . './parts/forget_password_header.php'; ?>

<body>
  <h1>請輸入你的Email</h1>
  <form name="form1" id="form1">
    <input type="text" class="email" name="email" id="email">
    <br>
    <button type="button" class="btn btn-primary">Submit</button>
  </form>
</body>
<script>
  let submit = document.querySelector('.btn');
  submit.addEventListener('click', () => {
    let email = document.querySelector('.email').value;
    let preg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (email == '' || !preg.test(email)) {
      alert('請填寫正確Email')
    } else {
      
      const fd = new FormData(document.form1);

      fetch(`sendmail.php`, {
          method: 'POST',
          body: fd
        })
        .then(r => r.json())
        .then(obj => {
          if (obj.data === false) {
            alert("查無此帳號");
            // location.href = "../../index_page.php"
          } else {
            alert("請至你的電子郵件查看信件")
          }
          
        })
    }
  })
</script>
<?php include __DIR__ . './parts/forget_password_footer.php'; ?>