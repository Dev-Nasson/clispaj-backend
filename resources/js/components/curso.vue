<template>
  <div class="row">
    <div class="form-group col-lg-4 col-md-12 col-sm-12">
      <span class="icon flaticon-search-1"></span>
      <input
        type="text"
        name="field_name"
        id="emprego_search"
        placeholder="Pesquise um emprego"
      />
    </div>

    <div class="form-group col-lg-3 col-md-12 col-sm-12 location">
      <span class="icon flaticon-briefcase"></span>

      <select
        class="chosen-select"
        name="categoria_id"
        id="categoria"
        v-model="categoria"
        @change="getsubcategorias()"
      >
        <option selected disabled>Área...</option>
        <option v-for="data in categorias" :value="data.id" :key="data.id">
          {{ data.categoria_nome }}
        </option>
      </select>
    </div>

    <div class="form-group col-lg-3 col-md-12 col-sm-12 location">
      <span class="icon flaticon-briefcase"></span>

      <select
        id="subcategoria"
        class="chosen-select"
        name="subcategoria_id"
        v-model="subcategoria"
      >
        <option selected disabled>Curso</option>
        <option v-for="data in subcategorias" :value="data.id" :key="data.id">
          {{ data.nome }}
        </option>
      </select>
    </div>

    <div class="form-group col-lg-2 col-md-12 col-sm-12 text-right">
      <button class="theme-btn btn-style-one" id="procurar_emprego">
        <font style="vertical-align: inherit">
          <font style="vertical-align: inherit">Encontrar empregos</font></font
        >
      </button>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      categoria: 0,
      categorias: [],
      subcategoria: 0,
      subcategorias: [],
    };
  },
  mounted() {
    this.getcategorias();
  },
  methods: {
    getcategorias() {
      axios.get("/api/categoria").then((response) => {
        this.categorias = response.data;
      });
    },
    getsubcategorias() {
      axios
        .get("/api/subcategoria", {
          params: { categoria_id: this.categoria },
        })
        .then((response) => {
          this.subcategorias = response.data;
        });
    },
  },
};
</script>
