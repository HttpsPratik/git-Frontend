<?php

namespace App\Repository\Interfaces;

interface TicketRepositoryInterface
{

        //open ticket start
        public function getAllOpenTicket($request, $paginator);
    
        public function getOpenTicketDetails($ticket_id);

        public function openTicketChangeStatus($ticket_id);
    
        public function getAllOpenTicketCount($fiscal_year_id);
        //open ticket end
    
    
        //processing ticket start
        public function getAllProcessingTicket($request, $paginator);
    
        public function getProcessingTicketDetails($ticket_id);

        public function processingTicketChangeStatus($ticket_id);
    
        public function getAllProcessingTicketCount($fiscal_year_id);
        //processing ticket end
    
    
        //closed ticket start
        public function getAllClosedTicket($request, $paginator);
    
        public function getClosedTicketDetails($ticket_id);

        public function getAllClosedTicketCount($fiscal_year_id);

        public function publishClosedTicket($ticket_id);
        //closed ticket end
    
    
        //rejected ticket start
        public function getAllRejectedTicket($request, $paginator);
    
        public function getRejectedTicketDetails($ticket_id);
    
        public function getAllRejectedTicketCount($fiscal_year_id);
        //rejected ticket end

    
        //general methods
        public function rejectTicket($ticket_id);
    
        public function closeTicket($ticket_id);
    
        public function getCategoryCount($fiscal_year_id = null,$limit = null);

        public function getDashboardProcessingTickets($request = []);
    
        public function getTicketIds($fiscal_year_id = null);


        //private methods
        // private function dateSearch($request, &$query);
    
        // private function termSearch($request, &$query);

        // private function ticketPermission(&$query);
    
        // private function fiscalYearSearch($request, &$query);
    
        // private function relationEagerLoadTickets(&$query);
    
        // private function ticketDetails($ticket_id);
         
}
