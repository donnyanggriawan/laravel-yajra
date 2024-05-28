@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar User</div>

                <div class="card-body">
                    <a href="#" class="btn btn-sm btn-success mb-2">Tambah Data</a>
                    <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
$(document).ready(function () {
   $('#tbl_list').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            // endpoint atau router sekarang
            url: '{{ url()->current() }}',
            data: function(d) {
            // Data tambahan yang akan dikirim ke server (misalnya filter)
            },
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-center col-1' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },

        ],
        search: {
            "regex": true // Mengaktifkan pencarian regex untuk lebih fleksibel
        }
    });
 });
</script>
@endpush