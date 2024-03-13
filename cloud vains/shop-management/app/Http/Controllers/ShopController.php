<?php

// app/Http/Controllers/ShopController.php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $shops = Shop::all();
        return view('shops.index', compact('shops'));
    }

    public function create()
    {
        return view('shops.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'shop_name' => 'required|string',
            'contact_number' => 'required|string',
            'address' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $images[] = $path;
            }
        }
    
        Shop::create([
            'shop_name' => $request->input('shop_name'),
            'contact_number' => $request->input('contact_number'),
            'address' => $request->input('address'),
            'images' => $images,
            'status' => 'live',
        ]);
    
        return redirect('/')->with('success', 'Shop created successfully.');
    }
    
    public function update(Request $request, Shop $shop)
    {
        $request->validate([
            'shop_name' => 'required|string',
            'contact_number' => 'required|string',
            'address' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $images = $shop->images;
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $images[] = $path;
            }
        }
    
        $shop->update([
            'shop_name' => $request->input('shop_name'),
            'contact_number' => $request->input('contact_number'),
            'address' => $request->input('address'),
            'images' => $images,
        ]);
    
        return redirect('/')->with('success', 'Shop updated successfully.');
    }

    public function edit(Shop $shop)
{
    return view('shops.edit', compact('shop'));
}

    public function destroy(Shop $shop)
    {
        // Delete images from storage
        foreach ($shop->images as $image) {
            Storage::delete($image);
        }

        $shop->delete();

        return redirect('/')->with('success', 'Shop deleted successfully.');
    }

    public function changeStatus(Request $request, Shop $shop)
    {
        $status = $request->input('status');
        $shop->update(['status' => $status]);

        return response()->json(['message' => 'Status updated successfully.']);
    }
}
