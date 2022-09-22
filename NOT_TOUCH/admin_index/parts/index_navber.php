<?php
if (!isset($_SESSION)) {
  session_start();
}
?>

<body>
  <main class="main">
    <div class="side-bar">
      <div class="close-btn">
        <i class="fa-solid fa-xmark"></i>
      </div>
      <div class="menu">
        <div class="item"><a href="#"><i class="fas fa-desktop"></i>Dashboard</a></div>
        <div class="item">
          <a class="sub-btn">
            <i class="fas fa-table"></i>
            Forum
            <i class="fas fa-angle-right dropdown"></i>
          </a>
          <div class="sub-menu">
            <a href="#" class="sub-item">Sub Item 01</a>
            <a href="#" class="sub-item">Sub Item 02</a>
            <a href="#" class="sub-item">Sub Item 03</a>
          </div>
        </div>
        <div class="item">
          <a class="sub-btn">
            <i class="fa-solid fa-store"></i>
            Store
            <i class="fas fa-angle-right dropdown"></i>
          </a>
          <div class="sub-menu">
            <a href="#" class="sub-item">Sub Item 01</a>
            <a href="#" class="sub-item">Sub Item 02</a>
            <a href="#" class="sub-item">Sub Item 03</a>
          </div>
        </div>
        <div class="item">
          <a class="sub-btn">
            <i class="fa-solid fa-campground"></i>
            Camping
            <i class="fas fa-angle-right dropdown"></i>
          </a>
          <div class="sub-menu">
            <a href="#" class="sub-item">Sub Item 01</a>
            <a href="#" class="sub-item">Sub Item 02</a>
          </div>
        </div>
        <div class="item">
          <a class="sub-btn">
            <i class="fa-solid fa-hospital"></i>
            Hospital
            <i class="fas fa-angle-right dropdown"></i>
          </a>
          <div class="sub-menu">
            <a href="#" class="sub-item">Sub Item 01</a>
            <a href="#" class="sub-item">Sub Item 02</a>
          </div>
        </div>
        <div class="item">
          <a class="sub-btn">
            <i class="fa-solid fa-user-gear"></i>
            Member
            <i class="fas fa-angle-right dropdown"></i>
          </a>
          <div class="sub-menu">
            <a href="#" class="sub-item">會員資料管理</a>
            <a href="#" class="sub-item">寵物資料管理</a>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <header class="p-3 text-white">
        <div class="header-box">
        <img src="NOT_TOUCH\images\logo_white.png" alt="">
          <div class="menu-btn">
            <i class="fa-solid fa-bars "></i>
          </div>
          <ul class="nav mb-2 justify-content-center mb-md-0">
            <li>
              <a href="index_page.php" class="nav-link px-4 <?= $pageName == 'indexpage' ? 'active' : '' ?>">Home</a>
            </li>
            <li>
              <a href="kunda/member_list_page.php" class="nav-link px-4 <?= $pageName == 'listpage' ? 'active' : '' ?>">列表</a>
            </li>
            <li>
              <a href="kunda/member_insert_page.php" class="nav-link px-4 <?= $pageName == 'insertpage' ? 'active' : '' ?>">新增</a>
            </li>
          </ul>
          <div class="text-end">
            <button type="button" class="btn btn-nickname"><?= $_SESSION['admin']['nickname'] ?></button>
            <button type="button" class="btn btn-reg" onclick="outAdmin()">登出</button>
          </div>
        </div>
      </header>
      <div class="table-con">