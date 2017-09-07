<?php
/**
 * @author Jeevan
 * @date 31-aug-2017
 * @description this controller  is for vendor related operation like save preferences dashboard etc.
 * @uses MX_Controller::Used HMVC functionality override ci controller.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->output->set_meta('description', 'Vendor Dashboard');
        $this->output->set_meta('title', 'Vendor Dashboard');
        $this->output->set_title('Vendor Dashboard');
        $this->output->set_template('dashboard');
        $this->load->model('Vendor_business_category_model');
        $this->load->model('Vendor_model');
        $this->load->model('Region_model');
        $this->load->model('Vendor_user_model');
        $this->load->model('Vendor_review_request_model');
        
        $vendor_id = $this->Vendor_model->get_vendor_id();
        $this->vendor_id = $vendor_id;
        $vendorInfo = $this->Vendor_model->with_region('fields:name')->with_business_category('fields:name')->with_users()->get($this->vendor_id);
        
        $this->vendor_info = $vendorInfo;
        
    }

    public function index() {
        if (!$this->Vendor_model->logged_in()) {
            redirect(base_url('Vendor/login', 'refresh'));
        }
        $data = array(
            'home_slider' => FALSE,
            'view_port' => 'viewport',
            'view_port_content' => 'width=device-width, initial-scale=1',
            'vendor_info' => $this->vendor_info,
        );

        $this->load->view('dashboard', $data);
    }
    
    function add_employee(){
        $postData = array();
        $postData = $this->input->post();
        
        if(!empty($postData)){
            $postData['vendor_id'] = $this->vendor_id;
            if(!empty($postData['email_signature']) && is_array($postData['email_signature'])){
                $signature = implode('-', $postData['email_signature']);
                $postData['email_signature'] = $signature;
            }
//            dump($postData);die;
            $id = $this->Vendor_user_model->insert($postData);
            if($id){
                setMessage('Employee add successfully','success');
                redirect('Vendor/Dashboard');
            }else{
                setMessage('Employee not added ! Something went wrong','success');
                redirect('Vendor/Dashboard');
            }
        }
       
        $data = array(
            'home_slider' => FALSE,
            'view_port' => 'viewport',
            'view_port_content' => 'width=device-width, initial-scale=1',
            'vendor_info' => $this->vendor_info,
        );

        $this->load->view('employee/employee_register', $data);
    }
    
    function UpdateVendorEmployee($id = null) {
        $userData = array();
        $postData = $this->input->post();
        if (!empty($id)) {
            $userData = $this->Vendor_user_model->get($id);
        }
        if (!empty($postData)) {
          
            $postData['vendor_id'] = $this->vendor_id;
            if (!empty($postData['email_signature']) && is_array($postData['email_signature'])) {
                $signature = implode('-', $postData['email_signature']);
                $postData['email_signature'] = $signature;
                
                if(!key_exists('review_notification', $postData)){
                    $postData['review_notification'] = '0';
                }
                if(!key_exists('endorsement_notificaiton', $postData)){
                    $postData['endorsement_notificaiton'] = '0';
                }
                if(!key_exists('assocation_notificaiton', $postData)){
                    $postData['assocation_notificaiton'] = '0';
                }
                if(!key_exists('monthly_activity_notification', $postData)){
                    $postData['monthly_activity_notification'] = '0';
                }
                if(!key_exists('reveiw_reminder_notification', $postData)){
                    $postData['reveiw_reminder_notification'] = '0';
                }
                if(!key_exists('pro_education', $postData)){
                    $postData['pro_education'] = '0';
                }
                if(!key_exists('kdevent_updates', $postData)){
                    $postData['kdevent_updates'] = '0';
                }
                if(!key_exists('local_events', $postData)){
                    $postData['local_events'] = '0';
                }
                if(!key_exists('network_update', $postData)){
                    $postData['network_update'] = '0';
                }
                 if(!key_exists('kd_discount', $postData)){
                    $postData['kd_discount'] = '0';
                }
                 if(!key_exists('welcome_email', $postData)){
                    $postData['welcome_email'] = '0';
                }
                 if(!key_exists('partner_offers', $postData)){
                    $postData['partner_offers'] = '0';
                }
                if(!key_exists('facebook_opprunities', $postData)){
                    $postData['facebook_opprunities'] = '0';
                }
//                dump($postData);die;
            }
            $id = $this->Vendor_user_model->update($postData,$id);
            if ($id) {
                setMessage('Employee information updated successfully', 'success');
                redirect('Vendor/Dashboard');
            } else {
                setMessage('Employee information not updated! Something went wrong', 'success');
                redirect('Vendor/Dashboard');
            }
        }

        $data = array(
            'home_slider' => FALSE,
            'view_port' => 'viewport',
            'view_port_content' => 'width=device-width, initial-scale=1',
            'user_data' => $userData,
        );

        $this->load->view('employee/employee_update', $data);
    }

    function DeleteVendorEmployee($id = null) {
        if (!empty($id)) {
            try {
                $id = $this->Vendor_user_model->delete($id);
                if ($id) {
                    setMessage('Employee Deleted successfully', 'success');
                    redirect('Vendor/Dashboard');
                } else {
                    setMessage('Employee not deleted! Something went wrong', 'danger');
                    redirect('Vendor/Dashboard');
                }
            } catch (Exception $exc) {
                setMessage('Something went wrong', 'success');
                redirect('Vendor/Dashboard');
            }
        }
    }
    
    function review_sorting(){
        
        $currentPlan = getCurrentPlan($this->vendor_id);
        $data = array(
            'home_slider' => FALSE,
            'view_port' => 'viewport',
            'view_port_content' => 'width=device-width, initial-scale=1',
            'vendor_info' => $this->vendor_info,
            'current_plan' => $currentPlan
        );

        $this->load->view('review_sorting', $data);
    }
    
    function quick_leads() {
        $currentPlan = getCurrentPlan($this->vendor_id);
        $data = array(
            'home_slider' => FALSE,
            'view_port' => 'viewport',
            'view_port_content' => 'width=device-width, initial-scale=1',
            'vendor_info' => $this->vendor_info,
            'current_plan' => $currentPlan
        );

        $this->load->view('quick_leads', $data);
    }
    
    function vendor_business_information() {
        $buisenss_category = $this->Vendor_business_category_model->as_dropdown('name')->get_all();
        $catArray = array();
        $postData = $this->input->post();
        if (!empty($postData)) {
            $vendorData = returnValidData('vendor', $postData);

            if (!empty($postData['business_cat'])) {
                $this->Vendor_business_category_model->removeVendorBusinessCat($this->vendor_id);
                foreach ($postData['business_cat'] as $k => $v) {
                    $catArray[$k]['category_id'] = $v;
                    $catArray[$k]['vendor_id'] = $this->vendor_id;
                }
                $this->db->insert_batch('requeste_vendor_business_category', $catArray);
            }
            $id = $this->Vendor_model->update($vendorData, $this->vendor_id);
            if ($id) {
                setMessage('Business information updated successfully', 'success');
                redirect(current_url());
            } else {
                setMessage('Oops Something went wrong', 'danger');
                redirect(current_url());
            }
        }

        $data = array(
            'home_slider' => FALSE,
            'view_port' => 'viewport',
            'view_port_content' => 'width=device-width, initial-scale=1',
            'vendor_info' => $this->vendor_info,
            'business_category' => $buisenss_category,
        );

        $this->load->view('business_info', $data);
    }
    
    function addNewReveiwTemplate($id = null) {
        $editData = array();
        if (!empty($id)) {
            $editData = $this->Vendor_review_request_model->get($id);
        }
        $postData = $this->input->post();

        if (!empty($postData)) {
            $postData['vendor_id'] = $this->vendor_id;

            if (!empty($id)) {
                $editData = $this->Vendor_review_request_model->update($postData, $id);
                if (!empty($postData['is_default'])) {
                defaut_template_update($id);
            }
                setMessage('Email Template updated successfully', 'success');
                redirect('Vendor/Dashboard/review_request');
            }

            $id = $this->Vendor_review_request_model->insert($postData, TRUE);
            if (!empty($postData['is_default'])) {
                defaut_template_update($id);
            }

            if ($id) {
                setMessage('Email Template added successfully', 'success');
                redirect('Vendor/Dashboard/review_request');
            } else {
                setMessage('Oops Something went wrong', 'danger');
               redirect('Vendor/Dashboard/review_request');
            }
        }

        $data = array(
            'home_slider' => FALSE,
            'view_port' => 'viewport',
            'view_port_content' => 'width=device-width, initial-scale=1',
            'vendor_info' => $this->vendor_info,
            'edit_data' => $editData
        );

        $this->load->view('review_request_new', $data);
    }

    function review_request() {

        $email_template = $this->Vendor_review_request_model->where('vendor_id', $this->vendor_id)->get_all();

        $data = array(
            'home_slider' => FALSE,
            'view_port' => 'viewport',
            'view_port_content' => 'width=device-width, initial-scale=1',
            'templates' => $email_template,
        );

        $this->load->view('review_request', $data);
    }
    
    function DeleteRequestEmailTemplate($id = null) {
        if (!empty($id)) {
            try {
                $id = $this->Vendor_review_request_model->delete($id);
                if ($id) {
                    setMessage('Template Deleted successfully', 'success');
                    redirect('Vendor/Dashboard/review_request');
                } else {
                    setMessage('Template not deleted! Something went wrong', 'danger');
                    redirect('Vendor/Dashboard/review_request');
                }
            } catch (Exception $exc) {
                setMessage('Something went wrong', 'success');
                redirect('Vendor/Dashboard/review_request');
            }
        }
    }

}
