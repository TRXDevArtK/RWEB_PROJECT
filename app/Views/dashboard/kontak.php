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
            <div id="knp_modal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">Data Kesan dan Pesan</h4>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post" id="pelanggan">
                            <label>Nama  : </label>
                            <input type="text" name="nama" placeholder="Nama" id="nama"readonly>

                            <label>Alamat : </label>
                            <input type="text" name="alamat" placeholder="Alamat" id="tlp" readonly>

                            <label>Email : </label>
                            <input type="text" name="email" placeholder="Alamat Email" id="email" readonly>

                            <label>Nomor HP : </label>
                            <input type="text" name="hp" placeholder="No HP" id="hp" readonly>
                            
                            <label>Subjek : </label>
                            <input type="text" name="subjek" placeholder="Subjek" id="subjek" readonly>
                            
                            <label>Deskripsi : </label>
                            <br>
                            <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" id="deskripsi" readonly></textarea>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

              </div>
            </div>
            
            <br />
            <h3 align="center">List data kesan dan pesan</h3>
            <br />
            <form method="post" id="update_form">
                <br />
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th width="5%">No</th>
                            <th width="25%">Nama</th>
                            <th width="60%">subjek</th>
                            <th width="10%">Pilihan</th>
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
    function fetch_data_knp(id)
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
                    html += '<td>'+data[count].subjek+'</td>';
                    html += '<td>';
                    html += '<input type="button" data-toggle="modal" data-target="#knp_modal" id_s="'+data[count].id+'" nama="'+data[count].nama+'" \n\
                                alamat="'+data[count].alamat+'" hp="'+data[count].hp+'" email="'+data[count].email+'" subjek="'+data[count].subjek+'"\n\
                                deskripsi="'+data[count].deskripsi+'"\n\
                                id="edit_knp" name="edit_knp" class="btn btn-primary pull-left" style="margin-left:10px;" \n\
                                value="Lihat Data">';
//    
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
        
        fetch_data_knp(id);
    })
    
    fetch_data_knp();
    
    //KETIKA EDIT PESERTA DI KLIK UNTUK FITUR MODEL POP
    $(document).on('click', '#edit_knp', function(){
        var nama = $(this).attr("nama");
        var alamat = $(this).attr("alamat");
        var hp = $(this).attr("hp");
        var email = $(this).attr("email");
        var subjek = $(this).attr("subjek");
        var deskripsi = $(this).attr("deskripsi");
        
        //MASUKAN DATA KE MODAL
        $('#nama').val(nama);
        $('#alamat').val(alamat);
        $('#hp').val(hp);
        $('#email').val(email);
        $('#subjek').val(subjek);
        $('#deskripsi').val(deskripsi);
            
    })
    
})
</script>