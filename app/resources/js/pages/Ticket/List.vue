<template>
  <div>
    <el-tabs v-model="activeName">
      <el-tab-pane label="All" name="all">All</el-tab-pane>
      <el-tab-pane label="My" name="my">
        <div class="ticket-list" v-loading="loading" element-loading-background="rgba(248, 250, 252, 0.8)">
          <el-row :gutter="10">
            <el-col :span="8">
              <h5><i class="el-icon-tickets"></i>Wait Ticket</h5>
              <draggable class="ticket-line" v-model="wait_ticket" :options="dragOptions">
                <TicketCard v-for="ticket in wait_ticket" :ticket="ticket" :key="ticket.id"></TicketCard>
              </draggable>
            </el-col>
            <el-col :span="8">
              <h5><i class="el-icon-message"></i>Comment</h5>
              <draggable class="ticket-line" v-model="comment_ticket" :options="dragOptions">
                <TicketCard v-for="ticket in comment_ticket" :ticket="ticket" :key="ticket.id"></TicketCard>
              </draggable>
            </el-col>
            <el-col :span="8">
              <h5><i class="el-icon-check"></i>Done</h5>
              <draggable class="ticket-line" v-model="done_ticket" :options="dragOptions">
                <TicketCard v-for="ticket in done_ticket" :ticket="ticket" :key="ticket.id"></TicketCard>
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
import TicketCard from "../../components/Layouts/Task/Ticket.vue";

export default {
  components: {
    Draggable,
    TicketCard
  },
  created() {
    this.fetchTaskList(); // タスク情報 取得
  },
  methods: {
    fetchTaskList() {
      axios.get("/api/ticket/all").then(res => {
        this.$store.commit("set_tickets", res.data);
        this.setTaskList();
      });
    },
    setTaskList() {
      console.log(this.$store.state.tickets);
      for(let v of this.$store.state.tickets) {
        if (v.status == 1) { this.comment_ticket.push(v) }
        else if (v.status == 2) { this.done_ticket.push(v) }
        else { this.wait_ticket.push(v) }
      }
      this.loading = false; // ローディング解除
    },
  },
  computed: {
    // ドラッグオプション
    dragOptions() {
      return {
        animation: 0,
        group: "description",
        ghostClass: "ghost"
      };
    }
  },
  data() {
    return {
      loading: "true",
      activeName: "my",
      wait_ticket: [],
      comment_ticket: [],
      done_ticket: []
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