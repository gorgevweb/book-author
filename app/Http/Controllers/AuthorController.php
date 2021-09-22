<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $authors = Author::paginate(10);
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AuthorRequest $request
     * @return RedirectResponse
     */
    public function store(AuthorRequest $request): RedirectResponse
    {
        Author::create($request->all());
        return redirect()->route('authors.index')->with('success','Author created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $author = Author::find($id);
        return view('authors.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AuthorRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(AuthorRequest $request, int $id)
    {
        $author = Author::find($id);
        $author->update($request->all());
        return redirect()->route('authors.index')->with('success','Author updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $author = Author::find($id);
        $author->delete();
        return redirect()->route('authors.index')->with('success','Author deleted successfully');
    }
}
