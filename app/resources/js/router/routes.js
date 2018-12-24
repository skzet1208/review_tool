export default [
  { path: '/login', component: require('../pages/Login.vue') },

  { path: '/dashbord', component: require('../pages/Dashbord.vue'), meta: { middlewareAuth: true } },
  { path: '/ticket/list', component: require('../pages/Ticket/List.vue'), meta: { middlewareAuth: true } },

  // Admin
  { path: '/admin/user/list', component: require('../pages/Admin/User/List.vue') },
  { path: '/admin/user/add', component: require('../pages/Admin/User/Add.vue') },
]