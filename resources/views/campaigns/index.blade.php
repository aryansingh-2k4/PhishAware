<!DOCTYPE html>
<html>
<head>
    <title>PhishAware - Campaign Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>PhishAware - Campaign Management</h2>

        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-dark">
                Dashboard
            </a>

            <a href="{{ route('campaigns.create') }}" class="btn btn-primary">
                Create Campaign
            </a>
        </div>
    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

        <tr>

            <th>ID</th>
            <th>Campaign Name</th>
            <th>Target Email</th>
            <th>Email Subject</th>
            <th>Status</th>
            <th width="350">Actions</th>

        </tr>

        </thead>

        <tbody>

        @forelse($campaigns as $campaign)

            <tr>

                <td>{{ $campaign->id }}</td>

                <td>{{ $campaign->campaign_name }}</td>

                <td>{{ $campaign->target_email }}</td>

                <td>{{ $campaign->email_subject }}</td>

                <td>

                    @if($campaign->status=='Draft')

                        <span class="badge bg-warning text-dark">
                            Draft
                        </span>

                    @else

                        <span class="badge bg-success">
                            Sent
                        </span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('campaigns.show',$campaign->id) }}"
                       class="btn btn-info btn-sm">

                        View

                    </a>

                    <a href="{{ route('campaigns.edit',$campaign->id) }}"
                       class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form action="{{ route('campaigns.destroy',$campaign->id) }}"
                          method="POST"
                          style="display:inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete Campaign?')">

                            Delete

                        </button>

                    </form>

                    <form action="{{ route('campaigns.send',$campaign->id) }}"
                          method="POST"
                          style="display:inline">

                        @csrf

                        <button class="btn btn-success btn-sm">

                            Send Simulation

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="6" class="text-center">

                    No Campaigns Found

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

</body>

</html>
