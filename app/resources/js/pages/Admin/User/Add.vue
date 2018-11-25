<template>
  <div class="form-box">
    <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" class="ruleForm">
      <el-form-item label="ユーザ名" prop="name">
        <el-input v-model="ruleForm.name"></el-input>
      </el-form-item>

      <el-form-item label="権限ロール" prop="region">
        <el-select v-model="ruleForm.region" placeholder="権限">
          <el-option label="Zone one" value="shanghai"></el-option>
          <el-option label="Zone two" value="beijing"></el-option>
        </el-select>
      </el-form-item>

      <el-form-item>
        <el-button type="primary" @click="submitForm('ruleForm')">作成</el-button>
        <el-button @click="resetForm('ruleForm')">リセット</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script scoped>
export default {
  data() {
    return {
      ruleForm: {
        name: "",
        region: "",
      },
      rules: {
        name: [
          {
            required: true,
            message: "Please input Activity name",
            trigger: "blur"
          },
          {
            min: 3,
            max: 5,
            message: "Length should be 3 to 5",
            trigger: "blur"
          }
        ],
        region: [
          {
            required: true,
            message: "Please select Activity zone",
            trigger: "change"
          }
        ],
      }
    };
  },
  methods: {
    submitForm(formName) {
      this.$refs[formName].validate(valid => {
        if (valid) {
          alert("submit!");
        } else {
          console.log("error submit!!");
          return false;
        }
      });
    },
    resetForm(formName) {
      this.$refs[formName].resetFields();
    }
  }
};
</script>

<style scoped>
.form-box {
  border: 1px solid #ebebeb;
  border-radius: 4px;
  background-color: #ffffff;
  padding: 20px;
  width: 60%;
  min-width: 800px;
}
</style>