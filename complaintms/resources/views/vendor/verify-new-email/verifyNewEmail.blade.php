@component('mail::message')
# Verify New Email Address

Please click the button below to verify your new email address.

@component('mail::button', ['url' => $url])
Verify New Email Address
@endcomponent

If you did not update your email address, no further action is required.

Thanks,<br>
Hetauda Submetropolitan City
<br>
<hr>
If you're having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browsers:
<br>
<a href="{{ $url }}">{{ $url }}</a>
@endcomponent
