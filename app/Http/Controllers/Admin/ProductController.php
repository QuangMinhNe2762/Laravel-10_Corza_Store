<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreatFormProductRequest;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $menuService;
    protected $ProductService;
    public function __construct(MenuService $menuService,ProductService $ProductService)
    {
        $this->menuService=$menuService;
        $this->ProductService=$ProductService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.products.product_list',['products'=>$this->ProductService->getAll()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus=$this->menuService->getListMenuChild();
        return view('admin.users.products.product_create',['menus'=>$menus]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatFormProductRequest $request)
    {
        $this->ProductService->insert($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product=$this->ProductService->findProduct($id);
        $menus=$this->menuService->getListMenuChild();
        // dd($product);
        return view('admin.users.products.product_edit',['product'=>$product,'menus'=>$menus]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreatFormProductRequest $request, string $id)
    {
        $this->ProductService->updateProduct($request,$id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request):JsonResponse
    {
        $result=$this->ProductService->deleteProduct($request->input('id'));
        if($result)
        {
            return response()->json([
                'error'=>false,
                'message'=>'xóa sản phẩm thành công',
                        ]);
        }
        else{
            return response()->json([
                'error'=>true,
            ]);
        }
    }
}
