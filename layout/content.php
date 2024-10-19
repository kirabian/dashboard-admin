<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {
            case 'home':
                include 'dashboard/index.php';
                    break;
            default:
                include 'dashboard/index.php';
                    break;
        }
    } else {
        include 'dashboard/index.php'; // Halaman default
    }
    ?>
    </div>