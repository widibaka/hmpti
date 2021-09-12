<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_event extends CI_model {

	public $table = "h_events";

// Start DATATABLE SERVER-SIDED
    
    var $column_order = array(NULL, 'judul','jadwal',NULL,NULL,'publish','author','last_update','limit_pendaftar'); //field yang ada di table
    var $column_search = array('judul','jadwal','publish','author','last_update','limit_pendaftar'); //field yang diizin untuk pencarian 
    var $order = array('jadwal' => 'desc'); // default order ... Diurutkan berdasarkan waktu terbaru
    
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
        
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
    
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
          // var_dump($_POST['order']); die();
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
    function get_datatables( )
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);

        $query = $this->db->get();
        return $query->result();
    }
    
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

// End DATATABLE SERVER-SIDED



    public function get_all()
    {
        $this->db->order_by( "jadwal", "DESC" );
        return $this->db->get($this->table);
    }
    public function get_10_event_terakhir()
    {
        $this->db->select( "id_event, judul" );
        $this->db->order_by( "jadwal", "DESC" );
        $this->db->limit( 10 );
        return $this->db->get($this->table);
    }

    public function search($wildcard)
    {
        //dipecah dulu
        $wildcard = explode(' ', $wildcard);

        $this->db->select( "id_event, thumbnail, judul" );

        $this->db->limit( 100 );

        $this->db->order_by( "jadwal", "DESC" );
        foreach ($wildcard as $key => $val) {
            $this->db->like( "judul", $val );
        }

        $this->db->where( 'publish', 1 );
        return $this->db->get($this->table);
    }
	public function get_upcoming()
	{
		$this->db->where( "publish", "1" );
		$this->db->order_by( "jadwal", "DESC" );
		$this->db->where( "jadwal >", time() );
		return $this->db->get($this->table);
	}
	public function get_lama()
	{
		$this->db->where( "publish", "1" );
		$this->db->limit(8);
		$this->db->order_by( "jadwal", "DESC" );
		$this->db->where( "jadwal <", time() );
		return $this->db->get($this->table);
	}
	public function get_single($id_event)
	{
		$this->db->where( "id_event", $id_event );
        $this->db->limit(1);
		return $this->db->get($this->table);
	}
	public function edit($post)
	{
		$this->db->where('id_event', $post['id_event']);
        $this->db->limit(1);
		$this->db->update($this->table, $post);
	}
	public function add($post)
	{
		$this->db->insert($this->table, $post);
	}
	// public function delete($id_proker)
	// {
	// 	$this->db->where('id_proker', $id_proker);
	// 	$this->db->delete($this->table);
	// }
}
