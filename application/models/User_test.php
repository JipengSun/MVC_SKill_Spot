<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/5
 * Time: 11:45
 */
class User_test extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function u_insert($arr){
        $this->db->insert('User',$arr);
    }
    function listUser(){
        try{
            $this->db->select('*');
            $query = $this->db->get('User');
            $stat[0] = true;
            //Check later for type.
            $stat[1] = $query->result();
            $stat[2] = $query->num_rows();
            return $stat;
        }catch (PDOException $ex){
            $stat[0] = false;
            $stat[1] = $ex->getMessage();
            return $stat;

        }
    }
    function u_update($id,$arr){
        $this->db->where('uid',$id);
        $this->db->update('User',$arr); //Need to have a key value array.
    }
    function u_select($email){
        $this->db->where('mail',$email);
        $this->db->select('*');
        $query = $this->db->get('User');
        return $query->result();
    }
    function u_selectname($name){
        $this->db->where('username',$name);
        $this->db->select('*');
        $query = $this->db->get('User');
        return $query->result();
    }
    function u_del($id){
        $this->db->where('uid',$id);
        $this->db->delete('User');
    }

}