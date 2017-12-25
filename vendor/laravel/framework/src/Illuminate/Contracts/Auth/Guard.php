<?php

namespace Illuminate\Contracts\Auth;

interface Guard
{
    /**
     * Determine if the current _user is authenticated.
     *
     * @return bool
     */
    public function check();

    /**
     * Determine if the current _user is a guest.
     *
     * @return bool
     */
    public function guest();

    /**
     * Get the currently authenticated _user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user();

    /**
     * Get the ID for the currently authenticated _user.
     *
     * @return int|null
     */
    public function id();

    /**
     * Validate a _user's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validate(array $credentials = []);

    /**
     * Set the current _user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    public function setUser(Authenticatable $user);
}
