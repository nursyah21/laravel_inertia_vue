<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class TopicController extends Controller
{
    public function index()
    {
        return Inertia::render('Topic/Index', [
            'topics' => Topic::all()->map(function($topic){
                return [
                    'id' => $topic->id,
                    'name' => $topic->name,
                    'image' => asset('storage/'. $topic->image) 
                ];
            })
        ]);
    }

    public function create()
    {
        return Inertia::render('Topic/Create');
    }

    public function edit(Topic $topic)
    {
        return Inertia::render('Topic/Edit', [
            'topic' => $topic,
            'image' => asset('storage/'. $topic->image)
        ]);
    }

    public function update(Topic $topic)
    {
        $image = $topic->image;
        if (Request::file('image')) {
            Storage::delete('public/'. $topic->image);
            $image = Request::file('image')->store('topics', 'public');
        }

        $topic->update([
            'name' => Request::input('name'),
            'image' => $image
        ]);

        return Redirect::route('topics.index');
    }

    public function destroy(Topic $topic)
    {
        Storage::delete('storage/' . $topic->image);
        $topic->delete();

        return Redirect::route('topics.index');
    }

    public function store()
    {
        
        $image = Request::file('image')->store('topics', 'public');
        Topic::create([
            'name' => Request::input('name'),
            'image' => $image
        ]);

        return Redirect::route('topics.index');
    }
}
