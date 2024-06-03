<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        echo 'INI ADMIN INDEX';
        echo "<br><a href='logout'>LOGOUT</a>";
    }
}
