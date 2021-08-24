<?php
namespace Modules\Menu\Services;
use Modules\Menu\Repositories\MenuRepo;
use Modules\Menu\Repositories\MenuItemsRepo;
class KingMenu
{
    public $menuRepo;
    public $menuitemRepo;
    public function __construct(MenuRepo $menuRepo,MenuItemsRepo $menuitemRepo ){
        $this->menuitemRepo=$menuitemRepo;
        $this->menuRepo=$menuRepo;   
    }
    public function render()
    {
        $menulist = $this->menuRepo->getMenuList();
        //$roles = Role::all();
        if ((request()->has("action") && empty(request()->input("menu"))) || request()->input("menu") == '0') {
            return view('menu::menu-html')->with("menulist" , $menulist);
        } 
        else
        {
            $menu =$this->menuRepo->getById(request()->input("menu"));
            $MenuItem =$this->menuitemRepo->getByMenuId(request()->input("menu"));
            $data = ['MenuItem' => $MenuItem, 'menu' => $menu, 'menulist' => $menulist];
            if( config('menu.use_roles')) {
                $data['roles'] =$this->menuRepo->getRole(); 
                $data['role_pk'] = config('menu.roles_pk');
                $data['role_title_field'] = config('menu.roles_title_field');
            }
            return view('menu::menu-html', $data);
        }
    }
    public function scripts()
    {
        return view('menu::scripts');
    }
    public function select($name = "menu", $menulist = array())
    {
        $html = '<select name="' . $name . '">';
        foreach ($menulist as $key => $val) {  
            $active = '';
            if (request()->input('menu') == $key) {
                $active = 'selected="selected"';
            }
            $html .= '<option ' . $active . ' value="' . $key . '">' . $val . '</option>';
        }
        $html .= '</select>';
        return $html;
    }
    public  function getByName($name)
    {
        $menu =$this->menuRepo->getByName($name);
        return is_null($menu) ? [] : $this->get($menu->id);
    }
    public  function get($menu_id)
    {
        $menu_list = $this->menuitemRepo->getByMenuId($menu_id);
        $roots = $this->menuitemRepo->getParentByMenuId($menu_id); 

        $items = $this->tree($roots, $menu_list);
        return $items;
    }
    private  function tree($items, $all_items)
    {
        $data_arr = array();
        $i = 0;
        foreach ($items as $item) {
            $data_arr[$i] = $item->toArray();
            $find = $all_items->where('parent', $item->id);
            $data_arr[$i]['child'] = array();
            if ($find->count()) {
                $data_arr[$i]['child'] = $this->tree($find, $all_items);
            }
            $i++;
        }
        return $data_arr;
    }
}