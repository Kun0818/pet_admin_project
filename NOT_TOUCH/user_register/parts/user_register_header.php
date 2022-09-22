<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>USER Register</title>

  <style>
    @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,500&display=swap');

    * {
      box-sizing: border-box;
    }

    body {
      background: url('../images/image_processing20220919-24927-lpur8o.gif');
      font-family: 'Open Sans', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
      background-position: center center;
      background-size: cover;
    }

    .container {
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      width: 400px;
      max-width: 100%;
      transition: 1s;
    }

    .container:hover {
      background-color: rgba(255, 255, 255, .24);
      backdrop-filter: blur(6px);
    }

    .header {
      border-bottom: 1px solid #f0f0f07d;
      background-color: transparent;
      padding: 20px 40px;
    }

    .header h2 {
      margin: 0;
    }

    .form {
      padding: 30px 40px;
    }

    .form-control {
      margin-bottom: 10px;
      padding-bottom: 20px;
      position: relative;
    }

    .form-control label {
      display: inline-block;
      margin-bottom: 5px;
    }

    .form-control input {
      border: 2px solid #f0f0f0;
      border-radius: 4px;
      display: block;
      font-family: inherit;
      font-size: 14px;
      padding: 10px;
      width: 100%;
    }

    .form-control input:focus {
      outline: 0;
      border-color: #777;
    }

    .form-control.success input {
      border-color: #2ecc71;
    }

    .form-control.error input {
      border-color: #e74c3c;
    }

    .form-control i {
      visibility: hidden;
      position: absolute;
      top: 40px;
      right: 10px;
    }

    .form-control.success i.fa-check-circle {
      color: #2ecc71;
      visibility: visible;
    }

    .form-control.error i.fa-exclamation-circle {
      color: #e74c3c;
      visibility: visible;
    }

    .form-control small {
      color: #e74c3c;
      position: absolute;
      bottom: 0;
      left: 0;
      visibility: hidden;
    }

    .form-control.error small {
      visibility: visible;
    }

    .form button {
      background-color: #182747;
      border: 2px solid #182747;
      border-radius: 4px;
      color: #fff;
      display: block;
      font-family: inherit;
      font-size: 16px;
      padding: 10px;
      margin-top: 20px;
      width: 100%;
      cursor: pointer;
    }
  </style>
</head>