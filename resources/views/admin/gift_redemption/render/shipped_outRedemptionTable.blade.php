<table class="table table-striped" id="shipped_out_Redemption_table"
       style="width: 100%; margin-left: auto; margin-right: auto;">
    {{--<caption style="caption-side: top; font-size: 32px;">Approved Redemption</caption>--}}
    <thead>
    <tr>
        <th scope="col">No.</th>
        <th scope="col">Gift Image</th>
        <th scope="col">Gift Name</th>
        <th scope="col">Amount</th>
        <th scope="col">Redeemed by</th>
        <th scope="col">Participant Email</th>
        <th scope="col">Participant Address</th>
        <th scope="col">Action</th>
        <th scope="col">Created At</th>
    </tr>
    </thead>
    <tbody>
    <?php $count = 1; ?>
    @foreach($redemptions as $redemption)
        <tr>
            <td align="center">{{ $count++ }}</td>
            <td><img
                    src="/assets/uploaded_images/gift_images//{{ $redemption->gift_name }}//{{ $redemption->image_name }}"
                    width="150"/></td>
            <td>{{ $redemption->gift_name }}</td>
            <td>1</td>
            <td>{{ $redemption->redeemed_by }}</td>
            <td>{{ $redemption->email }}</td>
            <td>{{ $redemption->address }}</td>
            <td class="text-center">
                {{--<button type="submit" style="border-color: #4CAF50; background-color: #4CAF50;
                                                               margin: 8px" onclick="ship_out(this.value)"
                        class="btn" value="{{ $redemption->id }}">Mark as "Shipped out"
                </button>--}}
                <button type="submit" style="border-color: #F32013; background-color: #F32013;
                                                               margin: 8px" onclick="shipment_failure(this.value)"
                        class="btn" value="{{ $redemption->id }}">Mark redemption as "Shipment failure"
                </button>
            </td>
            <td>{{ $redemption->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
