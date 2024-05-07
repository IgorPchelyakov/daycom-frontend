<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieConsentController extends Controller
{
    public function setCookieAndAccept(Request $request) {
        $response = new Response('Set cookie');
        $response->cookie('cookie_accepted', 'true', 30 * 24 * 60);
        return $response;
    }

    public function index(Request $request) {
        if (!$request->cookie('cookie_accepted')) {
            return view('home');
        }
        return view('home');
    }

    public function revokeCookie(Request $request) {
        $response = new Response('Revoke cookie');
        $response->cookie('cookie_accepted', '', time() - 3600);
        return $response;
    }
}
