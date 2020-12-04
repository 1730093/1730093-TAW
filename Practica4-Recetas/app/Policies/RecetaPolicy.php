<?php

namespace App\Policies;

use App\Models\Recetas2;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecetaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recetas2  $recetas2
     * @return mixed
     */
    public function view(User $user, Recetas2 $recetas2)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recetas2  $recetas
     * @return mixed
     */
    public function update(User $user, Recetas2 $recetas)
    {
        //Para verificar si el usuario es el que creo la receta
        return $user->id === $recetas->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recetas2  $recetas2
     * @return mixed
     */
    public function delete(User $user, Recetas2 $recetas2)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recetas2  $recetas2
     * @return mixed
     */
    public function restore(User $user, Recetas2 $recetas2)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recetas2  $recetas2
     * @return mixed
     */
    public function forceDelete(User $user, Recetas2 $recetas2)
    {
        //
    }
}
