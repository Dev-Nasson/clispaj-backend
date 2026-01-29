<template>
  <div class="row">
    <!-- Filter Block -->
    <div class="filter-block">
      <h4>Área</h4>
      <div class="form-group">
        <select
          class="chosen-select"
          name="categoria_id"
          id="categoria"
          v-model="categoria"
          @change="getsubcategorias()"
          style="height: 50px"
        >
          <option selected disabled>Selecionar...</option>

          <option v-for="data in categorias" :value="data.id" :key="data.id">
            {{ data.categoria_nome }}
          </option>
        </select>

        <span class="icon flaticon-briefcase"></span>
      </div>
    </div>

    <!-- Filter Block -->
    <div class="filter-block">
      <h4>Curso</h4>
      <div class="form-group">
        <select
          id="subcategoria"
          class="chosen-select"
          name="subcategoria_id"
          v-model="subcategoria"
          style="height: 50px"
        >
          <option selected disabled>Selecionar...</option>
          <option v-for="data in subcategorias" :value="data.id" :key="data.id">
            {{ data.nome }}
          </option>
        </select>

        <span class="icon flaticon-briefcase"></span>
      </div>
    </div>

    <div class="form-group col-lg-2 col-md-12 col-sm-12 text-right">
      <button class="theme-btn btn-style-one" id="procurar_estagio">
        <font style="vertical-align: inherit">
          <font style="vertical-align: inherit">Buscar estágio</font></font
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
