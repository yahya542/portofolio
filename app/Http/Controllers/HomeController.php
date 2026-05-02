<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Menu;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $menus = Menu::where('is_active', true)
            ->orderBy('order_number')
            ->get()
            ->groupBy('parent_id');

        $featuredPortfolio = PortfolioItem::where('is_featured', true)
            ->where('is_published', true)
            ->with('category')
            ->orderBy('order_number')
            ->limit(6)
            ->get();

        $certificates = Certificate::orderBy('order_number')
            ->limit(4)
            ->get();

        return view('frontend.home', compact('menus', 'featuredPortfolio', 'certificates'));
    }
}
