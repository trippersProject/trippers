<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	public function __construct() {
        parent::__construct();

		$this->load->helper('url');
        $this->load->library('form_validation');
        //워드프레스 데이터베이스에 연결
        $this->db_wp = $this->load->database('default', TRUE);
    }

	public function index()
	{
      $this->list();
	}

	public function list()
	{	
		$data = array();

		$this->db_wp->select('p.ID, p.post_title, t.name as category, p.post_date');
        $this->db_wp->from('wp_posts p');
        $this->db_wp->join('wp_term_relationships tr', 'p.ID = tr.object_id', 'inner');
        $this->db_wp->join('wp_term_taxonomy tt', 'tr.term_taxonomy_id = tt.term_taxonomy_id', 'inner');
        $this->db_wp->join('wp_terms t', 'tt.term_id = t.term_id', 'inner');
        $this->db_wp->where('tt.taxonomy', 'category');
        $this->db_wp->where('p.post_status', 'publish');
        $this->db_wp->where('p.post_type', 'post');
		$this->db_wp->group_by('p.ID');
        $this->db_wp->order_by('p.post_date', 'DESC');
        $query = $this->db_wp->get();
		
		$data['list'] = $query->result_array();

		$this->load->view('layout/header.php');
		$this->load->view('article_list.php', $data);
		$this->load->view('layout/footer.php');
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

		// echo $title."//".$category."//".$category_sub."//".$content."//";
		// exit;

		$data = array(
			'post_author' => '1',
            'post_title' => $title,
            'post_content' => $content,
            'post_status' => 'publish',
            'post_type' => 'post',
            'post_date' => date('Y-m-d H:i:s'),
            'post_date_gmt' => gmdate('Y-m-d H:i:s'),
            'post_modified' => date('Y-m-d H:i:s'),
            'post_modified_gmt' => gmdate('Y-m-d H:i:s')
        );

		 // 대표 이미지 업로드 처리
		 $thumbnail_id = 0;
		 if (!empty($_FILES['thumbnail']['name'])) {
			 $config['upload_path'] = 'uploads/article';
			 $config['allowed_types'] = 'jpg|jpeg|png|gif';
			 //$config['max_size'] = 2048; // 2MB

			 $this->load->library('upload', $config);

			 if ($this->upload->do_upload('thumbnail')) {
				 $img_data = $this->upload->data();
				 $file_path = 'uploads/article/' . $img_data['file_name'];

				 // 첨부 파일로 저장
				 $attachment = array(
					 'post_title' => $img_data['file_name'],
					 'post_content' => '',
					 'post_status' => 'inherit',
					 'post_mime_type' => $img_data['file_type'],
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
        
		//작성글 저장
        $this->db_wp->insert('wp_posts', $data);
        $post_id = $this->db_wp->insert_id();

		// 가이드URL 업데이트
		$guid = site_url('/?p=' . $post_id);
		$this->db_wp->update('wp_posts', ['guid' => $guid], ['ID' => $post_id]);

        // 대분류 카테고리 할당
        $data_relationship_main = array(
            'object_id' => $post_id,
            'term_taxonomy_id' => $category
        );
        $this->db_wp->insert('wp_term_relationships', $data_relationship_main);

        // 소분류 카테고리 할당
        $data_relationship_sub = array(
            'object_id' => $post_id,
            'term_taxonomy_id' => $category_sub
        );
        $this->db_wp->insert('wp_term_relationships', $data_relationship_sub);

		//썸네일 이미지 저장
		if ($thumbnail_id > 0) {
            $this->db_wp->insert('wp_postmeta', [
                'post_id' => $post_id,
                'meta_key' => '_thumbnail_id',
                'meta_value' => $thumbnail_id
            ]);
        }

		// 메타 데이터 추가 (필요한 경우)
        $meta_data = [
            '_edit_lock' => time() . ':1',
            '_edit_last' => 1
        ];
        foreach ($meta_data as $meta_key => $meta_value) {
            $this->db_wp->insert('wp_postmeta', [
                'post_id' => $post_id,
                'meta_key' => $meta_key,
                'meta_value' => $meta_value
            ]);
        }

		if ($post_id) {
			echo json_encode(['success' => '저장되었습니다', 'post_id' => $post_id]);
		} else {
			$this->output->set_status_header(500);
			echo json_encode(['error' => '저장에 실패하였습니다']);
		}
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
		$data = array();

		$this->db_wp->select('p.ID as id, p.post_title as title, p.post_content as content');
        $this->db_wp->from('wp_posts p');
        $this->db_wp->where('p.ID', $id);
        $query = $this->db_wp->get();

        if ($query->num_rows() > 0) {
            $post = $query->row_array();

            // 대분류 카테고리 가져오기
            $this->db_wp->select('tr.term_taxonomy_id');
            $this->db_wp->from('wp_term_relationships tr');
            $this->db_wp->join('wp_term_taxonomy tt', 'tr.term_taxonomy_id = tt.term_taxonomy_id');
            $this->db_wp->where('tr.object_id', $id);
            $this->db_wp->where('tt.taxonomy', 'category');
            $query = $this->db_wp->get();
            if ($query->num_rows() > 0) {
                $category = $query->row_array();
                $post['category'] = $category['term_taxonomy_id'];
            } else {
                $post['category'] = null;
            }

            // 소분류 카테고리 가져오기
            $this->db_wp->select('tr.term_taxonomy_id');
            $this->db_wp->from('wp_term_relationships tr');
            $this->db_wp->join('wp_term_taxonomy tt', 'tr.term_taxonomy_id = tt.term_taxonomy_id');
            $this->db_wp->where('tr.object_id', $id);
            $this->db_wp->where('tt.parent', $post['category']);
            $query = $this->db_wp->get();
            if ($query->num_rows() > 0) {
                $category_sub = $query->row_array();
                $post['category_sub'] = $category_sub['term_taxonomy_id'];
            } else {
                $post['category_sub'] = null;
            }

            // 썸네일 ID 가져오기
            $this->db_wp->select('meta_value');
            $this->db_wp->from('wp_postmeta');
            $this->db_wp->where('post_id', $id);
            $this->db_wp->where('meta_key', '_thumbnail_id');
            $query = $this->db_wp->get();

			
            if ($query->num_rows() > 0) {
				$thumbnail = $query->row_array();
                $post['thumbnail_id'] = $thumbnail['meta_value'];
            } else {
                $post['thumbnail_id'] = null;
            }

			// 썸네일 링크 가져오기
			if($post['thumbnail_id'] != null)
			{
            $this->db_wp->select('meta_value');
            $this->db_wp->from('wp_postmeta');
            $this->db_wp->where('post_id', $post['thumbnail_id']);
            $query = $this->db_wp->get();
			}

			if ($query->num_rows() > 0) {
				$thumbnail_url = $query->row_array();
                $post['thumbnail_url'] = $thumbnail_url['meta_value'];
            } else {
                $post['thumbnail_url'] = null;
            }

		}else{
			echo json_encode(['error' => '정보조회에 실패하였습니다']);
		}

		$data['data'] = $post;

		$this->load->view('layout/header.php');
		$this->load->view('article_modify.php', $data);
		$this->load->view('layout/footer.php');
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
