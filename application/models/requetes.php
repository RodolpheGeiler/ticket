<?php
class requetes extends CI_Model{
	public function __construct() {
		parent::__construct();
	}

	public function form_insert($table, $data){
		$this->db->insert($table, $data);
	}

	public function get_all_where($table, $join, $statid){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($join, ''.$table.'.utilisateurs_id = '.$join.'.utilisateurs_id', 'left');
		$this->db->join('Reclamations', 'Tickets.reclamations_id = Reclamations.reclamations_id', 'left');
		$this->db->join('Clients', 'Reclamations.clients_id = Clients.clients_id', 'left');
		$this->db->join('Livraisons', 'Reclamations.commandes_id = Livraisons.commandes_id', 'left');
		$this->db->join('Transporteurs', 'Livraisons.transporteurs_id = Transporteurs.transporteurs_id', 'left');
		$this->db->where('tickets_status', $statid);
		if ($statid != '4') {
			$this->db->or_where('tickets_status', '2');
			$this->db->or_where('tickets_status', '3');
		}
		$query = $this->db->get();
		return $query->result();
	}


    public function get_last_reclamations(){
        $this->db->select('*');
        $this->db->join('Clients', 'Reclamations.clients_id = Clients.clients_id', 'left');
        $this->db->from('Reclamations', 5);
        $this->db->order_by("reclamations_date", "desc");
        $query = $this->db->get();
        return $query->result();
    }

	public function get_all_table($table){
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();
	}

	public function del_user($uid){
		$this->db->delete('Utilisateurs', array('utilisateurs_id' => $uid)); 
	}

	public function get_column($col, $table){
		$this->db->select($col);
		$query = $this->db->get($table);
		return $query->result();
	}

	public function get_count($type){
		$this->db->select('*');
		$this->db->from('Tickets');
		$this->db->where('tickets_type', $type);
		$query = $this->db->count_all_results();
		return $query;
	}


	public function get_column_where($col, $table, $where){
		$this->db->select($col);
		$this->db->where($where);
		$query = $this->db->get($table);
		return $query->result();
	}
	public function form_update($col, $table, $data, $tid){
		$this->db->where($col, $tid);
		$this->db->update($table, $data); 
	}

}
?>