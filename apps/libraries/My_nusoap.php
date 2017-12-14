<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_nusoap
{
    public function __construct()
    {
        require_once APPPATH.'third_party/nusoap.php';
    }
}