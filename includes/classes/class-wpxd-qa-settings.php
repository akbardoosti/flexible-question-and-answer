<?php

class WPXD_QA_Settings {
    private static $instance;

    private $tab_list;
    public function __construct() {
    }

    public static function get_instance() {
        if ( ! self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function render_page() {
        $this->init_tab();
        require_once plugin_dir_path( dirname( dirname(__FILE__) ) ) . 'templates/settings/settings-template.php';
    }

    public function init_tab() {
        $settings = get_option( 'wpxd_qa_settings' );
        $this->tab_list[ 'form_fields' ] = array(
            "title" => __( "Form fields", "wpxd-qa-plugin" ),
            "template" => "form-fields",
            "active" => true,
            'data' => ! empty( $settings['form_fields'] ) ? $settings['form_fields'] : []
        );
        $this->tab_list[ 'form_tmeplate' ] = array(
            "title" => __( "Form template", "wpxd-qa-plugin" ),
            "template" => "form-template",
            "active" => false,
            'data' => ! empty( $settings['form_tmeplate'] ) ? $settings['form_tmeplate'] : []
        );
        $this->tab_list[ 'form_style' ] = array(
            "title" => __( "Form style", "wpxd-qa-plugin" ),
            "template" => "form-style",
            "active" => false,
            'data' => ! empty( $settings['form_style'] ) ? $settings['form_style'] : []
        );
        $this->tab_list[ 'fonts' ] = array(
            "title" => __( "Fonts", "wpxd-qa-plugin" ),
            "template" => "fonts",
            "active" => false,
            'data' => ! empty( $settings['fonts'] ) ? $settings['fonts'] : []
        );
        $this->tab_list[ 'setting' ] = array(
            "title" => __( "Setting", "wpxd-qa-plugin" ),
            "template" => "setting",
            "active" => false,
            'data' => ! empty( $settings['setting'] ) ? $settings['setting'] : []
        );
    }

    function save_form_fields() {
        // nonce check for an extra layer of security, the function will exit if it fails
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "update_form_field")) {
            
            wp_send_json_error("Nonce is not valid");
            exit();
        }  
        $wpxd_qa_settings = get_option('wpxd_qa_settings');
        if ( ! empty( $wpxd_qa_settings ) ) {
            $wpxd_qa_settings = [];

            $wpxd_qa_settings['form_fields'] = $_REQUEST['fields'];
            update_option('wpxd_qa_settings', $wpxd_qa_settings);
        } else {
            $wpxd_qa_settings = [];
            $wpxd_qa_settings['form_fields'] = $_REQUEST['fields'];
            add_option('wpxd_qa_settings', $wpxd_qa_settings);
        }
        
        wp_send_json_success($wpxd_qa_settings);
    }
    
    function save_form_tmeplate() {
        // nonce check for an extra layer of security, the function will exit if it fails
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "update_form_tmeplate")) {
            
            wp_send_json_error("Nonce is not valid");
            exit();
        }  
        $wpxd_qa_settings = get_option('wpxd_qa_settings');
        if ( ! empty( $wpxd_qa_settings ) ) {
            $wpxd_qa_settings = [];

            $wpxd_qa_settings['form_tmeplate'] = $_REQUEST['fields'];
            update_option('wpxd_qa_settings', $wpxd_qa_settings);
        } else {
            $wpxd_qa_settings = [];
            $wpxd_qa_settings['form_tmeplate'] = $_REQUEST['fields'];
            add_option('wpxd_qa_settings', $wpxd_qa_settings);
        }
        
        wp_send_json_success($wpxd_qa_settings);
    }
    
    function save_form_style() {
        // nonce check for an extra layer of security, the function will exit if it fails
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "update_form_style")) {
            
            wp_send_json_error("Nonce is not valid");
            exit();
        }  
        $wpxd_qa_settings = get_option('wpxd_qa_settings');
        if ( ! empty( $wpxd_qa_settings ) ) {
            $wpxd_qa_settings = [];

            $wpxd_qa_settings['form_style'] = $_REQUEST['fields'];
            update_option('wpxd_qa_settings', $wpxd_qa_settings);
        } else {
            $wpxd_qa_settings = [];
            $wpxd_qa_settings['form_style'] = $_REQUEST['fields'];
            add_option('wpxd_qa_settings', $wpxd_qa_settings);
        }
        
        wp_send_json_success($wpxd_qa_settings);
    }
    
    function save_fonts() {
        // nonce check for an extra layer of security, the function will exit if it fails
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "update_fonts")) {
            
            wp_send_json_error("Nonce is not valid");
            exit();
        }  
        $wpxd_qa_settings = get_option('wpxd_qa_settings');
        if ( ! empty( $wpxd_qa_settings ) ) {
            $wpxd_qa_settings = [];

            $wpxd_qa_settings['fonts'] = $_REQUEST['fields'];
            update_option('wpxd_qa_settings', $wpxd_qa_settings);
        } else {
            $wpxd_qa_settings = [];
            $wpxd_qa_settings['fonts'] = $_REQUEST['fields'];
            add_option('wpxd_qa_settings', $wpxd_qa_settings);
        }
        
        wp_send_json_success($wpxd_qa_settings);
    }
    function save_setting() {
        // nonce check for an extra layer of security, the function will exit if it fails
        if ( !wp_verify_nonce( $_REQUEST['nonce'], "update_setting")) {
            
            wp_send_json_error("Nonce is not valid");
            exit();
        }  
        $wpxd_qa_settings = get_option('wpxd_qa_settings');
        if ( ! empty( $wpxd_qa_settings ) ) {
            $wpxd_qa_settings = [];

            $wpxd_qa_settings['setting'] = $_REQUEST['fields'];
            update_option('wpxd_qa_settings', $wpxd_qa_settings);
        } else {
            $wpxd_qa_settings = [];
            $wpxd_qa_settings['setting'] = $_REQUEST['fields'];
            add_option('wpxd_qa_settings', $wpxd_qa_settings);
        }
        
        wp_send_json_success($wpxd_qa_settings);
    }
}

