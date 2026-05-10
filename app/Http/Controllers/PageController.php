<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PortfolioItem;
use App\Models\ResumeSection;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {
        // Handle special pages that don't need database content
        if (in_array($slug, ['portfolio', 'certificates', 'services'])) {
            $data = [];

            switch ($slug) {
                case 'portfolio':
                    $portfolioItems = PortfolioItem::where('is_published', true)
                        ->with('category')
                        ->orderBy('order_number')
                        ->get();
                    $categories = $portfolioItems->pluck('category')
                        ->unique()
                        ->filter();
                    $data['portfolioItems'] = $portfolioItems;
                    $data['categories'] = $categories;
                    break;

                case 'certificates':
                case 'services':
                    $certificates = Certificate::orderBy('order_number')->get();
                    $data['certificates'] = $certificates;
                    break;
            }

            return view("frontend.{$slug}", $data);
        }

        // For About and Resume pages, load resume sections
        if (in_array($slug, ['about', 'resume'])) {
            $resumeSections = ResumeSection::active()
                ->ordered()
                ->get()
                ->groupBy('section_type');

            if ($slug === 'resume') {
                return view('frontend.resume', compact('resumeSections'));
            }

            $data = compact('resumeSections');

            // About page has its own view at frontend/about.blade.php
            return view("frontend.{$slug}", $data);
        }

        // For other pages, get content from database
        $page = Page::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $data = ['page' => $page];

        // Check if specific view exists, otherwise use default
        $viewName = "frontend.{$slug}";
        if (!view()->exists($viewName)) {
            $viewName = 'frontend.default';
        }

        return view($viewName, $data);
    }
}
