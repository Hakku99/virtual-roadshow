<table id="approved_gifts_table" width="100%">
    <thead>
    <tr>
        <th scope="row">
            <h2>Approved gift redemption</h2>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($approved as $redeemed_gift)
        <tr>
            <td>
                <div class="blog-post">
                    <div class="blog-thumb col-lg-12">
                        <img class="col-lg-2 col-sm-12"
                             src="/assets/uploaded_images/gift_images//{{$redeemed_gift->name}}//{{$redeemed_gift->image_name}}"
                             style="width: 100%; height: 100px; object-fit: cover; float: left">
                        <div class="col-lg-7 col-sm-12" style="float: left; padding: 10px; margin-left: 20px;
                            text-align: justify; text-justify: inter-word;">
                            <h4 style="font-family: Roboto; font-weight: bold">{{$redeemed_gift->name}}</h4>
                            <p style="margin-top: 10px">{{$redeemed_gift->elaboration}}</p>
                        </div>
                        <div class="col-lg-2 col-sm-12" style="float: right; padding: 10px; margin-left: 20px;
                            text-align: justify; text-justify: inter-word;">
                            <h4 style="font-family: Roboto; font-weight: bold; float: right">Status</h4>
                            <br>
                            @if($redeemed_gift->delivering === true)
                                <p style="margin-top: 10px; text-align: right">Delivering!</p>
                                <button type="submit" style="border-color: rgb(255,152,0); background-color: rgb(255,152,0);
                            margin-top: 10px; float: right"
                                        onclick="receive_gift(this.value)"
                                        class="btn" value="{{ $redeemed_gift->id }}">Received
                                </button>
                            @else
                                <p style="margin-top: 10px; text-align: right">Waiting to be shipped out.</p>
                                <button type="submit" style="border-color: grey; background-color: grey;
                            margin-top: 10px; float: right"
                                        onclick="receive_gift(this.value)"
                                        class="btn" value="{{ $redeemed_gift->id }}" disabled>Received
                                </button>
                            @endif

                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
