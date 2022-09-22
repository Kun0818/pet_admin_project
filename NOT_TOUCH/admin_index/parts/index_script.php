</div>
</section>
  </main>
  <script type="text/javascript">
    $(document).ready(function () {
      //jquery for toggle sub menus
      $('.sub-btn').click(function () {
        $(this).next('.sub-menu').slideToggle();
        $(this).find('.dropdown').toggleClass('rotate');
      });

      // jquery for expand and collapse the sidebar
      $('.menu-btn').click(function () {
        $('.table-con').addClass('active');
        $('.side-bar').addClass('active');
        $('.menu-btn').css("visibility", "hidden");
      });

      $('.close-btn').click(function () {
        $('.table-con').removeClass('active');
        $('.side-bar').removeClass('active');
        $('.menu-btn').css("visibility", "visible");
      });
    });
    function outAdmin(){
      location.href='NOT_TOUCH/admin_login/logout_api.php'
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"
    integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
    integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/"
    crossorigin="anonymous"></script>