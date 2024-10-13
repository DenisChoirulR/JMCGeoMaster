<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>City Report</h2>
<table>
    <thead>
    <tr>
        <th>City</th>
        <th>Province</th>
        <th>Total Residents</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cities as $city)
        <tr>
            <td>
                {{ $city->name }}
            </td>
            <td>
                {{ $city->province->name }}
            </td>
            <td>
                {{ $city->residents->count() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
