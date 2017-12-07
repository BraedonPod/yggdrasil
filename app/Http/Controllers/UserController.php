<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = auth()->user();
        $this->authorize('update', $user);
        return view('auth.account.user.edit', [
            'user' => $user
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UsersRequest $request)
    {
        $user = auth()->user();
        $this->authorize('update', $user);
        $user->update(array_filter($request->only(['name', 'email'])));
        return redirect()->route('users.edit')->withSuccess(__('users.updated'));
    }
}
