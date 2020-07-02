<?php
    ob_start();
    #include sesuatu disini
    include_once "auth_database.php";
    
?>

<?php
    $ktp = $_POST['ktp'];
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tgl = $_POST['tgl'];
    $tlp = $_POST['tlp'];
    $email = $_POST['email'];
?>

<html>
    <head>
        <!--Metadata-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/settings.css" />
        <link rel="stylesheet" href="../css/bootstrap.min.css" /> 
        <link rel="stylesheet" href="../css/loading.css" />
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>  
        <title></title>
    </head>
    <body>
        
        <div class="container">
            <div class="page-header text-center">
                <h3>Data Matkul</h3>      
            </div>
            <form class="form-inline">
                <ul class="list-group">
                    <li class="list-group-item">
                        <label for="email">Email address:</label>
                        <input type="email" id="email">
                    </li>
                    <li class="list-group-item">Nama : <?php echo $nama;?></li>
                    <li class="list-group-item">KTP : <?php echo $ktp;?></li>
                    <li class="list-group-item">Tanggal Lahir : <?php echo $tgl;?></li>
                    <li class="list-group-item">No Telepon : <?php echo $tlp;?></li>
                    <li class="list-group-item">Email : <?php echo $email;?></li>
                </ul>
            </form>
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
    
    //AMBIL DATA NILAI MATA KULIAH DARI DATABASE (loaddata.php)
    function fetch_data_nilaimtk(id)
    {
        //REFRESH PAGE
        //$('#bp2').attr('data-id',1);
        if(id == null){
            id = 1;
        }
        $.ajax({
            url:"mtk_data_opr.php",
            method:"POST",
            /* Masukkan data yang diperlukan untuk di loaddatanya di loaddata.php*/
            data:{
                'idmatkul': '<?=$idmatkul?>',
                'limit':'<?=$limit?>',
                'page':id,
                'key':'load_nilai'
            },
            dataType:"json",
            error: function (xhr, status) {
                //set tidak ada isi jika error ATAU DATA = 0 (NULL) atau data tidak terbaca
                var html = '';
                $('#tbody').html(html);
                //alert(JSON.stringify(xhr));
            },
            success:function(data)
            {
                var html = '';
                var count = 0;
                for(count; count < data.length; count++)
                {
                    html += '<tr>';
                    html += '<td><input type="checkbox" no="'+(count+1)+'" nim="'+data[count].nim+'" namafull="'+data[count].namafull+'" tanggal_nilai="'+data[count].tanggal_nilai+'" nilai="'+data[count].nilai+'" class="check_box"  /></td>';
                    html += '<td>'+(count+1)+'</td>';
                    html += '<td>'+data[count].nim+'</td>';
                    html += '<td>'+data[count].namafull+'</td>';
                    html += '<td>'+data[count].tanggal_nilai+'</td>';
                    html += '<td>'+data[count].nilai+'</td></tr>';
                }
                
                //CEK DATA JSON (butuh JSON.stringify
                //alert(JSON.stringify(data));
                
                //Masukkan koda tadi ke <tbody> yang ada di html
                $('#tbody').html(html);
                $(".pageitem").removeClass("active");
                $("#"+id).addClass("active");
                //$('abody').html(html);
                
            }
        });
    }
    
    //AMBIL DATA NILAI MATA KULIAH DARI DATABASE (loaddata.php)
    function fetch_data_descmtk()
    {
        $.ajax({
            url:"mtk_data_opr.php",
            method:"POST",
            /* Masukkan data yang diperlukan untuk di loaddatanya di loaddata.php*/
            data:{
                'idmatkul': '<?=$idmatkul?>',
                'key':'load_dsc',
                'mtk':'<?= $mtk ?>'
            },
            dataType:"json",
            error: function (xhr, status) {
                //set tidak ada isi jika error ATAU DATA = 0 (NULL) atau data tidak terbaca
                var html = '';
                $('#abody').html(html);
                //alert(JSON.stringify(xhr));
            },
            success:function(data)
            {
                var html = '';
                var count = 0;
                for(count; count < data.length; count++)
                {
                    html += '<tr>';
                    html += '<td>'+data[count].A+'</td>';
                    html += '<td>'+data[count].B+'</td>';
                    html += '<td>'+data[count].C+'</td>';
                    html += '<td>'+data[count].D+'</td></tr>';
                }
                
                //CEK DATA JSON (butuh JSON.stringify
                //alert(JSON.stringify(data));
                
                //Masukkan koda tadi ke <tbody> yang ada di html
                $('#abody').html(html);
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

        fetch_data_nilaimtk(id);
    });
    
    //JALANKAN FUNGSI fetch_data
    fetch_data_nilaimtk();
    fetch_data_descmtk();
    
    $(document).on('click', '.check_box', function(){
        var html = '';
        if(this.checked)
        {
            html = '<td><input type="checkbox" no="'+$(this).attr('no')+'" nim="'+$(this).attr('nim')+'" namafull="'+$(this).attr('namafull')+'" tanggal_nilai="'+$(this).attr('tanggal_nilai')+'" nilai="'+$(this).attr('nilai')+'" class="check_box" checked /></td>';
            html += '<td>'+$(this).attr("no")+'</td>';
            html += '<td>'+$(this).attr("nim")+'<input type="hidden" name="nim[]" class="form-control" value="'+$(this).attr("nim")+'" readonly/></td>';
            html += '<td>'+$(this).attr("namafull")+'</td>';
            html += '<td>'+$(this).attr("tanggal_nilai")+'</td>';
            html += '<td><select name="nilai[]" class="form-control" id="options'+$(this).attr('no')+'">\n\
                    <option value="A">A</option>\n\
                    <option value="B">B</option>\n\
                    <option value="C">C</option>\n\
                    <option value="D">D</option>\n\
                    <option value="">KOSONGKAN</option>\n\</select></td>';
        }
        else
        {
            html = '<td><input type="checkbox" no="'+$(this).attr('no')+'" nim="'+$(this).attr('nim')+'" namafull="'+$(this).attr('namafull')+'" tanggal_nilai="'+$(this).attr('tanggal_nilai')+'" nilai="'+$(this).attr('nilai')+'" class="check_box" /></td>';
            html += '<td>'+$(this).attr('no')+'</td>';
            html += '<td>'+$(this).attr('nim')+'</td>';
            html += '<td>'+$(this).attr('namafull')+'</td>';
            html += '<td>'+$(this).attr("tanggal_nilai")+'</td>';
            html += '<td>'+$(this).attr('nilai')+'</td>';
        }
        $(this).closest('tr').html(html);
        
        //SET option sesuai dengan database awal
        $("#options"+$(this).attr('no')).val($(this).attr('nilai'));
    });
    
    $('#update').on('click', function(event){
        event.preventDefault();
        
        //gunakan fungsi serializearray untuk auto add dengan push
        //Catatan : Serialize butuh form
        var serialize = $("#form_data").serializeArray();
        var page = $('#bp2').attr('data-id');
        serialize.push({name: 'idmatkul', value: '<?=$idmatkul?>'});
        serialize.push({name: 'key', value: 'update'});
        
        if($('.check_box:checked').length > 0)
        {
            $.ajax({
                url:"mtk_data_opr.php",
                method:"POST",
                data:$.param(serialize),
                success:function(data)
                {
                    fetch_data_nilaimtk(page-1);
                }
             })
        }
    });
    
    $('#delete').on('click', function(event){
        event.preventDefault();
        
        //gunakan fungsi serializearray untuk auto add dengan push
        //Catatan : Serialize butuh form
        var serialize = $("#form_data").serializeArray();
        var page = $('#bp2').attr('data-id');
        serialize.push({name: 'idmatkul', value: '<?=$idmatkul?>'});
        serialize.push({name: 'key', value: 'delete'});
        
        if($('.check_box:checked').length > 0)
        {
            $.ajax({
                url:"mtk_data_opr.php",
                method:"POST",
                data:$.param(serialize),
                success:function(data)
                {
                    fetch_data_nilaimtk(page-1);
                }
             })
        }
    });
        
    
})
</script>

