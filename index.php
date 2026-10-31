
<?php
$module = $_GET['m'] ?? 'home';

$pages = [
    'home' => 'home.php',
    'sales' => 'sales/index.php',
    'suppliers' => 'suppliers/index.php'
];

if (!array_key_exists($module, $pages)) {
    $module = 'home';
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian POS - TKJ35</title>

    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

            <a class="navbar-brand" href=".">
                <img src="img/logo.png" alt="Logo" height="25"
                    class="d-inline-block align-text-top">
                <strong>TKJ35</strong>
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarScroll"
                aria-controls="navbarScroll"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarScroll">

                <ul class="navbar-nav me-auto my-2 my-lg-0">

                    <li class="nav-item">
                        <a class="nav-link <?= $module == 'home' ? 'active' : '' ?>"
                            href=".">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $module == 'suppliers' ? 'active' : '' ?>"
                            href="?m=suppliers">Suppliers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $module == 'sales' ? 'active' : '' ?>"
                            href="?m=sales">Sales</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid mt-2 mb-4">

        <?php
        include $pages[$module];
        ?>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
