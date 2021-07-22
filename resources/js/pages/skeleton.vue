<template>
  <div>
      
            <section class="au-breadcrumb2 d-block">
                <div class="container">

    <b-skeleton-wrapper :loading="loading">
      <template #loading>
<b-card>
    <b-row>
  <b-col>
    <b-skeleton-img></b-skeleton-img>
  </b-col>
  <b-col>
    <b-skeleton-img></b-skeleton-img>
  </b-col>
  <b-col cols="12" class="mt-3">
    <b-skeleton-img no-aspect height="150px"></b-skeleton-img>
  </b-col>
</b-row>
</b-card>
      </template>

      <b-card>
  <v-row justify="center">
    <v-dialog
      v-model="dialog"
      fullscreen
      hide-overlay
      transition="dialog-bottom-transition"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="primary"
          dark
          v-bind="attrs"
          v-on="on"
        >
          Open Dialog
        </v-btn>
      </template>
      <v-card>
        <v-toolbar
          dark
          color="primary"
        >
          <v-btn
            icon
            dark
            @click="dialog = false"
          >
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>Settings</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn
              dark
              text
              @click="dialog = false"
            >
              Save
            </v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-list
          three-line
          subheader
        >
          <v-subheader>User Controls</v-subheader>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Content filtering</v-list-item-title>
              <v-list-item-subtitle>Set the content filtering level to restrict apps that can be downloaded</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>Password</v-list-item-title>
              <v-list-item-subtitle>Require password for purchase or use password to restrict purchase</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>
        <v-divider></v-divider>
        <v-list
          three-line
          subheader
        >
          <v-subheader>General</v-subheader>
          <v-list-item>
            <v-list-item-action>
              <v-checkbox v-model="notifications"></v-checkbox>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>Notifications</v-list-item-title>
              <v-list-item-subtitle>Notify me about updates to apps or games that I downloaded</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
          <v-list-item>
            <v-list-item-action>
              <v-checkbox v-model="sound"></v-checkbox>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>Sound</v-list-item-title>
              <v-list-item-subtitle>Auto-update apps at any time. Data charges may apply</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
          <v-list-item>
            <v-list-item-action>
              <v-checkbox v-model="widgets"></v-checkbox>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>Auto-add widgets</v-list-item-title>
              <v-list-item-subtitle>Automatically add home screen widgets</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-card>
    </v-dialog>
  </v-row>

      </b-card>
    </b-skeleton-wrapper>
                </div>
            </section>
  </div>
</template>

<script>
    export default {
        layout: 'default',

        data: () => ({
            title: window.config.appName
        }),
        data() {
            return {
                school: JSON.parse(this.$store.getters["school/school"]),
                restaurants: '',
                loading: false,
                loadingTime: 0,
                maxLoadingTime: 3,
        dialog: false,
        notifications: false,
        sound: true,
        widgets: false


            }
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
                axios.post('/api/cafetarias/'+ this.school.slug)
                    .then((response)=>{
                        console.log(response);
                        this.restaurants = response.data.cafetarias;
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
            
        },
        mounted() {
            this.startLoading()
        }
    }
</script>
<style>

</style>