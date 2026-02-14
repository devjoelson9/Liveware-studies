import './bootstrap'

//import Alpine from 'alpinejs'
import { Notyf } from 'notyf'

import 'notyf/notyf.min.css'

//window.Alpine = Alpine
//Alpine.start()

window.notyf = new Notyf({
    duration: 3000,
    position: { x: 'right', y: 'top' },
})
