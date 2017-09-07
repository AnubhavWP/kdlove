<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planning extends MY_Controller {

function __construct() {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->model('Frontend_model');
        $this->load->library('form_validation');
    }

  public function index()
   {   
    
	 }
   public function budget_calculator(){


      $this->site_data['main_page'] = 'front/welcome_budget';
      $this->load->view('main_template', $this->site_data);  
   }
   public function checklist(){

      $this->site_data['main_page'] = 'front/welcome_checklist';
      $this->load->view('main_template', $this->site_data);  
   }

   public function guestlist_manager(){

      $this->site_data['main_page'] = 'front/welcome_guestlist';
      $this->load->view('main_template', $this->site_data);  
   }

   public function checklist_task(){

      $check_val_id = $this->input->post('id');
      $user_id = $this->input->post('user_id');
      print_r($this->input->post());  
      $data = array(
        'check_value_id'=>isset($check_val_id)?$check_val_id:"",
        'user_id'=>isset($user_id)?$user_id:"",
        'is_done'=>'1'  
        );

      $check_insert_id = $this->Frontend_model->insert_data($data,'checklist_task');
   }
   public function add_note(){

    $id = $this->input->post('task_id');
    $note = $this->input->post('note');
    $note_date =$this->input->post('note_date');

    $is_task_exist = $this->Frontend_model->get_valueByid($id,'checklist_id','checklist_note');
    

    $data = array(
      'checklist_id'=>isset($id)?$id:"",
      'note'=>isset($note)?$note:"",
      'note_date'=>isset($note_date)?$note_date:""
      );


    if(!empty($id) && empty($is_task_exist)){
      $add_note = $this->Frontend_model->insert_data($data,'checklist_note');
      $this->session->set_flashdata('success','Note has been added.');  
      }else{
        $update_data = array(
          'note'=>isset($note)?$note:"",
          'note_date'=>isset($note_date)?$note_date:""
          );
        $updateData = $this->Frontend_model->update_note($id,'checklist_note',$update_data);
        
       $this->session->set_flashdata('success','Note updated successfully.');  
      }
    
   }

   public function check_noteExist(){

      $id = $this->input->post('task_id');
      $is_task_exist = $this->Frontend_model->get_valueByid($id,'checklist_id','checklist_note');

      if(!empty($is_task_exist)){

      echo json_encode($is_task_exist);
    }
   }

   public function check_guestExist(){

      $id = $this->input->post('guest_id');
      $is_guest_exist = $this->Frontend_model->get_valueByid($id,'id','guestlist');

      if(!empty($is_guest_exist)){

      echo json_encode($is_guest_exist);
    }

   }

   public function delete_note(){

      $id = $this->input->post('id');
      $data = array(
        'status'=>'0'
        );

     $delete_task = $this->Frontend_model->updateData($id,'checklist_values',$data);
     
   }

   public function guest_list_event(){

      $this->site_data['guestlist'] = $this->Frontend_model->getAllValues('guestlist','id');
      $this->site_data['main_page'] = 'front/guest_list_event';
      $this->load->view('main_template', $this->site_data);  
   }
   public function add_guest(){

    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $role = $this->input->post('role');
    $phone = $this->input->post('phone');
    $email = $this->input->post('email');
    $address = $this->input->post('address');
    $invitation_sent = $this->input->post('invitation_sent');
    $thank_sent =$this->input->post('thank_sent');
    $gift = $this->input->post('gift');
    $rsvp = $this->input->post('rsvp');
    $guest_id = $this->input->post('guest_id');

    $data = array(
      'first_name'=>isset($first_name)?$first_name:'',
      'last_name'=>isset($last_name)?$last_name:'',
      'role'=>isset($role)?$role:'',
      'phone'=>isset($phone)?$phone:'',
      'email'=>isset($email)?$email:'',
      'address'=>isset($address)?$address:'',
      'invitation_sent'=>isset($invitation_sent)?$invitation_sent:'',
      'thank_sent'=>isset($thank_sent)?$thank_sent:'',
      'gift'=>isset($gift)?$gift:'',
      'rsvp'=>isset($rsvp)?$rsvp:''
      );

    if(!empty($guest_id)){

         $update_guest = $this->Frontend_model->updateData($guest_id,'guestlist',$data);
         $this->session->set_flashdata('success','Guest updated successfully.');  
         redirect('planning/guest_list_event');
    }else{

      $add_guest = $this->Frontend_model->insert_data($data,'guestlist');
    }
      if($add_guest){
         $this->session->set_flashdata('success','Guest added successfully.');  
         redirect('planning/guest_list_event');
      }else{
         $this->session->set_flashdata('error','Guest not added.');  
         redirect('planning/guest_list_event');
      }
   }

   public function import_guestList(){
    echo "<pre>";
    print_r($this->input->post());
   }

   public function update_guest(){

    $guest_id = $this->input->post('guest_id');
    $invite_sent = $this->input->post('invite_sent');
    $thanks_sent = $this->input->post('thanks_sent');
    $rsvp = $this->input->post('rsvp');
    $note = $this->input->post('note');

    if(isset($invite_sent)){
      $update_invitation = array(
        'invitation_sent'=>isset($invite_sent)?$invite_sent:""
        );
      $update_invitationSent = $this->Frontend_model->updateData($guest_id,'guestlist',$update_invitation);
    }else if($thanks_sent){

      $update_thanks = array(
        'thank_sent'=>isset($thanks_sent)?$thanks_sent:""
        );

      $update_invitationSent = $this->Frontend_model->updateData($guest_id,'guestlist',$update_thanks);
    }else if($rsvp){

      $update_rsvp = array(
        'rsvp'=>isset($rsvp)?$rsvp:""
        );

      $update_invitationSent = $this->Frontend_model->updateData($guest_id,'guestlist',$update_rsvp);   
    }else if($note){

      $update_note = array(
        'note'=>isset($note)?$note:""
        );

      $update_invitationSent = $this->Frontend_model->updateData($guest_id,'guestlist',$update_note);      
    }

   }
}
?>