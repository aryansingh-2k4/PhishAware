<!DOCTYPE html>
<html>

<head>

    <title>PhishAware Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>PhishAware Dashboard</h2>

        <a href="{{ route('campaigns.index') }}" class="btn btn-primary">

            Campaigns

        </a>

    </div>

    <div class="row">

        <div class="col-md-4">

            <div class="card text-center shadow">

                <div class="card-body">

                    <h5>Total Campaigns</h5>

                    <h1>{{ $totalCampaigns }}</h1>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card text-center shadow">

                <div class="card-body">

                    <h5>Emails Sent</h5>

                    <h1>{{ $sentCampaigns }}</h1>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card text-center shadow">

                <div class="card-body">

                    <h5>Captured Credentials</h5>

                    <h1>{{ $totalCredentials }}</h1>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>
