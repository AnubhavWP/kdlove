<?php
/**
 * @author Jeevan
 * @date 31-aug-2017
 * @description this controller  is for vendor related operation like save preferences dashboard etc.
 * @uses MX_Controller::Used HMVC functionality override ci controller.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->output->set_meta('description', 'Vendor Settings');
        $this->output->set_meta('title', 'Vendor Settings');
        $this->output->set_title('Vendor Settings');
        $this->output->set_template('dashboard');
        $this->load->model('Vendor_business_category_model');
        $this->load->model('Vendor_model');
        $this->load->model('Region_model');
        $this->load->model('Vendor_user_model');
        
        $vendor_id = $this->Vendor_model->get_vendor_id();
        $this->vendor_id = $vendor_id;
        $vendorInfo = $this->Vendor_model->with_region('fields:name')->with_business_category('fields:name')->with_users()->get($this->vendor_id);
        
        $this->vendor_info = $vendorInfo;
        
    }

    public function index() {
        if (!$this->Vendor_model->logged_in()) {
            redirect(base_url('Vendor', 'refresh'));
        }
        
    }
    
    function update_business_logo() {
        
        echo 'hererer';die;
        $data = array(
            'home_slider' => FALSE,
            'view_port' => 'viewport',
            'view_port_content' => 'width=device-width, initial-scale=1',
            'vendor_info' => $this->vendor_info,
            'current_plan' => $currentPlan
        );

        $this->load->view('review_sorting', $data);
    }

}
