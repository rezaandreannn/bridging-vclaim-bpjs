<form method="post" action="{{ $action ?? '' }}" class="d-inline">
    @method('delete')
    @csrf
    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
</form>
