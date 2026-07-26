<!DOCTYPE html>
<html>
<head>
    <title>Campaign Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>Campaign Details</h2>

    <a href="{{ route('campaigns.index') }}" class="btn btn-secondary mb-3">
        Back
    </a>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <td>{{ $campaign->id }}</td>
        </tr>

        <tr>
            <th>Campaign Name</th>
            <td>{{ $campaign->campaign_name }}</td>
        </tr>

        <tr>
            <th>Target Email</th>
            <td>{{ $campaign->target_email }}</td>
        </tr>

        <tr>
            <th>Email Subject</th>
            <td>{{ $campaign->email_subject }}</td>
        </tr>

        <tr>
            <th>Email Body</th>
            <td>{{ $campaign->email_body }}</td>
        </tr>

        <tr>
            <th>Redirect URL</th>
            <td>{{ $campaign->redirect_url }}</td>
        </tr>

        <tr>
            <th>Status</th>
            <td>{{ $campaign->status }}</td>
        </tr>

        <tr>
            <th>Tracking Link</th>
            <td>
                <a href="{{ url('/simulate/'.$campaign->tracking_token) }}" target="_blank">
                    {{ url('/simulate/'.$campaign->tracking_token) }}
                </a>
            </td>
        </tr>

    </table>

</div>

</body>
</html>
