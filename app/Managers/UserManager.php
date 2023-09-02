<?php

namespace App\Managers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserManager
{
    public function getAllUsers()
    {
        return User::with(['userType', 'userCredential'])->get();
    }

    public function createUser(array $userData, array $credentialData)
    {
        $user = User::create($userData);

        $user->userCredential()->create([
            'username' => $credentialData['username'],
            'password' => Hash::make($credentialData['password']),
        ]);

        return $user;
    }

    public function getUserByIdWithRelations($id)
    {
        return User::with(['userType', 'userCredential'])->findOrFail($id);
    }

    public function updateUser(User $user, array $data)
    {
        $user->update($data);
        $user->userCredential->update([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }
    
    public function deleteUserWithCredentials(User $user): void
    {
        if ($user->userCredential) {
            $user->userCredential->delete();
        }

        $user->delete();
    }

}