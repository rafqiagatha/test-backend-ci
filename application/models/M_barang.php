<?php

class M_barang extends CI_Model {

	function get_barang()
    {
    $sql = "SELECT * 
			FROM barang b
			LEFT JOIN user u ON u.ID_USER = b.ID_USER
			ORDER BY b.ID_BARANG ASC";
        $query = $this->db->query($sql);
        return $query->result();  
    } 
  
    public function insert_db_barang($data)
    {
        $this->db->insert('barang',$data);
    }
  

    function get_barangid($id)
    {
      $query  =   $this->db->where('ID_BARANG', $id);
      $query  =   $this->db->get('barang');
      return $query->row();
    }

    function update_barang($param,$id)
    {
        $this->db->where('ID_BARANG',$id);
        $this->db->update('barang',$param);
        if($this->db->affected_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    function delete_barang($id)
    {
        $this->db->delete('barang',array('ID_BARANG' =>$id ));
        return;
    }
}
