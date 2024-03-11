<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\TicketRepositoryInterface;
use App\Service\ClosedTicketService;
use App\Service\DepartmentService;
use App\Service\FiscalYearService;
use App\Service\MediaService;
use App\Service\OpenTicketService;
use App\Service\ProcessingTicketService;
use App\Service\RejectedTicketService;

class DashboardController extends Controller
{
    public function __construct(private FiscalYearService         $fiscalYearService,
                                private OpenTicketService         $openTicketService,
                                private ProcessingTicketService   $processingTicketService,
                                private ClosedTicketService       $closedTicketService,
                                private RejectedTicketService     $rejectedTicketService,
                                private MediaService              $mediaService,
                                private DepartmentService         $departmentService,
                                private TicketRepositoryInterface $ticketRepository)
    {
    }

    public function index()
    {
        $fiscalYearActive = $this->fiscalYearService->getActiveFiscalYear();
        $openTicketCount = $this->openTicketService->getAllOpenTicketCount();
        $processingTicketCount = $this->processingTicketService->getAllProcessingTicketCount();
        $closedTicketCount = $this->closedTicketService->getAllClosedTicketCount();
        $rejectedTicketCount = $this->rejectedTicketService->getAllRejectedTicketCount();
        $processingTickets = $this->processingTicketService->getDashboardProcessingTickets();

        return view('dashboard.pages.dashboard', compact(
            'fiscalYearActive',
            'openTicketCount',
            'processingTicketCount',
            'closedTicketCount',
            'rejectedTicketCount',
            'processingTickets',
        ));
    }

    public function mediumCount()
    {
        $mediaCount = $this->mediaService->getMediaCount();
        return response()->json($mediaCount);
    }

    public function departmentCount()
    {
        $departmentCount = $this->departmentService->getDepartmentCount(null, 10);
        return response()->json($departmentCount);
    }

    public function categoryCount()
    {
        $categories = $this->ticketRepository->getCategoryCount(null, 10);
        return response()->json($categories);
    }

}
