<template>
    <div>
        
        <template v-if="user">
            
            <!-- HEADER DESKTOP-->
            <header class="header-desktop3 d-none d-lg-block bg-white">
                <div class="section__content section__content--p35">
                    <div class="header3-wrap">
                        <div class="header__logo">
                        <router-link :to="{ name: 'welcome' }" tag="img" src="/images/icon/potential-logo6.png">
                        </router-link>
                        </div>
                        <div class="header__navbar">
                            <ul class="list-unstyled">
                            <locale-dropdown-head />
                                <li>
                                    <a href="#">
                                        <i class="fas fa-shopping-basket"></i>
                                        <span class="bot-line"></span>Vendors</a>
                                </li>
                                <li>
                                    <a href="table.html">
                                        <i class="fas fa-trophy"></i>
                                        <span class="bot-line"></span>Support</a>
                                </li>
                                <li>
                                    <a href="table.html">
                                        <i class="fas fa-trophy"></i>
                                        <span class="bot-line"></span>Blog</a>
                                </li>
                            </ul>
                        </div>
                        <div class="header__tool">
                              <div class="account-wrap">
                                <div class="account-item account-item--style2 clearfix js-item-menu">
                                    <div class="image p-2">
                                        <b-skeleton-icon
                                            icon="person-circle"
                                            :icon-props="{ fontScale: 2, variant: 'dark' }"
                                        ></b-skeleton-icon>
                                        <!-- <img :src="user.photo_url" :alt="user.name" /> -->
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="">{{ user.name }}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image p-3">
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
                                                    <i class="zmdi zmdi-storage"></i>
                                                    {{ $t('History') }}
                                                </router-link>
                                            </div>
                                            
                                            <div class="account-dropdown__item">
                                                <router-link :to="{ name: 'settings.profile' }">
                                                    <i class="zmdi zmdi-settings"></i>
                                                    {{ $t('settings') }}
                                                </router-link>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-money-box"></i>Billing</a>
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
                        </div>
                    </div>
                </div>
            </header>
        <div class="sub-header-mobile-2 d-none d-lg-block p-0 border-bottom bg-dray">

            <div class="header__tool align-items-start justify-content-start p-0">
                <div class="header-button-item p-0">
                    <button type="button" @click="goBack" class="btn btn-light">
                        <i class="zmdi zmdi-chevron-left zmdi-hc-2x"></i> 
                    </button>
    
                </div> 
<small>{{counter}}</small>
                
                <div class="header-button-item" style="right: 0 !important; position: absolute;">
                    <div class="content" v-if="school != null">
                        <select name="school" id="location" class="form-control" v-model="key" @change="selectSchool($event)">
                            <option value="">Select your university</option>
                            <option v-for="(university, index) in universities" :key="index" :value="JSON.stringify(university)">{{university.name}}</option>
                        </select>

                         
                    </div>    
                </div>                                
                
            </div>
        </div>
            <!-- END HEADER DESKTOP-->
        
            <!-- HEADER MOBILE-->
            <header class="header-mobile header-mobile-2 d-block d-lg-none bg-white">
                <div class="header-mobile__bar">
                    <div class="container-fluid">
                        <div class="header-mobile-inner justify-content-start">
                            <button class="hamburger hamburger--slider" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                            <span style="left: 0 !important;">
                        <router-link :to="{ name: 'welcome' }" class="logo" tag="img" src="/images/icon/potential-logo6.png">
                            <!-- {{ appName }} -->
                            <!-- <img src="images/icon/potential-logo6.png" height="52" width="178" alt="{{ appName }}" /> -->
                        </router-link>
                            </span>
                            <div class="header__tool">
                              <div class="account-wrap">
                                <div class="account-item account-item--style2 clearfix js-item-menu">
                                    <div class="image p-2">
                                        <b-skeleton-icon
                                            icon="person-circle"
                                            :icon-props="{ fontScale: 2, variant: 'dark' }"
                                        ></b-skeleton-icon>                                        
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image p-3">
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
                                                <a href="#">
                                                    <i class="zmdi zmdi-account"></i>Account</a>
                                            </div>
                                            
                                            <div class="account-dropdown__item">
                                                <router-link :to="{ name: 'settings.profile' }">
                                                    <i class="zmdi zmdi-settings"></i>
                                                    {{ $t('settings') }}
                                                </router-link>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-money-box"></i>Billing</a>
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



                            </div>
        

                        </div>
                    </div>
                </div>
                <nav class="navbar-mobile">
                    <div class="container-fluid">
                        <ul class="navbar-mobile__list list-unstyled">
                            <locale-dropdown />
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="index.html">Dashboard 1</a>
                                    </li>
                                    <li>
                                        <a href="index2.html">Dashboard 2</a>
                                    </li>
                                    <li>
                                        <a href="index3.html">Dashboard 3</a>
                                    </li>
                                    <li>
                                        <a href="index4.html">Dashboard 4</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="chart.html">
                                    <i class="fas fa-chart-bar"></i>Charts</a>
                            </li>
                            <li>
                                <a href="table.html">
                                    <i class="fas fa-table"></i>Tables</a>
                            </li>
                            <li>
                                <a href="form.html">
                                    <i class="far fa-check-square"></i>Forms</a>
                            </li>
                            <li>
                                <a href="calendar.html">
                                    <i class="fas fa-calendar-alt"></i>Calendar</a>
                            </li>
                            <li>
                                <a href="map.html">
                                    <i class="fas fa-map-marker-alt"></i>Maps</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Pages</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="login.html">Login</a>
                                    </li>
                                    <li>
                                        <a href="register.html">Register</a>
                                    </li>
                                    <li>
                                        <a href="forget-pass.html">Forget Password</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-desktop"></i>UI Elements</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="button.html">Button</a>
                                    </li>
                                    <li>
                                        <a href="badge.html">Badges</a>
                                    </li>
                                    <li>
                                        <a href="tab.html">Tabs</a>
                                    </li>
                                    <li>
                                        <a href="card.html">Cards</a>
                                    </li>
                                    <li>
                                        <a href="alert.html">Alerts</a>
                                    </li>
                                    <li>
                                        <a href="progress-bar.html">Progress Bars</a>
                                    </li>
                                    <li>
                                        <a href="modal.html">Modals</a>
                                    </li>
                                    <li>
                                        <a href="switch.html">Switchs</a>
                                    </li>
                                    <li>
                                        <a href="grid.html">Grids</a>
                                    </li>
                                    <li>
                                        <a href="fontawesome.html">Fontawesome Icon</a>
                                    </li>
                                    <li>
                                        <a href="typo.html">Typography</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
        <!-- Mobile Subheader -->
        <div class="sub-header-mobile-2 d-block d-lg-none pl-0 pr-0">

            <div class="header__tool align-items-start justify-content-start">
                <div class="header-button-item">
                    <button type="button" @click="goBack" class="btn btn-light">
                        <i class="zmdi zmdi-chevron-left zmdi-hc-lg"></i> 
                    </button>
    
                </div> 

                <div class="header-button-item">
                    <div class="content" v-if="school != null">
                        <select name="school" id="location" class="form-control" v-model="key" @change="selectSchool($event)">
                            <option v-for="(university, index) in universities" :key="index" :value="JSON.stringify(university)">{{university.name}}</option>
                        </select>

                         
                    </div>    
                </div>                
                <div class="header-button-item btn btn-light js-item-menu">
                    <i class="zmdi zmdi-search"></i>
                    <div class="search-dropdown js-dropdown">
                        <form action="">
                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                            <span class="search-dropdown__icon">
                                <i class="zmdi zmdi-search"></i>
                            </span>
                        </form>
                    </div>
                </div>
                
                
                
            </div>
        </div>
            
            <!-- END HEADER MOBILE -->
            
        </template>
        <template v-else>
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block bg-white">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <router-link :to="{ name: 'welcome' }" tag="img" src="/images/icon/potential-logo6.png">
                        </router-link>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <locale-dropdown-head />

                            <li>
                                <a href="#">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span class="bot-line"></span>Restaurants</a>
                            </li>
                            <li>
                                <a href="table.html">
                                    <i class="fas fa-trophy"></i>
                                    <span class="bot-line"></span>Support</a>
                            </li>
                            <li>
                                <a href="table.html">
                                    <i class="fas fa-trophy"></i>
                                    <span class="bot-line"></span>Blog</a>
                            </li>
                        </ul>
                    </div>
                    <div class="header__tool">
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix">
                                <div class="">
                                    <router-link :to="{ name: 'login' }" class="btn btn-lg btn-success">
                                        {{ $t('login') }}
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="sub-header-mobile-2 d-none d-lg-block p-0 border-bottom bg-dray">

            <div class="header__tool align-items-start justify-content-start p-0">
                <div class="header-button-item p-0">
                    <button type="button" @click="goBack" class="btn btn-light">
                        <i class="zmdi zmdi-chevron-left zmdi-hc-2x"></i> 
                    </button>
    
                </div> 

                <div class="header-button-item" style="right: 0 !important; position: absolute;">
                    <div class="content" v-if="school != null">
                        <select name="school" id="location" class="form-control" v-model="key" @change="selectSchool($event)">
                            <option value="">Select your university</option>
                            <option v-for="(university, index) in universities" :key="index" :value="JSON.stringify(university)">{{university.name}}</option>
                        </select>

                         
                    </div>    
                </div>                                
                
            </div>
        </div>
    
        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none bg-white shadow">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner justify-content-start">
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                        <span style="left: 0 !important;">
                            <router-link :to="{ name: 'welcome' }" class="logo" tag="img" src="/images/icon/potential-logo11.png">
                            </router-link>

                        </span>
                        <div class="header__tool">
                            <div class="account-wrap" style="position: absolute; right: 0 !important;">
                                <div class="account-item account-item--style2 clearfix">
                                    <div class="">
                                        <router-link :to="{ name: 'login' }" class="btn btn-lg btn-light">
                                            Sign in
                                        </router-link>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Mobile Subheader -->
        <div class="sub-header-mobile-2 d-block d-lg-none pl-0 pr-0">

            <div class="header__tool align-items-start justify-content-start">
                <div class="header-button-item">
                    <button type="button" @click="goBack" class="btn btn-light">
                        <i class="zmdi zmdi-chevron-left zmdi-hc-lg"></i> 
                    </button>
    
                </div> 

                <div class="header-button-item">
                    <div class="content" v-if="school != null">
                        <select name="school" id="location" class="form-control" v-model="key" @change="selectSchool($event)">
                            <option v-for="(university, index) in universities" :key="index" :value="JSON.stringify(university)">{{university.name}}</option>
                        </select>

                         
                    </div>    
                </div>                
                <div class="header-button-item btn btn-light js-item-menu">
                    <i class="zmdi zmdi-search"></i>
                    <div class="search-dropdown js-dropdown">
                        <form action="">
                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                            <span class="search-dropdown__icon">
                                <i class="zmdi zmdi-search"></i>
                            </span>
                        </form>
                    </div>
                </div>
                
                
                
            </div>
        </div>
        <!-- END HEADER MOBILE -->
        </template>
        <!-- <carts /> -->
        <!-- {{ $store.getters['cart/cart']}} -->
        <!-- <b-sidebar id="sidebar-right" backdrop-variant="white" backdrop no-header right shadow>
        <template #default="{ hide }">
            <div class="d-flex text-light px-4 py-2 bg-dash">
                <h3 id="sidebar-no-header-title" class="text-white">Cart</h3>
                <b-button variant="none" class="text-danger" style="position: absolute; right: 10% !important;" size="sm" @click="hide">
                    <i class="fa fa-close"></i>
                </b-button>
            </div>
        <div class="px-3 py-2">
            <div class="account2" style="color: #f1f1f1;" v-if="cart == null">
                <i class="zmdi zmdi-shopping-cart zmdi-hc-5x"></i>
                <p class="display-6">Cart is Empty</p>
            </div>
            <div v-else>
                <div v-for="(item, indice) in cart" :key="indice" class="">
                    <div class="col-12 p-0 border-0 clearfix"><dt class="float-left"><small class="btn" @click="removal(indice)"><i class="zmdi zmdi-close-circle text-danger"></i></small>{{ item.name }}</dt> <dt class="float-right pt-1"><small>{{ item.quantity }} x</small> &#8358;{{ item.subtotal }}</dt></div>
                        <table class="table table-borderless">
                            <tr v-for="(addon, keysd) in item.addons" :key="keysd" class="font-italic text-muted text-right">
                                <td class="py-1 text-justify">+{{ addon.name }}</td>
                                <td class="py-1" v-if="addon.price > 0">&#8358;{{ addon.price }}</td>
                            </tr>
                        </table>
                    <small><b class="text-dark">{{item.pack.name}} &#8358;{{item.pack.price}}</b> x {{item.quantity}}</small>
                    <h6 class="p-1">Cost: <b class="text-success float-right">&#8358;{{item.price}}</b></h6>
                    <hr>
                </div>
                <div class="shadow py-1 px-2 bg-dash">
                    <h5 class="text-white">Overall Total: <b class="float-right">&#8358;{{tots}}</b></h5>
                </div>
                <div class="justify-content-end align-items-end d-flex my-3">
                    <b-button variant="outline-success" class="font-weight-bold" v-b-modal.modal-locate>Proceed</b-button>
                    <b-modal id="modal-locate"  centered title="Please enter your location" footer-class="border-top-0">
                        <form class="mt-1">
                            <input class="form-control" type="text" name="locateme" id="locateme" placeholder="Enter your location">
                        </form>
                        <template #modal-footer="{ ok }">
                            <b-button size="sm" class="text-white" variant="warning" @click="ok()">
                                Checkout
                            </b-button>
                        </template>                        
                    </b-modal>
                </div>
            </div>           
            <hr>
            <div class="container">
                <div class="row form-group">
                    <div class="col col-md-12">
                        <div class="input-group">
                            <input type="email" id="input2-group2" name="input2-group2" placeholder="coupon code" class="form-control form-control-sm">
                            <div class="input-group-btn">
                                <button class="btn btn-warning btn-sm text-white">Check</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </template>
        </b-sidebar> -->
    </div>
</template>

<script>
import { mapGetters, Store } from 'vuex'
import LocaleDropdown from './LocaleDropdown'
import LocaleDropdownHead from './LocaleDropdownHead'
// import carts from './Cart'

// import '../main'

export default {
  components: {
    LocaleDropdown,
    LocaleDropdownHead,
    // carts
  },
  props: ['counter'],

  data: () => ({
    appName: window.config.appName
  }),
  data(){
      return {
          key: '',
          universities: '',
      }
  },

  computed: mapGetters({
    user: 'auth/user',
    school: 'school/school'
  }),
  updated() {
      this.key = this.school
  },
  created() {
    // this.dampings();
    // main.load();
    sessionStorage.clear();
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
            }).catch(err => {
                console.log('error');
            });
      },

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
    },
    // removal(enter) {
    //     // console.log(enter);
    //     if (enter != null) {
    //         // for (let indexy = 0; indexy < this.cart.length; indexy++) {
    //         //     if (indexy == enter) {
    //         //         this.cart.splice(enter, 1);
    //         //     }            
    //         // }
    //         for(var indexy in this.cart) {
    //             if (indexy == enter) {
    //                 this.cart.splice(enter, 1);
    //                 break;
    //             }            
    //         }
    //         console.log(this.cart);
    //         if (this.cart.length > 0) {
    //             sessionStorage.setItem('shoppingCart', JSON.stringify(this.cart));
    //             this.tots = this.cart.reduce((acc, item) => acc + Number(item.price), 0);
    //         }
    //         else{
    //             this.tots = 0;
    //             this.cart = null
    //             sessionStorage.clear();
    //             console.log('removal')
    //         }
    //     }
    // },
    
    // getCart() {
    //     this.cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
    //     console.log(this.cart);
    // },
      selectSchool(event) {

        console.log(event.target.value);
        this.$store.dispatch('school/setSchool', { school: this.key })
        // Redirect to home
        // this.$router.push({name: 'welcome'})
            location.reload(true)
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
</style>
