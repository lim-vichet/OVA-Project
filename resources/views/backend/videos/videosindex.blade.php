@extends('backend.master.masterpage')

@section('title', 'Videos')

@section('style')
    <link rel="stylesheet" href="{{asset('backend/css/videos/videoscss.css')}}">
    <style>
        .modal-backdrop{
            z-index: 0;
        }
    </style>
    @endsection

@section('content')
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <form action="#" id="frmVideos" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-xl-6">
                        <input type="text" class="form-control" id="txtTitle" name="txtTitle" placeholder="Title...">
                        <textarea id="txtDetail" name="txtDetail" class="form-control mt-3"></textarea>
                        <input type="button" id="btnSave" class="btn btn-primary mt-2" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <table id="videosTable" class="table table-bordered table-striped" width="100%">
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
    <script src="{{asset('backend/js/videos/videos.js')}}"></script>
    <script>
        $(document).ready(function () {

            $('#videosTable').DataTable( {
                ajax: {
                    url: '{{route('videos.ajaxtable')}}',
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