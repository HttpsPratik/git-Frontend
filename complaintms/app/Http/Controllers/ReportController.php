<?php

namespace App\Http\Controllers;

use App\Service\MediaService;
use App\Service\DepartmentService;
use App\Service\FiscalYearService;
use App\Service\OpenTicketService;
use App\Service\ClosedTicketService;
use App\Service\RejectedTicketService;
use App\Service\ProcessingTicketService;
use App\Repository\Interfaces\TicketRepositoryInterface;

class ReportController extends Controller
{
    public function __construct(
                                private OpenTicketService         $openTicketService,
                                private ProcessingTicketService   $processingTicketService,
                                private ClosedTicketService       $closedTicketService,
                                private RejectedTicketService     $rejectedTicketService,
                                private MediaService              $mediaService,
                                private DepartmentService         $departmentService,
                                private TicketRepositoryInterface $ticketRepository)
    {
    }

    public function viewReport($fiscal_year_id = null)
    {
        $openTicketCount = $this->openTicketService->getAllOpenTicketCount($fiscal_year_id);
        $processingTicketCount = $this->processingTicketService->getAllProcessingTicketCount($fiscal_year_id);
        $closedTicketCount = $this->closedTicketService->getAllClosedTicketCount($fiscal_year_id);
        $rejectedTicketCount = $this->rejectedTicketService->getAllRejectedTicketCount($fiscal_year_id);

        return view('dashboard.pages.reports', compact(
            'openTicketCount',
            'processingTicketCount',
            'closedTicketCount',
            'rejectedTicketCount',
        ));
    }

    public function mediumCount($fiscal_year_id)
    {
        $mediaCount = $this->mediaService->getMediaCount($fiscal_year_id);
        return response()->json($mediaCount);
    }

    public function departmentCount($fiscal_year_id)
    {
        $departmentCount = $this->departmentService->getDepartmentCount($fiscal_year_id);
        return response()->json($departmentCount);
    }

    public function categoryCount($fiscal_year_id)
    {
        $categories = $this->ticketRepository->getCategoryCount($fiscal_year_id);
        return response()->json($categories);
    }


}
