

function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
 { path: '/', name: 'welcome', component: page('welcome.vue') },
{ path: '/home', name: 'home', component: page('restaurant.vue') },
//  { path: '/restaurant', name: 'restaurant', component: page('restaurant.vue') },
{ path: '/cart', name: 'cart', component: page('cart.vue') },
{ path: '/orders', name: 'orders', component: page('orders.vue') },
{ path: '/restaurant/menu/:slug/', name: 'menu', component: page('menu.vue'), props: true },
 { path: '/checkout', name: 'checkout', component: page('paymeyourmoney.vue') },
 { path: '/support', name: 'support', component: page('support.vue') },
 { path: '/blog', name: 'blog', component: page('blog.vue') },
 { path: '/about', name: 'about', component: page('about.vue') },
 { path: '/profile', name: 'profile', component: page('profile.vue') },

 { path: '/mart', name: 'mart', component: page('mart.vue') },
 { path: '/services', name: 'services', component: page('services.vue') },
 { path: '/more', name: 'more', component: page('more.vue') },
 { path: '/specials', name: 'specials', component: page('specials.vue') },
 
 { path: '/history', name: 'history', component: page('history.vue') },
 { path: '/worker-history', name: 'worker_history', component: page('workerhistory.vue') },
 { path: '/worker-requests', name: 'worker_requests', component: page('requested.vue') },
 { path: '/worker', name: 'worker', component: page('workerhome.vue') },
 { path: '/worker-restaurants', name: 'worker_restaurants', component: page('workerrestaurants.vue') },
 { path: '/worker-restaurant/:slug', name: 'worker_menu', component: page('workermenu.vue'), props: true },

 { path: '/skeleton', name: 'skeleton', component: page('skeleton.vue') },
{ path: '/login', name: 'login', component: page('auth/login.vue') },
  { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },

  // { path: '/home', name: 'home', component: page('home.vue') },
  { path: '/profile/settings',
    component: page('settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: page('settings/password.vue') }
    ] },

  { path: '*', component: page('errors/404.vue') }
]
