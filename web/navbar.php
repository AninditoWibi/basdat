  <nav>
    <div class="nav-wrapper teal">
      <a href="#" class="brand-logo">Tokokeren</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <?php if(isset($_SESSION['login'])){
        ?>
        <li><a href="../logout.php">Log Out</a></li>
        <li><a href="../beli_produk/daftar_shipped_produk.php">Keranjang Belanja</a></li>
         <?php
        }else if (isset($_SESSION['admin'])){
        ?>
        <li><a href="../logout.php">Log Out</a></li>
        <?php } else{ ?>
        <li><a href="../login.php">Log In</a></li>
        <li><a href="../register.php">Register</a></li>
        <?php }
        ?>
        <li><a href="../index.php">Home</a></li>
      </ul>
    </div>
  </nav>
