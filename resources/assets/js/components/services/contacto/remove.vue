<template>
  <p>
    <b-btn v-b-tooltip.hover title="Eliminar Contacto" variant="danger" size="sm"  @click="remove()">
      <i class="material-icons">delete</i>
    </b-btn>
  </p>
</template>

<script>
import swal from 'sweetalert2'
import { bus } from '../../../app.js'

export default {
  data () {
    return {
      url: 'http://localhost/systelecerp/public/api',
      nombreValidate: {
          isValid: false,
          text: ''
      },
      contacto: {
          nombre: '',
          puesto: '',
          email: '',
          telefono: '',
          celular: '',
          cliente_id: 0
      }
    }
  },
  props: [
    'subItem'
  ],
  created () {
    this.contacto = this.subItem
  },
  methods: {
    alertError (error) {
      swal(
        'Registro fallido!',
        'Ocurrio un error al intentar eliminar el registro en la base de datos. ' + error,
        'error'
      )
    },

    alertSuccess () {
      swal(
        'Registro exitoso!',
        'Se ha eliminado con exito en la base de datos!',
        'success'
      )
    },

    remove () {
      swal({
        title: 'Esta seguro que desea eliminar el registro?',
        text: "Si elimina el registro se perderan todos los datos asociados a él!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
           this.del()
        }
      })
      
    },

    del () {
      this.$http.delete(this.url + '/contacto/' + this.contacto.id)
      .then(response => {
        bus.$emit('subItems', response.data)  
        this.alertSuccess()
      }, response => {
        this.alertError()
      })
    }
  }
}
</script>
