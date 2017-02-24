<?php

class ControllerModuleInstagram extends Controller {
    public function index() {

        $data['is_error'] = false;
        $title = $this->config->get('instagram_module_name');
        if(isset($title) && $title != ""){
            $data['title'] = $title;
        }else{
            $data['title'] = "";
        }

        $stylesheet = $this->config->get('instagram_image_stylesheet');
        if(isset($stylesheet) && $stylesheet != ""){
            $data['stylesheet'] = $stylesheet;
        }else{
            $data['stylesheet'] = "width: 170px;
                height: 170px;
                float:left;
                padding-left: 20px;
                padding-bottom: 20px;";
        }

        $limit = 0;
        
        $username = $this->config->get('instagram_username');
        $mediaResponse = json_decode(file_get_contents("https://www.instagram.com/" . $username . "/media"));

        if(count($mediaResponse->items) > $this->config->get('instagram_limit')){
            $limit = $this->config->get('instagram_limit');
        }else{
            $limit = count($mediaResponse->items);
        }

        if(count($mediaResponse->items)<=0){
            $data['is_error'] = true;
            $error = $this->config->get('instagram_error_title');
            if(isset($error) && $error != ""){
                $data['error'] = $error;
            }else{
                $data['error'] = "User is private";
            }
            return $this->load->view('module/instagram', $data);
        }

        $data["images"] = [];

        for($i=0; $i<$limit;$i++){
            array_push($data["images"], $mediaResponse->items[$i]->images->thumbnail->url);
        }

        return $this->load->view('default/template/module/instagram.tpl', $data);
    }
}