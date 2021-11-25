@extends('layouts.admin')

@section('title')
    Edit Type
@endsection

@section('content')

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper" class="vh-80">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex align-items-center">

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
                                <div class="col-md-12">
                                    <span class="text-header">Edit Type</span>

                                    <form class="mt-4" method="post" enctype="multipart/form-data"
                                        action="{{ route('types.update', $type->id) }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label text-right">Name</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                    id="inputName" placeholder="Name" name="name"
                                                    value="{{ $type->name }}">
                                            </div>
                                        </div>

                                        <div class="form-group row mt-4">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-3">

                                                <button type="submit" class="btn btn-primary"> <i
                                                        class="fas fa-plus mr-2"></i>Submit</button>

                                            </div>
                                        </div>

                                    </form>

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
@endsection
