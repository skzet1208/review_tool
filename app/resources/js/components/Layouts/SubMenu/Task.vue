<template>
  <div class="task-card">
    <el-card shadow="never">
      <div slot="header" class="clearfix">
        <span>No. {{ item.no }}</span> <span>{{ item.name }}</span>
        <el-dropdown class="task-menu" trigger="click">
          <span class="el-dropdown-link">
            <el-button type="text">
              <i class="el-icon-more"></i>
            </el-button>
          </span>
          <el-dropdown-menu slot="dropdown">
            <el-dropdown-item><i class="el-icon-edit"></i>編集</el-dropdown-item>
            <el-dropdown-item><i class="el-icon-delete"></i>削除</el-dropdown-item>
          </el-dropdown-menu>
        </el-dropdown>
      </div>
    </el-card>
  </div>
</template>

<script scoped>
export default {
  props: ["item"]
};
</script>

<style scoped>
.task-card:not(:last-child) {
  margin-bottom: 10px;
}
.task-menu {
  float: right;
}
.el-button {
  padding: 0;
}
.el-dropdown-menu i {
  margin-right: 12px;
}
</style>
