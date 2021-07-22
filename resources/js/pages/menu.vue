<template>
    <div>
        <div v-if="eateries == ''">
        <!-- WELCOME-->
        <section class="welcome p-0">
            <div class="col-12 p-0">
<v-card
>
    <v-img
    :src="'/storage/'+restaurant.page_image"
    :aspect-ratio="16/9"
    height="250px"
    content-class="col"
    gradient="to top right, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)"
    >
    <v-btn 
    @click="goBack"
    rounded
    color="white"
    large
    >
        <i class="zmdi zmdi-chevron-left zmdi-hc-2x"></i>
    </v-btn>
    <div class=" text-white" style="position: absolute; left: 0; bottom: 0;">
    <v-card-title v-text="restaurant.name">
    </v-card-title>
<v-card-subtitle class="mb-0 pb-0 text-light" v-text="restaurant.nickname">
</v-card-subtitle>
    </div>

    </v-img>
            <v-fab-transition>
            <v-btn
                color="green"
                dark
                absolute
                right
                class="white--text font-weight-bold"
                fab
            >
            <i class="zmdi zmdi-star zmdi-hc-2x"></i>
            </v-btn>
            </v-fab-transition>
    <v-card-subtitle>
        <div class="btn-deck mt-1">
            <small class="small btn btn-sm shadow-sm">
                Fast Delivery under <strong class="text-success">{{ restaurant.timer }}</strong> minutes
            </small>
            <small class="small btn btn-sm shadow-sm">
                Pack Delivery: &#8358;<strong class="text-warning">{{ restaurant.small_pack - 50 }}</strong>
            </small>
        </div>


    </v-card-subtitle>
</v-card>
        <div class="card card-body bg-danger text-justify py-2" v-if="toggle == 1">
            <h6 class="text-white">Sorry, we are currently closed at the moment.</h6>
            <p class="text-white">Note: Our services starts by 9:00a.m daily</p>
        </div>

            </div>
        </section>
        <!-- END WELCOME-->
        <div class="container">
        <div class="account2" style="color: #f1f1f1;">
            <i class="zmdi zmdi-alert-polygon zmdi-hc-5x"></i>
            <p class="display-6 text-danger">This cafetaria is currently Empty at the moment, Please try again later</p>
        </div>
            
        </div>
        </div>
        <div v-else-if="eateries == '0'">
            <b-skeleton-wrapper>
            <template>
                <div style="height: 100vh !important;">
        <b-card>
            <b-row>
            <b-skeleton-img animation="fade" no-aspect height="200px"></b-skeleton-img>
        </b-row>
        <b-row class="justify-content-center my-2">
            <b-skeleton animation="fade" type="button" width="45%" class="mt-1"></b-skeleton>
            <b-skeleton animation="fade" type="button" class="ml-1 mt-1" width="25%"></b-skeleton>
            <b-skeleton animation="fade" type="button" class="mt-1 ml-1" width="25%"></b-skeleton>
        </b-row>
        <b-row class="my-2 container">
            <b-skeleton type="button"></b-skeleton>
        </b-row>
        <section class="mt-3">
        <b-row>
            <b-col cols="12">
            <b-skeleton type="input" animation="fade" class="my-2" width="100%"></b-skeleton>
            <b-skeleton type="input" animation="fade" class="my-2" height="100px" width="85%"></b-skeleton>
            <b-skeleton type="input" animation="fade" class="my-2" height="100px" width="85%"></b-skeleton>
            <b-skeleton type="input" animation="fade" class="my-2" height="100px" width="85%"></b-skeleton>
            <b-skeleton type="input" animation="fade" class="my-2" height="100px" width="85%"></b-skeleton>
            <b-skeleton type="input" animation="fade" class="my-2" height="100px" width="85%"></b-skeleton>
            </b-col>
        </b-row>
        </section>
        </b-card>

                </div>

            </template>
            </b-skeleton-wrapper>
        </div>
        <div v-else>
        <!-- WELCOME-->
        <section class="welcome p-0">
            <div class="col-12 p-0">
  <v-card
  >
    <v-img
      :src="'/storage/'+restaurant.page_image"
      :aspect-ratio="16/9"
      height="250px"
      content-class="col"
      gradient="to top right, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)"
    >
    <v-btn 
    @click="goBack"
    rounded
    color="white"
    large
    >
        <i class="zmdi zmdi-chevron-left zmdi-hc-2x"></i>
    </v-btn>
    <div class=" text-white" style="position: absolute; left: 0; bottom: 0;">
    <v-card-title v-text="restaurant.name">
    </v-card-title>
<v-card-subtitle class="mb-0 pb-0 text-light" v-text="restaurant.nickname">
</v-card-subtitle>
    </div>

    </v-img>
            <v-fab-transition>
              <v-btn
                color="green"
                dark
                absolute
                right
                class="white--text font-weight-bold"
                fab
              >
              <i class="zmdi zmdi-star zmdi-hc-2x"></i>
              </v-btn>
            </v-fab-transition>
    <v-card-subtitle>
        <div class="btn-deck mt-1">
            <small class="small btn btn-sm shadow-sm">
                Fast Delivery under <strong class="text-success">{{ restaurant.timer }}</strong> minutes
            </small>
            <small class="small btn btn-sm shadow-sm">
                Pack Delivery: &#8358;<strong class="text-warning">{{ restaurant.small_pack - 50 }}</strong>
            </small>
        </div>


    </v-card-subtitle>
  </v-card>
        <div class="card card-body bg-danger text-justify py-2" v-if="toggle == 1">
            <h6 class="text-white">Sorry, we are currently closed at the moment.</h6>
            <p class="text-white">Note: Our services starts by 9:00a.m daily</p>
        </div>

            </div>
        </section>
        <!-- END WELCOME-->

        <!-- WELCOME-->
        <section class="welcome">
            <div class="container pb-4">
                <b-nav pills card-header slot="header" class="sticky-top bg-white shadow" v-b-scrollspy:nav-scroller>
                    <b-nav-item class="text-success py-3" v-for="(header, inde) in foodies" :key="inde" :href="'#'+header.label" @click="scrollIntoView">{{ header.label }}</b-nav-item>
                </b-nav>
                <div id="nav-scroller" ref="content" class="row pb-15" style="position:relative; height:90vh; overflow-y:scroll;">
                    <div class="col-md-6 col-lg-8" v-for="(fud, index) in foodies" :key="index" :id="fud.label">
                    <h5 class="container py-2">{{ fud.label }}</h5> 
                    <div v-for="(food, ind) in fud.items" :key="ind">
                        <div v-if="food.type == 1">
                            <v-card
                            class="my-2"
                            height="100"
                            v-b-modal.modal-sm  @click="jumper(food)"
                            >
                                <div class="d-flex flex-no-wrap">
                                <v-col
                                >
                                <v-avatar
                                    class="rounded-lg"
                                    size="75"
                                >
                                    <v-img :src="'/storage/'+ food.image"></v-img>
                                </v-avatar>
                                </v-col>
                                    
                                <v-col
                                    cols="9"
                                    class="text-justify px-0"
                                >
                                    <v-card-title
                                    class="h6"
                                    >{{ food.name }}</v-card-title>

                                    <v-card-subtitle class=" text-success font-weight-bold"> &#8358;{{ food.price }}</v-card-subtitle>
                                    
                                </v-col>
                                </div>
                            </v-card>

                        </div>
                        
                        <div v-else>
          <v-card
          class="my-2"
          height="100"
           v-b-modal.modalme  @click="sendInfo(food)"
          >
            <div class="d-flex flex-no-wrap">
              <v-col
              >
              <v-avatar
                class="rounded-lg"
                size="75"
              >
                <v-img :src="'/storage/'+ food.image"></v-img>
              </v-avatar>
              </v-col>
                
              <v-col
                cols="9"
                class="text-justify px-0"
              >
                <v-card-title
                  class="h6"
                >{{ food.name }}</v-card-title>

                <v-card-subtitle class=" text-success font-weight-bold"> &#8358;{{ food.price }}</v-card-subtitle>
                  
              </v-col>
              
            </div>
          </v-card>
                        </div>
                    </div>             
                    </div>
                </div>
            </div>


        </section>



        <!-- END WELCOME-->
            <b-modal
            id="modal-sm"
            ref="modal"
            title="Select Quantity"
            size="sm"
            centered
            @show="resetModal"
            @hidden="resetModal"
            >
                <div v-if="radioGroups != null" class="mb-1">
                    <div v-for="(radioGroup, indexed) in radioGroups" :key="indexed">
                        <h6 class="font-weight-bold">{{radioGroup.label}}</h6>
                        <div v-for="(item, indexeds) in radioGroup.items" :key="indexeds">
                        <span v-if="item.checking == 1">
                            <input type="radio"
                            v-model="selected[radioGroup.label]"
                            :name="radioGroup.label + item.id"
                            :value="item"
                            :id="radioGroup.label"
                            :checked="item"        
                            >
                        </span>
                        <span v-else>
                            <input type="radio"
                            v-model="selected[radioGroup.label]"
                            :name="radioGroup.label + item.id"
                            :value="item"
                            :id="radioGroup.label"
                            >
                        </span>                        
                        <label :for="radioGroup.label" class="h6">{{ item.name }} <small class="font-weight-bold text-danger ml-3" v-if="item.price > 0">+&#8358;{{ item.price }}</small></label>
                        </div>
                        <hr>
                    </div>
                    <small class="text-italics text-muted">Delivery &#8358;{{selectedFood.typeprice}}</small>
                </div>

                <div slot="modal-footer" class="container-fluid">
                    <b-form-spinbutton class="float-center" id="sb-inline" v-model="value" inline>
                    </b-form-spinbutton>
                    <b-button v-if="toggle != '1'" class="text-white float-right" variant="success" @click="add(selectedFood)">Add to Cart <b class="text-dash">&#8358;{{ dp }}</b> </b-button>
                
                </div>

            </b-modal>
            <b-modal
            id="modalme"
            ref="modal"
            title="Customize your food"
            header-class="border-0 shadow-sm"
            title-class="text-dark"
            scrollable
            size="xl"      
            @show="resetModal"
            @hidden="resetModal"
            @ok="handleOk"
            >
            <hr>
                <div v-if="radioGroups != null" class="mb-1">
                    <div v-for="(radioGroup, indexed) in radioGroups" :key="indexed">
                        <h6 class="font-weight-bold">{{radioGroup.label}}</h6>
                        <div v-for="(item, indexeds) in radioGroup.items" :key="indexeds">
                            <span v-if="item.checking == 1">
                                <input type="radio"
                                v-model="selected[radioGroup.label]"
                                :name="radioGroup.label + item.id"
                                :value="item"
                                :id="radioGroup.label"
                                :checked="item"        
                                >
                            </span>
                            <span v-else>
                                <input type="radio"
                                v-model="selected[radioGroup.label]"
                                :name="radioGroup.label + item.id"
                                :value="item"
                                :id="radioGroup.label"
                                >
                            </span>                        
                            <label :for="radioGroup.label" class="h6">{{ item.name }} <small class="font-weight-bold text-danger ml-3" v-if="item.price > 0">+&#8358;{{ item.price }}</small></label>
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="container-fluid card border-0">
                        <div v-for="(option, inf) in options" :key="inf" class="mb-1">
                            <div v-for="(under, bas) in option.food" :key="bas">
                                <div v-if="selectedFood.id == under.id">
                                    <div v-if="option.type === 'CHECKBOX'">
                                        <b-form-checkbox-group>
                                        <b-form-checkbox class="h5 col-12" v-model="checkedBoxes" :name="'some-radios' + inf" :value="option">
                                            <br>
                                            <h5 class="">{{option.name}} <sup class="ml-2 text-danger"> +{{option.price}}</sup></h5>
                                
                                        </b-form-checkbox>
                                        </b-form-checkbox-group>
                                        <hr>
                                    </div>
                                    <div v-if="option.type === 'SELECT'">
                                            <h5><b class="float-left">{{ option.name }}</b> <small class="text-muted float-right">~<b>&#8358;{{ option.price }}</b></small></h5>
                                            <b-form-select v-model="selects[option.slug]" class="mb-3">
                                                <b-form-select-option value="">Please select quantity</b-form-select-option>
                                                <b-form-select-option :value="{name:option.name, price: option.price, quantity: 1, total: 1 * option.price}">1</b-form-select-option>
                                                <b-form-select-option :value="{name:option.name, price: option.price, quantity: 2, total: 2 * option.price}">2</b-form-select-option>
                                                <b-form-select-option :value="{name:option.name, price: option.price, quantity: 3, total: 3 * option.price}">3</b-form-select-option>
                                                <b-form-select-option :value="{name:option.name, price: option.price, quantity: 4, total: 4 * option.price}">4</b-form-select-option>
                                                <b-form-select-option :value="{name:option.name, price: option.price, quantity: 5, total: 5 * option.price}">5</b-form-select-option>
                                            </b-form-select>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="justify-content-start" v-if="selectedFood.nopack == 0">
                                <b-form-radio
                                v-model="pack"
                                button
                                name="radios-btn-default"
                                button-variant="outline-dark"
                                checked
                                :value="{name: 'Small Pack', price: restaurant.small_pack}"
                                >
                                Small Pack
                                </b-form-radio>
                                <b-form-radio
                                v-model="pack"
                                button
                                name="radios-btn-default"
                                button-variant="outline-dark"
                                :value="{name: 'Big Pack', price: restaurant.big_pack}"
                                >
                                Big Pack
                                </b-form-radio>
                        </div>
                    </div>
                    
                </div>
                <div slot="modal-footer" class="container-fluid">
                    <b-form-spinbutton class="float-center" id="sb-inline" v-model="value" inline>
                    </b-form-spinbutton>
                    <b-button v-if="toggle != '1'" class="text-white float-right" variant="success" @click="handleSubmit()">Add to Cart <b class="text-dash">&#8358;{{ pp }}</b> </b-button>
                
                </div>
            </b-modal>

            <router-link :to="{name: 'cart'}" tag="div"  v-if="cart.length != 0">
                        <b-button class="btn-success justify-content-center align-items-center px-0 py-4 col-lg-4" style="position: fixed; right: 0 !important; z-index: 2; bottom: 0 !important">
                            <div class="row">
                            <span class="col">
                                <span class="btn border text-dash">
                                    {{ cart.length }} item
                                </span>
                            </span>
                            <span class="col text-left">
                                <button class="btn text-white">
                                    Cart
                                    <i class="fas fa-shopping-basket"></i>
                                </button>
                            </span>
                            <span class="col">
                                <button class="btn text-white">
                                &#8358;{{ tots }}
                                </button>
                            </span>

                            </div>
                        </b-button>
            </router-link>
        </div>


    </div>

</template>

<script>
import Cookies from 'js-cookie'
import { relativeTimeRounding } from 'moment'

    export default {
        layout: 'basic',

  metaInfo () {
    return { title: this.restaurant.name+' menu' }
  },
        data() {
            return {
                school: JSON.parse(this.$store.getters["school/school"]),
                slug: this.$route.params.slug,
                eateries: '0',
                pack: '',
                selectedFood: [],
                value: 1,
                selects: {},
                checkedBoxes: [],
                selectedPrice: '',
                selected: {},
                options: [],
                pp: '',
                toggle: '',
                restaurant: '',
                cart: this.$store.state.cart.cart,
                namer: '',
                loading: false,
                loadingTime: 0,
                maxLoadingTime: 3,
                tots: 0,
                key: '',
                universities: '',
                dp: '',
                dialog: false,
            }
        },
        beforeCreate(){
                if (this.$store.state.cart.restaurant != undefined) {
                    if (this.$store.state.cart.restaurant.slug != this.$route.params.slug) {
                        this.$store.state.cart.cart = [];
                        this.$store.state.cart.restaurant = undefined;
                    }
                }
        },
        created() {
            Cookies.remove('stored_order');
            if (this.$store.getters["school/school"] == null)
            {
                this.$_loadingTimeInterval = null
                sessionStorage.clear();
                this.$router.push({ name: 'welcome' })
            } 
            else {
                this.$_loadingTimeInterval = null
                sessionStorage.clear();
                this.foods();

            }
        },
        updated(){
            var checkbox = this.checkedBoxes.reduce((acc, item) => acc + Number(item.price), 0);
            this.dp = this.value * this.pp;
            const total = Object.values(this.selected).reduce((t, {price}) => t + Number(price), 0);
            const selecter = Object.values(this.selects).reduce((q, {total}) => q + Number(total), 0);
            if (this.cart != null) {
                this.tots = this.cart.reduce((acc, item) => acc + Number(item.price), 0);
            }
            this.pp = total + Number(this.selectedFood.price) + checkbox + Number(selecter);
            this.selectedPrice = this.value * 
                (total + Number(this.selectedFood.price) + checkbox + selecter + Number(this.pack.price));
        },
        watch: {
            loading(newVal, oldValue) {
                if (newVal !== oldValue) {
                this.clearLoadingTimeInterval()

                if (newVal) {
                    this.$_loadingTimeInterval = setInterval(() => {
                    this.loadingTime++
                    }, 1000)
                }
                }
            },
            loadingTime(newVal, oldValue) {
                if (newVal !== oldValue) {
                if (newVal === this.maxLoadingTime) {
                    this.loading = false
                }
                }
            }
        },
        computed: {
            radioGroups() {
                const obj = {};
                
                this.options.forEach(option => {
                    if (option.type === 'RADIO') {
                        const elec = option.food
                        elec.forEach(fooder => {
                            if (fooder.id === this.selectedFood.id) {
                                if (!obj[option.category.name]) {
                                    obj[option.category.name] = [];
                                }
                                
                                obj[option.category.name].push({name: option.name, price: option.price, id: option.id, checking: option.important})


                            }
                        });
                    }
                })
                
                return Object.entries(obj).map(([key, value]) => {
                return {
                    label: key,
                    items: value,
                }
                })
            },
            foodies() {
                const obj = {};
                
                this.eateries.forEach(food => {
                    
                    if (!obj[food.foodcategories.name]) {
                        obj[food.foodcategories.name] = [];
                    }
                    
                    obj[food.foodcategories.name].push({name: food.name, price: food.price, image: food.image, id: food.id, type: food.quick, nopack: food.nopack, typeprice: food.quick_price})
                })
                
                return Object.entries(obj).map(([key, value]) => {
                    return {
                        label: key,
                        items: value,
                    }
                })
            },
            clickButton() {
                var addons = [];
                var foodname = this.selectedFood.name;
                var foodprice = this.selectedPrice;
                var foodpack = this.pack;
                var item = {};


                for (let g = 0; g < this.checkedBoxes.length; g++) {
                    const element = this.checkedBoxes[g];
                    addons.push(element);
                }
                for (const keyed in this.selected) {
                    if (this.selected.hasOwnProperty(keyed)) {
                        const s = this.selected[keyed];
                        addons.push(s);
                    }
                }
                for (const keyeds in this.selects) {
                    if (this.selects.hasOwnProperty(keyeds)) {
                        const s = this.selects[keyeds];
                        addons.push(s);
                    }
                }
                item = {name: this.selectedFood.name, addons: addons, tabbed: this.pp + Number(this.pack.price), original: this.selectedFood.price, quantity: this.value, subtotal: this.pp, price: this.selectedPrice, pack: this.pack, type: this.selectedFood.type};
                this.$store.state.cart.restaurant = this.restaurant;
                this.$store.state.cart.cart.push(item);
}
        },
        methods: {
            foods() {
                axios.post('/api/cafetaria/'+ this.$route.params.slug +'/foods', {schoolslug: this.school.slug})
                    .then((response)=>{
                        this.eateries = response.data.sch;
                        this.restaurant = response.data.res;
                        this.options = response.data.add;
                        this.toggle = response.data.toggle.toggle;
                    }).catch(err => {
                        alert('Please Reload this page');
                    });
            },
            goBack(){
                return this.$router.go(-1);
                Cookies.remove('stored_order');
            },            
            scrollIntoView(evt) {
                evt.preventDefault()
                const href = evt.target.getAttribute('href')
                const el = href ? document.querySelector(href) : null
                if (el) {
                this.$refs.content.scrollTop = el.offsetTop
                }
            },            
            sendInfo(item) {
                this.selectedFood = item;
                this.pack = {name: 'Small Pack', price: this.restaurant.small_pack};

            },
            jumper(item){
                this.selectedFood = item;
            },
            resetModal() {
                this.checkedBoxes = []
                this.selectedPrice = ''
                this.selects = {}
                this.value = 1
                this.settingRadio();                
            },
            handleOk(bvModalEvt) {
                // Prevent modal from closing
                bvModalEvt.preventDefault()
                // Trigger submit handler
                this.handleSubmit()
            },
            handleSubmit() {
                if (this.pack.name == 'Small Pack' && this.pp > this.restaurant.max_small_pack) {
                    this.$bvToast.toast(`Small Pack have a maximum of `+ this.restaurant.max_small_pack +` per portion. Please select the big pack`, {
                        autoHideDelay: 5000,
                        title: 'Error',
                        toaster: 'b-toaster-top-full',
                        variant: 'white',
                        solid: true,
                        bodyClass: 'text-danger'
                    })
                    
                } else if (this.pack.name == 'Big Pack' && this.pp > this.restaurant.max_big_pack) {
                    this.$bvToast.toast(`Maximum for big pack per portion is `+ this.restaurant.max_big_pack, {
                        autoHideDelay: 5000,
                        title: 'Error',
                        toaster: 'b-toaster-top-full',
                        variant: 'white',
                        solid: true,
                        bodyClass: 'text-danger'
                    })

                } else {
                    if (this.toggle != '1') {
                    this.clickButton;
                    this.$bvToast.toast( this.selectedFood.name + ` added to cart`, {
                        autoHideDelay: 1000,
                        title: '',
                        headerClass:'bg-success',
                        toaster: 'b-toaster-top-full',
                        variant: 'white',
                        solid: true,
                        bodyClass: 'text-dark'
                    })
                    
                    this.$nextTick(() => {
                    this.$bvModal.hide('modalme')
                    });



                    }


                }

            },
            settingRadio() {
                var e = {};
                this.radioGroups.filter(function (radio) {
                radio.items.filter(function (rag) {
                    if(rag.checking == 1)
                    {
                    e[radio.label] = rag;
                    }
                })
                })
                if (jQuery.isEmptyObject(e)) {
                    this.selected = {}
                } else {
                    this.selected = e;
                }

            },
            add(tem) {
                this.$store.state.cart.restaurant = this.restaurant;
                var item = {name: tem.name, addons: [], quantity: this.value, tabbed: Number(tem.price) + Number(tem.typeprice), original: this.selectedFood.price, subtotal: tem.price, price: this.value * Number(Number(tem.price) + Number(tem.typeprice)), pack: {name: 'Delivery', price: tem.typeprice, type: tem.type}};
                if (this.toggle != '1') {
                    this.$store.state.cart.cart.push(item);
                    this.$bvToast.toast( this.selectedFood.name + ` added to cart`, {
                        autoHideDelay: 1000,
                        title: '',
                        headerClass:'bg-success',
                        toaster: 'b-toaster-top-full',
                        variant: 'white',
                        solid: true,
                        bodyClass: 'text-dark'
                    })
                    
                    this.$nextTick(() => {
                    this.$bvModal.hide('modal-sm')
                    });




                    // var cc = this.$store.getters['cart/cart'];
                    // for(var it in cc) {
                    //     if(cc[it].name == item.name) {
                    //         cc[it].quantity ++;
                    //     }
                    //     else {
                    //         this.$store.state.cart.cart.push(item);
                    //     }
                    // }
                    
                    
                }
            },
            clearLoadingTimeInterval() {
                clearInterval(this.$_loadingTimeInterval)
                this.$_loadingTimeInterval = null
            },
            startLoading() {
                this.loading = true
                this.loadingTime = 0
            },
            async badge() {
                var output = "";
                for(var a in this.cart) {
                    output = "<badge class='badge badge-danger tinker' id='tinker' data-name='" + this.cart[a].name + "'>"+ this.cart[a].quantity +"</badge>"
                    if ($('.added-to-cart[data-name="' + this.cart[a].name + '" ]')) {
                        $(".added-to-cart[data-name='" + this.cart[a].name + "' ]").html(output);
                    }

                }
                
            },
            starterPack() {
                this.$store.state.cart.cart = [];
                this.$store.state.cart.restaurant = undefined;
            }
        },
        mounted() {
            this.startLoading()
        }
    }
</script>
<style>
#modalme {
  padding: 0 !important;
  margin: 0;
  border: 1 solid white !important;
}
.modal-content {
    border: none !important;
}
.modal-body {
    padding-top: 0 !important;
}
@media screen and (max-width: 760px){
    #modalme .modal-dialog {
        width:100%;
        margin: 0 !important;
        min-height: 100vh !important;
    }
    #modalme .modal-dialog .modal-content {
        min-height: 100vh !important;
        top: 0 !important;
    }
}
.nav-pills .nav-link.active, .nav-pills .show > .nav-link {
    background-color: #28a745 !important;
}
.ribbon {
  position: absolute;
  left: -5px; bottom: -5px;
  z-index: 1;
  overflow: hidden;
  width: 75px; height: 75px;
  text-align: right;
}
.ribbon span {
  font-size: 10px;
  font-weight: bold;
  color: #FFF;
  text-transform: uppercase;
  text-align: center;
  line-height: 20px;
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  width: 100px;
  display: block;
  background: #79A70A;
  background: linear-gradient(#9BC90D 0%, #79A70A 100%);
  box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
  position: absolute;
  bottom: 19px; left: -21px;
}
.ribbon span::before {
  content: "";
  position: absolute; left: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid #79A70A;
  border-right: 3px solid transparent;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #79A70A;
}
.ribbon span::after {
  content: "";
  position: absolute; right: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid transparent;
  border-right: 3px solid #79A70A;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #79A70A;
}
.bg-light-black {
    background: rgba(0, 0, 0, 0.2);
}
.btn-white{
    background: #FFF;
    color: black;
}
</style>