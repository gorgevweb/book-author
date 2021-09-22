<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $books = Book::paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookRequest $request
     * @return RedirectResponse
     */
    public function store(BookRequest $request): RedirectResponse
    {
        $book = Book::create($request->all());
        $book->authors()->attach($request->authors);
        return redirect()->route('books.index')->with('success','Book created successfully');
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
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $authors = Author::all();
        if (!is_null($book->authors)) {
            $authorsSelected = array_map(function($a){
                return $a['id'];
            }, $book->authors->toArray());
        }
        else
        {
            $authorsSelected = array();
        }
        return view('books.edit',compact('book','authors','authorsSelected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BookRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(BookUpdateRequest $request, int $id): RedirectResponse
    {
        $book = Book::find($id);
        $book->update($request->all());
        $book->authors()->sync($request->authors);
        return redirect()->route('books.index')->with('success','Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index')->with('success','Book deleted successfully');
    }
}
