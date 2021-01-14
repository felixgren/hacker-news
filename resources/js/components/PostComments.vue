<template>
    <div v-if="comments.data">
        <p>There are currently {{ comments.data.length }} comments</p>

        <ul>
            <li v-for="comment in comments.data" :key="comment.data">
                <div>
                    <!-- <p>{{ comment.data }}</p> -->
                    <p>hello {{ comment.user.data.username }}</p>
                    <p>{{ comment.body}}</p>
                    <img :src="comment.user.data.avatar" alt="">
                    <!-- <a href="/users/{{ comment.data.username }}">user and link</a> -->
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