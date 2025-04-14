<?php

namespace App\Policies;

use App\Models\Expense;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpensePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Expense $expense)
    {
        return $user->role === 'Admin' || ($user->role === 'Manager' && $user->company_id === $expense->company_id);
    }

    public function delete(User $user, Expense $expense)
    {
        return $user->role === 'Admin';
    }
}
