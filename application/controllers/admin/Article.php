<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	public function __construct() {
        parent::__construct();

		$this->load->helper('url');
        $this->load->library('form_validation');

        $this->load->model('admin/Article_mdl', 'article_mdl');
    }

	public function index()
	{
      $this->list();
	}

	public function list()
	{	
		$data = array();
		
		//글목록
		$data['list'] = $this->article_mdl->get_article_list();

		$this->load->view('admin/layout/header.php');
		$this->load->view('admin/article_list.php', $data);
	}

	//작성글 저장
	public function apply_article()
	{	
		$title = $this->input->post('title', TRUE);
		$content = $this->input->post('content', FALSE);  // XSS 필터링하지 않음
		$category = $this->input->post('category', TRUE);
		$category_sub = $this->input->post('category_sub', TRUE);
	}

	//본문 첨부 이미지 저장
	public function upload_image() {
        if ($_FILES['file']['name']) {
            $config['upload_path'] =  "images/article/";
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name']     = $this->generate_unique_filename(); // 파일명 생성 함수 호출
            $config['overwrite']     = TRUE; // 기존 파일 덮어쓰기
            //$config['max_size'] = 2048; // 2MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $error = $this->upload->display_errors();
                echo json_encode(['error' => $error]);
            } else {
                $data = $this->upload->data();
                $file_path = base_url("images/article/".$data['file_name']);
                echo $file_path;
            }
        }
    }

    private function generate_unique_filename() {
        // 현재 시간과 랜덤 숫자를 조합하여 고유한 파일명 생성
        return date('YmdHis') . '_' . rand(1000, 9999);
    }

    //글 등록화면 이동
	public function apply()	
	{	
        $data = array();

        $data['category1'] = $this->article_mdl->get_category_list('P');
        $data['category2'] = $this->article_mdl->get_category_list('S');

        $this->load->view('admin/layout/header.php');
        $this->load->view('admin/article_apply.php', $data);
	}

	//작성글 수정화면 이동
	public function modify()	
	{	
		$id = $this->input->get('id', TRUE);

        $result = array();
        $data = array();

        if(empty($id))
        {
            $result['msg'] = "id가 없습니다";
            json_encode($result);
            exit;
        }
        
        $data['info'] = $this->article_mdl->get_article_info($id);
        $data['category1'] = $this->article_mdl->get_category_list('P');
        $data['category2'] = $this->article_mdl->get_category_list('S');

        if (!empty($data)) {
            
            $this->load->view('admin/layout/header.php');
            $this->load->view('admin/article_modify.php', $data);

		}else{
			$result['msg'] = "조회된 정보가 없습니다";
            echo json_encode($result);
            exit;
		}
	}

	//작성글 등록,수정
	public function regi_article() {
        $result = array();

        if ($this->input->is_ajax_request()) 
        {
            // POST 데이터 받기
            $id = $this->input->post('id', FALSE);
            $title = $this->input->post('title', TRUE);
            $tag = $this->input->post('tag', TRUE);
            $content = $this->input->post('content', FALSE);  // XSS 필터링하지 않음
            $category1 = $this->input->post('category1', TRUE); //대분류카테고리
            $category2 = $this->input->post('category2', TRUE); //소분류 카테고리
            $c_id = $this->input->post('c_id', TRUE);        
            
            $article = $this->article_mdl->get_article_info($id);

            if(empty($article) && $id != ''){
                $result['msg'] = "조회된 정보가 없습니다.";
                echo json_encode($result);
                exit;
            }

            // 대표 이미지 업로드 처리
            $thumbnail_file = null;
            if (!empty($_FILES['thumbnail']['name'])) 
            { 
                $config['upload_path'] = 'images/article/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = $this->generate_unique_filename(); // 파일명 생성 함수 호출
                $config['overwrite']     = TRUE; // 기존 파일 덮어쓰기
                //$config['max_size'] = 2048; // 2MB

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('thumbnail')) {

                    $data = $this->upload->data();

                    $thumbnail_file = $data['file_name'];

                } else {
                    $result['msg'] = "이미지 업로드에 실패하였습니다";
                    echo json_encode($result);
                    return;
                }
            }
            else
            {
                $thumbnail_file = $article['thumbnail'];
            }

            //데이터베이스에 저장
            $data = array(
                'c_id'       => $title,
                'category1'  => $category1,
                'category2'  => $category2,
                'tag'        => $tag,
                'thumbnail'  => $thumbnail_file,
                'title'      => $title,
                'content'    => $content,
                'sort'       => 1,
                'regdate'    => date('Y-m-d H:i:s'),
            );
            //id값 있으면 update
            if(!empty($id))
            {

                $res = $this->article_mdl->update_articles($id, $data);

                if($res)
                {
                    $result['msg'] = "수정되었습니다";
                }
                else
                {
                    $result['msg'] = "수정 실패하였습니다";
                }
            }
            //id값 없으면 insert
            else
            {
                $res = $this->article_mdl->insert_articles($data);

                if($res)
                {
                    $result['msg'] = "저장되었습니다";
                }
                else
                {
                    $result['msg'] = "저장 실패하였습니다";
                }
            }
        }else{
            $result['msg'] = "입력된 정보가 없습니다.";
        }

        echo json_encode($result);
        exit;
    }

	public function main(){
		$this->load->view('main.php');
	}
}
