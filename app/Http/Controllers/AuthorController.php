<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-end.author.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.author.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txtNameAuthor' => 'required|min:1',
            'txtAuthorInfo' => '',
            'fileAuthorImg' => 'max:255',
        ]);
        if ($validator->fails()) {
            return redirect()
                        ->route('author.create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $author = new Author;

        $author->author_name = $request->txtNameAuthor;

        $author->author_info = $request->txtAuthorInfo;

        $author->author_image = null;
        $author->save();
        return redirect()->route('author.index');

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author=Author::find($id);
        return view('back-end.author.edit',['author'=>$author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'txtNameAuthor' => 'required|min:1',
            'txtAuthorInfo' => '',
            'fileAuthorImg' => 'max:255',
        ]);
        if ($validator->fails()) {
            return redirect()
                        ->route('author.edit',$id)
                        ->withErrors($validator)
                        ->withInput();
        }
        $author = Author::find($id);
        $author->author_name = $request->txtNameAuthor;
        $author->author_info = $request->txtAuthorInfo;
        $author->author_image = $request->fileAuthorImg;
        $author->save();
        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Author::find($id)!=null) {
            // Author::where('parent_id', $id)->delete();
            Author::destroy($id);
            // deletebook
            return redirect()->route('author.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getlist()
    {
        return Author::orderBy('author_name')->get();
    }
}
