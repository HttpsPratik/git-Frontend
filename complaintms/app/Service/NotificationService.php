<?php

namespace App\Service;

use App\Notifications\OpenTicketForwardNotification;
use App\Notifications\ProcessingTicketForwardNotification;
use App\Repository\Interfaces\AdminRepositoryInterface;
use App\Traits\SuccessMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NotificationService
{
    use SuccessMessage;
    public function __construct(private AdminRepositoryInterface $adminRepository)
    { }

    //Notification senders
    public function sendOpenTicketForwardNotification($ticket_id, $department_id, $sender_department)
    {
        $admins = $this->adminRepository->getDepartmentAdmins($department_id);
        Notification::send($admins, new OpenTicketForwardNotification($ticket_id, $sender_department));
    }

    public function sendProcessingTicketForwardNotification($ticket_id, $department_id, $sender_department)
    {
        $admins = $this->adminRepository->getDepartmentAdmins($department_id);
        Notification::send($admins, new ProcessingTicketForwardNotification($ticket_id, $sender_department));
    }


    //Notification Functions
    public function getUnread()
    {
        return Auth::guard('admin')
            ->user()
            ->notifications()
            ->where('read_at', null )
            ->paginate(6);
    }

    public function getUnreadCount()
    {
        return Auth::guard('admin')
            ->user()
            ->notifications()
            ->where('read_at', null )
            ->count();
    }

    public function getRead()
    {
        return Auth::guard('admin')
            ->user()
            ->notifications()
            ->where('read_at','!=', null )
            ->get();
    }

    public function getAll()
    {
        return Auth::guard('admin')
            ->user()
            ->notifications()
            ->orderBy('read_at', 'asc')
            ->paginate();
    }

    public function markAll()
    {
        $this->getTaskSuccessMessage('Marked all as read ');
        return Auth::guard('admin')
            ->user()
            ->notifications()
            ->where('read_at', null )
            ->update(['read_at' => now()]);
    }

    public function mark($notification_id)
    {
        $notification = Auth::guard('admin')
            ->user()
            ->notifications()
            ->where('id', $notification_id)
            ->first();
         $notification->markAsRead();
    }


}
