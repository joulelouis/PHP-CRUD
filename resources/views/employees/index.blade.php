<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div>
            <a href="{{route('dashboard')}}">Back to Dashboard</a>
        </div>
    <h1>Employees</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{route('employee.create')}}">Create Employee Information</a>
        </div>
        <div>
            <a href="{{route('employee.summary')}}">View Employee Summary</a>
        </div>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Monthly Salary</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->firstname}}</td>
                    <td>{{$employee->lastname}}</td>
                    <td>{{$employee->gender}}</td>
                    <td>{{$employee->birthday}}</td>
                    <td>{{$employee->monthly_salary}}</td>
                    <td>
                        <a href="{{route('employee.edit', ['employee' => $employee])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('employee.destroy', ['employee' => $employee])}}">
                            @csrf 
                            @method('delete')
                            <input type="submit" value="Delete"/>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

</body>
</html>