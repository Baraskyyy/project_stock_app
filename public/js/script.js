document.addEventListener('DOMContentLoaded', function() {
    const toggleMenuBtn = document.getElementById('toggleMenuBtn');
    const sidebar = document.querySelector('.clr');

    toggleMenuBtn.addEventListener('click', function() {
        sidebar.classList.toggle('d-none');
    });
});
