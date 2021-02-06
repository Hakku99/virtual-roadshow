<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Game1_Attemption;
use App\Models\Game2_Attemption;
use App\Models\Gift;
use App\Models\Gift_Redemption;
use App\Models\Quiz;
use App\Models\Quiz_Attemption;
use App\Participant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoggedInParticipantController extends Controller
{
    // Must have this if we want to use AUTH in function.
    public function __construct()
    {
        $this->middleware('auth:participant');
    }

    public function welcome()
    {
        return view('my_welcome');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $one_week_before_today = date("Y-m-d", strtotime("-1 week"));
        $today = Carbon::today()->toDateString();
        $campaigns = DB::table('campaign')->where([['deleted', 0], ['status', 1], ['end_date', '>=', $today],
            ['start_date', '<=', $today]])->take(10)->get()->sortBy('name');
        $banners = Campaign::where([['deleted', 0], ['status', 1], ['banner', 1], ['end_date', '>=', $today],
            ['start_date', '<=', $today]])->get();
        return view('participant.home')
            ->with(['campaigns' => $campaigns, 'banners' => $banners, 'isFirst' => true]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function campaign()
    {
        //
        $today = Carbon::today()->toDateString();
        $campaigns = Campaign::where([['deleted', 0], ['status', 1], ['end_date', '>=', $today],
            ['start_date', '<=', $today]])->get()->sortBy('name');
        $latest_5 = Campaign::where([['deleted', 0], ['status', 1], ['end_date', '>=', $today],
            ['start_date', '<=', $today]])->orderBy('created_at', 'desc')->limit(5)->get();
        $seven_days = Carbon::now()->addDays(7);
        $campaings_left_1_week = Campaign::where([['deleted', 0], ['status', 1], ['end_date', '>=', $today],
            ['start_date', '<=', $today]])
            ->whereDate('end_date', '<', $seven_days)->orderBy('end_date', 'asc')->get();
        return view('participant.campaign.campaign')->with(['campaigns' => $campaigns, 'isFirst' => true,
            'latest_5' => $latest_5, 'campaings_left_1_week' => $campaings_left_1_week]);
    }

    /**
     * render campaign Datatable.
     *
     * @return Renderable
     * @throws Throwable
     */
    public function renderCampaignsTable()
    {
        $today = Carbon::today()->toDateString();
        $deleted = DB::table('campaign')->where([['deleted', 0], ['status', 1], ['end_date', '>=', $today],
            ['start_date', '<=', $today]])->get()->sortBy('name');
        $html = view('participant.campaign.render.campaignTable')->with('campaigns', $deleted)->render();
        return response()->json(['success' => true, 'html' => $html]);
    }

    /**
     * Display a listing of the resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function single_campaign($id)
    {
        //
        $today = Carbon::today()->toDateString();
        $campaign = Campaign::find($id);
        $pattern =
            '%^# Match any youtube URL
    (?:https?://)?  # Optional scheme. Either http or https
    (?:www\.)?      # Optional www subdomain
    (?:             # Group host alternatives
      youtu\.be/    # Either youtu.be,
    | youtube\.com  # or youtube.com
      (?:           # Group path alternatives
        /embed/     # Either /embed/
      | /v/         # or /v/
      | .*v=        # or /watch\?v=
      )             # End path alternatives.
    )               # End host alternatives.
    ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
    ($|&).*         # if additional parameters are also in query string after video id.
    $%x';
        $result = preg_match($pattern, $campaign->video_link, $matches);
        if (false !== $result) {
            $video_id = $matches[1];
        }
        $days_remaining = Carbon::parse($today)->diffInDays(Carbon::parse($campaign->end_date));;
        $latest_10 = Campaign::where([['deleted', 0], ['status', 1], ['end_date', '>=', $today]])
            ->orderBy('created_at', 'desc')->limit(10)->get();
        /*$gifts = Gift::where([['deleted', 0], ['status', 1], ['expired_date', '>=', $today]])->limit(4)->get();*/
        $gifts = Gift::where([['deleted', 0], ['status', 1], ['expired_date', '>=', $today]])->take(4)->get();
        return view('participant.campaign.single_campaign')->with(['campaign' => $campaign, 'isFirst' => true,
            'latest_10' => $latest_10, 'video_id' => $video_id, 'days_remaining' => $days_remaining, 'gifts' => $gifts]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gift()
    {
        //
        $participant = Auth::user();
        $today = Carbon::today()->toDateString();
        $gifts = DB::table('gift')->where([['deleted', 0], ['status', 1], ['expired_date', '>=', $today],
            ['amount', '>', 0]])->get()->sortBy('name');
        return view('participant.gift.gift')->with(['gifts' => $gifts, 'participant' => $participant]);
    }

    /**
     * render gift Datatable.
     *
     * @return Renderable
     * @throws Throwable
     */
    public function renderGiftsTable()
    {
        $today = Carbon::today()->toDateString();
        $deleted = DB::table('gift')->where([['deleted', 0], ['status', 1], ['expired_date', '>=', $today],
            ['amount', '>', 0]])->get()->sortBy('name');

        $html = view('participant.gift.render.giftTable')->with('gifts', $deleted)->render();
        return response()->json(['success' => true, 'html' => $html]);
    }

    /**
     * Redeem the specified gift from storage.
     *
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function redeem_gift(Request $request)
    {
        $gift_id = $request->id;
        $gift = Gift::find($gift_id);
        $today = Carbon::today()->toDateString();
        if ($gift->status == true && $gift->amount > 0 && $gift->deleted == false && $gift->expired_date >= $today) {
            $participant_id = Auth::user()->id;

            Participant::where('id', $participant_id)->update([
                'points' => Auth::user()->points - $gift->price,
            ]);

            Gift::where('id', $gift_id)->update([
                'amount' => $gift->amount - 1,
            ]);

            Gift_Redemption::create([
                'gift_id' => $gift_id,
                'approved' => 0, // 0 means 'Pending', 1 means 'Processed and delivering gift to Participant'
                'delivered' => 0, // 0 means gift haven't reach Participant yet
                'cancelled' => 0, // 1 means redemption has been cancelled
                'delivering' => 0, // 0 means gift haven't send out yet
                'created_by' => Auth::user()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json(['success' => 1, 'data' => $gift_id]);

        } else {
            if ($gift->status == false || $gift->deleted == true || $gift->expired_date < $today) {
                return response()->json(['success' => 2, 'data' => $gift_id]);
            } elseif ($gift->amount == 0) {
                return response()->json(['success' => 3, 'data' => $gift_id]);
            }

        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function my_gift()
    {
        //
        $participant = Auth::user();
        $today = Carbon::today()->toDateString();
        $gifts = DB::table('gift')->where([['deleted', 0], ['status', 1], ['expired_date', '>=', $today],
            ['amount', '>', 0]])->get()->sortBy('name');
        return view('participant.gift.my_gift')/*->with(['gifts' => $gifts, 'participant' => $participant])*/ ;
    }

    /**
     * render gift Datatable.
     *
     * @return Renderable
     * @throws Throwable
     */
    public function render_my_GiftsTable()
    {
        $in_progress = Gift_Redemption::where([['delivered', 0], ['approved', 0], ['cancelled', 0],
            ['created_by', Auth::user()->id]])->orderBy('created_at', 'desc')->get();

        foreach ($in_progress as $redeemed_gift) {
            $gift = Gift::find($redeemed_gift->gift_id);
            $redeemed_gift->name = $gift->name;
            $redeemed_gift->image_name = $gift->image_name;
            $redeemed_gift->elaboration = $gift->elaboration;
        }
        $html = view('participant.gift.render.my_giftTable')->with('in_progress', $in_progress)->render();
        return response()->json(['success' => true, 'html' => $html]);
    }

    /**
     * render approved gift Datatable.
     *
     * @return Renderable
     * @throws Throwable
     */
    public function render_approved_GiftsTable()
    {
        $approved = Gift_Redemption::where([['delivered', 0], ['approved', 1], ['cancelled', 0],
            ['created_by', Auth::user()->id]])->orderBy('created_at', 'desc')->get();

        foreach ($approved as $redeemed_gift) {
            $gift = Gift::find($redeemed_gift->gift_id);
            $redeemed_gift->name = $gift->name;
            $redeemed_gift->image_name = $gift->image_name;
            $redeemed_gift->elaboration = $gift->elaboration;
        }
        $html = view('participant.gift.render.approved_giftTable')->with('approved', $approved)->render();
        return response()->json(['success' => true, 'html' => $html]);
    }

    /**
     * render delivered gift Datatable.
     *
     * @return Renderable
     * @throws Throwable
     */
    public function render_delivered_GiftsTable()
    {
        $delivered = Gift_Redemption::where([['delivered', 1], ['created_by', Auth::user()->id]])
            ->orderBy('created_at', 'desc')->get();

        foreach ($delivered as $redeemed_gift) {
            $gift = Gift::find($redeemed_gift->gift_id);
            $redeemed_gift->name = $gift->name;
            $redeemed_gift->image_name = $gift->image_name;
            $redeemed_gift->elaboration = $gift->elaboration;
        }
        $html = view('participant.gift.render.delivered_giftTable')->with('delivered', $delivered)->render();
        return response()->json(['success' => true, 'html' => $html]);
    }

    /**
     * render cancelled gift Datatable.
     *
     * @return Renderable
     * @throws Throwable
     */
    public function render_cancelled_GiftsTable()
    {
        $cancelled = Gift_Redemption::where([['cancelled', 1], ['created_by', Auth::user()->id]])
            ->orderBy('created_at', 'desc')->get();

        foreach ($cancelled as $redeemed_gift) {
            $gift = Gift::find($redeemed_gift->gift_id);
            $redeemed_gift->name = $gift->name;
            $redeemed_gift->image_name = $gift->image_name;
            $redeemed_gift->elaboration = $gift->elaboration;
        }
        $html = view('participant.gift.render.cancelled_giftTable')->with('cancelled', $cancelled)->render();
        return response()->json(['success' => true, 'html' => $html]);
    }

    /**
     * CancelRedemption the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function cancelRedemption(Request $request)
    {
        $redemption_id = $request->id;
        $redemption = Gift_Redemption::find($redemption_id);

        $participant_id = Auth::user()->id;
        $gift = Gift::find($redemption->gift_id);


        Gift_Redemption::where('id', $redemption_id)->update([
            'cancelled' => true,
            'updated_at' => now(),
            'f_reason' => 'Cancelled by Participant.'
        ]);

        Gift::where('id', $redemption->gift_id)->update([
            'amount' => $gift->amount + 1,
        ]);

        Participant::where('id', $participant_id)->update([
            'points' => Auth::user()->points + $gift->price,
            'updated_at' => now(),
        ]);

        return response()->json(['success' => 1, 'id' => $redemption_id]);
    }

    /**
     * Participant mark gift redmeption as 'delivered' after they received the gift in reality or in virtual.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function gift_received(Request $request)
    {
        $redemption_id = $request->id;
        $redemption = Gift_Redemption::find($redemption_id);

        $participant_id = Auth::user()->id;
        $gift = Gift::find($redemption->gift_id);

        Gift_Redemption::where('id', $redemption_id)->update([
            'delivered' => true,
            'updated_at' => now(),
        ]);

        return response()->json(['success' => 1, 'id' => $redemption_id]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function games_quizzes_station()
    {
        //
        $today = Carbon::today()->toDateString();
        $quizzes = Quiz::where([['deleted', 0], ['status', 1], ['end_date', '>=', $today],
            ['start_date', '<=', $today]])->get()->sortBy('name');
        $quizzes_attemption = Quiz_Attemption::where([['attempt_date', $today], ['participant_id', Auth::user()->id]])->get();
        foreach ($quizzes as $quiz) {
            foreach ($quizzes_attemption as $quiz_attemption) {
                if ($quiz->id === $quiz_attemption->quiz_id) {
                    $quiz->attempted_today = true;
                }
            }
        }
        return view('participant.games-quizzes.station')->with(['quizzes' => $quizzes]);
    }

    /**
     * Display a listing of the resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function answerQuiz($id)
    {
        //
        $today = Carbon::today()->toDateString();
        if (Quiz_Attemption::where([['quiz_id', '=', $id], ['participant_id', '=', Auth::user()->id],
                ['attempt_date', '=', $today]])->count() > 0) {
            return redirect()->route('l_participant.gamesQuizzes')->with('QuizErrorMsg','You cannot play games when your Medals is 0.');
        } else {
            $quiz = Quiz::find($id);
            $random = \App\Models\Quiz::where([['id', '!=' ,$id]])->inRandomOrder()->first();

            $campaign = Campaign::find($quiz->campaign_id);
            $pattern =
                '%^# Match any youtube URL
    (?:https?://)?  # Optional scheme. Either http or https
    (?:www\.)?      # Optional www subdomain
    (?:             # Group host alternatives
      youtu\.be/    # Either youtu.be,
    | youtube\.com  # or youtube.com
      (?:           # Group path alternatives
        /embed/     # Either /embed/
      | /v/         # or /v/
      | .*v=        # or /watch\?v=
      )             # End path alternatives.
    )               # End host alternatives.
    ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
    ($|&).*         # if additional parameters are also in query string after video id.
    $%x';
            $result = preg_match($pattern, $campaign->video_link, $matches);
            if (false !== $result) {
                $video_id = $matches[1];
            }
            return view('participant.games-quizzes.quiz.single_quiz')->with(['campaign' => $campaign, 'isFirst' => true,
                'quiz'=> $quiz, 'video_id' => $video_id, 'random' => $random]);
        }
    }

    /**
     * Finish quiz.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function finishQuiz(Request $request)
    {
        $score = $request->score;
        $quiz_id = $request->quiz_id;

        $participant_id = Auth::user()->id;
        $participant = Participant::find($participant_id);

        Participant::where('id', $participant_id)->update([
            'points' => $participant->points + $score,
            'stamina' => $participant->stamina + 1,
            'updated_at' => now(),
        ]);

        Quiz_Attemption::create([
            'quiz_id' => $quiz_id,
            'participant_id' => $participant_id,
            'attempt_date' => Carbon::today()->toDateString(),
            'scores' => $score,
        ]);

        return response()->json(['url'=>url('/l_participant/gamesQuizzes')]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function play2048()
    {
        //
        //$top_10 = Game1_Attemption::orderBy('scores', 'desc')->limit(10)->get();
        if (Auth::user()->stamina !== 0) {
            $all = Game1_Attemption::all();
            $top = Game1_Attemption::orderBy('scores', 'desc')->first();
            $top_10 = Game1_Attemption::all()->sortByDesc('scores')->groupBy('participant_name')->take(10);
            if ($all->isEmpty()) {
                return view('participant.games-quizzes.games.2048')/*->with(['top_10'=> $top_10])*/;
            }
            else {
                return view('participant.games-quizzes.games.2048')->with(['top_10'=> $top_10, 'top'=> $top]);
            }
        } else {
            return redirect()->route('l_participant.gamesQuizzes')->with('errorMsg','You cannot play games when your Medals is 0.');
        }
    }

    /**
     * Finish 2048.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function finish2048(Request $request)
    {
        $score = $request->score;
        $win = $request->win;

        if ($score < 500 && $win == 0) {
            $point = 10;
        } elseif ($score < 1000 && $score >= 500 && $win == 0) {
            $point = 15;
        } elseif ($score < 1500 && $score >= 1000 && $win == 0) {
            $point = 20;
        } elseif ($score < 2000 && $score >= 1500 && $win == 0) {
            $point = 25;
        } elseif ($score < 3000 && $score >= 2000 && $win == 0) {
            $point = 30;
        } elseif ($score < 5000 && $score >= 3000 && $win == 0) {
            $point = 35;
        } elseif ($score < 10000 && $score >= 5000 && $win == 0) {
            $point = 40;
        } elseif ($score < 19000 && $score >= 10000 && $win == 0) {
            $point = 45;
        } elseif ($win == 1) {
            $point = 60;
        } else {
            $point = 50;
        }

        $participant_id = Auth::user()->id;
        $participant = Participant::find($participant_id);

        Participant::where('id', $participant_id)->update([
            'points' => $participant->points + $point,
            'stamina' => $participant->stamina - 1,
            'updated_at' => now(),
        ]);

        Game1_Attemption::create([
            'participant_id' => $participant_id,
            'attempt_date' => Carbon::today()->toDateString(),
            'scores' => $score,
            'participant_name' => $participant->name,
        ]);

        return response()->json(['url'=>url('/l_participant/gamesQuizzes')]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function playFlappyBird()
    {
        //
        if (Auth::user()->stamina !== 0) {
            $all = Game2_Attemption::all();
            $top_10 = Game2_Attemption::all()->sortByDesc('scores')->groupBy('participant_name')->take(10);
            if ($all->isEmpty()) {
                return view('participant.games-quizzes.games.flappyBird')/*->with(['top_10'=> $top_10])*/;
            }
            else {
                return view('participant.games-quizzes.games.flappyBird')->with(['top_10'=> $top_10]);
            }
        } else {
            return redirect()->route('l_participant.gamesQuizzes')->with('errorMsg','You cannot play games when your Medals is 0.');
        }

    }

    /**
     * Finish FlappyBird.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function finishFlappyBird(Request $request)
    {
        $score = $request->score;

        if ($score < 5) {
            $point = 5;
        } elseif ($score < 10 && $score >= 5) {
            $point = 10;
        } elseif ($score < 15 && $score >= 10) {
            $point = 15;
        } elseif ($score < 20 && $score >= 15) {
            $point = 20;
        } elseif ($score < 25 && $score >= 20) {
            $point = 25;
        } elseif ($score < 30 && $score >= 25) {
            $point = 30;
        } elseif ($score < 35 && $score >= 30) {
            $point = 35;
        } elseif ($score < 40 && $score >= 35) {
            $point = 40;
        } elseif ($score < 45 && $score >= 40) {
            $point = 50;
        } else {
            $point = 60;
        }

        $participant_id = Auth::user()->id;
        $participant = Participant::find($participant_id);

        Participant::where('id', $participant_id)->update([
            'points' => $participant->points + $point,
            'stamina' => $participant->stamina - 1,
            'updated_at' => now(),
        ]);

        Game2_Attemption::create([
            'participant_id' => $participant_id,
            'attempt_date' => Carbon::today()->toDateString(),
            'scores' => $score,
            'participant_name' => $participant->name,
        ]);

        return response()->json(['url'=>url('/l_participant/gamesQuizzes')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
