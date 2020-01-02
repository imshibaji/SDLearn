<template>
<div>
<CChartBar
    style="height:300px"
    :datasets="[
      {
        data: [20, 22, 34, 46, 58, 70, 46, 23, 45, 78, 34, 12],
        backgroundColor: '#0000ff',
        label: 'New Users',
      },
      {
        data: [14, 20, 3, 56, 56, 7, 6, 27, 40, 70, 14, 19],
        backgroundColor: '#ff5522',
        label: 'Active Users',
      },
      {
        data: [6, 2, 33, 10, 2, 69, 40, 5, 5, 8, 20, 7],
        backgroundColor: '#00ff00',
        label: 'Paid Users',
      }
    ]"
    labels="months"
    :options="{ maintainAspectRatio: false }"
  />
</div>
</template>

<script>
export default {
    name: 'ChartWidget'
}
</script>