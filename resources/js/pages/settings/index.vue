<template>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <card class="settings-card">
        <v-card-title >
              <v-btn
    icon
    light
    @click="goBack"
    >
      <v-icon>
          mdi-arrow-left
      </v-icon>
    </v-btn>
          {{$t('settings')}}
        </v-card-title>
        <ul class="nav flex-column nav-pills">
          <li v-for="tab in tabs" :key="tab.route" class="nav-item">
            <router-link :to="{ name: tab.route }" class="nav-link" active-class="active">
              <fa :icon="tab.icon" fixed-width />
              {{ tab.name }}
            </router-link>
          </li>
        </ul>
      </card>
    </div>

    <div class="col-md-9">
      <transition name="fade" mode="out-in">
        <router-view />
      </transition>
    </div>
  </div>

</div>
</template>

<script>
export default {
  middleware: 'auth',

  computed: {
    tabs () {
      return [
        {
          icon: 'user',
          name: this.$t('profile'),
          route: 'settings.profile'
        },
        {
          icon: 'lock',
          name: this.$t('password'),
          route: 'settings.password'
        }
      ]
    }
  },
  methods: {
    goBack(){
        return this.$router.go(-1);
    }
  }
}
</script>

<style>
.settings-card .card-body {
  padding: 0;
}
</style>
