Vue.config.devtools = true;
window.addEventListener("DOMContentLoaded", () => {
  const vueApp = new Vue({
    el: "#vueApp",
    data: {
      apiEndpoint: "api/getAlbum.php",
      cdArray: [],
      excludedFilterKeys: ["poster"],
      filtersObject: {},
      activeFilters: {},
    },
    methods: {
      getData() {
        axios.get(this.apiEndpoint).then((resp) => {
          console.log(resp.data.response);
          this.cdArray = resp.data.response;
          this.getFiltersObject();
        });
      },
      getFiltersObject() {
        const newObject = {};
        this.cdArray.forEach((currentCd) => {
          for (const [key, value] of Object.entries(currentCd)) {
            if (!this.excludedFilterKeys.includes(key)) {
              if (!newObject[key]) {
                newObject[key] = [];
              }
              newObject[key].push(value);
            }
          }
        });
        console.log(newObject);
        this.filtersObject = newObject;
      },
      setActiveFilter(filterKey, filterValue) {
        this.activeFilters[filterKey] = filterValue;
      },
      resetActiveFilter() {
        this.activeFilters = {};
      },
    },
    mounted() {
      this.getData();
    },
  });
});
