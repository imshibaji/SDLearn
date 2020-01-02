<div class="col-md-4">
    <div class="">
    {{-- Learning Section --}}
    <div class="accordion" id="accordionExample">
        @foreach ($learning as $key => $value )
        <div class="card">
            <div class="card-header" id="heading{{ $value['id'] }}">
            <h2 class="mb-0">
                <button class="btn btn-default btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $value['id'] }}" aria-expanded="true" aria-controls="collapse{{ $value['id'] }}">
                    Course {{$key + 1}}: {{ $value['title'] }}
                </button>
            </h2>
            </div>
            <div id="collapse{{ $value['id'] }}" class="collapse" aria-labelledby="heading{{ $value['id'] }}" data-parent="#accordionExample">
            <div class="card-body">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        {{ $value['details'] }}
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                    <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                    <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- Learning Section --}}
</div>
</div>