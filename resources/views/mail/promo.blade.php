@extends('mail.layout')

@section('body')
<h1>Hello {{$user->fname}},</h1>
<div>
{{$msg}}
</div>
@endsection