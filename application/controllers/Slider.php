<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');
    }

    public function get_slider_images()
    {
        // Panggil model untuk mengambil data gambar dari database
        $this->load->model('Slider_model');
        $images = $this->Slider_model->get_slider_images();

        // Keluarkan data dalam format JSON
        echo json_encode($images);
    }
}
