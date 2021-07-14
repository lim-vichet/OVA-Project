@extends('backend.master.masterpage')

@section('title', 'Vision')

@section('style')
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <form method="post" id="frmStructure" enctype="multipart/form-data" action="#" class="">
                    {{csrf_field()}}
                    <textarea id="txtStructure" name="txtStructure" class="form-control">{{$structureData->detail ?? ''}}</textarea>
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
    <script src="{{asset('backend/js/structure/structure.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#txtStructure').summernote({
                height: "600",
                placeholder: 'type any...',
                airMode: false,
            });

            // $('#txtDirector').summernote('code', '');
        });
    </script>
@endsection