@extends('backend.master.masterpage')

@section('title', 'Vision')

@section('style')
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <form method="post" id="frmVision" enctype="multipart/form-data" action="#" class="">
                    {{csrf_field()}}
                    <textarea id="txtVision" name="txtVision" class="form-control">{{$visionData->detail ?? ''}}</textarea>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="button" id="btnSave" class="btn btn-primary mt-2" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('backend/js/vision/vision.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#txtVision').summernote({
                height: "600",
                placeholder: 'type any...',
                airMode: false,
            });

            // $('#txtDirector').summernote('code', '');
        });
    </script>
@endsection