<template>
<div>

          <!-- WELCOME-->
            <section class="welcome p-0">
                <div class="container-fluid">
                            <h5>Featured</h5>
                    <div class="row justify-content-center">
                        <div class="scrollers">
                            <!-- The slideshow -->
                            <a href="#" class="card p-0 mx-2 col-sm-7 col-md-4 col-lg-4 col-xs-10 clap">
                                <img class="card-img-top" src="images/cafetariaonesecondbackground.jpg" alt="Card image">
                                <div class="card-body py-2 px-1">
                                    <h6 class="card-title">El Trigo Restaurant </h6>
                                    <p class="card-text small">Some example text. Some example text.</p>
                                </div>                               
                            </a>                                    

                            <a href="#" class="card p-0 mx-2 col-sm-7 col-md-4 col-lg-4 col-xs-10 clap">
                                <img class="card-img-top" src="images/cafetariaonesecondbackground.jpg" alt="Card image">
                                <div class="card-body py-2 px-1">
                                    <h6 class="card-title">El Trigo Restaurant </h6>
                                    <p class="card-text small">Some example text. Some example text.</p>
                                </div>                               
                            </a>                                    

                            <a href="#" class="card p-2 mx-2 col-sm-7 col-md-4 col-lg-4 col-xs-10 clap">
                                <img class="card-img-top" src="images/cafetariaonesecondbackground.jpg" alt="Card image">
                                <div class="card-body py-0 px-1">
                                    <h6 class="card-title">El Trigo Restaurant </h6>
                                    <p class="card-text small">Some example text. Some example text.</p>
                                </div>                               
                            </a>                                    

                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->
            <!-- <section class="au-breadcrumb2 d-block">
                <div class="container">
                        <b-card
                            sub-title="Get foods from your favourite restaurants"
                            header="Restaurants"
                            header-class="bg-dash text-white h4"
                            img-src="/images/IMG_6780-01.jpeg"
                            img-alt="Image"
                            img-top
                            tag="a"
                            class="mb-2"
                        >
                            <b-button pill class="text-white" variant="success">See All <b-icon variant="white" icon="arrow-right"></b-icon></b-button>
                        </b-card>
                        
                </div>
            </section> -->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2 d-block d-lg-none p-0">
                <div class="container">
                    <h6 class="font-weight-bold" style="font-family: sans-serif;">Choose a service</h6>
                    <div class="row text-center justify-content-center mt-3">
                        <router-link :to="{ name: 'restaurant' }" class="btn btn-light text-success mx-1">
                            <i class="zmdi zmdi-cutlery zmdi-hc-lg text-dash"></i>
                            <br>
                            Restaurants
                        </router-link>

                            <a href="#" class="btn btn-light text-gray mx-1">
                                <i class="zmdi zmdi-store zmdi-hc-lg text-dash"></i>
                                <br>
                                <small class=" text-success">Mart</small>
                            </a>
                                
                            <a href="#" class="btn btn-light text-gray mx-1">
                                <i class="zmdi zmdi-pizza zmdi-hc-lg text-dash"></i>
                                <br>
                                <small class=" text-success">Specials</small>
                            </a>

                            <a href="#" class="btn btn-light text-gray mx-1">
                                <i class="zmdi zmdi-more zmdi-hc-lg text-dash"></i>
                                <br>
                                <small class=" text-success">More</small>
                            </a>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
            <section class="statistic statistic2 d-none d-sm-block">
                <div class="container">
                    <h4>Choose a service</h4>
                    <div class="row mt-4">
                        <div class="col-md-6 col-lg-3">
                        <router-link :to="{ name: 'restaurant' }" class="card shadow-sm">
                                <div class="card-body">
                                    <i class="zmdi zmdi-cutlery zmdi-hc-2x text-dash"></i>
                                    <h4 class="card-title text-success">Restaurants</h4>
                                    <p class="small">Foods from your favourite restaurants in school</p>
                                </div>                            
                            
                        </router-link>
                            
                            <a class="card shadow-sm">
                                <div class="card-body">
                                    <i class="zmdi zmdi-cutlery zmdi-hc-2x text-dash"></i>
                                    <h4 class="card-title text-success">Restaurants</h4>
                                    <p class="small">Foods from your favourite restaurants in school</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <a class="card shadow-sm">
                                <div class="card-body">
                                    <i class="zmdi zmdi-store zmdi-hc-2x text-dash"></i>
                                    <h4 class="card-title text-success">Mart</h4>
                                    <p class="small">Basic snacks, drinks and essentials for shopping</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <a class="card shadow-sm">
                                <div class="card-body">
                                    <i class="zmdi zmdi-pizza zmdi-hc-2x text-dash"></i>
                                    <h4 class="card-title text-success">Specials</h4>
                                    <p class="small">Foods and snacks from vendors off-campus</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <a class="card shadow-sm">
                                <div class="card-body">
                                    <i class="zmdi zmdi-more zmdi-hc-2x text-dash"></i>
                                    <h4 class="card-title text-success">More</h4>
                                    <p class="small">Other services, Transportation, outdoor shopping etc </p>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->


            <!--Requests-->
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-9">
                            <h4 class=" py-2">Requests</h4>
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless">
                                    <thead >
                                        <tr>
                                            <th>name</th>
                                            <th>order ID</th>
                                            <th>date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Reciept</td>
                                            <td>100398</td>
                                            <td>2018-09-29 05:57</td>
                                        </tr>
                                        <tr>
                                            <td>Reciept</td>
                                            <td>100398</td>
                                            <td>2018-09-29 05:57</td>
                                        </tr>
                                        <tr>
                                            <td>Reciept</td>
                                            <td>100398</td>
                                            <td>2018-09-29 05:57</td>
                                        </tr>
                                        <tr>
                                            <td>Reciept</td>
                                            <td>100398</td>
                                            <td>2018-09-29 05:57</td>
                                        </tr>
                                        <tr>
                                            <td>Reciept</td>
                                            <td>100398</td>
                                            <td>2018-09-29 05:57</td>
                                        </tr>
                                        <tr>
                                            <td>Reciept</td>
                                            <td>100398</td>
                                            <td>2018-09-29 05:57</td>
                                        </tr>
                                        <tr>
                                            <td>Reciept</td>
                                            <td>100398</td>
                                            <td>2018-09-29 05:57</td>
                                        </tr>
                                        <tr>
                                            <td>Reciept</td>
                                            <td>100398</td>
                                            <td>2018-09-29 05:57</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <!--End Requests-->
            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
  
</div>

</template>

<script>
export default {
  layout: 'default'

}
</script>
<style>

.scrollers {
  flex: 1;
  display: flex;
  flex-wrap: nowrap;
  overflow-x: auto;
}

.clap { 
  flex: auto;
  flex-shrink: 0;
  max-width: 250px;
}
</style>
