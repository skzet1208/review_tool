<template>
  <div>
    <el-tabs v-model="activeName">
      <el-tab-pane label="User" name="first">
        <div class="ticket-list">
          <el-row :gutter="10">
            <el-col :span="8">
              <h5><i class="el-icon-tickets"></i>Ticket</h5>
              <draggable class="ticket-line" v-model="myList" :options="dragOptions">
                <TaskCard v-for="item in items" :item="item" :key="item.id"></TaskCard>
              </draggable>
            </el-col>
            <el-col :span="8">
              <h5><i class="el-icon-message"></i>Comment</h5>
              <draggable class="ticket-line" v-model="myList2" :options="dragOptions">
                <TaskCard v-for="item in items2" :item="item" :key="item.id"></TaskCard>
              </draggable>
            </el-col>
            <el-col :span="8">
              <h5><i class="el-icon-check"></i>Done</h5>
              <div class="ticket-line">

              </div>
            </el-col>
          </el-row>
        </div>
      </el-tab-pane>
      <el-tab-pane label="Config" name="second">Config</el-tab-pane>
      <el-tab-pane label="Role" name="third">Role</el-tab-pane>
      <el-tab-pane label="Task" name="fourth">Task</el-tab-pane>
    </el-tabs>
  </div>
</template>

<script scoped>
import Draggable from "vuedraggable";
import TaskCard from "../../components/Layouts/SubMenu/Task.vue";

export default {
  components: {
    Draggable,
    TaskCard
  },
  created() {
    // this.fetchTaskList();
  },
  // methods: {
  //   fetchCarouselImages() {
  //     axios.get("/api/task/list/" + this.$route.params.genre).then(res => {
  //       this.carousel_images = res.data;
  //       this.show = true;
  //     });
  //   }
  // },
  computed: {
    // ドラッグオプション
    dragOptions() {
      return {
        animation: 0,
        group: "description",
        ghostClass: "ghost"
      };
    },
    myList: {
      get() {
        return this.items;
      },
      set(value) {
        this.items = value;
      }
    },
    myList2: {
      get() {
        return this.items2;
      },
      set(value) {
        this.items2 = value;
      }
    }
  },
  data() {
    return {
      activeName: 'first',
      items: [
        {
          no: 1,
          name: "キャベツ",
          categoryNo: "1"
        },
        {
          no: 2,
          name: "ステーキ",
          categoryNo: "2"
        },
        {
          no: 3,
          name: "リンゴ",
          categoryNo: "3"
        },
        {
          no: 4,
          name: "冷蔵庫",
          categoryNo: "4"
        }
      ],
      items2: [
        {
          no: 5,
          name: "きゅうり",
          categoryNo: "1"
        },
        {
          no: 6,
          name: "ハンバーグ",
          categoryNo: "2"
        },
        {
          no: 7,
          name: "バナナ",
          categoryNo: "3"
        },
        {
          no: 8,
          name: "PS4",
          categoryNo: "4"
        }
      ]
    };
  }
};
</script>

<style scoped>
h5 {
  padding-left: 8px;
  color: #48a8ff;
}

i {
  margin-right: 12px;
}

.ticket-line {
  background-color: #e5e9f2;
  padding: 10px;
  border-radius: 2px;
  min-height: 500px;
}

.ghost {
  opacity: 0.5;
  background: #ddd;
}
</style>