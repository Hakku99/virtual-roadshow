<table class="table table-striped" id="gift_Redemption_table"
       style="width: 100%; margin-left: auto; margin-right: auto;">
    {{--<caption style="caption-side: top; font-size: 32px;">Redemption waiting for approval</caption>--}}
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
                <button type="submit" class="btn btn-danger btn-sm"
                        onclick="approve(this.value)"
                        style="margin: 8px; border-color: #4CAF50; background-color: #4CAF50"
                        value="{{ $redemption->id }}">Approve
                </button>
                <button type="submit" style="border-color: #F32013; background-color: #F32013;
                                                               margin: 8px" onclick="disapprove(this.value)"
                        class="btn" value="{{ $redemption->id }}">Disapprove
                </button>
            </td>
            <td>{{ $redemption->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
