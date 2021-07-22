<template>
<div>
    
        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7 bg-success" style="height: 100vh !important;">

            <!-- WELCOME-->
            <section class="welcome h-100 overlay" style="">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop4 books shadow-none">
                    <div class="container">
                        <div class="header4-wrap books">
                              <v-btn large color="success" class="bg-white" :to="{ name: 'welcome' }">
                                <v-img src="images/icon/thalogo.png" ></v-img>
                              </v-btn>


                            <!-- <div class="header__logo bg-white rounded btn-lg">
                            <router-link :to="{ name: 'welcome' }" tag="img" src="images/icon/thalogo.png">
                            </router-link>
                            </div> -->
                            <div class="header__tool">
                                <template v-if="authenticated">
                              <div class="account-wrap">
                                <div class="account-item account-item--style2 clearfix js-item-menu">
                                    <div class="image">
                                        <b-skeleton-icon
                                            icon="person-circle"
                                            :icon-props="{ fontScale: 2, variant: 'dark' }"
                                        ></b-skeleton-icon>                                        
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="">{{ user.name }}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                              <b-skeleton-icon
                                                  icon="person-circle"
                                                  :icon-props="{ fontScale: 2, variant: 'dark' }"
                                              ></b-skeleton-icon>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">{{ user.name }}</a>
                                                </h5>
                                                <span class="email">{{ user.email }}</span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <router-link :to="{ name: 'history' }">
                                                    <i class="zmdi zmdi-settings"></i>
                                                    {{ $t('history') }}
                                                </router-link>
                                            </div>
                                            
                                            <div class="account-dropdown__item">
                                                <router-link :to="{ name: 'settings.profile' }">
                                                    <i class="zmdi zmdi-settings"></i>
                                                    {{ $t('settings') }}
                                                </router-link>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                          <a href="#" @click.prevent="logout">
                                            <i class="zmdi zmdi-power"></i>
                                            {{ $t('logout') }}
                                          </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                </template>
                                <template v-else>
                                    <div class="account-wrap mr-3">
                                        <div class="account-item account-item--style2 clearfix">
                                            <div class="">
                                              <v-btn color="white" 
                                              outlined
                                              :to="{ name: 'login' }" 
                                              >
                                                {{ $t('login') }}
                                              </v-btn>
                                                <!-- <router-link :to="{ name: 'login' }" class="btn btn-outline-light">
                                                    {{ $t('login') }}
                                                </router-link> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="account-wrap">
                                        <div class="account-item account-item--style2 clearfix">
                                            <div class="">
                                              <v-btn color="white" 
                                              outlined
                                              :to="{ name: 'register' }" 
                                              >
                                                {{ $t('register') }}
                                              </v-btn>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </template>     
                            </div>
                        </div>
                    </div>
                </header>
                <!-- END HEADER DESKTOP -->
                
                <div class="container-fluid justify-content-center d-flex h-75 align-items-center">

                    <form class="form container-fluid form-group" v-if="universities != ''">
                        <!-- <label for="location" class="h4 text-dash">
                            <i class="zmdi zmdi-pin text-danger"></i>
                            School
                        </label> -->
                        <!-- <select name="school" id="location" class="form-control js-example-basic-single" v-model="key" @change="selectSchool($event)">
                            <option value="">Select your university</option>
                            <option v-for="(university, index) in universities" :key="index" :value="JSON.stringify(university)">{{university.name}}</option>
                        </select> -->


        
                        
        <v-row
        align="center"
        justify="space-around"
        >
    <v-dialog
      v-model="dialog"
      fullscreen
      hide-overlay
    >
      <template v-slot:activator="{ on, attrs }">
          <v-btn
          solo
          rounded
          large
          class="text-capitalize"
          v-bind="attrs"
          v-on="on"
          >
            <v-icon left>
              mdi-google-maps
            </v-icon>          
            Select University
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



          <!-- <v-select
            v-model="key"
            @change="selectSchool($event)"
            :items="universities"
            label="Select University"
            return-object
            solo
            full-width
            chips
            prepend-inner-icon="mdi-google-maps"
          item-text="name"

          >
          </v-select> -->
        </v-row>
                    </form>
                </div>
            </section>
            <!-- END WELCOME-->
    <v-bottom-navigation
      fixed
      horizontal
      class="justify-content-start"
    >
      <v-btn
        color="deep-purple accent-4"
        text
        small
        :to="{name: 'about'}"
      >
        <span>About</span>
      </v-btn>

      <v-btn
        color="deep-purple accent-4"
        text
        small
        :to="{name: 'support'}"
      >
        <span>Help</span>
      </v-btn>

      <v-btn
        color="deep-purple accent-4"
        text
        small
        :to="{name: 'blog'}"
      >
        <span>Blog</span>
      </v-btn>
    </v-bottom-navigation>
            
        </div>

</div>


</template>

<script>
import { mapGetters } from 'vuex'
import '../main'
import store from '~/store'
import Footers from '../components/footer'
// require('../main')

export default {
  layout: 'basic',
  components: {
    Footers
  },

  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({
    title: window.config.appName
  }),
  data() {
      return {
          universities: '',
          key: '',
          dialog: false,
      }
  },
  created() {
    // this.dampings();
    // main.load();
    if(store.getters["school/school"] == null) {
      this.schools();
    } else {
      this.$router.push({name: 'home'})
    }
  },

  computed: mapGetters({
    authenticated: 'auth/check',
    user: 'auth/user',
    school: 'school/school'
  }),
  methods: {
    checkings() {
      // var m = $('.js-item-menu');
      // console.log(m);
        try {
    var menu = $('.js-item-menu');
    var sub_menu_is_showed = -1;
    for (var i = 0; i < menu.length; i++) {
      $(menu[i]).on('click', function (e) {
        e.preventDefault();
        $('.js-right-sidebar').removeClass("show-sidebar");        
        if (jQuery.inArray(this, menu) == sub_menu_is_showed) {
          $(this).toggleClass('show-dropdown');
          sub_menu_is_showed = -1;
        }
        else {
          for (var i = 0; i < menu.length; i++) {
            $(menu[i]).removeClass("show-dropdown");
          }
          $(this).toggleClass('show-dropdown');
          sub_menu_is_showed = jQuery.inArray(this, menu);
        }
      });
    }
    $(".js-item-menu, .js-dropdown").click(function (event) {
      event.stopPropagation();
    });

    $("body,html").on("click", function () {
      for (var i = 0; i < menu.length; i++) {
        menu[i].classList.remove("show-dropdown");
      }
      sub_menu_is_showed = -1;
    });

  } catch (error) {
    console.log(error);
  }

  var wW = $(window).width();
    // Right Sidebar
    var right_sidebar = $('.js-right-sidebar');
    var sidebar_btn = $('.js-sidebar-btn');

    sidebar_btn.on('click', function (e) {
      e.preventDefault();
      for (var i = 0; i < menu.length; i++) {
        menu[i].classList.remove("show-dropdown");
      }
      sub_menu_is_showed = -1;
      right_sidebar.toggleClass("show-sidebar");
    });

    $(".js-right-sidebar, .js-sidebar-btn").click(function (event) {
      event.stopPropagation();
    });

    $("body,html").on("click", function () {
      right_sidebar.removeClass("show-sidebar");

    });



$('#location').select2({
  placeholder: 'Select an option'
});
  // Sublist Sidebar
  try {
    var arrow = $('.js-arrow');
    arrow.each(function () {
      var that = $(this);
      that.on('click', function (e) {
        e.preventDefault();
        that.find(".arrow").toggleClass("up");
        that.toggleClass("open");
        that.parent().find('.js-sub-list').slideToggle("250");
      });
    });

  } catch (error) {
    console.log(error);
  }


  try {
    // Hamburger Menu
    $('.hamburger').on('click', function () {
      $(this).toggleClass('is-active');
      $('.navbar-mobile').slideToggle('500');
    });
    $('.navbar-mobile__list li.has-dropdown > a').on('click', function () {
      var dropdown = $(this).siblings('ul.navbar-mobile__dropdown');
      $(this).toggleClass('active');
      $(dropdown).slideToggle('500');
      return false;
    });
  } catch (error) {
    console.log(error);
  }

  // Scroll Bar
  try {
    var jscr1 = $('.js-scrollbar1');
    if(jscr1[0]) {
      const ps1 = new PerfectScrollbar('.js-scrollbar1');      
    }

    var jscr2 = $('.js-scrollbar2');
    if (jscr2[0]) {
      const ps2 = new PerfectScrollbar('.js-scrollbar2');

    }

  } catch (error) {
    console.log(error);
  }

    },
      schools() {
        axios.post('/api/schools')
            .then((response)=>{
                this.universities = response.data.schools;
            }).catch(err => {
                console.log('error');
            });
      },
      selectSchool(eventer) {
        this.$store.dispatch('school/setSchool', { school: eventer })
        // Redirect to home
        this.$router.push({name: 'home'})
      },
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  },
  mounted() {
    this.checkings();
    
    
  }
}
</script>

<style scoped>
.books {
    background-color: transparent !important;
    z-index: 1 !important;
}
.overlay{
  background: url('/images/bg-01.png') no-repeat bottom center fixed;
  background-size: 500px 500px;
}
</style>
