<?php
class forget extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session', 'form_validation','encryption','encrypt'));
                $this->load->library('encryption');
                $this->load->library('encrypt');
		$this->load->database();
		$this->load->model('user');
	}

public function index(){
        
        $email = $this->input->post("email");
        $this->form_validation->set_rules("email", "Email-ID", "trim|required");
        if ($this->form_validation->run() == FALSE)
        {
			// validation fail
			$this->load->view('header');
                        $this->load->view('forget');
                        $this->load->view('footer');
	}
        else
		{
			// check for user credentials
			$uresult = $this->user->get_userpass($email);
			if (count($uresult) > 0)
			{
                                 $stdpass =  $uresult[0]->password;
                                  $id =  $uresult[0]->id;//FETCHING PASS
                               $plaintext_string = $this->encrypt->decode($stdpass);
                                $key = 'md5';
                                
                                $encrypted_string = $this->encrypt->decode($stdpass, $key);
                                    

                                //echo "your pass is ::".($pass)."";
                        
                                $to = $uresult[0]->email;
                        
                                //echo "your email is ::".$email;
                        
                                //Details for sending E-mail
                        
                         
                                $from = "support@enkindle.co.in";
                                $url = "mail.enkindle.co.in";      $body  =  " recover your password
                        
                                
                        
                               
                                <br>
                                hi : $to;
                        
                                Here is your Link :  <br>
                                <a href='http://www.enkindle.co.in/ask/index.php/forget/recover/$id/$stdpass' style=' background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;'>Recover Link</a><br>
                                
                                Sincerely,<br>
                                
                        
                                support@enkindle.co.in";
                        
                                $from = "support@enkindle.co.in";
                        
                                $subject = "enkindle Password recovered";
                        
                                $headers1 = "From: $from\n";
                        
                                $headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
                        
                                $headers1 .= "X-Priority: 1\r\n";
                        
                                $headers1 .= "X-MSMail-Priority: High\r\n";
                        
                                $headers1 .= "X-Mailer: Just My Server\r\n";
                        
                                $sentmail = mail ( $to, $subject, $body, $headers1 );
				
				$this->session->set_flashdata('msg', '<div class="alert  text-center">Recovery Link will be sent to your email.</div>');
				redirect('login/index');
				
			}
			else
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Email-ID </div>');
				redirect('login/index');
			}
		}
		
		
    }
    
    public function recover($id,$stdpass)
    {
			// check for user credentials
			$uresult = $this->user->get_userdir($id,$stdpass);
			if (count($uresult) > 0)
			{
				// set session
				$sess_data = array('login' => TRUE, 'fname' => $uresult[0]->fname,'lname' => $uresult[0]->lname, 'uid' => $uresult[0]->id,'email'=> $uresult[0]->email,'contact'=> $uresult[0]->contact);

				$this->session->set_userdata($sess_data);
				
				redirect('home');
				
			}
			else
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Email-ID or Password!</div>');
				redirect('login');
			}
		
    }
	

   
}