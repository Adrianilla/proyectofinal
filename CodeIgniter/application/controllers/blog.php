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
        public function entry(){
        login_site();
        $this->load->view('new_entry');
         } 
         public function insert_entry(){
        login_site();
        $entry = array(
                'permalink'  => permalink($this->input->post('title')),
                'author' => $this->session->userdata('username'),
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'date' => date('Y-m-d H:i:s'),
                'tags' => $this->input->post('tags')
                );             
        $this->blog_model->insert('entries', $entry);
        redirect(base_url());
            }

          public function view(){
        $entry_id = $this->uri->segment(3);
        $data['entry'] = $this->blog_model->getEntry($entry_id);
        $data['comments'] = $this->blog_model->getComments($entry_id);
        $this->load->view('view_entry', $data);
}
     public function comment(){
        $id_blog = $this->input->post('id_blog');
        $comment = array(
                'id_blog' => $id_blog,
                'author' => $this->session->userdata('username'),
                'comment' => $this->input->post('comment'),
                'date' => date('Y-m-d H:i:s')
                );
        $this->blog_model->insert('comments', $comment);
        redirect(base_url().'blog/view/'.$id_blog);
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