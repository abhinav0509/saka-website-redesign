<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redirect extends CI_Controller {
    public function index() {
        $old_urls = array(
            'contact-us' => 'Contact',
            'about-us' => 'About_us',
            // 'services' => 'our-services'
        );

        $uri = $this->uri->uri_string(); // Get the requested URL path

        if (array_key_exists($uri, $old_urls)) {
            redirect(base_url($old_urls[$uri]), 'location', 301);
        } else {
            show_404(); // If no match, show 404
        }
    }
}