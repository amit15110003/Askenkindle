<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Model
{
	function __construct()
    {
        parent::__construct();
        $this->tableName = 'user';
		$this->primaryKey = 'id';
    }
	
	function get_user($email,$pass)
	{
		$this->db->where('email',$email);
		$this->db->where('password',md5($pass));
        $query = $this->db->get('user');
        $data['modified'] = date("Y-m-d H:i:s");
        $this->db->where('email', $email);
		$update = $this->db->update('user',$data);
		return $query->result();
	}
        function get_userpass($email)
	{
		$this->db->where('email', $email);
              
                $query = $this->db->get('user');
		return $query->result();
	}
        function get_userdir($id,$pass)
	{
		$this->db->where('id', $id);
                  $this->db->where('password',$pass);
                $query = $this->db->get('user');
		return $query->result();
	}
	function get_profile($id)
	{
		$this->db->where('id', $id);
        $query = $this->db->get('user');
		return $query->result();
	}
        
        function get_id($oid)
	{
		$this->db->where('oauth_uid', $oid);
                $query = $this->db->get('user');
		return $query->result();
	}
	
	// get user
	function get_user_by_id($id)
	{
		$this->db->where('id', $id);
        $query = $this->db->get('user');
		return $query->result();
	}
	
	// insert
	function insert_user($data)
            {  $data['created'] = date("Y-m-d H:i:s");
		return $this->db->insert('user',$data);
	}

	function update($id, $fname, $lname, $contact)
    {	
    	$data = array('fname'=>$fname, 'lname'=>$lname, 'contact'=>$contact);
    	$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}

	function update_img($id,$profileimg)
        {	
    	$data = array('profileimg'=>$profileimg);
    	$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}
	function updatepass($id, $password)
        {	
    	$data = array('password'=>$password);
    	$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}


	public function checkUser($data = array())
	{
		$this->db->select($this->primaryKey);
		$this->db->from($this->tableName);
		$this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();
		
		if($prevCheck > 0)
		{
			$prevResult = $prevQuery->row_array();
			$data['modified'] = date("Y-m-d H:i:s");
			$update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
			$userID = $prevResult['id'];
		}
		else
		{
			$data['created'] = date("Y-m-d H:i:s");
			$data['modified'] = date("Y-m-d H:i:s");
			$insert = $this->db->insert($this->tableName,$data);
			$userID = $this->db->insert_id();
		}

		return $userID?$userID:FALSE;
    }

    public function showquestion()
	{	
		$this->db->order_by("Upper(id)","desc");
		$query=$this->db->get('question');
		
		return $query->result();
	
	}
	 public function showquestionc()
	{
		$this->db->where('sub', 'chemistry');
		$this->db->order_by("Upper(id)","desc");
		$query=$this->db->get('question');
		
		return $query->result();
	} 
	public function showquestionm()
	{ 
		$this->db->where('sub', 'mathematics');
		$this->db->order_by("Upper(id)","desc");
		$query=$this->db->get('question');
		
		return $query->result();
	} 
	public function showquestionp()
	{
		$this->db->where('sub', 'physics');
		$this->db->order_by("Upper(id)","desc");
		$query=$this->db->get('question');
		
		return $query->result();
	}
	function insert_question($data)
    {
    	return $this->db->insert('question', $data);
	}

	public function showquestion1($id)
	{
		$this->db->where('id', $id);
		$query=$this->db->get('question');
		
		return $query->result();
	}
        
        public function showquestionbyid($id)
	{
		$this->db->where('uid', $id);
		$query=$this->db->get('question');
		
		return $query->result();
	}
        
        public function deletequestion($id)
	{
		$this->db->where('id', $id);
                return ($this->db->delete('question'));
	}
        
	function insert_rply($data)
    {
    	return $this->db->insert('rply', $data);
	}
	public function showrply($id)
	{
		$this->db->where('qid', $id);
		$query=$this->db->get('rply');
		
		return $query->result();
	}
	
	function insert_view($id, $view)
	{
		$data1 = array('view'=>$view);
		$this->db->where('id', $id);
        return $this->db->update('question', $data1);
	}

	function countq()
	{
		$this->db->select_sum('id');
	    $this->db->from('question');

	    $total_q = $this->db->count_all_results();

	    if ($total_q > 0)
	    {
	        return $total_q;
	    }

	    return NULL;

	}

	function counta()
	{
		$this->db->select_sum('id');
	    $this->db->from('rply');

	    $total_a = $this->db->count_all_results();

	    if ($total_a > 0)
	    {
	        return $total_a;
	    }

	    return NULL;

	}
	function counta_id($id)
	{
		$this->db->select_sum('id');
	    $this->db->from('rply');
        $this->db->where('qid', $id);
	    $total_a = $this->db->count_all_results();

	    if ($total_a > 0)
	    {
	        return $total_a;
	    }

	    return NULL;

	}
        function insert_fed($data)
    {
		return $this->db->insert('fed', $data);
	}
	 public function promo($id)
	{
		$this->db->where('promo', $id);
		$query=$this->db->get('user');
		
		return $query->result();
	}
        

	

	
}?>