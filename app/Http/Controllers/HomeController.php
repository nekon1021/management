<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $productController;

    public function __construct(ProductController $productController)
    {
        $this->middleware('auth');
        $this->productController = $productController;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return $this->productController->index();
    }

    public function create(Request $request)
    {
        return $this->productController->create(request());
    }

    public function store(Request $request)
    {
        
        return $this->productController->store(request());

    }

    public function show($id)
    {
        return $this->productController->show($id);
    }

    public function edit($id)
    {
        return $this->productController->edit($id);
    }
}
