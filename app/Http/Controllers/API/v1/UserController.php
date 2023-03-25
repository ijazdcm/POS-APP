<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\API\v1\BaseController as BaseController;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return $this->sendResponse(UserResource::collection($users), 'Users successfully fetched');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);

        return $this->sendResponse(UserResource::make($user), 'Employee Created', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $this->sendResponse(UserResource::make($user), '');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validated();

        $user->updateOrCreate($data);

        return $this->sendResponse(UserResource::make($user), 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->sendResponse([], 'User deleted successfully');
    }
}
