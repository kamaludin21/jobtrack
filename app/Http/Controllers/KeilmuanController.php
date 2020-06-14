<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subkeilmuan;

class KeilmuanController extends Controller
{
    public function getSubKeilmuan($id)
    {
        $subkeilmuan = Subkeilmuan::where('idKeilmuan', $id)->pluck('subkeilmuan', 'id');
        return json_encode($subkeilmuan);
    }
}
