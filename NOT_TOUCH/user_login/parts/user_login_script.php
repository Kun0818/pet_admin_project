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

    password.addEventListener('blur', e => {
      e.preventDefault();
      const passwordValue = password.value.trim();

      if (passwordValue === '') {
        setErrorFor(password, '密碼不能空白');
      } else {
        setSuccessFor(password);
      }
    });




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