<?php
/**
 * Created by PhpStorm.
 * User: Jipeng
 * Date: 2018/5/18
 * Time: 10:02
 */

class Notif_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
    }
    public function saveNotif($msg,$time,$loop,$loop_every,$user){
        try
        {
            $data = array(
                'msg' => $msg,
                'bctime'=>$time,
                'loop' =>$loop,
                'repeat'=>$loop_every,
                'user'=>$user
            );

            $this->db->insert('notif', $data);
            $stat[0] = true;
            $stat[1] = 'sukses';
            return $stat;
        }
        catch(PDOException $ex)
        {
            $stat[0] = false;
            $stat[1] = $ex->getMessage();
            return $stat;
        }
    }
    public function updateNotif($id,$nexttime){
        $this->dblocal = new PDO("mysql:host=localhost;dbname=SkillSpot;charset=latin1","root","",array(PDO::ATTR_PERSISTENT => true));
        $this->dblocal->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $db = $this->dblocal;
        try
        {
            $stmt = $db->prepare("update notif set notif_time = :nexttime, publish_date=CURRENT_TIMESTAMP(), notif_loop = notif_loop-1 where id=:id ");
            $stmt->bindParam("id", $id);
            $stmt->bindParam("nexttime", $nexttime);
            $stmt->execute();
            $stat[0] = true;
            $stat[1] = 'success';
            return $stat;
        }
        catch(PDOException $ex)
        {
            $stat[0] = false;
            $stat[1] = $ex->getMessage();
            return $stat;
        }

    }
    public function listNotif(){
        try{
            $this->db->select('*');
            $query = $this->db->get('notif');
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
    public function listNotifUser($user){
        try{
            $arr = array(
                'username'=>$user,
                'notif_loop >'=>0,
                'notif_time <=' => time()
                );
            $this->db->where($arr);
            $this->db->select('*');
            $query = $this->db->get('notif');
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



}