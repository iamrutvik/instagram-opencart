<?php
class ControllerModuleInstagram extends Controller {
    private $error = array();

    public function index() {
        $this->load->language('module/instagram');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('instagram', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], true));
        }

        $data['heading_title'] = $this->language->get('heading_title');

        $data['text_edit'] = $this->language->get('text_edit');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');

        $data['entry_status'] = $this->language->get('entry_status');

        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_module'),
            'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('module/instagram', 'token=' . $this->session->data['token'], true)
        );

        $data['action'] = $this->url->link('module/instagram', 'token=' . $this->session->data['token'], true);

        $data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], true);

        if (isset($this->request->post['instagram_status'])) {
            $data['instagram_status'] = $this->request->post['instagram_status'];
        } else {
            $data['instagram_status'] = $this->config->get('instagram_status');
        }

        if (isset($this->request->post['instagram_username'])) {
            $data['instagram_username_value'] = $this->request->post['instagram_username'];
        } else {
            $data['instagram_username_value'] = $this->config->get('instagram_username');
        }

        if (isset($this->request->post['instagram_limit'])) {
            $data['instagram_limit_value'] = $this->request->post['instagram_limit'];
        } else {
            $data['instagram_limit_value'] = $this->config->get('instagram_limit');
        }

        if (isset($this->request->post['instagram_module_name'])) {
            $data['module_name_title_value'] = $this->request->post['instagram_module_name'];
        } else {
            $data['module_name_title_value'] = $this->config->get('instagram_module_name');
        }

        if (isset($this->request->post['instagram_error_title'])) {
            $data['error_title_value'] = $this->request->post['instagram_error_title'];
        } else {
            $data['error_title_value'] = $this->config->get('instagram_error_title');
        }

        if (isset($this->request->post['instagram_image_stylesheet'])) {
            $data['stylesheet_value'] = $this->request->post['instagram_image_stylesheet'];
        } else {
            $data['stylesheet_value'] = $this->config->get('instagram_image_stylesheet');
        }

        $data['instagram_username'] = $this->language->get('instagram_username');
        $data['instagram_username_placeholder'] = $this->language->get('instagram_username_placeholder');
        $data['limit_text'] = $this->language->get('limit_text');
        $data['limit_text_placeholder'] = $this->language->get('limit_text_placeholder');
        $data['module_name_title'] = $this->language->get('module_name_title');
        $data['module_name_placeholder'] = $this->language->get('module_name_placeholder');
        $data['error_title'] = $this->language->get('error_title');
        $data['error_title_placeholder'] = $this->language->get('error_placeholder');
        $data['stylesheet'] = $this->language->get('stylesheet');

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('module/instagram.tpl', $data));
    }

    protected function validate() {
        if (!$this->user->hasPermission('modify', 'module/instagram')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        return !$this->error;
    }
}