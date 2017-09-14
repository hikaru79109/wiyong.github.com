<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public $zone_name = CUSTOM_ZONE_NAME;
	
	// construct call
	public function __construct()
	{
	parent::__construct();
	$this->load->helper(array('form', 'url'));
	$this->load->helper('date');
	$this->load->helper('file');
	$this->load->library('form_validation');
	$this->load->model('Model_admin','home');
	$this->load->database();
	$this->load->library('session');
	$this->load->library('image_lib');
	$this->load->helper('cookie');
	$this->load->helper('url');
	$this->load->library('email');
	session_start();
	}

	// permission call
	public function permission()
	{
		//$data=$_POST;
		$permission="";

		if(($this->session->userdata('permission'))) {
			$ff = $this->router->fetch_method();

			$pm = $this->db->query("SELECT * FROM  pages WHERE pages='$ff'");

			if($pm->num_rows == 1) {
				$upm = $pm->row('p_id');
				$id=explode(',',$this->session->userdata('permission'));
				if(in_array($upm,$id)) {
					$permission = "access";
				} else {
					$permission = "access";
					
				}
			} else {
				$permission = "access";
			}
		}
		return $permission;
	}

	// index page call
	public function index()
	{
   	$this->load->view('dashboard');
	}

	// admin login call
	public function adminlogin()
	{
		$data=$_POST;
		$result = $this->home->login($data);
		echo $result;
	}

	// admin logout call
	public function logout()
	{
		$this->session->unset_userdata('username-admin');
		//redirect('/', 'refresh');
		delete_cookie('username-admin');
		redirect('/admin', 'refresh');
	}

	// drivesignup call
	public function driversignup()
	{
		if($this->session->userdata('username-admin') ||   $this->input->cookie('username-admin', false)){
			$permission = $this->permission();
			if(($this->session->userdata('role-admin') == 'admin') || ($permission == "access")) {
				$this->load->view('driver_signup');
			}else{
				redirect('admin/not_admin');
			}
		}else{
			redirect('admin/index');
		}
	}

	// admin profile call
	public function profile()
	{
		//$data=$_POST;
		if($this->session->userdata('username-admin') ||   $this->input->cookie('username-admin', false)){
			$permission = $this->permission();
			if(($this->session->userdata('role-admin') == 'admin') || ($permission == "access")) {
				$this->load->view('admin-profile');
			}else{
				redirect('admin/not_admin');
			}
		}else{
			redirect('admin/index');
		}
	}

	// admin password change call
	public function password_change()
	{
		//$data=$_POST;
		if($this->session->userdata('username-admin') ||   $this->input->cookie('username-admin', false)){
			$permission = $this->permission();
			if(($this->session->userdata('role-admin') == 'admin') || ($permission == "access")) {
				$this->load->view('admin-change-password');
			}else{
				redirect('admin/not_admin');
			}
		}else{
			redirect('admin/index');
		}
	}

	//dashboard call
	public function dashboard()
	{
		if($this->session->userdata('username-admin') ||   $this->input->cookie('username-admin', false)){
			$permission = $this->permission();
			if(($this->session->userdata('role-admin') == 'admin') || ($permission == "access")) {
				$this->load->view('dashboard');
			}else{
				$this->load->view('dashboard');
			}
		}else{
			$this->load->view('dashboard');
		}
	}

	// add user call
	/*public function adduser()
	{
		if($this->session->userdata('username-admin') ||   $this->input->cookie('username-admin', false)){
			$permission = $this->permission();
			if(($this->session->userdata('role-admin') == 'admin') || ($permission == "access")) {
				$this->load->view('admin-add-userdetails');
			}else{
				redirect('admin/not_admin');
			}
		}else{
			redirect('admin/index');
		}
	}*/

	// insert user call
	/*public function insertuser()
	{
		$data=$_POST;
		//echo $data['value'];exit;
		$res=$this->home->userinsert($data);
		// print_r($res);
		echo $res;
	}*/

	// view user details call
	public function view_userdetails()
	{
		//$data=$_POST;
		if($this->session->userdata('username-admin') ||   $this->input->cookie('username-admin', false)){
			$permission=$this->permission();
			if(($this->session->userdata('role-admin') == 'admin') || ($permission == "access")) {
				$this->load->view('user-details');
			}else{
				redirect('admin/not_admin');
			}
		}else{
			redirect('admin/index');
		}
	}

	// get user data call
	public function get_user_data()
	{
		// storing  request (ie, get/post) global array to a variable
		$requestData= $_REQUEST;
		$filterData=$_POST['data_id'];
		if($filterData=='yes'){
			$flagfilter=$filterData;
		}
		else{
			$flagfilter='';
		}
		$user=$this->home->getuser($requestData,$flagfilter,$where=null);
		echo $user;
	}

	//delete user data call
	public function delete_user_data()
	{
		$data_ids = $_REQUEST['data_ids'];
		$this->home->deluser($data_ids);
	}

	//delete single user data call
	public function delete_single_user_data()
	{
		$data_id = $_REQUEST['data_id'];
		$this->home->delsingleuser($data_id);
	}

	

	// manage driver call
	public function manage_driver()
	{
		$data=$_POST;
		if($this->session->userdata('username-admin') ||   $this->input->cookie('username-admin', false)){
			$permission = $this->permission();
			if(($this->session->userdata('role-admin') == 'admin') || ($permission == "access")) {
				if($this->input->get('flag')){
					$filter='flag';
					$data['query']=$filter;
				}
				else{
					$data['query']= NULL;
				}
				$this->load->view('manage-driver',$data);
			}else{
				$this->load->view('manage-driver',$data);
			}
		}else{
			$this->load->view('manage-driver',$data);
		}
	}

	// manage flagged driver call
	public function manage_flagged_driver()
	{
		if($this->session->userdata('username-admin') ||   $this->input->cookie('username-admin', false)){
			$permission = $this->permission();
			if(($this->session->userdata('role-admin') == 'admin') || ($permission == "access")) {
				$this->load->view('manage-flagged-driver');
			}else{
				redirect('admin/not_admin');
			}
		}else{
			redirect('admin/index');
		}
	}

	// driver details call
	public function view_driver_details()
	{
		//$data=$_POST;
		if($this->session->userdata('username-admin') ||   $this->input->cookie('username-admin', false)){
			$permission = $this->permission();
			if(($this->session->userdata('role-admin') == 'admin') || ($permission == "access")) {
				$this->load->view('driver-details');
			}else{
				redirect('admin/not_admin');
			}
		}else{
			redirect('admin/index');
		}
	}

	// add driver call
	public function add_driver()
	{
		
			$this->load->view('add-driver');
		
	}

	// insert driver data call
	public function insert_driver()
	{
		if(isset($_POST['save']))
		{
			$config['upload_path'] = './driverimages/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size']    = '2000';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('driverimage'))
			{
				$response = $this->session->set_flashdata('error_msg', $this->upload->display_errors());
				redirect(base_url().'admin/add_driver');
				// uploading failed. $error will holds the errors.
			}
			else {
				$email=$_POST['email'];
				$username=$_POST['username'];
				$check_email_username=$this->home->checkemailusername($email,$username);
				if($check_email_username) {
					$response = $this->session->set_flashdata('error_msg', 'email or username already exists');
					redirect(base_url().'admin/add_driver');
				}
				else {
					$upload_data = $this->upload->data();
					$data = array(
						'name' => $_POST['driverName'],
						'user_name' => $_POST['username'],
						'phone' => $_POST['driverPhone'],
						'address' => $_POST['driverAddress'],
						'email' => $_POST['email'],
						'license_no' => $_POST['licenseno'],
						'car_type' => $_POST['car_type'],
						'car_no' => $_POST['carno'],
						'gender' => $_POST['gender'],
						'dob' => $_POST['dob'],
						'Lieasence_Expiry_Date' => $_POST['licennex'],
						'license_plate' => $_POST['licenseplate'],
						'Insurance' => $_POST['insurance'],
						'Car_Model' => $_POST['car_model'],
						'Car_Make' => $_POST['car_make'],
						'image' => $upload_data['file_name'],
						'status' => 'Active'
					);
					$response = $this->home->insertdriverdata($data);
					redirect(base_url() . 'admin/manage_driver');
				}
			}
		}
	}
	// get driver data call
	public function get_driver_data()
	{
		$requestData= $_REQUEST;
		$filterData=$_POST['data_id'];
		if($filterData=='yes'){
			$flagfilter=$filterData;
		}
		else{
			$flagfilter='';
		}
		// storing  request (ie, get/post) global array to a variable
		$requestData= $_REQUEST;
		$driver=$this->home->getdriver($requestData,$flagfilter,$where=null);
		echo $driver;
	}

	//get select driver data call
	public function get_select_driver_data()
	{
		// storing  request (ie, get/post) global array to a variable
		$requestData= $_REQUEST;
		$booking_id=$_POST['booking_id'];
		$user=$this->home->getselectdriver($requestData,$booking_id,$where=null);
		echo $user;
	}

	// get car type data call
	public function get_cartype_data()
	{
		$cab_id=$_POST['cab_id'];
		$cab_details=$this->home->getcartypedata($cab_id);
		if($cab_details){
			echo json_encode($cab_details);
		}
	}
	//delete driver data call
	public function delete_driver_data()
	{
		$data_ids = $_REQUEST['data_ids'];
		$this->home->deldriver($data_ids);
	}

	//delete single driver data call
	public function delete_single_driver_data()
	{
		$data_id = $_REQUEST['data_id'];
		$this->home->delsingledriver($data_id);
	}

	// manage car type call
	public function manage_car_type()
	{
		if($this->session->userdata('username-admin') ||   $this->input->cookie('username-admin', false)){
			$permission = $this->permission();
			if(($this->session->userdata('role-admin') == 'admin') || ($permission == "access")) {
				$this->load->view('manage-cartype');
			}else{
				redirect('admin/not_admin');
			}
		}else{
			$this->load->view('manage-cartype');
		}
	}

	// view car call
	/*public function view_car()
	{

		if ($this->session->userdata('username-admin') || $this->input->cookie('username-admin', false)) {
			$permission = $this->permission();
			if (($this->session->userdata('role-admin') == 'admin') || ($permission == "access")) {
				$this->load->view('view_car');
			} else {
				redirect('admin/not_admin');
			}
		} else {
			redirect('admin/index');
		}
	}*/

	// edit car type call
	public function view_cartype_details()
	{
		//$data=$_POST;
		if($this->session->userdata('username-admin') ||   $this->input->cookie('username-admin', false)){
			$permission = $this->permission();
			if(($this->session->userdata('role-admin') == 'admin') || ($permission == "access")) {
				$this->load->view('cartype-details');
			}else{
				redirect('admin/not_admin');
			}
		}else{
			redirect('admin/index');
		}
	}
	
	// add car call
	public function add_car()
	{

		if($this->session->userdata('username-admin') ||   $this->input->cookie('username-admin', false)){
			$permission = $this->permission();
			if(($this->session->userdata('role-admin') == 'admin') || ($permission == "access")) {
				$this->load->view('add-car');
			}else{
				redirect('admin/not_admin');
			}
		}else{
			redirect('admin/index');
		}
	}

	// insert car data call
	public function insert_car()
	{
		if(isset($_POST['save']))
		{
			$config['upload_path'] = './car_image/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size']    = '2000';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('uploadImageFile'))
			{
				$response = $this->session->set_flashdata('error_msg', $this->upload->display_errors());
				redirect(base_url().'admin/add_car');
				// uploading failed. $error will holds the errors.
			}
			else {
				$upload_data = $this->upload->data();
				$data = array(
					'cartype' => $_POST['cartype'],
					'car_rate' => $_POST['carrate'],
					'transfertype' => $_POST['transfertype'],
					'intialkm' => $_POST['intialkm'],
					'fromintialkm' => $_POST['fromintialkm'],
					'fromintailrate' => $_POST['fromintailrate'],
					'night_fromintailrate' => $_POST['night_fromintailrate'],
					'timetype' => $_POST['timetype'],
					'icon' => $upload_data['file_name'],
					'description' => $_POST['description'],
					'ride_time_rate' => $_POST['ride_time_rate'],
					'night_ride_time_rate' => $_POST['night_ride_time_rate'],
					'night_intailrate' => $_POST['night_intailrate'],
					'seat_capacity' => $_POST['seating_capacity']
				);
				$response = $this->home->insertcardata($data);
				redirect(base_url().'admin/manage_car_type');
			}
		}
	}
	// get car data call
	public function get_car_data()
	{
		// storing  request (ie, get/post) global array to a variable
		$requestData= $_REQUEST;
		$user=$this->home->getcar($requestData,$where=null);
		echo $user;
	}

	//delete car data call
	public function delete_car_data()
	{
		$data_ids = $_REQUEST['data_ids'];
		$this->home->delcar($data_ids);
	}

	//delete single car data call
	public function delete_single_car_data()
	{
		$data_id = $_REQUEST['data_id'];
		$this->home->delsinglecar($data_id);
	}

	

	public function update_driver_status()
	{
		$data_id = $_REQUEST['data_id'];
		$result=$this->home->statusdriver($data_id);
		if($result){
			$json_array = array(
                            //'driverId' => (int)$driveridarr,
                            'driverId' => $data_id,
                            'driver_status' => 0
                        );
                        $new_json_array = json_encode($json_array,JSON_UNESCAPED_SLASHES);
                        //print_r($new_json_array);
                        //exit;
                        $url = "162.243.225.225:4040/changeDriverStatus?".$new_json_array;
                        //$url = "192.168.1.118:4040/searchDriver?".$new_json_array;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                        // This is what solved the issue (Accepting gzip encoding)
                        curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");
                        $response = curl_exec($ch);
                        curl_close($ch);
                        if($response)
                        {
                        	return true;
                        }
		}
	}
	

	
     
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>