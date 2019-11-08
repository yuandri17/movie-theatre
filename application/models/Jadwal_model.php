<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
    private $_table = "tbl_jadwal";

    public $id_jadwal;
    public $id_film;
    public $id_studio;
    public $tanggal_tayang;
    public $jam_tayang;

    public function rules()
    {
        return [
            ['field' => 'judul',
            'label' => 'Judul',
            'rules' => 'required'],
            
            ['field' => 'tanggal_tayang',
            'label' => 'Tanggal Tayang',
            'rules' => 'required|date'],

            ['field' => 'jam_tayang',
            'label' => 'Jam Tayang',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->select('tbl_jadwal.id_jadwal, tbl_film.judul, tbl_studio.nama_studio, tbl_jadwal.tanggal_tayang, tbl_jadwal.jam_tayang');
        $this->db->join('tbl_film','tbl_jadwal.id_film=tbl_film.id_film');
        $this->db->join('tbl_studio','tbl_jadwal.id_studio=tbl_studio.id_studio');
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_jadwal" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_film = $post["judul"];
        $this->id_studio = $post["studio"];
        $this->tanggal_tayang = $post["tanggal_tayang"];
        $this->jam_tayang = $post["jam_tayang"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_jadwal = $post["id"];
        $this->id_film = $post["judul"];
        $this->id_studio = $post["studio"];
        $this->tanggal_tayang = $post["tanggal_tayang"];
        $this->jam_tayang = $post["jam_tayang"];
        $this->db->update($this->_table, $this, array('id_jadwal' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_jadwal" => $id));
    }

    public function master_film() {
        $this->db->order_by('id_film');
        $sql_film=$this->db->get('tbl_film');
        // if($sql_genre->num_rows()>0){
        //     return $sql_genre->result_array();
        // }
        return $sql_film->result();
    }

    public function master_studio() {
        $this->db->order_by('id_studio');
        $sql_studio=$this->db->get('tbl_studio');
        // if($sql_genre->num_rows()>0){
        //     return $sql_genre->result_array();
        // }
        return $sql_studio->result();
    }
}