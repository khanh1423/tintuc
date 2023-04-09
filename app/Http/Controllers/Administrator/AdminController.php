<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $view = 'administrator.modules.admin.';
    public function index()
    {
        $CateAll    = Category::orderBy('id', 'ASC')->count();
        $CateStatus = Category::orderBy('id', 'ASC')->where('status', 1)->count();
        $NewsAll    = News::orderBy('id', 'ASC')->count();
        $NewsStatus = News::orderBy('id', 'ASC')->where('status', 1)->count();
        
        return view($this->view . 'index', compact('CateAll', 'CateStatus', 'NewsAll', 'NewsStatus'));
    }
}
