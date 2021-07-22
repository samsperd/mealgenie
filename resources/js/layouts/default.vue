<template>
  <div class=" bg-white">
    <navbar />
      <v-main>
      <child />
      </v-main>
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'

export default {
  name: 'MainLayout',
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
    Navbar
  }
}
</script>
