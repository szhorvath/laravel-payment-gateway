import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import App from '~/components/App'

import '~/plugins'
import '~/components'
import '~/filters'

Vue.config.productionTip = false

new Vue({
  // eslint-disable-line no-new
  store,
  router,
  ...App
})
