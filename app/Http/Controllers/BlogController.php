<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(20);

        return view('admin.pages.blog.index')
            ->with('blogs', $blogs)
            ->with('person', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.blog.add')
            ->with('categories', Category::all())
            ->with('person', Auth::user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['status'] = false;

        $request->validate([
            'detail' => 'required',
            'slug' => 'required|unique:blogs',
            'category_id' => 'required',
            'banner' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'tags' => 'required',
        ]);



        if ($request->hasFile('banner')) {

            $allowedfileExtension = ['jpg', 'png', 'bmp', 'jpeg'];

            $photo = $request->file('banner');

//            $filename = $photo->getClientOriginalName();


            $extension = $photo->getClientOriginalExtension();

            $extension = strtolower($extension);

            $size = $photo->getClientSize();

            if ($size > 600000) {
                return back()->withErrors(array('message'=>"This passport is too large. Compress and try again"))->withInput($request->input());
            }

            $time = Carbon::now();

            $check = in_array(strtolower($extension), $allowedfileExtension);

            $filename = str_random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;

            if ($check) {

                $directory = 'data/img/' . date_format($time, 'Y') . '/' . date_format($time, 'm');
                $data['banner'] = $directory . '/' . $filename;

                $photo->storeAs($directory, $filename, 'public');

//              release memory... lol
//              ini_set('memory_limit', $limit);

            } else {

                return back()->withErrors(array('message' => 'Your passport must be of types : jpeg,bmp,png,jpg.'))->withInput($request->input());

            }
        }
        if(Blog::create($data)){
            return redirect(route('blog.index'))->withMessage('New Unpublished Article Post Created Successfully.');
        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later'))->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        if(!empty($blog)){
            return view('admin.pages.blog.show')
                ->with('categories', Category::all())
                ->with('blog', $blog)
                ->with('person', Auth::user());
        }else{
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->all();

        $request->validate([
            'detail' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'tags' => 'required',
        ]);

        if ($request->hasFile('banner')) {

            $allowedfileExtension = ['jpg', 'png', 'bmp', 'jpeg'];

            $photo = $request->file('banner');

//            $filename = $photo->getClientOriginalName();


            $extension = $photo->getClientOriginalExtension();

            $extension = strtolower($extension);

            $size = $photo->getClientSize();

            if ($size > 600000) {
                return back()->withErrors(array('message'=>"This passport is too large. Compress and try again"))->withInput($request->input());
            }

            $time = Carbon::now();

            $check = in_array(strtolower($extension), $allowedfileExtension);

            $filename = str_random(5) . date_format($time, 'd') . rand(1, 9) . date_format($time, 'h') . "." . $extension;

            if ($check) {

                $directory = 'data/img/' . date_format($time, 'Y') . '/' . date_format($time, 'm');
                $data['banner'] = $directory . '/' . $filename;

                $photo->storeAs($directory, $filename, 'public');

//              release memory... lol
//              ini_set('memory_limit', $limit);

            } else {

                return back()->withErrors(array('message' => 'Your passport must be of types : jpeg,bmp,png,jpg.'))->withInput($request->input());

            }
        }

        if($blog->update($data)){
            return back()->withMessage('Article Updated.');
        }else{
            return back()->withErrors(array('message'=>'Unable to Complete. Try again later'))->withInput($request->input());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if(count($blog)>0){
            if($blog->delete()){
                return back()->withMessage('Blog List Updated');
            }else{
                return back();
            }
        }else{
            return back();
        }
    }

    public function unpublish(Blog $blog){
        $data['status'] = false;
        if(Auth::user()->who >= 3){
            if($blog->update($data)){
                return back()->withMessage('Article Un-Published');
            }else{
                return back()->withMessage('Article Could Not Be Un-Published');
            }
        }else{
            return back()->withMessage('Article Could Not Be Un-Published');
        }

    }

    public function publish(Blog $blog){
        $data['status'] = true;
        if(Auth::user()->who >= 3){
            if($blog->update($data)){
                return back()->withMessage('Article Published');
            }else{
                return back()->withMessage('Article Could Not Be Published');
            }
        }else{
            return back()->withMessage('Article Could Not Be Published');
        }

    }
}
