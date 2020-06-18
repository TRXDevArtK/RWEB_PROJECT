<?php
    ob_start();
    include_once 'database.php';
    
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $id = mt_rand(1000000000, 2100000000);
        
        //TGL
        $hari = $_POST['hari'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        
        $tgl = $tahun."-".$bulan."-".$hari;
        
        $tlp = $_POST['tlp'];
        if(!empty($_POST['email'])){
            $email = $_POST['email'];
        }
        else{
            $email = '';
        }
        
        $noktp = $_POST['noktp'];
        $jk = $_POST['jk'];
        $verifikasi = 0;
        
        $warning = 0;
        $query = "INSERT INTO `pelanggan` (`ktp`, `id`, `nama`, `jk`, `tgl`, `tlp`, `email`, `verifikasi`) VALUES ('$noktp', '$id', $nama', '$jk', $tgl', '$tlp', '$email', '$verifikasi')";
        $sql_run = mysqli_query($conn, $query);
        if($sql_run){
            header("location:daftar.php");
            exit();
        }
        
    }
?>

<html>
    <head>
        <!--Metadata-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/settings.css" />
        <link rel="stylesheet" href="css/daftar.css" />
        <script src="js/jquery.min.js"></script>  
        <script src="js/bootstrap.min.js"></script>  
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
                <p>Jika data diri sudah dikonfirmasi, kami akan mengirim konfirmasi ke email atau nomor telepon anda</p>
            </div>
              
            <form action="#" method="post">
                
                <input type="text" name="nama" placeholder="Masukkan Nama" 
                                          oninvalid="this.setCustomValidity('Silahkan Masukkan Nama Anda')"
                                            accept=""oninput="this.setCustomValidity('')" required="require">
                
                <input type="number" name="tlp" placeholder="Masukkan Nomor Handphone (Dalam Angka)" 
                                          oninvalid="this.setCustomValidity('Silahkan Masukkan Nomor Handphone')"
                                            accept=""oninput="this.setCustomValidity('')" required="require">
                
                <input type="text" name="email" placeholder="Masukkan Email (Optional)" 
                                          oninvalid="this.setCustomValidity('Silahkan Masukkan Email Anda')"
                                            accept=""oninput="this.setCustomValidity('')">
                
                <input type="number" name="noktp" placeholder="Masukkan No KTP" 
                                          oninvalid="this.setCustomValidity('Silahkan Masukkan Nomor KTP Anda')"
                                            accept=""oninput="this.setCustomValidity('')" required="require">
                
                <div class="input-date">
                    <label>Tanggal Lahir |</label>
                    <label>Hari : <input type="number" class="tgl" name="hari" 
                                            oninvalid="this.setCustomValidity('Silahkan Masukkan Harinya (Dalam Angka, 1-31)')"
                                            accept=""oninput="this.setCustomValidity('')" required="require" min="1" max="31" ></label>
                    
                    <label>Bulan : <input type="number" class="tgl" name="bulan" 
                                          oninvalid="this.setCustomValidity('Silahkan Masukkan Harinya (Dalam Angka, 1-12)')"
                                            accept=""oninput="this.setCustomValidity('')" required="require" min="1" max="12" ></label>
                    
                    <label>Tahun : <input type="number" class="tgl" name="tahun" 
                                          oninvalid="this.setCustomValidity('Silahkan Masukkan Tahunnya (Dalam Angka, 1800-3000 )')"
                                            accept=""oninput="this.setCustomValidity('')" required="require" min="1800" max="3000" ></label>
                </div>
                
                <label>Jenis Kelamin : </label>
                <label class="radio-inline"><input type="radio" name="jk" checked> Laki-laki </label>
                <label class="radio-inline"><input type="radio" name="jk"> Perempuan </label>
                <br>
                <div class="center">
                    <input type="submit" name="submit" class="btn btn-submit" value="Kirimkan / Submit">
                </div>
                
            </form>
        </div>
    </body>
</html>
<script>

