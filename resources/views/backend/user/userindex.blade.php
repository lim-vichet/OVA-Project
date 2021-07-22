@extends('backend.master.masterpage')

@section('title', 'Partner')

@section('style')
    <style>
        /*.box{*/
        /*    width: 800px;*/
        /*    height: 800px;*/
        /*    background-color: red;*/
        /*}*/
    </style>
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-4 offset-4" style="background-color: #2B81AF; margin-bottom: 20px; padding: 30px; color: black; border-radius: 10px;">
                <form action="#" id="frmUser" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <label for="id">ID</label>
                        <input class="form-control mb-2" type="text" id="id" name="id" readonly>
                        <label for="name">User Name</label>
                        <input class="form-control mb-2" type="text" id="name" name="name" placeholder="user name">
                        <label for="name">E-Mail</label>
                        <input class="form-control mb-2" type="text" id="email" name="email" placeholder="email">
                        <label for="name">Password</label>
                        <input class="form-control mb-2" type="text" id="password" name="password" placeholder="password">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="img" accept=".png,.jpg,.jpeg" name="img">
                        <div class="col-xl-12 p-0">
                            <input type="button" id="btnSave" class="btn btn-primary mt-2" value="Save" style="background-color: greenyellow; color: black">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-12">
                <table id="userTable" class="table table-bordered table-striped" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Password</th>
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('backend/js/user/user.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#userTable').DataTable( {
                ajax: {
                    url: '{{route('user.ajaxtable')}}',
                    dataSrc: 'data'
                },
                columns: [
                    {name: 'id', data: 'id'},
                    {name: 'name', data: 'name'},
                    {name: 'email', data: 'email'},
                    {name: 'password', data: 'password'},
                    {name: 'img', data: 'img'},
                    {name: 'action', data: 'action'}
                ],
            } );
        });
    </script>
@endsection