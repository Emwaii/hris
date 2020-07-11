<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti_model extends CI_Model
{
    private $_table = "cuti";

    public $id;
    public $karyawan_id;
    public $tanggal;
    public $jenis_cuti;
    public $keterangan;
    
    
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
        return $this->db->query("SELECT cuti.id, cuti.karyawan_id, cuti.tanggal, 
        cuti.jenis_cuti as jc,cuti.keterangan,karyawan.karyawan_id,karyawan.nama_lengkap as namakr, karyawan.tanggal_masuk,karyawan.pendidikan,
        karyawan.universitas,karyawan.ttl,karyawan.tgl_lahir,karyawan.id_card,karyawan.nama_ayah,
        karyawan.nama_ibu,karyawan.nama_ss,karyawan.no_pasport,karyawan.no_bpjs,karyawan.no_npwp, 
        karyawan.alamat,karyawan.city, karyawan.state, 
        karyawan.zip,karyawan.alamat_now,karyawan.city_now, karyawan.state_now, karyawan.zip_now, karyawan.email_kantor, 
        karyawan.email_pribadi, karyawan.jenis_kelamin,karyawan.jabatan_id as kj,karyawan.cv,
        karyawan.kontrak_kerja,karyawan.image
        FROM cuti,karyawan where cuti.karyawan_id = karyawan.karyawan_id")->result();

    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = null;
        $this->karyawan_id = $post["karyawan_id"];
        $this->tanggal = $post["mulai"];        
        $this->jenis_cuti = $post["absen"];
        $this->keterangan = $post["keterangan"];
        
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->karyawan_id = $post["karyawan_id"];
        $this->tanggal = $post["mulai"];        
        $this->jenis_cuti = $post["absen"];
        $this->keterangan = $post["keterangan"];
        
       
        
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
		
        return $this->db->delete($this->_table, array("id" => $id));
	}
		
    public function get($id = null)
    {
        $this->db->from('cuti');
        if($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    // public function hitung_absen(){
    //     return $this->db->query("SELECT tanggal,absensi_id,karyawan_id,
    //     sum(absensi ='M') as masuk,sum(absensi ='S') as sakit,
    //     sum(absensi ='I') as ijin,sum(absensi ='A') as alpha,sum(absensi ='T') as tidak
    //     FROM absen GROUP by karyawan_id")->result();
    // }

    public function hitung_cuti(){
        $date = $this->input->post('tgl',TRUE);
        $date = str_replace('/', '-', $date);
        $bulan = date('F', strtotime($date));
        $tahun = date('Y', strtotime($date));
        //die($bulan);
        return $this->db->query(" SELECT tanggal,id,karyawan_id, sum(jenis_cuti ='tahunan') as tahunan,
        sum(jenis_cuti ='lembur') as lembur, sum(jenis_cuti ='lainnya') as lainnya FROM cuti where 
        monthname(STR_TO_DATE(cuti.tanggal,'%d-%m-%Y'))='$bulan' 
        AND year(STR_TO_DATE(cuti.tanggal,'%d-%m-%Y'))='$tahun' group BY karyawan_id")->result();
    }
    
    
}
