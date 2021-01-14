<template>
    <div v-if="comments.data">
        <p>There are currently {{ comments.data.length }} comments</p>
        <ul>
            <li>{{ comments.data[0].user.data.username }}</li>
        </ul>
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
            this.$http.get('/posts/10/comments').then(response => {
                
                console.log(response.json());
                console.log(response.body);

                this.comments = response.body;

                console.log(response.body.data[0].body);
                // console.log(response.data);
                // console.log(response.body.data[0].user.data['username']);
            });
        }
    },

    mounted() {
        this.getComments();
    }
}
</script>