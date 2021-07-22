<template>
    <div>
        
    <v-app-bar
      color="white"
      light
      fixed
    >
      <v-toolbar-title>Title</v-toolbar-title>
      <v-spacer></v-spacer>

        <v-select
            v-model="key"
            @change="selectSchool($event)"
            :items="universities"
            return-object
            solo
            prepend-inner-icon="mdi-google-maps"
            item-text="nickname"
        >
        </v-select>

    </v-app-bar>
        </template>
<div class="bg-white row shadow fixed-bottom">
  <b-button-group class="col-12">
      <router-link active-class="active" :to="{ name: 'welcome' }" tag="button" class="btn btn-white btn-sm text-muted">
        <i class="zmdi zmdi-home zmdi-hc-lg"></i>
        <br>
        Home

      </router-link>
      <router-link active-class="active" :to="{ name: 'cart' }" tag="button" class="btn btn-white btn-sm text-muted">
        <i class="zmdi zmdi-shopping-cart zmdi-hc-lg"></i>
        <br>

        Cart

      </router-link>
      
      <router-link :to="{ name: 'welcome' }" tag="button" class="btn btn-white btn-sm text-muted">
        <i class="fa fa-gift fa-lg"></i>
        <br>
        Orders
      </router-link>

      <router-link active-class="active" :to="{ name: 'profile' }" tag="button" class="btn btn-white btn-sm text-muted">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
        <br>
        Profile

      </router-link>
  </b-button-group>
</div>
        <div class="btn btn-block btn-danger text-justify py-2" v-if="toggle == 1">
            <h6 class="text-white">Sorry, we are currently closed at the moment.</h6>
            <p>Note: Our services starts by 9:00a.m daily</p>
        </div>
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
          toggle: ''
      }
  },

  computed: mapGetters({
    user: 'auth/user',
    school: 'school/school'
  }),
  updated() {
        console.log(this.key);
  },
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

    checkings() {
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
    goBack(){
        return this.$router.go(-1);
        Cookies.remove('stored_order');

    },
    selectSchool(event) {
        // this.$store.dispatch('school/setSchool', { school: JSON.stringify(this.key) })
        
        // Redirect to home
        // location.reload(true)
    }
  },

  mounted() {
    this.checkings();
  }
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
