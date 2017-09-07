<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends MY_Controller {

function __construct() {
        parent::__construct();

        $this->load->library('pagination');

      $this->site_data['show_promo'] = $this->Frontend_model->getpromotions();
      $this->site_data['vendor_review'] = $this->Frontend_model->get_vendorReviews();

      $this->site_data['show_recommend'] = $this->Frontend_model->getreommendation();
      $this->site_data['wedding_theme'] = $this->Frontend_model->getAllValues('wedding_theme','id');
    }

  public function index()
  { 
    
    $this->site_data['main_page'] = 'front/main';
    $this->load->view('main_template', $this->site_data);
    // for fetching record for header and footer section

   }

   public function vendor_category(){
    $id = $this->uri->segment(3);
     
      $config = array();
      $config["base_url"] = base_url() . "front/vendor_category/";
      $total_row = $this->Frontend_model->record_count('vendor_cat_id',$id);  
      $config["total_rows"] = $total_row;
      $config["per_page"] = 2;
      $config['use_page_numbers'] = TRUE;
      $config['num_links'] = $total_row;
      $config['cur_tag_open'] = '&nbsp;<a class="current">';
      $config['cur_tag_close'] = '</a>';
      $config['next_link'] = 'Next';
      $config['prev_link'] = 'Previous';
      $this->pagination->initialize($config);

      if($this->uri->segment(3)){
       $page = ($this->uri->segment(3)) ;
      }
      else{
        $page = 1;
      }
      
     $this->site_data['vendor_category'] =  $this->Frontend_model->getAllValues('vendor_category','');

     $this->site_data['vendor_item'] = $this->Frontend_model->fetch_data($page,'vendor_cat_id','wedding_marketplace_items',$config["per_page"]);
     
     $str_links = $this->pagination->create_links();
     $this->site_data["links"] = explode('&nbsp;',$str_links );
     
    //$this->site_data['vendor_item'] = $this->Frontend_model->getAllValueByid($id,'vendor_cat_id','wedding_marketplace_items');
      $this->site_data['main_page'] = 'front/vendor_item_view';
      $this->load->view('main_template', $this->site_data);
   }

   public function couple_register(){

      $this->load->library('email');
      $this->load->library('form_validation');
      
      $email = $this->input->post('register_email');
      $password = $this->input->post('register_password');

      $newdata = array(
                   'email'     => $email,
                   'logged_in' => TRUE,
                   'password' => $password
               );
      $data = array(
              'email'=>isset($email)?$email:"",
              'password'=>isset($password)?$password:""
        );

        $this->form_validation->set_rules('register_email', 'Email', 'valid_email|is_unique[users.email]|required'); 
        $this->form_validation->set_rules('register_password', 'Password', 'min_length[6]|max_length[10]|required');   
        
      if($this->form_validation->run() == true){ 
         $insert_id = $this->Frontend_model->insert_data($data,'users');

      if($insert_id){

          $fromemail="test1@dnddemo.com";
          $toemail = $email;
          $subject = "User Registration";
          $data['mail']=array(
            'email'=>$email,
            'password'=>$password,
            'address'=>'Noida sector 11',
            'id'=>$insert_id,
            'phone'=>'+9797563284' 
            );
          $mesg = $this->load->view('template/registeration_confirmation',$data,true);


          $config=array(
          'charset'=>'utf-8',
          'wordwrap'=> TRUE,
          'mailtype' => 'html'
          );
            $config['smtp_user'] = ' test1@dnddemo.com';
          $config['smtp_pass'] = 'Akash@123';

        $this->email->initialize($config);

        $this->email->to($toemail);
        $this->email->from($fromemail, "Title");
        $this->email->subject($subject);
        $this->email->message($mesg);
        $mail = $this->email->send();

        // $this->session->set_userdata($newdata);
        $this->session->set_flashdata('success','Email is sent to you Please confirm your email.'); 
        redirect('front');
      }

      }

    $this->site_data['main_page'] = 'front/main';
    $this->load->view('main_template', $this->site_data);
        
   }


   public function registeration_confirmation(){

    $id = $this->uri->segment(3);
    $data = array(
      'status'=>'1'
      );
    $update_status = $this->Frontend_model->get_userConfirm($id,$data);
    if($update_status==true){
       $this->session->set_flashdata('success','Congratulation your email is confirm , now you can login.'); 

        redirect('front'); 
    }
   }

   public function couple_login(){


      $this->load->library('form_validation');
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $newdata = array(
                   'email'     => $email,
                   'logged_in' => TRUE,
                   'password' => $password
               );
      $data = array(
              'email'=>isset($email)?$email:"",
              'password'=>isset($password)?$password:""
        );

       $this->form_validation->set_rules('email', 'Email', 'valid_email|required'); 
       $this->form_validation->set_rules('password', 'Password', 'required');   

    if($this->form_validation->run() == true){ 

      $isuser_logged_in = $this->Frontend_model->get_loginUser($email,$password);
      $newdata['user_id'] = $isuser_logged_in['id']; 
      if($isuser_logged_in==true){

        $this->session->set_userdata($newdata);
        $this->session->set_flashdata('success','Logged in successfully.'); 

        redirect('front/dashboard');        
      }
      else{
        $this->session->set_flashdata('error','User not registered or it is inactive.'); 

        redirect('front','refresh');
      }
    }

    $this->site_data['main_page'] = 'front/main';
    $this->load->view('main_template', $this->site_data);
   }


   public function logout(){

    session_destroy();
    redirect('front');
   }


   public function dashboard(){


      if(!$this->session->userdata('email')){
        $this->site_data['main_page'] = 'front/main';
        $this->load->view('main_template', $this->site_data);    
    }else{

     $email =  $this->session->userdata('email');
     $password =  $this->session->userdata('password');


     $this->site_data['profile_details'] =  $this->Frontend_model->get_loginUser($email,$password);


      $this->site_data['main_page'] = 'front/dashboard';
      $this->load->view('main_template', $this->site_data);
    }
   }

   public function user_checklist(){

      $email =  $this->session->userdata('email');
      $password =  $this->session->userdata('password');
      $this->site_data['user_info'] =  $this->Frontend_model->get_loginUser($email,$password);
      $this->site_data['checklist_to_do'] = $this->Frontend_model->get_checklist('1');
      $this->site_data['get_cheked_to_do'] =  $this->Frontend_model->get_checklist('1');
      $this->site_data['checklist_budget'] = $this->Frontend_model->get_checklist('2');
      $this->site_data['checklist_my_vendor'] = $this->Frontend_model->get_checklist('3');
      $this->site_data['main_page'] = 'front/user_checklist';
      $this->load->view('main_template', $this->site_data);
   }

   public function edit_profile(){

      $this->load->library('form_validation');
     $email =  $this->session->userdata('email');
     $password =  $this->session->userdata('password');

     $first_name = $this->input->post('first_name');
     $last_name = $this->input->post('last_name');
     $fiance_first_name = $this->input->post('fiance_first_name');
     $fiance_last_name = $this->input->post('fiance_last_name');
     $user_name = $this->input->post('username');
     $address = $this->input->post('address');
     $apartment = $this->input->post('apartment');
     $city = $this->input->post('city');
     $zipcode = $this->input->post('zipcode');

     $wedding_city = $this->input->post("wedding_city");
     $wedding_date = $this->input->post("wedding_date");
     $budget  = $this->input->post("budget");
     $guest = $this->input->post('guest');
     $event_days = $this->input->post('event_days');
     $theme = $this->input->post('wedding_theme');


      $this->form_validation->set_rules('first_name', 'First name', 'required|alpha'); 
      $this->form_validation->set_rules('last_name', 'Last name', 'required|alpha'); 
      $this->form_validation->set_rules('fiance_first_name', 'Fiance first name', 'required|alpha'); 
      $this->form_validation->set_rules('fiance_last_name', 'Fiance last name', 'required|alpha'); 
      $this->form_validation->set_rules('username', 'Username', 'required'); 
      $this->form_validation->set_rules('address', 'Address', 'required'); 
      $this->form_validation->set_rules('apartment', 'Apartment', 'required'); 
      $this->form_validation->set_rules('city', 'City', 'required|alpha'); 
      $this->form_validation->set_rules('zipcode', 'Zipcode', 'required|numeric'); 

      $this->form_validation->set_rules('wedding_city','Wedding city','required'); 
      $this->form_validation->set_rules('wedding_date','Wedding date','required'); 
      $this->form_validation->set_rules('budget', 'Budget','required|numeric'); 
      $this->form_validation->set_rules('guest', 'Guest','required|numeric'); 
      // $this->form_validation->set_rules('event_days', 'Event days','required'); 


      $this->site_data['wedding_theme'] = $this->Frontend_model->getAllValues('wedding_theme','id');



     if(isset($email) && isset($password)){
      $this->site_data['user_info'] =  $this->Frontend_model->get_loginUser($email,$password);

       $id = $this->site_data['user_info']['id'];
      $this->site_data['wedding_details'] = $this->Frontend_model->get_valueByid($id,'user_id','wedding_details');
      
           if($this->form_validation->run() == true){ 

       $update_profile = array( 
          'first_name'=>isset($first_name)?$first_name:"",
          'last_name'=>isset($last_name)?$last_name:"",
          'fiance_first_name'=>isset($fiance_first_name)?$fiance_first_name:"",
          'fiance_last_name'=>isset($fiance_last_name)?$fiance_last_name:"",
          'username'=>isset($user_name)?$user_name:"",
          'address'=>isset($address)?$address:"",
          'apartment'=>isset($apartment)?$apartment:"",
          'city'=>isset($city)?$city:"",
          'zipcode'=>isset($zipcode)?$zipcode:""
         
        );


        $update_wedding_details = array(
        'wedding_city'=>isset($wedding_city)?$wedding_city:"",
        'wedding_date'=>isset($wedding_date)?$wedding_date:"",
        'budget'=>isset($budget)?$budget:"",
        'guest_count'=>isset($guest)?$guest:"",
         'event_days'=>isset($event_days)?$event_days:"",
         'theme_id'=>isset($theme)?$theme:"" 
        );



      $insert_wedding_details = array(
        'user_id' =>isset($id)?$id:"",
        'wedding_city'=>isset($wedding_city)?$wedding_city:"",
        'wedding_date'=>isset($wedding_date)?$wedding_date:"",
        'budget'=>isset($budget)?$budget:"",
        'guest_count'=>isset($guest)?$guest:"" 
        );
      
        if(empty($this->site_data['wedding_details'])){
        
          $insert_wedding_details = $this->Frontend_model->insert_data($insert_wedding_details,'wedding_details');

        }else{

        $update_weddingDetails =  $this->Frontend_model->update_weddingDetails($id,$update_wedding_details);   
        }
       $update_profile =  $this->Frontend_model->update_userProfile($id,$update_profile);
       if($update_profile){

         $this->session->set_flashdata('success','Profile updated successfully.'); 
        redirect('front/edit_profile');
       }

      }

     }
     $this->site_data['main_page'] = 'front/user_profile';
     $this->load->view('main_template', $this->site_data);

   }


   public function update_email(){
    $this->load->library('email');
    $email = $this->input->post('email');


    $password = $this->input->post('password');
    $session_email =$this->session->userdata('email');

    $is_user_authenticate = $this->Frontend_model->get_loginUser($session_email,$password);
    $first_name = $is_user_authenticate['first_name'];
    $last_name = $is_user_authenticate['last_name'];

    if($is_user_authenticate){

      $update_password = array(
        'email'=>$email
        );
      $is_update_email = $this->Frontend_model->update_email($password,$session_email,$update_password);
      if($is_update_email==true){
        $this->session->set_userdata($update_password);

        // email will be send to user in corresponding to change email 


             $fromemail="test1@dnddemo.com";
          $toemail = $email;
          $subject = "Update Email";
          $data['mail']=array(
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'address'=>'Noida sector 11',
            'content'=>'Dear, Congratulation you have successfully updated your email now you will recieve all mail in your new email.',
            'email'=>$email, 
            'phone'=>'+9797563284' 
            );
          $mesg = $this->load->view('template/update_email_template',$data,true);

          $config['smtp_user'] = 'test1@dnddemo.com';
          $config['smtp_pass'] = 'Akash@123';

          $config['protocol'] = "smtp";
          $config['smtp_host'] = "ssl://smtp.gmail.com";
          $config['smtp_port'] = "465";

          $config=array(
          'charset'=>'utf-8',
          'wordwrap'=> TRUE,
          'mailtype' => 'html'
          );


        $this->email->initialize($config);

        $this->email->to($toemail);
        $this->email->from($fromemail, "Title");
        $this->email->subject($subject);
        $this->email->message($mesg);
        $mail = $this->email->send();

        // end of email sending process


        $this->session->set_flashdata('success','Email updated successfully.'); 
        redirect('front/edit_profile');
      }

    }else{
       $this->session->set_flashdata('error','Password is incorrect.'); 
        redirect('front/edit_profile');
    }



   }


    public function update_password(){

    $this->load->library('form_validation');
    $this->load->library('email');
    $password = $this->input->post('current_password');

    $new_password = $this->input->post('password');
     $session_email =$this->session->userdata('email');

    $this->form_validation->set_rules('current_password','Current Password','required');
    $this->form_validation->set_rules('password','Password','min_length[6]|max_length[10]|required');
    $this->form_validation->set_rules('confirm_password','confirm Password','required|matches[password]');

    if($this->form_validation->run() == true){ 

    $is_user_authenticate = $this->Frontend_model->is_UserExist($password);

    echo $first_name = $is_user_authenticate['first_name'];
    echo $last_name = $is_user_authenticate['last_name'];
    die;

    $id = $is_user_authenticate['id'];

    if($is_user_authenticate){
    
      $update_password = array(
        'password'=>$new_password
        );
      $is_update_pass = $this->Frontend_model->update_password($id,$update_password);
      if($is_update_pass==true){
        $this->session->set_userdata($update_password);

        // email will be send to user in corresponding to change email 

          $fromemail="test1@dnddemo.com";
          $toemail = $session_email;
          $subject = "Password Update";
            

          $data['mail']=array(
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'address'=>'Noida sector 11',
            'content'=>'Dear, Congratulation you have successfully updated your password.',
            'email'=>$session_email, 
            'phone'=>'+9797563284' 
            );
          $mesg = $this->load->view('template/update_email_template',$data,true);

          $config['smtp_user'] = ' test1@dnddemo.com';
          $config['smtp_pass'] = 'Akash@123';

          $config['protocol'] = "smtp";
          $config['smtp_host'] = "ssl://smtp.gmail.com";
          $config['smtp_port'] = "465";

          $config=array(
          'charset'=>'utf-8',
          'wordwrap'=> TRUE,
          'mailtype' => 'html'
          );

        $this->email->initialize($config);

        $this->email->to($toemail);
        $this->email->from($fromemail, "Kdeventplaces");
        $this->email->subject($subject);
        $this->email->message($mesg);
        $mail = $this->email->send();

        // end of email sending process
          
        $this->session->set_flashdata('success','Password updated successfully.'); 
        redirect('front/edit_profile');
      }

    }else{
       $this->session->set_flashdata('error','Password is incorrect.'); 
        redirect('front/edit_profile');
    }
  }

      $this->site_data['main_page'] = 'front/user_profile';
     $this->load->view('main_template', $this->site_data);

   }



    public function upload_files(){

    $config['upload_path']   = './uploads/';
    $config['allowed_types'] = '*';
    $this->load->library('upload',$config);

    if($this->upload->do_upload('userfile'))
    {
      $token=$this->input->post('token');
      $file_name=$this->upload->data('file_name');
    //  $this->db->insert('file',array('file_name'=>$file_name,'token'=>$token));
    }
  }


public function img_crop_to_file() {
     
$imgUrl = $_POST['imgUrl'];
// original sizes
$imgInitW = $_POST['imgInitW'];
$imgInitH = $_POST['imgInitH'];
// resized sizes
$imgW = $_POST['imgW'];
$imgH = $_POST['imgH'];
// offsets
$imgY1 = $_POST['imgY1'];
$imgX1 = $_POST['imgX1'];
// crop box
$cropW = $_POST['cropW'];
$cropH = $_POST['cropH'];
// rotation angle
$angle = $_POST['rotation'];

$jpeg_quality = 100;

$output_filename = "temp/croppedImg_".rand();

// uncomment line below to save the cropped image in the same location as the original image.
//$output_filename = dirname($imgUrl). "/croppedImg_".rand();

$what = getimagesize($imgUrl);

switch(strtolower($what['mime']))
{
    case 'image/png':
        $img_r = imagecreatefrompng($imgUrl);
    $source_image = imagecreatefrompng($imgUrl);
    $type = '.png';
        break;
    case 'image/jpeg':
        $img_r = imagecreatefromjpeg($imgUrl);
    $source_image = imagecreatefromjpeg($imgUrl);
    error_log("jpg");
    $type = '.jpeg';
        break;
    case 'image/gif':
        $img_r = imagecreatefromgif($imgUrl);
    $source_image = imagecreatefromgif($imgUrl);
    $type = '.gif';
        break;
    default: die('image type not supported');
}


//Check write Access to Directory

if(!is_writable(dirname($output_filename))){
  $response = Array(
      "status" => 'error',
      "message" => 'Can`t write cropped File'
    );  
}else{

    // resize the original image to size of editor
    $resizedImage = imagecreatetruecolor($imgW, $imgH);
  imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, $imgH, $imgInitW, $imgInitH);
    // rotate the rezized image
    $rotated_image = imagerotate($resizedImage, -$angle, 0);
    // find new width & height of rotated image
    $rotated_width = imagesx($rotated_image);
    $rotated_height = imagesy($rotated_image);
    // diff between rotated & original sizes
    $dx = $rotated_width - $imgW;
    $dy = $rotated_height - $imgH;
    // crop rotated image to fit into original rezized rectangle
  $cropped_rotated_image = imagecreatetruecolor($imgW, $imgH);
  imagecolortransparent($cropped_rotated_image, imagecolorallocate($cropped_rotated_image, 0, 0, 0));
  imagecopyresampled($cropped_rotated_image, $rotated_image, 0, 0, $dx / 2, $dy / 2, $imgW, $imgH, $imgW, $imgH);
  // crop image into selected area
  $final_image = imagecreatetruecolor($cropW, $cropH);
  imagecolortransparent($final_image, imagecolorallocate($final_image, 0, 0, 0));
  imagecopyresampled($final_image, $cropped_rotated_image, 0, 0, $imgX1, $imgY1, $cropW, $cropH, $cropW, $cropH);
  // finally output png image
  //imagepng($final_image, $output_filename.$type, $png_quality);
  imagejpeg($final_image, $output_filename.$type, $jpeg_quality);
  $response = Array(
      "status" => 'success',
      "url" => base_url(). $output_filename.$type
    );
}
print json_encode($response);     
 }
 
 public function img_save_to_file(){
    
/*
* !!! THIS IS JUST AN EXAMPLE !!!, PLEASE USE ImageMagick or some other quality image processing libraries
*/
    $imagePath =  "uploads/";
    

  $allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
  $temp = explode(".", $_FILES["img"]["name"]);
  $extension = end($temp);
  
  //Check write Access to Directory

  if(!is_writable($imagePath)){
    $response = Array(
      "status" => 'error',
      "message" =>  $imagePath
    );
    print json_encode($response);
    return;
  }
  
  if ( in_array($extension, $allowedExts))
    {
    if ($_FILES["img"]["error"] > 0)
    {
       $response = array(
        "status" => 'error',
        "message" => 'ERROR Return Code: '. $_FILES["img"]["error"],
      );      
    }
    else
    {
      
        $filename = $_FILES["img"]["tmp_name"];
      list($width, $height) = getimagesize( $filename );

      move_uploaded_file($filename,  $imagePath . $_FILES["img"]["name"]);

      $response = array(
      "status" => 'success',
      "url" => base_url(). $imagePath.$_FILES["img"]["name"],
      "width" => $width,
      "height" => $height
      );  
      
      $email =  $this->session->userdata('email');
      $password =  $this->session->userdata('password');

      $this->site_data['profile_details'] =  $this->Frontend_model->get_loginUser($email,$password);
      $user_id = $this->site_data['profile_details']['id'];
      $update_image = array(
        'image'=>$response['url']
        );
      $update_image = $this->Frontend_model->update_image($user_id,$update_image);

        $this->session->set_flashdata('success','Profile image uploaded successfully.'); 
        // redirect('front/dashboard');

      }
    }
  else
    {
     $response = array(
      "status" => 'error',
      "message" => 'something went wrong, most likely file is to large for upload. check upload_max_filesize, post_max_size and memory_limit in you php.ini',
    );
    }
    
    print json_encode($response);
 }



 /*
  function : checklist
  @author : akash
 */ 

  public function checklist_task(){


    $checklist_val = $this->input_post('checklist');
    

  }
  
}
    

?>