

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees Hierarchy</title>
</head>
<body>


  
    <ul>
    @foreach ($employees as $employee)
        <li>{{ $employee->name }}</li>
        @if ($employee->subordinates->count())
            @include('employees', ['employees' => $employee->subordinates])
        @endif
    @endforeach
</ul>
</body>
</html>
