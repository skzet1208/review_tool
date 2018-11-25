<template>
  <div class="h100p">
    <el-menu :router="true">

      <el-menu-item index="/dashbord">
        <i class="el-icon-menu"></i>
        <span>Dashbord</span>
      </el-menu-item>
      <el-menu-item index="/ticket/list">
        <i class="el-icon-document"></i>
        <span>レビュー一覧</span>
      </el-menu-item>
      <el-menu-item index="4">
        <i class="el-icon-date"></i>
        <span>カレンダー</span>
      </el-menu-item>

      <el-submenu index="/admin">
        <template slot="title">
          <i class="el-icon-service"></i>
          <span>管理</span>
        </template>

        <el-menu-item-group title="ユーザ管理">
          <el-menu-item index="/admin/user/add">ユーザ一覧</el-menu-item>
          <el-menu-item index="/admin/user/add">ユーザ登録</el-menu-item>
        </el-menu-item-group>

        <el-menu-item-group title="権限管理">
          <el-menu-item index="/admin/role/add">権限登録</el-menu-item>
        </el-menu-item-group>
      </el-submenu>
    </el-menu>
  </div>
</template>

<style scoped>
.el-menu {
  height: 100%;
}
</style>
