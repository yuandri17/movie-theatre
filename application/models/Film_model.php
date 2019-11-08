<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Film_model extends CI_Model
{
    private $_table = "tbl_film";

    public $id_film;
    public $judul;
    public $id_genre;
    public $rumah_produksi;
    public $tahun_produksi;
    public $durasi;
    public $tanggal_mulai;
    public $tanggal_selesai;
    public $sinopsis;
    public $poster = "default.jpg";

    public function rules()
    {
        return [
            ['field' => 'judul',
            'label' => 'Judul',
            'rules' => 'required'],
            
            ['field' => 'genre',
            'label' => 'Genre',
            'rules' => 'required'],

            ['field' => 'rumah_produksi',
            'label' => 'Rumah Produksi',
            'rules' => 'required'],

            ['field' => 'tahun_produksi',
            'label' => 'Tahun Produksi',
            'rules' => 'required|numeric'],

            ['field' => 'durasi',
            'label' => 'Durasi',
            'rules' => 'required'],

            ['field' => 'tanggal_mulai',
            'label' => 'Tanggal Mulai',
            'rules' => 'required|date'],

            ['field' => 'tanggal_selesai',
            'label' => 'Tanggal Selesai',
            'rules' => 'required|date'],

            ['field' => 'sinopsis',
            'label' => 'Sinopsis',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->select('tbl_film.id_film, tbl_film.judul, tbl_genre.nama_genre, tbl_film.rumah_produksi, tbl_film.tahun_produksi, tbl_film.durasi, tbl_film.poster');
        $this->db->join('tbl_genre','tbl_film.id_genre=tbl_genre.id_genre');
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_film" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->judul = $post["judul"];
        $this->id_genre = $post["genre"];
        $this->rumah_produksi = $post["rumah_produksi"];
        $this->tahun_produksi = $post["tahun_produksi"];
        $this->durasi = $post["durasi"];
        $this->tanggal_mulai = $post["tanggal_mulai"];
        $this->tanggal_selesai = $post["tanggal_selesai"];
        $this->sinopsis = $post["sinopsis"];
        $this->poster = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_film = $post["id"];
        $this->judul = $post["judul"];
        $this->id_genre = $post["genre"];
        $this->rumah_produksi = $post["rumah_produksi"];
        $this->tahun_produksi = $post["tahun_produksi"];
        $this->durasi = $post["durasi"];
        $this->tanggal_mulai = $post["tanggal_mulai"];
        $this->tanggal_selesai = $post["tanggal_selesai"];
        $this->sinopsis = $post["sinopsis"];

        if (!empty($_FILES["image"]["name"])) {
            $this->poster = $this->_uploadImage();
        } else {
            $this->poster = $post["old_image"];
        }

        $this->db->update($this->_table, $this, array('id_film' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_film" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/film/';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']            = $this->judul;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        //print_r($this->upload->display_errors());
        return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $film = $this->getById($id);
        if ($film->poster != "default.jpg") {
            $filename = explode(".", $film->poster)[0];
            return array_map('unlink', glob(FCPATH."upload/film/$filename.*"));
        }
    }

    public function master_genre() {
        $this->db->order_by('id_genre');
        $sql_genre=$this->db->get('tbl_genre');
        if($sql_genre->num_rows()>0){
            return $sql_genre->result_array();
        }
    }
}