<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyStatistic;
use App\Models\HeroSection;
use App\Models\OurPrinciple;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Testimonial;

class FrontController extends Controller
{
    public function index()
    {
        $hero_section = HeroSection::orderByDesc('id')->take(1)->get();
        $testimonials = Testimonial::orderByDesc('id')->take(10)->get();
        $statistics = CompanyStatistic::orderByDesc('id')->take(4)->get();
        $principles = OurPrinciple::orderByDesc('id')->take(4)->get();
        $products = Product::orderByDesc('id')->take(3)->get();
        $teams = OurTeam::orderByDesc('id')->take(7)->get();
        return view('front.index', compact('statistics', 'principles', 'products', 'teams', 'testimonials', 'hero_section',),);
    }
}
