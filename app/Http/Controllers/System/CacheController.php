<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\ApiController;
use App\Servers\Access;

/**
 * 更新缓存
 * Class CacheController
 * @package App\Http\Controllers\System
 */
class CacheController extends ApiController
{
    /**
     * 更新缓存
     * @param Access $access
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Access $access): \Illuminate\Http\JsonResponse
    {
        $this->authorize('update', auth()->user());
        $access->updateAllSitePermission();
        return $this->success('缓存更新成功');
    }
}
