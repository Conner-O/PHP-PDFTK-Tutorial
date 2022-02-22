<?php

namespace Classes;

if (!defined('ACCESSCHECK')) {
      die('Direct access not permitted');
}


use mikehaertl\pdftk\Pdf;

class GeneratePDF
{


      public function generate($data)
      {

            try {

                  $filename = 'pdf_' . rand(2000, 1200000) . '.pdf';
                  $pdf = new Pdf('C:\xampp\htdocs\PHP-PDFTK-Tutorial\test.pdf', []
                        'command' => 'C:\Program Files (x86)\PDFtk Server\bin\pdftk.exe',
                        'useExec' => true
                  ]);
                  $pdf->fillForm($data)
                        ->flatten()
                        ->saveAs('C:\xampp\htdocs\PHP-PDFTK-Tutorial\completed/' . $filename);

                  return $filename;
                  
            } catch (Exception $e) {
                  return $e->getMessage();
            }
      }
}
