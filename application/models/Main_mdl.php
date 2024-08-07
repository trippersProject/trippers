<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_mdl extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_banners($category) {
        $this->db->select('*');
        $this->db->from('tp_banner');
        $this->db->where('category', $category);
        $this->db->order_by('sort', 'ASC');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_article_list($category='', $c_id='') {
        $this->db->select('*');
        $this->db->from('tp_articles');
        $this->db->join('tp_category', 'tp_category.id = tp_articles.category1');
        if($c_id) $this->db->where('c_id', $c_id);
        if($category) $this->db->where('parent', $category);
        $this->db->order_by('sort', 'ASC');

        $query = $this->db->get();

        return $query->result_array();
    }

}