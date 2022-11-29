<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use mikehaertl\wkhtmlto\Pdf;

class PDFController extends Controller
{
    /**
     * Write code on Construct
     *
     * @return \Illuminate\Http\Response
     */
    public function preview()
    {
        return view('pdf.chart');
    }
  
    /**
     * Write code on Construct
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        $render = view('pdf.chart')->render();
  
        $pdf = new Pdf;
        $pdf->addPage($render);
        $pdf->setOptions(['javascript-delay' => 5000]);
        // dd(public_path('report.pdf'));
        if(!$pdf->saveAs(public_path('report.pdf'))){
            $error = $pdf->getError();
            dd($error, "asss");
            
        }
        

        return response()->download(public_path('report.pdf'));

        // $pdf = \PDF::loadView("pdf.chart");
        // $pdf->setOption('enable-javascript', true);
        // $pdf->setOption('javascript-delay', 10000);
        // $pdf->setOption('enable-smart-shrinking', true);
        // $pdf->setOption('no-stop-slow-script', true);
        // return $pdf->download('graph.pdf');
    }
}
