<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("jadwal_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["jadwal"] = $this->jadwal_model->getAll();
        $this->load->view("jadwal/list_jadwal", $data);
    }

    public function add()
    {
        $jadwal = $this->jadwal_model;
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules());

        if ($validation->run()) {
            $jadwal->save();
            $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
        }

        $this->load->view("jadwal/new_form");
    }

    public function edit($id=null)
    {
        if (!isset($id)) redirect('jadwal');
       
        // $jadwal = $this->jadwal_model;
        $validation = $this->form_validation;
        $validation->set_rules($this->jadwal_model->rules());

        if ($validation->run()) {
            $this->jadwal_model->update();
            $this->session->set_flashdata('success', 'Berhasil Disimpan');
        }

        $data["jadwal"] = $this->jadwal_model->getById($id);
        if (!$data["jadwal"]) show_404();
        
        $this->load->view("jadwal/edit_form.php", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->jadwal_model->delete($id)) {
            redirect(site_url('jadwal'));
        }
    }
}