<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>Form Edit Data user</h1>
        </div>

    </section>
    <section class="content-header">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <form action="{{ route('admin.user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama User</label>
                                <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukan kredensial" value="{{ old('name', $user->name)}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                <div class="col-sm-12 col-md-7">
                                <input type="email" class="form-control" value="{{ old('email', $user->email)}}" id="email" name="email" placeholder="Masukan email lengkap">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                                <div class="col-sm-12 col-md-7">
                                <select name="roles[]" id="role" class="form-control select2" multiple="multiple" data-placeholder="Select a role" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                            @foreach ($roles as $role)
                                            @php $Selected = false; @endphp
                                            @foreach ($user->roles as $userRole)
                                            @if ($userRole->name == $role->name)
                                            @php $Selected = true; @endphp
                                            @break
                                            @endif
                                            @endforeach
                                            <option value="{{ $role->name }}" {{ $Selected ? 'selected' : ''}}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                           
                            
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    </section>

    {{-- css library --}}
    @push('css-libraries')
    {{-- <link rel="stylesheet" href="{{ asset('stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    --}}
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}" />
    @endpush

    @push('js-libraries')
    {{-- <script src="{{ asset('stisla/node_modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script> --}}
    <script src="{{ asset('stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
    @include('sweetalert::alert')

    <script>
        $(function() {
            $('#select2insidemodal').select2({
                dropdownParent: $('#editModal')
            });
        });
    </script>
    @endpush


</x-app-layout>