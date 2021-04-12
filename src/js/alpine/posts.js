window.posts = function() {
    return {
        posts: [],
        categories: [],
        currentCategory: 0,
        currentPageNumber: 1,
        isLoading: true,
        numberOfPosts: 0,
        totalPages: 0,
        getPosts: function() {
            fetch('/wp-json/wp/v2/categories')
                .then(response => response.json())
                .then(categories => {
                    this.categories = categories;
                    return this.fetchPosts();
                });
        },
        fetchPosts(){
            this.posts = [];
            this.isLoading = true;

            let baseURL = '/wp-json/wp/v2/posts?per_page=2';

            if(this.currentCategory) {
                baseURL += '&categories=' + this.currentCategory;
            }

            baseURL += '&page=' + this.currentPageNumber;

            return fetch(baseURL)
                .then(response => {
                    let totalPages = parseInt(response.headers.get('X-WP-TotalPages'));

                    if(totalPages || totalPages === 0){
                        this.totalPages = parseInt(response.headers.get('X-WP-TotalPages'));
                    }
                    return response.json();
                })
                .then(posts => {
                    this.posts = posts;
                    this.isLoading = false;
                });
        },
        goToPage(pageNumber){
            this.currentPageNumber = pageNumber;

            this.fetchPosts();
        },
        changeCategory() {
            this.currentPageNumber = 1;
            this.fetchPosts();
        }
    }
}