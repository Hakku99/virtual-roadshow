<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Models\Quiz_Attemption;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    //return view('welcome');
    //return view('my_welcome');
    return redirect('/participant/home');

    //echo url()->previous();

    /*$latest_10 = Campaign::where('deleted', 0)->orderBy('created_at', 'desc')->limit(10)->get();
    foreach ($latest_10 as $campaign)
        echo $campaign->name;*/
    /*$campaigns = Campaign::find(7);*/
    /*foreach ($campaigns as $campaign)*/
    /*echo $campaigns->name;*/
    /*$campaign = Campaign::where('quiz_id', 2)->first();
    echo $campaign->name;*/
    //File::deleteDirectory(public_path('/assets/campaign_images/Genshin_Impact'));
    /*$campaign = Campaign::find('1');
    $today = Carbon::today()->toDateString();
    $day = DB::raw("DATEDIFF($today,$campaign->end_date)AS Days");
    $end_date = $campaign->end_date;
    echo $different_days = Carbon::parse($today)->diffInDays(Carbon::parse($end_date));*/
});

Route::get('/check', function () {
    

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@admin_index')->name('admin');
/*Route::get('/welcome', 'LoggedInParticipantController@welcome')->name('l_welcome');*/

/*Route for Admin*/
/*Route for campaign*/
Route::get('/admin/campaign', 'adminController@index')->name('admin.campaign');
Route::get('/admin/addCampaign', 'adminController@create')->name('admin.create');
Route::get('/admin/editCampaign/{id}', 'adminController@editCampaign')->name('admin.editCampaign');
Route::post('/admin/deleteCampaign', 'adminController@deleteCampaign')->name('admin.deleteCampaign');
Route::post('/admin/inactivateCampaign', 'adminController@inactivateCampaign')->name('admin.inactivateCampaign');
Route::post('/admin/activateCampaign', 'adminController@activateCampaign')->name('admin.activateCampaign');
Route::post('/admin/renderCampaignsTable', 'adminController@renderCampaignsTable')->name('admin.render.campaignTable');
Route::post('/admin/renderEndedCampaignsTable', 'adminController@renderEndedCampaignsTable')->name('admin.render.endedCampaignTable');

/*Route for quiz*/
Route::get('/admin/addQuiz/{id}', 'adminController@createQuiz')->name('admin.createQuiz');
Route::post('/admin/storeQuiz/{id}', 'adminController@storeQuiz')->name('admin.storeQuiz');
Route::get('/admin/editQuiz/{id}', 'adminController@editQuiz')->name('admin.editQuiz');
Route::post('/admin/updateQuiz/{id}', 'adminController@updateQuiz')->name('admin.updateQuiz');
Route::post('/admin/deleteQuiz', 'adminController@deleteQuiz')->name('admin.deleteQuiz');
Route::post('/admin/inactivateQuiz', 'adminController@inactivateQuiz')->name('admin.inactivateQuiz');
Route::post('/admin/activateQuiz', 'adminController@activateQuiz')->name('admin.activateQuiz');

/*Route for gift*/
Route::get('/admin/gift', 'adminController@gift_index')->name('admin.gift_index');
Route::get('/admin/addGift', 'adminController@addGift')->name('admin.addGift');
Route::get('/admin/editGift/{id}', 'adminController@editGift')->name('admin.editGift');
Route::post('/admin/inactivateGift', 'adminController@inactivateGift')->name('admin.inactivateGift');
Route::post('/admin/activateGift', 'adminController@activateGift')->name('admin.activateGift');
Route::post('/admin/deleteGift', 'adminController@deleteGift')->name('admin.deleteGift');
Route::post('/admin/renderGiftsTable', 'adminController@renderGiftsTable')->name('admin.render.giftTable');

/*Route for storing/updating campaign with image uploading*/
Route::get('/uploadfile', 'UploadfileController@index');
Route::post('/uploadfile', 'UploadfileController@upload');
Route::post('/updateCampaign/{id}', 'UploadfileController@updateCampaign');

/*Route for storing/updating gift with image uploading*/
Route::post('/storeGift', 'UploadfileController@storeGift');
Route::post('/updateGift/{id}', 'UploadfileController@updateGift');

/*Route for managing gift redemption*/
Route::get('/admin/giftRedemption', 'adminController@giftRedemption_index')->name('admin.giftRedemption_index');
Route::post('/admin/renderGiftRedemptionTable', 'adminController@renderGiftsRedemptionTable')->name('admin.render.giftRedemptionTable');
Route::post('/admin/renderApprovedRedemptionTable', 'adminController@renderApprovedRedemptionTable')->name('admin.render.approvedRedemptionTable');
Route::post('/admin/renderShippedOut_RedemptionTable', 'adminController@renderShippedOut_RedemptionTable')->name('admin.render.shippedOut_RedemptionTable');
Route::post('/admin/approveRedemption', 'adminController@approveRedemption')->name('admin.approveRedemption');
Route::post('/admin/cancel_disapproveRedemption', 'adminController@cancel_disapproveRedemption')->name('admin.cancel_disapproveRedemption');
Route::post('/admin/markRedemption_asShippedOut', 'adminController@mark_redemption_as_ShippedOut')->name('admin.markRedemption_as_ShippedOut');
Route::post('/admin/shipment_failure', 'adminController@mark_redemption_as_Shipment_failure')->name('admin.mark_redemption_as_Shipment_failure');


/*Route for Participant (Without Login)*/
Route::get('/participant/home', 'participantController@index')->name('participant.home');
Route::get('/participant/campaign', 'participantController@campaign')->name('participant.campaign');
Route::post('/participant/renderCampaignsTable', 'participantController@renderCampaignsTable')->name('participant.render.campaignTable');
Route::get('/participant/viewCampaign/{id}', 'participantController@single_campaign')->name('participant.viewCampaign');
Route::get('/participant/gift', 'participantController@gift')->name('participant.gift');
Route::post('/participant/renderGiftsTable', 'participantController@renderGiftsTable')->name('participant.render.giftTable');
Route::get('/participant/gamesQuizzes', 'participantController@games_quizzes_station')->name('participant.gamesQuizzes');

/*Route for Participant Registration*/
Route::get('/participant/register', 'Auth\ParticipantRegisterController@showRegisterForm')->name('participant.register');
Route::post('/participant/register', 'Auth\ParticipantRegisterController@register')->name('participant.register.submit');

/*Route for Participant Login*/
Route::get('/participant/login', 'Auth\ParticipantLoginController@showLoginForm')->name('participant.login');
Route::post('/participant/login', 'Auth\ParticipantLoginController@Login')->name('participant.login.submit');

/*Password reset routes*/
Route::post('/p_password/email', 'Auth\ParticipantForgotPasswordController@sendResetLinkEmail')->name('participant.password.email');
Route::get('/p_password/reset', 'Auth\ParticipantForgotPasswordController@showLinkRequestForm')->name('participant.password.request');
Route::post('/p_password/reset', 'Auth\ParticipantResetPasswordController@reset');
Route::get('/p_password/reset/{token}', 'Auth\ParticipantResetPasswordController@showResetForm')->name('participant.password.reset');

/*Route for logged in Participant*/
Route::get('/l_participant/home', 'LoggedInParticipantController@index')->name('l_participant.home');
Route::get('/l_participant/campaign', 'LoggedInParticipantController@campaign')->name('l_participant.campaign');
Route::post('/l_participant/renderCampaignsTable', 'LoggedInParticipantController@renderCampaignsTable')->name('l_participant.render.campaignTable');
Route::get('/l_participant/viewCampaign/{id}', 'LoggedInParticipantController@single_campaign')->name('l_participant.viewCampaign');
Route::get('/l_participant/gift', 'LoggedInParticipantController@gift')->name('l_participant.gift');
Route::post('/l_participant/renderGiftsTable', 'LoggedInParticipantController@renderGiftsTable')->name('l_participant.render.giftTable');
Route::post('/l_participant/redeem_gift', 'LoggedInParticipantController@redeem_gift')->name('l_participant.redeem_gift');
Route::get('/l_participant/my_gift', 'LoggedInParticipantController@my_gift')->name('l_participant.my_gift');
Route::post('/l_participant/renderMy_giftTable', 'LoggedInParticipantController@render_my_GiftsTable')->name('l_participant.render.my_giftTable');
Route::post('/l_participant/renderApproved_giftTable', 'LoggedInParticipantController@render_approved_GiftsTable')->name('l_participant.render.approved_GiftsTable');
Route::post('/l_participant/renderDelivered_giftTable', 'LoggedInParticipantController@render_delivered_GiftsTable')->name('l_participant.render.delivered_GiftsTable');
Route::post('/l_participant/renderCancelled_giftTable', 'LoggedInParticipantController@render_cancelled_GiftsTable')->name('l_participant.render.cancelled_GiftsTable');
Route::post('/l_participant/cancelRedemption', 'LoggedInParticipantController@cancelRedemption')->name('l_participant.cancelRedemption');
Route::post('/l_participant/receiveGift', 'LoggedInParticipantController@gift_received')->name('l_participant.gift_received');
Route::get('/l_participant/gamesQuizzes', 'LoggedInParticipantController@games_quizzes_station')->name('l_participant.gamesQuizzes');
Route::get('/l_participant/answerQuiz/{id}', 'LoggedInParticipantController@answerQuiz')->name('l_participant.answerQuiz');
Route::post('/l_participant/finishQuiz', 'LoggedInParticipantController@finishQuiz')->name('l_participant.finishQuiz');
Route::get('/l_participant/games/2048', 'LoggedInParticipantController@play2048')->name('l_participant.play2048');
Route::post('/l_participant/finish2048', 'LoggedInParticipantController@finish2048')->name('l_participant.finish2048');

Route::get('/l_participant/games/FlappyBird', 'LoggedInParticipantController@playFlappyBird')->name('l_participant.playFlappyBird');
Route::post('/l_participant/finishFlappyBird', 'LoggedInParticipantController@finishFlappyBird')->name('l_participant.finishFlappyBird');
