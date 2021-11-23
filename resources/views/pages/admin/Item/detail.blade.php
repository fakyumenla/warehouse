@extends('layouts.admin')

@section('title')
    {{ $item->name }}
@endsection

@section('content')

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper" class="">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <a href="/" class="btn btn-secondary shadow mb-4 border-0 ">
                            <div class="row px-1 d-flex justify-content-center mx-auto my-auto">
                                <i class="fas fa-arrow-left mr-2 my-2"></i>
                                <div class="my-1 ml-1">
                                    Back
                                </div>

                            </div>

                        </a>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="row py-3 px-4 ml-4 my-4">
                                <div class="col-md-6">
                                    <span class="text-header">Detail Barang</span>

                                    <form class="mt-4" method="post" enctype="multipart/form-data"
                                        action="/admin/employees/posts">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label text-right">Item name
                                                :</label>
                                            <div class="col-sm-4 col-form-label">
                                                {{ $item->name }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputNIK" class="col-sm-2 col-form-label text-right">Detail
                                                :</label>
                                            <div class="col-sm-4 col-form-label">
                                                {{ $item->description }}
                                            </div>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-6 d-flex justify-content-center">
                                    <div class="card d-flex justify-content-betwee" style="width: 12rem;">
                                        <div class="card-header ">
                                            <h5>Simple QR Code</h5>
                                        </div>
                                        <div class="card-body">
                                            {!! QrCode::size(150)->generate('' . route('items.details', [$item->name, $item->id]) . '') !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row py-3 px-4 ml-4 my-4">

                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Item Name</th>
                                                    <th>Owner</th>
                                                    <th>Date Taken</th>
                                                    <th>Return Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Item Name</th>
                                                    <th>Owner</th>
                                                    <th>Date Taken</th>
                                                    <th>Return Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->


            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        {{-- <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div> --}}

    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: "{{ route('items.details', [$item->name, $item->id]) }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'item_str',
                        name: 'item.name'
                    },
                    {
                        data: 'employee_str',
                        name: 'employee.name'
                    },
                    {
                        data: 'start_date',
                        name: 'start_date'
                    },
                    {
                        data: 'end_date',
                        name: 'end_date'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>

    {{-- {{ $item->id }}
{{ $item->name }}
{{ $item->description }}
{{ $office->name }}
{{ $region->name }} --}}
@endsection
