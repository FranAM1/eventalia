import './bootstrap';

import Alpine from 'alpinejs';

Alpine.store('darkMode', {
    dark: localStorage.getItem('darkMode') ? JSON.parse(localStorage.getItem('darkMode')) : false,
 
    toggle() {
        this.dark = ! this.dark

        if (this.dark) {
            document.documentElement.classList.add('dark')
            localStorage.setItem('darkMode', true)
        }
        else {
            document.documentElement.classList.remove('dark')
            localStorage.setItem('darkMode', false)
        }
    }

})

if (Alpine.store('darkMode').dark) {
    document.documentElement.classList.add('dark')
}
else {
    document.documentElement.classList.remove('dark')
}

window.Alpine = Alpine;

Alpine.start();