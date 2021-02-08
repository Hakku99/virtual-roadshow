<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Gift;
use App\Models\Gift_Redemption;
use App\Models\Quiz;
use App\Participant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class adminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Support\Renderable
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $campaigns = DB::table('campaign')->where('deleted', 0)->get()->sortBy('name');
        return view('admin.campaign.campaign')->with(['name' => $user->name, 'campaigns' => $campaigns]);
        //return view('admin.campaign')->with('name', $user->name);
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
        $deleted = DB::table('campaign')->where([['deleted', 0], ['end_date', '>=', $today]])->get()->sortBy('name');
        foreach ($deleted as $record) {
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
            $result = preg_match($pattern, $record->video_link, $matches);
            if (false !== $result) {
                $record->video_id = $matches[1];
            }
        }

        $html = view('admin.campaign.render.campaignTable')->with('campaigns', $deleted)->render();
        return response()->json(['success' => true, 'html' => $html]);
    }

    /**
     * render ended campaign Datatable.
     *
     * @return Renderable
     * @throws Throwable
     */
    public function renderEndedCampaignsTable()
    {
        $today = Carbon::today()->toDateString();
        $deleted = DB::table('campaign')->where([['deleted', 0], ['end_date', '<', $today]])->get()->sortBy('name');
        foreach ($deleted as $record) {
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
            $result = preg_match($pattern, $record->video_link, $matches);
            if (false !== $result) {
                $record->video_id = $matches[1];
            }
        }

        $html = view('admin.campaign.render.endedCampaignTable')->with('campaigns', $deleted)->render();
        return response()->json(['success' => true, 'html' => $html]);
    }


    function youtube_id_from_url($url)
    {
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
        $result = preg_match($pattern, $url, $matches);
        if (false !== $result) {
            return $matches[1];
        }
        return false;
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Support\Renderable
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        return view('admin.campaign.addCampaign')->with('name', $user->name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //
        $max = Campaign::all()->count();
        $max++;
        $campaign = Campaign::create([
            'name' => $request->all()['name'],
            'section1' => $request->all()['section1'],
            'section2' => $request->all()['section2'],
            'section3' => $request->all()['section3'],
            'start_date' => $request->all()['start_date'],
            'end_date' => $request->all()['end_date'],
            'updated_at' => now(),
            'created_at' => now(),
            'quiz' => 0,
            'created_by' => Auth::user()->id,
            'deleted' => 0,
        ]);

        return redirect()->route('admin.campaign')->with("success", "New Campaign has been added.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editCampaign($id)
    {
        $user = Auth::user();
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
            $campaign->video_id = $matches[1];
        }
        return view('admin.campaign.editCampaign')->with(['name' => $user->name, 'campaign' => $campaign]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function deleteCampaign(Request $request)
    {
        /*$campaign_id = Input::get('id');*/

        $campaign_id = $request->id;

        $campaign = Campaign::find($campaign_id);

        if ($campaign->quiz == true) {
            $quiz_id = $campaign->quiz_id;
            Campaign::where('id', $campaign_id)->update([
                'deleted' => true,
                'status' => false,
            ]);
            Quiz::where('id', $quiz_id)->update([
                'deleted' => true,
                'status' => false,
            ]);
        } else {
            Campaign::where('id', $campaign_id)->update([
                'deleted' => true,
                'status' => false,
            ]);
        }
        return response()->json(['success' => 1, 'id' => $campaign_id]);
    }

    /**
     * Activate the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function activateCampaign(Request $request)
    {
        $campaign_id = $request->id;

        $campaign = Campaign::find($campaign_id);

        if ($campaign->quiz === true) {
            $activated_quiz_id = $campaign->quiz_id;
            Campaign::where('id', $campaign_id)->update([
                'status' => true,
                'quiz_status' => true,
            ]);
            Quiz::where('id', $activated_quiz_id)->update([
                'status' => true,
            ]);
        } else {
            Campaign::where('id', $campaign_id)->update([
                'status' => true,
            ]);
        }

        return response()->json(['success' => 1, 'id' => $campaign_id]);
    }

    /**
     * Inctivate the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function inactivateCampaign(Request $request)
    {
        $campaign_id = $request->id;

        $campaign = Campaign::find($campaign_id);

        if ($campaign->quiz === true) {
            $inactivated_quiz_id = $campaign->quiz_id;
            Campaign::where('id', $campaign_id)->update([
                'status' => false,
                'quiz_status' => false,
            ]);
            Quiz::where('id', $inactivated_quiz_id)->update([
                'status' => false,
            ]);
        } else {
            Campaign::where('id', $campaign_id)->update([
                'status' => false,
            ]);
        }

        return response()->json(['success' => 1, 'id' => $campaign_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function createQuiz($id)
    {
        $user = Auth::user();
        $campaign = Campaign::find($id);
        return view('admin.campaign.addQuiz')->with(['name' => $user->name, 'campaign' => $campaign]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeQuiz(Request $request, $id)
    {
        //
        $campaign = Campaign::find($id);

        $quiz = Quiz::create([
            'name' => $request->all()['name'],
            'question1' => $request->all()['question1'],
            'question2' => $request->all()['question2'],
            'question3' => $request->all()['question3'],
            'question4' => $request->all()['question4'],
            'question5' => $request->all()['question5'],
            'question6' => $request->all()['question6'],
            'question7' => $request->all()['question7'],
            'question8' => $request->all()['question8'],
            'question9' => $request->all()['question9'],
            'question10' => $request->all()['question10'],
            'answer_for_question1' => $request->all()['answer_for_question1'],
            'answer_for_question2' => $request->all()['answer_for_question2'],
            'answer_for_question3' => $request->all()['answer_for_question3'],
            'answer_for_question4' => $request->all()['answer_for_question4'],
            'answer_for_question5' => $request->all()['answer_for_question5'],
            'answer_for_question6' => $request->all()['answer_for_question6'],
            'answer_for_question7' => $request->all()['answer_for_question7'],
            'answer_for_question8' => $request->all()['answer_for_question8'],
            'answer_for_question9' => $request->all()['answer_for_question9'],
            'answer_for_question10' => $request->all()['answer_for_question10'],
            'start_date' => $campaign->start_date,
            'end_date' => $campaign->end_date,
            'updated_at' => now(),
            'created_at' => now(),
            'campaign_id' => $id,
            'created_by' => Auth::user()->id,
            'deleted' => 0,
            'random' => false,
            'status' => 1,
        ]);

        Campaign::where('id', $id)->update([
            'updated_at' => now(),
            'quiz_id' => $quiz->id,
            'quiz' => 1,
            'quiz_status' => 1,
        ]);

        return redirect()->route('admin.campaign')->with("success", "New Quiz for " . $campaign->name . " has been added.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editQuiz($id)
    {
        $user = Auth::user();
        $campaign = Campaign::find($id);
        $quiz = Quiz::find($campaign->quiz_id);
        return view('admin.campaign.editQuiz')->with(['name' => $user->name, 'campaign' => $campaign, 'quiz' => $quiz]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateQuiz(Request $request, $id)
    {
        //
        $quiz = Quiz::where('id', $id)->update([
            'name' => $request->all()['name'],
            'question1' => $request->all()['question1'],
            'question2' => $request->all()['question2'],
            'question3' => $request->all()['question3'],
            'question4' => $request->all()['question4'],
            'question5' => $request->all()['question5'],
            'question6' => $request->all()['question6'],
            'question7' => $request->all()['question7'],
            'question8' => $request->all()['question8'],
            'question9' => $request->all()['question9'],
            'question10' => $request->all()['question10'],
            'answer_for_question1' => $request->all()['answer_for_question1'],
            'answer_for_question2' => $request->all()['answer_for_question2'],
            'answer_for_question3' => $request->all()['answer_for_question3'],
            'answer_for_question4' => $request->all()['answer_for_question4'],
            'answer_for_question5' => $request->all()['answer_for_question5'],
            'answer_for_question6' => $request->all()['answer_for_question6'],
            'answer_for_question7' => $request->all()['answer_for_question7'],
            'answer_for_question8' => $request->all()['answer_for_question8'],
            'answer_for_question9' => $request->all()['answer_for_question9'],
            'answer_for_question10' => $request->all()['answer_for_question10'],
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        $campaign = Campaign::where('quiz_id', $id)->first();

        return redirect()->route('admin.campaign')->with("success", "Quiz for " . $campaign->name . " has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function deleteQuiz(Request $request)
    {
        /*$campaign_id = Input::get('id');*/

        $campaign_id = $request->id;

        $campaign = Campaign::find($campaign_id);
        $deleted_quiz_id = $campaign->quiz_id;

        Campaign::where('id', $campaign_id)->update([
            'quiz_id' => null,
            'quiz' => false,
            'quiz_status' => null,
        ]);

        Quiz::where('id', $deleted_quiz_id)->update([
            'deleted' => true,
            'status' => false,
        ]);

        return response()->json(['success' => 1, 'id' => $campaign_id]);
    }

    /**
     * Inactivate the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function inactivateQuiz(Request $request)
    {
        $campaign_id = $request->id;

        $campaign = Campaign::find($campaign_id);
        $inactivated_quiz_id = $campaign->quiz_id;

        if ($campaign->status === true) {
            Campaign::where('id', $campaign_id)->update([
                'quiz_status' => false,
            ]);
            Quiz::where('id', $inactivated_quiz_id)->update([
                'status' => false,
            ]);
            return response()->json(['success' => 1, 'id' => $campaign_id]);
        } else {
            return response()->json(['success' => 2, 'id' => $campaign_id]);
        }
    }

    /**
     * Activate the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function activateQuiz(Request $request)
    {
        $campaign_id = $request->id;

        $campaign = Campaign::find($campaign_id);
        $activated_quiz_id = $campaign->quiz_id;

        if ($campaign->status === true) {
            Campaign::where('id', $campaign_id)->update([
                'quiz_status' => true,
            ]);

            Quiz::where('id', $activated_quiz_id)->update([
                'status' => true,
            ]);
            return response()->json(['success' => 1, 'id' => $campaign_id]);
        } else {
            return response()->json(['success' => 2, 'id' => $campaign_id]);
        }

    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Support\Renderable
     * @return \Illuminate\Http\Response
     */
    public function gift_index()
    {
        $user = Auth::user();
        $gifts = DB::table('gift')->where('deleted', 0)->get()->sortBy('name');
        return view('admin.gift.gift')->with(['name' => $user->name, 'gifts' => $gifts]);
        //return view('admin.campaign')->with('name', $user->name);
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
        $deleted = DB::table('gift')->where([['deleted', 0], ['expired_date' , '>', $today]])->get()->sortBy('name');
        $html = view('admin.gift.render.giftTable')->with('gifts', $deleted)->render();
        return response()->json(['success' => true, 'html' => $html]);
    }

    /**
     * render expired gift Datatable.
     *
     * @return Renderable
     * @throws Throwable
     */
    public function renderExpiredGiftsTable()
    {
        $today = Carbon::today()->toDateString();
        $deleted = DB::table('gift')->where([['deleted', 0], ['expired_date' , '<=', $today]])->get()->sortBy('name');
        $html = view('admin.gift.render.expiredGiftTable')->with('gifts', $deleted)->render();
        return response()->json(['success' => true, 'html' => $html]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Support\Renderable
     * @return \Illuminate\Http\Response
     */
    public function addGift()
    {
        //
        $user = Auth::user();
        return view('admin.gift.addGift')->with('name', $user->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editGift($id)
    {
        $user = Auth::user();
        $gift = Gift::find($id);
        return view('admin.gift.editGift')->with(['name' => $user->name, 'gift' => $gift]);
    }

    /**
     * Inctivate the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function inactivateGift(Request $request)
    {
        $gift_id = $request->id;

        $campaign = Gift::find($gift_id);

        Gift::where('id', $gift_id)->update([
            'status' => false,
        ]);

        return response()->json(['success' => 1, 'id' => $gift_id]);
    }

    /**
     * Activate the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function activateGift(Request $request)
    {
        $gift_id = $request->id;

        $gift = Gift::find($gift_id);

        Gift::where('id', $gift_id)->update([
            'status' => true,
        ]);

        return response()->json(['success' => 1, 'id' => $gift_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function deleteGift(Request $request)
    {
        $gift_id = $request->id;

        $gift = Gift::find($gift_id);

        Gift::where('id', $gift_id)->update([
            'deleted' => true,
            'status' => false,
        ]);

        return response()->json(['success' => 1, 'id' => $gift_id]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Support\Renderable
     * @return \Illuminate\Http\Response
     */
    public function giftRedemption_index()
    {
        $user = Auth::user();
        $redemptions = Gift_Redemption::where('delivered', 0)->orderBy('created_at', 'asc')->get();
        return view('admin.gift_redemption.gift_redemption')->with(['name' => $user->name, 'redemptions' => $redemptions]);
        //return view('admin.campaign')->with('name', $user->name);
    }

    /**
     * render gift Datatable.
     *
     * @return Renderable
     * @throws Throwable
     */
    public function renderGiftsRedemptionTable()
    {
        $redemptions = Gift_Redemption::where([['delivered', 0], ['delivering', 0], ['approved', 0], ['cancelled', 0]])
            ->orderBy('created_at', 'asc')->get();
        foreach ($redemptions as $redemption) {
            $gift = Gift::find($redemption->gift_id);
            $redeemed_by = Participant::find($redemption->created_by);

            $redemption->gift_name = $gift->name;
            $redemption->image_name = $gift->image_name;
            $redemption->redeemed_by = $redeemed_by->name;
            $redemption->email = $redeemed_by->email;
            $redemption->address = $redeemed_by->address;
        }

        $html = view('admin.gift_redemption.render.gift_redemptionTable')->with('redemptions', $redemptions)->render();
        return response()->json(['success' => true, 'html' => $html]);
    }

    /**
     * render gift Datatable.
     *
     * @return Renderable
     * @throws Throwable
     */
    public function renderApprovedRedemptionTable()
    {
        $redemptions = Gift_Redemption::where([['delivered', 0], ['delivering', 0],['approved', 1], ['cancelled', 0]])
            ->orderBy('updated_at', 'desc')->get();
        foreach ($redemptions as $redemption) {
            $gift = Gift::find($redemption->gift_id);
            $redeemed_by = Participant::find($redemption->created_by);

            $redemption->gift_name = $gift->name;
            $redemption->image_name = $gift->image_name;
            $redemption->redeemed_by = $redeemed_by->name;
            $redemption->email = $redeemed_by->email;
            $redemption->address = $redeemed_by->address;
        }

        $html = view('admin.gift_redemption.render.approvedRedemptionTable')->with('redemptions', $redemptions)->render();
        return response()->json(['success' => true, 'html' => $html]);
    }

    /**
     * render gift Datatable.
     *
     * @return Renderable
     * @throws Throwable
     */
    public function renderShippedOut_RedemptionTable()
    {
        $redemptions = Gift_Redemption::where([['delivered', 0], ['approved', 1], ['cancelled', 0], ['delivering', 1]])
            ->orderBy('updated_at', 'desc')->get();
        foreach ($redemptions as $redemption) {
            $gift = Gift::find($redemption->gift_id);
            $redeemed_by = Participant::find($redemption->created_by);

            $redemption->gift_name = $gift->name;
            $redemption->image_name = $gift->image_name;
            $redemption->redeemed_by = $redeemed_by->name;
            $redemption->email = $redeemed_by->email;
            $redemption->address = $redeemed_by->address;
        }

        $html = view('admin.gift_redemption.render.shipped_outRedemptionTable')->with('redemptions', $redemptions)->render();
        return response()->json(['success' => true, 'html' => $html]);
    }

    /**
     * Approve the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function approveRedemption(Request $request)
    {
        $redemption_id = $request->id;

        $redemption = Gift_Redemption::find($redemption_id);

        Gift_Redemption::where('id', $redemption_id)->update([
            'approved' => true,
            'updated_at' => now(),
        ]);

        return response()->json(['success' => 1, 'id' => $redemption_id]);
    }

    /**
     * DisapproveRedemption the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function cancel_disapproveRedemption(Request $request)
    {
        $redemption_id = $request->id;
        $reason = $request->reason;

        $redemption = Gift_Redemption::find($redemption_id);

        Gift_Redemption::where('id', $redemption_id)->update([
            'cancelled' => true,
            'f_reason' => $reason,
            'updated_at' => now(),
        ]);

        return response()->json(['success' => 1, 'id' => $redemption_id]);
    }

    /**
     * Mark redemption as "ShippedOut".
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function mark_redemption_as_ShippedOut(Request $request)
    {
        $redemption_id = $request->id;

        $redemption = Gift_Redemption::find($redemption_id);

        Gift_Redemption::where('id', $redemption_id)->update([
            'delivering' => true,
            'updated_at' => now(),
        ]);

        return response()->json(['success' => 1, 'id' => $redemption_id]);
    }

    /**
     * Mark redemption as "ShippedOut".
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function mark_redemption_as_Shipment_failure(Request $request)
    {
        $redemption_id = $request->id;
        $reason = $request->reason;

        $redemption = Gift_Redemption::find($redemption_id);

        Gift_Redemption::where('id', $redemption_id)->update([
            'cancelled' => true,
            'f_reason' => $reason,
            'updated_at' => now(),
        ]);

        return response()->json(['success' => 1, 'id' => $redemption_id]);
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
