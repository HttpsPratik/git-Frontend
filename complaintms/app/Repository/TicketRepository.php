<?php

namespace App\Repository;

use App\Models\Ticket;
use App\Repository\Interfaces\TicketRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TicketRepository extends BaseRepository implements TicketRepositoryInterface
{
    public function __construct(Ticket $model)
    {
        parent::__construct($model);
    }

    //open ticket start
    public function getAllOpenTicket($request, $paginator)
    {
        $query = $this->model->where('status', 'open');
        $this->relationEagerLoadTickets($query);
        $this->fiscalYearSearch($request, $query);
        $this->ticketPermission($query);
        $this->dateSearch($request, $query);
        $this->termSearch($request, $query);
        return $query->orderBy('status_date', 'DESC')->paginate($paginator);
    }

    public function getOpenTicketDetails($ticket_id)
    {
        if ($this->model->where('id', $ticket_id)->where('status', 'open')->exists()){
            if (Gate::allows('ticket-view-permission', $ticket_id))
                return $this->ticketDetails($ticket_id);
        }
        throw new \Exception('Cannot Get Open Ticket Detail');
    }

    public function openTicketChangeStatus($ticket_id)
    {
        return $this->model
            ->where('id', $ticket_id)
            ->where('status', 'open')
            ->update(['status' => 'processing', 'status_date' => now()]);
    }

    public function getAllOpenTicketCount($fiscal_year_id)
    {
        return $this->model
            ->where('status', 'open')
            ->when(!$fiscal_year_id, function ($q) {
                $q->whereHas('fiscalYear', function ($q) {
                    $q->where('active', 1);
                });
            })
            ->when($fiscal_year_id, function ($q) use ($fiscal_year_id) {
                $q->whereHas('fiscalYear', function ($q) use ($fiscal_year_id) {
                    $q->where('id', $fiscal_year_id);
                });
            })
            ->count();
    }

    //open ticket end


    //processing ticket start

    public function getAllProcessingTicket($request, $paginator)
    {
        $query = $this->model->where('status', 'processing');
        $this->relationEagerLoadTickets($query);
        $this->fiscalYearSearch($request, $query);
        $this->ticketPermission($query);
        $this->dateSearch($request, $query);
        $this->termSearch($request, $query);
        return $query->orderBy('status_date', 'desc')->paginate($paginator);
    }

    public function getProcessingTicketDetails($ticket_id)
    {
        if ($this->model->where('id', $ticket_id)->where('status', 'processing')->exists()){
            if (Gate::allows('ticket-view-permission', $ticket_id))
                return $this->ticketDetails($ticket_id);
        }
        throw new \Exception('Cannot view ticket');
    }

    public function processingTicketChangeStatus($ticket_id)
    {
        return $this->model
            ->where('id', $ticket_id)
            ->where('status', 'open')
            ->update(['status' => 'processing', 'status_date' => now()]);
    }

    public function getAllProcessingTicketCount($fiscal_year_id)
    {
        return $this->model
            ->where('status', 'processing')
            ->when(!$fiscal_year_id, function ($q) {
                $q->whereHas('fiscalYear', function ($q) {
                    $q->where('active', 1);
                });
            })
            ->when($fiscal_year_id, function ($q) use ($fiscal_year_id) {
                $q->whereHas('fiscalYear', function ($q) use ($fiscal_year_id) {
                    $q->where('id', $fiscal_year_id);
                });
            })
            ->count();
    }

    //processing ticket end


    //closed ticket start
    public function getAllClosedTicket($request, $paginator)
    {
        $query = $this->model->where('status', 'closed');
        $this->relationEagerLoadTickets($query);
        $this->fiscalYearSearch($request, $query);
        $this->ticketPermission($query);
        $this->dateSearch($request, $query);
        $this->termSearch($request, $query);
        return $query->orderBy('status_date', 'desc')->paginate($paginator);
    }

    public function getClosedTicketDetails($ticket_id)
    {
        if ($this->model->where('id', $ticket_id)->where('status', 'closed')->exists()){
            if (Gate::allows('ticket-view-permission', $ticket_id))
                return $this->ticketDetails($ticket_id);
        }
        throw new \Exception('Cannot Closed Ticket Detail');
    }

    public function getAllClosedTicketCount($fiscal_year_id)
    {
        return $this->model
            ->where('status', 'closed')
            ->when(!$fiscal_year_id, function ($q) {
                $q->whereHas('fiscalYear', function ($q) {
                    $q->where('active', 1);
                });
            })
            ->when($fiscal_year_id, function ($q) use ($fiscal_year_id) {
                $q->whereHas('fiscalYear', function ($q) use ($fiscal_year_id) {
                    $q->where('id', $fiscal_year_id);
                });
            })
            ->count();
    }

    public function publishClosedTicket($ticket_id)
    {
        if ($this->model->where('id', $ticket_id)->where('status', 'closed')->where('visible', 0)->exists()){
            if (Gate::allows('publish-ticket'))
                return $this->model
                ->where('id', $ticket_id)
                ->where('status', 'closed')
                ->update(['visible' => 1,  'status_date' => now()]);
        }
        throw new \Exception('Cannot Publish Closed Ticket');
    }

    //closed ticket end


    //rejected ticket start
    public function getAllRejectedTicket($request, $paginator)
    {
        $query = $this->model->where('status', 'rejected');
        $this->relationEagerLoadTickets($query);
        $this->fiscalYearSearch($request, $query);
        $this->ticketPermission($query);
        $this->dateSearch($request, $query);
        $this->termSearch($request, $query);
        return $query->orderBy('status_date', 'desc')->paginate($paginator);
    }

    public function getRejectedTicketDetails($ticket_id)
    {
        if ($this->model->where('id', $ticket_id)->where('status', 'rejected')->exists()){
            if (Gate::allows('ticket-view-permission', $ticket_id))
                return $this->ticketDetails($ticket_id);
        }
        throw new \Exception('Cannot Get Rejected Ticket Detail');
    }

    public function getAllRejectedTicketCount($fiscal_year_id)
    {
        return $this->model
            ->where('status', 'rejected')
            ->when(!$fiscal_year_id, function ($q) {
                $q->whereHas('fiscalYear', function ($q) {
                    $q->where('active', 1);
                });
            })
            ->when($fiscal_year_id, function ($q) use ($fiscal_year_id) {
                $q->whereHas('fiscalYear', function ($q) use ($fiscal_year_id) {
                    $q->where('id', $fiscal_year_id);
                });
            })
            ->count();
    }

    //rejected ticket end

    //general methods
    public function rejectTicket($ticket_id)
    {
        if ($this->model->where('id', $ticket_id)->where('status', '!=', 'rejected')->exists())
            return $this->model
                ->where('id', $ticket_id)
                ->update(['status' => 'rejected', 'status_date' => now()]);
        throw new \Exception('Cannot Reject Ticket');
    }

    public function closeTicket($ticket_id)
    {
        if ($this->model->where('id', $ticket_id)->where('status', '!=', 'closed')->exists())
            return $this->model
                ->where('id', $ticket_id)
                ->update(['status' => 'closed', 'status_date' => now()]);
        throw new \Exception('Cannot Close Ticket');
    }

    public function getCategoryCount($fiscal_year_id = null, $limit = null)
    {
        $tickets = $this->model
            ->with('category')
            ->when($fiscal_year_id == null, function ($q) {
                $q->whereHas('fiscalYear', function ($q) {
                    $q->where('active', 1);
                });
            })
            ->when($fiscal_year_id != null, function ($q) use ($fiscal_year_id) {
                $q->whereHas('fiscalYear', function ($q) use ($fiscal_year_id) {
                    $q->where('id', $fiscal_year_id);
                });
            })
            ->groupBy('category_id')
            ->selectRaw('count(*) as category_count, category_id')
            ->orderBy('category_count', 'desc')
            ->when($limit != null, function ($q) use ($limit) {
                $q->limit($limit);
            })
            ->get();
        $category = [];
        foreach ($tickets as $ticket) {
            $category[] = ['name' => $ticket->category->name, 'category_count' => $ticket->category_count];
        }
        return $category;
    }

    public function getDashboardProcessingTickets($request = [])
    {
        $query = $this->model->select(['id', 'subject', 'ticket_number'])
            ->where('status', 'processing');
        $this->fiscalYearSearch($request, $query);
        $this->ticketPermission($query);
        $this->dateSearch($request, $query);
        $this->termSearch($request, $query);
        return $query->orderBy('status_date', 'desc')->limit(7)->get();
    }


    public function getTicketIds($fiscal_year_id = null)
    {
        return $this->model
            ->select(['id'])
            ->when($fiscal_year_id == null, function ($q) {
                $q->whereHas('fiscalYear', function ($q) {
                    $q->where('active', 1);
                });
            })
            ->when($fiscal_year_id != null, function ($q) use ($fiscal_year_id) {
                $q->whereHas('fiscalYear', function ($q) use ($fiscal_year_id) {
                    $q->where('id', $fiscal_year_id);
                });
            });
    }

    public function anonymousTicketDetail($request){
        return $this->model->where('ticket_number', $request['ticket_number'])->first();
    }

    //private methods
    private function dateSearch($request, &$query)
    {
        $query->when(array_key_exists("date_to", $request) and array_key_exists("date_from", $request), function ($q) use ($request) {
            $q->whereBetween('created_at', [$request['date_from'], $request['date_to']]);
        });
    }

    private function termSearch($request, &$query)
    {
        $query->when(array_key_exists("search_term", $request), function ($q) use ($request) {
            $q->where(function ($q) use ($request) {
                $q->orWhere('subject', 'LIKE', "%{$request['search_term']}%")
                    ->orWhere('ticket_number', 'LIKE', "%{$request['search_term']}%")
                    ->orWhereHas('category', function ($q) use ($request) {
                        $q->where('name', 'LIKE', "%{$request['search_term']}%")->withTrashed();
                    });
            });
        });
    }

    private function ticketPermission(&$query)
    {
        $query->when(Gate::allows('ticket-query'), function ($q) {
            $q->whereHas('latestAssign', function ($q) {
                $q->where('department_id', Auth::guard('admin')->user()->department_id);
            });
        });
    }

    private function fiscalYearSearch($request, &$query)
    {
        $query->when(array_key_exists("fiscal_year", $request), function ($q) use ($request) {
            $q->WhereHas('fiscalYear', function ($q) use ($request) {
                $q->where('id', $request['fiscal_year']);
            });
        })
            ->when(!array_key_exists("fiscal_year", $request), function ($q) {
                $q->WhereHas('fiscalYear', function ($q) {
                    $q->where('active', 1);
                });
            });
    }

    private function relationEagerLoadTickets(&$query)
    {
        $query->with(['category' => fn ($q) => $q->select('id', 'name')->withTrashed()])
            ->with('medium:id,name')
            ->with('user:id,name');
    }

    private function ticketDetails($ticket_id)
    {
        return $this->model
            ->with('medium:id,name')
            ->with('fiscalYear:id,year')
            ->with('user:id,name')
            ->with(['category' => fn ($q) => $q->select('id', 'name')->withTrashed()])
            ->where('id', $ticket_id)
            ->first();
    }
}
