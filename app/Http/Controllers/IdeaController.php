<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Idea $idea)
    {
        // return view('ideas.show',[
        //     'idea' => $idea
        // ]);
        // dd($idea->comments);

        return view('ideas.show', compact('idea'));
    }
    public function edit(Idea $idea)
    {
        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function store()
    {
        // dump(request()->get('idea',''));

        $validated = request()->validate([
            'content' => 'required|min:3|max:240',
        ]);

        // dump(request()->all());
        // dd($validated);
        Idea::create($validated);
        // $idea = Idea::create(
        //     [
        //         'content' => request()->get('content', '')
        //     ]
        // );

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    // public function destroy($id)
    public function destroy(Idea $idea)
    {
        // $idea = Idea::where('id', $id)->firstOrFail();
        // $idea->delete();

        // Idea::where('id', $id)->firstOrFail()->delete();
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }

    public function update(Idea $idea)
    {
        // dump(request()->get('idea',''));

        $validated = request()->validate([
            'content' => 'required|min:3|max:240',
        ]);

        // $idea->content = request()->get('content', '');
        // $idea->save();
        $idea->update($validated);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfully!');
    }
}
