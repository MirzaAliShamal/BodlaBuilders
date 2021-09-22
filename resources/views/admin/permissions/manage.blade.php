@extends("layouts.admin")

@section("title", "Manage Permissions")

@section("nav-title", "Manage Permissions")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"><i class="material-icons">apps</i></div>
                    <h5 class="card-title">Manage Permissions</h5>
                </div>
                <div class="card-body">

                    <div class="container">
                        <table class="table table-bordered mb-0" id="managePerm">
                            <thead>
                                <tr>
                                    <th>Roles / Permissions</th>
                                    @foreach ($roles as $item)
                                        <td>{{ $item->name }}</td>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $perm)
                                    <tr>
                                        <td>{{ $perm->name }}</td>
                                        @foreach ($roles as $rol)
                                            <td>
                                                <fieldset>
                                                    <div class="vs-checkbox-con vs-checkbox-success">
                                                        <input type="checkbox" value="1" data-role="{{ $rol->id }}" data-permission="{{ $perm->id }}" {{ checkRolePerm($rol->id, $perm->id) }} class="permissions">
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </fieldset>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
       $(document).on("change", ".permissions", function() {
            let elm = $(this);
            $.ajax({
                type: "GET",
                url: "{{ route('admin.permissions.manage') }}",
                data: {
                    role : elm.data('role'),
                    permission : elm.data('permission'),
                },
                success: function (response) {
                    if (response.statusCode == 200) {
                        md.showNotification('success',response.message);
                    }
                }
            });
        });

        var table = $('.server-datatables').DataTable({
            "sort": false,
            "ordering": false,
            "pagingType": "full_numbers",
            "processing": true,
            "serverSide": true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            orderable: true,
            searchable: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });
    </script>
@endsection
