<?php

namespace App\Service;

use App\Facade\LogActivity;
use App\Repository\Interfaces\AssignRepositoryInterface;
use App\Traits\SuccessMessage;
use Illuminate\Support\Facades\Auth;

class AssignService
{
    use SuccessMessage;

    public function __construct(private AssignRepositoryInterface $assignRepository, private NotificationService $notificationService)
    {
    }

    public function getOldestAssign($ticket_id)
    {
        return $this->assignRepository->getFirstAssign($ticket_id);
    }

    public function getLatestAssign($ticket_id)
    {
        return $this->assignRepository->getLatestAssign($ticket_id);
    }

    public function getDepartmentCount()
    {
        return $this->assignRepository->getDepartmentCount();
    }

    public function assignOpenTicket($request)
    {
        $data_array = [
            'admin_id' => Auth::guard('admin')->id(),
            'department_id' => $request['department_id'],
            'ticket_id' => $request['ticket_id'],
        ];

        $data = $this->assignRepository->create($data_array);
        $this->getTaskSuccessMessage('Ticked Forwarded Successfully');
        LogActivity::addToLog('Open Ticket Forwarded - ' . '"' . $data->ticket_id . '"' . ' to department '
            . '"' . $data->department_id . '"');
        $this->notificationService->sendOpenTicketForwardNotification
        ($data->ticket_id, $data->department_id, Auth::guard('admin')->user()->department->name);
        return $data;
    }

    public function assignProcessingTicket($request)
    {
        $data_array = [
            'admin_id' => Auth::guard('admin')->id(),
            'department_id' => $request['department_id'],
            'ticket_id' => $request['ticket_id'],
        ];
        $data = $this->assignRepository->create($data_array);
        $this->getTaskSuccessMessage('Ticked Forwarded Successfully');
        LogActivity::addToLog('Processing Ticket Forwarded - ' . '"' . $data->ticket_id . '"' . ' to department '
            . '"' . $data->department_id . '"');
        $this->notificationService->sendProcessingTicketForwardNotification($data->ticket_id, $data->department_id, Auth::guard('admin')->user()->department->name);
        return $data;
    }

    public function assignNewOpenTicket($ticket_id)
    {
        $data_array = [
            'ticket_id' => $ticket_id,
            'department_id' => null,
            'admin_id' => null,
        ];

        return $this->assignRepository->create($data_array);
    }


}
