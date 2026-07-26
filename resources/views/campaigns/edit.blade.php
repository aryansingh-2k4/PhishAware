<!DOCTYPE html>
<html>
<head>
    <title>Edit Campaign</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>Edit Campaign</h2>

    <a href="{{ route('campaigns.index') }}" class="btn btn-secondary mb-3">
        Back
    </a>

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('campaigns.update',$campaign->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Campaign Name</label>

            <input
                type="text"
                name="campaign_name"
                class="form-control"
                value="{{ $campaign->campaign_name }}">

        </div>

        <div class="mb-3">

            <label>Target Email</label>

            <input
                type="email"
                name="target_email"
                class="form-control"
                value="{{ $campaign->target_email }}">

        </div>

        <div class="mb-3">

            <label>Email Subject</label>

            <input
                type="text"
                name="email_subject"
                class="form-control"
                value="{{ $campaign->email_subject }}">

        </div>

        <div class="mb-3">

            <label>Email Body</label>

            <textarea
                class="form-control"
                rows="6"
                name="email_body">{{ $campaign->email_body }}</textarea>

        </div>

        <div class="mb-3">

            <label>Redirect URL</label>

            <input
                type="url"
                name="redirect_url"
                class="form-control"
                value="{{ $campaign->redirect_url }}">

        </div>

        <button class="btn btn-success">

            Update Campaign

        </button>

    </form>

</div>

</body>
</html>
