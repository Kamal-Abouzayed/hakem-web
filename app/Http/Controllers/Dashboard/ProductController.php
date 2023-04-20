<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProductRequest;
use App\Repositories\Contract\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'المنتجات';

        $products = $this->productRepo->getAll();

        return view('dashboard.products.index', compact('pageTitle', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'إضافة منتج جديد';

        return view('dashboard.products.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // dd($request->all());

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products');
        }

        if ($request->discount) {

            $discount = $request->price * ($request->discount / 100);

            $priceAfterDiscount = $request->price - $discount;

            $data['price_after_discount'] = $priceAfterDiscount;
        } else {

            $data['discount'] = 0;

            $data['price_after_discount'] = $request->price;
        }

        $product = $this->productRepo->create($data);

        return redirect()->route('dashboard.products.index')->with('success', 'تمت الإضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'تعديل المنتجات';

        $product = $this->productRepo->findOne($id);

        if ($product) {
            return view('dashboard.products.edit', compact('product', 'pageTitle'));
        } else {
            return view('errors.404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = $this->productRepo->findOne($id);

        $data = $request->except('_method');

        // dd($data);

        if ($request->hasFile('image')) {

            Storage::delete($product->image);

            $data['image'] = $request->file('image')->store('products');
        } else {
            $data['image'] = $product->image;
        }

        $product->update($data);

        if ($request->attribute_key) {

            $product->attributes()->delete();

            foreach ($request->attribute_key as $key => $value) {
                $product->attributes()->create([
                    'key' => $value,
                    'value' => $request->attribute_value[$key]
                ]);
            }
        }

        if ($request->capacity || $request->length || $request->width || $request->height) {

            $product->dimensions()->delete();

            foreach ($request->capacity as $key => $value) {
                $product->dimensions()->create([
                    'capacity' => $value,
                    'length'   => $request->length[$key],
                    'width'    => $request->width[$key],
                    'height'   => $request->height[$key],
                ]);
            }
        }



        return redirect()->route('dashboard.products.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productRepo->findOne($id);

        Storage::delete($product->image);

        $product->delete();

        return response()->json([
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
