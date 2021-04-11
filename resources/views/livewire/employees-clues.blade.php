<div>
    @if ($buildingEmployees !== null)
        @foreach ($buildingEmployees as $employee)
            <div class="card">
                <div class="card-header">
                    {{ $employee->name }} (#{{ $employee->id }})
                </div>
                <div class="card-body">
                    {{ $employee->dialog }}
                </div>
            </div>
        @endforeach
    @endif
</div>
