<?php defined('BASEPATH') or exit('No direct script access allowed.');

if (version_compare(CI_VERSION, '3.1.0') >= 0) {

    if (is_php('5.5') && class_exists('\\PHPMailer\\PHPMailer\\PHPMailer', true)) {

        require_once dirname(__FILE__) . '/MY_Email_3_1_x_phpmailer_6_0_x.php';
    } else {

        require_once dirname(__FILE__) . '/MY_Email_3_1_x.php';
    }
}
