document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("form");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        // Clear all previous error messages
        document.querySelectorAll(".error").forEach(error => (error.textContent = ""));

        // Input values
        const name = document.getElementById("fullnameH").value.trim();
        const username = document.getElementById("usernameH").value.trim();
        const email = document.getElementById("emailH").value.trim();
        const phone = document.getElementById("phoneH").value.trim();
        const password = document.getElementById("passwordH").value.trim();
        const confirmPassword = document.getElementById("confirmpasswH").value.trim();

        // Regular expressions
        const namePattern = /^[A-Za-z\s]+$/; // Only alphabets and spaces
        const phonePattern = /^9\d{9}$/; // Must start with 9 and be exactly 10 digits
        const emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/; // Must end with @gmail.com
        const usernamePattern = /^[a-zA-Z0-9_]{4,15}$/; // Alphanumeric & underscores
        const passwordPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[@$!%*?&])[A-Za-z0-9@$!%*?&]{6,16}$/;

        // Validation status
        let isValid = true;

        // Name validation
        if (!namePattern.test(name)) {
            document.getElementById("name-error").textContent =
                "Invalid Name: Only alphabets and spaces are allowed.";
            isValid = false;
        }

        // Username validation
        if (!usernamePattern.test(username)) {
            document.getElementById("username-error").textContent =
                "Invalid Username: Must be 5-16 characters, start with a letter, and can include underscores.";
            isValid = false;
        }

        // Email validation
        if (!emailPattern.test(email)) {
            document.getElementById("email-error").textContent =
                "Invalid Email: Must be a valid Gmail address (e.g., example@gmail.com).";
            isValid = false;
        }

        // Phone validation
        if (!phonePattern.test(phone)) {
            document.getElementById("number-error").textContent =
                "Invalid Phone Number: Must start with 9 and have 10 digits.";
            isValid = false;
        }

        // Password validation
        if (!passwordPattern.test(password)) {
            document.getElementById("password-error").textContent =
                "Invalid Password: Must include uppercase, lowercase, special characters, and 6-16 characters.";
            isValid = false;
        }

        // Confirm password validatioen
        if (password !== confirmPassword) {
            document.getElementById("confirm-password-error").textContent =
                "Passwords do not match.";
            isValid = false;
        }

        // If all validations pass, submit the form
        if (isValid) {
            form.submit();
        }
    });
});
