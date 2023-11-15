<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Employee Information</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <div>
        <a href="{{route('employee.index')}}">Back to Employees</a>
    </div>
    <form method="post" action="{{route('employee.update', ['employee' => $employee])}}">
        @csrf
        @method('put')
        <div>
            <label for="">First Name: </label>
            <input type="text" name="firstname" placeholder="" value="{{$employee->firstname}}"/>
        </div>
        <div>
            <label for="">Last Name: </label>
            <input type="text" name="lastname" placeholder="" value="{{$employee->lastname}}"/>
        </div>
        <div>
            <label for="">Gender: </label>
            <input type="text" name="gender" placeholder="" value="{{$employee->gender}}"/>
        </div>
        <div>
            <label for="">Birthday: </label>
            <input type="date" name="birthday" placeholder="" value="{{$employee->birthday}}"/>
        </div>
        <div>
            <label for="">Monthly Salary: </label>
            <input type="number" step="0.01" name="monthly_salary" placeholder="" value="{{$employee->monthly_salary}}"/>
        </div>
        <div>
            <input type="submit" value="Update Employee Information"/>
        </div>
    </form>
</body>
</html>