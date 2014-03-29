<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model('blog_model');              
        }
       
        public function index(){
                $data['entries'] = $this->blog_model->getEntries();
                $this->load->view('show_entries', $data);
        }
        public function entry(){
                $this->load->view('new_entry');
        }
        public function insert_entry(){
                $entry = array(
                        'permalink' => permalink($this->input->post('title')),
                        'author' => 'anon',
                        'title' => $this->input->post('title'),
                        'content' => $this->input->post('content'),
                        'date' => date('Y-m-d H:i:s'),
                        'tags' => $this->input->post('tags')
                        );             
                $this->blog_model->insert('entries', $entry);
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