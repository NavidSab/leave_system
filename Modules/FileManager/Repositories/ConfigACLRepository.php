<?php

namespace Modules\FileManager\Repositories;

/**
 * Class ConfigACLRepository
 *
 * Get rules from filemanager config file - aclRules
 *
 * @package Alexusmai\LaravelFileManager\Services\ACLService
 */
class ConfigACLRepository implements ACLRepository
{
    /**
     * Get user ID
     *
     * @return mixed
     */
    public function getUserID()
    {
        return \Auth::id();
    }

    /**
     * Get rules from file-manger.php config file
     *
     * @return array
     */
    public function getRules(): array
    {
        return config('filemanager.aclRules')[$this->getUserID()] ?? [];
    }
}
