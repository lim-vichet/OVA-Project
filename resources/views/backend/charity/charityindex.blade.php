@extends('backend.master.masterpage')

@section('title', 'Charity')

@section('style')
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <form method="POST" id="frmMission" enctype="multipart/form-data" action="{{route('charity_insert')}}" class="">
                    {{csrf_field()}}
                    <textarea id="txtCharity" name="detail" class="form-control">{!! $charity->detail ?? '' !!}</textarea>
                    <div class="row">
                        <div class="col-xl-12">
                            <input type="submit" id="btnSave" class="btn btn-primary mt-2" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
{{--    <script src="{{asset('backend/js/mission/mission.js')}}"></script>--}}
    <script>
        $(document).ready(function () {
            $('#txtCharity').summernote({
                height: "600",
                placeholder: 'type any...',
                airMode: false,
            });

            // $('#txtDirector').summernote('code', '');
        });
    </script>
@endsection