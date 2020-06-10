<?php

?>

<html>
    <head>
        <link rel="stylesheet" href="css/settings.css" />
        <link rel="stylesheet" href="css/test2.css" />
    </head>
    <body>
        <div class="header"> <!-- format untuk hedaer atau navigasi -->
            <?php include 'nav.php'; ?>
        </div>
        
        <div class="body"> <!-- format untuk body atau konten -->
            <h4>Kesan dan Pesan</h4>
            <p>Ada kesan, pesan, kritikan dan saran anda tentang pelayanan di RSUD Kota Yogyakarta dapat anda sampaikan disini</p>
            <p>Kesan, pesan, kritikan dan saran anda akan mnenjadi bagian dari peningkatan pelayanan kami</p>

            <form action="#" method="post"> <!-- Form otomatis css terpasang di input -->

                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required="require">
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required="require">


                <div class="check">
                    <label class="chk-txt">CENTANG INI JIKA ANDA MANUSIA : <input class="chk-box" type="checkbox" value="chk"></label>
                </div>
            </form>
        </div>
    </body>
</html>

