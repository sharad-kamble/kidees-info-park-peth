<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>CRUD Operation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">CRUD Operation</h2>

        <form action="adddata.php" method="GET" onsubmit="return validateForm()">
            <div class="row g-3">

                <div class="col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="user" placeholder="Enter username"
                        required>
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="pass" placeholder="Enter password"
                        required>
                </div>

                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>

                <div class="col-md-6">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="sub" placeholder="Enter subject"
                        required>
                </div>

                <div class="col-md-6">
                    <label for="company" class="form-label">Company</label>
                    <input type="text" class="form-control" id="company" name="company" placeholder="Enter company name"
                        required>
                </div>

                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number"
                        required>
                </div>

                <div class="col-12">
                    <label for="message" class="form-label">Enter your message</label>
                    <textarea class="form-control" id="message" name="message" rows="5"
                        placeholder="Write something here..." required></textarea>
                </div>
            </div>

            <div class="mt-4">
                <input type="submit" class="btn btn-primary" value="Insert Data">
                <a href="viewdata.php" class="btn btn-secondary">View Data</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function validateForm() {
            let username = document.getElementById('username').value;
            let password = document.getElementById('password').value;
            let name = document.getElementById('name').value;
            let email = document.getElementById('email').value;
            let subject = document.getElementById('subject').value;
            let company = document.getElementById('company').value;
            let phone = document.getElementById('phone').value;
            let message = document.getElementById('message').value;

            // Validate if all fields are filled
            if (username === "" || password === "" || name === "" || email === "" || subject === "" || company === "" ||
                phone === "" || message === "") {
                alert("Please fill out all the required fields.");
                return false; // Prevent form submission
            }

            // Validate username (at least 3 characters)
            if (username.length < 3) {
                alert("Username must be at least 3 characters long.");
                return false;
            }

            // Validate password (at least 6 characters)
            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            }

            // Validate email using regular expression
            let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Validate phone (only numbers, exactly 10 digits)
            let phonePattern = /^[0-9]{10}$/;
            if (!phonePattern.test(phone)) {
                alert("Please enter a valid 10-digit phone number.");
                return false;
            }

            // Validate message length (at least 10 characters)
            if (message.length < 10) {
                alert("Message must be at least 10 characters long.");
                return false;
            }

            // Validate subject (at least 3 characters)
            if (subject.length < 3) {
                alert("Subject must be at least 3 characters long.");
                return false;
            }

            // Validate company (at least 2 characters)
            if (company.length < 2) {
                alert("Company name must be at least 2 characters long.");
                return false;
            }

            // Validate name (at least 3 characters)
            if (name.length < 3) {
                alert("Name must be at least 3 characters long.");
                return false;
            }

            // If all validations pass, submit the form
            return true;
        }
    </script>
</body>

</html>