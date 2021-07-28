<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Moul&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Battambang&family=Koulen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css\style.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-free-5.13.0-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('search/css/fuzzycomplete.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('search/js/fuse.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('search/js/fuzzycomplete.min.js')}}" type="text/javascript"></script>
    <title>@yield("title")</title>
</head>
<body>
    @include('include.header')
    @section('body')
    @show
    <script src="{{asset('js/js.js')}}"></script>
    @include('include.footer')
    <script type="text/javascript">
        $(document).ready(function(){
            var items = [];
            let xhr = new XMLHttpRequest();
            xhr.open('get', `${window.origin}/user-search`, true);
            xhr.onload = function () {
                if (xhr.status === 200){
                    let data = JSON.parse(xhr.responseText);
                    if (data.length !== 0){
                        Array.from(data).forEach(function (value, index) {
                            items.push({"activityId":`${value.id}`,"activityTitle":`${value.title}`});
                        });
                        let fuseOptions = { keys: ["activityTitle"] };
                        options = { display: "activityTitle", key: "activityId", fuseOptions: fuseOptions };
                        $("#itemPicker").fuzzyComplete(items, options);
                    }
                }
            };
            xhr.send();
        });
    </script>
    @section('script')
        @show

</body>
</html>