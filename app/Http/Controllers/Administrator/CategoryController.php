<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Route;

class CategoryController extends Controller
{

    private $view  = 'administrator.modules.category.';

    private $route = 'admin.category.index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $route = Route::currentRouteName();

        $data = Category::orderBy('id', 'ASC')->get();

        return view( $this->view . 'index' ,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::orderBy('id', 'DESC')->get();

        return view( $this->view . 'create' ,compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valdidateData = $request->validate([
            'name' => 'required|unique:category'
        ],[
            'name.required' => 'Vui lòng nhập tên thể loại',
            'name.unique'   => 'Tên thể loại này đã tồn tại'
        ]);

        $data = $request->except('_token');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;
        $data['slug'] = Str::slug($data['name'], '-');

        Category::insert($data);
        return redirect()->route($this->route);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
    
        $data = Category::where('slug',$slug)->first();
        $cate = Category::orderBy('id', 'DESC')->get();
        return view( $this->view . 'edit' ,compact('data', 'cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  slug  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $valdidateData = $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Vui lòng nhập tên thể loại'
        ]);

        $data = $request->except('_token');
        $data['updated_at'] = new DateTime;
        $data['slug'] =  Str::slug($request->name, '-');
        
        Category::where('slug', $slug)->update($data);

        return redirect()->route($this->route);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();

        return redirect()->route('admin.category.index');
    }
}
