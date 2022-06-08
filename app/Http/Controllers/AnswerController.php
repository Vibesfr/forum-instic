<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AnswerController extends Controller
{
    public function store(Request $request, Questions $questions)
    {
        if(Auth::check()) {
            $this->validate($request, [
                'content' => 'required|string|max:255'
            ]);

            Answers::create([
                "content" => $request->content,
                "user_id" => Auth::user()->id,
                "questions_id" => $questions->id,
            ]);

            return redirect(route("questions.show", $questions));
        }
    }

    public function delete(Answers $answers)
    {
        if (Auth::user()->id === $answers->user->id) {
            $answers->delete();
            return Redirect::back();
        }
        return response()->json(['error' => 'Unauthorized.'], 401);
    }
}
