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
                   
                    <h3 class="text-center">Payment Information</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="shadow-none p-3 mb-5 bg-light rounded">
                                <h5>Netbanking Information</h5>
                                <p>HDFC BANK<br/>
                                Gorabazar, Dum Dum Cantonment,<br/>
                                West Bengal, Kolkata-700028.<br/>
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

                    <div class="row">
                        <div class="col-md-8">
                            <h4>Your Balance: ₹6,000/-</h4>
                            <p class="muted">Total Amount Uses: ₹10,000/-</p>
                            <table class="table table-striped table-inverse">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Purpose</th>
                                        <th>Date</th>
                                        <th>Credit</th>
                                        <th>Debit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">Joining Bonus.</td>
                                            <td>1st March 2020</td>
                                            <td>1000</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Add Fund by Cash</td>
                                            <td>3rd March 2020</td>
                                            <td>5000</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Enrolled Website Designing Course</td>
                                            <td>11th March 2020</td>
                                            <td>&nbsp;</td>
                                            <td>5000</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Add Fund By NEFT</td>
                                            <td>3rd March 2020</td>
                                            <td>3000</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Monthly Renewal</td>
                                            <td>11th March 2020</td>
                                            <td>&nbsp;</td>
                                            <td>1000</td>
                                        </tr>
                                    </tbody>
                            </table>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                  <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                  </li>
                                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                  </li>
                                </ul>
                              </nav>
                        </div>
                        <div class="col-md-4 col-12 shadow p-3 mb-5 bg-white rounded">
                            <h3 class="text-center">Transaction Information</h3>
                            <form>
                                <div class="form-group">
                                    <label for="inputName">Payment Holder Name</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Input Name">
                                </div>
                                <div class="form-group">
                                    <label for="inputNumber">Transaction Number</label>
                                    <input type="number" class="form-control" id="inputNumber" placeholder="Input Transaction Number">
                                </div>
                                <div class="form-group">
                                    <label for="inputBank">Message</label>
                                    <input type="text" class="form-control" id="inputMessage" placeholder="Input Message">
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