<div class="row">
    <div class="col-md-4">
        <span>{{ $key }}</span>
    </div>
    <div class="col-md-8">
        @if($status == true)
        <span>: <div class="badge badge-success"> {!! $value !!}</div></span>
        @else
        <span>: {!! $value !!}</span>
        @endif
    </div>
</div>
