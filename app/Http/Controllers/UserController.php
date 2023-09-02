<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Managers\UserManager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userManager->getAllUsers();

        return response()->json(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validatedData = $request->validated();

        $user = $this->userManager->createUser(
            // Pass user data
            [
                'user_type_id' => $validatedData['user_type_id'],
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'gender' => $validatedData['gender'],
                'age' => $validatedData['age'],
                'address' => $validatedData['address'],
            ],
            // Pass user credential data
            [
                'username' => $validatedData['username'],
                'password' => $validatedData['password'],
            ]
        );

        return response()->json(['message' => 'User registered successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userManager->getUserByIdWithRelations($id);

        return response()->json(['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $this->userManager->updateUser($user, $request->validated());

        return response()->json(['message' => 'User updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Use the UserManager to delete the user and associated credentials
        $this->userManager->deleteUserWithCredentials($user);

        return response()->json(['message' => 'User and associated credentials deleted successfully']);
    }
}
