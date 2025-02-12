import { ref } from "vue";
import axios from "axios";
import authHeader from "@/services/auth-header.js";

export function useAutocomplete(apiEndpoint, itemData = ref(0), additionalParams = {}) {
  const items = ref([]);
  const loading = ref(false);
  const currentPage = ref(1);
  const totalPages = ref(1);
  const searchQuery = ref("");
  

  // Load data from API
  const loadMoreFromApi = async (emptyItems = false) => {
    var itemId = itemData?.value ? itemData.value.id : 0;


    try {
       if(!loading.value){
        loading.value = true;
        const response = await axios.get(apiEndpoint, {
          params: {
            page: currentPage.value,
            limit: 20,
            search: searchQuery.value,
            item_id: itemId,
            ...additionalParams, // Merge in any extra params
          },
          headers: authHeader(), // Assuming this function is defined somewhere
        });
  
        const { data, meta } = response.data;

        if(emptyItems)
          items.value = [];
          items.value = [...items.value, ...data];
          totalPages.value = meta.last_page;
          currentPage.value++;
      }
    } finally {
      loading.value = false;
    }
  };

  const getItems = async (newQuery) => {
    searchQuery.value = newQuery;
    currentPage.value = 1;
    if((!newQuery) || newQuery.length > 3){
      loadMoreFromApi(true);
    }
  };

  return {
    items,
    loading,
    getItems,
    loadMoreFromApi
  };
}
