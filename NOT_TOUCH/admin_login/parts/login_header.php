<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Muli&display=swap");

    * {
      box-sizing: border-box;
    }

    body {
      font-family: "Muli", sans-serif;
      background: url('NOT_TOUCH/images/karsten-winegeart-oU6KZTXhuvk-unsplash.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center 30%;
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      overflow: hidden;
      margin: 0;
    }

    .container {
      background-color: transparent;
      padding: 20px 40px;
      border-radius: 5px;
      transition: 1s all;
    }

    .container:hover {
      background-color: rgba(255, 255, 255, .24);
      backdrop-filter: blur(6px);
    }

    .container h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .container a {
      text-decoration: none;
      color: lightblue;
    }

    .btn {
      cursor: pointer;
      display: inline-block;
      width: 100%;
      background-color: lightblue;
      padding: 15px;
      font-family: inherit;
      font-size: 16px;
      border: 0px;
      border-radius: 5px;
    }

    .btn:focus {
      outline: 0;
    }

    .btn:active {
      transform: scale(0.98);
    }

    .text {
      margin-top: 30px;
    }

    .form-control {
      position: relative;
      margin: 20px 0px 40px;
      width: 300px;
    }

    .form-control input {
      background-color: transparent;
      border: 0;
      border-bottom: 2px #fff solid;
      display: block;
      width: 100%;
      padding: 15px 0;
      font-size: 18px;
      color: #fff;
    }

    .form-control input:focus,
    .form-control input:valid {
      outline: 0;
      border-bottom-color: lightblue;
    }

    .form-control label {
      position: absolute;
      top: 15px;
      left: 0;
      pointer-events: none;
    }

    .form-control label span {
      display: inline-block;
      font-size: 18px;
      min-width: 5px;
      transition: 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .form-control input:focus+label span,
    .form-control input:valid+label span {
      color: lightblue;
      transform: translateY(-30px);
    }

    #checkEye {
      position: absolute;
      top: 50%;
      right: 0px;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: large;
    }
  </style>
</head>