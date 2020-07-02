<?php namespace App\Models;
use CodeIgniter\Model;

class Pelanggan_model extends Model
{
    protected $table = "pelanggan";

    public function read_pelanggan($post)
    {
        $limit = $post['limit'];
        if (isset($data['page'])){ 
            $page  = $post['page']; 
        } 
        else{ 
            $page=1; 
        }  

        $start_from = ($page-1) * $limit;  
        
        $db      = \Config\Database::connect();
        $builder = $db->table('pelanggan');
        $query   = $builder->get($limit, $start_from);
        
        foreach($query->getResult() as $row)
        {
            $data[] = $row;
        }

        return json_encode($data);
    } 

    public function insert_pelanggan($post)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table("pelanggan");
        
        //TGL
        $hari = $post['hari'];
        $bulan = $post['bulan'];
        $tahun = $post['tahun'];
        
        $id = mt_rand(1000000000, 2100000000);
        
        $tgl = $tahun."-".$bulan."-".$hari;
        
        //EMAIL
        if(!empty($post['email'])){
            $email = $post['email'];
        }
        else{
            $email;
        }
        
        //susun arraynya kalau mau otomatis
        $data = [
            'ktp' => $post['ktp'],
            'id'  => $id,
            'nama' => $post['nama'],
            'jk'  => $post['jk'],
            'tgl'  => $tgl,
            'tlp'  => $post['tlp'],
            'email'  => $email,
            'verifikasi'  => '0'
        ];
        if($builder->insert($data)){
            return true;
        }
        else{
            return false;
        }
        
        //Kalau mau cek error query sql
        //print_r($this->db->error());
    }

    public function update_pelanggan($post)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table("pelanggan");
        
        $id = $post['id'];
        
        //TGL
        $hari = $post['hari'];
        $bulan = $post['bulan'];
        $tahun = $post['tahun'];
        
        $tgl = $tahun."-".$bulan."-".$hari;
        
        $data = [
            'ktp' => $post['ktp'],
            'nama' => $post['nama'],
            'jk'  => $post['jk'],
            'tgl'  => $tgl,
            'tlp'  => $post['tlp'],
            'email'  => $email
        ];
        
        $builder->where('id', $id);
        $builder->update($data);
        
        if($builder->update($data)){
            header('Content-type: application/json');
            $response_array['status'] = 'sukses';
            return json_encode($response_array);
        }
        else{
            header('Content-type: application/json');
            $response_array['status'] = 'gagal'; 
            echo json_encode($response_array);
        }
    }

    public function delete_pelanggan($post)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table("pelanggan");
        
        $ktp = $post['ktp'];
        
        $builder->where('ktp', $ktp);
        if($builder->delete()){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function verifikasi_pelanggan($post)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table("pelanggan");
        
        $ktp = $post['ktp'];
        $email = $post['email'];
        $tlp = $post['tlp'];
        
        $data = [
            'verifikasi' => 1
        ];
        
        $builder->where('ktp', $ktp);
        $sql_run = $builder->update($data);
        
        if($sql_run){
            //CEK EMAIL DAN KIRIM EMAIL
            if($email !== ""){
                //Email tolong di atur di app/Config/Email.php
                $email = \Config\Services::email();

                $email->setFrom('androrobot1234567890@gmail.com', 'Rumah Sakit Jogja');
                $email->setTo($email);
                $email->setCC('');
                $email->setBCC('');

                $email->setSubject('RUMAH SAKIT JOGJA (INFO VERIFIKASI)');
                $email->setMessage('Hallo, pelanggan rumah sakit jogja, data yang kamu kirim kemarin suah diverifikasi, '
                        . 'silahkan datang kerumah sakit jogja dan mengambil kartu rumah sakitnya');

                $email->send();
            }
            
            //KIRIM KE NO (SMS)
            //Catatan ; daftar ke hosting sms, mis zenvia.net
            
            //CEK NOHP DAN KIRIM SMS
            //HOST SMS MASIH BELUM ADA . . .
            //kalau diaktifkan bakalan 500 error
            /*if($tlp !== ""){

                //setingan ini ada di menu API Key zenziva anda
                $userkey ='abcdef';
                $passkey ='123456';

                //isi nomor tujuan
                $notujuan = $tlp;
                //isi pesan
                $isipesan ='Data kamu sudah verifikasi di rumah sakit jogja, silakan datang dan ambil kartumu.';
                
                $isi = urlencode($isipesan);
                $hp = str_replace('+62', '0', $notujuan);
                $hp = str_replace(' ', '', $hp);
                $hp = str_replace('.', '', $hp);
                $hp = str_replace(',', '', $hp);
                $ho = trim($hp);
                $url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkey&passkey=$passkey&nohp=$hp&pesan=$isi";
                $data = file_get_contents($url);
                if(eregi('success', $data)){
                    $hasil='1'; //terkirim
                }
                else{
                    $hasil='0'; //gagal . .. 
                }
            }*/
            
            return true;
        }
        else
        {
            return false;
        }
    }
}