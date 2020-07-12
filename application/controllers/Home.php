<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['judul'] = "Paud Melati - Jombang";
        $this->load->view('index', $data);
    }
}
