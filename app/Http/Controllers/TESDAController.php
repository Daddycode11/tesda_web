<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TESDAController extends Controller
{
    public function tesdaCirculars($year)
    {
        $allCirculars = [
            // 2024 circulars
            ['series' => '079-2024', 'subject' => 'Amendment to TESDA Circular No. 074 S. 2019 on the Revised TESDA-PRAISE for Loyalty and Retirees Incentive', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/079-2024.pdf'],
            ['series' => '078-2024', 'subject' => 'Signatory in Assessment and Certification Related Certificates', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/078-2024.pdf'],
            ['series' => '077-2024', 'subject' => 'Omnibus Guidelines on TVET Micro-Credentialing', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/077-2024.pdf'],
            // Add all 2024 circulars (001–079) here similarly...

            // Example 2023 circulars
            ['series' => '045-2023', 'subject' => 'SHS Assessment and Certification Support Program', 'file' => 'https://www.tesda.gov.ph/uploads/File/2023/Circulars/045-2023.pdf'],
            ['series' => '044-2023', 'subject' => 'Guidelines on Community-Based TVET', 'file' => 'https://www.tesda.gov.ph/uploads/File/2023/Circulars/044-2023.pdf'],
            // Add all other years circulars similarly...
        ];

        // Filter circulars by year
        $circulars = array_filter($allCirculars, function($circular) use ($year) {
            return str_contains($circular['series'], $year);
        });

        return view('pages.tesda-circulars', compact('circulars', 'year'));
    }
}
