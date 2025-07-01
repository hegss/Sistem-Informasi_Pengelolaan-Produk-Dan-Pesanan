const navLink = document.querySelectorAll('.nav-link');

navLink.forEach(items => {
    items.addEventListener('click', () => {
        navLink.forEach(items => {
            if(items.classList.contains('active')) {
                items.classList.remove('active');
            }
        })
        items.classList.add('active');
    })
})

