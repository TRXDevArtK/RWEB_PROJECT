<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <!--<a href="index"><img class="navbar-brand" src="../img/logo.png" alt="logo"></a>-->
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?= base_url(); ?>">Halaman Awal</a></li>
        </ul>
        <a href="<?= base_url()."/dashboard/pelanggan"; ?>"><button class="btn btn-default navbar-btn" style="margin-left:10px">Pelanggan</button></a>
        <a href="<?= base_url()."/dashboard/kontak"; ?>"><button class="btn btn-default navbar-btn" style="margin-left:10px">Kesan & Pesan</button></a>
        <!--<a href="<?= base_url()."/dashboard/artikel"; ?>"><button class="btn btn-default navbar-btn" style="margin-left:10px">Artikel</button></a>
        <a href="<?= base_url()."/dashboard/fasilitas"; ?>"><button class="btn btn-default navbar-btn" style="margin-left:10px">Fasilitas</button></a>
        <a href="dad"><button class="btn btn-default navbar-btn" style="margin-left:10px">Data DAD</button></a>-->
        <ul class="nav navbar-nav navbar-right">
            <!--<li><a href="<?= base_url()."/dashboard/profil"; ?>"><span class="glyphicon glyphicon-user"></span> Dashboard</a></li>-->
            <li><a href="<?= base_url()."/dashboard/logout"; ?>"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
    </div>
</nav><br><br>
