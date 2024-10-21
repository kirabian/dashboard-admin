<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {
            case 'home':
                include 'dashboard/index.php';
                    break;

            //------------PENDUDUK-----------------//
            case 'ip':
                include 'penduduk/index-pen.php';
                break;
            case 'fp':
                include 'penduduk/form-pen.php';
                break;
            case 'pp':
                include 'controller/proses-pen.php';
            //--------PENUTUP PENDUDUK-----------//
            default:
                include 'dashboard/index.php';
                    break;
        }
    } else {
        include 'dashboard/index.php'; // Halaman default
    }
    ?>
    </div>