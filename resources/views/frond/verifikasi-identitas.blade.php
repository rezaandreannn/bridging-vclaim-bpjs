<x-app-layout>
    <form method="post" action="{{ route('verifikasi.identitas')}}">
        @csrf
        <div class="form-group">
            <label for="no_mr">Masukan No MR</label>
            <input type="text" class="form-control" id="no_mr" name="no_mr">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-app-layout>
