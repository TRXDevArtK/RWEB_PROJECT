<html>
    <head>
        <!--Metadata-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/settings.css" />
        <link rel="stylesheet" href="css/daftar.css" />
        <script src="js/jquery.min.js"></script>  
        <title></title>
    </head>
    <body>
        <div class="header">
            <?php include 'nav.php'; ?>
        </div>
        <div class="body">
            <div class="page-header center">
                <h3>Pendaftaran Online</h3>
                <p>Dengan melakukan pendaftaran online, anda tidak perlu susah lagi datang dan menunggu untuk pendaftaran di tempat</p>
            </div>
              
            <br>
            <form action="#" method="post">
                
                <div class="form-group">
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required="require">
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" name="tgl" placeholder="Masukkan Tanggal Lahir" required="require">
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" name="nohp" placeholder="Masukkan Nomor Handphone" required="require">
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Masukkan Email (Optional)">
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" name="noktp" placeholder="Masukkan No KTP" required="require">
                </div>
                
                <label>Jenis Kelamin : </label>
                <label class="radio-inline"><input type="radio" name="optradio" checked> Laki-laki </label>
                <label class="radio-inline"><input type="radio" name="optradio"> Perempuan </label>
                <br>
                <div class="center">
                    <input type="submit" name="submit" class="btn" value="Kirimkan / Submit">
                </div>
                
            </form>
        </div>
    </body>
</html>
<script>

