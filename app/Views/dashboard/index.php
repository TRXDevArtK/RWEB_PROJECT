<html>
    <head>
        <!--Metadata-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="public/css/settings.css" />
        <link rel="stylesheet" href="public/css/index_a.css" />
        <script src="public/js/jquery.min.js"></script>  
        <title></title>
    </head>
    <body>
        <div class="body"> <!-- format untuk body atau konten -->
            <form action="dashboard" method="post">
                <input class="button button1" name=destroy type="submit" value="LOGOUT">
            </form>
            <!-- PAGESHOW (START) -->
            <div id="pageshow">
                <div class="page-header">
                    <h3> Dashboard Rumah Sakit </h3>
                </div>
              <p class="section-lead"></p>
                <div class="services-grid">
                    <div class="service service2">
                        <h4>Data Pelanggan</h4>
                        <p>Tempat untuk melihat data pelanggan yang mendaftar dan terdaftar</p>
                        <a href="<?= base_url()."/dashboard/pelanggan"; ?>" class="cta">Klik Disini</a>
                        
                    </div>
                    
                     <div class="service service2">
                        <h4>Data Kesan dan Pesan</h4>
                        <p>Tempat untuk melihat kesan dan pesan dari pelanggan</p>
                        <a href="<?= base_url()."/dashboard/kontak"; ?>" class="cta">Klik Disini</a>
                        
                    </div>

                    <div class="service service2">
                        <h4>Data Dokter</h4>
                        <p>Tempat untuk melihat data dari dokter</p>
                        <a href="<?= base_url()."/dashboard/kontak"; ?>" class="cta">Klik Disini</a>
                        
                    </div>

                </div>
            </div>
            <!-- PAGESHOW (END) -->
        </div>
    </body>
</html>

