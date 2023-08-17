@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="">
                        <a href="{{route('download_excel_sheet')}}" class="btn btn-success text-decoration-none text-white">Excel Download</a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table yajra-datatable">
                        <thead>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Coupon Number</th>
                            <th>Category</th>
                            <th>Created At</th>
                            <th>Preview</th>
                            <th>Action</th>
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

@section('script')

    <script type="text/javascript">
       $(function () {
           // alert('jquery ok');
           var table = $('.yajra-datatable').DataTable({
               processing: true,
               serverSide: true,
               responsive: true,
               // scrollY: 50,
               ajax: {
                   url: '{{ route('home') }}',
                   data: function (d) {
                       //d.order_id = $('#order_id').val();
                   }
               },
               columns: [
                   {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false  },
                   {data: 'image', name: 'image', orderable: false, searchable: false },
                   {data: 'name', name: 'name', orderable: true, searchable: true },
                   {data: 'email', name: 'email', orderable: true, searchable: true  },
                   {data: 'phone', name: 'phone', orderable: true, searchable: true },
                   {data: 'coupon_code', name: 'coupon_code', orderable: true, searchable: true },
                   {data: 'category', name: 'category', orderable: true, searchable: true },
                   {data: 'created_at', name: 'created_at', orderable: true, searchable: true },
                   {data: 'link', name: 'link', orderable: false, searchable: false },
                   {data: 'action', name: 'action', orderable: true, searchable: true },
               ],
               pageLength: 10,
               lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
               "bDestroy": true
           });
       })
    </script>

@endsection

