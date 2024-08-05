<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('article_upload_path')) {
    function get_article_upload_path() {
        $CI =& get_instance();
        return $CI->config->item('article_upload_path');
    }
}
if (!function_exists('banner_upload_path')) {
    function get_banner_upload_path() {
        $CI =& get_instance();
        return $CI->config->item('banner_upload_path');
    }
}
if (!function_exists('creator_upload_path')) {
    function get_creator_upload_path() {
        $CI =& get_instance();
        return $CI->config->item('creator_upload_path');
    }
}
if (!function_exists('etc_upload_path')) {
    function get_etc_upload_path() {
        $CI =& get_instance();
        return $CI->config->item('etc_upload_path');
    }
}