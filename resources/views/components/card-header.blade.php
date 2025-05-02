<div class="card-body">

    <div class="d-flex justify-content-between">

        <div>
            {{ $slot }}
        </div>

        
            @if (isset($right))
            <div>
                {{ $right }}

            </div>
            @endif
        

    </div>




</div>
