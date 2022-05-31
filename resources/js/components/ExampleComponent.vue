<template>
        <div id="star-read">
            <star-read
                :rating="post"
                :read-only="true"
                :increment="0.01"
                :star-size="25"
            ></star-read>
        </div>
</template>

<script>
import StarRating from "vue-star-rating";
export default {
    el: "#star-read",
    components: {
        "star-read": StarRating,
    },
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },
    },
    data: {
        rating: 3,
    },
    mounted() {
        console.log("Component mounted.");
    },
    props: {
        post: String,
    },
};
</script>
