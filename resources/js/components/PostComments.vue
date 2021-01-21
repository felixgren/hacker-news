<template>
    <div v-if="comments.data">
        <p class="mb-4">{{ comments.data.length }} comments</p>
        <ul class="">
            <li v-for="comment in comments.data" :key="comment.data">
                <div>
                    <div>
                        <a :href="'/users/' + comment.user.username + '/posts'">
                            <img :src="comment.user.data.avatar" v-bind:alt="comment.user.data.username + ' avatar'" class="w-16 h-auto max-h-16">
                        </a>
                    </div>
                    <div class="mb-4">
                        <a :href="'/users/' + comment.user.username + '/posts'" class="text-blue-500">{{ comment.user.data.username }}</a> {{ comment.created_at_human }}
                        <p>{{ comment.body}}</p>
                    </div>

                    <li v-for="reply in comment.replies.data" :key="reply.data" class="ml-8">
                    <div>
                        <a :href="'/users/' + reply.user.username + '/posts'">
                            <img :src="reply.user.data.avatar" v-bind:alt="reply.user.data.username + ' avatar'" class="w-16 h-auto max-h-16">
                        </a>
                    </div>
                    <div class="mb-4">
                        <a :href="'/users/' + reply.user.username + '/posts'" class="text-blue-500">{{ reply.user.data.username }}</a> {{ reply.created_at_human }}
                        <p>{{ reply.body}}</p>
                    </div>
                    </li>
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