<template>
    <p>Comments</p>
</template>

<script>
export default {
    data () {
        return{
            comment: [] // Will store comments of instance
        }
    },
    props: {

    },
    methods: {
        getComments() {
            this.$http.get('/posts/10/comments').then(response => {
                // response here
                this.test = (response.json());
            });
        }
    },

    ready() {
        this.getComments();
    }
}
</script>