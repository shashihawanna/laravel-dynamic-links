<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the user can update the page.
     */
    public function update(User $user, Page $page)
    {
        return $user->id === $page->user_id;
    }

    /**
     * Determine if the user can delete the page.
     */
    public function delete(User $user, Page $page)
    {
        return $user->id === $page->user_id;
    }
}
