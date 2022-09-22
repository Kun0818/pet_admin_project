<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PET FAMILY ADMIN</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap');
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Noto Sans TC', "Poppins", sans-serif;
    }

    body {
      min-height: 100vh;
      background: #fff;
      background-size: cover;
      background-position: center;
    }

    .main {
      width: 100%;
      height: 100vh;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      position: relative;
    }

    .side-bar {
      width: 290px;
      height: calc(100% - 70px);
      background: #a4c6eb;
      backdrop-filter: blur(15px);
      position: fixed;
      top: 70px;
      left: -100%;
      overflow-y: auto;
    }

    .side-bar::-webkit-scrollbar {
      width: 8px;
    }

    .side-bar::-webkit-scrollbar-thumb {
      border-radius: 6px;
      background: linear-gradient(#9fa0a0, #9fa0a0);

    }

    .side-bar.active {
      left: 0px;
    }

    .side-bar .menu {
      width: 100%;
      margin-top: 80px;
    }

    .side-bar .menu .item {
      position: relative;
      cursor: pointer;
    }

    .side-bar .menu .item a {
      color: #fff;
      font-size: 16px;
      text-decoration: none;
      display: block;
      padding: 5px 30px;
      line-height: 60px;
      font-family: 'Noto Sans TC'
    }

    .side-bar .menu .item a:hover {
      background: #9fa0a0;
      transition: 0.3s ease;
    }

    .side-bar .menu .item i {
      margin-right: 15px;
    }

    .side-bar .menu .item a .dropdown {
      position: absolute;
      right: 0;
      margin: 20px;
      transition: 0.3s ease;
    }

    .side-bar .menu .item .sub-menu {
      background: rgba(255, 255, 255, 0.3);
      display: none;
    }

    .side-bar .menu .item .sub-menu a {
      padding-left: 80px;
    }

    .rotate {
      transform: rotate(90deg);
    }

    .close-btn {
      position: absolute;
      color: #fff;
      font-size: 20px;
      right: 0;
      margin: 25px;
      cursor: pointer;
    }

    .menu-btn {
      color: #fff;
      font-size: 20px;
      cursor: pointer;
      width: 200px;
    }

    ul {
      width: calc(100% - 400px);
    }

    .text-end {
      width: 200px;
    }

    header {
      background: #6e98e2;
      width: 100%;
      display: flex;
      justify-content: space-around;
      height: 70px;
    }

    nav {
      align-self: flex-end;
      padding-right: 100px;
    }

    .nav-link.active {
      border-radius: 5px;
      background-color: rgba(0, 255, 255, 0.38);
    }

    .nav-link {
      color: #fff;
      font-size: 20px;
    }

    .header-box {
      width: 1800px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .content {
      width: 100%;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .btn-nickname {
      color: #fff;
      background: #6e98e2;
      border: 2px solid #fff;
    }

    .btn-nickname:hover {
      background-color: grey;
      color: #fff;
      border: 2px solid #6e98e2;
      ;
    }

    .btn-reg {
      background: #acc4ee;
      color: #6e98e2;
    }

    .btn-reg:hover {
      color: #fff;
    }

    .table-box {
      width: 100%;
      padding: 0px 100px 100px 100px;
    }

    .table-con {
      height: calc(100% - 70px);
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 50px;
      width: 1400px;
    }

    img{
      width: 100px;
      margin-right: 20px;
    }

    .table-con.active {
      align-self: flex-end;
      width: calc(100% - 290px);
    }

    @media (max-width: 900px) {
      .main h1 {
        font-size: 40px;
        line-height: 60px;
      }
    }
  </style>
</head>

<body>