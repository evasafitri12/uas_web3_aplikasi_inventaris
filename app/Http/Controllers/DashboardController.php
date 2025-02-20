<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $categoryCount = Category::count();
        $supplierCount = Category::count();

        return view('pages.dashboard.admin', compact('productCount', 'categoryCount', 'supplierCount'));
    }
}
