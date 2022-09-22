<script>
    const form = document.getElementById('form');
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const password2 = document.getElementById('password2');

    username.addEventListener('blur', e => {
      e.preventDefault();
      const usernameValue = username.value.trim();

      if (usernameValue === '') {
        setErrorFor(username, '帳號不能空白');
      } else {
        setSuccessFor(username);
      }
    });

    email.addEventListener('blur', e => {
      e.preventDefault();
      const emailValue = email.value.trim();

      if (emailValue === '') {
        setErrorFor(email, 'Email不能空白');
      } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Email格式不正確');
      } else {
        setSuccessFor(email);
      }
    });

    password.addEventListener('blur', e => {
      e.preventDefault();
      const passwordValue = password.value.trim();

      if (passwordValue === '') {
        setErrorFor(password, '密碼不能空白');
      } else {
        setSuccessFor(password);
      }
    });

    password2.addEventListener('blur', e => {
      e.preventDefault();
      const passwordValue = password.value.trim();
      const password2Value = password2.value.trim();

      if (password2Value === '') {
        setErrorFor(password2, '確認密碼不能空白');
      } else if (passwordValue !== password2Value) {
        setErrorFor(password2, '與密碼不符');
      } else {
        setSuccessFor(password2);
      }
    })


    function setErrorFor(input, message) {
      const formControl = input.parentElement;
      const small = formControl.querySelector('small');
      formControl.className = 'form-control error';
      small.innerText = message;
    }

    function setSuccessFor(input) {
      const formControl = input.parentElement;
      formControl.className = 'form-control success';
    }

    function isEmail(email) {
      return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
    }



  </script>