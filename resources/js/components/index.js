import Vue from 'vue'
import Child from './Child'
import Button from './Button'

// Components that are registered globaly.
;[Child, Button].forEach(Component => {
  Vue.component(Component.name, Component)
})
