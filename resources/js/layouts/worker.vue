<template>
    <div class="page-content--bgf7 bg-back" v-if="user.role_id == '3'">
      <naver />
      <v-app>
      <child />
      </v-app>
    </div>
</template>

<script>
import Naver from '~/components/Workernav'
import { mapGetters, Store } from 'vuex'

export default {
  name: 'WorkerLayout',

  components: {
    Naver
  },
  computed: mapGetters({
          user: 'auth/user'
      }),
  created() {
      if (this.user.role_id != '3') {
          return this.$router.go(-1);
      }


  },


}
</script>
