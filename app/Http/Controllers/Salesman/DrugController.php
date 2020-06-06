<?php

namespace App\Http\Controllers\Salesman;

use App\Http\Controllers\Controller;
use App\Models\DrugForm;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    public function create()
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href='#!'>Drug</a></li>";
        $link_2 = "<li class='breadcrumb-item'><a href=" . route('salesman.drugs.create') . ">Add</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Add a new drug";
        $forms = DrugForm::all();
        return view('salesman.drugs.create', compact('title', 'links', 'forms'));
    }
}
