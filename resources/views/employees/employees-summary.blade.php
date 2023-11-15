<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <a href="{{route('employee.index')}}">Back to Employees</a>
    </div>

    <h2>Employee Summary</h2>

    <div>
        <h3>Count of Male and Female employees</h3>
        <ul>
            @foreach($genderCounts as $genderCount)
                <li>{{$genderCount->gender}}: {{$genderCount->count}}</li>
            @endforeach
        </ul>
    </div>

    <div>
        <h3>Average age of all employees</h3>
        <p>{{$averageAge->average_age}} years</p>
    </div>

    <div>
        <h3>Total monthly salary of all employees</h3>
        <p>${{$totalSalary}}</p>
    </div>
        
</body>
</html>