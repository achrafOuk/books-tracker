@props(['book_slug'])
<form method="POST" action="{{ route('store-book-comment',['slug'=>$book_slug]) }}">
    @csrf
    <div class="mb-4 flex">
        <textarea name="comment" class="w-full  rounded-lg border border-gray-300 px-4 py-2 focus:outline-none" placeholder="Enter your comment"></textarea>
    </div>

    <div class="mb-4 flex items-center">
        <span class="mr-2">Rating:</span>
        <div class="rating flex items-center" x-data="{ rating: 0 }">
            <template x-for="star in 5" :key="star">
                <label>
                <input type="radio" name="rating" :value="star" x-model="rating" class="hidden" />
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" :class="{ 'text-purple': star <= rating, 'text-gray-300': star > rating }" class="w-6 h-6 cursor-pointer">
                    <path d="M12 2l3.09 6.31 6.92.95-5 4.85 1.18 6.88-6.17-3.24-6.17 3.24 1.18-6.88-5-4.85 6.92-.95z" />
                </svg>
                </label>
            </template>
        </div>

    </div>

    <button type="submit" class="focus:shadow-outline rounded bg-purple px-4 py-2 font-bold text-white focus:outline-none">Submit</button>
</form>