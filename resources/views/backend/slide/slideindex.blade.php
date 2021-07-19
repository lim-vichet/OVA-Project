@extends('backend.master.masterpage')

@section('title', 'Partner')

@section('style')
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-4">
                <form action="#" id="frmSlide" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <label for="id">ID</label>
                        <input class="form-control mb-2" type="text" id="id" name="id">
                        <label for="name">Name</label>
                        <input class="form-control mb-2" type="text" id="name" name="name" placeholder="name">

                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="img" accept=".png,.jpg,.jpeg" name="img">
                        <div class="col-xl-12 p-0">
                            <input type="button" id="btnSave" class="btn btn-primary mt-2" value="Save">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-12">
                <table id="contactTable" class="table table-bordered table-striped" width="100%">
                    <thead>
                    <tr>
                        <th >ID</th>
                        <th >Name</th>
                        <th >Images</th>
                        <th >Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('backend/js/contact/contact.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#slideTable').DataTable( {
                ajax: {
                    url: '{{route('slide.ajaxtable')}}',
                    dataSrc: 'data'
                },
                columns: [
                    {name: 'id', data: 'id'},
                    {name: 'name', data: 'name'},
                    {name: 'img', data: 'img'},
                    {name: 'action', data: 'action'}
                ],
            } );
        });
    </script>
@endsection