  <footer class="container-fluid page-footer font-small">
    <div class="footer-copyright text-center py-3">
      &copy; 2025 Trevor
    </div>
  </footer>
  <div id=debug>
    <h4>$_SESSION</h4>
    <?php preshow($_SESSION); ?>    
    <h4>$_POST</h4>
    <?php preshow($_POST); ?>
    <h4>$_GET</h4>
    <?php preshow($_GET); ?>
  </div>
  <script src="assets/js/main.js"></script>
</body>

</html>