<x-mail::message>


<p>Your OTP is {{ rand(1000, 9999) }}</p>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
