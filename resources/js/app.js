import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import vuetify from '~/plugins/vuetify'
import Flutterwave from  'flutterwave-vue-v3'

import '~/plugins'
import '~/components'
import 'bootstrap-vue/dist/bootstrap-vue.css'



Vue.config.productionTip = false
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
// Vue.use(Vuetify)
Vue.use(Flutterwave, { publicKey: 'FLWPUBK-ce8ac90c94a06ad5ed51f88edc7ce685-X' } )
window.axios = require('axios');
// Vue.use(Skeleton)

global.$ = global.jQuery = require('jquery');

// require('./plugins/vendor/animsition/animsition.min');
require('./plugins/vendor/slick/slick.min');
require('./plugins/vendor/wow/wow.min');
require('./plugins/vendor/bootstrap-progressbar/bootstrap-progressbar.min');
require('./plugins/vendor/bootstrap-4.1/popper.min');
require('./plugins/vendor/counter-up/jquery.counterup.min');
require('./plugins/vendor/counter-up/jquery.waypoints.min');
require('./plugins/vendor/circle-progress/circle-progress.min');
require('./plugins/vendor/perfect-scrollbar/perfect-scrollbar.min');
require('./plugins/vendor/select2/select2.min');
require('./plugins/vendor/chartjs/Chart.bundle.min');
// require('./main');
/* eslint-disable no-new */
new Vue({
  i18n,
  vuetify,
  store,
  router,
  ...App
})
