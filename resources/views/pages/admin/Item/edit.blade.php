@extends('layouts.admin')

@section('title')
    Edit Item
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

                    <a href="{{ route('items.list') }}" class="btn btn-secondary shadow mb-4 border-0 ">
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
                                <span class="text-header">Add Item</span>

                                <form class="mt-4" method="post" enctype="multipart/form-data"
                                    action="{{ route('items.update', $item->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="inputName" placeholder="Name" name="name" value="{{ $item->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <label for="inputGender" class="col-sm-2 col-form-labe">Type</label>
                                        <div class="col-sm-3">
                                            <select class="custom-select @error('type_id') is-invalid @enderror"
                                                id="inputType" name="type_id">
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}"
                                                        {{ collect($type->id)->contains($item->type_id) ? 'selected' : '' }}>
                                                        {{ $type->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="inputGender" class="col-sm-2 col-form-label">Region</label>
                                        <div class="col-sm-3">
                                            <select class="custom-select @error('region_id') is-invalid @enderror"
                                                id="inputRegion" name="region_id">
                                                <option hidden>Choose Category</option>
                                                @foreach ($regions as $region)
                                                    <option value="{{ $region->id }}"
                                                        {{ collect($region->id)->contains($item->region_id) ? 'selected' : '' }}>
                                                        {{ $region->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row">

                                        <label for="inputGender" class="col-sm-2 col-form-label">Office</label>
                                        <div class="col-sm-3">
                                            <select class="custom-select @error('office_id') is-invalid @enderror"
                                                id="office" name="office_id">
                                                {{-- <option selected="selected"> {{ $item->office->name }}</option> --}}
                                                {{-- <option disabled>--</option>
                                                @foreach ($offices as $item)
                                                    <option selected="selected"> {{ $item->name }}</option>
                                                @endforeach --}}
                                                {{-- @foreach ($offices as $office)
                                                        <option value="{{ $office->id }}">{{ $office->name }}</option>
                                                    @endforeach --}}

                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="inputAddress" class="col-sm-2">Description</label>
                                        <div class="col-sm-3">
                                            <textarea class="form-control @error('Description') is-invalid @enderror "
                                                id="inputDescription" name="description"
                                                rows="3">{!! $item->description !!}</textarea>
                                        </div>

                                    </div>

                                    {{-- <div class="form-group row">

                                        <label for="inputGender" class="col-sm-2 col-form-label text-right">Barcode</label>
                                        <div class="col-sm-3">
                                            <input type="text"
                                                class="form-control @error('barcode_image') is-invalid @enderror"
                                                id="inputBarcode" placeholder="Barcode" name="barcode_image"
                                                value="{{ old('barcode_image') }}">
                                        </div>
                                    </div> --}}
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // var regionID = 1;

            function call_ajax(regionID) {
                // alert(id);
                // var regionID = $(this).val();
                if (regionID) {
                    $.ajax({
                        url: '/getOffice/' + regionID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {

                            $('#office').empty();
                            $('#office').append(
                                '<option hidden>Choose Course</option>');
                            $.each(data, function(key, office) {
                                $('select[name="office_id"]').append(
                                    '<option value="' + office.id + '">' +
                                    office
                                    .name + '</option>');
                            });

                        }
                    });
                } else {
                    $('select[name="office_id"]').append('<option value="">No Office Found</option>');
                }
            }
            $('select[name="region_id"]').on('change', function() {
                var regionID = $(this).val();
                // alert(regionID);
                call_ajax(regionID);
            });
            call_ajax("<?php echo $item->region->id; ?>");
        });
    </script>
@endsection
