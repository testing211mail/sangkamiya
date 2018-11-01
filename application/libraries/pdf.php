<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class pdf {

    public function __construct() {

        require_once APPPATH.'third_party/fpdf/fpdf-1.8.php';

        //$pdf = new FPDF();
        $pdf =new FPDF('L', 'mm', 'Legal', true, 'UTF-8', false);
        $pdf->AddPage();

        $CI =& get_instance();
        $CI->fpdf = $pdf;

    }
}