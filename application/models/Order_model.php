<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/27
 * Time: 00:32
 */
class Order_model extends CI_Model{
    public function insertorder($arr){
        $this->db->insert('Order',$arr);
    }
}