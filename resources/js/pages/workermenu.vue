<template>
<div>
                            <b-skeleton-wrapper :loading="loading" height="100vh">
      <template #loading>
<b-card-group>
    <b-card>
    <b-skeleton-img animation="fade"></b-skeleton-img>
    </b-card>
    <b-card>
    <b-skeleton-img></b-skeleton-img>
    </b-card>
</b-card-group>
<b-card>
    <b-row>
</b-row>
</b-card>
      </template>
    <div>
    <v-btn
    icon
    @click="goBack"
    >
      <v-icon>
          mdi-chevron-left
      </v-icon>
    </v-btn>


            <!-- STATISTIC-->

            <section class="statistic statistic2 pb-10">

                <div class="container">
                  <div class="row">
                      <v-tabs
                        v-model="tab"
                        align-with-title
                      >
                        <v-tabs-slider color="yellow"></v-tabs-slider>

                        <v-tab
                          v-for="(header, inde) in foodies" :key="inde"
                        >
                          {{ header.label }}
                        </v-tab>
                      </v-tabs>
                  </div>
                  <div>
                  <v-tabs-items v-model="tab">
                    <v-tab-item
                        v-for="(fud, indexer) in foodies" :key="indexer"
                    >
                                        <div class="card card-body" v-for="(food, ind) in fud.items" :key="ind">

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
                        <v-btn
                          block
                            @click="toggleFood(food.id)"
                            v-if="food.status == 'ACTIVATE'"
                            color="red"
                        >
                          Disable
                        </v-btn>
                        <v-btn
                          block
                          @click="toggleFood(food.id)"
                          v-if="food.status == 'DEACTIVATE'"
                          color="success"
                        >
                          Enable
                        </v-btn>
                        
                                        </div>
                    </v-tab-item>
                  </v-tabs-items>
                </div>
            </div>
        </section>
            <!-- END STATISTIC-->
        <b-modal
        id="modalme"
        ref="modal"
        title="Select custom food"
        header-class="border-0 shadow-sm"
        title-class="text-dark"
        scrollable
        size="xl"
        cancel-disabled    
        >
        <div class="container" v-for="(addons, indexer) in addoners" :key="indexer">
          <h6>{{addons.label}}</h6>
          <div class="card card-body">
            <div v-for="(addon, index) in addons.items" :key="index">
              <div class="container">
                <sup>{{addon.type}}</sup>
                <h6>{{addon.name}} <small class="text-primary">&#8358;{{addon.price}}</small></h6>
                <button class="btn btn-sm btn-danger" @click="toggleAddon(addon.id)" v-if="addon.status == 'ACTIVATE'">Disable</button>
                <button class="btn btn-sm btn-success" @click="toggleAddon(addon.id)" v-if="addon.status == 'DEACTIVATE'">Enable</button>
                <hr>
            

              </div>
            </div>
          </div>
        </div>
        </b-modal>

            
    </div>

    </b-skeleton-wrapper>
  
</div>

</template>

<script>
export default {
  middleware: 'auth',
  layout: 'worker',
    data() {
        return {
            school: JSON.parse(this.$store.getters["school/school"]),
            restaurants: '',
            resquest: '',
            loading: false,
            loadingTime: 0,
            maxLoadingTime: 3,
            eateries: [],
            options: [],
            selectedFood: '',
            tab: null,
        }
    },
    computed: {
        foodies() {
            const obj = {};
            
            this.eateries.forEach(food => {
                
                if (!obj[food.foodcategories.name]) {
                    obj[food.foodcategories.name] = [];
                }
                
                obj[food.foodcategories.name].push({name: food.name, price: food.price, image: food.image, id: food.id, type: food.quick, status: food.status, nopack: food.nopack, typeprice: food.quick_price})
            })
            
            return Object.entries(obj).map(([key, value]) => {
                return {
                    label: key,
                    items: value,
                }
            })
        },
        addoners() {
            const obj = {};
            
            this.options.forEach(food => {
                
                if (!obj[food.category.name]) {
                    obj[food.category.name] = [];
                }
                
                obj[food.category.name].push({name: food.name, price: food.price, id: food.id, type: food.type, status: food.status})
            })
            
            return Object.entries(obj).map(([key, value]) => {
                return {
                    label: key,
                    items: value,
                }
            })
        },
        
    },
    created() {
        if (this.$store.getters["school/school"] == null)
        {
            this.$_loadingTimeInterval = null
            this.$router.push({ name: 'welcome' })
        } else {
            this.findRestaurant();
            this.$_loadingTimeInterval = null
        }

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
    methods: {
      findRestaurant() {
          axios.post('/api/workermenu/'+ this.$route.params.slug, {schoolslug: this.school.slug})
              .then((response)=>{
                      this.eateries = response.data.sch;
                      this.options = response.data.add;
              }).catch(err => {
                  console.log('error');
              });
      },
      clearLoadingTimeInterval() {
          clearInterval(this.$_loadingTimeInterval)
          this.$_loadingTimeInterval = null
      },
      startLoading() {
          this.loading = true
          this.loadingTime = 0
      },
      sendInfo(item) {
          this.selectedFood = item;

      },
      handleOk(bvModalEvt) {
        // Prevent modal from closing
        bvModalEvt.preventDefault()
        // Trigger submit handler
        this.handleSubmit()
      },
      handleSubmit() {
        this.$nextTick(() => {
          this.$bvModal.hide('modal-prevent-closing')
        })
      },
      toggleFood(id) {
            axios.post('/api/togglefood', {id: id})
                .then((response)=>{
                    this.findRestaurant();
                }).catch(err => {
                    alert('Please reload this page')
                });
          
      },
      toggleAddon(id) {
            axios.post('/api/toggleaddon', {id: id})
                .then((response)=>{
                    this.findRestaurant();
                }).catch(err => {
                    alert('Please reload this page')
                });
          
      },
      goBack(){
          return this.$router.go(-1);
          Cookies.remove('stored_order');
      },
      addons() {
      const obj = {};

      this.options.forEach(option => {
          const elec = option.food
          elec.forEach(fooder => {
              if (fooder.id === this.selectedFood.id) {
                  if (!obj[option.category.name]) {
                      obj[option.category.name] = [];
                  }
                  
                  obj[option.category.name].push({name: option.name, price: option.price, id: option.id, checking: option.important})


              }
          });
      })

      return Object.entries(obj).map(([key, value]) => {
      return {
          label: key,
          items: value,
      }
      })
      },


    },
    mounted() {
        this.startLoading()
    }
}
</script>
<style>

</style>