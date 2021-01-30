<table id="my_gifts_table" width="100%">
    <thead>
    <tr>
        <th scope="row">
            <h2>Redemption pending for approval</h2>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($in_progress as $redeemed_gift)
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
                            <button type="submit" style="border-color: #F32013; background-color: #F32013;
                                                               margin: 8px; " onclick="cancel_redemption(this.value)"
                                    class="btn" value="{{ $redeemed_gift->id }}">Cancel redemption
                            </button>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
