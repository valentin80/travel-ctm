<?php

namespace App\Http\Controllers;

use App\UserSubscription;
use Illuminate\Http\Request;

class UserSubscriptionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Returns user subscription model based on user id
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function showUserSubscription($id, Request $request)
    {
        return response()->json(UserSubscription::find($id));
    }

    /**
     * Creates a user subscription and return user subscription model
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:user_subscriptions,email',
            'subscribed' => 'required|boolean'
        ]);

        $author = UserSubscription::create($request->all());

        return response()->json($author, 201);
    }

    /**
     * Unsubscribe user from a user subscription model
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id, Request $request)
    {
        $user = UserSubscription::findOrFail($id);
        $user->delete();

        return response()->json($user, 200);

    }

    /**
     * Unsubscribe a user
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function unsubscribe($id, Request $request)
    {

        $user = UserSubscription::findOrFail($id);
        $user->update(['subscribed' => 0]);

        return response()->json($user, 200);

    }

    /**
     * Subscribe a user
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribe($id, Request $request)
    {

        $user = UserSubscription::findOrFail($id);
        $user->update(['subscribed' => 1]);

        return response()->json($user, 200);

    }

    /**
     * Update user subscription model
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subscribed' => 'required|boolean'
        ]);

        $user = UserSubscription::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }

    //
}
