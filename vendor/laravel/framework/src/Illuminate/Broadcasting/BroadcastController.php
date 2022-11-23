<?php

namespace Illuminate\Broadcasting;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Broadcast;
<<<<<<< HEAD
=======
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

class BroadcastController extends Controller
{
    /**
     * Authenticate the request for channel access.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        if ($request->hasSession()) {
            $request->session()->reflash();
        }

        return Broadcast::auth($request);
    }
<<<<<<< HEAD
=======

    /**
     * Authenticate the current user.
     *
     * See: https://pusher.com/docs/channels/server_api/authenticating-users/#user-authentication.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticateUser(Request $request)
    {
        if ($request->hasSession()) {
            $request->session()->reflash();
        }

        return Broadcast::resolveAuthenticatedUser($request)
                    ?? throw new AccessDeniedHttpException;
    }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
