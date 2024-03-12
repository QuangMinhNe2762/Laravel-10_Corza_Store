<?php
namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class sliderService{
    public function create($request)
    {
        $slide=$this->check_sortBy($request->input('sort_by'));
        if($slide)
        {
            Session::flash('error','thứ tự slide đã có, vui lòng nhập số khác');
            return false;
        }
        try {
            Slider::create($request->all());
            Session::flash('success','Thêm slide thành công');
        } catch (\Throwable $th) {
            Session::flash('error','Thêm slide thất bại');
            Log::info($th->getMessage());
            return false;
        }
        return true;
    }
    public function getAll()
    {
        return Slider::OrderBy('id','desc')->get();
    }
    public function destroy($id)
    {
        $slide=Slider::Where('id',$id)->first();
        if($slide)
        {
            $path=str_replace('storage','public',$slide->image);
            Storage::delete($path);
            $slide->delete();
            return true;
        }
        return false;
    }
    public function getSlide($id)
    {
        return Slider::find($id);
    }
    public function updateSlide($request,$id)
    {
        $slide=$this->check_sortBy($request->input('sort_by'));
        if($slide)
        {
            Session::flash('error','thứ tự slide đã có, vui lòng nhập số khác');
            return false;
        }
        try {
            $slide=Slider::find($id);
        $request->except('_token');
        $slide->fill($request->input());
        $slide->save();
        Session::flash('success','Chỉnh sửa slide thành công');
        } catch (\Throwable $th) {
            Session::flash('error','Chỉnh sửa slide thất bại');
            Log::info($th->getMessage());
            return false;
        }
        return true;
    }
    public function check_sortBy($sortBy)
    {
        $slide=Slider::Where('sort_by',$sortBy);
        if($slide)
        {
            return false;
        }
        return true;
    }
    //================================================================================================
    public function ShowSlider()
    {
        return Slider::select('Name','Image','Sort_by')->where('active',1)->get();
    }
}
