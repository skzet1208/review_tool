<template>
  <div>
    <el-tabs v-model="activeName">
      <el-tab-pane label="All" name="all">All</el-tab-pane>
      <el-tab-pane label="My" name="my">
        <div class="ticket-list">
          <el-row :gutter="10">
            <el-col :span="8">
              <h5><i class="el-icon-tickets"></i>Ticket</h5>
              <draggable class="ticket-line" v-model="tickets" :options="dragOptions">
                <TicketCard v-for="ticket in tickets" :ticket="ticket" :key="ticket.id"></TicketCard>
              </draggable>
            </el-col>
            <el-col :span="8">
              <h5><i class="el-icon-message"></i>Comment</h5>
              <draggable class="ticket-line" v-model="tickets2" :options="dragOptions">
                <TicketCard v-for="ticket in tickets2" :ticket="ticket" :key="ticket.id"></TicketCard>
              </draggable>
            </el-col>
            <el-col :span="8">
              <h5><i class="el-icon-check"></i>Done</h5>
              <draggable class="ticket-line" v-model="tickets3" :options="dragOptions">
                <TicketCard v-for="ticket in tickets3" :ticket="ticket" :key="ticket.id"></TicketCard>
              </draggable>
            </el-col>
          </el-row>
        </div>
      </el-tab-pane>
    </el-tabs>
  </div>
</template>

<script scoped>
import Draggable from "vuedraggable";
import TicketCard from "../../components/Layouts/SubMenu/Ticket.vue";

export default {
  components: {
    Draggable,
    TicketCard
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
  },
  data() {
    return {
      activeName: "my",
      tickets: [
        {
          no: 1,
          name: "キャベツ",
          categoryNo: "1",
          ctime: "2018/01/01",
        },
        {
          no: 2,
          name: "ステーキ",
          categoryNo: "2",
          ctime: "2018/02/01",
        },
        {
          no: 3,
          name: "リンゴ",
          categoryNo: "3",
          ctime: "2018/05/01",
        },
        {
          no: 4,
          name: "冷蔵庫",
          categoryNo: "4",
          ctime: "2017/10/01",
        }
      ],
      tickets2: [
        {
          no: 5,
          name: "きゅうり",
          categoryNo: "1",
          ctime: "2015/01/21",
        },
        {
          no: 6,
          name: "ハンバーグ",
          categoryNo: "2",
          ctime: "2018/11/16",
        },
        {
          no: 7,
          name: "バナナ",
          categoryNo: "3",
          ctime: "2018/05/07",
        },
        {
          no: 8,
          name: "PS4",
          categoryNo: "4",
          ctime: "2018/08/03",
        }
      ],
      tickets3: [],
    };
  }
};
</script>

<style scoped>
h5 {
  padding-left: 8px;
  color: #8492a6;
}
i {
  margin-right: 12px;
}
.ticket-list {
  margin-top: 10px;
}
.ticket-line {
  background-color: #ffffff;
  border: solid 1px #e6e6e6;
  padding: 10px;
  border-radius: 2px;
  min-height: 500px;
}
.ghost {
  opacity: 0.5;
  background: #ddd;
}
</style>