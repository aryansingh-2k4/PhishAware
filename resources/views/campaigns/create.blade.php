<!DOCTYPE html>
<html>
<head>
    <title>Create Campaign</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>Create New Campaign</h2>

    <a href="{{ route('campaigns.index') }}" class="btn btn-secondary mb-3">
        Back
    </a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('campaigns.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Campaign Name</label>
            <input type="text" name="campaign_name" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Target Email</label>
            <input type="email" name="target_email" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Email Subject</label>
            <input type="text" name="email_subject" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Email Body</label>
            <textarea name="email_body" rows="6" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Redirect URL</label>
            <input
                type="url"
                name="redirect_url"
                class="form-control"
                placeholder="https://example.com">
        </div>

        <button type="submit" class="btn btn-success">
            Save Campaign
        </button>

    </form>

</div>

</body>
</html>
