<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>Master Data user</h1>
        </div>

    </section>

    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pb-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="ion ion-plus"> </i> Add user
                            </button>
                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role & Permission</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td style="width: 5%">{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>

                                        <button type="button" class="badge border-0
                                             @if($user->roles->count() > 1)
                                                    badge-primary
                                                @elseif($user->roles->count() == 1)
                                                    badge-success
                                                @else
                                                    badge-danger
                                                @endif" data-toggle="modal" data-target="#changeRole{{ $user->roles->count() > 1 ? $user->id : ''}}">
                                            @if($user->roles->count() > 1)
                                            {{$user->roles->count()}} Role
                                            @elseif($user->roles->count() == 1)
                                            {{ $user->roles[0]->name }}
                                            @else
                                            Not Role
                                            @endif
                                        </button>
                                        <a href="#" class="badge badge-warning border-0"><i class="fas fa-user-lock"></i> permission </a>
                                    </td>


                                    <td>
                                        <!-- <x-a-link-edit-modal param="{{ $user->id }}">
                                        </x-a-link-edit-modal> -->
                                        <x-button-edit href="{{ route('admin.user.edit', $user->id) }}" />
                                        <x-button-delete action="{{ route('admin.user.destroy', $user->id) }}" />
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Modal Role -->
    @foreach($users as $user)
    <div class="modal fade" id="changeRole{{$user->id}}" tabindex="-1" aria-labelledby="changeRoleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeRoleLabel">Role By User {{ $user->full_name}} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.change.role') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $user->id }}" name="userId">
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Role Name</th>
                                    <th scope="col">Active</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->roles as $role)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $role->name}}</td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="role{{ $role->id}}" name="roles[]" value="{{ $role->id}}" {{ $user->hasRole($role->name) ? 'checked' : ''}} disabled>
                                            <label class="custom-control-label" for="role{{ $role->id}}"></label>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Modal Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data {{ $title ?? ''}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.user.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama User <i><small class="required-label"></small></i>
                            </label>
                            <input type="text" name="name" class="form-control" required="">
                            <div class="valid-feedback">

                            </div>
                            <div class="invalid-feedback">
                                <i>Input user name wajib diisi.</i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email <i><small class="required-label"></small></i>
                            </label>
                            <input type="text" name="email" class="form-control" required="">
                            <div class="valid-feedback">

                            </div>
                            <div class="invalid-feedback">
                                <i>Input guard name wajib diisi.</i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password <i><small class="required-label"></small></i>
                            </label>
                            <input type="password" name="password" class="form-control" required="">
                            <div class="valid-feedback">

                            </div>
                            <div class="invalid-feedback">
                                <i>Input guard name wajib diisi.</i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password <i><small class="required-label"></small></i>
                            </label>
                            <input type="password" id="password" name="password_confirmation" class="form-control" required="">
                            <div class="valid-feedback">

                            </div>
                            <div class="invalid-feedback">
                                <i>Input guard name wajib diisi.</i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Role <i><small class="required-label"></small></i>
                            </label>
                            <select name="roles[]" id="role" class="form-control select2" multiple="multiple" data-placeholder="Select a role" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <div class="valid-feedback">

                            </div>
                            <div class="invalid-feedback">
                                <i>Input guard name wajib diisi.</i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($users as $user)
    <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data {{ $title ?? ''}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>user Name <i><small class="required-label"></small></i>
                            </label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required="">
                            <div class="valid-feedback">

                            </div>
                            <div class="invalid-feedback">
                                <i>Input user name wajib diisi.</i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Role <i><small class="required-label"></small></i>
                            </label>
                            <select name="roles[]" class="form-control" multiple="multiple" data-placeholder="Select a role" data-dropdown-css-class="select2-purple" style="width: 100%;">
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
                            <div class="valid-feedback">

                            </div>
                            <div class="invalid-feedback">
                                <i>Input guard name wajib diisi.</i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

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