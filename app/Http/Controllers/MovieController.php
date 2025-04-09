<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public $genres = [
        'Action',
        'Adventure',
        'Animation',
        'Biography',
        'Comedy',
        'Crime',
        'Documentary',
        'Drama',
        'Family',
        'Fantasy',
        'History',
        'Horror',
        'Musical',
        'Mystery',
        'Romance',
        'Sci-Fi',
        'Sport',
        'Thriller',
        'War',
        'Western'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $template = 'movies.index';
        $movies = Movie::orderBy('id', 'desc')->paginate(5);
        return view('layout.parent_dashboard', compact('template', 'movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $template = 'movies.add';
        return view('layout.parent_dashboard', ['template' => $template, 'genres' => $this->genres]);  // Sửa lại để truyền genres vào view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'duration' => 'required',
            'genre' => 'required',
            'release_date' => 'required',
            'rating' => 'required',
            'post_url' => 'required'
        ]);

        $movie = Movie::create($validatedData);
        return redirect()->route('movies.index')->with('success', 'Thêm phim thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $template = 'movies.detail';
        $movie = Movie::find($id);
        return view('layout.parent_dashboard', compact('template', 'movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $template = 'movies.edit';
        $movie = Movie::find($id);
        return view('layout.parent_dashboard', ['template' => $template, 'movie' => $movie, 'genres' => $this->genres]);  // Sửa lại để truyền genres vào view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'duration' => 'required',
            'genre' => 'required',
            'release_date' => 'required',
            'rating' => 'required',
            'post_url' => 'required'
        ]);

        $movie = movie::find($id);
        $movie->update($validatedData);

        return redirect()->route('movies.index')->with('success', 'Cập nhật phim thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Xoá phim thành công');
    }
}
