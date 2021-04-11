<div>
    @if ($buildingEmployees !== null)
        @foreach ($buildingEmployees as $employee)
            <div class="card">
                <div class="card-header">
                    {{ $employee->name }}
                </div>
                <div class="card-body">
                    {!! $employee->dialog !!}
                </div>
            </div>
        @endforeach
    @endif
</div>
