@extends('backend.master.masterpage')

@section('title', 'Director')

@section('style')
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <form method="post" id="frmDirector" enctype="multipart/form-data" action="#" class="">
                    {{csrf_field()}}
                    <textarea id="txtDirector" name="txtDirector" class="form-control">{{$directorData->detail ?? ''}}</textarea>
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
    <script src="{{asset('backend/js/director/director.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#txtDirector').summernote({
                height: "600",
                placeholder: 'type any...',
                airMode: false,
            });

            // $('#txtDirector').summernote('code', '');
        });
    </script>
@endsection