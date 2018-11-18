import Vue from 'vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon, FontAwesomeLayers } from '@fortawesome/vue-fontawesome'

// fontawesome-free-regular
import {} from '@fortawesome/free-regular-svg-icons'

// fontawesome-free-solid
import { faShoppingCart, faCircle } from '@fortawesome/free-solid-svg-icons'

// fontawesome-free-brands
import { faFacebookF, faTwitter, faLinkedinIn } from '@fortawesome/free-brands-svg-icons'

library.add(faShoppingCart, faCircle, faFacebookF, faTwitter, faLinkedinIn)

Vue.component('fa', FontAwesomeIcon)
Vue.component('faLayers', FontAwesomeLayers)
