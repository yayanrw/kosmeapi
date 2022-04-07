<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class SJP extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SJPModel');
        $this->load->library('Helper');
    }

    public function qrcode_post()
    {
        try {
            // $this->helper->Authorize();
            $data = $this->input->post();
            $result = $this->SJPModel->GetByQRCode($data);
            $this->set_response(array(
                'status' => true,
                'message' => 'Success',
                'data' => $result
            ), REST_Controller::HTTP_OK);
        } catch (\Throwable $th) {
            $this->set_response([
                'status' => FALSE,
                'message' => $th->getMessage(),
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

/* End of file SJP.php */
