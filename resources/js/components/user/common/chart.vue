<template>
<div class="box p-3">
    <h5 class="text-center">Learning Weeks Table</h5>
    <CChartBar
        style="height:300px"
        :datasets=getDataSet()
        :labels="labels"
        :options="{ maintainAspectRatio: false }"
    />
</div>
</template>

<script>
export default {
    name: 'LearningChart',
    data: function(){
        return{
            labels: [1,2,3],
            target: [20, 22, 13],
            done: [14, 16, 12],
            donot: [6, 7, 1],
            length: 30
        };
    },
    async mounted(){
        const udata = await axios.get('/api/info');
        const mdata = udata.data;
        this.length = mdata.length;
        this.target = mdata.target;
        this.done = mdata.done;
        this.donot = mdata.donot;
        
        for(let i=0; i<(this.length+1); i++){
            this.labels.push(i);
        }
    },
    methods:{
        getDataSet(){
            return [
            {
                data: this.target,
                backgroundColor: '#00ff00',
                label: 'Target',
            },
            {
                data: this.done,
                backgroundColor: '#00ffff',
                label: 'Done',
            },
            {
                data: this.donot,
                backgroundColor: '#ff5500',
                label: 'Not Done',
            }
            ];
        }
    }
}
</script>