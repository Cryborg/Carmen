<div>
    <div class="card mh">
        <div class="card-header">
            @lang('suspects_list_header')
            ({{ count($suspects) }})
        </div>
        <div class="card-body">
            @foreach ($suspects as $suspect)
                <div class="row">
                    {{ $suspect->name }}
                </div>
            @endforeach
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>
