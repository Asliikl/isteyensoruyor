<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

<div class="card p-4 shadow" style="width: 300px;">
    <h4 class="text-center mb-4">Login Type</h4>
    <a href="{{ route('user.login') }}" class="btn btn-primary mb-2">User Login</a>
    <a href="{{ route('admin.login') }}" class="btn btn-secondary">Admin Login</a>
</div>

</body>
</html>
