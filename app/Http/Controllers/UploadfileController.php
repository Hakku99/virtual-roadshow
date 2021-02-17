<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Gift;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UploadfileController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        return view('upload');
    }

    function upload(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|image|mimes:jpeg,jpg,png,gif|max:4096000'
        ]);
        $url = json_encode($request->all('video_link'));
        $section1 = preg_replace( "/\r|\n/", " ", $request->all()['section1'] );
        $section2 = preg_replace( "/\r|\n/", " ", $request->all()['section2'] );
        $section3 = preg_replace( "/\r|\n/", " ", $request->all()['section3'] );
        if (strpos($url, 'youtube') > 0) {
            $image = $request->file('select_file');

            $new_name = $image->getClientOriginalName();

            $campaign = Campaign::create([
                'name' => $request->all()['name'],
                'section1' => $section1,
                'section2' => $section2,
                'section3' => $section3,
                'start_date' => $request->all()['start_date'],
                'end_date' => $request->all()['end_date'],
                'contact_number' => $request->all()['contact_number'],
                'contact_email' => $request->all()['contact_email'],
                'updated_at' => now(),
                'created_at' => now(),
                'quiz' => 0,
                'status' => 1,
                'quiz_status' => null,
                'created_by' => Auth::user()->id,
                'deleted' => 0,
                'image_name' => $new_name,
                'video_link' => $request->all()['video_link'],
            ]);

            $image->move(public_path('/assets/uploaded_images/campaign_images/'. $request->all()['name'] . '/'), $new_name);
            /*return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);*/

            return redirect()->route('admin.campaign')->with("success", "New Campaign has been added.");
        } else {
            return Redirect::back()->with('url_errors', 'Please Upload a valid youtube video URL')->withInput();
        }

    }

    function updateCampaign(Request $request, $id)
    {
        $this->validate($request, [
            'select_file'  => 'nullable|image|mimes:jpeg,jpg,png,gif|max:4096000'
        ]);
        $url = json_encode($request->all('video_link'));
        $section1 = preg_replace( "/\r|\n/", " ", $request->all()['section1'] );
        $section2 = preg_replace( "/\r|\n/", " ", $request->all()['section2'] );
        $section3 = preg_replace( "/\r|\n/", " ", $request->all()['section3'] );

        if (strpos($url, 'youtube') > 0) {
            $campaign = Campaign::where('id', $id)->first();
            $old_campaign_name = $campaign->name;
            $old_campaign_image =  $campaign->image_name;

            /*check if new file uploaded or not*/
            if ($request->hasFile('select_file')) {
                $path = public_path().'/assets/uploaded_images/campaign_images/'.$campaign->name.'/';
                //code for remove old file
                /*if($campaign->image_name != ''  && $campaign->image_name != null){
                    $old_image = $path.$campaign->image_name;
                    unlink($old_image);
                }*/
                \File::deleteDirectory(public_path('/assets/uploaded_images/campaign_images/' . $old_campaign_name));

                $image = $request->file('select_file');
                $new_name = $image->getClientOriginalName();
                Campaign::where('id', $id)->update([
                    'name' => $request->all()['name'],
                    'section1' => $section1,
                    'section2' => $section2,
                    'section3' => $section3,
                    'start_date' => $request->all()['start_date'],
                    'end_date' => $request->all()['end_date'],
                    'contact_number' => $request->all()['contact_number'],
                    'contact_email' => $request->all()['contact_email'],
                    'updated_at' => now(),
                    'deleted' => 0,
                    'image_name' => $new_name,
                    'video_link' => $request->all()['video_link'],
                ]);
                $image->move(public_path('/assets/uploaded_images/campaign_images/'. $request->all()['name'] . '/'), $new_name);
            } else {
                /*If no image uploaded, but change campaign name*/
                if ($old_campaign_name !== $request->all()['name']) {
                    \File::makeDirectory(public_path('/assets/uploaded_images/campaign_images/'. $request->all()['name']));
                    \File::copy(public_path('/assets/uploaded_images/campaign_images/'. $old_campaign_name . '/' . $old_campaign_image),
                        public_path('/assets/uploaded_images/campaign_images/'. $request->all()['name'] . '/' .$old_campaign_image));
                    Campaign::where('id', $id)->update([
                        'name' => $request->all()['name'],
                        'section1' => $section1,
                        'section2' => $section2,
                        'section3' => $section3,
                        'start_date' => $request->all()['start_date'],
                        'end_date' => $request->all()['end_date'],
                        'contact_number' => $request->all()['contact_number'],
                        'contact_email' => $request->all()['contact_email'],
                        'updated_at' => now(),
                        'deleted' => 0,
                        'video_link' => $request->all()['video_link'],
                    ]);
                    \File::deleteDirectory(public_path('/assets/uploaded_images/campaign_images/' . $old_campaign_name));

                } else {
                    /*If no image uploaded, and do not change campaign name*/
                    Campaign::where('id', $id)->update([
                        'name' => $request->all()['name'],
                        'section1' => $section1,
                        'section2' => $section2,
                        'section3' => $section3,
                        'start_date' => $request->all()['start_date'],
                        'contact_number' => $request->all()['contact_number'],
                        'contact_email' => $request->all()['contact_email'],
                        'end_date' => $request->all()['end_date'],
                        'updated_at' => now(),
                        'deleted' => 0,
                        'video_link' => $request->all()['video_link'],
                    ]);
                }
            }

            if ($campaign->quiz === true) {
                Quiz::where('id', $campaign->quiz_id)->update([
                    'start_date' => $request->all()['start_date'],
                    'end_date' => $request->all()['end_date'],
                    'updated_at' => now(),
                ]);
            }

            return redirect()->route('admin.campaign')->with("success", "Campaign " . $request->all()['name'] ." has been updated.");
        } else {
            return Redirect::back()->with('url_errors', 'Please Upload a valid youtube video URL');
        }
    }

    function storeGift(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|image|mimes:jpeg,jpg,png,gif|max:4096000'
        ]);
        $image = $request->file('select_file');

        $new_name = $image->getClientOriginalName();

        $gift = Gift::create([
            'name' => $request->all()['name'],
            'elaboration' => $request->all()['elaboration'],
            'price' => $request->all()['price'],
            'amount' => $request->all()['amount'],
            'expired_date' => $request->all()['expired_date'],
            'image_name' => $new_name,
            'updated_at' => now(),
            'created_at' => now(),
            'status' => 1,
            'created_by' => Auth::user()->id,
            'deleted' => 0,
        ]);

        $image->move(public_path('/assets/uploaded_images/gift_images/'. $request->all()['name'] . '/'), $new_name);

        return redirect()->route('admin.gift_index')->with("success", "New Gift has been added.");
    }

    function updateGift(Request $request, $id)
    {
        $this->validate($request, [
            'select_file'  => 'nullable|image|mimes:jpeg,jpg,png,gif|max:4096000'
        ]);
        $gift = Gift::where('id', $id)->first();
        $old_gift_name = $gift->name;
        $old_gift_image = $gift->image_name;

        /*check if new file uploaded or not*/
        if ($request->hasFile('select_file')) {
            $path = public_path().'/assets/uploaded_images/gift_images/'.$gift->name.'/';

            //code for remove old file
            /*if($gift->image_name != ''  && $gift->image_name != null){
                $old_image = $path.$gift->image_name;
                unlink($old_image);
            }*/

            \File::deleteDirectory(public_path('/assets/uploaded_images/gift_images/' . $old_gift_name));

            $image = $request->file('select_file');
            $new_name = $image->getClientOriginalName();
            Gift::where('id', $id)->update([
                'name' => $request->all()['name'],
                'elaboration' => $request->all()['elaboration'],
                'price' => $request->all()['price'],
                'amount' => $request->all()['amount'],
                'expired_date' => $request->all()['expired_date'],
                'image_name' => $new_name,
                'updated_at' => now(),
            ]);
            $image->move(public_path('/assets/uploaded_images/gift_images/'. $request->all()['name'] . '/'), $new_name);
        } else {
            /*If no image uploaded, but change gift name*/
            if ($old_gift_name !== $request->all()['name']) {
                \File::makeDirectory(public_path('/assets/uploaded_images/gift_images/'. $request->all()['name']));
                \File::copy(public_path('/assets/uploaded_images/gift_images/'. $old_gift_name . '/' . $old_gift_image),
                    public_path('/assets/uploaded_images/gift_images/'. $request->all()['name'] . '/' .$old_gift_image));
                Gift::where('id', $id)->update([
                    'name' => $request->all()['name'],
                    'elaboration' => $request->all()['elaboration'],
                    'price' => $request->all()['price'],
                    'amount' => $request->all()['amount'],
                    'expired_date' => $request->all()['expired_date'],
                    'updated_at' => now(),
                ]);
                \File::deleteDirectory(public_path('/assets/uploaded_images/gift_images/' . $old_gift_name));
            } else {
                /*If no image uploaded, and do not change gift name*/
                Gift::where('id', $id)->update([
                    'name' => $request->all()['name'],
                    'elaboration' => $request->all()['elaboration'],
                    'price' => $request->all()['price'],
                    'amount' => $request->all()['amount'],
                    'expired_date' => $request->all()['expired_date'],
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->route('admin.gift_index')->with("success", "Gift " . $request->all()['name'] ." has been updated.");
    }

    /*function uploadvideo(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|video|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:9999000000000'
        ]);
        $video = $request->file('select_file');

        $new_name = $video->getClientOriginalName();

        $video->move(public_path('/assets/uploaded_images/video/'), $new_name);
        return back()->with('success', 'Video Uploaded Successfully')->with('path', $new_name);
    }*/
}
