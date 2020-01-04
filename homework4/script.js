const formSubmit = (event) => {
    event.preventDefault();

    const formElement = document.querySelector('#form');

    let data = {
        'username': formElement.querySelector('input[name="username"]').value,
        'password': formElement.querySelector('input[name="password"]').value,
        'repeat_password': formElement.querySelector('input[name="repeat_password"]').value,
    };

    fetch('register.php', {
        method: 'POST',
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then(response => {
            formElement.querySelector('input[name="username"]').value = response.username;
        });
}

window.addEventListener('load', () => {
    document.getElementById('form').addEventListener('submit', formSubmit);

    // document.querySelector('#content').addEventListener('click', onClickParent);
});