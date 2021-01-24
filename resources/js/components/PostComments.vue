<template>
    <div v-if="comments">
        <p class="mb-4">{{ comments.length }} comments</p>

        <!-- Checking if user is logged in by accessing 'root' instance data, i.e 'new Vue' in app.js  -->
        <div class="" v-if="$root.user.authenticated">
            <p>HELLO YOU ARE AUTHENTICATED/LOGGED IN</p>

            <div>
                <label for="comment-body" id="comment-body" class="sr-only">Post comment</label>
                <textarea name="comment-body" v-model="body"
                class="bg-gray-100 border border-solid border-gray-300 w-full mt-2 p-2 rounded-sm dark:border-gray-400 dark:bg-transparent @error('body') border-red-500 @enderror" placeholder="Add a comment"></textarea>
            </div>

            <div>
                <button aria-label="Submit" type="submit" @click="createComment" class="bg-hacker-orange text-sm text-white text-semibold py-1 mt-2 rounded-sm w-1/4 opacity-90">Post comment</button>
            </div>

            <div class="text-red-500">
                {{errors?errors[0]:''}}
            </div>
        </div>

        <ul class="">
            <li v-for="comment in comments" :key="comment.id">                
                <div>
                    <div>
                        <a :href="'/users/' + comment.user.data.username + '/posts'">
                            <img :src="comment.user.data.avatar" v-bind:alt="comment.user.data.username + ' avatar'" class="w-16 h-auto max-h-16">
                        </a>
                    </div>
                    <div class="mb-4">
                        <a :href="'/users/' + comment.user.data.username + '/posts'" class="text-blue-500">{{ comment.user.data.username }}</a> {{ comment.created_at_human }}
                        <p>{{ comment.body}}</p>
                    </div>

                    <li v-for="reply in comment.replies.data" :key="reply.id" class="ml-8">

                    <div>
                        <a :href="'/users/' + reply.user.data.username + '/posts'">
                            <img :src="reply.user.data.avatar" v-bind:alt="reply.user.data.username + ' avatar'" class="w-16 h-auto max-h-16">
                        </a>
                    </div>
                    <div class="mb-4">
                        <a :href="'/users/' + reply.user.data.username + '/posts'" class="text-blue-500">{{ reply.user.data.username }}</a> {{ reply.created_at_human }}
                        <p>{{ reply.body}}</p>
                    </div>
                    </li>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data () {
        return{
            comments: [], // Will store comments of instance
            body: null, // Post comment body
            errors: [], // Will store validation errors
        }
    },
    props: {
    },
    methods: {
        createComment () {
            this.$http.post('/posts/10/comments', {
                body: this.body
            }).then(response => {
                this.comments.unshift(response.data.data);
                this.body = null; // Clear comment content from input field
                this.errors = null; // Clear error message
            }, response => {
                this.errors = response.body.errors.body
            });
        },

        getComments() {
            this.$http.get('/posts/10/comments').then(response => {
                this.comments = response.body.data;
            });
        },
    },
    mounted() {
        this.getComments();
    }

    
}
</script>