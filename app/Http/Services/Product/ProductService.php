<?php
namespace App\Http\Services\Product;

use App\Models\product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

    class ProductService{
        public function isValidPrice($request)
        {

            if($request->input('price')!=null && $request->input('price_salce')!=null && $request->input('price')<=$request->input('price_salce'))
            {
                Session::flash('error','Giá giảm phải nhỏ hơn giá gốc');
                return false;
            }
            if($request->input('price')==null)
            {
                Session::flash('error','Vui lòng nhập giá gốc');
                return false;
            }
            if($request->input('quantity')==null)
            {
                Session::flash('error','Vui lòng nhập số lượng');
                return false;
            }
            return true;
        }



        public function insert($request){
            $is_valid_price=$this->isValidPrice($request);
            if($is_valid_price==false)
            {
                return false;
            }
                            try {
                                $request->except('_token');
                product::create(
                    $request->all()
                );
                Session::flash('success','Thêm sản phẩm thành công');
            } catch (\Exception $e) {
                Session::flash('error','Thêm sản phẩm thất bại');
                Log::info($e->getMessage());
                return false;
            }
            return true;
        }


        public function getAll()
        {
            return product::with('menu')->orderBy('id','desc')->paginate(7);
        }



        public function findProduct($id)
        {
            return product::find($id);
        }




        public function updateProduct($request,$id):bool
        {
            $is_valid_price=$this->isValidPrice($request);
            if($is_valid_price==false)
            {
                return false;
            }
            try {
                $product=product::find($id);
                $product->fill($request->input());
                $product->save();
                Session::flash('success','Cập nhật sản phẩm thành công');

            } catch (\Throwable $th) {
                Session::flash('error','Cập nhật sản phẩm thất bại');
                Log::info($th->getMessage());
                return false;
            }
            return true;
        }



        public function deleteProduct($id)
        {
            try {
                product::destroy($id);
                Session::flash('success','Xóa sản phẩm thành công');

            } catch (\Throwable $th) {
                Session::flash('error','Xóa sản phẩm thất bại');
                Log::info($th->getMessage());
                return false;
            }
            return true;
        }
        //================================================================================================
        const LIMIT=8;
        public function showProduct()
        {
            return product::select('products.id', 'products.name', 'products.price', 'products.image', 'products.menu_id', 'menus.slug')->join('menus', 'products.menu_id', '=', 'menus.id')->where('products.active',1)->limit(self::LIMIT)->orderby('id','desc')->get();
        }



        public function loadMoreProduct($page=null)
        {
            return Product::select('products.id', 'products.name', 'products.price', 'products.image', 'products.menu_id', 'menus.slug')
                ->join('menus', 'products.menu_id', '=', 'menus.id')
                ->when($page != null, function ($query) use ($page) {
                    $query->offset($page * self::LIMIT);
                })
                ->limit(self::LIMIT)
                ->orderBy('products.id', 'desc')
                ->get();
            // return product::select('id', 'name', 'price', 'image','menu_id')
            //     ->when($page != null, function ($query) use ($page) {
            //         $query->offset($page * self::LIMIT);
            //     })->limit(self::LIMIT)->orderBy('id', 'desc')->get();
        }
        public function showProductDetail($id)
        {
            return product::where('id',$id)->where('active',1)->with('menu')->firstorfail();
        }
        public function showProductSimilar($id,$menu_id)
        {
            return product::inRandomOrder()->where('id','!=',$id)->where('menu_id',$menu_id)->where('active',1)->limit(4)->get();
        }
    }
