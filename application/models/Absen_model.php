<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_model extends CI_Model
{
    private $_table = "absen";

    public $absensi_id;
    public $karyawan_id;
    public $tanggal;
    public $absensi;
    
    
    public function rules()
    {
        return [
            ['field' => 'karyawan_id',
            'label' => 'Nama Karyawan',
            'rules' => 'required'],

            ['field' => 'mulai',
            'label' => 'Tanggal',
            'rules' => 'required']
            
           
        ];
    }

    public function getAll()
    {
        //return $this->db->get($this->_table)->result();
        return $this->db->query("SELECT absen.absensi_id, absen.karyawan_id, absen.tanggal, 
        absen.absensi as absn,karyawan.karyawan_id,karyawan.nama_lengkap as namakr, karyawan.tanggal_masuk,karyawan.pendidikan,
        karyawan.universitas,karyawan.ttl,karyawan.tgl_lahir,karyawan.id_card,karyawan.nama_ayah,
        karyawan.nama_ibu,karyawan.nama_ss,karyawan.no_pasport,karyawan.no_bpjs,karyawan.no_npwp, 
        karyawan.alamat,karyawan.city, karyawan.state, 
        karyawan.zip,karyawan.alamat_now,karyawan.city_now, karyawan.state_now, karyawan.zip_now, karyawan.email_kantor, 
        karyawan.email_pribadi, karyawan.jenis_kelamin,karyawan.jabatan_id as kj,karyawan.cv,
        karyawan.kontrak_kerja,karyawan.image
        FROM absen,karyawan where absen.karyawan_id = karyawan.karyawan_id")->result();

    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["absensi_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->absensi_id = null;
        $this->karyawan_id = $post["karyawan_id"];
        $this->tanggal = $post["mulai"];        
        $this->absensi = $post["absen"];
        
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->absensi_id = $post["id"];
        $this->karyawan_id = $post["karyawan_id"];
        $this->tanggal = $post["mulai"];        
        $this->absensi = $post["absen"];
       
        
        $this->db->update($this->_table, $this, array('absensi_id' => $post['id']));
    }

    public function delete($id)
    {
		
        return $this->db->delete($this->_table, array("absensi_id" => $id));
	}
		
    public function get($id = null)
    {
        $this->db->from('absen');
        if($id != null) {
            $this->db->where('absensi_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function hitung_absen(){
        return $this->db->query("SELECT tanggal,absensi_id,karyawan_id,
        sum(absensi ='M') as masuk,sum(absensi ='S') as sakit,
        sum(absensi ='I') as ijin,sum(absensi ='A') as alpha,sum(absensi ='T') as tidak
        FROM absen GROUP by karyawan_id")->result();
    }

    public function hitung_absenn(){
        $date = $this->input->post('tgl',TRUE);
        $date = str_replace('/', '-', $date);
        $bulan = date('F', strtotime($date));
        $tahun = date('Y', strtotime($date));
        //die($bulan);
        return $this->db->query(" SELECT tanggal,absensi_id,karyawan_id, sum(absensi ='M') as masuk,
        sum(absensi ='S') as sakit, sum(absensi ='I') as ijin,sum(absensi ='A') as alpha,
        sum(absensi ='T') as tidak FROM absen where 
        monthname(STR_TO_DATE(absen.tanggal,'%d-%m-%Y'))='$bulan' 
        AND year(STR_TO_DATE(absen.tanggal,'%d-%m-%Y'))='$tahun' group BY karyawan_id")->result();
    }
    
    
}
