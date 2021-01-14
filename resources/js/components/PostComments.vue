<template>
    <div>
        <p>There are currently {{ comments.length }} comments</p>

        <!-- <ul>
            <li v-for="comment in this.comments" v-bind:key="comment">>

    <div class="bg-gray-200 my-2 p-1 dark:bg-transparent dark:border-solid border border-white border-opacity-40">
    <div class="flex justify-between">
        <div class="text-xs">
            <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
            <span>says...</span>
        </div>
    </div>

        <div>
            <p>{{ comment.body }}</p>
        </div>

            </li>
        </ul> -->
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
                // response here
                // resolve(response);
                // return console.log(response.json());
                // this.comments = response.data;
                // console.log(response.json().data);

                this.comments = response.data;

                console.log(response.data.data[0].body);
                console.log(response.data);
                console.log(response.body.data[0].user.data['username']);
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