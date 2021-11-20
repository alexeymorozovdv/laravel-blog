<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'posts' => $user->posts,
            'comments' => $user->comments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        if (empty($user)) {
            return back()
                ->withErrors(['msg' => "User id=[{$user->id}] not found"])
                ->withInput();
        } elseif ($user) {
            $user->update($request->all());

            return redirect()
                ->route('admin.users.edit', $user->id)
                ->with(['success' => 'Successfully updated!']);
        } else {
            return back()
                ->withErrors(['msg' => "Save error"])
                ->withInput();
        }
    }
}
