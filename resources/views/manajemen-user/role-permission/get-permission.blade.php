<x-app-layout>
    <section class="section">
        <div class="section-header">
            <h1>Role Permission</h1>
        </div>

    </section>

    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">
                            {{ $title ?? ''}}
                        </button>
                        @foreach($permissions as $permission)
                        @php $Selected = false; @endphp
                        @foreach ($rolePermissions as $rolePermission)
                        @if ($permission->name == $rolePermission->name)
                        @php $Selected = true; @endphp
                        @break
                        @endif
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ ucwords($permission->name)}}
                            <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input permission" data-role="<?= $role->id ?>" data-permission="<?= $permission->id ?>" id="checkbox-<?= $permission->id ?>" {{ $Selected ? 'checked' : '' }}>
                                <label for="checkbox-<?= $permission->id ?>" class="custom-control-label">&nbsp;</label>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


    </section>




    {{-- css library --}}
    @push('css-libraries')
    {{-- <link rel="stylesheet" href="{{ asset('stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    --}}
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush

    @push('js-libraries')
    {{-- <script src="{{ asset('stisla/node_modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script> --}}
    <script src="{{ asset('stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
    @include('sweetalert::alert')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $(".permission").click(function() {
                var roleId = $(this).data('role');
                var permissionId = $(this).data('permission');
                var status = $(this).is(':checked');
                var action = ""


                if (status) {
                    action = "insert"
                } else {
                    action = "delete"
                }

                $.ajax({
                    url: "{{ route('admin.rolePermission.postPermission')}}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        permissionId: permissionId,
                        roleId: roleId,
                        action: action
                    },
                    success: function(data) {
                        let alert = data.success.alert
                        if (alert == 'success') {
                            toastr.success(data.success.message);
                        } else {
                            toastr.error(data.success.message);
                        }
                    }
                });
            });
        });
    </script>
    @endpush


</x-app-layout>