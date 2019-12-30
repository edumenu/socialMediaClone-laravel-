<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followUser" v-text="buttonText">Follow</button>
        <!-- folowUser: This method chnages the status from true to false -->
        <!-- buttonText: changes the text dynamically from follow to Unfollow based on the status -->
    </div>
</template>

<script>
export default {
    props: ['userId','follows'],

    mounted() {
        console.log('Component mounted.')
    },

    data: function () {
           return {
               status: this.follows,
           }
       },

    methods: {
        followUser() {
            axios.post('/follow/' + this.userId).then(response=>{
                 this.status = !this.status;

                 console.log(response.data);
            })
            .catch(errors => {
                if (errors.response.status == 401) {
                  window.location = '/login';
                  }
            });
        }
    },

    computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
}
</script>
