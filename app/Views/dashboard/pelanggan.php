<html>
    <head>
        <!--Metadata-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/settings.css" />
        <link rel="stylesheet" href="../public/css/bootstrap.min.css" /> 
        <link rel="stylesheet" href="../public/css/loading.css" />
        <script src="../public/js/jquery.min.js"></script>
        <script src="../public/js/bootstrap.min.js"></script>  
        <title></title>
    </head>
    <body>
        <div class="container">
            
            <div class="abc" name="ualal" value="ahsdkwd" oh="ashdk"></div>
            <!-- Modal -->
            <div id="peserta_modal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">Data Presensi</h4>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post" id="pelanggan">
                            <input type="hidden" name="id" id="id" value="" readonly>
                            <input type="text" name="nama" placeholder="Masukkan Nama" id="nama"
                                                      oninvalid="this.setCustomValidity('Silahkan Masukkan Nama Anda')"
                                                        accept=""oninput="this.setCustomValidity('')" required="require">

                            <input type="number" name="tlp" placeholder="Masukkan Nomor Handphone (Dalam Angka)" id="tlp"
                                                      oninvalid="this.setCustomValidity('Silahkan Masukkan Nomor Handphone')"
                                                        accept=""oninput="this.setCustomValidity('')" required="require">

                            <input type="text" name="email" placeholder="Masukkan Email (Optional)" id="email"
                                                      oninvalid="this.setCustomValidity('Silahkan Masukkan Email Anda')"
                                                        accept=""oninput="this.setCustomValidity('')">

                            <input type="number" name="ktp" placeholder="Masukkan No KTP" id="ktp"
                                                      oninvalid="this.setCustomValidity('Silahkan Masukkan Nomor KTP Anda')"
                                                        accept=""oninput="this.setCustomValidity('')" required="require">

                            <div class="input-date">
                                <label>Tanggal Lahir |</label>
                                <label>Hari : <input type="number" class="tgl" name="hari" id="hari"
                                                        oninvalid="this.setCustomValidity('Silahkan Masukkan Harinya (Dalam Angka, 1-31)')"
                                                        accept=""oninput="this.setCustomValidity('')" required="require" min="1" max="31" ></label>

                                <label>Bulan : <input type="number" class="tgl" name="bulan" id="bulan"
                                                      oninvalid="this.setCustomValidity('Silahkan Masukkan Harinya (Dalam Angka, 1-12)')"
                                                        accept=""oninput="this.setCustomValidity('')" required="require" min="1" max="12" ></label>

                                <label>Tahun : <input type="number" class="tgl" name="tahun" id="tahun"
                                                      oninvalid="this.setCustomValidity('Silahkan Masukkan Tahunnya (Dalam Angka, 1800-3000 )')"
                                                        accept=""oninput="this.setCustomValidity('')" required="require" min="1800" max="3000" ></label>
                            </div>

                            <label>Jenis Kelamin : </label>
                            <label class="radio-inline"><input type="radio" name="jk" id="jk" value="L"> Laki-laki </label>
                            <label class="radio-inline"><input type="radio" name="jk" id="jk" value="P"> Perempuan </label>
                            <br>
                            <div class="center">
                                <input type="button" name="update" id="update" ktp="" class="btn-mod btn-submit" value="Update / Submit">
                                <input type="button" name="hapus" id="hapus" ktp="" class="btn-mod btn-sub-nav" value="Hapus Data">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

              </div>
            </div>
            
            <br />
            <h3 align="center">List orang yang mendaftar (Pelanggan/Calon Pelanggan)</h3>
            <br />
            <form method="post" id="update_form">
                <br />
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th width="5%">No</th>
                            <th width="10%">Nama</th>
                            <th width="10%">KTP</th>
                            <th width="10%">Menu</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </form>
            <!--PERHATIAN, CSS TABEL DAN ISINYA MASIH MENGGUNAKAN BOOTSTRAP 3.3.7, SILAHKAN KALAU MAU GANTI ATAU MODIF -->
            <div class="text-center" <?php if($total_pages == 1){ echo " hidden"; }?>>
                <ul class="pagination">
                    <?php 
                    if(!empty($total_pages)){ ?>
                        <li id="back_page">
                            <a href="#" data-id="" class="page-link" id="bp"> < </a>
                        </li>
                        <?php
                        for($i=1; $i<=$total_pages; $i++){ ?>

                            <?php
                            if($i == 1)
                            {
                            ?>
                                <li class="pageitem active" id="<?php echo $i;?>">
                                    <a href="#page_no=<?php echo $i;?>" data-id="<?php echo $i;?>" class="page-link active" ><?php echo $i;?></a>
                                </li>
                            <?php 
                            }
                            else
                            {
                            ?>
                                <li class="pageitem" id="<?php echo $i;?>">
                                    <a href="#page_no=<?php echo $i;?>" class="page-link active" data-id="<?php echo $i;?>"><?php echo $i;?></a>
                                </li>
                            <?php
                            }
                        } ?>

                        <li class="next_page">
                            <a href="#" data-id="2" class="page-link" id="bp2" > > </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="ajaxload"><!-- ini loading ajax --></div>
    </body>
</html>

<script> //PAKAI ACTIVE JAVASCRIPT (AJAX)
$(document).ready(function(){
    
    $body = $("body");
    
    $(document).on({
        ajaxStart: function() { $body.addClass("loading"); },
        ajaxStop: function() { $body.removeClass("loading"); }    
    });
    
    //AMBIL DATA PENDAFTARAN PELANGGAN
    function fetch_data_pelanggan(id)
    {
        //REFRESH PAGE
        //$('#bp2').attr('data-id',2);
        if(id == null){
            id = 1;
        }
        $.ajax({
            url:"<?= current_url(); ?>",
            method:"POST",
            data:{
                'limit':'<?=$limit?>',
                'page':id,
                'key':'read'
            },
            dataType:"json",
            error: function (xhr, status) {
                //set tidak ada isi jika error ATAU DATA = 0 (NULL) atau data tidak terbaca
                var html = '';
                $('tbody').html(html);
            },
            success:function(data)
            {
                var html = '';
                var count = 0;
                for(count; count < data.length; count++){
                    html += '<tr>';
                    html += '<td>'+(count+1)+'</td>';
                    html += '<td>'+data[count].nama+'</td>';
                    html += '<td>'+data[count].ktp+'</td>';
                    //html += '<td><button id="soak">SOAK</button></td>';
                    html += '<td>';
                    if(data[count].verifikasi == 0){
                        html += '<input type="button" name="ver" id="ver" ktp="'+data[count].ktp+'" email="'+data[count].email+'" tlp="'+data[count].tlp+'"value="Verifikasi" class="btn btn-info pull-left">';
                    }
                    else{
                        html += '<input type="button" name="ver" id="ver" ktp="'+data[count].email+'" email="'+data[count].email+'" tlp="'+data[count].tlp+'"value="Verif Lagi" class="btn btn-danger pull-left">';
                    }
                    
                    var date = new Date(data[count].tgl);
                    var hari = date.getDate();
                    var bulan = date.getMonth() + 1;
                    var tahun = date.getFullYear();
                                    
                    html += '<input type="button" data-toggle="modal" data-target="#peserta_modal" id_s="'+data[count].id+'" ktp="'+data[count].ktp+'" \n\
                                nama="'+data[count].nama+'" tlp="'+data[count].tlp+'" email="'+data[count].email+'" tgl="'+data[count].tgl+'"\n\
                                hari="'+hari+'" bulan="'+bulan+'" tahun="'+tahun+'" jk="'+data[count].jk+'"\n\
                                id="edit_peserta" name="edit_peserta" class="btn btn-primary pull-left" style="margin-left:10px;" \n\
                                value="Lihat / Edit Data">';
    
                    html += '</td></tr>';          
                                
                    //console.log(data[count].id);
                }
                //CEK DATA JSON (butuh JSON.stringify
                //alert(JSON.stringify(data));
                
                //Masukkan koda tadi ke <tbody> yang ada di html
                $('tbody').html(html);
                $(".pageitem").removeClass("active");
                $("#"+id).addClass("active");
                //$('abody').html(html);
            }
        });
    }
    
    //Jika pagination di click
    $(".page-link").click(function(){
        var id = $(this).attr("data-id");
        if(id >= <?=$total_pages?>)
        {
            id = <?=$total_pages?>;
        }
        else if(id <= 1){
            id = 1;
        }

        var id_int = parseInt(id, 10);

        var id_int_min = id_int - 1;
        var id_int_plus = id_int + 1;

        var id_string_min = id_int_min.toString();
        var id_string_plus = id_int_plus.toString();
        $('#bp').attr('data-id',id_string_min);
        $('#bp2').attr('data-id',id_string_plus);
        
        fetch_data_pelanggan(id);
    })
    
    fetch_data_pelanggan();
    
    //KETIKA EDIT PESERTA DI KLIK UNTUK FITUR MODEL POP
    $(document).on('click', '#edit_peserta', function(){
        var nama = $(this).attr("nama");
        var ktp = $(this).attr("ktp");
        var tlp = $(this).attr("tlp");
        var email = $(this).attr("email");
        var jk = $(this).attr("jk");
        var id = $(this).attr("id_s");
        
        //TANGGAL
        var hari = $(this).attr("hari");
        var bulan = $(this).attr("bulan");
        var tahun = $(this).attr("tahun");
        
        //MASUKAN DATA KE MODAL
        $('#nama').val(nama);
        $('#ktp').val(ktp);
        $('#tlp').val(tlp);
        $('#email').val(email);
        
        //TANGGAL
        $('#hari').val(hari);
        $('#bulan').val(bulan);
        $('#tahun').val(tahun);
        $('#id').val(id);
        $('#hapus').attr("ktp",ktp);
        
        if(jk === "L"){
            $("#jk[value='L']").attr('checked', 'checked');
        }
        else{
            $("#jk[value='P']").attr('checked', 'checked');
        }
            
    })
    
    //FUNGSI VERIFIKASI
    $(document).on('click', '#ver', function(){
        var ktp = $(this).attr("ktp");
        var email = $(this).attr("email");
        var tlp = $(this).attr("tlp");
        var page = $('#bp2').attr('data-id');
        $.ajax({
            url:"<?= current_url(); ?>",
            method:"POST",
            data:{
                'ktp':ktp,
                'email':email,
                'tlp':tlp,
                'key':'ver'
            },
            success:function(data){
                fetch_data_pelanggan(page-1);
            }
        });
    })
    
    //FUNGSI UPDATE PELANGGAN
    $(document).on('click', '#update', function(){
        var serialize = $("#pelanggan").serializeArray();
        serialize.push({name: 'key', value: 'update'});
        var page = $('#bp2').attr('data-id');
        $.ajax({
            url:'<?= current_url(); ?>',
            method:"POST",
            data:$.param(serialize),
            dataType:"json",
            success:function(data){
                if(data.status == 'sukses'){
                    $('#peserta_modal').modal('toggle');
                    fetch_data_pelanggan(page-1);
                }
                else if(data.status == 'gagal'){
                    alert("Maaf data KTP yang anda inputkan sudah ada, silahlan coba lagi");
                }
            }
        });
    })
    
    //FUNGSI HAPUS PELANGGAN
    $(document).on('click', '#hapus', function(){
        //var text;
        var submit = prompt("Apa anda yakin ingin menghapus data Pelanggan INI ? \n\
        \n\Ketik 'YAKIN' (Huruf Besar) jika anda yakin untuk menghapus data Pelanggan", "KETIK DISINI");
        var ktp = $(this).attr('ktp');
        var page = $('#bp2').attr('data-id');
        if(submit == "YAKIN"){
            $.ajax({
                url:'<?= current_url(); ?>',
                method:"POST",
                data : {
                    ktp : ktp,
                    'key':'delete'
                },
                success:function(data){
                    $('#peserta_modal').modal('toggle');
                    fetch_data_pelanggan(page-1);
                }
            });
        }
        else{
          //alert("Penghapusal Batal");
        }
    })
    
})
</script>