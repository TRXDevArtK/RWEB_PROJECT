<html>
    <head>
        <!--Metadata-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="public/css/bootstrap.min.css" />
        <link rel="stylesheet" href="public/css/settings.css" />
        <link rel="stylesheet" href="public/css/artikel.css" />
        <script src="public/js/jquery.min.js"></script>  
        <script src="public/js/bootstrap.min.js"></script>  
        <title></title>
    </head>
    <body>
        <div class="artikel-header">
            <hr class="hr_line">
            <p>List Artikel</p>
        </div>
        <div class="body">
            
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
    function fetch_data_listartikel(id)
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
                $('.body').html(html);
                //console.log(JSON.stringify(xhr));
            },
            success:function(data)
            {
                var html = '';
                var count = 0;
                //console.log(data[count].gambar);
                for(count; count < data.length; count++){
                    html += '<div class="artikel-flow">';
                    html += '<img src="data:image/jpeg;base64, '+data[count].gambar+'" alt="gambar'+count+'">';
                    html += '<div class="artikel-body">';
                    html += '<p class="header">'+data[count].judul+'</p>';
                    html += '<div class="not">'
                    html += '<p class="not-ele" style="margin-right:5px;">tgl : '+data[count].tanggal+'</p>';
                    html += '<p class="not-ele">Penulis : '+data[count].penulis+'</p>'
                    html += '</div>'
                    html += '<div class="text-control">';
                    html += '<p class="desc" max="70">'+data[count].deskripsi+'</p>';
                    html += '<form method="post" action="<?= base_url() ?>/artikel/desc_artikel">';
                    html += '<input type="hidden" name="id" value="'+data[count].id+'">';
                    html += '<input type="submit" class="slkp" name="submit" value="SELENGKAPNYA">';
                    html += '</form>';
                    html += '</div></div></div>';
                }
                //CEK DATA JSON (butuh JSON.stringify
                //alert(JSON.stringify(data));
                
                //Masukkan koda tadi ke <tbody> yang ada di html
                $('.body').html(html);
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
        
        fetch_data_listartikel(id);
    })
    
    fetch_data_listartikel();
    
})  
</script>


