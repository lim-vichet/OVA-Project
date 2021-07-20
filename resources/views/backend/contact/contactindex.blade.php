@extends('backend.master.masterpage')

@section('title', 'Partner')

@section('style')
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-4">
                <form action="#" id="frmContact" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <label for="address">Address</label>
                        <input class="form-control mb-2" type="text" id="address" name="address" placeholder="address">
                        <label for="phone">Phone</label>
                        <input class="form-control mb-2" type="text" id="phone" name="phone" placeholder="phone">
                        <label for="email">Email</label>
                        <input class="form-control mb-2" type="text" id="email" name="email" placeholder="email">

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
                        <th >Address</th>
                        <th >Phone</th>
                        <th >Email</th>
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
            $('#contactTable').DataTable( {
                ajax: {
                    url: '{{route('contact.ajaxtable')}}',
                    dataSrc: 'data'
                },
                columns: [
                    {name: 'address', data: 'address'},
                    {name: 'phone', data: 'phone'},
                    {name: 'email', data: 'email'},
                    {name: 'img', data: 'img'},
                    {name: 'action', data: 'action'}
                ],
            } );
        });
    </script>
@endsection