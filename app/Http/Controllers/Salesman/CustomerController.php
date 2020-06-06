<?php

namespace App\Http\Controllers\Salesman;

use Carbon\Carbon;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index()
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item active'><a href=" . route('salesman.customers.index') . ">Customers</a></li>";
        $links[] = $link_1;
        $title = "Manage customers";
        $customers = Customer::all();
        return view('salesman.customers.index', compact('title', 'links', 'customers'));
    }

    public function create()
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('salesman.customers.index') . ">Customers</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('salesman.customers.create') . ">Add</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Add a new customer";
        $companies = Company::all();
        return view('salesman.customers.create', compact('title', 'links', 'companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'name' => 'required',
            'type' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'target_amount' => 'required',
            'target_discount' => 'required',
            'regular_discount' => 'required',
            'note' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image_thumb = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('customers')) {
                Storage::disk('public')->makeDirectory('customers');
            }

            $drug_image = Image::make($image)->resize(150, 150);
            $drug_image = $drug_image->stream();
            Storage::disk('public')->put('customers/'.$image_name, $drug_image);

            if (!Storage::disk('public')->exists('customer_thumbnails')) {
                Storage::disk('public')->makeDirectory('customer_thumbnails');
            }

            $drug_thumb = Image::make($image)->resize(25, 25);
            $drug_thumb = $drug_thumb->stream();
            Storage::disk('public')->put('customer_thumbnails/'.$image_thumb, $drug_thumb);
        }

        $customer = new Customer();
        $customer->company_id = $request->company_id;
        $customer->name = $request->name;
        $customer->type = $request->type;
        $customer->email = $request->company_id;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->target_amount = $request->target_amount;
        $customer->target_discount = $request->target_discount;
        $customer->regular_discount = $request->regular_discount;
        $customer->note = $request->note;
        $customer->image = $image_name;
        $customer->thumb = $image_thumb;
        $customer->save();

        Toastr::success('message', 'Customer created successfully.');
        return redirect()->route('salesman.customers.index');
    }

    public function show(int $id)
    {
        $customer = Customer::findOrFail($id);
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('salesman.customers.index') . ">Customers</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('salesman.customers.show', $customer->id) . ">Show</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "$customer->name";
        return view('salesman.customers.show', compact('title', 'links', 'customer'));
    }

    public function edit(int $id)
    {
        $customer = Customer::findOrFail($id);
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('salesman.customers.index') . ">Customers</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('salesman.customers.edit', $customer->id) . ">Edit</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Edit $customer->name";
        $companies = Company::all();
        return view('salesman.customers.edit', compact('title', 'links', 'customer', 'companies'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'company_id' => 'required',
            'name' => 'required',
            'type' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'target_amount' => 'required',
            'target_discount' => 'required',
            'regular_discount' => 'required',
            'note' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);

        $customer = Customer::find($id);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image_thumb = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('customers')){
                Storage::disk('public')->makeDirectory('customers');
            }
            if(Storage::disk('public')->exists('customers/'.$customer->image)){
                Storage::disk('public')->delete('customers/'.$customer->image);
            }
            $drug_image = Image::make($image)->resize(150, 150)->stream();
            Storage::disk('public')->put('customers/'.$image_name, $drug_image);

            if(!Storage::disk('public')->exists('customer_thumbnails')){
                Storage::disk('public')->makeDirectory('customers');
            }
            if(Storage::disk('public')->exists('customer_thumbnails/'.$customer->thumb)){
                Storage::disk('public')->delete('customer_thumbnails/'.$customer->thumb);
            }
            $customer_thumb = Image::make($image)->resize(25, 25)->stream();
            Storage::disk('public')->put('customer_thumbnails/'.$image_thumb, $customer_thumb);
        }else{
            $image_name = $customer->image;
            $image_thumb = $customer->thumb;
        }

        $customer->company_id = $request->company_id;
        $customer->name = $request->name;
        $customer->type = $request->type;
        $customer->email = $request->company_id;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->target_amount = $request->target_amount;
        $customer->target_discount = $request->target_discount;
        $customer->regular_discount = $request->regular_discount;
        $customer->note = $request->note;
        $customer->image = $image_name;
        $customer->thumb = $image_thumb;
        $customer->save();

        Toastr::success('message', 'Customer updated successfully.');
        return redirect()->route('salesman.customers.index');
    }

    public function delete(int $id)
    {
        $customer = Customer::find($id);

        if(Storage::disk('public')->exists('customers/'.$customer->image)){
            Storage::disk('public')->delete('customers/'.$customer->image);
        }

        if(Storage::disk('public')->exists('customer_tumbnails/'.$customer->thumb)){
            Storage::disk('public')->delete('customer_tumbnails/'.$customer->thumb);
        }

        $customer->delete();

        Toastr::success('message', 'Customer deleted successfully.');
        return back();
    }

    public function regular()
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('salesman.customers.index') . ">Customers</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('salesman.customers.regular') . ">Regular</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Regular customers";
        $customers = Customer::all()->where('type', '=', 'Regular');
        return view('salesman.customers.index', compact('title', 'links', 'customers'));
    }

    public function wholesale()
    {
        $links = [];
        $link_1 = "<li class='breadcrumb-item'><a href=" . route('salesman.customers.index') . ">Customers</a></li>";
        $link_2 = "<li class='breadcrumb-item active'><a href=" . route('salesman.customers.wholesale') . ">Wholesale</a></li>";
        $links[] = $link_1;
        $links[] = $link_2;
        $title = "Wholesale customers";
        $customers = Customer::all()->where('type', '=', 'Wholesale');
        return view('salesman.customers.index', compact('title', 'links', 'customers'));
    }
}
