<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReadNotificationResource;
use App\Http\Resources\UnreadNotificationResource;
use App\Service\NotificationService;

class NotificationController extends Controller
{
    public function __construct(private NotificationService $notificationService)
    {
    }

    public function unreadNotification()
    {
        $notification = $this->notificationService->getUnread();
        return UnreadNotificationResource::collection($notification);
    }

    public function unreadNotificationCount()
    {
        return response()->json($this->notificationService->getUnreadCount());
    }

    public function readNotification()
    {
        $notification = $this->notificationService->getRead();
        return ReadNotificationResource::collection($notification);
    }

    public function allNotification()
    {
        $notifications = $this->notificationService->getAll()->withQueryString();
        return view('dashboard.pages.notifications', compact('notifications'));
    }

    public function markAllNotification()
    {
        $this->notificationService->markAll();
        return redirect('/dashboard/notifications');
    }

    public function markNotification($notification_id)
    {
        $this->notificationService->mark($notification_id);
        return response()->json(['success' => 'marked'], 201);
    }

}
