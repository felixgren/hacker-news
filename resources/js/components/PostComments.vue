<template>
    <div>
        <p>There are currently {{ comments.length }} comments</p>
    </div>
</template>

<script>
export default {
    data () {
        return{
            comments: [], // Will store comments of instance
        }
    },
    props: {

    },
    methods: {
        getComments() {
            this.$http.get('/posts/10/comments').then((response) => {
                // response here
                return console.log(response.json());
                // this.comments = response.json().data;
            });
        }
    },

    mounted() {
        // await this.getComments();
        // this.dataReady = true; 
        this.getComments();
    }
    // mounted: function() {
    //     this.$nextTick(function () {
    //         this.getComments();
    //     })
    // }
}
</script>