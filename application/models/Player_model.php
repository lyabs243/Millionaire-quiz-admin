<?php
/**
 * Created by PhpStorm.
 * User: lyabs
 * Date: 14/06/2020
 * Time: 10:27
 */

class Player_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}

	public function add_player($idAccount, $fullName, $urlProfilPic)
	{
		if (!$this->is_player_exist($idAccount)) {
			$data['id_account'] = $idAccount;
			$data['full_name'] = $fullName;
			$data['url_profil_pic'] = $urlProfilPic;
			$this->db->insert('player', $data);
			$id = $this->db->insert_id();
			return $id;
		}
		return 0;
	}

	function is_player_exist($idAccount)
	{
		$sql = 'SELECT * 
		FROM player q 
		WHERE id_account = ? ';

		$args = array($idAccount);

		$query = $this->db->query($sql, $args);
		$results = $query->result();

		foreach ($results as $result)
		{
			return true;
		}
		return false;
	}

}