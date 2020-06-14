<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifikasi;

class NotifikasiController extends Controller
{
    //Open link
    // 1. When click, change status from unread to unread
    // 2. if notif about change status, go to detail loker
    // 3. if notif diterima, go to url -> user/lamaran

    public function readNotify($id)
    {
        $notifikasi = Notifikasi::findOrFail($id);
        $notifikasi->status = 'read';
        $notifikasi->save();
        return redirect('user/lamaran');
    }

    public function readAcceptableStatus($ticket)
    {
        $notify = Notifikasi::where('ticket', $ticket)->update('status', 'read');
        return redirect('user/lamaran');
    }
}
