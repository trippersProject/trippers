<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('Main_mdl');
    }

	public function index()
	{
      $this->main();
	}

	public function main(){
		$data = array();
		
		//메인상단배너
		$data['mt_banners'] = $this->Main_mdl->get_banners('MT');
		//TODO:메인 하단배너(나중에 MB로 수정)
		$data['mb_banners'] = $this->Main_mdl->get_banners('MT');

		//상단 크리에이터 글목록
		//TODO: 카테고리 구분해서 가져오기
		$data['article_creator'] = $this->Main_mdl->get_article_list();
		//하단 우리동네 글목록
		$data['article_dongnae'] = $this->Main_mdl->get_article_list();


		$this->load->view('main.php',$data);
	}

	public function articleDetail() {
		$data = array();

		$this->load->view('articleDetail.php',$data);
	}

	public function aboutTripper() {
		$data = array();

		$this->load->view('aboutTripper.php',$data);
	}
}
