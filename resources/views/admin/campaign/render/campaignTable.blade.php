<table class="table table-striped" id="campaigns_table"
       style="width: 100%; margin-left: auto; margin-right: auto;">
    <caption style="caption-side: top; font-size: 32px;">List of Campaigns</caption>
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
        <th scope="col">Quiz</th>
        <th scope="col">Edit</th>
        <th scope="col">Status</th>
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
                @if ($campaign->quiz === true && $campaign->quiz_status === true)
                    <a href="{{url('/admin/editQuiz', $campaign->id)}}">
                        <button type="submit" style="border-color: #5453FA; background-color: #5453FA;
                                                               margin: 5px"
                                class="btn" value="{{ $campaign->id }}">Edit quiz
                        </button>
                    </a>
                    <button type="submit"
                            class="btn" value="{{ $campaign->id }}"
                            style="border-color: #F9A602; background-color: #F9A602;
                                                               margin: 5px"
                            onclick="inactivate_quiz(this.value)">
                        Deactivate quiz
                    </button>
                    <button type="submit"
                            class="btn" value="{{ $campaign->id }}"
                            style="border-color: #f44336; background-color: #f44336;
                                                               margin: 5px"
                            onclick="delete_quiz(this.value)">
                        Delete quiz
                    </button>
                @elseif($campaign->quiz === true && $campaign->quiz_status === false)
                    <a href="{{url('/admin/editQuiz', $campaign->id)}}">
                        <button type="submit" style="border-color: #5453FA; background-color: #5453FA;
                                                               margin: 5px"
                                class="btn" value="{{ $campaign->id }}">Edit quiz
                        </button>
                    </a>
                    <button type="submit"
                            class="btn" value="{{ $campaign->id }}"
                            style="border-color: #4CAF50; background-color: #4CAF50;
                                                               margin: 5px"
                            onclick="activate_quiz(this.value)">
                        Activate quiz
                    </button>
                    <button type="submit"
                            class="btn" value="{{ $campaign->id }}"
                            style="border-color: #f44336; background-color: #f44336;
                                                               margin: 5px"
                            onclick="delete_quiz(this.value)">
                        Delete quiz
                    </button>
                @else
                    <a href="{{url('/admin/addQuiz', $campaign->id)}}">
                        <button type="submit" class="btn btn-danger btn-sm"
                                style="margin: 5px"
                                value="{{ $campaign->id }}">Add quiz
                        </button>
                    </a>
                @endif
            </td>
            <td class="text-center">
                <a href="{{url('/admin/editCampaign', $campaign->id)}}">
                    <button type="button" class="btn btn-success btn-sm"
                            style="border-color: #5453FA; background-color: #5453FA; margin: 5px">
                        Edit
                    </button>
                </a>
            </td>
            <td class="text-center">
                @if ($campaign->status !== true)
                    <button type="submit" style="border-color: #4CAF50; background-color: #4CAF50;
                                                               margin: 5px" onclick="activate_campaign(this.value)"
                            class="btn" value="{{ $campaign->id }}">Activate
                    </button>
                @else
                    <button type="submit"
                            class="btn" value="{{ $campaign->id }}"
                            style="border-color: #F9A602; background-color: #F9A602;
                                                               margin: 5px"
                            onclick="inactivate_campaign(this.value)">
                        Deactivate
                    </button>
                @endif
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
