<template>
  <div>
    <el-tabs v-model="activeName">
      <el-tab-pane label="My Review" name="review">
        <div
          class="ticket-list"
          v-loading="loading"
          element-loading-background="rgba(248, 250, 252, 0.8)"
        >
          <el-row :gutter="10">
            <el-col :span="8">
              <h5>
                <i class="el-icon-tickets"></i>Wait Ticket
              </h5>
              <draggable
                id="wait"
                class="ticket-line"
                v-model="wait_tickets"
                :options="dragOptions"
                @end="updateStatus"
              >
                <TicketCard v-for="ticket in wait_tickets" :ticket="ticket" :key="ticket.id"></TicketCard>
              </draggable>
            </el-col>
            <el-col :span="8">
              <h5>
                <i class="el-icon-message"></i>Comment
              </h5>
              <draggable
                id="comment"
                class="ticket-line"
                v-model="comment_tickets"
                :options="dragOptions"
                @end="updateStatus"
              >
                <TicketCard v-for="ticket in comment_tickets" :ticket="ticket" :key="ticket.id"></TicketCard>
              </draggable>
            </el-col>
            <el-col :span="8">
              <h5>
                <i class="el-icon-check"></i>Done
              </h5>
              <draggable
                id="done"
                class="ticket-line"
                v-model="done_tickets"
                :options="dragOptions"
                @end="updateStatus"
              >
                <TicketCard v-for="ticket in done_tickets" :ticket="ticket" :key="ticket.id"></TicketCard>
              </draggable>
            </el-col>
          </el-row>
        </div>
      </el-tab-pane>
      <el-tab-pane label="My Request" name="request">My Request</el-tab-pane>
      <el-tab-pane label="All" name="all">All</el-tab-pane>
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
  data() {
    return {
      loading: "true",
      activeName: "review"
    };
  },
  created() {
    this.fetchTicketList();
  },
  methods: {
    // タスク情報 取得
    fetchTicketList() {
      this.$store.dispatch("task/myReviews").then(() => {
        this.loading = false; // ローディング解除
      });
    },
    // チケット移動時、実行メソッド
    updateStatus(event) {
      if (event.from.id != event.to.id) {
        this.loading = true;

        // ステータス変更API
        // axios
        //   .post("/api/ticket/update_status", {
        //     user_id: 1,
        //     ticket_id: event.to.id,
        //     status: event.item.dataset.id
        //   })
        //   .then(res => {
        //     this.loading = false;
        //   })
        //   .catch(err => {
        //     console.log("err:", err);
        //     this.$store.commit("myReviews", res.data);
        //   });
        this.loading = false;
      }
    }
  },
  computed: {
    wait_tickets: {
      get() {
        return this.$store.getters["task/tickets"]("wait");
      },
      set(val) {
        this.$store.dispatch("task/tickets", {
          status_key: "wait",
          tickets: val
        });
      }
    },
    comment_tickets: {
      get() {
        return this.$store.getters["task/tickets"]("comment");
      },
      set(val) {
        this.$store.dispatch("task/tickets", {
          status_key: "comment",
          tickets: val
        });
      }
    },
    done_tickets: {
      get() {
        return this.$store.getters["task/tickets"]("done");
      },
      set(val) {
        this.$store.dispatch("task/tickets", {
          status_key: "done",
          tickets: val
        });
      }
    },
    // ドラッグオプション
    dragOptions() {
      return {
        animation: 0,
        group: "description",
        ghostClass: "ghost"
      };
    }
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