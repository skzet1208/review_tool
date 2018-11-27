<template>
  <div class="task-card">
    <el-card shadow="never" :body-style="{ padding: '0px' }" class="denger">
      <div class="header clearfix">
        <span class="no">{{ ticket.key }}</span>
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

      <div class="body">
        <span>{{ ticket.title }}</span>
      </div>

      <div class="bottom">
        <time class="time"><i class="el-icon-time"></i> {{ ticket.limit_datetime }}</time>
      </div>
    </el-card>
  </div>
</template>

<script scoped>
export default {
  props: ["ticket"]
};
</script>

<style scoped>
.header {
  padding: 7px 10px 0px;
}
.body {
  padding: 7px;
}
.bottom {
  padding: 0px 7px 4px;
}
.no {
  font-size: 0.6rem;
  color: #999;
}
.time {
  font-size: 0.8rem;
  color: #999;
}

.el-card.warning {
  border-color: #e6a23c;
}
.el-card.danger {
  border-color: #f56c6c;
}
.task-card {
  border-radius: 4px;
}
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
