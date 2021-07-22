// import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader
// import '@mdi/js/mdi.js' // Ensure you are using css-loader
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify)

const opts = {}

export default new Vuetify({
    opts,
    icons: {
        iconfont: 'mdiSvg', // default - only for display purposes
      }
})
