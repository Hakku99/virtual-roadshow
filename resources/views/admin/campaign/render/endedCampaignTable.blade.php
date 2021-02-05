<table class="table table-striped" id="endedCampaigns_table"
       style="width: 100%; margin-left: auto; margin-right: auto;">
    <caption style="caption-side: top; font-size: 32px;">List of Ended Campaigns</caption>
    <thead>
    <tr>
        <th scope="col">No.</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Video</th>
        <th scope="col">Elaboration 1</th>
        <th scope="col">Elaboration 2</th>
        <th scope="col">Elaboration 3</th>
        <th scope="col">Contact number</th>
        <th scope="col">Contact email</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        <th scope="col">Start date</th>
        <th scope="col">End date</th>
        <th scope="col">Created By</th>
    </tr>
    </thead>
    <tbody>
    <?php $count = 1; ?>
    @foreach($campaigns as $campaign)
        <tr>
            <td align="center">{{ $count++ }}</td>
            <td>{{ $campaign->name }}</td>
            <td><img
                    src="/assets/uploaded_images/campaign_images//{{$campaign->name}}//{{ $campaign->image_name }}"
                    width="100"/></td>
            <td><iframe width="300" height="169" src="https://www.youtube.com/embed/{{$campaign->video_id}}?autoplay=0"
                        allowfullscreen
                        style="margin: auto; border: none">
                </iframe></td>
            <td>{{ $campaign->section1 }}</td>
            <td>{{ $campaign->section2 }}</td>
            <td>{{ $campaign->section3 }}</td>
            <td>{{ $campaign->contact_number }}</td>
            <td>{{ $campaign->contact_email }}</td>
            <td class="text-center">
                <a href="{{url('/admin/editCampaign', $campaign->id)}}">
                    <button type="button" class="btn btn-success btn-sm"
                            style="border-color: #5453FA; background-color: #5453FA; margin: 5px">
                        Edit
                    </button>
                </a>
            </td>
            <td class="text-center">
                <button type="submit" class="btn"
                        style="border-color: #f44336; background-color: #f44336; margin: 5px"
                        value="{{ $campaign->id }}"
                        onclick="delete_campaign(this.value)">Delete
                </button>
            </td>
            <td>{{ $campaign->start_date }}</td>
            <td>{{ $campaign->end_date }}</td>
            <td>{{ \App\Models\Admin::where('id', $campaign->created_by)->first()->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
