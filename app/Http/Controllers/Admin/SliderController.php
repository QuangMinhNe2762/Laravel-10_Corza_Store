<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\CreateFormSliderRequest;
use App\Http\Services\Slider\sliderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $sliderService;
    public function __construct(sliderService $sliderService)
    {
        $this->sliderService=$sliderService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.sliders.slider_list',['sliders'=>$this->sliderService->getAll()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.sliders.sideBar_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFormSliderRequest $request)
    {
        // dd($request->input());
        $this->sliderService->create($request);
        return redirect()->back();
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
        $slide=$this->sliderService->getSlide($id);
        return view('admin.users.sliders.slider_edit',['slide'=>$slide]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->input());
        $this->sliderService->updateSlide($request,$id);
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request):JsonResponse
    {
        $result=$this->sliderService->destroy($request->input('id'));
        if($result)
        {
return response()->json(
            [
                'error'=>false,
                'message'=>'Xóa slide thành công'
            ]);
        }
        else{
            return response()->json([
                'error'=>true
            ]);
        }
    }
}
