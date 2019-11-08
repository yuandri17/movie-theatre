<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Film extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("film_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["film"] = $this->film_model->getAll();
        $this->load->view("film/list_film", $data);
    }

    public function add()
    {
        $film = $this->film_model;
        $validation = $this->form_validation;
        $validation->set_rules($film->rules());

        if ($validation->run()) {
            $film->save();
            $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
        }

        $this->load->view("film/new_form");
    }

    public function edit($id=null)
    {
        if (!isset($id)) redirect('film');

        // $film = $this->film_model;
        $validation = $this->form_validation;
        $validation->set_rules($this->film_model->rules());

        if ($validation->run()) {
            $this->film_model->update();
            $this->session->set_flashdata('success', 'Berhasil Disimpan');
        }

        $data["film"] = $this->film_model->getById($id);
        if (!$data["film"]) show_404();
        
        $this->load->view("film/edit_form.php", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->film_model->delete($id)) {
            redirect(site_url('film'));
        }
    }
}