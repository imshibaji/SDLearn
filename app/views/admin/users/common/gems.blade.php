<form action="" method="POST">
    <div class="row py-2">
        <div class="col-6">
            <input type="text" name="details" class="form-control" placeholder="Trasection Details">
        </div>
        <div class="col">
            <input type="text" name="gems" class="form-control" placeholder="No of Gems">
        </div>
        <div class="col">
            <select name="type" class="form-control">
                <option value="credit">Add Gems</option>
                <option value="debit">Withdraw Gems</option>
                <option value="balance">Balance Gems</option>
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
    <td>Initial Joining Gems</td>
    <td>500</td>
    <td>&nbsp;</td>
    <td>500</td>
</tr>
<tr>
    <td>Redeem Gems</td>
    <td>&nbsp;</td>
    <td>200</td>
    <td>300</td>
</tr>
</table>