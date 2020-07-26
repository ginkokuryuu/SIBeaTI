<?php

class Users extends CI_Model{
    private $_table = "users";

    public $user_id;
    public $username;
    public $password;
    public $role;

    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],
			
            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[3]']
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

    public function save($data)
    {
        $this->username = $data["username"];
        $this->password = password_hash($data["password"], PASSWORD_DEFAULT);
        $this->role = $data["role"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->db->update($this->_table, $this, array('user_id' => $post['id']));
    }

    public function doLogin($data){
        $this->db->where('username', $data["username"]);
        $user = $this->db->get($this->_table)->row();

        $param = array();
        $param['status'] = false;

        if($user){
            $isPasswordTrue = password_verify($data["password"], $user->password);

            if($isPasswordTrue){
                $this->db->where('user_id', $user->user_id);
                $this->db->set('last_login', 'DATE_ADD(NOW(), INTERVAL 0 MINUTE)', FALSE);
                $this->db->update('users');
            }

            $param['status'] = $isPasswordTrue;
            $param['user_id'] = $user->user_id;
            $param['username'] = $user->username;
            $param['role'] = $user->role;
		}
		return $param;
    }

    public function isNotLogin(){
        return $this->session->has_userdata('username') === null;
    }

    public function changePassword($data){
        $this->db->where('username', $data["username"]);
        $user = $this->db->get($this->_table)->row();

        $isPasswordTrue = password_verify($data["old_password"], $user->password);
        if($isPasswordTrue){
            $this->password = password_hash($data["password"], PASSWORD_DEFAULT);
            $this->db->where('user_id', $user->user_id);
            $this->db->set('password', $this->password);
            return $this->db->update('users');
        }
        else{
            return 0;
        }
    }
}