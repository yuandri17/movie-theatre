<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Studio_model extends CI_Model
{
    private $_table = "tbl_studio";

    public $id_studio;
    public $nama_studio;

    public function rules()
    {
        return [
            ['field' => 'nama_studio',
            'label' => 'Nama Studio',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_studio" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_studio = $post["nama_studio"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_studio = $post["id"];
        $this->nama_studio = $post["nama_studio"];
        $this->db->update($this->_table, $this, array('id_studio' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_studio" => $id));
    }
}