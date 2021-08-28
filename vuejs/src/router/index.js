import Vue from "vue";
import VueRouter from "vue-router";
import login from "../views/login.vue";
import register from "../views/register.vue";
import home from "../views/Home.vue";
import write from "../views/write.vue";
import Show from "../views/Show.vue";
import MyPage from "../views/MyPage.vue";
import Chat from "../views/Chat.vue";
import Sale from "../views/Sale.vue";
import Item from "../views/Item.vue";
// import Comment from '../views/Comment.vue'
import CategoryItems from "../views/CategoryItems.vue";


Vue.use(VueRouter)

const routes = [
  { path: '/home', name: 'home', component: home },
  { path: '/login', name: 'login', component: login },
  { path: '/register', name: 'register', component: register },
  { path: '/write', name: 'write', component: write, meta: { auth: true } },
  { path: '/Show/:postId', name: 'Show', component: Show },
  { path: '/mypage', name: 'MyPage', component: MyPage },
  { path: '/sale', name: 'Sale', component: Sale },
  { path: '/chat', name: 'Chat', component: Chat },
  { path: "/item/:itemId", name: "Item", component: Item },
  { path: "/items", name: "CategoryItems", component: CategoryItems },
]

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

router.beforeEach((to, from, next) => {
  const loggedIn = localStorage.getItem("user");
  if (to.matched.some((record) => record.meta.auth) && !loggedIn) {
    next("/login");
    return;
  }
  next();
});

export default router;
