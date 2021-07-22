<template>
    <div>
  <!-- <v-bottom-navigation
    :value="value"
    color="primary"
    grow
    absolute
  >
    <v-btn active-class="active" :to="{ name: 'home' }">
      <span>Home</span>

      <v-icon>mdi-home</v-icon>
    </v-btn>
    <v-btn active-class="active" :to="{ name: 'cart' }">
      <span>Cart</span>

      <v-icon>mdi-cart</v-icon>
    </v-btn>

    <v-btn>
      <span>Favorites</span>

      <v-icon>mdi-heart</v-icon>
    </v-btn>

    <v-btn>
      <span>Nearby</span>

      <v-icon>mdi-dashboard</v-icon>
    </v-btn>
  </v-bottom-navigation> -->

<div class="bg-white row shadow fixed-bottom">
  <b-button-group class="col-12 pt-0">
    <template v-if="this.school != null">
      <router-link active-class="active" :to="{ name: 'home' }" tag="button" class="btn col btn-white btn-sm text-muted">
        <i class="zmdi zmdi-home zmdi-hc-lg"></i>
        <br>
        Home

      </router-link>
      <router-link active-class="active" :to="{ name: 'cart' }" tag="button" class="btn col btn-white btn-sm text-muted">
        <i class="zmdi zmdi-shopping-cart zmdi-hc-lg"></i>
        <sup class="rounded-circle badge bg-dash" v-if="$store.state.cart.cart.length > 0">{{$store.state.cart.cart.length}}</sup>
        <br>

        Cart

      </router-link>
      
      <router-link active-class="active" :to="{ name: 'orders' }" tag="button" class="btn col btn-white btn-sm text-muted">
        <i class="fa fa-gift fa-lg"></i>
        <template v-if="authenticated">
          <sup class="rounded-circle badge bg-dash" v-if="requests.length > 0">{{requests.length}}</sup>
        </template>
        <br>
        Orders
      </router-link>
    </template>
    <template v-else>
      <router-link active-class="active" :to="{ name: 'welcome' }" tag="button" class="btn col btn-white btn-sm text-muted">
        <i class="zmdi zmdi-home zmdi-hc-lg"></i>
        <br>
        Home

      </router-link>
    </template>
      <router-link active-class="active" :to="{ name: 'profile' }" tag="button" class="btn col btn-white btn-sm text-muted">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
        <br>
        Profile

      </router-link>
  </b-button-group>
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
          toggle: '',
          dialog: false,
          requests: '',
          value: 1,
      }
  },

  computed: mapGetters({
    user: 'auth/user',
    authenticated: 'auth/check',
    school: 'school/school'
  }),
  created() {
    
    if (this.authenticated) {
      this.findRequests();
    }
  },

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    },
    findRequests() {
        // var id
        if (this.authenticated) {
        axios.post('/api/requests/')
            .then((response)=>{
                this.requests = response.data.resquest;
            }).catch(err => {
                alert('Please Reload')
            });
        }
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
