<div>
    @if ($buildingEmployees !== null)
        @foreach ($buildingEmployees as $employee)
            <div class="card">
                <div class="card-header">
                    {{ $employee->name }}
                </div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, dignissimos ex illum modi rem sint suscipit veritatis. Ad debitis deserunt exercitationem harum nesciunt, odio porro praesentium ratione unde velit vitae.
                </div>
            </div>
        @endforeach
    @endif
</div>
