<?php

namespace App\Policies;

use App\Models\Board;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BoardPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Permitir que cualquier usuario autenticado vea cualquier board
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Board $board): bool
    {
        // Permitir que un usuario vea un board si es el propietario
        return $user->id === $board->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Permitir que cualquier usuario autenticado cree un board
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Board $board): bool
    {
        // Permitir que un usuario actualice un board si es el propietario
        return $user->id === $board->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Board $board): bool
    {
        // Permitir que un usuario elimine un board si es el propietario
        return $user->id === $board->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Board $board): bool
    {
        // Permitir que un usuario restaure un board si es el propietario
        return $user->id === $board->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Board $board): bool
    {
        // Permitir que un usuario elimine permanentemente un board si es el propietario
        return $user->id === $board->user_id;
    }
}