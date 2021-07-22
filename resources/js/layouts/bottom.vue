<template>
    <div class="page-content--bgf7 bg-back">
      <naver />
      <v-app>
      <child />
      </v-app>
    </div>
</template>

<script>
import Naver from '~/components/BottomNav'

export default {
  name: 'BottomLayout',
    methods: {
        userUnregistered(registration) {
          const user = this.users.find(user => {
              return user.id == registration.userId;
          });
          user.registered = false;
          this.registrations.splice(this.registrations.indexOf(registration), 1);
        }
    },

  components: {
    Naver
  }
}
</script>
