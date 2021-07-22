<template>
<div>
      <v-app-bar
      class="bg-white"
      light
      fixed
    >
      <v-toolbar-title >Djinpod</v-toolbar-title>
      <v-spacer></v-spacer>
    <v-dialog
      v-model="dialog"
      fullscreen
      hide-overlay
      style="z-index: -2;"
    >
      <template v-slot:activator="{ on, attrs }">
          <v-btn
          solo
          large
          class="text-capitalize bg-white"
          v-bind="attrs"
          v-on="on"
          >
            <v-icon left class="text-dash">
              mdi-google-maps
            </v-icon>          
            {{key.nickname}}
          </v-btn>


      </template>
      <v-card>
        <v-toolbar
          light
          flat
          color="white"
        >
          <v-btn
            icon
            light
            @click="dialog = false"
          >
            <v-icon>mdi-close</v-icon>
          </v-btn>

        </v-toolbar>
        <v-list
          three-line
          subheader
        >
          <v-subheader>
            <div v-for="(university, index) in universities" :key="index">
              <v-chip
              @click="selectSchool(JSON.stringify(university))"
              >
              {{university.name}}

              </v-chip>

            </div>
            <div>
              <v-chip
              >
              Bowen University

              </v-chip>

            </div>            
          </v-subheader>
        </v-list>
      </v-card>
    </v-dialog>
    </v-app-bar>

</div>
</template>

<script>
import { mapGetters, Store } from 'vuex'
import LocaleDropdown from './LocaleDropdown'
import LocaleDropdownHead from './LocaleDropdownHead'
import Cookies from 'js-cookie'


export default {
  components: {
    LocaleDropdown,
    LocaleDropdownHead,
    // carts
  },

  data: () => ({
    appName: window.config.appName
  }),
  data(){
      return {
          key: '',
          universities: '',
          toggle: '',
          dialog: false,
      }
  },

  computed: mapGetters({
    user: 'auth/user',
    school: 'school/school'
  }),
  created() {
    this.key = JSON.parse(this.school)
    this.schooler();
  },

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    },
    schooler() {
      axios.post('/api/schools')
          .then((response)=>{
              this.universities = response.data.schools;
              this.toggle = response.data.toggle.toggle;
          }).catch(err => {
              console.log('error');
          });
    },
    goBack(){
        return this.$router.go(-1);

    },
    selectSchool(event) {
        // this.$store.dispatch('school/setSchool', { school: JSON.stringify(this.key) })
        
        // Redirect to home
        // location.reload(true)
    }
  },

}
</script>

<style>
@media screen and (max-width: 760px) {
    #sidebar-right {width: 100% !important;}
}
.btn-white.active {
    border-top: 3px solid green;
    color: green !important;
    
}
</style>
