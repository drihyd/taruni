<template>
    <div> 
        <div v-for="product in Products" :key="product.id">
            Venkat
        </div>
        <infinite-loading @distance="1" @infinite="handleLoadMore"></infinite-loading>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                Products: [],
                page: 1,
            };
        },
        methods: {
            handleLoadMore($state) {
				
			

                this.$http.get('/fetchproducts?page=' + this.page)
                    .then(res => {
                        return res.json();
                    }).then(res => {
                        $.each(res.data, (key, value) => {
                            this.Products.push(value);
                        });
                        $state.loaded();
                    });

                this.page = this.page + 1;
            },
        },
    }
</script>