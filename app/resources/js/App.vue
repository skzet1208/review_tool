<template>
  <div class="h100p">
    <el-container class="wrapper">
      <el-header>
        <navbar></navbar>
      </el-header>

      <el-container>
        <el-aside width="250px">
          <sub-menu></sub-menu>
        </el-aside>

        <el-main>
          <router-view></router-view>
        </el-main>
      </el-container>
    </el-container>
  </div>
</template>

<script>
  export default {
    components: {
      navbar: require('./components/Layouts/Navbar.vue'),
      'sub-menu': require('./components/Layouts/SubMenu.vue'),
    }
  };
</script>