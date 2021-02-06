<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Gift;
use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class participantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $one_week_before_today = date("Y-m-d", strtotime("-1 week"));
        $today = Carbon::today()->toDateString();
        $campaigns = DB::table('campaign')->where([['deleted', 0], ['status', 1], ['end_date', '>=', $today],
            ['start_date', '<=', $today]])
            ->take(10)->get()->sortBy('name');
        $banners = Campaign::where([['deleted', 0], ['status', 1], ['end_date', '>=', $today],
            ['start_date', '<=', $today]])->get();
        /*$ending_campaign = Campaign::where([['deleted', 0], ['status', 1], ['end_date', '>=', $today],
            [ $today->diffInDays(Carbon::parse('end_date')) , '<=', 7 ]])->get();*/
        return view('participant.home')->with(['campaigns' => $campaigns, 'banners' => $banners, 'isFirst' => true]);
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
        $campaigns = DB::table('campaign')->where([['deleted', 0], ['status', 1], ['start_date', '<=', $today],
            ['end_date', '>=', $today]])
            ->take(8)->get()->sortBy('name');
        $latest_5 = Campaign::where([['deleted', 0], ['status', 1], ['end_date', '>=', $today],
            ['start_date', '<=', $today]])
            ->orderBy('created_at', 'desc')->limit(5)->get();
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
        $today = Carbon::today()->toDateString();
        $gifts = DB::table('gift')->where([['deleted', 0], ['status', 1], ['expired_date', '>=', $today]])
            ->get()->sortBy('name');
        return view('participant.gift.gift')->with(['gifts' => $gifts]);
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
            ['amount', '>' , 0]])->get()->sortBy('name');

        $html = view('participant.gift.render.giftTable')->with('gifts', $deleted)->render();
        return response()->json(['success' => true, 'html' => $html]);
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
        return view('participant.games-quizzes.station')->with(['quizzes' => $quizzes]);
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
