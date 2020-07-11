<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll_model extends CI_Model
{
    private $_table = "payroll";

    public $payroll_id;
    public $karyawan_id;
    
    public $tanggal;
    public $status;
    public $jumlah;
    
    public function rules()
    {
        return [
            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required']

            // ['field' => 'idc',
            // 'label' => 'ID Card',
            // 'rules' => 'required'],
            
            // ['field' => 'notlp',
            // 'label' => 'Phone Number',
            // 'rules' => 'required'],
            
            // ['field' => 'email',
            // 'label' => 'Email',
            // 'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->query("SELECT payroll.payroll_id,payroll.karyawan_id,payroll.tanggal,payroll.jumlah,payroll.status,
        karyawan.karyawan_id,karyawan.nama_lengkap as namakr, karyawan.tanggal_masuk,karyawan.pendidikan,
        karyawan.universitas,karyawan.ttl,karyawan.tgl_lahir,karyawan.id_card,karyawan.nama_ayah,
        karyawan.nama_ibu,karyawan.nama_ss,karyawan.no_pasport,karyawan.no_bpjs,karyawan.no_npwp, 
        karyawan.alamat,karyawan.city, karyawan.state, 
        karyawan.zip,karyawan.alamat_now,karyawan.city_now, karyawan.state_now, karyawan.zip_now, karyawan.email_kantor, 
        karyawan.email_pribadi, karyawan.jenis_kelamin,karyawan.jabatan_id as kj,karyawan.cv,
        karyawan.kontrak_kerja,karyawan.image
        FROM payroll,karyawan where payroll.karyawan_id = karyawan.karyawan_id")->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["payroll_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->payroll_id = $post["idgaji"];
        $this->karyawan_id = $post["idkar"];
        $this->tanggal = $post["tanggal"];
        $this->status= $post["status"];
        $this->jumlah = $post["gaji"];
       
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->payroll_id = $post["id"];
        $this->karyawan_id = $post["karyawan_id"];
        $this->tanggal = $post["tanggal"];
        $this->status= $post["status"];
        $this->jumlah = $post["gajiakhir"];
        $this->pembayaran = $post["pembayaran"];
        
        $this->db->update($this->_table, $this, array('payroll_id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("payroll_id" => $id));
	}
	
    public function get($id = null)
    {
        $this->db->from('payroll');
        if($id != null) {
            $this->db->where('payroll_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

  
}
