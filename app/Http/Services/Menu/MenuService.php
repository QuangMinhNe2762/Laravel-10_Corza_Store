<?php
namespace App\Http\Services\Menu;

use App\Models\Menu;
use App\Models\product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class MenuService
{
    public function create($request)
    {
        try {
            Menu::create([
            'name'=>(string)$request->input('name'),
            'parent_id'=>(int)$request->input('parent_id'),
            'description'=>(string)$request->input('description'),
            'content'=>(string)$request->input('content'),
            'active'=>(int)$request->input('active'),
            'slug'=>Str::slug($request->input('name'), '-')
        ]);
        Session::flash('success','Thêm mới danh mục thành công');
        } catch (\Exception $e) {
           Session::flash('error',$e->getMessage());
           return false;
        }
        return true;
    }




    // lấy các menu có parent_id = 0
    public function getParrent()
    {
        return Menu::where('parent_id',0)->get();
    }



    // lấy danh sách menu
    public function getListMenu()
    {
        return Menu::orderby('id')->paginate(10);
    }


    // lấy danh sách menu con
    public function getListMenuChild()
    {
        return Menu::where('parent_id','<>',0)->orderby('id')->paginate(10);
    }


    public function destroy($request)
    {
        $menu=Menu::where('id',$request->input('id'))->first();
        if($menu)
        {
            return Menu::where('id',$request->input('id'))->orWhere('parent_id',$request->input('id'))->delete();
        }
        return false;
    }



    public function update($request,$menu):bool
    {
        //$menu->name=(string)$request->input('name');
        //tương tự như trên
        $menu->fill($request->input());//cách này ngắn hơn cách trên
        $menu->save();
        Session::flash('success','Cập nhật danh mục thành công');
        return true;
    }
    //================================================================================================
    // lấy các menu chỉ có id,name
    public function showMenu()
    {
        return Menu::select('id','name')->where('parent_id',0)->orderby('id','desc')->get();
    }
    public function getById($id)
    {
        return Menu::where('id',$id)->where('active',1)->firstOrfail();
    }
    public function getProductByMenuId($menu,$orderby){
        if($orderby==null)
        {
            $orderby='asc';
        }
        // phải thêm get vào mới lấy được dữ liệu
        return $menu->products()->select('id','name','price','image')->where('active',1)->orderby('price',$orderby)->paginate(8);
    }
    public function getSlug($id)
{
    $menu=product::select('menu_id')->where('id',$id)->first();
    return Menu::select('slug')->where('id',$menu->id)->where('active',1)->get();
}
}
