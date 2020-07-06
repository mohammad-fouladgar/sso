<?php

namespace Fouladgar\SSO\Controllers;

use Symfony\Component\HttpFoundation\Response;

class AuthController
{
    public function login()
    {
       return (new Response('LOGIN'))->send();
    }

    public function logout()
    {
        return (new Response('LOGOUT'))->send();
    }
}
