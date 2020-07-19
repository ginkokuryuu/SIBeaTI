<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload extends CI_Controller {

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
        if($this->session->userdata('role') != "bendahara"){
            echo "<script>
				alert('Maaf anda bukan bendahara');
				window.location='".site_url('dashboard')."';
				</script>";
        }
		$this->template->load("dashboard/template", "upload/index", "Upload File Mutasi");
    }
    
    public function uploadAction(){
        $config = array(
            "upload_path" =>  FCPATH . "public/uploads/",
            "allowed_types" => 'csv'
        );

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $field = 'userfile'; // The name attribute of the file input control.
        $file_selected = isset($_FILES[$field]) && isset($_FILES[$field]['name']) && $_FILES[$field]['name'] != '';

        if($file_selected){
            if ( $this->upload->do_upload("userfile"))
            {
                echo "<script>
                    alert('upload berhasil');
                    window.location='".site_url('bendahara/edit/editAwal')."';
                    </script>";
            }
            else{
                $error = array('error' => $this->upload->display_errors());
                echo "<script>
                    alert('upload gagal');
                    window.location='".site_url('bendahara/upload/')."';
                    </script>";
            }
        }
        else{
            echo "<script>
                alert('file kosong');
                window.location='".site_url('bendahara/upload/')."';
                </script>";
        }
    }

    public function downloadFormat(){
        $fileLocation = base_url("public/files/contohFormat.csv");
        $file = file_get_contents($fileLocation);

        force_download("contohFormat.csv", $file);
    }
}
