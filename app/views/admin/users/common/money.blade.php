<form action="" method="POST">
    <div class="row py-2">
        <div class="col-6">
            <input type="text" name="details" class="form-control" placeholder="Trasection Details">
        </div>
        <div class="col">
            <input type="text" name="amount" class="form-control" placeholder="Amount">
        </div>
        <div class="col">
            <select name="type" class="form-control">
                <option value="credit">Add Fund</option>
                <option value="debit">Withdraw Fund</option>
                <option value="balance">Balance Fund</option>
            </select>
        </div>
    </div>
    <div class="row p-2">
        <button class="btn btn-success btn-block">Submit</button>
    </div>
</form>
    
    
    {{-- Details Table --}}
    <table class="table">
    <tr>
        <th>Details</th>
        <th>Addition</th>
        <th>Withdraw</th>
        <th>Balance</th>
    </tr>
    <tr>
        <td>Add Money By Student</td>
        <td>500</td>
        <td>&nbsp;</td>
        <td>500</td>
    </tr>
    <tr>
        <td>Monthly Charge</td>
        <td>&nbsp;</td>
        <td>200</td>
        <td>300</td>
    </tr>
    </table>