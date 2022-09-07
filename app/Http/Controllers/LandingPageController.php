<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    
    public function index() 
    {
        return view('pages.landingpage.index');
    }
    
    public function detail_bali() 
    {
        return view('pages.landingpage.detail-bali');
    }
    
    public function detail_nusapenida() 
    {
        return view('pages.landingpage.detail-nusapenida');
    }
    
    public function checkout() 
    {
        return view('pages.landingpage.checkout');
    }
    
    public function success() 
    {
        return view('pages.landingpage.success');
    }
}
