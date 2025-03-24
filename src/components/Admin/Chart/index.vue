<template>
  <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header text-center">
          <h5><b>Thống Kê Tài Chính</b></h5>
        </div>
        <div class="card-body">
          <template v-if="hien_chart == true">
            <Pie id="my-chart-id" :options="chartOptions" :data="chartData" />
          </template>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { ref } from 'vue'
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'
import { Pie } from 'vue-chartjs'
import axios from 'axios'

ChartJS.register(ArcElement, Tooltip, Legend)

export default {
  name: 'BarChart',
  components: { Pie },
  data() {
    return {
      chartData: {
        labels: [],
        datasets: [{
          data: [],

          backgroundColor: ['#ff0066', '#9933ff', '#ff0000', '#0000ff'],
        }]
      },
      chartOptions: {
        responsive: true
      },
      hien_chart: false
    }
  },
  mounted() {
    this.laod_chart();
  },
  methods: {
    laod_chart() {
      axios
        .get("http://127.0.0.1:8000/api/admin/chart/chart-tai-chinh", {
          headers: {
            Authorization: 'Bearer ' + localStorage.getItem("key_admin")
          }
        })
        .then((res) => {
          this.chartData.labels = res.data.labels_x;
          this.chartData.datasets[0].data = res.data.data_x;
          this.hien_chart = true;
        });
    },
  },
}
</script>
<style></style>