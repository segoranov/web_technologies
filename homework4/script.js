
const submitFormIfValid = (event) => {
    event.preventDefault();

    if (validateForm()) {
        let data = {
            'username': document.forms["form"]["username"].value,
            'password': document.forms["form"]["password"].value,
            'repeat_password': document.forms["form"]["repeat_password"].value,
        };

        fetch('register.php', {
            method: 'POST',
            body: JSON.stringify(data),
        });
    }
}

function validateForm() {
    var username = document.forms["form"]["username"].value;
    var password = document.forms["form"]["password"].value;
    var repeat_password = document.forms["form"]["repeat_password"].value;

    // TODO: 1 more validation for username
    if (username.length < 3 || username.length > 10) {
        document.getElementById('error_username').innerHTML = "Username length should be between 3 and 10 symbols";
        return false;
    } else {
        document.getElementById('error_username').innerHTML = "OK";
    }

    if (password.length < 6) {
        document.getElementById('error_password').innerHTML = "Password must contain at least 6 symbols";
    } else {
        document.getElementById('error_password').innerHTML = "OK";
    }

    if (!/\d/.test(password) || !/[a-z]/.test(password) || !/[A-Z]/.test(password)) {
        document.getElementById('error_password').innerHTML
            = "Password must contain at least one digit, upper case letter and lower case letter";
        return false;
    } else {
        document.getElementById('error_password').innerHTML = "OK";
    }

    if (repeat_password != password) {
        document.getElementById('error_repeat_password').innerHTML = "Passwords do not match";
        return false;
    } else {
        document.getElementById('error_repeat_password').innerHTML = "OK";
    }


    return true;
}

window.addEventListener('load', () => {
    document.getElementById('form').addEventListener('submit', submitFormIfValid);
});