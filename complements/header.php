<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">E-Report</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <?php $base_url = "/"; ?>
            <a class="nav-link" href="<?php echo $base_url; ?>skl-php-remake/index.php">Beranda</a>
            </li>
            <li class="nav-item">
            <?php $base_url = "/"; ?>
            <a class="nav-link" href="<?php echo $base_url; ?>skl-php-remake/crud/create.php">Buat Pengaduan</a>
            </li>
            <li class="nav-item">
            <?php $base_url = "/"; ?>
            <a class="nav-link" href="<?php echo $base_url; ?>skl-php-remake/auth/logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>
            </li>
        </ul>
    </div>
</nav>