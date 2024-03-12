<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Services\Customer\CustomerService;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $cartService;
    protected $customerService;
    public function __construct(CartService $cartService, CustomerService $customerService)
    {
        $this->customerService = $customerService;
        $this->cartService = $cartService;
    }
    public function index()
    {
        if ($this->cartService->checkCart()) {
            $products = $this->cartService->showCart();
        } else {
            $products = [];
            $qty = null;
        }
        return view('coza_store.Carts.Carts_list', ['products' => $products]);
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
        $result = $this->cartService->add($request);
        if ($result == false) {
            return redirect()->back();
        }
        return redirect('/carts');
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
    public function update(Request $request)
    {
        $this->cartService->update($request->input('products'));
        return redirect('/carts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->cartService->destroy($id);
        return redirect('/carts');
    }
    public function completeCart(Request $request)
    {
        if ($this->cartService->checkCart()) {
            $customer = $request->except(['_token']);
            $result = $this->customerService->addCustomer($customer);
            if ($result) {
                $getIDCustomer = $this->customerService->getCustomer($customer);
                ['price' => $price, 'qty' => $qty, 'productsId' => $productsId] = $this->cartService->getPriceProduct();
                $result2 = $this->cartService->Order($getIDCustomer, $price, $qty, $productsId, $customer['email']);
                if ($result2) {
                    $this->cartService->ClearCart($productsId);
                    return redirect('/carts');
                }
            }
        }
        return redirect()->back();
    }
}
