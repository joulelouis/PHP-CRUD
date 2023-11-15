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
    <h1>Create Employee Information</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    
    <form method="post" action="{{route('employee.store')}}">
        @csrf
        @method('post')
        <div>
            <label for="">First Name: </label>
            <input type="text" name="firstname" placeholder=""/>
        </div>
        <div>
            <label for="">Last Name: </label>
            <input type="text" name="lastname" placeholder=""/>
        </div>
        <div>
            <label for="">Gender</label>
            <input type="radio" name="gender" value="male" placeholder=""/>Male
            <input type="radio" name="gender" value="female" placeholder=""/>Female
            <input type="radio" name="gender" value="N/A" placeholder=""/>Prefer not to disclose

        </div>
        <div>
            <label for="">Birthday: </label>
            <input type="date" name="birthday" placeholder=""/>
        </div>
        <div>
            <label for="">Monthly Salary: </label>
            <input type="number" step="0.01" name="monthly_salary" placeholder=""/>
        </div>
        <div>
            <input type="submit" value="Add new Employee"/>
        </div>
    </form>
</body>
</html>