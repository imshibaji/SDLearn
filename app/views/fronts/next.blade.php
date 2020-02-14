@extends('layouts.front')

@section('content')
<div class="back-dark">
<div class="container contents">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <h3 class="text-center"><i class="fa fa-check-circle"></i> Signup Successfully</h3>
                </div>

                <div class="card-body text-center p-5" style="min-height: 510px">
                    <h4><i class="fa fa-info-circle"></i> Email Not Confirm!</h4>
                    <p class="text-secondary">Please Check your email and confirm that</p>
                </div>
            </div>
        </div>
    </div>
</div>  
</div> 
@endsection

@section('headers')
<style>
.back-dark{
    background-color: #343a40;
}
</style>
@endsection