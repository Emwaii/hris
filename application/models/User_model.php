<?php

class User_model extends CI_Model
{
    private $_table = "users";

    
    public $user_id;
    public $username;
    public $phone;
    public $photo;
    public $full_name;
    public $password;
    public $email;
    public $role;
    public $last_login;
    public $created_at;
    //public $is_active;


    public function rules()
    {
        return [
            ['field' => 'full_name',
            'label' => 'Name',
            'rules' => 'required'],
			
            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[3]'],
            
            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["user_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->user_id = $post["user_id"];
        $this->username = $post["username"];
        $this->full_name = $post["full_name"];
        $this->email = $post["email"];
        // $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->password = sha1($post["password"]);
        $this->role = $post["role"];
        $this->phone = $post["phone"];
        $this->photo = $this->_uploadImage();
        // $this->is_active = $post["is_active"] ?? "1";
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->user_id = $post["id"];
        $this->full_name = $post["full_name"];
        $this->username = $post["username"];
        // $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->password = $post["password"];
        $this->email = $post["email"];
        $this->role = $post["role"];
        $this->phone = $post["phone"];
        //$this->created_at = $post["dibuat"];
        // $this->photo = $this->_uploadImage();

        if (!empty($_FILES["image"]["name"])) {
            $this->photo = $this->_uploadImage();
        } else {
            $this->photo = $post["old_image"];
        }
        
        // $this->is_active = $post["is_active"] ?? "1";

        $this->db->update($this->_table, $this, array('user_id' => $post['id']));
    }

//     public function login($post){
// 		//$post = $this->input->post();
//         $this->db->select('*');
//         $this->db->from('users');
//         $this->db->where('email', $post["username"])
//                 ->or_where('username', $post["username"]);
//         $user = $this->db->get();
//         return $user;
        
//         //if($user){
//             $isPasswordTrue = password_verify($post["password"], $user->password);
//             //$isAdmin = $user->role == "admin";
//             if($isPasswordTrue){  //&& $isAdmin 
//                 //$this->session->set_userdata(['user_logged' => $user]);
//                 $this->_updateLastLogin($user->user_id);
//                 return true;
//             }
// //}
		
//     }

    public function isNotLogin(){
        return $this->session->userdata('user_id') === null;
    }

    private function _updateLastLogin($user_id){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }

    private function _uploadImage()
	{
		$config['upload_path']          = './upload/user/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->full_name;
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
		$user = $this->getById($id);
		if ($user->photo != "default.jpg") {
			$filename = explode(".", $user->photo)[0];
			return array_map('unlink', glob(FCPATH."upload/user/$filename.*"));
		}
	}
    
    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("user_id" => $id));
    }
    
    public function get($id = null)
    {
        $this->db->from('users');
        if($id != null) {
            // $this->db->select('username');
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function login($post) {
        
        $this->db->select('*');
        $this->db->from('users');
        //$correctpass = password_verify($post["password"], $user->password);
        $this->db->where('username', $post['username']); 
        
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function updateprofile()
    {
        $post = $this->input->post();
        $this->user_id = $post["id"];
        $this->full_name = $post["full_name"];
        $this->username = $post["username"];
        // $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->password = $post["password"];
        $this->email = $post["email"];
        $this->role = $post["role"];
        $this->phone = $post["phone"];
        //$this->created_at = $post["dibuat"];
        // $this->photo = $this->_uploadImage();

        if (!empty($_FILES["image"]["name"])) {
            $this->photo = $this->_uploadImage();
        } else {
            $this->photo = $post["old_image"];
        }
        
        // $this->is_active = $post["is_active"] ?? "1";

        $this->db->update($this->_table, $this, array('user_id' => $post['id']));
    }

    public function register()
    {
        $post = $this->input->post();
        // $this->user_id = $post["user_id"];
        $this->username = $post["username"];
        $this->full_name = $post["full_name"];
        $this->email = $post["email"];
        // $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        $this->password = sha1($post["password"]);
        $this->role = $post["role"];
        // $this->phone = $post["phone"];
        $this->photo = $this->_uploadImage();
        // $this->is_active = $post["is_active"] ?? "1";
        $this->db->insert($this->_table, $this);
    }

}
