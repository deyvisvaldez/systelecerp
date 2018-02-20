<template>
  <b-container>
    <addcotizacion :item="obra"></addcotizacion>
    <listcotizacion></listcotizacion>
  </b-container>
</template>

<script>
export default {
  data () {
    return {
      obra: {
          id: null,
          numero: '',
          obra: '',
          descripcion: '',
          costo: 0,
          tipo_moneda: '',
          forma_pago: '',
          fecha_limite: '',
          documentacion: '',
          estado: '',
          cliente_id: null
      }
    }
  }
}
</script>
