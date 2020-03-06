<!-- Modal -->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="ModalTitle">{{$modalTitle ?? 'Default Title'}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div id="ModalBody" class="modal-body">
        {!! $modalBody ?? 'Default Content' !!}
    </div>
    <div class="modal-footer">
        <button type="button" id="cancelBtn" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" id="okBtn" class="btn btn-primary">Ok</button>
    </div>
    </div>
</div>
</div>

<script>
function modal(title, body, callback){
    var stat = false;
    $('#ModalTitle').html(title);
    $('#ModalBody').html(body);
    $('#ModalCenter').modal();
    
    $('#okBtn').click(()=>{
        $('#ModalCenter').modal('hide');
        if(typeof callback === 'function' && stat == false){
            stat = true;
            callback({status: stat, message: 'Ok Btn Clecked'});
        }
    });
    $('#cancelBtn').click(()=>{
        $('#ModalCenter').modal('hide');
        if(typeof callback === 'function' && stat == false){
            stat = true;
            callback({status: false, message: 'Cancel Btn Clecked'});
        }
    });
}
function checking(title, amt){
    var balAmt = parseFloat('{!! Auth::user()->money()->get()->last()->balance_amt !!}');
    var courseAmt = amt;
    var pbody = '';

    if(balAmt < courseAmt){
        pbody =`
            <h3 class="text-danger">Your balance Not Suffitient.</h3>
            <div>You have not too much enugh balance amount in your account. Please Add Fund in your Account. Or Call us for Free Credit: +91-8981009499</div>
        `;
    }else{
        pbody =`
            <h3 class="text-success">Your are Succesfully Enrolled.</h3>
            <div>You have Succesfully Enrolled ${title} Session. Please Call us: +91-8013138886. For Confirmations.</div>
        `;
    }

    
    modal(title, pbody, function(e){
        
        console.log(courseAmt, balAmt); 
    });
}
</script>