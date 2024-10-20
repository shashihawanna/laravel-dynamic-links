<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::all();
        return view('dashboard', compact('pages'));
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $slug = Str::slug($request->title);

        $page = Page::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return response()->json(['message' => 'Page created successfully', 'page' => $page]);
        
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        if (Gate::denies('update', $page)) {
            abort(403, 'Unauthorized action.');
        }
        return view('pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        if (Gate::denies('update', $page)) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $slug = Str::slug($request->title);

        $page->update([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
        ]);

        return redirect()->route('pages.show', $page->slug);
    }

    public function destroy(Page $page)
    {
        if (Gate::denies('delete', $page)) {
            abort(403, 'Unauthorized action.');
        }
        $page->delete();
        return redirect()->route('dashboard')->with('success', 'Page deleted successfully.');

    }
}
