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
    
            return $pdf->download('Charles CV.pdf');
        } catch (\Exception $e) {
            \Log::error('PDF Generation Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to generate PDF'], 500);
        }
    }
    
}
