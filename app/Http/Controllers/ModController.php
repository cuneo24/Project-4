<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mod;
use App\Comment;
use App\Section;

class ModController extends Controller
{
    //----------------------------------------------------------------------------------
    public function add()
    {
        $user = Auth::user();
        if (isset($user)) {
            return view('add')->with(['user' => $user]);
        } else {
            return redirect('/')->with(['alert' => 'You are not authorized to access this page.']);
        }
    }

    //----------------------------------------------------------------------------------
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'picture_url' => 'required',
            'mod_url' => 'required',
            'mod_author' => 'required',
            'section_id' => 'required'
        ]);

        $mod = new Mod();
        $user = Auth::user();

        $mod->name = $request->name;
        $mod->description = $request->description;
        $mod->picture_url = $request->picture_url;
        $mod->mod_url = $request->mod_url;
        $mod->mod_author = $request->mod_author;
        $mod->section_id = $request->section_id;
        $mod->user_id = $user->id;
        $mod->save();

        $alert = $mod->name . ' has been successfully added.';

        return redirect('/')->with(['alert' => $alert]);
    }

    //----------------------------------------------------------------------------------
    public function delete($id)
    {
        $mod = Mod::find($id);
        $modName = $mod->name;
        $alert = $modName . ' has been deleted.';
        $mod->comments()->delete();
        $mod->destroy($id);

        return redirect('/')->with(['alert' => $alert]);
    }

    public function delConfirm($id)
    {
        $mod = Mod::find($id);
        $alert = 'Are you sure you wish to delete "' . $mod->name . '"?';

        return view('delete')->with(['mod' => $mod, 'alert' => $alert]);
    }

    //----------------------------------------------------------------------------------
    public function edit($id)
    {
        $mod = Mod::find($id);
        $user = Auth::user();

        if (!$mod) {
            return redirect('/')->with(['alert' => 'Mod not found']);
        } else if (isset($user) && $mod->user_id == $user->id) {
            return view('update')->with(['mod' => $mod]);
        } else {
            return redirect('/')->with(['alert' => 'You are not authorized to access this page.']);
        }
    }

    //----------------------------------------------------------------------------------
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'picture_url' => 'required',
            'mod_url' => 'required',
            'mod_author' => 'required',
            'section_id' => 'required'
        ]);

        $mod = Mod::find($id);

        $mod->name = $request->name;
        $mod->description = $request->description;
        $mod->picture_url = $request->picture_url;
        $mod->mod_url = $request->mod_url;
        $mod->mod_author = $request->mod_author;
        $mod->section_id = $request->section_id;
        $mod->save();

        $alert = $mod->name . ' has been updated!';

        return redirect('/')->with(['alert' => $alert]);
    }

    //----------------------------------------------------------------------------------
    public function search(Request $request)
    {
        $search = $request->get('searchTerm', '');
        $mods = Mod::where('name', 'LIKE', '%' . $search . '%')->get();
        if ($mods->count() == 0) {
            $alert = 'No mods found containing "' . $search . '"';

            return view('index')->with(['alert' => $alert, 'mods' => $mods, 'searchTerm' => $search]);
        } else {
            if ($mods->count() > 1) {
                $plural = 'mods';
            } else {
                $plural = 'mod';
            }

            if ($search == null) {
                return redirect('/');
            } else {
                $alert = 'Showing ' . $mods->count() . ' ' . $plural . ' found containing "' . $search . '"';

                return view('index')->with(['alert' => $alert, 'mods' => $mods, 'searchTerm' => $search]);
            }
        }
    }

    //----------------------------------------------------------------------------------
    public function showMods()
    {
        $mods = Mod::get();
        $sections = Section::get();
        $user = Auth::user();

        return view('index')->with(['mods' => $mods, 'sections' => $sections, 'user' => $user]);
    }

    //----------------------------------------------------------------------------------

    public function showModsSingle($id)
    {
        $mod = Mod::find($id);
        if (!$mod) {
            return redirect('/')->with(['alert' => 'Mod not found']);
        } else {
            $comments = Comment::where('mod_id', '=', $id)->get();
            $user = Auth::user();

            return view('show')->with(['mod' => $mod, 'comments' => $comments, 'user' => $user]);
        }
    }

    //----------------------------------------------------------------------------------

    public function showModsSection($id)
    {
        $mods = Mod::where('section_id', '=', $id)->get();
        $section = Section::find($id);
        $user = Auth::user();

        $alert = 'Showing ' . $mods->count() . ' mods under section ' . '"' . $section->name . '"';

        return view('index')->with(['mods' => $mods, 'alert' => $alert, 'user' => $user]);
    }

    //----------------------------------------------------------------------------------

    public function comment(Request $request, $id)
    {
        $mod = Mod::find($id);
        $user = Auth::user();
        $comments = Comment::where('mod_id', '=', $id)->get();

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->mod_id = $mod->id;
        $comment->user_id = $user->id;
        $comment->save();

        $alert = 'Comment successfully added!';

        return redirect('/' . $id)->with(['mod' => $mod, 'comments' => $comments, 'user' => $user, 'alert' => $alert]);
    }

    //----------------------------------------------------------------------------------

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $alert = 'Your comment has been deleted.';
        $comment->destroy($id);

        return redirect()->back()->with(['alert' => $alert]);
    }
}
