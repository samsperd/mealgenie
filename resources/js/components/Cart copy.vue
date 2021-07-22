<template>
    <div>
        
        <b-sidebar id="sidebar-right" backdrop-variant="white" backdrop no-header right shadow>
        <template #default="{ hide }">
            <div class="d-flex text-light px-4 py-2 bg-dash">
                <h3 id="sidebar-no-header-title" class="text-white">Cart</h3>
                <b-button variant="none" class="text-danger" style="position: absolute; right: 10% !important;" size="sm" @click="hide">
                    <i class="fa fa-close"></i>
                </b-button>
            </div>
        <div class="px-3 py-2">
            <div class="account2" style="color: #f1f1f1;" v-if="cart.length == 0">
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
                    <h5 class="text-white">Overall Total: <b class="float-right">&#8358;{{ tots }}</b></h5>
                </div>
                <div class="justify-content-end align-items-end d-flex my-3">
                    <b-button variant="outline-success" class="font-weight-bold" v-b-modal.modal-locate>Proceed</b-button>
                    <b-modal id="modal-locate"  centered title="Please enter your location" footer-class="border-top-0">
                        <form class="mt-1">
                            <input class="form-control" type="text" name="locateme" id="locateme" placeholder="E.g: Annex 1 Room 1">
                              <fieldset class="question form-check mt-1">
                                <label for="jamb_question" class="form-check-label">To Someone else <b-skeleton-icon icon="heart-fill" :icon-props="{ fontScale: 1, variant: 'danger' }"></b-skeleton-icon> ?</label>
                                <input class="jamb_question" type="checkbox" name="jamb_question" value="1" @change="valueChanged()"/>
                                <span class="item-text">Yes</span>
                            </fieldset>
                         
                            <fieldset class="answer">
                                <input type="text" name="jamb_name" class="form-control form-control" id="jamb_name" placeholder="Enter Receiver's Name">
                                <br>
                                <input type="number" name="jamb_number" class="form-control form-control" id="jamb_number" placeholder="Enter Receiver's Phone Number">
                            <br>
                              </fieldset>
                        
                        </form>
                        <template #modal-footer="{ ok }">
                            <b-button size="sm" class="text-white" variant="warning" @click="ok(), checkFinish()">
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
        </b-sidebar>
        <!-- <b-sidebar id="sidebar-right" backdrop-variant="white" backdrop no-header right shadow>
        <template #default="{ hide }">
            <div class="d-flex text-light px-4 py-2 bg-dash">
                <h3 id="sidebar-no-header-title" class="text-white">Cart</h3>
                <b-button variant="none" class="text-danger" style="position: absolute; right: 10% !important;" size="sm" @click="hide">
                    <i class="fa fa-close"></i>
                </b-button>
            </div>
        <div class="px-3 py-2">
            <div class="account2" style="color: #f1f1f1;" v-if="beforeCart == null || beforeCart == ''">
                <i class="zmdi zmdi-shopping-cart zmdi-hc-5x"></i>
                <p class="display-6">Cart is Empty</p>
            </div>
            <div v-else>
                <div v-for="(item, indice) in beforeCart" :key="indice" class="">
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
                            <input type="email" id="input2-group2" disabled name="input2-group2" placeholder="coupon code" class="form-control form-control-sm">
                            <div class="input-group-btn">
                                <button class="btn btn-warning btn-sm text-white" disabled>Check</button>
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
// import { menu } from '../pages/menu'
import Cookies from 'js-cookie'

export default {
        data() {
            return {
                loading: false,
                loadingTime: 0,
                maxLoadingTime: 3,
            }
        },
        props: ['tots'],
  computed: mapGetters({
    cart: 'cart/cart'
  }),
  updated() {
        Cookies.remove('stored_order');
  },
  created() {

},

  methods: {
    removal(enter) {
        this.$store.state.cart.cart.splice(enter, 1);
        
        // console.log(enter);
        // if (enter != null) {
        //     for(var indexy in this.cart) {
        //         if (indexy == enter) {
        //             this.$store.cart.cart.splice(enter, 1);
        //             break;
        //         }            
        //     }
        //     // console.log(this.cart);
        //     // if (this.cart.length > 0) {
        //     //     sessionStorage.setItem('shoppingCart', JSON.stringify(this.cart));
        //     //     this.tots = this.cart.reduce((acc, item) => acc + Number(item.price), 0);
        //     // }
        //     // else{
        //     //     this.tots = 0;
        //     //     this.cart = null
        //     //     sessionStorage.clear();
        //     //     console.log('removal')
        //     // }
        // }
    },
    checkFinish() {
        var location = $('#locateme').val();
        var subtt = this.cart.reduce((acc, item) => acc + Number(item.subtotal), 0);
            var ruby = $('#jamb_name').val();
            var coco = $('#jamb_number').val();
            if($('#jamb_name').val() == '' && $('#jamb_number').val() != '') {
              alert("Please complete the reciever's information");
              abort();
            } else if($('#jamb_name').val() != '' && $('#jamb_number').val() == ''){
              alert("Please complete the reciever's information");
              abort();
            }
        var submitter = [];
        var submitme = null;
        submitter.push({whichcaf : this.$route.params.slug, foods_ordered : this.$store.getters['cart/cart'], allfamount : subtt, allttamount : this.tots, babename : ruby, babenumber : coco, locatedat : location});
        submitme = {whichcaf : this.$route.params.slug, foods_ordered : this.$store.getters['cart/cart'], allfamount : subtt, allttamount : this.tots, babename : ruby, babenumber : coco, locatedat : location};
        Cookies.set('stored_order', submitme);
        this.$router.push({ name: 'checkout' })
        
        // console.log(this.$store);
                        // axios.post('/api/submitcart', {whichcaf : this.$route.params.slug, foods_ordered : this.$store.getters['cart/cart'], allfamount : subtt, allttamount : this.tots, babename : ruby, babenumber : coco, locatedat : location}
                        //     ).then((response)=>{
                        //     this.$router.push({ name: 'checkout' })

                        //     }).catch(err => {
                        //        console.log('Please Try Again');
                        //     });
        
        
            //   $.ajax({
            //       url: 'api/submitcart',
            //       method: 'POST',
            //       data: {
            //       'whichcaf' : this.$route.params.slug,
            //       'foods_ordered' : this.$store.getters['cart/cart'],
            //       'allfamount' : subtt,
            //       'allttamount' : this.tots,
            //       'babename' : ruby,
            //       'babenumber' : coco,
            //       'locatedat' : location
            //       },
            //       dataType: "json",
            //       cache: false,
            //       success: function(Response) {
            //         //   window.location.href = Response;
            //         console.log('successful')

            //       },
            //       error: function (Response) {
            //           console.log('error');
            //       }      
            //   });



    },
    valueChanged() {
        if($('.jamb_question').is(":checked")) {   
          $(".answer").show();
        }
        else{
          $(".answer").hide();
        }

    }
    
    // getCart() {
    //     this.cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
    //     console.log(this.cart);
    // },
    
  },

    mounted() {

    }
}
</script>

<style>
    @media screen and (max-width: 760px) {
        #sidebar-right {width: 100% !important;}
    }
    .answer {
        display: none;
    }

</style>
