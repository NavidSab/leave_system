<?php
namespace Modules\Menu\Repositories;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Entities\MenuItems;
use Illuminate\Support\Facades\Hash;
use DB;
class MenuRepo
{
    public function getAll()
    {
        return Menu::orderBy('id','DESC')->paginate(5);
    }
    public function getById($id)
    {
        return Menu::find($id);
    }
    public function delete($id)
    {
        return Menu::find($id)->delete();
    }

    public function store($request)
    {
        return Menu::create([
            'name'     => $request->name,
        ]);
    }
    public  function getByName($name)
    {
        return Menu::where('name', '=', $name)->first();
    }
    public function getitems()
    {
        return Menu::hasMany(MenuItems::class, 'menu')->with('child')->where('parent', 0)->orderBy('sort', 'ASC');
    }
    public function generate($request){
        die(print_r($request->all()));
        $menu = Menu::find($request->idmenu);
        $menu->name = $request->menuname;
        $menu->save();
        if (is_array($request->arraydata)) {
            foreach ($request->arraydata as $value) {
                $menuitem = MenuItems::find($value["id"]);
                $menuitem->parent = $value["parent"];
                $menuitem->sort = $value["sort"];
                $menuitem->depth = $value["depth"];
                if (config('menu.use_roles')) {
                    $menuitem->role_id = $request->role_id;
                }
                $menuitem->save();
            }
        }
    }
    public function getMenuList(){
        $menulist = Menu::select(['id', 'name'])->get();
        return $menulist->pluck('name', 'id')->prepend('Select menu', 0)->all();
    }
    public function getRole(){
        return DB::table(config('menu.roles_table'))->select([config('menu.roles_pk'),config('menu.roles_title_field')])->get();
    }
}