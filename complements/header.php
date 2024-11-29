<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">E-Report</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <?php 
                    // Menetapkan base URL secara dinamis berdasarkan path server
                    $base_url = dirname($_SERVER['SCRIPT_NAME']) . '/'; 
                ?>
                <a class="nav-link" href="<?php echo $base_url; ?>e-report/index.php">Beranda</a>
            </li>
            <li class="nav-item">
                <?php $base_url = dirname($_SERVER['SCRIPT_NAME']) . '/'; ?>
                <a class="nav-link" href="<?php echo $base_url; ?>e-report/crud/create.php">Buat Pengaduan</a>
            </li>
            <li class="nav-item">
                <?php $base_url = dirname($_SERVER['SCRIPT_NAME']) . '/'; ?>
                <a class="nav-link" href="<?php echo $base_url; ?>e-report/auth/logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>
            </li>
        </ul>
    </div>
</nav>
