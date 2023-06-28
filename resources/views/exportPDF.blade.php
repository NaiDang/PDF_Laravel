<!DOCTYPE html>
<html>

<head>
    <title>Export PDF</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <br />
    <div class="container">
        <h1 align="center">Export PDF</h1><br />
 
        <div class="row">
            <div class="col-md-7" align="right">
                <h4> <b>Students Data </b></h4>
            </div>
            <div class="col-md-5" align="right">
                <a href="{{ url('exportPDF/pdf') }}" class="btn btn-primary">Export into PDF</a>
            </div>
        </div>
        <br />
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Birthday</th>
                        <th>Email</th>
                        <th>Phonenumber</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student_data as $student => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->birthday}}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->phonenumber }}</td>
                        <td>{{ $value->address}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>