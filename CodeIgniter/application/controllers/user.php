<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model('blog_model');
        }
        public function signin(){
                $this->load->view('signin');
        }
        public function signup(){
                $this->load->view('signup');
        }
        public function register(){
                $name = $this->input->post('name');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $user = array(
                        'name' => $name,
                        'username' => $username,
                        'password' => md5($password)
                        );
                if($this->blog_model->insert('users', $user)){
                        $session = array(
                                'name' => $name,
                                'username' => $username,
                                'is_logged_in' => TRUE,                        
                                );
                        $this->session->set_userdata($session);
                        redirect(base_url());
                }
        }
        public function validate(){            
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));
                if($user = $this->blog_model->validate_credentials($username, $password)){
                        $session = array(
                                'name' => $user->name,
                                'username' => $username,
                                'is_logged_in' => TRUE,                        
                                );
                        $this->session->set_userdata($session);
                        redirect(base_url());
                }
                else{
                        $this->load->view('signin', array('error'=>TRUE));
                }
        }
        public function logout(){
                if($this->session->userdata('is_logged_in'))
                        $this->session->sess_destroy();        
                redirect(base_url());                  
        }
}


class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function show($id,$name,$last_name)
	{
		$data ['user_id']=$id;
		$data ['name']=$name;
		$data ['last_name']=$last_name;
		$this->load->view('user_show',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */