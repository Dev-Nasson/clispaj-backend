<template>
  <div class="row">
    <div class="col-md-6">
      <label for="categoria" class="form-label">Área</label>

      <select
        class="form-select"
        name="categoria_id"
        id="categoria"
        v-model="categoria"
        @change="getsubcategorias()"
      >
        <option selected disabled>Selecionar...</option>

        <option v-for="data in categorias" :value="data.id" :key="data.id">
          {{ data.categoria_nome }}
        </option>
      </select>
    </div>

    <div class="col-md-6">
      <label for="pais" class="form-label">Curso</label>

      <select
        id="subcategoria"
        class="form-select"
        name="subcategoria_id"
        v-model="subcategoria"
      >
        <option selected disabled>Selecionar</option>
        <option v-for="data in subcategorias" :value="data.id" :key="data.id">
          {{ data.nome }}
        </option>
      </select>
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
