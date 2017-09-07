<?php
function removeExtraspace($str) {
    $trimstr = trim($str);
    return $new_str = preg_replace('/\s+/', ' ', $trimstr);
}

function dump($array = array(),$line = '') {
    echo '<pre>';
    if(!empty($line)){
         echo 'Debug Line is '.$line.'<br>';
    }
    print_r($array);
    echo '</pre>';
}

/**
 * @method string valid_url()
 * @method validate url
 * @return true/false.
 */
function valid_url($url) {
    # call back function to validate urls	
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $this->form_validation->set_message('valid_url', 'The %s field invalid');
        return FALSE;
    }
    return TRUE;
}
/*
 * @method string valid_phone()
 * @method validate phone  number
 * @return true/false.
 */
function valid_phone($input) {
    # call back function to validate phone
    $pattern = '/^[0-9-+()\s]+$/';
    $vld = preg_match($pattern, $input) ? true : false;
    if (!$vld) {
        $this->form_validation->set_message('valid_phone', 'The %s field invalid');
        return FALSE;
    }
    return TRUE;
}

function trim_str($string, $length = 60) {
    if (!empty($string)) {
        if (mb_strlen($string, 'utf-8') > $length) {
            $stringLength = mb_strlen($string, 'utf-8');
            $string .= ' ';
            $strPos = mb_strpos($string, ' ', $length, 'utf-8');
            $strPos = (empty($strPos) ? $length : $strPos);
            $string = mb_substr($string, 0, $strPos, 'utf-8') . (($stringLength > $strPos) ? ('...') : NULL);
        }
    }
    $string = trim($string);
    return $string;
}

function getState($countryID) {
    $CI = & get_instance();
    $CI->db->select('id,name');
    $CI->db->where('states.country_id', $countryID);
    $CI->db->where('states.status', TRUE);
    $query = $CI->db->get('states');
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return false;
    }
    return false;
}

function getSubcategory($cat_id = null) {
    $CI = & get_instance();
    $CI->db->select('id,category');
    $CI->db->where('category.parent_id', $cat_id);
    $query = $CI->db->get('category');
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return false;
    }
    return false;
}

function commonDropDownType($type) {
    if ($type == 1) {
        $table = 'tour_type_group';
    } else {
        $table = 'activities';
    }
    $CI = & get_instance();
    if ($type == 1) {
        $CI->db->select('id,group_name');
    } elseif ($type == 2) {
        $CI->db->select('id,name');
    }

    $query = $CI->db->get($table);
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return false;
    }
    return false;
}

function removeRow($tableName = null, $condition = null) {
    $CI = & get_instance();
    if (empty($tableName)) {
        return false;
    }
    if ($condition != null) {
        $records = $CI->db->where($condition)->delete($tableName);
        try {
            if ($records) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            return 'Records Fetching Errors ' . $ex->getMessage();
        }
    }
}

function getCountries() {
    $countryOptions = array();
    $CI = & get_instance();
    $CI->db->select('id,name');
    $CI->db->where('show_home', 1);
    $CI->db->where('is_featured', 1);
    $CI->db->order_by('countries.name');
    $query = $CI->db->get('countries');
    if ($query->num_rows() > 0) {
        $countryList = $query->result();
        foreach ($countryList as $country) {
            $countryOptions[$country->id] = $country->name;
        }
        return $countryOptions;
    } else {
        return false;
    }
}

function returnValidData($tableName = null, $data = array()) {
    $CI = & get_instance();
    if (empty($tableName)) {
        return false;
    }
    $return = array();
    $fields = $CI->db->list_fields($tableName);
    if ($fields) {
        foreach ($fields as $index => $column) {
            if (array_key_exists($column, $data)) {
                $return[$column] = $data[$column];
            }
        }
        return $return;
    }
}

function getCategoryNameById($id = null) {
    $name = array();
    $CI = & get_instance();
    $CI->db->select('category');
    $CI->db->where('category.id', $id);
    $query = $CI->db->get('category');
    if ($query->num_rows() > 0) {
        $result = $query->row();
        $name = $result->category;
        return $name;
    } else {
        return $name;
    }
}

function setMessage($message = '', $type = 'info') {
    $CI = & get_instance();
    if (!empty($message)) {
        //dump($CI->session);
        if (isset($CI->session)) {
            $CI->session->set_flashdata('message', $type . '::' . $message);
        }
        $flashdata = array(
            'message_type' => $type,
            'message' => $message
        );
        $CI->session->set_userdata($flashdata);
    }
}

function customBreadcrumb($link_array = array()) {
    $CI = & get_instance();
    $CI->load->library('breadcrumbs');
    if (!empty($link_array)) {
        foreach ($link_array as $key => $link) {
            $CI->breadcrumbs->push($key, '/' . $link);
        }

        $CI->breadcrumbs->unshift('Home', '/');
    }

    return $CI->breadcrumbs->show();
}

function getIdBySlug($table_name = null, $slug = null) {
    $id = '';
    if (!empty($table_name) && !empty($slug)) {
        $CI = & get_instance();
        $CI->db->select('id');
        $CI->db->where($table_name . '.url', $slug);
        $query = $CI->db->get($table_name);
        if ($query->num_rows() > 0) {
            $res = $query->row();
            $id = !empty($res->id) ? $res->id : null;
            return $id;
        } else {
            return false;
        }
    }

    return false;
}

function isUnique($tableName = null, $condition = null, $id = 0) {
    $CI = & get_instance();
    if ($tableName != null && !empty($condition)) {
        if (empty($id)) {
            $check = $CI->db->where($condition)->get($tableName)->result_array();
            try {
                if ($check) {
                    return false;
                } else {
                    return true;
                }
            } catch (Exception $ex) {
                
            }
        }
        if (!empty($id) && is_numeric($id)) {
            $check = $CI->db->where($condition)->where('id !=' . $id)->get($tableName)->result_array();
            try {
                if ($check) {
                    return false;
                } else {
                    return true;
                }
            } catch (Exception $ex) {
                
            }
        }
    }
}

function getAllCategories() {
    $categories = array();
    $CI = & get_instance();
    $sql = 'SELECT id,category,url from category where show_home = 1 and parent_id = 0 order by category desc';
    $categories = $CI->db->query($sql)->result();
    if ($categories) {
        return $categories;
    } else {
        return $categories;
    }
    return $categories;
}

function getCurrentPlan($vendor_id = null) {
    $plan = '';
    $CI = & get_instance();
    if (!empty($vendor_id)) {
        $CI->db->select('p.name as plan');
        $CI->db->from('vendor v');
        $CI->db->join('packages p', 'p.id = v.plan_id');
        $CI->db->where('v.id', $vendor_id);
        $query = $CI->db->get();
        $result = $query->row();
        if (!empty($result)) {
            $plan = $result->plan;
            return $plan;
        } else {
            return $plan;
        }
    }
    return false;
}

function defaut_template_update($id){
    $CI = & get_instance();
    $res = $CI->db->query("UPDATE `vendor_review_request_templates` SET is_default = 1 WHERE id = $id");
    if($res){
       $CI->db->query("UPDATE `vendor_review_request_templates` SET is_default = 0 WHERE id <> $id");
        return true;
    }else{
        return false;
    }
}
