<?php
namespace Modules\Menu\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Menu\Entities\Menus;
use Modules\Menu\Entities\MenuItems;
use Modules\Menu\Repositories\MenuRepo;
use Modules\Menu\Repositories\MenuItemsRepo;
class MenuController extends Controller
{
    public $menuitemRepo,$menuRepo;
    public function __construct(MenuRepo $menuRepo,MenuItemsRepo $menuitemRepo){
        $this->menuitemRepo=$menuitemRepo;
        $this->menuRepo=$menuRepo;
        $this->middleware('auth');
    }
    public function index()
    {
        return view('menu::index');
    }
    public function createMenu(Request $request)
    {

        $menu=$this->menuRepo->store($request);
        return json_encode(array("data" => $menu->id));
    }
    public function deleteMenuItem(Request $request)
    {
        $this->menuitemRepo->delete($request->id);
    }
    public function deleteMenu(Request $request)
    {
        $getall =$this->menuitemRepo->getByMenuId($request->id);
        if (count($getall) == 0) {
            $menudelete = $this->menuRepo->delete($request->id);
            return json_encode(array("resp" => "you delete this item"));
        } 
        else
        {
            return json_encode(array("resp" => "You have to delete all items first", "error" => 1));
        }
    }
    public function updateMenuItem(Request $request)
    {
        $this->menuitemRepo->update($request);
    }
    public function addCustomMenuItem(Request $request)
    {
        $this->menuitemRepo->addCustomItem($request);
    }
    public function generateMenuControl(Request $request)
    {
        $this->menuRepo->generate($request);
        echo json_encode(array("resp" => 1));
    }
}
