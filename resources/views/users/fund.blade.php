@extends('layouts.user')

@section('content')
<div id="app" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Transaction Details</div>

                <div class="card-body" style="min-height: 600px">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    {{-- Other Payment Information --}}
                    <h3 class="text-center">Other Payment Information</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="shadow-none p-3 mb-5 bg-light rounded">
                                <h5>Netbanking Information</h5>
                                <p>HDFC BANK<br/>
                                Gorabazar, Dum Dum Cantonment, Kolkata-700028, WB.<br/>
                                Account Holder: Shibaji Debnath<br/>
                                A/c No: 01061000224409<br/>
                                IFSC Code: HDFC0000106</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="shadow-none p-3 mb-5 bg-light rounded">
                                <h5>Online Payment Information</h5>
                                <p>Google Pay Number: 8981009499<br/>
                                PhonePe Number: 8981009499,<br/>
                                PayTM Number: 8981009499
                                <br/><br/>
                                This Payment is accetable from india.
                            </p>
                            </div>
                        </div>
                    </div>
                    {{-- Other Payment Information --}}


                    {{-- Payment History --}}
                    <h3 class="text-center">Transaction History</h3>
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Your Balance: ₹{{$balance}}/-</h4>
                            <p class="muted">Total Amount Uses: ₹{{$totalPaid}}/-</p>

                            <x-data-table :fields="$fields" :items="$items" />
                        </div>
                        <div class="col-md-4 col-12 shadow p-3 mb-5 bg-white rounded">
                            <h3 class="text-center">Transaction Information</h3>
                            <form>
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Input Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Input Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" placeholder="Input Mobile" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Purpose</label>
                                    <input type="text" name="purpose" class="form-control" placeholder="Input Purpose" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Amount</label>
                                    <input type="text" name="amount" class="form-control" placeholder="Input Amount" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputNumber">Transaction By</label>
                                    <select name="transaction_method" class="form-control">
                                        <option>Netbanking</option>
                                        <option>PayTM</option>
                                        <option>PhonePay</option>
                                        <option>GooglePay</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputNumber">Transaction Number</label>
                                    <input type="text" name="transaction_number"  class="form-control" placeholder="Input Transaction Number" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputBank">Message</label>
                                    <textarea name="message" class="form-control" id="inputMessage" placeholder="Input Message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                              </form>
                        </div>
                    </div>
                    {{-- Page End Here --}}



                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection