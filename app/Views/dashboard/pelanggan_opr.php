<?php
//   include('auth_database.php');

    /*
    //LOAD LIST PELANGGAN
    if(isset($_POST['key']) && $_POST['key'] == 'load'){
        $limit = $_POST['limit'];
        if (isset($_POST["page"])){ 
            $page  = $_POST["page"]; 
        } 
        else{ 
            $page=1; 
        }  

        $start_from = ($page-1) * $limit;  

        $query = "SELECT * FROM pelanggan limit $start_from,$limit";

        $sql_run = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($sql_run)){
            $data[] = $row;
        }

        //$data += array("cek"=>"HALOOOOO", "cek2"=>"heyaaaa");

        echo json_encode($data);
    }
    
    //DELETE DATA PELANGGAN
    if(isset($_POST['key']) && $_POST['key'] == 'delete'){
        $ktp = $_POST['ktp'];
        $query = "DELETE FROM `pelanggan` WHERE `pelanggan`.`ktp` = $ktp";
        $sql_run = mysqli_query($conn, $query);
    }
    
    //UPDATE DATA PELANGGAN
    if(isset($_POST['key']) && $_POST['key'] == 'update'){
        $nama = $_POST['nama'];
        $ktp = $_POST['ktp'];
        $id = $_POST['id'];
        
        //Tanggal lahir
        $hari = $_POST['hari'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $tgl = $tahun."-".$bulan."-".$hari;
        
        $tlp = $_POST['tlp'];
        $email = $_POST['email'];
        $jk = $_POST['jk'];
        
        
        //LAKUKAN PROSES UPDATE
        $query = "UPDATE `pelanggan` SET `ktp` = '$ktp', `nama` = '$nama', `jk` = '$jk', `tgl` = '$tgl', `tlp` = '$tlp', `email` = '$email' WHERE `pelanggan`.`id` = $id";
        $sql_run = mysqli_query($conn, $query);
        if($sql_run){
            header('Content-type: application/json');
            $response_array['status'] = 'sukses';
            echo json_encode($response_array);
        }
        else{
            header('Content-type: application/json');
            $response_array['status'] = 'gagal'; 
            echo json_encode($response_array);
        }
    }
    
    //FUNGSI VERIFIKASI
    if(isset($_POST['key']) && $_POST['key'] == 'ver'){
        $ktp = $_POST['ktp'];
        $email = $_POST['email'];
        $tlp = $_POST['tlp'];
        
        $query = "UPDATE `pelanggan` SET `verifikasi` = '1' WHERE `pelanggan`.`ktp` = $ktp;";
        $sql_run = mysqli_query($conn, $query);
        if($sql_run){
            //CEK EMAIL DAN KIRIM EMAIL
            if($email !== ""){
                // EMAIL BAKALAN TERKIRIM KALAU DI SETTING DULU
                $to = $email;
                $subject = "RUMAH SAKIT JOGJA (INFO VERIFIKASI)";
                $msg = "Hallo, pelanggan rumah sakit jogja, data yang kamu kirim kemarin suah diverifikasi, "
                        . "silahkan datang kerumah sakit jogja dan mengambil kartu rumah sakitnya,";
                $msg = wordwrap($msg,70);
                $headers = "From: androrobot1234567890@gmail.com";
                $mail_sent = mail($to, $subject, $msg, $headers);
            }
            
            //KIRIM KE NO (SMS)
            //Catatan ; daftar ke hosting sms, mis zenvia.net
            
            //CEK NOHP DAN KIRIM SMS
            if($tlp !== ""){
                
                //FUNGSI KIRIM SMS
                function KirimSMS($notujuan,$isipesan,$userkey,$passkey){
                    $isi = urlencode($isipesan);
                    $hp = str_replace('+62', '0', $notujuan);
                    $hp = str_replace(' ', '', $hp);
                    $hp = str_replace('.', '', $hp);
                    $hp = str_replace(',', '', $hp);
                    $ho = trim($hp);
                    $url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkey&passkey=$passkey&nohp=$hp&pesan=$isi";
                    $data = file_get_contents($url);
                        if(eregi('success', $data)){
                                $hasil='1';
                        }
                        else{
                                $hasil='0';
                        }
                    return $hasil;
                }

                //setingan ini ada di menu API Key zenziva anda
                $userkey ='abcdef';
                $passkey ='123456';

                //isi nomor tujuan
                $notujuan = $tlp;
                //isi pesan
                $isipesan ='Data kamu sudah verifikasi di rumah sakit jogja, silakan datang dan ambil kartumu.';

                //mengikirim sms
                $kirim=KirimSMS($notujuan,$isipesan,$userkey,$passkey);
                if($kirim == '1'){
                   echo 'Sukses';
                }else{
                   echo 'Gagal';
                }
            }
            
        }
    }*/

echo $_POST['abc'];

?>

