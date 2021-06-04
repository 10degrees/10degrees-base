<div class="posts" x-data="td_posts()" x-init="getPosts()">
    <select name="categories" id="categories" @change="changeCategory" x-model="currentCategory">
        <option value="">Select a category</option>
        <template x-for="category in categories" :key="category.id">
            <option :value="category.id" x-text="category.name"></option>
        </template>
    </select>

    <template x-if="isLoading">
        <p><?php _e('Loading...', '@textdomain'); ?></p>
    </template>

    <template x-if="!isLoading && !posts.length">
        <p><?php _e("Sorry, we couldn't find any posts matching that criteria", '@textdomain'); ?></p>
    </template>

    <template x-for="post in posts" :key="post.id">
        <div>
            <h2 x-text="post.title.rendered"></h2>
        </div>
    </template>

    <template x-for="i in totalPages">
        <button @click="goToPage(i)" x-text="i"></button>
    </template>
</div>