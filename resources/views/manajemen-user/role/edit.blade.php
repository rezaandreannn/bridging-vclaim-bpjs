<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>Form Edit Data Role</h1>
        </div>

    </section>
    <section class="content-header">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <form action="{{ route('admin.role.update', $role->id)}}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama role</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukan kredensial" value="{{ old('name', $role->name)}}">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="guard_name">Guard_name</label>
                                        <input type="guard_name" class="form-control" value="{{ old('guard_name', $role->guard_name)}}" id="guard_name" name="guard_name" placeholder="Masukan nama lengkap">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save</button>
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

    <script src="{{ asset('adminLTE/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>

    <script>
        $(function() {
            $('#select2insidemodal').select2({
                dropdownParent: $('#editModal')
            });
        });
    </script>
    @endpush


</x-app-layout>