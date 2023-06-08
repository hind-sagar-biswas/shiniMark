<?php

namespace App\Http\Controllers;

use App\Models\Statuses;
use App\Models\Bookmarks;
use App\Models\Categories;
use App\Models\ReadStatuses;
use App\Models\Websites;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookmarksController extends Controller
{
    // Show all bookmarks
    public function index()
    {
        return view('bookmarks.index', [
            'pageTitle' => 'Personal Manga Bookmark website',
            'bookmarks' => Bookmarks::filter(request(['search', 'category', 'status', 'reading_status', 'sort', 'order']))
                                    ->paginate(50),
            'categories' => Categories::latest()->get(),
            'status_list' => Statuses::latest()->get()
        ]);
    }

    // Edit a bookmark
    public function edit(Bookmarks $bookmark)
    {
        return view('bookmarks.edit', [
            'pageTitle' => 'Edit ' . $bookmark->name,
            'bookmark' => $bookmark,
            'categories' => Categories::latest()->get(),
            'status_list' => Statuses::latest()->get(),
            'read_status_list' => ReadStatuses::latest()->get()
        ]);
    }

    // Create bookmark
    public function create()
    {
        return view('bookmarks.create', [
            'pageTitle' => 'Add Bookmark',
            'categories' => Categories::latest()->get(),
            'status_list' => Statuses::latest()->get(),
            'read_status_list' => ReadStatuses::latest()->get()
        ]);
    }

    // Store bookmark
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => [ 'required', Rule::unique('bookmarks', 'name') ],
            'alt_names' => 'nullable',
            'link' => ['nullable' , 'url'],
            'category_id' => 'required',
            'status_id' => 'required',
            'read_status_id' => 'required',
            'current' => 'required',
            'latest' => 'required'
        ]);

        Bookmarks::create($formFields);
        return redirect('/')->with('message', 'Bookmark <strong>' . $request->name . '</strong> added successfully!');
    }

    // Update bookmark
    public function update(Request $request, Bookmarks $bookmark)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'alt_names' => 'nullable',
            'link' => ['nullable'],
            'category_id' => 'required',
            'status_id' => 'required',
            'read_status_id' => 'required',
            'current' => 'required',
            'latest' => 'required'
        ]);

        $restriction = Categories::find($formFields['category_id'])->restriction;

        $bookmark->update($formFields);
        $this->addToWebsiteList($formFields['link'], $restriction);

        return redirect('/')->with('message', 'Bookmark <strong>' . $request->name . '</strong> updated successfully!');
    }

    // Update bookmark
    public function destroy(Bookmarks $bookmark)
    {
        $name = $bookmark->name;
        $bookmark->delete();
        return redirect('/')->with('message', 'Bookmark <strong>' . $name . '</strong> deleted successfully!');
    }

    protected function addToWebsiteList($url, $restriction)
    {
        $parsedUrl = parse_url($url);

        $url = $parsedUrl['scheme'] . "://" . $parsedUrl['host'] . "/";
        $name = ucfirst(explode(".", $parsedUrl['host'])[0]);

        if (!Websites::where('url', $url)->exists()) {
            Websites::create([
                'type' => 'manga',
                'name' => $name,
                'url' => $url,
                'restriction' => $restriction,
            ]);
        }
    }

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Statuses::class);
    }
    public function read_status()
    {
        return $this->belongsTo(ReadStatuses::class);
    }
}
