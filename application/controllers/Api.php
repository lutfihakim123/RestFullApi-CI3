<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use chriskacerguis\RestServer\RestController;
use \Firebase\JWT\JWT;
use \Firebase\JWT\ExpiredException;


class Api extends RestController  {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }
    
    public function siswa_get(){
        $this->db->select('*');        
        $data = array ('data'=>$this->db->get('siswa')->result());        
        $this->response($data, 200 );
    }
    public function siswa_post(){
        $isidata = array('nis'=>$this->input->post('nis'), 'namasiswa'=>$this->input->post('nama'));
        $this->db->insert('siswa', $isidata);
        $this->response(array("pesan"=>"berhasil"), 200);
    }    
    public function siswa_put(){                
        $isidata = array('namasiswa'=>$this->put('namasiswa'));
        $this->db->where(array('nis'=>$this->put('nis')));
        $this->db->Update('siswa', $isidata);        
        $this->response(array("pesan"=>"Ubah Data Berhasil"), 200);        
    }
    public function siswa_delete(){                        
        $this->db->where('nis', $this->delete('nis'));
        $this->db->delete('siswa');
        $this->response(array("pesan"=>"data berhasil dihapus"), 200);        
    }   
}
?>