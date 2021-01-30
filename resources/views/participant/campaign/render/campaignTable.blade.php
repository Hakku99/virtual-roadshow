<table id="campaigns_table">
    <thead>
    <tr>
        <th scope="row"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($campaigns as $campaign)
        <tr>
            <td>
                <div class="blog-post col-lg-12">
                    @if (Illuminate\Support\Facades\Auth::guest())
                        <div class="blog-thumb">
                            <a href="{{url('/participant/viewCampaign', $campaign->id)}}">
                                <img
                                    src="/assets/uploaded_images/campaign_images//{{$campaign->name}}//{{$campaign->image_name}}"
                                    style="width: 100%; height: 200px; object-fit: cover;"></a>
                            {{--Image cropped from center--}}
                        </div>
                        <div class="down-content">

                            <a href="{{url('/participant/viewCampaign', $campaign->id)}}">
                                <h4>{{$campaign->name}}</h4></a>
                            <ul class="post-info">
                                <li><a href="#">{{$campaign->start_date}}</a></li>
                                <li><a href="#">{{$campaign->end_date}}</a></li>
                                {{--<li><a href="#"><i class="fa fa-comments" title="Comments"></i> 12</a></li>--}}
                            </ul>
                            <p>{{$campaign->section1}}</p>
                            <div class="post-options">
                                <div class="row">
                                    <div class="col-12">
                                        {{--<a href="{{url('/participant/viewCampaign', $campaign->id)}}">
                                            <button class="button" style="right: 0;"
                                                    value="{{ $campaign->id }}">View Campaign
                                            </button>
                                        </a>--}}
                                        <a href="{{url('/participant/viewCampaign', $campaign->id)}}" class="my_button"
                                           style="width: 180px; text-transform: uppercase; font-size: 14px; height: 50px;
                                        float: right">View Campaign</a>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="blog-thumb">
                                    <a href="{{url('/l_participant/viewCampaign', $campaign->id)}}">
                                        <img
                                            src="/assets/uploaded_images/campaign_images//{{$campaign->name}}//{{$campaign->image_name}}"
                                            style="width: 100%; height: 200px; object-fit: cover;"></a>
                                    {{--Image cropped from center--}}
                                </div>
                                <div class="down-content">
                                    <a href="{{url('/l_participant/viewCampaign', $campaign->id)}}">
                                        <h4>{{$campaign->name}}</h4></a>
                                    <ul class="post-info">
                                        <li><a href="#">{{$campaign->start_date}}</a></li>
                                        <li><a href="#">{{$campaign->end_date}}</a></li>
                                        {{--<li><a href="#"><i class="fa fa-comments" title="Comments"></i> 12</a></li>--}}
                                    </ul>
                                    <p>{{$campaign->section1}}</p>
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="{{url('/l_participant/viewCampaign', $campaign->id)}}"
                                                   class="my_button"
                                                   style="width: 180px; text-transform: uppercase; font-size: 14px; height: 50px;
                                        float: right">View Campaign</a>
                                                {{--<button class="button" style="align-items: right;"
                                                        value="{{ $campaign->id }}">View Campaign
                                                </button>--}}
                                                {{--<div class="icons" style="float: right">
                                                    <i class="fas fa-pencil-alt icon-default"></i>
                                                    --}}{{--<i class="fa fa-thumbs-up icon-hover"></i>--}}{{--
                                                    <i class="fas fa-pencil-alt icon-hover"></i>
                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                        </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



