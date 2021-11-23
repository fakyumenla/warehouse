@extends('layouts.admin')

@section('title')
    Item
@endsection

@section('content')

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="row py-3 px-4">
                            <div class="col-md-12">
                                <span class="text-header">Items</span>
                                <a href="/getOffice/1" class="btn btn-secondary float-right ">Select</button>
                                    <a href="{{ route('items.create') }}" class="btn btn-primary float-right mr-2">
                                        <i class="fas fa-plus mr-2"></i>
                                        Add Item
                                    </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Office</th>
                                            <th>Region</th>
                                            <th>Detail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Office</th>
                                            <th>Region</th>
                                            <th>Detail</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        {{-- <tr>
                                            <td>1</td>
                                            <td>ITM0001</td>
                                            <td>Asus ROG</td>
                                            <td>Laptop</td>
                                            <td>Jakarta Selatan</td>
                                            <td class=" d-flex justify-content-center">
                                                <button type="button"
                                                    class="btn btn-primary float-right">Detail</button>
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
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


@endsection

@section('script')

    <script type="text/javascript">
        $(function() {
            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: "{{ route('items.list') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'type_str',
                        name: 'type.name'
                    },
                    {
                        data: 'office_str',
                        name: 'office.name'
                    },
                    {
                        data: 'region_str',
                        name: 'region.name'
                    },
                    {
                        data: 'detail',
                        name: 'detail'
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
@endsection
