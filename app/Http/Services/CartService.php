<?php

namespace App\Http\Services;

use App\Jobs\SendMail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function add($request)
    {
        $qty = (int)$request->input('num-product');
        $pr_id = (int)$request->input('product_id');
        if ($pr_id <= 0) {
            Session::flash('error', 'Sản phẩm không tồn tại');
            return false;
        }
        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [$pr_id => $qty]);
            $carts = Session::get('carts');
            return true;
        }
        $exist = Arr::exists($carts, $pr_id);
        if ($exist) {
            $carts[$pr_id] += $qty;
        } else {
            $carts[$pr_id] = $qty;
        }
        Session::put('carts', $carts);
        $carts = Session::get('carts');
        return true;
    }
    public function showCart()
    {
        // Session::forget('carts');
        $carts = Session::get('carts');
        krsort($carts);
        $productsId = array_keys($carts);
        $qty = array_values($carts);
        $products = product::Select('id', 'name', 'price', 'image')->where('active', 1)->whereIn('id', $productsId)->OrderBy('id', 'desc')->get();
        foreach ($products as $index => $product) {
            if ($carts[$product->id])
                $product->qty = $qty[$index];
        }
        return $products;
    }
    public function checkCart()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) {
            return false;
        }
        return true;
    }
    public function update($request)
    {
        Session::put('carts', $request->input('products'));
    }
    public function destroy($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);
        Session::put('carts', $carts);
    }
    public function Order($getIDCustomer, $price, $qty, $productsId, $email)
    {
        try {
            for ($i = 0; $i < count($price); $i++) {
                Cart::create(
                    [
                        'customer_id' => $getIDCustomer,
                        'product_id' => $productsId[$i],
                        'qty' => $qty[$i],
                        'price' => $price[$i]->getOriginal('price')
                    ]
                );
            }
            Session::flash('success', 'Đặt hàng thành công');

            SendMail::dispatch($email)->delay(now()->addSeconds(5));
        } catch (\Throwable $th) {
            Session::flash('error', 'Đặt hàng thất bại');
            Log::info($th->getMessage());
            return false;
        }
        return true;
    }
    public function getPriceProduct()
    {
        $carts = Session::get('carts');
        krsort($carts);
        $productsId = array_keys($carts);
        $qty = array_values($carts);
        $price = product::select('price')->whereIn('id', $productsId)->OrderBy('id', 'desc')->get();
        return ['price' => $price, 'qty' => $qty, 'productsId' => $productsId];
        //mục đích lấy về mảng giá sản phẩm và số lượng sản phẩm
    }
    public function ClearCart($idProducts)
    {
        foreach ($idProducts as $idProduct) {
            Session::pull('carts', $idProduct);
        }
    }
    public function getAllCustomer()
    {
        return Customer::OrderBy('id', 'desc')->paginate(10);
        // return Cart::with('customer')->OrderBy('id', 'desc')->paginate(7);
    }
    public function destroyCart($id)
    {
        try {
            Cart::destroy($id);
            Session::flash('success', 'Xóa Đơn đặt hàng thành công');
        } catch (\Throwable $th) {
            Session::flash('error', 'Xóa Đơn đặt hàng thất bại');
            Log::info($th->getMessage());
            return false;
        }
        return true;
    }
    public function getProductFromCart()
    {
        $products = Cart::OrderBy('id', 'desc')->paginate(10);
        return $products;
    }
}
