export default [
  { path: '/login', component: require('../pages/Login.vue') },

  { path: '/dashbord', component: require('../pages/Dashbord.vue'), /*meta: { requiresAuth: true }*/ },
  { path: '/ticket/list', component: require('../pages/Ticket/List.vue'), /*meta: { requiresAuth: true }*/ },

  // Admin
  { path: '/admin/user/list', component: require('../pages/Admin/User/List.vue') },
  { path: '/admin/user/add', component: require('../pages/Admin/User/Add.vue') },
]