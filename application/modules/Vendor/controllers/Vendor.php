<?php

/**
 * @author Jeevan
 * @date 31-aug-2017
 * @description this controller  is for vendor related operation like save preferences dashboard etc.
 * @uses MX_Controller::Used HMVC functionality override ci controller.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vendor extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->output->set_meta('description', 'Vendor Dashboard');
        $this->output->set_meta('title', 'Vendor Dashboard');
        $this->output->set_title('Vendor Dashboard');
        $this->output->set_template('front_layout');
        $this->load->model('Vendor_business_category_model');
        $this->load->model('Vendor_model');
        $this->load->model('Region_model');
    }

    public function index() {

        $data = array(
           'home_slider' => TRUE,
            'view_port' => 'viewport',
            'view_port_content' => 'width=device-width, initial-scale=1'
        );
        $this->load->view('index', $data);
    }

    function sign_up() {
        $vendor_id = $this->session->userdata('vendor_id');
        $postData = $this->input->post();
        if ($postData) {
            if (!empty($this->session->userdata('vendor_id'))) {
                
                $this->Vendor_model->update($postData, $vendor_id);
                $this->session->set_userdata('vendor_id', $vendor_id);
                $this->session->set_userdata('vendor_pop', true);
                redirect(current_url());
            } else {
                $vendor_id = $this->Vendor_model->insert($postData);
                $this->session->set_userdata('vendor_id', $vendor_id);
                $this->session->set_userdata('vendor_pop', true);
                redirect(current_url());
            }
        }

        $vendorInfo = $this->Vendor_model->with_region('fields:name')->with_business_category('fields:name')->get($vendor_id);
        $buisenss_category = $this->Vendor_business_category_model->as_dropdown('name')->get_all();
        $regions = $this->Region_model->as_dropdown('name')->get_all();
        
        $data = array(
            'home_slider' => FALSE,
            'categories' => $buisenss_category,
            'regions' => $regions,
            'vendor_info' => $vendorInfo,
            'view_port' => '',
            'view_port_content' => ''
        );
        $this->load->view('signup', $data);
    }
    
    function vendor_plan($plan_id = null,$vendor_id = null) {
        $postData = $this->input->post();
        
        
        if (!empty($postData)) {
            $vendorData = returnValidData('vendor', $postData);
            $vendorData['password'] = md5($postData['password']);
            if(!empty($vendorData['venue_detail']) && is_array($vendorData['venue_detail'])){
                $venue_detail = implode('-', $vendorData['venue_detail']);
                $vendorData['venue_detail'] = $venue_detail;
            }
            if(!empty($vendorData['venue_style']) && is_array($vendorData['venue_style'])){
                $venue_style = implode('-', $vendorData['venue_style']);
                $vendorData['venue_style'] = $venue_style;
            }
          
            if(!empty($vendorData['venue_setting']) && is_array($vendorData['venue_setting'])){
                $venue_setting = implode('-', $vendorData['venue_setting']);
                $vendorData['venue_setting'] = $venue_setting;
                
            }if(!empty($vendorData['venue_services']) && is_array($vendorData['venue_services'])){
                $venue_services = implode('-', $vendorData['venue_services']);
                $vendorData['venue_services'] = $venue_services;
            }if(!empty($vendorData['event_sevices']) && is_array($vendorData['event_sevices'])){
                $event_services = implode('-', $vendorData['event_sevices']);
                $vendorData['event_sevices'] = $event_services;
            }
            if(!empty($vendorData['foods_avaliable']) && is_array($vendorData['foods_avaliable'])){
                $foods_avilible = implode('-', $vendorData['foods_avaliable']);
                $vendorData['foods_avaliable'] = $foods_avilible;
            }
            if(!empty($vendorData['transportation']) && is_array($vendorData['transportation'])){
                $transoportation = implode('-', $vendorData['transportation']);
                $vendorData['transportation'] = $transoportation;
            }
            if(!empty($vendorData['starting_site_free']) && is_array($vendorData['starting_site_free'])){
                $site_free = implode('-', $vendorData['starting_site_free']);
                $vendorData['starting_site_free'] = $site_free;
            }
            if(!empty($vendorData['wedding_catering_cost']) && is_array($vendorData['wedding_catering_cost'])){
                $wedding_cost = implode('-', $vendorData['wedding_catering_cost']);
                $vendorData['wedding_catering_cost'] = $wedding_cost;
            }
            if(!empty($vendorData['vendor_area']) && is_array($vendorData['vendor_area'])){
                $vendor_area = implode('-', $vendorData['vendor_area']);
                $vendorData['vendor_area'] = $vendor_area;
            }
            $vendorData['plan_id'] = $plan_id;
            
            try {
                $this->Vendor_model->update($vendorData, $vendor_id);
                setMessage('Information updated successfully','success');
                redirect(base_url('Vendor/vendor_prefrences/'.$vendor_id));
            } catch (Exception $exc) {
                 setMessage('Information not updated ! Something went wrong','error');
                redirect(current_url());
            }
        }
        
        $vendorInfo = $this->Vendor_model->with_region('fields:name')->with_business_category('fields:name')->get($vendor_id);

        $data = array(
            'home_slider' => FALSE,
            'vendor_info' => $vendorInfo,
            'view_port' => 'viewport',
            'view_port_content' => 'width=device-width, initial-scale=1'
        );
        $this->load->view('vendor_info', $data);
    }
    
    function vendor_prefrences($vendor_id = null) {
        $vendorInfo = array();
        $this->load->library('email');
        $this->load->library('form_validation');

        $vendorInfo = $this->Vendor_model->with_region('fields:name')->with_business_category('fields:name')->get($vendor_id);
        $email = $vendorInfo->email;
        $postData = $this->input->post();
        if (!empty($postData)) {

            $this->form_validation->set_rules('wedding_goal1', 'Goal1', 'required');
            $this->form_validation->set_rules('wedding_goal2', 'Goal2', 'required');

            if ($this->form_validation->run() == true) {
                if (!empty($postData['days_avalible_wedding'])) {
                    $days = implode('-', $postData['days_avalible_wedding']);
                    $postData['days_avalible_wedding'] = $days;
                }

                try {
                    $this->Vendor_model->update($postData, $vendor_id);

                    //Confirmation Mail sent
                    $fromemail = "kdloveAdmin@gmail.com";
                    $subject = "Vendor Confirmation Link";
                    
                    $data['mail'] = array(
                        'id' => $vendor_id,
                        'site_url' => base_url()
                    );
                    $mesg = $this->load->view('registeration_confirmation', $data,TRUE);
                      $config = array(
                        'charset' => 'utf-8',
                        'wordwrap' => TRUE,
                        'mailtype' => 'html'
                    );
                    $config['smtp_user'] = ' test1@dnddemo.com';
                    $config['smtp_pass'] = 'Akash@123';

                    $this->email->initialize($config);

                    $this->email->to($email);
                    $this->email->from($fromemail, "Title");
                    $this->email->subject($subject);
                    $this->email->message($mesg);
                    $this->email->send();
                    
                    setMessage('Account Update successfully,You got an confirmation mail', 'success');
                    redirect(base_url('Vendor'));
                } catch (Exception $exc) {
                    setMessage('Account Update not udated,Something went wrong', 'errro');
                    redirect(base_url('Vendor'));
                }
            }
        }

        $data = array(
            'home_slider' => FALSE,
            'vendor_info' => $vendorInfo,
            'view_port' => 'viewport',
            'view_port_content' => 'width=device-width, initial-scale=1'
        );
        $this->load->view('vendor_prefrences', $data);
    }
    
    function vendor_activation($id = null) {
        if (!empty($id)) {
            $vendor_id = base64_decode($id);
            $data = array('active' => 1);
            $link_activeate = $this->Vendor_model->update($data, $vendor_id);
            if ($link_activeate) {
                setMessage('Congratulation your email is confirm , now you can login.');
                redirect(base_url('Vendor'));
            } else {
                setMessage('Something went wrong');
                redirect(base_url('Vendor'));
            }
        }
    }
    
    function upload_files($vendor_id = null) {
        $config['upload_path'] = './uploads/vendor';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('userfile')) {
            $token = $this->input->post('token');
            $file_name = $this->upload->data('file_name');
            $this->db->insert('vendor_attachments', array('file_name' => $file_name, 'vendor_id' => $vendor_id,'token' => $token));
        }
    }
    
    function delete() {
        $token = $this->input->post('token');
        $query = $this->db->get_where('vendor_attachments', array('token' => $token));
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $file_name = $data->file_name;
            if (file_exists($file = FCPATH . '/uploads/vendor/' . $file_name)) {
                unlink($file);
            }
        }
        $this->db->delete('vendor_attachments', array('token' => $token));
        echo json_encode(array('deleted' => true));
    }
    
    function dashboard() {
        if (!$this->Vendor_model->logged_in()) {
            redirect(base_url('Vendor', 'refresh'));
        }

        $data = array(
            'home_slider' => FALSE,
            'view_port' => 'viewport',
            'view_port_content' => 'width=device-width, initial-scale=1'
        );

        $this->load->view('dashboard', $data);
    }
    
    function login() {
        $this->load->library('form_validation');
        $data = array();
        $post = $this->input->post();
        if ($post) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');

            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            if ($this->form_validation->run() == true) {
                $checkLogin = $this->Vendor_model->where(array('email' => $email, 'password' => $password))->get();
                if ($checkLogin) {
                    $this->session->set_userdata('vendor_id', $checkLogin->id);
                    $this->session->set_userdata('vendor_pop', true);
                    setMessage('Login Successfully', 'success');
                    redirect('Vendor/Dashboard');
                } else {
                    setMessage('Wrong email or password, please try again', 'danger');
                    redirect(current_url());
                }
            } else {
                setMessage(validation_errors(), 'warning');
                redirect(current_url());
            }
        }

        $data = array(
            'home_slider' => FALSE,
            'view_port' => 'viewport',
            'view_port_content' => 'width=device-width, initial-scale=1'
        );

        $this->load->view('login', $data);
    }
    
    function logout(){
        $this->session->unset_userdata('vendor_id');
        $this->session->unset_userdata('vendor_pop');
        setMessage('You are successfully logout.', 'success');
        redirect(base_url('Vendor'));
    }

}
