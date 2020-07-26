<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
    }
    
    public function changePassAction(){
        $this->load->model('users');

        $data = $this->input->post(null, TRUE);
        $data['username'] = $this->session->userdata['username'];

		if(isset($data['changePassword'])){
			$result = $this->users->changePassword($data);
			if($result != 0){
                //berhasil
				echo "<script>
				alert('Selamat, ganti password sukses');
				window.location='".site_url('dashboard')."';
				</script>";
			}
            else{
                //gagal
				echo "<script>
				alert('Maaf, password lama salah');
				window.location='".site_url('auth/manage/changePassword')."';
				</script>";
            }
		}
    }

    public function changePassword(){
        $this->template->load('template', 'manage/changePassword', 'Change Password');
    }
}
