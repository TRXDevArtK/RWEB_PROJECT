<?php
    
?>

<html>
    <head>
        <!--Metadata-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="public/css/settings.css" />
        <link rel="stylesheet" href="public/css/pelayanan.css" />
        <link rel="stylesheet" href="public/css/bootstrap.min.css" />
        <script src="public/js/jquery.min.js"></script>  
        <script src="public/js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
        <div class="sub-nav-header center">
            <hr>
            <button type="button" class="btn-mod btn-sub-nav clp1" >Pelayanan Umum</button>
            <button type="button" class="btn-mod btn-sub-nav clp2" >Pelayanan Unggulan</button>
            <button type="button" class="btn-mod btn-sub-nav clp3" >Pelayanan Rujukan</button>
        </div>
        
        <div class="body">
            <!-- ganti in nanti dengan jquery peraktif collapse -->
            <div id="p-umum" class="collapse in">
                <div class="pelayanan-body">
                    <div class="wrap">
                        <img src="public/img/kamar1.jpeg" alt="gambar1">
                        <h4>"Rawat Jalan"</h4>
                        <p>tempat untuk merawat sekaligus jalan</p>
                    </div>
                    
                    <div class="wrap">
                        <img src="public/img/kamar1.jpeg" alt="gambar1">
                        <h4>"Rawat Jalan"</h4>
                        <p>tempat untuk merawat sekaligus jalan</p>
                    </div>
                    
                    <div class="wrap">
                        <img src="public/img/kamar1.jpeg" alt="gambar1">
                        <h4>"Rawat Jalan"</h4>
                        <p>tempat untuk merawat sekaligus jalan</p>
                    </div>
                </div>
            </div>

            <div id="p-unggul" class="collapse text-center">
                <div class="pelayanan-body">
                    <div class="wrap">
                        <img src="public/img/kamar1.jpeg" alt="gambar1">
                        <h4>"Rawat Jalan"</h4>
                        <p>Pelayanan rawat jalan adalah pelayanan kepada pasien dengan tujuan untuk observasi, diagnosis, pengobatan, rehabilitasi dan pelayanan kesehatan lainnya tanpa mengharuskan pasien tersebut untuk dirawat inap.</p>
                    </div>
                    
                    <div class="wrap">
                        <img src="public/img/kamar1.jpeg" alt="gambar1">
                        <h4>"Rawat Inap"</h4>
                        <p>Pelayanan rawat inap adalah pelayanan kepada pasien dengan tujuan untuk pengamatan, diagnosis, pengobatan, rehabilitasi dan pelayanan kesehatan lainnya dengan mengharuskan pasien tersebut untuk dirawat inap.</p>
                    </div>
                    
                    <div class="wrap">
                        <img src="public/img/kamar1.jpeg" alt="gambar1">
                        <h4>"Rawat Jalan"</h4>
                        <p>tempat untuk merawat sekaligus jalan</p>
                    </div>
                    <div class="wrap">
                        <img src="public/img/kamar1.jpeg" alt="gambar1">
                        <h4>"Rawat Jalan"</h4>
                        <p>tempat untuk merawat sekaligus jalan</p>
                    </div>
                    
                    <div class="wrap">
                        <img src="public/img/kamar1.jpeg" alt="gambar1">
                        <h4>"Rawat Jalan"</h4>
                        <p>tempat untuk merawat sekaligus jalan</p>
                    </div>
                    
                    <div class="wrap">
                        <img src="public/img/kamar1.jpeg" alt="gambar1">
                        <h4>"Rawat Jalan"</h4>
                        <p>tempat untuk merawat sekaligus jalan</p>
                    </div>
                </div>
            </div>
            
            <div id="p-rujuk" class="collapse text-center">
                <div class="pelayanan-body">
                    <div class="wrap">
                        <img src="public/img/kamar1.jpeg" alt="gambar1">
                        <h4>"Rawat Jalan"</h4>
                        <p>tempat untuk merawat sekaligus jalan</p>
                    </div>
                    
                    <div class="wrap">
                        <img src="public/img/kamar1.jpeg" alt="gambar1">
                        <h4>"Rawat aaa"</h4>
                        <p>tempat untuk merawat sekaligus jalan</p>
                    </div>
                    
                    <div class="wrap">
                        <img src="public/img/kamar1.jpeg" alt="gambar1">
                        <h4>"Rawat Jalan"</h4>
                        <p>tempat untuk merawat sekaligus jalan</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<script>
$(document).ready(function(){
    $('.clp1').on('click', function() {
        $("#p-umum").collapse('show');
        $("#p-unggul").collapse('hide');
        $("#p-rujuk").collapse('hide');
    });
    $('.clp2').on('click', function() {
        $("#p-umum").collapse('hide');
        $("#p-unggul").collapse('show');
        $("#p-rujuk").collapse('hide');
    });
     $('.clp3').on('click', function() {
        $("#p-umum").collapse('hide');
        $("#p-unggul").collapse('hide');
        $("#p-rujuk").collapse('show');
    });
})
</script>

