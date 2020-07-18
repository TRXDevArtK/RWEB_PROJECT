<html>
    <head>
        <!--Metadata-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../public/css/settings.css" />
        <link rel="stylesheet" href="../public/css/desc_artikel.css" />
        <script src="../public/js/jquery.min.js"></script>  
        <script src="../public/js/bootstrap.min.js"></script>  
        <title></title>
    </head>
    <body>
        <div class='body'>
            <div class="artikel-head">
                <h3><?= $judul ?></h3>
                <div class='notf'>
                    <p>Tgl : <?= $tanggal ?></p>
                    <p>Penulis : <?= $penulis ?></p>
                </div>
                <img src="data:image/jpeg;base64, <?= $gambar; ?>" class="img-head" alt="gambar_artikel">
            </div>
            
            <div class="artikel-body">
                <?= $html; ?>
            </div>
        </div>
    </body>
</html>