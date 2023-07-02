<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionContent;
use App\QuestionResult;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public $result_images = [
        'AAA',
        'AAA',
        'BBB',
        'CCC',
        'DDD',
        'EEE'
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
//        $result = $this->getResult("77834d15-bffe-45d8-abe7-186e50c7961a", 5);
//        echo var_dump($result);
//        die();
        $data = QuestionContent::where("question_id", 1)->get();

        // Generating UUID
        $userID = (string) Str::uuid();
        $history = QuestionResult::create(['user_id' => $userID]);

        if (View::exists('question')) {
            return view('question', ['userid' => $userID, '_index' => 1, 'data' => $data]);
        }

        return "View not existing";
    }

    public function processQuestion(Request $request, $q_index, $a_index)
    {
        $next_q_index = $q_index + 1;

        // Saving the result data
        $userid = $request->get('userid');
        $updated = QuestionResult::where('user_id', $userid)->update(array('q'.$q_index => $a_index));

        if ($updated)
        {
            $data = QuestionContent::where("question_id", $next_q_index)->get();

            if ($q_index == 5)
            {
                $result = $this->getResult($userid, 5);
                if ($result != -1)
                {
                    QuestionResult::where('user_id', $userid)->update(array('result' => intval($result[0])));
                    $result_value = $this->result_images[intval($result[0])];
                    return view('result', ['_index' => $result_value, 'image_path' => $result_value.'.png']);
                }
                else {
                    return view('question', ['_index' => $next_q_index, 'data' => $data, 'userid' => $userid]);
                }
            }
            else if ($q_index == 6) {
                $result = $this->getResult($userid, 6);
                QuestionResult::where('user_id', $userid)->update(array('result' => intval($result[0])));
                $result_value = $this->result_images[intval($result[0])];
                return view('result', ['_index' => $result_value, 'image_path' => $result_value.'.png']);
            }
            else {
                return view('question', ['_index' => $next_q_index, 'data' => $data, 'userid' => $userid]);
            }

        }
        else
        {
            return redirect('/');
        }
    }

    public function getResult($userid, $step)
    {
        $A = 0; $B = 0; $C = 0; $D = 0; $E = 0;
        $data = QuestionResult::where("user_id", $userid)->get();
        if($data) {
            // Main Score
            if (isset($data[0]->q1)) {
                switch ($data[0]->q1)
                {
                    case 1:
                        $A = $A + 1;
                        $B = $B + 1;
                        break;
                    case 2:
                        $C = $C + 1;
                        break;
                    case 3:
                        $D = $D + 1;
                        break;
                    case 4:
                        $E = $E + 1;
                        break;
                    default:
                        break;
                }
            }
            if (isset($data[0]->q2)) {
                switch ($data[0]->q2)
                {
                    case 1:
                        $A = $A + 1;
                        $B = $B + 1;
                        $C = $C + 1;
                        break;
                    case 2:
                        $B = $B + 1;
                        $C = $C + 1;
                        $D = $D + 1;
                        break;
                    case 3:
                        $D = $D + 1;
                        $E = $E + 1;
                        break;
                    default:
                        break;
                }
            }
            if (isset($data[0]->q3)) {
                switch ($data[0]->q3)
                {
                    case 1:
                    case 3:
                        $D = $D + 1;
                        $E = $E + 1;
                        break;
                    case 2:
                        $B = $B + 1;
                        $C = $C + 1;
                        break;
                    case 4:
                        switch (isset($data[0]->q1))
                        {
                            case 1:
                                $A = $A + 1;
                                $B = $B + 1;
                                break;
                            case 2:
                                $C = $C + 1;
                                break;
                            case 3:
                                $D = $D + 1;
                                break;
                            case 4:
                                $E = $E + 1;
                                break;
                            default:
                                break;
                        }
                    default:
                        break;
                }
            }

            // Bonus Point
            if (isset($data[0]->q4)) {
                switch ($data[0]->q4)
                {
                    case 1:
                    case 2:
                        if ($B > 0)
                            $B = $B + 1;
                        if ($C > 0)
                            $C = $C + 1;
                        break;
                    case 3:
                    case 4:
                        if ($D > 0)
                            $D = $D + 1;
                        if ($E > 0)
                            $E = $E + 1;
                        break;
                    default:
                        break;
                }
            }
            if (isset($data[0]->q5)) {
                switch ($data[0]->q5)
                {
                    case 1:
                    case 2:
                        if ($C > 0)
                            $C = $C + 1;
                        if ($D > 0)
                            $D = $D + 1;
                        if ($E > 0)
                            $E = $E + 1;
                        break;
                    case 3:
                    case 4:
                        if ($B > 0)
                            $B = $B + 1;
                        if ($C > 0)
                            $C = $C + 1;
                        break;
                    default:
                        break;
                }
            }

            if ($step == 5) {
                $stat_grades = array ("1" => $A, "2" => $B, "3" => $C, "4" => $D, "5" => $E);
                $top_stats = array_keys($stat_grades, max($stat_grades));

                if(count($top_stats) > 1) return -1;
                else return $top_stats;
            }
            else {
                if (isset($data[0]->q6)) {
                    switch ($data[0]->q6)
                    {
                        case 1:
                            $A = $A + 1;
                            $B = $B + 1;
                            break;
                        case 2:
                        case 3:
                            switch (isset($data[0]->q1))
                            {
                                case 1:
                                    $A = $A + 1;
                                    $B = $B + 1;
                                    break;
                                case 2:
                                    $C = $C + 1;
                                    break;
                                case 3:
                                    $D = $D + 1;
                                    break;
                                case 4:
                                    $E = $E + 1;
                                    break;
                                default:
                                    break;
                            }
                            break;
                        case 4:
                            $D = $D + 1;
                            $E = $E + 1;
                            break;
                        default:
                            break;
                    }
                }

                $stat_grades = array ("1" => $A, "2" => $B, "3" => $C, "4" => $D, "5" => $E);
                $top_stats = array_keys($stat_grades, max($stat_grades));

                return $top_stats;
            }
        }
        else {
            return -1;
        }
    }
}
