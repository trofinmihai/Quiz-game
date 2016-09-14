<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('exportcsv'))
{
   function exportcsv($array, $header, $name_file)
   {
       $fp = fopen($name_file, 'w');
       fputcsv($fp, $header);
        foreach ($array as $fields) 
        {
             fputcsv($fp, $fields);
          }

        $file = $name_file;

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
           
        }
       
   }
}