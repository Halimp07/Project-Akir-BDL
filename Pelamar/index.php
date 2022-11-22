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
    <title>Tabel Pegawai</title>
</head>

<body>
    <?php
    $sql = ociparse($conn, "SELECT * FROM PELAMAR");
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
                    <ul class="navbar-nav me-auto mb-4 mb-lg-0">
                        <div class="d-flex justify-content-center">
                            <li data-aos="fade-down" data-aos-delay="400" class="nav-item me-4">
                                <a href=" ../pelamar/" class="btn btn-outline-light active"
                                    aria-current="page">Pelamar</a>
                            </li>
                            <li data-aos="fade-down" data-aos-delay="500" class="nav-item me-4">
                                <a href=" ../Lowongan/" class="btn btn-outline-light">Lowongan</a>
                            </li>
                            <li data-aos="fade-down" data-aos-delay="600" class="nav-item me-4">
                                <a href="../transaksi/" class="btn btn-outline-light">Hasil Seleksi</a>
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
                        <button data-aos="fade-left" data-aos-delay="900" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addModal"><i class="bi bi-plus"></i> Tambah Data</button>
                    </div>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-delay="1000" class="table-responsive">
                <table class="table table-striped table-hover">
                    <caption>Data Pelamar</caption>
                    <thead class="table-dark">
                        <tr>
                            <?php for ($i = 1; $i <= $cols; $i++) : $col_name = oci_field_name($sql, $i); ?>
                            <th scope="col"><?php echo htmlentities($col_name, ENT_QUOTES) ?></th>
                            <?php endfor; ?>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while (ocifetch($sql)) : ?>
                        <tr>
                            <th scope="row"><?= ociresult($sql, 'ID_PELAMAR'); ?></th>
                            <td><?= ociresult($sql, 'NAMA'); ?></td>
                            <td><?= ociresult($sql, 'NO_TELP'); ?></td>
                            <td><?= ociresult($sql, 'KOTA'); ?></td>
                            <td><?= ociresult($sql, 'ALAMAT'); ?></td>
                            <td><?= ociresult($sql, 'EMAIL'); ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-info btn-sm edit-mahasiswa"
                                        data-bs-toggle="modal" data-bs-target="#editModal"
                                        data-id="<?= ociresult($sql, 'ID_PELAMAR'); ?>"
                                        data-nama="<?= ociresult($sql, 'NAMA'); ?>"
                                        data-telp="<?= ociresult($sql, 'NO_TELP'); ?>"
                                        data-kota="<?= ociresult($sql, 'KOTA'); ?>"
                                        data-alamat="<?= ociresult($sql, 'ALAMAT'); ?>"
                                        data-email="<?= ociresult($sql, 'EMAIL'); ?>">Edit</button>
                                    <a href="delete.php?id=<?= ociresult($sql, 'ID_PELAMAR'); ?>"
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
                                    <!-- <div class="mb-3">
                                    <label for="nama" class="form-label">Id_Pelamar</label>
                                    <input type="number" class="form-control" id="Pelamar" name="id_pelamar" required>
                                </div> -->
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">No_Telp</label>
                                        <input type="number" class="form-control" id="No_Telp" name="No_Telp" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jurusan" class="form-label">Kota</label>
                                        <input type="text" class="form-control" id="Kota" name="Kota" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" required>
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
                                        <label for="nama" class="form-label">Id_Pelamar</label>
                                        <input type="number" class="form-control" id="nrp" name="id_pelamar" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">No_Telp</label>
                                        <input type="number" class="form-control" id="No_Telp" name="no_telp" required>
                                    </div>
                                    <div class=" mb-3">
                                        <label for="jurusan" class="form-label">Kota</label>
                                        <input type="text" class="form-control" id="Kota" name="kota" required>
                                    </div>
                                    <div class=" mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                                    </div>
                                    <div class=" mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" required>
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
            $(document).on('click', '.edit-mahasiswa', function() {
                let id_pelamar = $(this).data("id");
                let nama = $(this).data("nama");
                let no_telp = $(this).data("telp");
                let kota = $(this).data("kota");
                let alamat = $(this).data("alamat");
                let email = $(this).data("email");
                $("#modal-body").find('input[name="id_pelamar"]').val(id_pelamar);
                $("#modal-body").find('input[name="nama"]').val(nama);
                $("#modal-body").find('input[name="no_telp"]').val(no_telp);
                $("#modal-body").find('input[name="kota"]').val(kota);
                $("#modal-body").find('input[name="alamat"]').val(alamat);
                $("#modal-body").find('input[name="email"]').val(email);
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