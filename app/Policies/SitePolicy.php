<?php

namespace App\Policies;

use App\User;
use App\Models\Site;
use Illuminate\Auth\Access\HandlesAuthorization;

class SitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the site.
     *
     * @param  \App\User $user
     * @param  \App\Models\Site $site
     * @return mixed
     */
    public function view(User $user, Site $site)
    {
        //
    }

    /**
     * Determine whether the user can create sites.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the site.
     *
     * @param  \App\User $user
     * @param  \App\Models\Site $site
     * @return mixed
     */
    public function update(User $user, Site $site)
    {
        //
    }

    /**
     * Determine whether the user can delete the site.
     *
     * @param  \App\User $user
     * @param  \App\Models\Site $site
     * @return mixed
     */
    public function delete(User $user, Site $site)
    {
        return $user['id'] == $site['user_id'] || isSuperAdmin();
    }

    /**
     * Determine whether the user can restore the site.
     *
     * @param  \App\User $user
     * @param  \App\Models\Site $site
     * @return mixed
     */
    public function restore(User $user, Site $site)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the site.
     *
     * @param  \App\User $user
     * @param  \App\Models\Site $site
     * @return mixed
     */
    public function forceDelete(User $user, Site $site)
    {
        //
    }
}
