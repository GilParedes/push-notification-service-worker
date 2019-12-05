<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NotificationChannels\WebPush\PushSubscription;
use AvengersMG\MGCms2019\App\Cms\Users\User;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get user from request
        $user = User::findOrFail($request->userId);

        // create PushSubcription
        $pushsub = $user->updatePushSubscription($request->subscription['endpoint'], $request->subscription['keys']['p256dh'], $request->subscription['keys']['auth']);

        return $pushsub;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->validate($request, ['endpoint' => 'required']);

        $user = PushSubscription::findByEndpoint($request->endpoint)->user;

        $user->deletePushSubscription($request->endpoint);
        
        return response()->json_decode(null, 204);

    }
}
