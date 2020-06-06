<?php

namespace App\Http\Controllers\Salesman;

use Carbon\Carbon;
use App\Models\Drug;
use App\Models\DrugForm;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class DrugController extends Controller
{
    public function index()
    {
        $drugs = Drug::all();
        $links = [];
        $link_1 = "<li class='breadcrumb-item active'><a href=" . route('salesman.drugs.index') . ">Drugs</a></li>";
        $links[] = $link_1;
        $title = "Manage drugs";
        return view('salesman.drugs.index', compact('drugs', 'links', 'title'));
    }

    public function create()
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('salesman.drugs.index') . ">Drugs</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('salesman.drugs.create') . ">Add</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Add a new drug";
        $suppliers = Supplier::all();
        $forms = DrugForm::all();
        return view('salesman.drugs.create', compact('title', 'links', 'suppliers', 'forms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required',
            'name' => 'required',
            'generic_name' => 'required',
            'strength' => 'sometimes',
            'drug_form_id' => 'required',
            'box_size' => 'required',
            'trade_price' => 'required',
            'mrp' => 'sometimes',
            'box_price' => 'sometimes',
            'side_effect' => 'sometimes',
            'expire_date' => 'sometimes',
            'image' => 'sometimes|image|mimes:jpeg,jpg,png',
            'short_stock' => 'required',
            'favourite' => 'sometimes',
            'discount' => 'required',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->generic_name);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image_thumb = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('drugs')) {
                Storage::disk('public')->makeDirectory('drugs');
            }

            $drug_image = Image::make($image)->resize(150, 150);
            $drug_image = $drug_image->stream();
            Storage::disk('public')->put('drugs/'.$image_name, $drug_image);

            if (!Storage::disk('public')->exists('drug_thumbnails')) {
                Storage::disk('public')->makeDirectory('drug_thumbnails');
            }

            $drug_thumb = Image::make($image)->resize(25, 25);
            $drug_thumb = $drug_thumb->stream();
            Storage::disk('public')->put('drug_thumbnails/'.$image_thumb, $drug_thumb);
        }

        $drug = new Drug();
        $drug->supplier_id = $request->supplier_id;
        $drug->name = $request->name;
        $drug->generic_name = $request->generic_name;
        $drug->barcode = $request->barcode;
        $drug->strength = $request->strength;
        $drug->drug_form_id = $request->drug_form_id;
        $drug->box_size = $request->box_size;
        $drug->trade_price = $request->trade_price;
        $drug->mrp = $request->mrp;
        $drug->box_price = $request->box_price;
        $drug->side_effect = $request->side_effect;
        $drug->expire_date = $request->expire_date;
        $drug->image = $image_name;
        $drug->thumb = $image_thumb;
        $drug->short_stock = $request->short_stock;
        $fa = $request->favourite;
        if($fa==''){
            $drug->favourite = '0';
        } else {
            $drug->favourite = $fa;
        }
        $drug->discount = $request->discount;
        $drug->save();

        Toastr::success('message', 'Drug created successfully.');
        return redirect()->route('salesman.drugs.index');
    }

    public function show(int $id)
    {
        $drug = Drug::findOrFail($id);
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('salesman.drugs.index') . ">Drugs</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('salesman.drugs.show', $id) . ">Show</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "$drug->name drug";
        return view('salesman.drugs.show', compact('drug', 'title', 'links'));
    }

    public function edit(int $id)
    {
        $drug = Drug::findOrFail($id);
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('salesman.drugs.index') . ">Drugs</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('salesman.drugs.edit', $id) . ">Edit</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Edit $drug->name drug";
        $suppliers = Supplier::all();
        $forms = DrugForm::all();
        return view('salesman.drugs.edit', compact('drug', 'suppliers', 'forms', 'title', 'links'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'supplier_id' => 'required',
            'name' => 'required',
            'generic_name' => 'required',
            'strength' => 'sometimes',
            'drug_form_id' => 'required',
            'box_size' => 'required',
            'trade_price' => 'required',
            'mrp' => 'sometimes',
            'box_price' => 'sometimes',
            'side_effect' => 'sometimes',
            'expire_date' => 'sometimes',
            'image' => 'sometimes|image|mimes:jpeg,jpg,png',
            'short_stock' => 'required',
            'favourite' => 'sometimes',
            'discount' => 'required',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->generic_name);

        $drug = Drug::find($id);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image_thumb = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('drugs')){
                Storage::disk('public')->makeDirectory('drugs');
            }
            if(Storage::disk('public')->exists('drugs/'.$drug->image)){
                Storage::disk('public')->delete('drug/'.$drug->image);
            }
            $drug_image = Image::make($image)->resize(150, 150)->stream();
            Storage::disk('public')->put('drugs/'.$image_name, $drug_image);

            if(!Storage::disk('public')->exists('drug_thumbnails')){
                Storage::disk('public')->makeDirectory('drugs');
            }
            if(Storage::disk('public')->exists('drug_thumbnails/'.$drug->thumb)){
                Storage::disk('public')->delete('drug_thumbnails/'.$drug->thumb);
            }
            $drug_thumb = Image::make($image)->resize(25, 25)->stream();
            Storage::disk('public')->put('drug_thumbnails/'.$image_thumb, $drug_thumb);
        }else{
            $image_name = $drug->image;
            $image_thumb = $drug->thumb;
        }

        $drug->supplier_id = $request->supplier_id;
        $drug->name = $request->name;
        $drug->generic_name = $request->generic_name;
        $drug->barcode = $request->barcode;
        $drug->strength = $request->strength;
        $drug->drug_form_id = $request->drug_form_id;
        $drug->box_size = $request->box_size;
        $drug->trade_price = $request->trade_price;
        $drug->mrp = $request->mrp;
        $drug->box_price = $request->box_price;
        $drug->side_effect = $request->side_effect;
        $drug->expire_date = $request->expire_date;
        $drug->image = $image_name;
        $drug->thumb = $image_thumb;
        $drug->short_stock = $request->short_stock;
        $fa = $request->favourite;
        if($fa==''){
            $drug->favourite = '0';
        } else {
            $drug->favourite = $fa;
        }
        $drug->discount = $request->discount;
        $drug->save();

        Toastr::success('message', 'Drug Updated successfully.');
        return redirect()->route('salesman.drugs.index');
    }

    public function destroy(int $id)
    {
        $drug = Drug::find($id);

        if(Storage::disk('public')->exists('drugs/'.$drug->image)){
            Storage::disk('public')->delete('drugs/'.$drug->image);
        }

        if(Storage::disk('public')->exists('drug_tumbnails/'.$drug->thumb)){
            Storage::disk('public')->delete('drug_tumbnails/'.$drug->thumb);
        }

        $drug->delete();

        Toastr::success('message', 'Drug deleted successfully.');
        return back();
    }
}
