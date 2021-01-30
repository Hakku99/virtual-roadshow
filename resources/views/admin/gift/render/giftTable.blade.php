<table class="table table-striped" id="gifts_table"
       style="width: 100%; margin-left: auto; margin-right: auto;">
    <caption style="caption-side: top; font-size: 32px;">List of Gift</caption>
    <thead>
    <tr>
        <th scope="col">No.</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Elaboration</th>
        <th scope="col">Price</th>
        <th scope="col">Amount</th>
        <th scope="col">Edit</th>
        <th scope="col">Status</th>
        <th scope="col">Delete</th>
        <th scope="col">Expired date</th>
        <th scope="col">Created By</th>
    </tr>
    </thead>
    <tbody>
    <?php $count = 1; ?>
    @foreach($gifts as $gift)
        <tr>
            <td align="center">{{ $count++ }}</td>
            <td>{{ $gift->name }}</td>
            {{--<td>{{ $gift->image_name }}</td>--}}
            <td><img
                    src="/assets/uploaded_images/gift_images//{{ $gift->name }}//{{ $gift->image_name }}"
                    width="100"/></td>
            <td>{{ $gift->elaboration }}</td>
            <td>{{ $gift->price }}</td>
            <td>{{ $gift->amount }}</td>
            <td class="text-center">
                <a href="{{url('/admin/editGift', $gift->id)}}">
                    <button type="button" class="btn btn-success btn-sm"
                            style="border-color: #5453FA; background-color: #5453FA; margin: 8px">
                        Edit
                    </button>
                </a>
            </td>
            <td class="text-center">
                @if ($gift->status === true)
                    <button type="submit" style="border-color: #F9A602; background-color: #F9A602;
                                                               margin: 8px" onclick="inactivate_gift(this.value)"
                            class="btn" value="{{ $gift->id }}">Deactivate
                    </button>
                @else
                    <button type="submit" class="btn btn-danger btn-sm"
                            onclick="activate_gift(this.value)"
                            style="margin: 8px; border-color: #4CAF50; background-color: #4CAF50"
                            value="{{ $gift->id }}">Activate
                    </button>
                @endif
            </td>
            <td class="text-center">
                <button type="submit" class="btn"
                        style="border-color: #f44336; background-color: #f44336; margin: 8px"
                        value="{{ $gift->id }}"
                        onclick="delete_gift(this.value)">Delete
                </button>
            </td>
            <td>{{ $gift->expired_date }}</td>
            <td>{{ \App\Models\Admin::where('id', $gift->created_by)->first()->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
