<?php

namespace App\Http\Controllers\Salesman;

use App\Models\DrugForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class DrugFormController extends Controller
{
    public function index()
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('salesman.drugs.index') . ">Drugs</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href='#!'>Forms</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Drug Forms";
        $drugForms = DrugForm::all();
        return view('salesman.drugs.forms.index', compact('title', 'links', 'drugForms'));
    }

    public function create()
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('salesman.drugs.index') . ">Drugs</a></li>";
        $link_2 = "<li class='breadcrumb-item'><a href=" . route('salesman.drugs.forms.index') . ">Forms</a></li>";
        $link_3 = "<li class='breadcrumb-item active'><a href='#!'>Add</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $links[] = $link_3;
        $title = "Add a new drug form";
        return view('salesman.drugs.forms.create', compact('title', 'links'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $drugForm = new DrugForm();
        $drugForm->name = $request->name;
        $drugForm->save();

        Toastr::success('message', 'Drug form created successfully.');
        return redirect()->route('salesman.drugs.forms.index');
    }

    public function show(int $id)
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('salesman.drugs.index') . ">Drugs</a></li>";
        $link_2 = "<li class='breadcrumb-item'><a href=" . route('salesman.drugs.forms.index') . ">Forms</a></li>";
        $link_3 = "<li class='breadcrumb-item active'><a href='#!'>Show</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $links[] = $link_3;
        $form = DrugForm::findOrFail($id);
        $title = "Update drug form $form->name";
        return view('salesman.drugs.forms.show', compact('title', 'links', 'form'));
    }

    public function edit(int $id)
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('salesman.drugs.index') . ">Drugs</a></li>";
        $link_2 = "<li class='breadcrumb-item'><a href=" . route('salesman.drugs.forms.index') . ">Forms</a></li>";
        $link_3 = "<li class='breadcrumb-item active'><a href='#!'>Edit</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $links[] = $link_3;
        $form = DrugForm::findOrFail($id);
        $title = "Update $form->name";
        return view('salesman.drugs.forms.edit', compact('title', 'links', 'form'));
    }

    public function update(request $request, int $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $drugForm = DrugForm::findOrFail($id);
        $drugForm->name = $request->name;
        $drugForm->save();

        Toastr::success('message', 'Drug form updated successfully.');
        return redirect()->route('salesman.drugs.forms.index');
    }

    public function destroy(int $id)
    {
        $form = DrugForm::findOrFail($id);
        $form->delete();

        Toastr::success('message', 'Drug form deleted successfully.');
        return back();
    }
}
