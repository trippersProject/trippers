<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_mdl extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    //글 리스트
    public function get_article_list() {
        $this->db->select('ta.idx as ta_idx, ta.c_id as ta_c_id, ta.category as ta_category, 
                           ta.thumbnail as ta_thumbnail, ta.title as ta_title, ta.sort as ta_sort, 
                           ta.regdate as ta_regdate, tc.name as tc_name');
        $this->db->from('tp_articles ta');
        $this->db->join('tp_category tc', 'tc.id = ta.category');
        $this->db->order_by('idx', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }

    //글 정보
    public function get_article_info($idx) {
        $this->db->select('*');
        $this->db->from('tp_articles');
        $this->db->where('idx', $idx);

        $query = $this->db->get();

        return $query->row_array();
    }

    //카테고리 리스트
    public function get_category_list($type) {
        $this->db->select('*');
        $this->db->from('tp_category');
        if($type == 'P')
        {
            $this->db->where('parent', '0');
        }
        else
        {
            $this->db->where('parent !=', '0');
        }
        $query = $this->db->get();

        return $query->result_array();
    }
}