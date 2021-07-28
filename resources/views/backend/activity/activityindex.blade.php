@extends('backend.master.masterpage')

@section('title', 'Activity')

@section('style')
    <link rel="stylesheet" href="{{asset('backend/css/activity/activitycss.css')}}">
    <style>
        .modal-backdrop{
            z-index: 0;
        }
    </style>
    @endsection

@section('content')
    <div class="col-xl-12 entry-form-contain">
        <div class="row">
            <div class="col-xl-12">
                <form action="#" id="frmActivity" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="entry-head">
                        <div class="thumbnail-contain">
                            <input type="file" class="txtThumbnail" id="txtThumbnail" name="txtThumbnail" accept=".jpg,.jpeg,.jpeg,.gif">
                        </div>
                        <div class="title-contain">
                            <input type="text" class="form-control" id="txtTitle" name="txtTitle" placeholder="Title...">
                        </div>
                    </div>
                    <textarea id="txtDetail" name="txtDetail" class=""></textarea>
                    <div class="col-xl-12 p-0">
                        <input type="button" id="btnSave" class="btn btn-primary mt-2" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="row">
            <button class="btn btn-primary" id="btnCreate">Create</button>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <table id="activityTable" class="table table-bordered table-striped" width="100%">
                    <thead>
                    <tr>
                        <th width="60%">Title</th>
                        <th width="40%">Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    <script src="{{asset('backend/js/activity/activity.js')}}"></script>
    <script>
        $(document).ready(function () {

            $('#txtDetail').summernote({
                height: "250",
                placeholder: 'type any...',
                airMode: false,
            });

            // $('#txtDirector').summernote('code', '');

            $('#activityTable').DataTable( {
                ajax: {
                    url: '{{route('activity.ajaxtable')}}',
                    dataSrc: 'data'
                },
                columns: [
                    {name: 'title', data: 'title'},
                    {name: 'action', data: 'action'}
                ],
            } );
        });
    </script>
    @endsection