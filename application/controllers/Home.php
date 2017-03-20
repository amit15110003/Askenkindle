<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

		public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'html','text','typography'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('user');
	}

	public function index()
	{	
		$detail1=$this->user->countq();
		$content_per_page = 5; 
		$details['query']=$this->user->showquestion();
		$this->load->view('index',$details);
	}
        
        
        public function question()
	{
          
                
        $this->form_validation->set_rules('quest','quest','required');  
		if ($this->form_validation->run() == FALSE)
        {
			redirect('home');
		}
		else
		{
		if ($this->session->userdata('fname')) {
                
                if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = 'uploads';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|JPG|doc|docx';
                $config['file_name'] = "quest";
                $config['max_size']= 1000000;
                $config['max_width'] = 6048;
                $config['max_height']= 6048;
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture'))
                {
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }
                 else{
                    $picture = '';
                }}
                 else{
                 	$this->session->set_flashdata('msg','<div >Maximum File Size 3mb</div>');
                    $picture = '';
                }
            
		$data = array(

				'quest' =>$this->input->post('quest'),
				'sub' => $this->input->post('sub'),
				'uid' => $this->session->userdata('uid'),
				'picture' => $picture
			);
		$data = $this->security->xss_clean($data);
		if($this->user->insert_question($data))
		{
			$this->session->set_flashdata('msg','<div > Successfully Updated</div>');
				redirect('home');
			}
			else
			{
				// error
				$this->session->set_flashdata('msg','<div >Oops! Error.  Something Went Wrong</div>');
				redirect('home');
			}
		}
		
		else{
			$this->session->set_flashdata('msg','<div >Login First!!</div>');
			redirect('home');
		}

		}
	
	}

	public function answer($qid)
	{	
		
     	$this->form_validation->set_rules('qid', 'qid', 'required');
		$this->form_validation->set_rules('rply', 'rply', 'required');   
		if ($this->form_validation->run() == FALSE)
        {
			$details=$this->user->showquestion1($qid);
			$data['query']=$this->user->showrply($qid);
     	if (!empty($details)){
        	$data['id'] = $details[0]->id;
        	$data['uid'] = $details[0]->uid;
        	$data['quest'] = $details[0]->quest;
        	$data['picture'] = $details[0]->picture;
        	$data['view'] = $details[0]->view;
        	$sess_data = array('qid' => $details[0]->id);

				$this->session->set_userdata($sess_data);
			
				
				$id = $data['id'];
				$view = $data['view']+1;

				$result=$this->user->insert_view($id,$view);
        }
        else {
				$data['id'] = '';
				$data['uid'] = '';
                                $data['quest'] = '';



			}

		$this->load->view('answer',$data);
		
		}
                else{
                
                if ($this->session->userdata('uid') >0) {
               if(!empty($_FILES['picture']['name'])){
		 		$config['upload_path'] = 'uploads';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|JPG|doc|docx';
                $config['file_name'] = "answer";
                $config['max_size']= 1000000;
                $config['max_width'] = 6048;
                $config['max_height']= 6048;
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture'))
                {
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }
                else{
                    $picture = '';
                }}
                else{
                    $picture = '';
                }
                  $data = array(
				
				'qid' => $this->input->post('qid'),
				'uid' =>  $this->session->userdata('uid'),
				'rply' => $this->input->post('rply'),
				'picture' => $picture);

			
		if($this->user->insert_rply($data)){
			$this->session->set_flashdata('msg','<div > Successfully Updated</div>');
			$qid=$this->session->userdata('qid');
				redirect('home/answer/'. $qid);
			}
			else{
				// error
				$this->session->set_flashdata('msg','<div >Oops! Error.  Something Went Wrong</div>');
				$qid=$this->session->userdata('qid');
				redirect('home/answer/'. $qid);
                            }
		}else{
			$this->session->set_flashdata('msg','<div >Login First!!</div>');
			$qid=$this->session->userdata('qid');
			redirect('home/answer/'. $qid);
		}

		}
	
		
	}

	public function math()
	{
				
        	$details['query']=$this->user->showquestionm();
     		
		$this->load->view('header');
		$this->load->view('math',$details);
		$this->load->view('footer');
		
		
	
	}

	public function chem()
	{
				
        	$details['query']=$this->user->showquestionc();
     		
		$this->load->view('header');
		$this->load->view('chem',$details);
		$this->load->view('footer');
		
		
	
	}

	public function phy()
	{
				
        	$details['query']=$this->user->showquestionp();
     		
		$this->load->view('header');
		$this->load->view('phy',$details);
		$this->load->view('footer');
		
		
	
	}
        
        public function fed()
	{
		
		$this->form_validation->set_rules('fed', 'fed', 'required');
			

			if ($this->form_validation->run() == FALSE)
        {
        	$this->load->view('header');
			$this->load->view('fed');
			$this->load->view('footer');
        }
		else
		{
			$data = array(
				'uid' => $this->input->post('uid'),
				'fed' => $this->input->post('fed')
			);
		if ($this->user->insert_fed($data))
			{
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Successfully Updated</div>');
				redirect('home/');
			}
			else
			{
				// error
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Something Went Wrong</div>');
				redirect('home/fed');
			}
		}
	}
	
        public function asked()
	{
			$details['query']=$this->user->showquestionbyid($this->session->userdata('uid'));
			$this->load->view('header');
			$this->load->view('asked',$details);
			$this->load->view('footer');
       
	}
        
        public function Deletequestion($id)
	{
			
		$details['query']=$this->user->showquestionbyid($this->session->userdata('uid'));
			$this->load->view('header');
			$this->load->view('asked',$details);
			$this->load->view('footer');
	  
	  echo "<script>
	 x = confirm ('You want to proceed deleting?')";
	 
	  $r=$this->user->deletequestion($id);
	  if($r){
          echo "Successfully Deleted Data";
	  }
	  else {
          echo "Can Not Delete Data";
	  }
	 redirect('home');
	}
	
	public function share()
	{			
				$name=$this->session->userdata('fname');
				$id=$this->session->userdata('uid');
				$promo=$name.'_'.$id;
				echo "$this->session->userdata('fname'); ";
        	$details['query']=$this->user->promo($promo);
     		
		$this->load->view('header');
		$this->load->view('share',$details);
		$this->load->view('footer');
		
		
	
	}
	function logout()
	{
		// destroy session
        $data = array('login' => '', 'uname' => '', 'uid' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect('');
	}
}
