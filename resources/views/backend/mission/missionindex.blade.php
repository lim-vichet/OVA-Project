@extends('backend.master.masterpage')

@section('title', 'Mission')

@section('style')
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <form method="post" id="frmMission" enctype="multipart/form-data" action="#" class="">
                    {{csrf_field()}}
                    <textarea id="txtMission" name="txtMission" class="form-control">{{$missionData->detail ?? ''}}</textarea>
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
    <script src="{{asset('backend/js/mission/mission.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#txtMission').summernote({
                height: "600",
                placeholder: 'type any...',
                airMode: false,
            });

            // $('#txtDirector').summernote('code', '');
        });
    </script>
@endsection