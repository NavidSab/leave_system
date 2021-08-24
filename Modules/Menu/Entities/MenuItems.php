<?php
namespace Modules\Menu\Entities;
use Illuminate\Database\Eloquent\Model;
class MenuItems extends Model
{
    protected $fillable = ['label', 'link', 'parent', 'sort', 'class', 'menu', 'depth', 'role_id'];

}
