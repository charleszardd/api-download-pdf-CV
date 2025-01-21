<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DownloadPDFController extends Controller
{
    public function downloadCV()
    {
        try {
            $imagePath = public_path('images/profile.jpg');
            $pdf = PDF::loadView('pdf.resume', compact('imagePath'));
            
            $filename = 'Charles CV.pdf';
            
            return response($pdf->output(), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
                'Access-Control-Allow-Origin' => 'https://portfolio-kasenyashi.vercel.app',
                'Access-Control-Allow-Methods' => 'GET',
                'Access-Control-Allow-Credentials' => 'true',
                'Access-Control-Expose-Headers' => 'Content-Disposition'
            ]);
        } catch (\Exception $e) {
            \Log::error('PDF Generation Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to generate PDF'], 500);
        }
    }
    
}
