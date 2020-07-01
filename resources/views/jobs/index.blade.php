<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>
<body>
<div class="container mt-5">
    <a href="{{route('jobs.create')}}" class="btn btn-primary float-right">Add New</a>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Current Time(Now)</th>
            <th>Time</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($jobs as $job)
            @php
                date_default_timezone_set('Asia/Kathmandu');
                $timezone = date_default_timezone_get();
            //$end_date = date('Y-m-d h:i:s a', strtotime($job->end_date));
            $end_date = \Carbon\Carbon::parse($job->end_date);
            $now = \Carbon\Carbon::now();
            @endphp
            <tr>
                <td>{{$job->name}}</td>
                <td>{{date('Y-m-d h:i:s a', time())}}</td>
                <td>{{\Carbon\Carbon::parse($job['end_date'])->diffForHumans(null, null, null, 2)}}</td>
                <td>{{date('Y-m-d h:i:s a', strtotime($job->start_date))}}</td>
                <td>{{date('Y-m-d h:i:s a', strtotime($job->end_date))}}</td>
                <td>
                    @if($end_date < $now) Expired @else Active @endif
                </td>
                <td>
                    <a href="{{route('jobs.edit', $job->id)}}" class="btn btn-sm"><i class="fa fa-edit"></i></a>
                    <form action="{{route('jobs.destroy', $job->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm"><i class="fa fa-trash-o" style="color:red;"
                                                                    aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</html>