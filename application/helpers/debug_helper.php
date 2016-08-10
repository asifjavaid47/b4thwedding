<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function debug($arr,$exit = true){
    if(is_array($arr)){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }else{
        echo $arr;
    }
    if($exit){
       exit;
    }
    return true;
}
function count_all_projects($where='13'){
    $ci = & get_instance();
    $ci->load->database();
    $ci->db->select('tbl_project_posts.ID');
    $ci->db->from("tbl_project_posts");
    $ci->db->join('tbl_users', 'tbl_users.ID = tbl_project_posts.userID');
    $ci->db->join('tbl_proposal', 'tbl_proposal.projectId = tbl_project_posts.ID','left');
    $ci->db->join('tbl_main_categories', 'tbl_main_categories.ID = tbl_project_posts.mainCategoryId');
    $ci->db->where("tbl_project_posts.mainCategoryId", $where);
    $ci->db->where("cancelProject", '0');
    $ci->db->where("finishProject", '0');
    $query = $ci->db->get();
    $rows = $query -> num_rows();
        return $rows;
}