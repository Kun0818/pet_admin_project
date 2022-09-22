<?php include __DIR__ . './NOT_TOUCH/admin_index/parts/connect_db.php';
$pageName = 'indexpage';
?>
<?php include __DIR__ . './NOT_TOUCH/admin_index/parts/index_header.php'; ?>
<style>
  .index_bg {
    background: url('NOT_TOUCH/images/karsten-winegeart-5PVXkqt2s9k-unsplash_0.jpg');
    width: 100%;
    height: 100%;
    background-size: 105%;
    background-position: 8% 60%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .table-con {
    width: 100%;
    margin-top: 0px;
  }

  .index_box {
    width: 1000px;
  }

  .left {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  h1 {
    font-size: 60px;
    line-height: 80px;
    color: #fff;
    font-family: 'Permanent Marker', cursive;
  }

  span {
    font-size: 60px;
    line-height: 80px;
    color: #000;
    font-family: 'Permanent Marker', cursive;
  }

  p {
    font-size: 60px;
    line-height: 80px;
    color: #000;
    font-family: 'Permanent Marker', cursive;
  }
</style>
<?php include __DIR__ . './NOT_TOUCH/admin_index/parts/index_navber.php'; ?>
<div class="index_bg">
  <div class="index_box">
    <div class="left animate__animated animate__zoomIn">
      <h1 class="animate__animated animate__fadeIn animate__delay-1s">Welcome&nbspTo</h1>
      <p class="animate__animated animate__fadeIn animate__delay-1s">PET&nbspBAN</p>
    </div>
  </div>

</div>
<?php include __DIR__ . './NOT_TOUCH/admin_index/parts/index_script.php'; ?>
<?php include __DIR__ . './NOT_TOUCH/admin_index/parts/index_footer.php'; ?>