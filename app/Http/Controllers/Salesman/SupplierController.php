<?php

namespace App\Http\Controllers\Salesman;

use Carbon\Carbon;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    public function create()
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('salesman.suppliers.index') . ">Suppliers</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('salesman.suppliers.create') . ">Add</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Add a new supplier";
        return view('salesman.suppliers.create', compact('title', 'links'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'note' => 'required',
            'status' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,jpg,png'
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);

        dd($request);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image_thumb = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            dump($image_name);

            if (!Storage::disk('public')->exists('suppliers')) {
                Storage::disk('public')->makeDirectory('suppliers');
            }

            $supplier_image = Image::make($image)->resize(150, 150);
            $supplier_image = $supplier_image->stream();
            Storage::disk('public')->put('suppliers/'.$image_name, $supplier_image);

            if (!Storage::disk('public')->exists('supplier_thumbnails')) {
                Storage::disk('public')->makeDirectory('supplier_thumbnails');
            }

            $supplier_thumb = Image::make($image)->resize(25, 25);
            $supplier_thumb = $supplier_thumb->stream();
            Storage::disk('public')->put('supplier_thumbnails/'.$image_thumb, $supplier_thumb);
        }

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->note = $request->note;
        $supplier->status = $request->status;
        $supplier->image = $image_name;
        $supplier->thumb = $image_thumb;
        $supplier->save();

        Toastr::success('message', 'Supplier created successfully.');
        return redirect()->route('salesman.suppliers.index');
    }
}
