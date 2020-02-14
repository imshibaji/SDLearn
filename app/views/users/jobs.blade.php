@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3 class="text-center"><i class="fa fa-info-circle"></i> Jobs Offer Section</h3></div>

                <div class="card-body" style="min-height: 600px">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4><i class="fa fa-check-circle-o"></i> You don't have any offer!</h4>
                    <p class="text-secondary">Please minimum 2 courses compleated first.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
