<!DOCTYPE html>
<html>
<head>
    <title>{{ $campaign->email_subject }}</title>
</head>

<body>

<h2>{{ $campaign->campaign_name }}</h2>

<p>{!! nl2br(e($campaign->email_body)) !!}</p>

<br>

<a href="{{ url('/simulate/'.$campaign->tracking_token) }}"
style="background:#0d6efd;
padding:12px 20px;
color:white;
text-decoration:none;
border-radius:5px;">

Verify Account

</a>

</body>
</html>
