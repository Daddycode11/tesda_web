<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function transparencySeal()
    {
        return view('pages.transparency-seal');
    }
    public function citizensCharter()
{
    return view('pages.citizens-charter');
}
    public function freedomOfInformation()
    {
        return view('pages.foi');
    }
    public function bagongPilipinas()
{
    return view('pages.bagong-pilipinas');
}
public function downloadableFiles()
{
    $files = [
        [
            'title' => "Training Regulations",
            'url' => "#" // Replace with actual PDF link
        ],
        [
            'title' => "Self-Assessment Guides",
            'url' => "#" // Replace with actual PDF link
        ],
        [
            'title' => "Learner's Profile Form (MIS 03-01 ver.2021)",
            'url' => "#" // Replace with actual PDF link
        ],
        [
            'title' => "Basic Competencies Integrated with 21st Century Skills",
            'url' => "#" // Replace with actual PDF link
        ],
        [
            'title' => "QMS Prescribed Forms",
            'url' => "#" // Replace with actual PDF link
        ],
        [
            'title' => "Star Rated Programs",
            'url' => "#" // Replace with actual PDF link
        ],
    ];

    return view('pages.downloadable-files', compact('files'));
}
public function tesdaCircularsSample()
{
    // Example circulars - replace URLs with actual PDFs
    $circulars = [
        [
            'title' => 'Memo: TESDA Guidelines for Training Programs',
            'date' => '2025-01-15',
            'url' => '#' // replace with actual PDF link
        ],
        [
            'title' => 'Resolution: Competency Assessment Updates',
            'date' => '2025-02-10',
            'url' => '#' 
        ],
        [
            'title' => 'Advisory: Safety Protocols for Training Centers',
            'date' => '2025-03-05',
            'url' => '#' 
        ],
        [
            'title' => 'Order: Implementation of New Training Modules',
            'date' => '2025-04-20',
            'url' => '#' 
        ],
        // Add more items as needed
    ];

    return view('pages.tesda-circulars', compact('circulars'));
}
public function tesdaCirculars()
{
    $circulars = [
        ['series' => '079-2024', 'subject' => 'Amendment to TESDA Circular No. 074 S. 2019 on the Revised TESDA — Program on Awards and Incentives for Service Excellence (TESDA-PRAISE) for Loyalty and Retirees Incentive', 'file' => 'https://intranet.tesda.gov.ph/CircularIframe/DownloadFile/AxaMOTHT'],
        ['series' => '078-2024', 'subject' => 'Signatory in Assessment and Certification Related Certificates', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/078-2024.pdf'],
        ['series' => '077-2024', 'subject' => 'Omnibus Guidelines on TVET Micro-Credentialing for the Skilling, Upskilling, and Reskilling of the Workforce', 'file' => 'https://intranet.tesda.gov.ph/CircularIframe/DownloadFile/p46P8NHa'],
        ['series' => '076-2024', 'subject' => 'Signatory in Assessment and Certification Related Certificates', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/076-2024.pdf'],
        ['series' => '075-2024', 'subject' => 'Approved TESDA Board Resolution Nos. 2024 - 06 to 2024-18', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/075-2024.pdf'],
        ['series' => '074-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Permanent Make-up Tattoo Services Level III', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/074-2024.pdf'],
        ['series' => '073-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Advanced Skin Care Services Level III', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/073-2024.pdf'],
        ['series' => '072-2024', 'subject' => 'Signatory in Assessment and Certification Related Certificates', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/072-2024.pdf'],
        ['series' => '071-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Molding Machine Maintenance Level III', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/071-2024.pdf'],
        ['series' => '070-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Trim and Form Machine Maintenance Level III', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/070-2024.pdf'],
        ['series' => '069-2024', 'subject' => 'Implementing Guidelines Deployment of Competency Standards (CS) for Package Marking Machine Maintenance Level III', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/069-2024.pdf'],
        ['series' => '068-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Wafer Sort Equipment Maintenance Level III', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/068-2024.pdf'],
        ['series' => '067-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Function Test Machine Maintenance Level III', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/067-2024.pdf'],
        ['series' => '066-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Production Operation (Molding) Level III', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/066-2024.pdf'],
        ['series' => '065-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Production Operation (Wire Bonding) Level III', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/065-2024.pdf'],
        ['series' => '064-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Production Operation (Die Attach) Level III', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/064-2024.pdf'],
        ['series' => '063-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Production Operation (Saw Wafers) Level II', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/063-2024.pdf'],
        ['series' => '062-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Production Operation (Sort Wafers) Level II', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/062-2024.pdf'],
        ['series' => '061-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Virtual Assistant Services Level III', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/061-2024.pdf'],
        ['series' => '060-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Eyelash and Eyebrow Services Level III', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/060-2024.pdf'],
        ['series' => '059-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for E-Commerce Operations Level III', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/059-2024.pdf'],
        ['series' => '058-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Dermopigmentation Services Level III', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/058-2024.pdf'],
        ['series' => '057-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Aircraft Cleaning and Disinfecting Level II', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/057-2024.pdf'],
        ['series' => '056-2024', 'subject' => 'Signatory in Assessment and Certification Related Certificates', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/056-2024.pdf'],
        ['series' => '055-2024', 'subject' => 'Guidelines on the Pilot Implementation of the TESDA sa Barangay Program through Community-Based TVET', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/055-2024.pdf'],
        ['series' => '054-2024', 'subject' => 'Implementing Guidelines in the Generation and Utilization of the Sariling Sikap Program (SSP) Funds of the TESDA Operating Units', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/054-2024.pdf'],
        ['series' => '053-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Halal Food Processing (Halal Meat Processing) Level II', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/053-2024.pdf'],
        ['series' => '052-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Halal Food Processing Level III', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/052-2024.pdf'],
        ['series' => '051-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Halal Food Processing Level II', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/051-2024.pdf'],
        ['series' => '050-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Halal Food Processing (Halal Slaughtering Operations-Large Ruminants) Level II', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/050-2024.pdf'],
        ['series' => '049-2024', 'subject' => 'Implementing Guidelines on the Deployment of Competency Standards (CS) for Halal Food Processing (Slitting - Large Ruminants) Level II', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/049-2024.pdf'],
        ['series' => '048-2024', 'subject' => 'Implementing Guidelines Deployment of Competency Standards (CS) for Cacao Production Level II', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/048-2024.pdf'],
        ['series' => '047-2024', 'subject' => 'Signatory in Assessment and Certification Related Certificates', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/047-2024.pdf'],
        ['series' => '046-2024', 'subject' => 'Implementing Guidelines on the Support to Expand the Number of Accredited Assessors', 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/046-2024.pdf'],
       ['series' => '045-2024', 
 'subject' => 'Implementing Guidelines on Senior High School (SHS) Assessment and Certification Support Program', 
 'file' => 'https://www.tesda.gov.ph/uploads/File/2024/Circulars/045-2024.pdf'],

];

return view('pages.tesda-circulars', compact('circulars'));
}
public function competencyStandards()
{
    // You can add lists or downloadable links here
    $promulgatedTRs = [
        ['title' => 'List of Promulgated TRs with Qualification Code', 'link' => '#'],
        ['title' => 'Validation of the Training Regulations (TR)', 'link' => '#'],
        ['title' => 'Competency Standards', 'link' => '#'],
    ];

    return view('pages.competency-standards', compact('promulgatedTRs'));
}

}
