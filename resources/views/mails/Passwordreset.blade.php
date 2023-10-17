@component('mail::message')
Hello, {{$username}}

The body of your message.

@component('mail::button',['url'=>route('reset',$token)])
Click here to reset your password
@endcomponent
<p>Or copy and paste the following link to your browser</p>
<p>{{route('reset',$token)}}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
