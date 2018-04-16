<?php
/**
* 
*/
class News extends CI_Controller
{
	
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('News_model');
		$this->load->helper('url_helper');
	}
	public function index()
	{
		$data['news'] = $this->News_model->get_news();
		$data['title'] = 'News archive';

		$this->load->view('templates/header',$data);
		$this->load->view('news/index',$data);
		$this->load->view('templates/footer');
	}
	public function view($slug = null){
		$data['news_item'] = $this->News_model->get_news($slug);
		if(empty($data['news_item'])){
			show_404();
		}
		$data['title'] = $data['news_item']['title'];

		$this->load->view('templates/header',$data);
		$this->load->view('news/view',$data);
		$this->load->view('templates/footer');
	}
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = "Create a news item";

		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('text','Text','required');

		if($this->form_validation->run()===FALSE){
			$this->load->view('templates/header',$data);
			$this->load->view('news/create');
			$this->load->view('templates/footer');
		}
		else{
			$this->News_model->set_news();
			$this->load->view('news/success');
		}

	}
	public function success(){
		$data['title'] = "Success insert";
        $this->load->view('templates/header',$data);
		$this->load->view('news/success');
		$this->load->view('templates/footer');
	}
}