<template>
    <div>
    <v-app-bar
      color="white"
      elevation="3"
      fixed
    >
    <v-btn
    icon
    @click="goBack"
    >
      <v-icon>
          mdi-chevron-left
      </v-icon>
    </v-btn>
    <v-spacer></v-spacer>
      <v-toolbar-title
      >More
      </v-toolbar-title>
      <v-spacer></v-spacer>
          <v-btn
    icon
    >
    </v-btn>

    </v-app-bar>
  <v-card
    class="mt-12"
    flat
  >
  <div class="account2 border-0">
    <v-icon
    x-large
    >mdi-delete-empty-outline</v-icon>
      <p class="display-6"></p>
      <a @click="goBack()" class="btn btn-link">Go back</a>
  </div>
  </v-card>


    </div>
</template>

<script>
import { mapGetters, Store } from 'vuex'
import Cookies from 'js-cookie'

export default {
  layout: 'basic',
  data() {
      return {
          loading: false,
          loadingTime: 0,
          maxLoadingTime: 3,
      }
  },
  metaInfo () {
    return { title: this.$t('mart')}
  },
  methods: {
    goBack(){
        return this.$router.go(-1);
    }            
  },

}
</script>

<style>
    @media screen and (max-width: 760px) {
        #sidebar-right {width: 100% !important;}
    }
</style>
