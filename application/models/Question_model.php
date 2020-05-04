<?php
/**
 * Created by PhpStorm.
 * User: lyabs
 * Date: 03/05/2020
 * Time: 19:49
 */

class Question_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function add_question($idUser, $question)
	{
		$data['description'] = $question['description'];
		$data['level'] = $question['level'];
		$data['add_by'] = $idUser;
		$this->db->insert('questions', $data);
		$id = $this->db->insert_id();

		//insert allanswer for that questions
		$answers = $question['answers'];
		foreach ($answers as $answer)
		{
			$this->add_answer($idUser, $id, $answer);
		}
	}

	public function add_answer($idUser, $idQuestion, $answer)
	{
		$data['description'] = $answer['description'];
		$data['id_question'] = $idQuestion;
		$data['is_valid_answer'] = $answer['is_valid_answer'];
		$data['add_by'] = $idUser;
		$this->db->insert('answer', $data);
		$id = $this->db->insert_id();
	}

	/**
	 * Get specific number of questions in a specific level
	 * for level=-1 it gets questions in any level
	 * @param $start
	 * @param $length
	 * @param int $level
	 */
	function get_questions($start, $length, $level=-1)
	{
		$sql = 'SELECT * FROM questions ';
		$args = [];
		if($level > -1)
		{
			$sql .= ' $level = ? ';
			$args[] = $level;
		}
		$sql .= ' LIMIT ?, ? ';
		$args[] = $start;
		$args[] = $length;
		$query = $this->db->query($sql, $args);
		return $query->result();
	}

	function  total_questions($level)
	{
		$total = 0;
		$query = $this->db->query('
		SELECT COUNT(*) as total
		 FROM questions 
		 WHERE level = ?'
			,array($level));
		$results = $query->result();
		foreach ($results as $result)
		{
			$total = $result->total;
		}
		return $total;
	}
}