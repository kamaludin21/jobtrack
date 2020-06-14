<?php

use App\Notifikasi;

function DotNotify($id)
{
    // notifikasi utk pelamar sahaja
    $checkNotifikasiUser = Notifikasi::where([
        ['idStakeholder', '=', $id],
        ['status', '=', 'unread']
    ])->get();

    if($checkNotifikasiUser->isEmpty()) {
        return "";
    } else {
        return "dot";
    }

}