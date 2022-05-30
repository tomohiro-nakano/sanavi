/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue").default;

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);


// スターレーティングを各項目別に生成
import StarRating from "vue-star-rating";

new Vue({
    el: "#star-ave",
    components: {
        "star-ave": StarRating,
    },
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },
    },
    data: {
        rating: 3,
    },
});


new Vue({
    el: "#star-all",
    components: {
        "star-all": StarRating,
    },
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },
    },
    data: {
        rating: 3,
    },
});

new Vue({
    el: "#star-totonoi",
    components: {
        "star-totonoi": StarRating,
    },
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },
    },
    data: {
        rating: 3,
    },
});

new Vue({
    el: "#star-rt",
    components: {
        "star-rt": StarRating,
    },
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },
    },
    data: {
        rating: 3,
    },
});

new Vue({
    el: "#star-wt",
    components: {
        "star-wt": StarRating,
    },
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },
    },
    data: {
        rating: 3,
    },
});

new Vue({
    el: "#star-rest",
    components: {
        "star-rest": StarRating,
    },
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },
    },
    data: {
        rating: 3,
    },
});

new Vue({
    el: "#star-cong",
    components: {
        "star-cong": StarRating,
    },
    methods: {
        setRating: function (rating) {
            this.rating = rating;
        },
    },
    data: {
        rating: 3,
    },
});

function delete_alert(e) {
    if (!window.confirm("本当に削除しますか？")) {
        window.alert("キャンセルされました");
        return false;
    }
    document.deleteform.submit();
}


$(".custom-file-input").on("change", function () {
    $(this).next(".custom-file-label").html($(this)[0].files[0].name);
});


// example-vue
new Vue({
    el: "#example-vue",
});

// スクロールヒント
import ScrollHint from "scroll-hint";
// const ScrollHint = require('scroll-hint');
new ScrollHint(".js-scrollable", {
    suggestiveShadow: true,
    remainingTime: 5000,
    i18n: {
        scrollable: "スクロールできます",
    },
});
