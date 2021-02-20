<table class="table-striped" id="gifts_table" width="100%">
    <thead>
    <tr>
        <th scope="row" style="text-align: right">
            @if (Illuminate\Support\Facades\Auth::check())
            <h2>Current points: {{ Auth::user()->points }}</h2>
            @endif
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($gifts as $gift)
        <tr>
            <td>
                <div class="blog-post">
                    <div class="blog-thumb col-lg-12">
                        {{--<img class="col-lg-3 col-sm-12"
                             src="/assets/uploaded_images/gift_images//{{$gift->name}}//{{$gift->image_name}}"
                             style="width: 100%; height: 120px; object-fit: cover; float: left">--}}
                        <img class="col-lg-3 col-sm-12"
                             src="/assets/uploaded_images/gift_images//{{$gift->name}}//{{$gift->image_name}}"
                             style="width: 100%; height: 160px; object-fit: cover; float: left">
                        <div class="col-lg-6 col-sm-12" style="float: left; padding: 10px; margin-left: 20px;
                            text-align: justify; text-justify: inter-word;">
                            <h4 style="font-family: Roboto; font-weight: bold">{{$gift->name}}</h4>
                            <p style="margin-top: 10px">{{$gift->elaboration}}</p>
                            <p style="font-family: Roboto; font-weight: bold; /*font-size: 20px;*/ margin-top: 10px">
                                Point required: {{$gift->price}}</p>
                            <p style="font-family: Roboto; font-weight: bold; font-size: 20px;">
                                Amount left: {{$gift->amount}}</p>
                        </div>
                        @if (Illuminate\Support\Facades\Auth::guest())
                            <div class="col-lg-2 col-sm-12" style="float: right;
                            justify-content: flex-end; display: flex;">
                                <a href="{{route('participant.login')}}">
                                    <button class="button" style="bottom: 0;">Login to redeem</button>
                                </a>
                            </div>
                        @else
                            <div class="col-lg-2 col-sm-12" style="float: right;
                            justify-content: flex-end; display: flex;">
                                @if(Auth::user()->points >= $gift->price)
                                    <button class="button" onclick="redeem_gift(this.value)" style="bottom: 0;"
                                            value="{{ $gift->id }}">Redeem</button>
                                @else
                                    <button class="button" disabled style="background-color: #808080; bottom: 0;">
                                        Points Not Enough</button>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



