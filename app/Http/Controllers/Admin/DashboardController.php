<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'portfolio_items' => PortfolioItem::count(),
            'certificates' => Certificate::count(),
            'pages' => Page::count(),
            'menus' => Menu::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Display menu management.
     */
    public function menus()
    {
        $menus = Menu::orderBy('order_number')->get()->groupBy('parent_id');
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Store a new menu item.
     */
    public function storeMenu(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'icon_class' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'order_number' => 'integer',
            'is_active' => 'boolean',
        ]);

        Menu::create($validated);

        return redirect()->back()->with('success', 'Menu item created successfully.');
    }

    /**
     * Update menu item.
     */
    public function updateMenu(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'icon_class' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'order_number' => 'integer',
            'is_active' => 'boolean',
        ]);

        $menu->update($validated);

        return redirect()->back()->with('success', 'Menu item updated successfully.');
    }

    /**
     * Delete menu item.
     */
    public function destroyMenu(Menu $menu)
    {
        $menu->delete();

        return redirect()->back()->with('success', 'Menu item deleted successfully.');
    }

    /**
     * Display page management.
     */
    public function pages()
    {
        $pages = Page::orderBy('created_at', 'desc')->get();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show edit page form.
     */
    public function editPage(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update page.
     */
    public function updatePage(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'is_published' => 'boolean',
        ]);

        $page->update($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully.');
    }
}
