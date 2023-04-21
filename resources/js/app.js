import './bootstrap';

import Alpine from 'alpinejs';

Alpine.store('darkMode', {
    dark: localStorage.dark ?? false,
 
    toggle() {
        this.dark = ! this.dark

        if (this.dark) {
            localStorage.dark = true
            document.documentElement.classList.add('dark')
        }
        else {
            localStorage.dark = false
            document.documentElement.classList.remove('dark')
        }
    }

})

if(localStorage.getItem('dark')) {
    document.querySelector('html').classList.add('dark')
}else{
    document.querySelector('html').classList.remove('dark')
}

window.Alpine = Alpine;

Alpine.start();