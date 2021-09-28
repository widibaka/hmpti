<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pendaftar extends CI_model {

	public $table = "h_pendaftar";

// Start DATATABLE SERVER-SIDED
    
    var $column_order = array('email','nama', null, null, 'bintang', 'saran', 'status', 'waktu'); //field yang ada di table
    var $column_search = array('email','nama', 'status', 'waktu'); //field yang diizin untuk pencarian 
    var $order = array('waktu' => 'asc'); // default order
    
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
    
    function get_datatables( $id_event )
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);

    	$this->db->where('id_event', $id_event); // hanya ambil event tertentu

        $query = $this->db->get();
        return $query->result();
    }
    
    function count_filtered($id_event)
    {
        $this->_get_datatables_query();

    	$this->db->where('id_event', $id_event); // hanya ambil event tertentu

        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function count_all($id_event)
    {

    	$this->db->where('id_event', $id_event); // hanya ambil event tertentu
    	
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

// End DATATABLE SERVER-SIDED

    public function get_all()
    {
        return $this->db->get($this->table);
    }

    public function get_by_status($status,$id_event)
    {
        $this->db->order_by('id_pendaftar', 'asc');
        if ( $status != 'All' ) { //<-- kalau statusnya NULL, maka get semuanya
            $this->db->where('status', $status);
        }
        $this->db->where('id_event', $id_event);
        return $this->db->get($this->table);
    }

	public function get_by_id($id_pendaftar)
	{
		$this->db->where('id_pendaftar', $id_pendaftar);
        $this->db->limit(1);
		return $this->db->get($this->table);
	}

	public function verifikasi_sertifikat($id_pendaftar)
	{
		$this->db->where('id_pendaftar', $id_pendaftar);
		$this->db->select('id_pendaftar,nama,h_pendaftar.id_event,status,judul');
		$this->db->join('h_events', 'h_events.id_event = h_pendaftar.id_event');
        $this->db->limit(1);
		return $this->db->get($this->table);
	}

	public function check_exists($email, $id_event)
	{
		$this->db->where('email', $email);
		$this->db->where('id_event', $id_event);
        $this->db->limit(1);
		return $this->db->get($this->table);
	}
	public function pendaftar_event($id_event)
	{
		$this->db->where('id_event', $id_event);
		return $this->db->get($this->table);
	}
	public function jumlah_pendaftar_event($id_event)
	{
		$this->db->where('id_event', $id_event);
		return $this->db->get($this->table)->num_rows();
	}
    
	public function jumlah_seluruh_pendaftar()
	{
		return $this->db->get($this->table)->num_rows();
	}
	public function add($data)
	{
		if ( $this->check_exists($data['email'], $data['id_event'])->num_rows() == 0 ) {
			$this->db->insert($this->table, $data);
		}else{
			return 'sudah daftar';
		}
		
	}
    public function update_review($post, $id_pendaftar)
    {
        $this->db->where('id_pendaftar', $id_pendaftar);
        $this->db->update($this->table, $post);
    }
	public function delete($id_pendaftar)
	{
		$this->db->where('id_pendaftar', $id_pendaftar);
        $this->db->limit(1);
		$this->db->delete($this->table);
	}
    public function average_bintang($id_event)
    {
        $this->db->select('bintang');
        $this->db->where('id_event', $id_event);
        $this->db->where('bintang >', 0); //<-- ambil yang sudah direview oleh pendaftar
        
        $a = [];
        $d = $this->db->get( $this->table )->result_array();
        foreach ($d as $key => $val) {
            array_push($a, $val['bintang']);
        }
        
        if ( count($a) != 0 ) { //<-- hanya ketika ada yang mereview, kalau gak ada, return nol
            return array_sum($a) / count($a);
        }else{
            return 0;
        }
    }
    public function set_status($status, $id_pendaftar)
    {
        $this->db->where('id_pendaftar', $id_pendaftar);
        $data = [
            'status' => $status,
        ];
        return $this->db->update($this->table, $data);
    }
}