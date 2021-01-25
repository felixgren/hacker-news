<template>
    <div v-if="comments">
        <p class="mt-4">{{ comments.length }} comments</p>

        <!-- Checking if user is logged in by accessing 'root' instance data, i.e 'new Vue' in app.js  -->
        <div class="mb-4" v-if="$root.user.authenticated">
            <div>
                <label for="comment-body" id="comment-body" class="sr-only">Post comment</label>
                <textarea name="comment-body" v-model="body"
                class="bg-gray-100 border border-solid border-gray-300 w-full mt-2 p-2 rounded-sm dark:border-gray-400 dark:bg-transparent" placeholder="Add a comment"></textarea>
            </div>

            <div>
                <button aria-label="Submit" type="submit" @click.prevent="createComment" class="bg-hacker-orange text-sm text-white text-semibold py-1 mt-2 rounded-sm w-1/4 opacity-90">Post comment</button>
            </div>

            <div class="text-red-500">
                {{errors ? errors[0] : ''}}
            </div>
        </div>

        <ul class="">
            <li v-for="comment in comments" :key="comment.id" class="bg-gray-200 my-4 px-2 border dark:bg-transparent dark:border-solid dark:border-white border-opacity-20">                
                <div>
                    <div>
                        <a :href="'/users/' + comment.user.data.username + '/posts'">
                            <img :src="comment.user.data.avatar" v-bind:alt="comment.user.data.username + ' avatar'" class="w-16 h-auto max-h-16">
                        </a>
                    </div>
                    <div>
                        <a :href="'/users/' + comment.user.data.username + '/posts'" class="text-blue-500">{{ comment.user.data.username }}</a> {{ comment.created_at_human }}
                        <p>{{ comment.body}}</p>
                    </div>

                    <!-- Comment reply start -->
                    <div>
                        <ul class="text-sm">
                            <li v-if="$root.user.authenticated" class="text-blue-500">
                                <a href="#" @click.prevent="toggleReplyForm(comment.id)">{{ replyFormVisible === comment.id ? 'Cancel' : 'Reply' }}</a>
                            </li>
                            <li class="text-red-500">
                                <a href="#" v-if="$root.user.id === parseInt(comment.user_id)" @click.prevent="deleteComment(comment.id)">Delete</a>
                            </li>
                        </ul>

                        <div v-if="replyFormVisible === comment.id">
                            <textarea name="comment-reply-body" v-model="replyBody"
                            class="bg-gray-100 border border-solid border-gray-300 w-full mt-2 p-2 rounded-sm dark:border-gray-400 dark:bg-transparent" placeholder="Add a reply"></textarea>
                                <button aria-label="Submit" type="submit" @click.prevent="createReply(comment.id)" class="bg-hacker-orange text-sm text-white text-semibold py-1 mt-2 rounded-sm w-1/4 opacity-90">Post reply</button>
                        </div>
                    </div>
                    <!-- Comment reply end -->

                    <div>
                        <ul class="text-sm">
                            <li v-if="$root.user.authenticated" class="text-green-500">
                                <a href="#" @click.prevent="toggleEditForm(comment.id)">{{ editFormVisible === comment.id ? 'Cancel' : 'Edit' }}</a>
                            </li>
                        </ul>

                        <div v-if="editFormVisible === comment.id">
                            <textarea name="comment-edit-body" v-model="editBody"
                            class="bg-gray-100 border border-solid border-gray-300 w-full mt-2 p-2 rounded-sm dark:border-gray-400 dark:bg-transparent" v-bind:placeholder="comment.body"></textarea>
                                <button aria-label="Submit" type="submit" @click.prevent="createEdit(comment.id)" class="bg-hacker-orange text-sm text-white text-semibold py-1 mt-2 rounded-sm w-1/4 opacity-90">Post edit</button>
                        </div>
                    </div>
<!-- 
                    <div>
                        <label for="comment-body" id="comment-body" class="sr-only">Post comment</label>
                        <textarea name="comment-body" v-model="body"
                        class="bg-gray-100 border border-solid border-gray-300 w-full mt-2 p-2 rounded-sm dark:border-gray-400 dark:bg-transparent" placeholder="Add a comment"></textarea>
                    </div>

                    <div>
                        <button aria-label="Submit" type="submit" @click.prevent="createComment" class="bg-hacker-orange text-sm text-white text-semibold py-1 mt-2 rounded-sm w-1/4 opacity-90">Post comment</button>
                    </div> -->

                    <li v-for="reply in comment.replies.data" :key="reply.id" class="ml-8 bg-gray-200 my-4 pl-4 border-l-2 border-red-500 dark:bg-transparent dark:border-solid border-opacity-50">
                    <div>
                        <a :href="'/users/' + reply.user.data.username + '/posts'">
                            <img :src="reply.user.data.avatar" v-bind:alt="reply.user.data.username + ' avatar'" class="w-16 h-auto max-h-16">
                        </a>
                    </div>
                    <div class="">
                        <a :href="'/users/' + reply.user.data.username + '/posts'" class="text-blue-500">{{ reply.user.data.username }}</a> {{ reply.created_at_human }}
                        <p>{{ reply.body}}</p>

                        <ul class="text-sm">
                            <li class="text-red-500">
                                <a href="#" v-if="$root.user.id === parseInt(reply.user_id)" @click.prevent="deleteComment(reply.id)">Delete</a>
                            </li>
                        </ul>
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
            replyBody: null, // Post comment body
            editBody: null, // Post comment body
            replyFormVisible: null,
            errors: [], // Will store validation errors
            editFormVisible: null,
        }
    },
    props: {
        postId: null,
    },
    methods: {
        getComments() {
            this.$http.get(`/posts/${this.postId}/comments`).then(response => {
                this.comments = response.body.data;
            });
        },
        createComment () {
            this.$http.post(`/posts/${this.postId}/comments`, {
                body: this.body
            }).then(response => {
                console.log(response.data.data);
                this.comments.unshift(response.data.data);
                this.body = null; // Clear comment content from input field
                this.errors = null; // Clear error message
            }, response => {
                this.errors = response.body.errors.body
            });
        },
        createEdit (commentId) {
            // this.$http.delete(`${this.postId}/comments/${commentId}`)

            this.$http.patch(`${this.postId}/comments/${commentId}`, {
                body: this.editBody
            }).then(response => {
                // this.comments.unshift(response.data.data);
                // this.editBody = null; // Clear comment content from input field
                // this.errors = null; // Clear error message
                // console.log(response.data.data);

                console.log('yaay');

            // this.comments.map((comment, index) => {
            //         if (comment.id === commentId) {
            //             this.comments.splice(index, 1);
            //             return;
            //         }

            }, response => {
                console.log('OH NO');
                // this.errors = response.body.errors.body
            });
        },
        createReply (commentId) {
            console.log(commentId)
            this.$http.post(`/posts/${this.postId}/comments`, {
                body: this.replyBody,
                reply_id: commentId
            }).then(response => {
                this.comments.map((comment, index) => {
                    if (comment.id === commentId) {
                        this.comments[index].replies.data.push(response.data.data);
                    }
                });
                this.replyBody = null;
                this.replyFormVisible = null; // Close reply window
                this.errors = null;
            }, response => {
                this.errors = response.body.errors.body
            });
        },
        toggleReplyForm (commentId) {
            this.replyBody = null;
            // Check if selected form is the current open and close if true
            // Others handled by v-if in template: line 44
            if (this.replyFormVisible === commentId) {
                this.replyFormVisible = null;
                return;
            };

            this.replyFormVisible = commentId;
        },
        toggleEditForm (commentId) {
            this.editBody = null;
            // Check if selected form is the current open and close if true
            // Others handled by v-if in template: line 44
            if (this.editFormVisible === commentId) {
                this.editFormVisible = null;
                return;
            };

            this.editFormVisible = commentId;
        },    
        deleteComment (commentId) {
            if (!confirm('You sure about that?')) {
                return;
            }

            this.deleteById(commentId);
            this.$http.delete(`${this.postId}/comments/${commentId}`)
        },
        deleteById (commentId) {
            this.comments.map((comment, index) => {
                    if (comment.id === commentId) {
                        this.comments.splice(index, 1);
                        return;
                    }

            comment.replies.data.map((reply, replyIndex) => {
                    if (reply.id === commentId) {
                        this.comments[index].replies.data.splice(replyIndex, 1);
                        return;
                    }
                })
            });
        }
    },
    mounted() {
        this.getComments();
    }

    
}
</script>