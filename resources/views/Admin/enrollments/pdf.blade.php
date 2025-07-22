<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Enrollments Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 4px; text-align: left; }
    </style>
</head>
<body>
    <h2>Enrollments Report</h2>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Schedule</th>
                <th>Status</th>
                <th>Applied At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enroll)
                <tr>
                    <td>{{ $enroll->user->name }}</td>
                    <td>{{ $enroll->schedule->title }} ({{ $enroll->schedule->date }})</td>
                    <td>{{ ucfirst($enroll->status) }}</td>
                    <td>{{ $enroll->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
