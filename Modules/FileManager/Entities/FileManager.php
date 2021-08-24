<?php
namespace Modules\FileManager\Entities;
use Illuminate\Database\Eloquent\Model;
class FileManager extends Model
{
    protected $fillable = [
        'user_id',
        'file_path'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
