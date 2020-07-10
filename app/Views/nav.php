<html>
    <head>
        <!--Metadata-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php if(isset($href) && $href === "back_url"){ ?>
        <!-- untuk deskripsi artikel -->
            <link rel="stylesheet" href="../public/css/nav.css" />
        <?php } else { ?>
            <link rel="stylesheet" href="public/css/nav.css" />
        <?php } ?>
        <title></title>
    </head>
    <header>
        <div class="menu">
            <?php if(isset($href) && $href === "back_url"){ ?>
                <a class="menu-img" href="<?= base_url(); ?>"><img src="../public/img/logo.png"></a>
            <?php } else { ?>
                <a class="menu-img" href="<?= base_url(); ?>"><img src="public/img/logo.png"></a>
            <?php } ?>
            <a href="<?= base_url()."/daftar"; ?>">Daftar</a>
            <a href="<?= base_url()."/agenda"; ?>">Agenda</a>
            <a href="<?= base_url()."/kontak"; ?>">Kontak</a>
            <a href="<?= base_url()."/artikel"; ?>">Artikel</a>
            <a href="<?= base_url()."/fasilitas"; ?>">Fasilitas</a>
            <a href="<?= base_url()."/pelayanan"; ?>">Pelayanan</a>
        </div>
    </header>
</html>


