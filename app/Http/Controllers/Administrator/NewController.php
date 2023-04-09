<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Route;

class NewController extends Controller
{

    private $view  = 'administrator.modules.new.';

    private $route = 'admin.new.index';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $route = Route::currentRouteName();

        $data   = News::orderBy('id', 'ASC')->get();
        return view($this->view . 'index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id', 'ASC')->get();
        return view($this->view . 'create', compact('category'));
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
            'title'     => 'required|unique:new',
            'author'    => 'required',
            'intro'     => 'required',
            'content'   => 'required',
            'foot'      => 'required',
            'image'     => 'required'
        ],[
            'title.required'    => 'Vui lòng nhập tiêu đề',
            'title.unique'      => 'Tiêu đề này đã tồn tại',
            'author.required'   => 'Vui lòng nhập tác giả',
            'intro.required'    => 'Vui lòng nhập lời mở đầu',
            'content.required'  => 'Vui lòng nhập nội dung',
            'foot.required'     => 'Vui lòng nhập đoạn kết',
            'image.required'    => 'Vui lòng chọn ảnh'
        ]);

        $data = $request->except('_token');
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;
        $data['slug'] = Str::slug($data['title'], '-');
        //thêm ảnh
        $file = $request->image;      
        $file->move('upload/news', $file->getClientOriginalName());
        $data["image"] =  $file->getClientOriginalName();

        News::insert($data);
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
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = News::where('slug',$slug)->first();
        $category = Category::orderBy('id', 'ASC')->get();
        return view($this->view . 'edit', compact('category', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $valdidateData = $request->validate([
            'title'     => 'required',
            'author'    => 'required',
            'intro'     => 'required',
            'content'   => 'required',
            'foot'      => 'required'
        ],[
            'title.required'    => 'Vui lòng nhập tiêu đề',
            'author.required'   => 'Vui lòng nhập tác giả',
            'intro.required'    => 'Vui lòng nhập lời mở đầu',
            'content.required'  => 'Vui lòng nhập nội dung',
            'foot.required'     => 'Vui lòng nhập đoạn kết'
        ]);
        $data = $request->except('_token');
        $data['updated_at'] = new DateTime;
        $data['slug'] =  Str::slug($request->title, '-');

        $news = News::where('slug',$slug)->first();
        //thêm ảnh
        if($request->image == null){
            $data["image"] = $news->image;
        }else{
            $file = $request->image;      
            $file->move('upload/news', $file->getClientOriginalName());
            $data["image"] =  $file->getClientOriginalName();
        }      

        News::where('slug', $slug)->update($data);

        return redirect()->route($this->route);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::where('id', $id)->delete();

        return redirect()->route('admin.new.index');
    }
}
