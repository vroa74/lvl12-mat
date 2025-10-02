<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'rfc' => ['required', 'string', 'min:10', 'max:13', 'unique:users'],
            'curp' => ['required', 'string', 'min:10', 'max:20', 'unique:users'],
            'sex' => ['required', 'in:masculino,femenino'],
            'theme' => ['required', 'in:dark,light'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'rfc' => $input['rfc'],
            'curp' => $input['curp'],
            'sex' => $input['sex'],
            'theme' => $input['theme'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
