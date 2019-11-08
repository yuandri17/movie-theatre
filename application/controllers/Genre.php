<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Genre extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("genre_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["genre"] = $this->genre_model->getAll();
        $this->load->view("genre/list_genre", $data);
    }

    public function add()
    {
        $genre = $this->genre_model;
        $validation = $this->form_validation;
        $validation->set_rules($genre->rules());

        if ($validation->run()) {
            $genre->save();
            $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
        }

        $this->load->view("genre/new_form");
    }

    public function edit($id=null)
    {
        if (!isset($id)) redirect('genre');
       
        // $film = $this->film_model;
        $validation = $this->form_validation;
        $validation->set_rules($this->genre_model->rules());

        if ($validation->run()) {
            $this->genre_model->update();
            $this->session->set_flashdata('success', 'Berhasil Disimpan');
        }

        $data["genre"] = $this->genre_model->getById($id);
        if (!$data["genre"]) show_404();
        
        $this->load->view("genre/edit_form.php", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->genre_model->delete($id)) {
            redirect(site_url('genre'));
        }
    }
}