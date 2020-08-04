<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Download extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','download'));				
	}
 
	public function index($fileName = NULL){
        $role = $this->session->userdata('role');		
        if ($fileName) {
            $file = realpath("uploads\berita") . "\\" . $fileName;
            // check file exists    
            if (file_exists($file)) {
                // get file content
                $data = file_get_contents($file);
                //force download
                force_download($fileName, $data);
                if ($role == 'mahasiswa'){
                    redirect(site_url('dashboard/role/' . $role));
                }
                elseif ($role == 'selektor'){
                    redirect(site_url('kelolaberita/berita'));
                }
            }
        }
	}
 
}
