<template>
  <div class="header">
    <el-row type="flex" justify="space-between">
      <el-col :span="8">
        <h1>Company Review</h1>
      </el-col>

      <el-col :span="16">
        <ul class="user_menu clearfix">
          <li>
            <el-dropdown trigger="click">
              <span class="el-dropdown-link">
                <img :src="'/img/user_icon.jpg'" width="40">
              </span>
              <el-dropdown-menu slot="dropdown">
                <el-dropdown-item>設定</el-dropdown-item>
                <el-dropdown-item divided>ログアウト</el-dropdown-item>
              </el-dropdown-menu>
            </el-dropdown>
          </li>
          <li>
            <i class="el-icon-bell">
              <el-badge :value="200" :max="99" class="item"/>
            </i>
          </li>
          <li @click="openForm">
            <i class="el-icon-edit"></i>
          </li>
        </ul>
      </el-col>
    </el-row>
  </div>
</template>

<script>
export default {
  methods: {
    openForm() {
      this.$store.dispatch("task/dialog_visible", true);
    }
  }
};
</script>

<style scoped>
h1 {
  display: inline-block;
  vertical-align: middle;
  margin: 0;
  font-size: 1.5rem;
}

.header,
.el-row {
  height: 100%;
  color: #ffffff;
}

.user_menu li {
  float: right;
  font-size: 1.1rem;
  width: 60px;
  text-align: center;
}
.user_menu img {
  border-radius: 50%;
}
.el-dropdown-link {
  cursor: pointer;
  color: #409eff;
}
.demonstration {
  display: block;
  color: #8492a6;
  font-size: 14px;
  margin-bottom: 20px;
}
.el-popper {
  margin: 0;
}
</style>
