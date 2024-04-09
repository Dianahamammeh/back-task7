<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::with('products')->get();
        return response()->json([

            'status' => 'success',
            'brands' => $brands

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        try {
            // DB::beginTransaction();
            $brand = Brand::create([
                
                'name' => $request->name,
                'slogan' => $request->slogan,
            ]);
            // DB::commit();
            return response()->json([

                'status' => 'success',
                'brands' => $brand

            ]);
        } catch (\Throwable $th) {
            // DB::rollBack();
            Log::error($th);
            return response()->json([
                'status' => 'error',
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
