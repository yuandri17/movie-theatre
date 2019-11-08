<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Genre_model extends CI_Model
{
    private $_table = "tbl_genre";

    public $id_genre;
    public $nama_genre;

    public function rules()
    {
        return [
            ['field' => 'nama_genre',
            'label' => 'Nama Genre',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_genre" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_genre = $post["nama_genre"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_genre = $post["id"];
        $this->nama_genre = $post["nama_genre"];
        $this->db->update($this->_table, $this, array('id_genre' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_genre" => $id));
    }
}