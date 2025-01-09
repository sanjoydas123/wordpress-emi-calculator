<?php

if (!defined('ABSPATH')) {
    exit;
}

class skd_emi_calculator
{
    // Enqueue Scripts and Styles
    function emi_calculator_enqueue_scripts()
    {
        wp_enqueue_style('emi-calculator-style', SEC_PLUGIN_URL . 'assets/css/emi-calculator.css');
        // wp_enqueue_style('emi-calculator-jquery-min', SEC_PLUGIN_URL . 'assets/js/jquery.min.js');
        wp_enqueue_script('emi-calculator-script', SEC_PLUGIN_URL . 'assets/js/emi-calculator.js', array('jquery'), null, true);
    }

    public function register()
    {
        add_action('wp_enqueue_scripts', array($this, 'emi_calculator_enqueue_scripts'));
        add_shortcode('skd_emi_calculator', array($this, 'emi_calculator_shortcode'));
    }

    // Register Shortcode
    function emi_calculator_shortcode()
    {
        ob_start();
        include SEC_PLUGIN_DIR . 'templates/emi-calculator-template.php';
        return ob_get_clean();
    }
}
