<?php

namespace Modules\FileManager\Repositories;


/**
 * Class DefaultConfigRepository
 *
 * @package Alexusmai\LaravelFileManager\Services\ConfigService
 */
class DefaultConfigRepository 
{
    /**
     * LFM Route prefix
     * !!! WARNING - if you change it, you should compile frontend with new prefix(baseUrl) !!!
     *
     * @return string
     */
    public function getRoutePrefix(): string
    {
        return config('filemanager.routePrefix');
    }

    /**
     * Get disk list
     *
     * ['public', 'local', 's3']
     *
     * @return array
     */
    public function getDiskList(): array
    {
        return config('filemanager.diskList');
    }

    /**
     * Default disk for left manager
     *
     * null - auto select the first disk in the disk list
     *
     * @return string|null
     */
    public function getLeftDisk(): ?string
    {
        return config('filemanager.leftDisk');
    }

    /**
     * Default disk for right manager
     *
     * null - auto select the first disk in the disk list
     *
     * @return string|null
     */
    public function getRightDisk(): ?string
    {
        return config('filemanager.rightDisk');
    }

    /**
     * Default path for left manager
     *
     * null - root directory
     *
     * @return string|null
     */
    public function getLeftPath(): ?string
    {
        return config('filemanager.leftPath');
    }

    /**
     * Default path for right manager
     *
     * null - root directory
     *
     * @return string|null
     */
    public function getRightPath(): ?string
    {
        return config('filemanager.rightPath');
    }

    /**
     * Image cache ( Intervention Image Cache )
     *
     * set null, 0 - if you don't need cache (default)
     * if you want use cache - set the number of minutes for which the value should be cached
     *
     * @return int|null
     */
    public function getCache(): ?int
    {
        return config('filemanager.cache');
    }

    /**
     * File manager modules configuration
     *
     * 1 - only one file manager window
     * 2 - one file manager window with directories tree module
     * 3 - two file manager windows
     *
     * @return int
     */
    public function getWindowsConfig(): int
    {
        return config('filemanager.windowsConfig');
    }

    /**
     * File upload - Max file size in KB
     *
     * null - no restrictions
     */
    public function getMaxUploadFileSize(): ?int
    {
        return config('filemanager.maxUploadFileSize');
    }

    /**
     * File upload - Allow these file types
     *
     * [] - no restrictions
     */
    public function getAllowFileTypes(): array
    {
        return config('filemanager.allowFileTypes');
    }

    /**
     * Show / Hide system files and folders
     *
     * @return bool
     */
    public function getHiddenFiles(): bool
    {
        return config('filemanager.hiddenFiles');
    }

    /**
     * Middleware
     *
     * Add your middleware name to array -> ['web', 'auth', 'admin']
     * !!!! RESTRICT ACCESS FOR NON ADMIN USERS !!!!
     *
     * @return array
     */
    public function getMiddleware(): array
    {
        return config('filemanager.middleware');
    }

    /**
     * ACL mechanism ON/OFF
     *
     * default - false(OFF)
     *
     * @return bool
     */
    public function getAcl(): bool
    {
        return config('filemanager.acl');
    }

    /**
     * Hide files and folders from filemanager if user doesn't have access
     *
     * ACL access level = 0
     *
     * @return bool
     */
    public function getAclHideFromFM(): bool
    {
        return config('filemanager.aclHideFromFM');
    }

    /**
     * ACL strategy
     *
     * blacklist - Allow everything(access - 2 - r/w) that is not forbidden by the ACL rules list
     *
     * whitelist - Deny anything(access - 0 - deny), that not allowed by the ACL rules list
     *
     * @return string
     */
    public function getAclStrategy(): string
    {
        return config('filemanager.aclStrategy');
    }

    /**
     * ACL rules repository
     *
     * default - config file(ConfigACLRepository)
     *
     * @return string
     */
    public function getAclRepository(): string
    {
        return config('filemanager.aclRepository');
    }

    /**
     * ACL Rules cache
     *
     * null or value in minutes
     *
     * @return int|null
     */
    public function getAclRulesCache(): ?int
    {
        return config('filemanager.aclRulesCache');
    }
}
