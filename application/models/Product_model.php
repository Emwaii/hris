<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "products";

    public $product_id;
    public $name;
    public $price;
    public $mulai;
    public $selesai;
    public $image = "default.jpg";
    public $description;
    public $client_id;
    
    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],
            
            ['field' => 'client_id',
            'label' => 'Client',
            'rules' => 'required'],

            ['field' => 'price',
            'label' => 'Price',
            'rules' => 'numeric'],
            
            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required'],
            
            ['field' => 'mulai',
            'label' => 'Date Started',
            'rules' => 'required'],

            ['field' => 'selesai',
            'label' => 'Date Ended',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        //return $this->db->get($this->_table)->result();
        return $this->db->query("SELECT products.product_id, products.name, products.price, 
        products.mulai, products.selesai, products.image as pim, products.description, products.client_id as pci, client.client_id as cci,
        client.id_card, client.nama, client.no_telp, client.email, client.perusahaan, client.alamat, client.image
        FROM products,client where products.client_id = client.client_id")->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->product_id = uniqid();
        $this->name = $post["name"];
        $this->price = $post["price"];
        $this->mulai= $post["mulai"];
        $this->selesai = $post["selesai"];
        $this->image = $this->_uploadImage();
        $this->description = $post["description"];
        $this->client_id = $post["client_id"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->name = $post["name"];
        $this->price = $post["price"];
        $this->mulai = $post["mulai"];
        $this->selesai = $post["selesai"];
		
		if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
		}

        $this->description = $post["description"];
        $this->client_id = $post["client_id"];
        $this->db->update($this->_table, $this, array('product_id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("product_id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/file/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->product_id;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$product = $this->getById($id);
		if ($product->image != "default.jpg") {
			$filename = explode(".", $product->image)[0];
			return array_map('unlink', glob(FCPATH."upload/file/$filename.*"));
		}
	}

    public function get($id = null)
    {
        $this->db->from('products');
        if($id != null) {
            $this->db->where('product_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
