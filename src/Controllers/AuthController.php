<?php

namespace Fouladgar\SSO\Controllers;

use Symfony\Component\HttpFoundation\Response;

class AuthController
{
    public function login()
    {
       return (new Response('YAYA'))->send();
    }
}
