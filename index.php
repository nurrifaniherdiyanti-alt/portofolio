<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurrifani Herdiyanti | Informatics Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
    $stmt = $conn->query("SELECT * FROM profile LIMIT 1");
    $profile = $stmt->fetch();
    ?>
    <section class="hero">
        <div class="container">
            <h1 class="mb-3"><?= $profile['nama'] ?></h1>
            <p class="lead text-secondary mb-4"><?= $profile['headline'] ?></p>
            <div class="col-lg-7 mx-auto">
                <p class="text-muted"><?= $profile['bio'] ?></p>
            </div>
        </div>
    </section>

    <section class="container">
        <h2 class="section-title">Selected Projects</h2>
        <div class="row g-4">
            <?php
            $projects = $conn->query("SELECT * FROM projects");
            while($row = $projects->fetch()) {
            ?>
            <div class="col-md-6">
                <div class="card">
                    <span class="text-uppercase small text-primary fw-bold mb-2 d-block"><?= $row['kategori'] ?></span>
                    <h3 class="h4 fw-bold"><?= $row['judul'] ?></h3>
                    <p class="text-muted small"><?= $row['deskripsi'] ?></p>
                    <div class="mt-auto">
                        <?php 
                        $techs = explode(',', $row['teknologi']);
                        foreach($techs as $t) echo "<span class='badge-tech'>".trim($t)."</span>";
                        ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <section class="container mt-5">
        <h2 class="section-title">Experience</h2>
        <div class="row">
            <div class="col-lg-9">
                <?php
                $exp = $conn->query("SELECT * FROM experience ORDER BY id DESC");
                while($row = $exp->fetch()) {
                ?>
                <div class="experience-item">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="fw-bold mb-0"><?= $row['jabatan'] ?></h5>
                        <span class="badge bg-light text-secondary rounded-pill"><?= $row['periode'] ?></span>
                    </div>
                    <p class="text-primary small mb-2 fw-semibold"><?= $row['organisasi'] ?></p>
                    <p class="text-muted small"><?= $row['deskripsi_tugas'] ?></p>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <footer class="text-center">
        <div class="container">
            <p class="small mb-0">Designed with Precision &copy; <?= date('Y') ?> Nurrifani Herdiyanti</p>
            <p class="small text-uppercase ls-wide" style="letter-spacing: 2px;">Informatics Student • UMMI</p>
        </div>
    </footer>

</body>
</html>