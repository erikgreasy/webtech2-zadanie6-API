<template>
    <main>
        <ul>
            <li v-for="day in memorabledays" :key="day.id">
                {{ day.day.date.substring(2, 4) + '.' + day.day.date.substring(0, 2) + '. ' +  day.name}}
            </li>
        </ul>
    </main>
</template>


<script>
export default {

    data() {
        return {
            memorabledays: []
        }
    },

    methods: {
        getMemorabledays() {
            this.$http.get(this.$baseurl + '/api/memorabledays')
                .then(res => {
                    this.memorabledays = res.data
                })
        }
    },
    created() {
        this.getMemorabledays()
    }
    
}
</script>