@extends('layouts.admin')

@section('title')
    edit Transaction
@endsection

@section('content')

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex  flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <a href="{{ url()->previous() }}" class="btn btn-secondary shadow mb-4 border-0 ">
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
                                    <span class="text-header">Edit Transaction</span>

                                    <form class="mt-4" method="post" enctype="multipart/form-data"
                                        action="{{ route('histories.update', $history->id) }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">
                                                Employee Name</label>
                                            <div class="col-md-3 my-auto">
                                                <select class="livesearch form-control p-3" name="employee_id"
                                                    id="livesearch">
                                                    <option selected="selected" value=" {{ $employee->id }}">
                                                        {{ $employee->name }}
                                                    </option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Item Name</label>
                                            <div class="col-md-3 my-auto">
                                                <select class="  livesearch form-control " name="item_id"
                                                    id="livesearch-item">
                                                    <option selected="selected" value="{{ $item->id }}">
                                                        {{ $item->id }} - {{ $item->name }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Start Date
                                            </label>
                                            <div class="col-md-3 my-auto">
                                                <input id="datepicker" width="276" name="start_date"
                                                    value="{{ $history->start_date }}" />
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Start Date</label>
                                            <div class="col-md-3 my-auto ">
                                                <input class="border rounded" type="date" name="start_date"
                                                    style="border-color: grey!important; color:grey "
                                                    value="{{ $history->start_date }}" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">End Date</label>
                                            <div class="col-md-3 my-auto ">
                                                <input class="border rounded" type="date" name="end_date"
                                                    style="border-color: grey!important; color:grey "
                                                    value="{{ $history->end_date }}" />
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

@section('script')
    <script type="text/javascript">
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: '{{ config('app.date_format_js') }}'
        });
        $('#livesearch').select2({
            placeholder: '{{ $employee->name }}',
            ajax: {
                url: '/ajax-autocomplete-search',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
        // $('#livesearch').select2()
        // $('#livesearch').val(1).trigger("change");
        $('#livesearch-item').select2({
            placeholder: '{{ $item->id }} - {{ $item->name }}',
            ajax: {
                url: '/ajax-autocomplete-search-item',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.id + ' - ' + item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endsection
