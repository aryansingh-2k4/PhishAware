<!DOCTYPE html>
<html>

<head>

    <title>Sign in</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-header text-center">

                    <h3>Secure Login</h3>

                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('simulate.capture',$campaign->tracking_token) }}">

                        @csrf

                        <div class="mb-3">

                            <label>Email</label>

                            <input
                                type="email"
                                name="username"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label>Password</label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required>

                        </div>

                        <button class="btn btn-primary w-100">

                            Sign In

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>
