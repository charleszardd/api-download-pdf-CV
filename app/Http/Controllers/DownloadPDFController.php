<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DownloadPDFController extends Controller
{
    public function downloadCV()
{
    try {

        // Load and generate the PDF
        $pdf = PDF::loadView('pdf.resume');
        
        // Add explicit headers and return as download
        return response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="Charles David Caseñas\' Resume.pdf"',
            'Cache-Control' => 'no-store',  // Prevent caching
            'Pragma' => 'no-cache',         // Older HTTP1.0 caching behavior
            'Expires' => '0',     
        ]);
    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('PDF Generation Error: ' . $e->getMessage());
        return response()->json(['error' => 'Failed to generate PDF'], 500);
    }
}
}
