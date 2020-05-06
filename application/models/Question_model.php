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
		if(!$this->is_question_exist($question['description']))
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
			return true;
		}
		return false;
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

	public function update_question($id, $question)
	{
		$data = array(
			'description' => $question['description'],
			'level' => $question['level'],
		);
		$this->db->where('id', $id);
		$this->db->update('questions', $data);

		//update answers of question
		$answers = $question['answers'];
		foreach ($answers as $answer)
		{
			$this->update_answer($answer);
		}
	}

	public function update_answer($answer)
	{
		$data['description'] = $answer['description'];
		$data['is_valid_answer'] = $answer['is_valid_answer'];
		$this->db->where('id', $answer['id']);
		return $this->db->update('answer', $data);
	}

	public function delete_question($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('questions');
		$this->delete_answers($id);
		return $result;
	}

	//delete all answers of specific questions
	public function delete_answers($idQuestion)
	{
		$this->db->where('id_question', $idQuestion);
		$result = $this->db->delete('answer');
		return $result;
	}

	/**
	 * Get specific number of questions in a specific level
	 * for level=-1 it gets questions in any level
	 * @param $start
	 * @param $length
	 * @param int $level
	 */
	function get_questions($start, $length, $level=-1, $search='')
	{
		$sql = 'SELECT q.id, q.description, q.level, q.register_date, u.first_name, u.last_name 
		FROM questions q 
		JOIN users u 
		ON q.add_by =u.id ';
		$args = [];
		if(!empty($search))
		{
			$sql .= ' WHERE LOWER(description) LIKE ? ';
			$args[] = '%' . strtolower($search) . '%';
		}
		else if($level > -1)
		{
			$sql .= ' WHERE level = ? ';
			$args[] = $level;
		}
		$sql .= ' ORDER by register_date DESC ';

		//when searching data, there is no limit on result
		if(empty($search)) {
			$sql .= ' LIMIT ?, ? ';
			$args[] = $start;
			$args[] = $length;
		}

		$query = $this->db->query($sql, $args);
		return $query->result();
	}

	function is_question_exist($description)
	{
		$sql = 'SELECT * 
		FROM questions q 
		WHERE LOWER(description) = ? ';

		$args = array(strtolower($description));

		$query = $this->db->query($sql, $args);
		$results = $query->result();

		foreach ($results as $result)
		{
			return true;
		}
		return false;
	}

	function get_answers($idQuestion)
	{
		$sql = 'SELECT * 
		FROM answer a 
		WHERE id_question = ? ';
		$args = array($idQuestion);
		$query = $this->db->query($sql, $args);
		return $query->result();
	}

	function  total_questions($level=-1, $search='')
	{
		$total = 0;
		$sql = '
		SELECT COUNT(*) as total
		 FROM questions 
		 ';
		$args = array();
		if(!empty($search))
		{
			$sql .= ' WHERE LOWER(description) LIKE ? ';
			$args[] = '%' . strtolower($search) . '%';
		}
		else if($level > -1)
		{
			$sql .= ' WHERE level = ? ';
			$args[] = $level;
		}
		$query = $this->db->query($sql
			,$args);
		$results = $query->result();
		foreach ($results as $result)
		{
			$total = $result->total;
		}
		return $total;
	}

	public function generate_questions($level, $number)
	{
		$sql = '
		SELECT * FROM `questions` 
		WHERE level = ?
		ORDER by rand()
		LIMIT ?		
		 ';
		$args = array($level, $number);

		$query = $this->db->query($sql, $args);
		$results = $query->result_array();
		$questions = array();
		//for all questions add answers
		foreach ($results as $result)
		{
			$result['answers'] = $this->generate_answers($result['id']);
			$questions[] = $result;
		}
		return $questions;
	}

	public function generate_answers($idQuestion)
	{
		$sql = '
		SELECT * FROM `answer`
		 WHERE id_question = ? 
		 ORDER by rand() 
		 LIMIT 4
		';
		$args = array($idQuestion);

		$query = $this->db->query($sql, $args);
		$results = $query->result_array();
		return $results;
	}
}