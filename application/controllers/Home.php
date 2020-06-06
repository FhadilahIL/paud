<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        echo password_hash('orangtua',PASSWORD_DEFAULT);
        // $this->load->view('welcome_message');
    }
}
