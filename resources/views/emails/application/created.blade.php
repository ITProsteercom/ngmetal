@component('mail::message')
# New Application

New application was created on {{ $date_created }}
----------------------------
Package ID: {{ $package_id }} <br>
Purchase Date: {{ $sent_date }} <br>
Reason: {{ $reason }} <br>
Message: {{ $mess }}

@component('mail::button', ['url' => $url])
Admin Panel
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
