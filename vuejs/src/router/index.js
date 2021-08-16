import Vue from 'vue'
import VueRouter from 'vue-router'
import login from '../views/login.vue'
import register from '../views/register.vue'
import home from '../views/Home.vue'
import write from '../views/write.vue'
import Show from '../views/Show.vue'
Vue.use(VueRouter)

const routes = [
  { path: '/', name: 'Home', component: home },
  { path: '/login', name: 'Home', component: login },
  { path: '/register', name: 'register', component: register },
  { path: '/write', name: 'write', component: write, meta: { auth: true } },
    { path: '/Show/:postId', name: 'Show', component: Show },
   
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {
  const loggedIn = localStorage.getItem('user')
  if (to.matched.some(record => record.meta.auth) && !loggedIn) {
    next('/login')
    return
  }
  next()
})

export default router
