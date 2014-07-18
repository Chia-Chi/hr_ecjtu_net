<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * ������2012����ר��
 * 
 * @package		hr_ecjtu_net
 * @author		Polly
 * @datatime	2012-08-16
 * @link		http://hr.ecjtu.net/
 * @version		1.0.0
 */

 // ------------------------------------------------------------------------

/**
 *
 * hr_ecjtu_net register_mdlģ��
 *
 * ��Ҫ�����û�����ע����Ϣ�����ݿ�֮��Ľ������������ҡ�����Ȳ�����
 *
 */
class Register_mdl extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	/** �����Ѳ�����û���Ϣ **/
	public function get_inserted($user_id, $hr_id)
	{
		$this->db->from('hr_user');
		$this->db->where('user_id',$user_id);
		$this->db->where('hr_id',$hr_id);
		$query=$this->db->get()->result();
		return $query;
	}
	/** �����û�id�� **/
	public function get_user_id($user_name, $user_phone)
	{
		$this->db->select('user_id');
		$this->db->from('user_info');
		$this->db->where('user_name',$user_name);
		$this->db->where('user_phone',$user_phone);
		if($query=$this->db->get()->result()){
			return $query[0]->user_id;
		}
	}
	/** ���Ҳ���id�� **/
	public function get_hr_id( $hr_center, $hr_department)
	{
		$this->db->select('hr_id');
		$this->db->from('hr_info');
		$this->db->where('hr_center',$hr_center);
		$this->db->where('hr_department',$hr_department);
		if($query=$this->db->get()->result()){
			return $query[0]->hr_id;
		}
		/*
		$this->db->select('hr_id');
		$this->db->where('hr_center',$hr_center);
		$this->db->where('hr_department',$hr_department);
		$query = $this->db->get();
		*/
		/*
		foreach($query->result() as $row)
		{
			echo $row->hr_id;
		}
		*/
//		$query = $this->db->get_where('hr_info',array('hr_center'=>$hr_center,'hr_department'=>$hr_department),1);
//		var_dump($query);
//		return $query->result();
		/*
		$sql = "SELECT hr_id FROM hr_info WHERE hr_center=$hr_center AND hr_department=$hr_department";
		$hr_id = $this->db->query($sql);
		return $hr_id;
		var_dump($hr_id);
		*/
		
	}
	/** ���û���Ϣд�����ݿ� **/
	public function insert_user_info($data_user)
	{
		$this->db->insert('user_info',$data_user);
	}
	/** ��������Ϣд�����ݿ� **/
	public function insert_register_info($data_register)
	{
		$this->db->insert('hr_user',$data_register);
	}
}
/* End of file register_mdl.php */
/* Location: ./application/models/register_mdl.php */