<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Studio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("studio_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["studio"] = $this->studio_model->getAll();
        $this->load->view("studio/list_studio", $data);
    }

    public function add()
    {
        $studio = $this->studio_model;
        $validation = $this->form_validation;
        $validation->set_rules($studio->rules());

        if ($validation->run()) {
            $studio->save();
            $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
        }

        $this->load->view("studio/new_form");
    }

    public function edit($id=null)
    {
        if (!isset($id)) redirect('studio');
       
        // $film = $this->film_model;
        $validation = $this->form_validation;
        $validation->set_rules($this->studio_model->rules());

        if ($validation->run()) {
            $this->studio_model->update();
            $this->session->set_flashdata('success', 'Berhasil Disimpan');
        }

        $data["studio"] = $this->studio_model->getById($id);
        if (!$data["studio"]) show_404();
        
        $this->load->view("studio/edit_form.php", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->studio_model->delete($id)) {
            redirect(site_url('studio'));
        }
    }
}