<template>
  <div class="row g-3">
    <div class="col-6">
      <label for="country" class="form-label">Província</label>

      <select
        id="country"
        class="form-select"
        name="provincia_id"
        v-model="provincia"
        @change="getmunicipios()"
      >
        <option selected disabled>Selecionar...</option>

        <option v-for="data in provincias" :value="data.id" :key="data.id">
          {{ data.provincia }}
        </option>
      </select>
    </div>

    <div class="col-6">
      <label for="municipio" class="form-label">Município</label>

      <select id="municipio" class="form-select" name="municipio_id" v-model="municipio">
        <option selected disabled>Selecionar</option>
        <option v-for="data in municipios" :value="data.id" :key="data.id">
          {{ data.municipio }}
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
      provincia: 0,
      provincias: [],
      municipio: 0,
      municipios: [],
    };
  },
  mounted() {
    this.getprovincias();
  },
  methods: {
    getprovincias() {
      axios.get("/api/provincia").then((response) => {
        this.provincias = response.data;
      });
    },
    getmunicipios() {
      axios
        .get("/api/municipio", {
          params: { provincia_id: this.provincia },
        })
        .then((response) => {
          this.municipios = response.data;
        });
    },
  },
};
</script>
