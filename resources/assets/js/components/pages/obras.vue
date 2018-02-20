<template>
  <b-container>
    <addobra :item="cliente"></addobra>
    <listobra></listobra>
  </b-container>
</template>

<script>
export default {
  data () {
    return {
      cliente: {
          id: null,
          nombre: '',
          planta: '',
          direccion: '',
          descripcion: ''
      }
    }
  }
}
</script>
