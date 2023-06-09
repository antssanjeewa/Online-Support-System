<template>
  <div
    class="bg-gray-100 px-4 py-3 flex justify-between border-t border-gray-200 sm:px-6"
  >
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
      <div>
        <p class="text-sm leading-5 text-gray-700 dark:text-gray-100">
          Showing
          <span class="font-medium">{{ meta.from }}</span>
          to
          <span class="font-medium">{{ meta.to }}</span>
          of
          <span class="font-medium">{{ meta.total }}</span>
          results
        </p>
      </div>
      <div class="relative z-0 inline-flex shadow-sm print-none">
        <div
          v-if="links.prev === null"
          class="paginate-btn text-gray-400"
          :class="{ 'ml-auto': links.prev }"
        >
          Previous
        </div>
        <button
          v-else
          class="paginate-btn hover:bg-gray-400 hover:text-white focus:border-indigo-500"
          @click="filters.page -= 1"
        >
          Previous
        </button>

        <template v-for="(page, index) in pages">
          <button
            :key="index"
            v-if="page != '...'"
            class="paginate-btn hover:bg-gray-400 hover:text-white focus:outline-none"
            :class="{
              'bg-gray-500 text-white   font-bold': page === meta.current_page,
            }"
            @click="filters.page = page"
          >
            {{ page }}
          </button>
          <p v-else :key="index + 'a'" class="mr-1 mb-1 px-4 py-2">...</p>
        </template>

        <div v-if="links.next === null" class="paginate-btn text-gray-400">Next</div>
        <button
          v-else
          class="paginate-btn hover:bg-gray-400 hover:text-white focus:border-indigo-500"
          @click="filters.page ? (filters.page += 1) : (filters.page = 2)"
        >
          Next
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    meta: Object,
    links: Object,
    filters: Object,
  },
  computed: {
    pages() {
      var length = Math.ceil(this.meta.total / this.meta.per_page);
      var page = this.meta.current_page;

      if (length < 10) {
        return length;
      } else if (page < 5) {
        return [1, ...this.range(-page + 2, 7 - page), "...", length];
      } else if (page > length - 4) {
        var gap = length - page;
        return [1, "...", ...this.range(length - page - 6, gap - 1), length];
      } else {
        return [1, "...", ...this.range(-2, 2), "...", length];
      }
    },
  },
  methods: {
    range(start, end) {
      const item_array = [];
      const page = this.meta.current_page;
      for (let i = start; i <= end; i++) {
        item_array.push(page + i);
      }
      return item_array;
    },
  },
};
</script>

<style scoped>
.paginate-btn {
  margin-right: 0.25rem;
  margin-bottom: 0.25rem;
  padding-left: 1rem;
  padding-right: 1rem;
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
  font-size: 0.875rem;
  line-height: 1.25rem;
  border-width: 1px;
  border-radius: 0.15rem;
}
</style>
