<html>
    <head>
        <!--Metadata-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="public/css/settings.css" />
        <link rel="stylesheet" href="public/css/agenda.css" />
        <link rel="stylesheet" href="public/css/bootstrap.min.css" /> 
        <link rel="stylesheet" href="public/css/loading.css" />
        <script src="public/js/jquery.min.js"></script>
        <script src="public/js/bootstrap.min.js"></script>  
        <title></title>
    </head>
    <body>
        <div class="agenda-header">
            <hr class="hr_line">
            <p>List Agenda</p>
        </div>
        
        <div class="agenda-body"></div>
        
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
    function fetch_data_agenda(id)
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
                $('.agenda-body').html(html);
                //console.log(JSON.stringify(xhr));
            },
            success:function(data)
            {
                var html = '';
                var count = 0;
                //console.log(data[count].gambar);
                for(count; count < data.length; count++){
                    html += '<a href="<?= base_url(); ?>'+data[count].file+'">';
                    html += '<img src="data:image/jpeg;base64, '+data[count].gambar+'" alt="gambar'+count+'">';
                    console.log(count);
                    html += '<p>"'+data[count].judul+'"</p>';
                    html += '<p class="tgl">Mulai : "'+data[count].tanggal+'"</p>';
                    html += '<p class="tgl">Berakhir : "'+data[count].mulai+'"</p>';
                    html += '<p>"'+data[count].deskripsi+'"</p>';
                    html += '</a>';
                }
                //CEK DATA JSON (butuh JSON.stringify
                //alert(JSON.stringify(data));
                
                //Masukkan koda tadi ke <tbody> yang ada di html
                $('.agenda-body').html(html);
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
        
        fetch_data_agenda(id);
    })
    
    fetch_data_agenda();
    
})  
</script>

