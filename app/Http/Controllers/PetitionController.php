<?php

namespace App\Http\Controllers;

use App\Petition;
use App\PetitionComment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

class PetitionController extends Controller
{

    public function index()
    {

        $petitions = Petition::all();
        return View::make('pages.home', ['petition' => $petitions]);

    }

    public function store(Request $request)
    {

        $petition = new Petition;

        $petition->petition_title = $request->petition_title;
        $petition->petition_category = $request->petition_category;
        $petition->petition_description = $request->petition_description;

        $petition->save();

        return redirect()->route('home');

    }

    public function submit_comment(Request $request)
    {

        $petition_comment = new PetitionComment;

        $petition_comment->petition_id = $request->petition_id;
        $petition_comment->comment_content = $request->petition_comment;

        $petition_comment->save();

        return redirect('/single/'.$request->petition_id);

    }

    public function vote(Request $request)
    {

        $petition = Petition::find($request->petition_id);

        $petition->petition_votes = $request->petition_votes;

        $petition->save();

    }

    public function delete(Request $request)
    {

        $petition = Petition::find($request->petition_id);

        $petition->delete();

        

    }

}

