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
<h2>Province Report</h2>
<table>
    <thead>
    <tr>
        <th>Province</th>
        <th>Total Residents</th>
    </tr>
    </thead>
    <tbody>
    @foreach($provinces as $province)
        <tr>
            <td>
                {{ $province->name }}
            </td>
            <td>
                {{ $province->residents->count() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
