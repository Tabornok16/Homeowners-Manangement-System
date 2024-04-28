<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Role Selection</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }

    form {
        text-align: center;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-size: 18px;
    }

    select {
        margin-bottom: 20px;
        font-size: 16px;
        padding: 8px;
        border-radius: 5px;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Choose Your Role</h1>
        <form id="loginForm" method="post" onsubmit="return submitForm()">
            <label for="role">Select Role:</label>
            <select id="role" name="role" required>
                <option value="">Select</option>
                <option value="1">Admin</option>
                <option value="2">Staff</option>
                <option value="3">Homeowner</option>
            </select><br><br>
            <button type="submit">Proceed</button>
        </form>
    </div>
</body>
<script>
    function submitForm() {
        var role = document.getElementById('role').value;
        if (role === '1' || role === '2') {
            document.getElementById('loginForm').action = 'login.php';
        } else if (role === '3') {
            document.getElementById('loginForm').action = 'login-homeowner.php';
        } else {
            document.getElementById('loginForm').action = 'choose.role.php';
        }
        return true; // Allow the form to submit
    }
</script>
</html>
