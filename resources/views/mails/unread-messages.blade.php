@component('mail::message')
#Hello {{$user->fname}},

<p>You have new reply in your threads:</p>
{{$message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
