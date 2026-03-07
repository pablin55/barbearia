<?php

namespace App\Policies;

use App\Models\Faturamento;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FaturamentoPolicy
{
    /**
     * Determine whether the user can view any models.
     * (Controla se o menu aparece no sidebar)
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Faturamento $faturamento): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Faturamento $faturamento): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Faturamento $faturamento): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Faturamento $faturamento): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Faturamento $faturamento): bool
    {
        return $user->role === 'admin';
    }
}