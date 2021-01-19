<template>
    <div v-if="comments.data">
        <p class="mb-4">There are currently {{ comments.data.length }} comments</p>
        <ul>
            <li v-for="comment in comments.data" :key="comment.data">
                <div>
                    <!-- <p>{{ comment.data }}</p> -->
                    <img :src="comment.user.data.avatar" alt="" class="w-16 h-auto max-h-16">
                    <p>username: {{ comment.user.data.username }}</p>
                    <p>comment body: {{ comment.body}}</p>
                </div>
            </li>
        </ul>
        <p>{{ comments.data[0].user.data.username }}</p>
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

                console.log(response.body.data);

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