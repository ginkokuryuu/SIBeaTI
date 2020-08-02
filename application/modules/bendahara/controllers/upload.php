<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

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

        $this->load->model('temp_transaksi');

        $data = $this->temp_transaksi->getAll();

        $count = 0;

        foreach($data as $d){
            $count++;
        }

        if($count > 0){
            echo "<script>
                alert('anda memiliki data yang belum disimpan');
                window.location='".site_url('bendahara/edit/editAwal')."';
                </script>";
        }
        else{
            $this->template->load("dashboard/template", "upload/index", "Upload File Mutasi");
        }

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
                $this->load->library('csvreader');

                $csv = $this->csvreader->parse_csv(FCPATH . 'public/uploads/UploadMutasi.csv');

                $template = array('No','Tanggal','Deskripsi','Debit','Kredit','Periode');

                $keys = $csv['keys'];
                $datas = $csv['data'];

                $count = 1;
                $check = 0;

                for ($i=1; $i < count($keys); $i++) { 
                    if($template[$i] != $keys[$i]){
                        $check = 1;
                    }
                }

                if(count($keys) != 6){
                    $check = 1;
                }

                if($check == 0){
                    foreach($datas as $data){
                        if($data['Tanggal'] == ""){
                            $check = 2;
                            break;
                        }
                    }
    
                    if($check == 2){
                        echo "<script>
                            alert('isi kosong');
                            window.location='".site_url('bendahara/upload')."';
                            </script>";
                    }
                    else{
                        $this->load->model('temp_transaksi');
    
                        foreach($datas as $data){
                            $this->temp_transaksi->create($data);
                        }
                    }
                }
                else{
                    echo "<script>
                        alert('format tidak sama');
                        window.location='".site_url('bendahara/upload')."';
                        </script>";
                }

                

                unlink(FCPATH . 'public/uploads/UploadMutasi.csv');

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
        $fileLocation = base_url("public/files/UploadMutasi.csv");
        $file = file_get_contents($fileLocation);

        force_download("UploadMutasi.csv", $file);
    }
}
