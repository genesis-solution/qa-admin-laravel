<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionContent;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public $contents = [

    ];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $data = QuestionContent::where("question_id", 1)->get();

        if (View::exists('question')) {
            return view('question', ['_index' => 1, 'data' => $data]);
        }

        return "View not existing";
    }

    public function processQuestion($q_index, $a_index)
    {
        $next_q_index = 1;
        if ($q_index < 3) $next_q_index = $q_index + 1;
        $data = QuestionContent::where("question_id", $next_q_index)->get();
        return view('question', ['_index' => $next_q_index, 'data' => $data]);
    }
}
