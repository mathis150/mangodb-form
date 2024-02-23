dropdown_buttons = document.querySelectorAll('.dropdown-button');
dropdown_buttons.forEach(function(button) {
    button.addEventListener('click', function() {
        dropdown_menus = document.querySelectorAll('.dropdown-menu');
        dropdown_menus.forEach(function(menu) {
            
            if(menu.id == button.id) {
                if (menu.classList.contains('hidden')) {
                    menu.classList.remove('hidden');
                } else {
                    menu.classList.add('hidden');
                }
            }
        });
    });
});

mobile_menu = document.querySelector('#mobile-control');
mobile_menu.addEventListener('click', function() {
    menu = document.querySelector('#mobile-menu');
    if(menu.classList.contains('hidden')) {
        menu.classList.remove('hidden');
    } else {
        menu.classList.add('hidden');
    }
});