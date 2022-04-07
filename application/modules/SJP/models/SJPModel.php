<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SJPModel extends CI_Model
{
    public function GetByQRCode($data)
    {
        $serialisasi = strlen($this->input->post('qrcode')) > 16 ? substr($this->input->post('qrcode'), -12) : $this->input->post('qrcode');
        return $this->db->get_where('data_print', array('serialisasi' => $serialisasi))->row();
    }
}

/* End of file SJPModel.php */
