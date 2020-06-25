<html>
    <head>
        <!--Metadata-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="public/css/bootstrap.min.css" />
        <link rel="stylesheet" href="public/css/settings.css" />
        <link rel="stylesheet" href="public/css/daftar.css" />
        <script src="public/js/jquery.min.js"></script>  
        <script src="public/js/bootstrap.min.js"></script>  
        <title></title>
    </head>
    <body>
        <div class="body">
            <div class="page-header center">
                <h3>Pendaftaran Online</h3>
                <p>Dengan melakukan pendaftaran online, anda tidak perlu susah lagi datang dan menunggu untuk pendaftaran di tempat</p>
                <p>Jika data diri sudah dikonfirmasi, kami akan mengirim konfirmasi ke email atau nomor telepon anda</p>
            </div>
              
            <form action="http://localhost/RWEB_PROJECT/daftar" method="post">
                
                <input type="text" name="nama" placeholder="Masukkan Nama" maxlength="40" size="40"
                                          oninvalid="this.setCustomValidity('Silahkan Masukkan Nama Anda')"
                                            accept=""oninput="this.setCustomValidity('')" required="require">
                
                <input type="number" name="tlp" placeholder="Masukkan Nomor Handphone (Dalam Angka)" maxlength="13" size="13"
                                          oninvalid="this.setCustomValidity('Silahkan Masukkan Nomor Handphone')"
                                            accept=""oninput="this.setCustomValidity('')" required="require">
                
                <input type="text" name="email" placeholder="Masukkan Email (Optional)" maxlength="254" size="254"
                                          oninvalid="this.setCustomValidity('Silahkan Masukkan Email Anda')"
                                            accept=""oninput="this.setCustomValidity('')">
                
                <input type="number" name="ktp" placeholder="Masukkan No KTP"
                                          oninvalid="this.setCustomValidity('Silahkan Masukkan Nomor KTP Anda')"
                                            accept=""oninput="this.setCustomValidity('')" required="require" maxlength="20">
                
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
                <label class="radio-inline"><input type="radio" name="jk" checked value="L"> Laki-laki </label>
                <label class="radio-inline"><input type="radio" name="jk" value="P"> Perempuan </label>
                <br>
                <div class="center">
                    <input type="submit" name="submit" class="btn btn-submit" value="Kirimkan / Submit">
                </div>
                
            </form>
        </div>
    </body>
</html>
<script>

