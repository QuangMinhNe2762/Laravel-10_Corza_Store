<?php

namespace App\Http\Controllers;

use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Slider\sliderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $menuService;
    protected $sliderService;
    protected $productService;
    public function __construct(MenuService $menuService,sliderService $sliderService,ProductService $productService)
    {
        $this->menuService = $menuService;
        $this->sliderService = $sliderService;
        $this->productService= $productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus=$this->menuService->showMenu();
        $sliders=$this->sliderService->ShowSlider();
        $products=$this->productService->showProduct();
        return view('coza_store.index',['menusParrent'=>$menus,'sliders'=>$sliders,'products'=>$products]);
    }
    public function loadProduct(Request $request):JsonResponse
    {
        $page=$request->input('page',0);
        $products=$this->productService->loadMoreProduct($page);
        if($products->count()>0)
        {
            $html=view('coza_store.products.product_loadMore',['products'=>$products])->render();
        return response()->json([
            'error'=>false,
            'html'=>$html,
        ]);
        }
        return response()->json([
            'error'=>true,
            'html'=>'',
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
