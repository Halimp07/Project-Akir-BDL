<?php include "../connection.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- aos animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Hasil Seleksi</title>
</head>

<body>
    <?php
    $sql = ociparse(
        $conn,
        "SELECT T.ID_TRANSAKSI, T.ID_LOWONGAN, L.NAMA_PEKERJAAN 
        AS NAMA_PEKERJAAN, P.NAMA AS NAMA_PELAMAR, T.KETERANGAN, 
        T.TANGGAL FROM TRANSAKSI T, PELAMAR P, LOWONGAN L WHERE 
        T.ID_LOWONGAN=L.ID_LOWONGAN AND T.ID_PELAMAR=P.ID_PELAMAR"
    );
    ociexecute($sql);
    $cols = oci_num_fields($sql);
    ?>


    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    /* carousel */
    .carousel .carousel-item {
        max-height: 290px;
    }

    .carousel-item img {
        object-fit: cover;
        max-height: 290px;
    }
    </style>

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">
    </head>

    <body class="bg-light">

        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
            <div class="container-fluid">
                <a data-aos="fade-right" data-aos-delay="350" class="navbar-brand" href="#">Job Arrangement</a>
                <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <div class="d-flex justify-content-center jusify-content-md-start">
                            <li data-aos="fade-down" data-aos-delay="400" class="nav-item me-4">
                                <a href="../pelamar/" class="btn btn-outline-light" aria-current="page">Pelamar</a>
                            </li>
                            <li data-aos="fade-down" data-aos-delay="500" class="nav-item me-4">
                                <a href="../Lowongan/" class="btn btn-outline-light">Lowongan</a>
                            </li>
                            <li data-aos="fade-down" data-aos-delay="600" class="nav-item me-4">
                                <a href="../transaksi/" class="btn btn-outline-light active">Hasil Seleksi</a>
                            </li>
                        </div>
                </div>
            </div>
        </nav>

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/img/Front-End.png" class="d-block w-100" alt="Front_End_Dev">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/Back-End.png" class="d-block w-100" alt="Back_End_Dev">
                </div>
                <div class="carousel-item">
                    <img src="../assets/img/Full-Stack.png" class="d-block w-100" alt="Full_Stack_Dev">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
        <div class="container pt-5">
            <div class="row mb-4">
                <div class="col-12 col-lg-12 col-md-4">
                    <div class="d-flex justify-content-center justify-content-md-end">
                        <button data-aos="fade-left" data-aos-delay=900" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addModal"><i class="bi bi-plus"></i> Tambah Data</button>
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-delay="1000" class="table-responsive">
                <table class="table table-striped table-hover">
                    <caption>Hasil Seleksi</caption>
                    <thead class="table-dark">
                        <tr>
                            <?php
                            for ($i = 1; $i <= $cols; $i++) :
                                $col_name = oci_field_name($sql, $i);
                                if (htmlentities($col_name, ENT_QUOTES) == 'ID_BEASISWA') continue;
                            ?>
                            <th scope="col"><?php echo htmlentities($col_name, ENT_QUOTES) ?></th>
                            <?php endfor; ?>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while (ocifetch($sql)) : ?>
                        <tr>
                            <th scope="row"><?= ociresult($sql, 'ID_TRANSAKSI'); ?></th>
                            <td> <?= ociresult($sql, 'ID_LOWONGAN'); ?></td>
                            <td><?= ociresult($sql, 'NAMA_PEKERJAAN'); ?></td>
                            <td><?= ociresult($sql, 'NAMA_PELAMAR'); ?></td>
                            <td><?= ociresult($sql, 'KETERANGAN'); ?></td>
                            <td><?= date('d F Y', strtotime(ociresult($sql, 'TANGGAL'))); ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-info btn-sm edit-penerima"
                                        data-bs-toggle="modal" data-bs-target="#editModal"
                                        data-id="<?= ociresult($sql, 'ID_TRANSAKSI'); ?>"
                                        data-id="<?= ociresult($sql, 'ID_TRANSAKSI'); ?>"
                                        data-idl="<?= ociresult($sql, 'ID_LOWONGAN'); ?>"
                                        data-idp="<?= ociresult($sql, 'ID_PELAMAR'); ?>"
                                        data-keterangan="<?= ociresult($sql, 'KETERANGAN'); ?>"
                                        data-tanggal="<?= date('Y-m-d', strtotime(ociresult($sql, 'TANGGAL'))); ?>">Edit</button>
                                    <a href="delete.php?id=<?= ociresult($sql, 'ID_TRANSAKSI'); ?>"
                                        class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile;
                        oci_close($conn); ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal Insert -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="addModalLabel">Form Tambah Data</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form action="add.php" method="post">
                                    <div class="mb-3">
                                        <label for="beasiswa" class="form-label">LOWONGAN</label>
                                        <select class="form-select" aria-label="Beasiswa" name="lowongan">
                                            <?php
                                            $sql = ociparse(
                                                $conn,
                                                "SELECT ID_LOWONGAN, NAMA_PEKERJAAN FROM LOWONGAN"
                                            );
                                            ociexecute($sql);
                                            while (ocifetch($sql)) :
                                            ?>
                                            <option value="<?= ociresult($sql, 'ID_LOWONGAN'); ?>">
                                                <?= ociresult($sql, 'NAMA_PEKERJAAN'); ?></option>
                                            <?php
                                            endwhile;
                                            oci_close($conn);
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mahasiswa" class="form-label">PELAMAR</label>
                                        <select class="form-select" aria-label="Mahasiswa" name="pelamar">
                                            <?php
                                            $sql = ociparse(
                                                $conn,
                                                "SELECT ID_PELAMAR, NAMA FROM PELAMAR"
                                            );
                                            ociexecute($sql);
                                            while (ocifetch($sql)) :
                                            ?>
                                            <option value="<?= ociresult($sql, 'ID_PELAMAR'); ?>">
                                                <?= ociresult($sql, 'NAMA'); ?>
                                            </option>
                                            <?php
                                            endwhile;
                                            oci_close($conn);
                                            ?>
                                        </select>
                                    </div>
                                    <!-- <div class="mb-3">
                                    <label for="deskripsi" class="form-label">KETERANGAN</label>
                                    <SELEct name="ket" class=""></SELEct>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea>
                                </div> -->
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input class="form-control" type="date" name="tanggal" id="tanggal"
                                            value="<?= date('Y-m-d'); ?>">
                                    </div>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="editModalLabel">Form Edit Data</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="modal-body">
                            <div class="container">
                                <form action="edit.php" method="post">
                                    <div class="mb-3">
                                        <label for="id" class="form-label">ID</label>
                                        <input type="number" class="form-control" id="id" name="id" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="beasiswa" class="form-label">Lowongan</label>
                                        <select class="form-select" aria-label="Beasiswa" name="lowongan">
                                            <?php
                                            $sql = ociparse(
                                                $conn,
                                                "SELECT ID_LOWONGAN, NAMA_PEKERJAAN FROM LOWONGAN"
                                            );
                                            ociexecute($sql);
                                            while (ocifetch($sql)) :
                                            ?>
                                            <option value="<?= ociresult($sql, 'ID_LOWONGAN'); ?>">
                                                <?= ociresult($sql, 'NAMA_PEKERJAAN'); ?></option>
                                            <?php
                                            endwhile;
                                            oci_close($conn);
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">KETERANGAN</label>
                                        <select name="keterangan" class="form-select">
                                            <option value="Diterima">Diterima</option>
                                            <option value="Ditolak">Ditolak</option>
                                        </select>
                                        <!-- <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea> -->
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input class="form-control" type="date" name="tanggal" id="tanggal"
                                            value="<?= date('Y-m-d'); ?>">
                                    </div>
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script>
        $(document).ready(function() {
            $(document).on('click', '.edit-penerima', function() {
                let id = $(this).data("id");
                let id_lowongan = $(this).data("idl");
                // let id_pelamar = $(this).data("idp");
                let keterangan = $(this).data("keterangan");
                let tanggal = $(this).data("tanggal");
                $("#modal-body").find('input[name="id"]').val(id);
                $("#modal-body").find('select[name="lowongan"]').val(id_lowongan);
                $("#modal-body").find('select[name="pelamar"]').val(id_pelamar);
                $("#modal-body").find('select[name="keterangan"]').val(keterangan);
                $("#modal-body").find('input[name="tanggal"]').val(tanggal);
            });
        });
        </script>
        <!-- js aos animation -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
        AOS.init();
        </script>
        <!-- js script bootstrap -->
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="offcanvas.js"></script>
    </body>

</html>