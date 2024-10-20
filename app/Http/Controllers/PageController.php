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
        $pages = Page::orderBy('id', 'desc')->get();
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
            'css' => 'required',
        ]);

        $slug = Str::slug($request->title);
        if (Page::where('slug', $slug)->exists()) {
            return response()->json(['message' => 'The URL already exists. Please choose a different title.'], 400);
        }
        try {
            $page = Page::create([
                'title' => $request->title,
                'slug' => $slug,
                'content' => $request->content,
                'css' => $request->css,
                'user_id' => auth()->id(),
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while creating the page.'], 400);
        }
        return response()->json(['message' => 'Page created successfully', 'page' => $page]);
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if (!$page) {
            return redirect()->route('dashboard')->with('error', 'Page not found.');
        }

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
            'css' => 'required',
        ]);

        $slug = Str::slug($request->title);
        if (Page::where('slug', $slug)->exists() && $slug != $request->oldSlug) {
            return response()->json(['message' => 'The URL already exists. Please choose a different title.'], 400);
        }
        try {
            $page->update([
                'title' => $request->title,
                'slug' => $slug,
                'content' => $request->content,
                'css' => $request->css,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while updating the page.'], 400);
        }
        return response()->json(['message' => 'Page updated successfully', 'page' => $page]);;
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
