<?php

namespace App\Http\Controllers;

use App\Models\Websites;
use Illuminate\Http\Request;

class WebsitesController extends Controller
{
    public function index()
    {
        return view('websites.index', [
            'pageTitle' => 'Website List',
            'websiteList' => Websites::all()
        ]);
    }
}
