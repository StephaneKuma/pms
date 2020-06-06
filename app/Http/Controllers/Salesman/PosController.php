<?php

namespace App\Http\Controllers\Salesman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index()
    {
        $links = [];
        $link = "<li class='breadcrumb-item'><a href=" . route('salesman.pos') . ">POS</a></li>";
        $links[] = $link;
        $title = "Point Of Sale";
        return view('salesman.pos', compact('title', 'links'));
    }
}
