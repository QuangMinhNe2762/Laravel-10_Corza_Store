<?php

namespace App\Http\Services\Customer;

use App\Models\Customer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CustomerService
{
    public function addCustomer($customer)
    {
        try {
            Customer::create($customer);
            Session::flash('success', 'Thêm khách hàng thành công');
        } catch (\Throwable $th) {
            Session::flash('error', 'Thêm khách hàng thất bại');
            Log::info($th->getMessage());
            return false;
        }
        return true;
    }
    public function getCustomer($customer)
    {
        $idCustomer = Customer::select('id')->where('name', $customer['name'])->where('phone', $customer['phone'])->where('email', $customer['email'])->first();
        return $idCustomer->getOriginal('id');
    }
}
