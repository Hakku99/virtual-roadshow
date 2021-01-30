<table id="cancelled_gifts_table" width="100%">
    <thead>
    <tr>
        <th scope="row">
            <h2>Cancelled Redemption</h2>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($cancelled as $cancelled_gift)
    <tr>
        <td>
            <div class="blog-post">
                <div class="blog-thumb col-lg-12">
                    <img class="col-lg-2 col-sm-12"
                         src="/assets/uploaded_images/gift_images//{{$cancelled_gift->name}}//{{$cancelled_gift->image_name}}"
                         style="width: 100%; height: 100px; object-fit: cover; float: left">
                    <div class="col-lg-7 col-sm-12" style="float: left; padding: 10px; margin-left: 20px;
                            text-align: justify; text-justify: inter-word;">
                        <h4 style="font-family: Roboto; font-weight: bold">{{$cancelled_gift->name}}</h4>
                        <p style="margin-top: 10px">{{$cancelled_gift->elaboration}}</p>
                    </div>
                    <div class="col-lg-2 col-sm-12" style="float: right; padding: 10px; margin-left: 20px;
                            text-align: justify; text-justify: inter-word;">
                        {{--<h4 style="font-family: Roboto; font-weight: bold; float: right">Status</h4>
                        <br>
                        <p style="margin-top: 10px; text-align: right">Cancelled</p>
                        <br>--}}
                        <h4 style="font-family: Roboto; font-weight: bold; float: right">Cancelled Reason</h4>
                        <br>
                        <p style="margin-top: 10px; text-align: right">{{$cancelled_gift->f_reason}}</p>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
