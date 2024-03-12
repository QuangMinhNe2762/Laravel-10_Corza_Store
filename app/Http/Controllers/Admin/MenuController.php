<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService=$menuService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // trả về danh sách menu
        return view('admin.users.menus.list',['menus'=>$this->menuService->getListMenu()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.menus.menu_create',[
            'menus'=>$this->menuService->getparrent(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFormRequest $request)
    {
        $this->menuService->create($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return view('admin.users.menus.menu_edit',['menu'=>$menu,'menus'=>$this->menuService->getparrent()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateFormRequest $request, Menu $menu)
    {

        $this->menuService->update($request,$menu);
        return redirect()->route('menus.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request):JsonResponse
    {
        $result=$this->menuService->destroy($request);
        if($result)
        {
            return response()->json([
                'error'=>false,
                'message'=>'xóa thư mục thành công',
            ]);
        }
        else{
            return response()->json([
                'error'=>true,
            ]);
        }
    }
}
