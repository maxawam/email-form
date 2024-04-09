document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('contactForm');
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(form);
        
        // create object XMLHttpRequest
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'mail_handler.php', true);
        
        // after server response
        xhr.onload = function () {
            if (this.status === 200) {
                // success response
                UIkit.notification({
                    message: 'Email has been sent successfully!',
                    status: 'success',
                    pos: 'top-center',
                    timeout: 5000
                });
            } else {
                // error handling
                UIkit.notification({
                    message: 'Failed to send the email. Please try again.',
                    status: 'danger',
                    pos: 'top-center',
                    timeout: 5000
                });
            }
        };
        
        // form data
        xhr.send(formData);
    });
});
