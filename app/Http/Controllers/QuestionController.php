<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Questions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Questions::latest()->get();
        return view("questions.index", compact("questions"));
    }

    public function show(Questions $questions)
    {
        return view("questions.show", compact("questions"));
    }

    public function profile(User $user)
    {
        $questions = Questions::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        $answers = Answers::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        return view("questions.profile", compact("user", "questions", "answers"));
    }

    public function create()
    {
        if(Auth::check()) {
            return view("questions.create");
        }
        return redirect()->route("questions.index")->withSuccess('are not allowed to access');
    }

    public function store(Request $request)
    {
        if(Auth::check()) {
            $this->validate($request, [
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'content' => 'required|string|max:255'
            ]);

            $questions = Questions::create([
                "title" => $request->title,
                "description" => $request->description,
                "content" => $request->content,
                "user_id" => Auth::user()->id,
            ]);

            return redirect(route("questions.show", $questions));
        }
    }

    public function delete(Questions $questions)
    {
        if (Auth::user()->id === $questions->user->id) {
            $questions->delete();
            return Redirect::back();
        }
        return response()->json(['error' => 'Unauthorized.'], 401);
    }

    public function edit(Questions $questions)
    {
        if (Auth::user()->id === $questions->user->id) {
            return view("questions.edit", compact("questions"));
        }
        return response()->json(['error' => 'Unauthorized.'], 401);
    }

    public function update(Request $request, Questions $questions)
    {
        if(Auth::check()) {
            if (Auth::user()->id === $questions->user->id) {
                $this->validate($request, [
                    'title' => 'required|string|max:255',
                    'description' => 'required|string|max:255',
                    'content' => 'required|string|max:255'
                ]);

                $questions->update([
                    "title" => $request->title,
                    "description" => $request->description,
                    "content" => $request->content,
                ]);

                return redirect(route("questions.show", $questions));
            }
            return response()->json(['error' => 'Unauthorized.'], 401);
        }
        return response()->json(['error' => 'Unauthorized.'], 401);
    }
}
