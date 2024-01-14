/**
 * Toggle authentication modal form visibility.
 */
function authenticate() {
    let modal = document.getElementById('loginModal');
// Toggle the display property
    if (modal.style.display === 'block') {
        modal.style.display = 'none';
    } else {
        modal.style.display = 'block';
    }
}

/**
 * Disconnection and hide modal
 */
function disconnect() {
    window.location.href = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" + '?disconnect=1';
// Optionally hide the modal
    document.getElementById('loginModal').style.display = 'none';
}

function showRegisterForm() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('registerForm').style.display = 'block';
}

function showLoginForm() {
    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('registerForm').style.display = 'none';
}