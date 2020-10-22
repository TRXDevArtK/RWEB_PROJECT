<!DOCTYPE html>
<html lang="en">

<head>
    <!--Metadata-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/settings.css" />
    <link rel="stylesheet" href="public/css/index.css" />
    <script src="public/js/jquery.min.js"></script>
    <title></title>
</head>
<<<<<<< HEAD
<header><img class="hr_img" src="public/img/logo.png"></header>
=======
<header>
    <img class="hr_img" src="public/img/logo.png">
    <a href="<?= base_url()."/dashboard"; ?>"><img class="hr_img_admin" src="public/img/admin.png"></a>
</header>
>>>>>>> master

<body>
    <div class="welcome_text">
        <h3>Selamat Datang</h3>
        <h4>Di Rumah Sakit Jogja</h4>
    </div>
    <div class="pageshow">
<<<<<<< HEAD
        <a href="daftar">
            <img src="public/img/kamar1.jpeg" alt="kamar1">
            <p>INI TEST PAGESHOW</p>
        </a>
        <a href="#">
            <img src="public/img/kamar1.jpeg" alt="kamar1">
            <p>INI TEST PAGESHOW</p>
        </a>
        <a href="#">
            <img src="public/img/kamar1.jpeg" alt="kamar1">
            <p>INI TEST PAGESHOW</p>
        </a>
        <a href="#">
            <img src="public/img/kamar1.jpeg" alt="kamar1">
            <p>INI TEST PAGESHOW</p>
        </a>
        <a href="#">
            <img src="public/img/kamar1.jpeg" alt="kamar1">
            <p>INI TEST PAGESHOW</p>
        </a>
        <a href="#">
            <img src="public/img/kamar1.jpeg" alt="kamar1">
            <p>INI TEST PAGESHOW</p>
        </a>
        <a href="#">
            <img src="public/img/kamar1.jpeg" alt="kamar1">
            <p>INI TEST PAGESHOW</p>
        </a>
        <a href="#">
            <img src="public/img/kamar1.jpeg" alt="kamar1">
            <p>INI TEST PAGESHOW</p>
=======
        <a href="<?= base_url()."/daftar"; ?>">
            <img src="public/img/menus/pendaftaran.png" alt="menu1">
            <p>Klik disini jika ingin daftar sebagai pasien rumah sakit</p>
        </a>
        <a href="<?= base_url()."/agenda"; ?>">
            <img src="public/img/menus/agenda.png" alt="menu2">
            <p>Klik disini untuk melihat agenda rumah sakit</p>
        </a>
        <a href="<?= base_url()."/kontak"; ?>">
            <img src="public/img/menus/kontak.png" alt="menu3">
            <p>Jika ada masalah dengan rumah sakit, hubungi kami disni</p>
        </a>
        <a href="<?= base_url()."/artikel"; ?>">
            <img src="public/img/menus/artikel.png" alt="menu4">
            <p>Jika anda ingin membaca artikel rumah sakit</p>
        </a>
        <a href="<?= base_url()."/fasilitas"; ?>">
            <img src="public/img/menus/fasilitas.png" alt="menu5">
            <p>Jika anda ingin melihat fasilitas apa saja yang ada di rumah sakit kami</p>
        </a>
        <a href="<?= base_url()."/pelayanan"; ?>">
            <img src="public/img/menus/pelayanan.png" alt="menu6">
            <p>Jika anda ingin melihat berbagai pelayanan di rumah sakit kami</p>
>>>>>>> master
        </a>

    </div>
    <!-- PAGESHOW (END) -->

    <div class="artikel-header">
        <hr class="hr_line">
        <p>Artikel Utama</p>
    </div>

    <div class="artikel-body">
<<<<<<< HEAD
        <a href="#">
            <img src="public/img/kamar1.jpeg" alt="kamar1">
            <p>INI TEST PAGESHOW</p>
        </a>
        <a href="#">
            <img src="public/img/kamar1.jpeg" alt="kamar1">
            <p>INI TEST PAGESHOW</p>
        </a>
        <a href="#">
            <img src="public/img/kamar1.jpeg" alt="kamar1">
            <p>INI TEST PAGESHOW</p>
        </a>
    </div>

    <div class="artikel-more">
        <a href="#">Artikel Selengkapnya</a>
    </div>
</body>

</html>
=======
        
    </div>

    <div class="artikel-more">
        <a href="<?= base_url()."/artikel"; ?>">Artikel Selengkapnya</a>
    </div>
</body>

</html>

<script>
$(document).ready(function(){
    
    $body = $("body");
    
    $(document).on({
        ajaxStart: function() { $body.addClass("loading"); },
        ajaxStop: function() { $body.removeClass("loading"); }    
    });
    
    //AMBIL DATA PENDAFTARAN PELANGGAN
    function fetch_data_artikel()
    {
        $.ajax({
            url:"<?= current_url(); ?>",
            method:"POST",
            data:{
                'limit':3,
                'page':1,
                'key':'read'
            },
            dataType:"json",
            error: function (xhr, status) {
                //set tidak ada isi jika error ATAU DATA = 0 (NULL) atau data tidak terbaca
                var html = '';
                $('.artikel-body').html(html);
            },
            success:function(data)
            {
                var html = '';
                var count = 0;
                //console.log(data[count].gambar);
                for(count; count < data.length; count++){
                    html += '<div class="wrap">';
                    html += '<img src="data:image/jpeg;base64, '+data[count].gambar+'" alt="gambar'+count+'">';
                    html += '<p>'+data[count].judul+'</p>';
                    html += '<form method="post" action="<?= base_url() ?>/artikel/desc_artikel">';
                    html += '<input type="hidden" name="id" value="'+data[count].id+'">';
                    html += '<input type="submit" class="slkp" name="submit" value="SELENGKAPNYA">';
                    html += '</form>';
                    html += '</div>';
                }
                //CEK DATA JSON (butuh JSON.stringify
                //alert(JSON.stringify(data));
                
                $('.artikel-body').html(html);
                //$('abody').html(html);
            }
        });
    }
    
    fetch_data_artikel();
    
})  
</script>
>>>>>>> master
