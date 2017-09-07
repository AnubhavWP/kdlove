<?php

/**
 * @package    CI
 * @subpackage Controller
 * @author     Jeevan<jeevan@tisindiasupport.com>
 * @description  Handle all type of ajax requerst with response.
 */
Class AjaxController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/User_model');
        $this->load->model('admin/Role_model');
        $this->load->model('admin/Category_model');
        $this->load->model('admin/Product_model');
        $this->load->model('admin/Attribute_model');
        $this->load->model('admin/Attribute_value_model');
        $this->load->model('admin/Cms_model');
        $this->load->model('admin/Blog_model');
        $this->load->model('admin/Faq_model');
        $this->load->model('admin/Customer_model');
        $this->load->model('admin/Online_store_model');
        $this->load->model('admin/Store_category_model');
    }

    /**
     * @method  getAssociatedState
     * @description  It used to list of all associative state based on country id.
     * @param int id
     * @return all category list html dropdown format
     * */
    function getAssociatedSubCategory() {
        $id = $this->input->post('id');
        if (!empty($id)) {
            $subCatList = getSubcategory($id);
            if ($subCatList) {
                $subCategoryDropdown = '<section>';
                $subCategoryDropdown .= '<label class="label">Sub Category</label>';
                $subCategoryDropdown .= '<label class="select">';
                $subCategoryDropdown .= '<select name="sub_category_id">';
                if ($subCatList && count($subCatList) > 0) {
                    $subCategoryDropdown .= '<option value="">Select</option>';
                    foreach ($subCatList as $key => $subcat) {
                        $subCategoryDropdown .= '<option value="' . $subcat->id . '">' . $subcat->category . '</option>';
                    }
                }
                $subCategoryDropdown .= '</select>';
                $subCategoryDropdown .= '</label>';
                $subCategoryDropdown .= '</section>';
                echo $subCategoryDropdown;
                exit();
            }
        }
    }

    function deleteCommonAttribute() {
        $responseArray = array();
        $id = $this->input->post('id');
        $model = $this->input->post('deleteModel');
        $message = $this->input->post('successMsg');

        if ($id != "") {
            try {
                $del = $this->$model->delete($id);
                if ($del) {
                    $responseArray['response'] = 'true';
                    $responseArray['message'] = 'Succesfully Deleted';
                } else {
                    $responseArray['response'] = 'false';
                    $responseArray['message'] = 'Something Went Wrong! Please Try again';
                }
            } catch (Exception $e) {
                $responseArray['response'] = 'false';
                $responseArray['message'] = 'Something Went Wrong! Please Try again';
            }
        }
        echo json_encode($responseArray);
        die;
    }

    function GetNextAttributeRow() {
        $base_url = $this->input->post('base_url');
        $attributes = getAllAtributes();
        $products = getAllAtributesValue();
        $seldurationFrom = '<select name="attribute_id[]"  title="Select"><option value="">Select</option>';

        if (count($attributes) > 0) {
            foreach ($attributes as $attr) {
                $seldurationFrom .= '<option value="' . $attr->id . '">' . $attr->name . '</option>';
            }
        }
        $seldurationFrom .= '</select>';

        $seldurationTo = '<select name="value_id[]"  title="Select"><option value="">Select</option>';

        if (count($products) > 0) {
            foreach ($products as $att_value) {
                $seldurationTo .= '<option value="' . $att_value->id . '">' . $att_value->name . '</option>';
            }
        }

        $seldurationTo .= '</select>';

        $fldrow = '';
        $fldrow .= '<div class="product_attr_row clearfix"><div class="col-lg-4 padding-10"><section><label class = "label">Product Attributes</label><label class = "select">' . $seldurationFrom . '</div></section>';
        $fldrow .= '<div class="col-lg-4 padding-10"><section><label class = "label">Values</label><label class = "select">' . $seldurationTo . '</div></section>';
        $fldrow .= '<div class = "col-lg-2"><a href = "" id = "remove_row" class = "delete-row"><img src=' . $base_url . 'assets/admin/img/minus.png alt="remove"></a></div>';
        $fldrow .= '</div>';
        echo $fldrow;
        exit();
    }

    function productActivate() {
        $responseArray = array();
        $id = $this->input->post('id');
        $product = $this->input->post('show_home');

        if ($this->input->is_ajax_request()) {
            try {
                $data = array('show_home' => $product);
                $this->db->where('id', $id);
                $act = $this->db->update('product', $data);

                if ($act) {
                    $responseArray['response'] = 'true';
                    $responseArray['message'] = 'Product successfully updated';
                } else {
                    $responseArray['response'] = 'false';
                    $responseArray['message'] = 'Something Went Wrong! Please Try again';
                }
            } catch (Exception $e) {
                $responseArray['response'] = 'false';
                $responseArray['message'] = 'Something Went Wrong! Please Try again';
            }
            echo json_encode($responseArray);
            die;
        }
    }

    function addItemWishlist() {
        $responseArray = array();
        $pid = $this->input->post('pid');
        $ip = $this->input->ip_address();
        $user_id = $this->session->userdata('userId');

        $inserArray = array(
            'user_id' => $user_id,
            'product_id' => $pid,
            'ip' => $ip
        );
        if ($pid != "") {
            $exist = isUnique('user_wishlist', array('user_id' => $user_id, 'product_id' => $pid));
            if ($exist) {
                try {
                    $del = $this->Product_model->addWishlist($inserArray);
                    if ($del) {
                        $responseArray['response'] = 'true';
                    } else {
                        $responseArray['response'] = 'false';
                    }
                } catch (Exception $e) {
                    $responseArray['response'] = 'false';
                }
            } else {
                $responseArray['response'] = 'already-exist';
            }
        }
        echo json_encode($responseArray);
        die;
    }

    function loadmore() {
        $data = array();
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');
        $category_id = $this->input->post('category_id');
        
        $result = $this->Product_model->getAdminCuratedProduct($offset, $limit,$category_id);
        $data['view'] = $result['view'];
        $data['offset'] = $offset + 4;
        $data['limit'] = $limit;
        echo json_encode($data);
        die;
    }

    function getProductByCategory() {
        $responsArray = array();
        
        $id = $this->input->post('id');
        if ($id == 'all') {
            $conditions = array();
        }else{
           $conditions = array(
                'category_id' => $id
            );
        }
       
        $prductList = $this->Product_model->with_category('fields:category,url,id')->with_store('fields:store_name,id')->where($conditions)->limit(4)->get_all();
//        dump($prductList);die;
        $img_path = '';
        $productHtml = '';
        $counter= 1;
        if (!empty($prductList)) {
            foreach ($prductList as $product) {
                
                $store_name = !empty($product->store) ? $product->store->store_name : '';
                
                if ($counter % 4 == 1) {
                    $productHtml .= "<div class='clearfix'></div>";
                }
                if (!empty($product->medium_image)) {
                    if (filter_var($product->medium_image, FILTER_VALIDATE_URL)) {
                        $img_path = $product->medium_image;
                    } else {
                        $absolute_path = FCPATH . 'uploads/product/' . $product->medium_image;
                        if (file_exists($absolute_path)) {
                            $img_path = base_url() . 'uploads/product/' . $product->medium_image;
                        } else {
                            $img_path = base_url() . 'uploads/product/default.png';
                        }
                    }
                } else {
                    $img_path = base_url() . 'uploads/product/default.png';
                }

                if (!empty($loggedIn)) {
                    $wishListHtml = "<span class='pull-right wishlist'><a href= '#' pro-id =". $product->id . " class='product-btn btn-icon top-right' title='Favorite'><i class='fa fa-heart'></i></a></span>";
                } else {
                    $wishListHtml = '';
                }
               
                 $productHtml .= "<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12 pr-15 pl-5'>
                    <div class='productdiv'>
                            <div class='productprice'>".$product->price."</div>
                            <a href=".base_url()."/product/".$product->url." target='_blank'>
                                <img src='".base_url().'image_resize.php?&w=250&h=250&img='.$img_path."' class='img-responsive'>
                            </a>
                            <div class='producttitlename'>".substr($product->title,0,50)."...</div>
                            <div class='whitebgprd'>
                            <div class='productshare sociaicon".$product->id."'><ul><li class='facebook1'><a href=". base_url()."><i class='fa fa-facebook'></i></a></li><li class='twitter1'><a href=". base_url()."><i class='fa fa-twitter'></i></a></li><li class='comments'><a href=". base_url()."><i class='fa fa-comments'></i></a></li><li class='whatsup'><a href=". base_url()."><i class='fa fa-whatsapp'></i></a></li></ul></div>
                                <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 p-0'><div class='sellernaame'>".$store_name."</div></div>
                            <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 p-0'>
                            <span class='pull-right social-share'><div class='shareicon' pro-id = ".$product->id."><i class='fa fa-share-alt'></i></div></span>
                                ".$wishListHtml."
                        </div>
                        </div>
                        </div>
                    </div>";
                
               $counter++; 
            }
            $productHtml .= "<div class = 'clearfix'></div>";
            $responsArray['response'] = 'true';
            $responsArray['html'] = $productHtml;
        } else {
            $responsArray['response'] = 'false';
            $responsArray['html'] = '<div class="no-items">No Records Found.</div>';
        }
        echo json_encode($responsArray);
        die;
    }

}
