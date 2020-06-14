<?php

use App\Notifikasi;

function UserNotifications($id)
{
    $getNotif = Notifikasi::where([
        ['idStakeholder', '=', $id],
        ['status', '=', 'unread']
    ])->orderBy('notifikasis.created_at', 'desc')->get();

    return $getNotif;
}
