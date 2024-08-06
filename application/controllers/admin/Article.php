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

	public function apply()
	{	
		$this->load->view('layout/header.php');
		$this->load->view('article_apply.php');
		$this->load->view('layout/footer.php');
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
            $config['upload_path'] = 'uploads/article';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            //$config['max_size'] = 2048; // 2MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $error = $this->upload->display_errors();
                echo json_encode(['error' => $error]);
            } else {
                $data = $this->upload->data();
                $file_path = base_url('uploads/article/' . $data['file_name']);
                echo $file_path;
            }
        }
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
            json_encode($result);
            exit;
		}
	}

	//작성글 수정
	public function update_article() {
        if ($this->input->is_ajax_request()) {
            // POST 데이터 받기
            $id = $this->input->post('id', TRUE);
            $title = $this->input->post('title', TRUE);
            $content = $this->input->post('content', FALSE);  // XSS 필터링하지 않음
            $category = $this->input->post('category', TRUE);
            $category_sub = $this->input->post('category_sub', TRUE);

            // 대표 이미지 업로드 처리
            $thumbnail_id = 0;
            if (!empty($_FILES['thumbnail']['name'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                //$config['max_size'] = 2048; // 2MB

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('thumbnail')) {
                    $data = $this->upload->data();
                    $file_path = 'uploads/' . $data['file_name'];

                    // 첨부 파일로 저장
                    $attachment = array(
                        'post_title' => $data['file_name'],
                        'post_content' => '',
                        'post_status' => 'inherit',
                        'post_mime_type' => $data['file_type'],
                        'guid' => base_url($file_path),
                        'post_type' => 'attachment',
                        'post_date' => date('Y-m-d H:i:s'),
                        'post_date_gmt' => gmdate('Y-m-d H:i:s')
                    );

                    $this->db_wp->insert('wp_posts', $attachment);
                    $thumbnail_id = $this->db_wp->insert_id();

                    // 첨부 파일 메타 데이터 저장
                    $metadata = array(
                        'post_id' => $thumbnail_id,
                        'meta_key' => '_wp_attached_file',
                        'meta_value' => $file_path
                    );
                    $this->db_wp->insert('wp_postmeta', $metadata);
                } else {
                    $error = $this->upload->display_errors();
                    $this->output->set_status_header(400);
                    echo json_encode(['error' => $error]);
                    return;
                }
            }

            // 데이터베이스에 저장
            $data = array(
				'post_title' => $title,
				'post_content' => $content,
				'post_modified' => date('Y-m-d H:i:s'),
				'post_modified_gmt' => gmdate('Y-m-d H:i:s')
			);
	
			$this->db_wp->where('ID', $id);
			$this->db_wp->update('wp_posts', $data);
	
			// 대분류 카테고리 업데이트
			$this->db_wp->where('object_id', $id);
			$this->db_wp->where('term_taxonomy_id !=', $category_sub);
			$this->db_wp->update('wp_term_relationships', array('term_taxonomy_id' => $category), array('term_taxonomy_id' => $category));
	
			// 소분류 카테고리 업데이트
			$this->db_wp->where('object_id', $id);
			$this->db_wp->where('term_taxonomy_id !=', $category);
			$this->db_wp->update('wp_term_relationships', array('term_taxonomy_id' => $category_sub), array('term_taxonomy_id' => $category_sub));
	
			// 메타 데이터 업데이트 (대표 이미지)
			if ($thumbnail_id > 0) {
				$this->db_wp->where('post_id', $id);
				$this->db_wp->where('meta_key', '_thumbnail_id');
				$this->db_wp->update('wp_postmeta', array('meta_value' => $thumbnail_id));
			}

            if ($this->db_wp->affected_rows() > 0) {
                echo json_encode(['success' => '저장되었습니다', 'post_id' => $id]);
            } else {
                $this->output->set_status_header(500);
                echo json_encode(['error' => '저장에 실패하였습니다']);
            }
        } else {
            show_error('No direct script access allowed', 403);
        }
    }

	public function main(){
		$this->load->view('main.php');
	}
}
